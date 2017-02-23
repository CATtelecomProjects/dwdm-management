<?php
@session_start();
require '../../vendor/autoload.php';
require_once("../../includes/config.inc.php");

//15=margin-left, 15=margin-right, 26=margin-top, 15=margin-bottom
$mpdf = new mPDF('th', 'A4-L', '9', 'garuda', '15', '15', '22', '15');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$mpdf->SetDisplayMode('fullpage');

ob_start();

$db->debug=0;
$get_check_id =  $_GET['check_id'];
//show_get();


//Query Data
$sql_list = "SELECT
					  a.check_id,
					  a.user_assign,
					  b.user_desc,
					  a.remarks,
					  a.check_status,					
					  a.date_start as date_start1,
					  a.date_finish as date_finish1,
					  DATE_FORMAT(a.date_start, '%d-%m-%Y') AS date_start,
					  DATE_FORMAT(a.date_finish, '%d-%m-%Y') AS date_finish
					FROM tbl_dwdm_checklist a,
					  tbl_users b
					WHERE a.user_assign = b.user_id
					 AND a.check_id = $get_check_id
					ORDER BY check_id DESC ";
					
$rs_list = $db->GetRow($sql_list);		
		
$date_start = explode("-",$rs_list['date_start']);
$date_finish = explode("-",$rs_list['date_finish']);

$check_id = $rs_list['check_id'];
$check_status = $rs_list['check_status'];

		
 $sql_data = "SELECT 
							a.id,
							a.check_id,
							DATE_FORMAT(a.check_date, '%d-%m-%Y') AS check_date,
							DATE_FORMAT(b.selected_date, '%d-%m-%Y') AS selected_date,		
							DATE_FORMAT(a.check_time, '%H:%i') AS check_time,
							DATE_FORMAT(a.update_time, '%d-%m-%Y %H:%i') AS update_time,
							a.check_by,
							a.user_desc,
							a.datasets,
							a.problems,
							a.solutions,
							a.remarks	,
							a.holiday										
						 FROM (
						SELECT a.* ,b.user_desc FROM tbl_dwdm_checklist_detail a , tbl_users b
						WHERE a.check_by = b.user_id AND a.check_id = $check_id)  a 
						RIGHT JOIN  (
						SELECT * FROM 
						(SELECT ADDDATE('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i)AS  selected_date FROM
						 (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t0,
						 (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t1,
						 (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t2,
						 (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t3,
						 (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t4) v
						WHERE selected_date BETWEEN STR_TO_DATE('".$rs_list['date_start1']."', '%Y-%m-%d') AND STR_TO_DATE('".$rs_list['date_finish1']."', '%Y-%m-%d') ) AS b 
						ON a.check_date = b.selected_date
						ORDER BY b.selected_date";
							
$rs_data = $db->GetAll($sql_data);


// Function set checkbox
function setChecked($data){
	return $data == "Y" ? " x ":" &nbsp; ";
	
}


// Function set backgroud highlight
function setHighlightColor($data){
$percentWarning = 80;
$percentCritical = 90;

	if($data > $percentCritical){
		$color = "#ff6a6a";	
	}else if($data>$percentWarning){
		$color = "#ffff99";
	}else{
		$color = "#ffffff";		
	}
	return $color;
}

?>
<!--<style type="text/css">
	.tborder  tr td {
		border:1px solid #DADADA;					
	}
</style>-->

<?php

$PrintedDate = "Printed Date : " . date('M j,Y H:i:s A');
$PrintedBy = "Printed By  : ".$_SESSION['sess_name'];
$TitleRight = "$PrintedBy";

//$mpdf->WriteHTML("<strong>รายการตรวจสอบระบบ DW/DM ระหว่างวันที่ ".$rs_list['date_start']." ถึงวันที่ ".$rs_list['date_finish']."</strong>");
$Title = "รายการตรวจสอบระบบ DW/DM ระหว่างวันที่ ".$rs_list['date_start']." ถึงวันที่ ".$rs_list['date_finish'];
$Title2 = $Title."<br>โดย " .$rs_data[0]['user_desc'];
$mpdf->SetTitle($Title);

$arrHeader = array(
    'L' => array(
        'content' =>'',
		'font-size' => 10,
		'font-style' => 'B'
    ),
    'C' => array(
		'content' =>  $Title2,
		'font-size' => 13,
		'font-style' => 'B'	
				),
    'R' => array(
        'content' => '',
		'font-size' => 10,
		'font-style' => 'B'
    ),
    'line' => 0,
);


$arrFooter = array(
    'L' => array(
       'content' => $TitleRight,
		'font-style' => '',
		'font-size' => 8
    ),
    'C' => array(
		 'content' => $PrintedDate,
		 'font-size' => 8
	),
    'R' => array(
        'content' => "Page : {PAGENO}/{nb}",
		'font-size' => 8,
		'font-style' => ''
    ),
    'line' => 1,
);

$mpdf->SetHeader($arrHeader, 'O');  // E for Even header
$mpdf->SetFooter($arrFooter, 'O');  // E for Even Footer

?>

<table width="100%" border="1" cellpadding="4" cellspacing="0"  style="border-collapse:collapse;overflow: wrap" class="tborder">
  <thead class="ui-widget-header">
  <th width="16%" height="17" bgcolor="#999999">วันที่</th>
    <th colspan="3" bgcolor="#999999">รายการ</th>
    <th width="18%" bgcolor="#999999">ปัญหา / อาการ    -  แก้ไข</th>
    <th colspan="2" bgcolor="#999999">หมายเหตุ
      </thead></th>
    <?php
	  	//show_array($rs_data);
		$count_data =0;
	 	for($i=0;$i<count($rs_data);$i++){
			$id = $rs_data[$i]['id'];
			$check_date = $rs_data[$i]['selected_date'];
			$check_time = $rs_data[$i]['check_time'];
			$check_by = $rs_data[$i]['user_desc'];
			$update_time = $rs_data[$i]['update_time'];
			$arrData = json_decode($rs_data[$i]['datasets'], true);
			
			$check_date_ex = explode("-",$check_date);
		    $check_date_str =  (int) $check_date_ex[0]."/".(int) $check_date_ex[1]."/".($check_date_ex[2]+543);
			
			$id <> "" ? $count_data++ : ""; 
			
			$key_status = $id <> "" ? "<img src='./images/on.gif' style='cursor:help' class='tooltips' title='บันทึกข้อมูลแล้ว <br>$update_time'>" : "<img src='./images/off.gif' class='tooltips' title='ยังไม่การบันทึกข้อมูล' style='cursor:help'>";
			
	  ?>
  <tr>
    <td rowspan="8" ><?=$rs_data[$i]['holiday'] == "Y" ? "&nbsp; (".$rs_data[$i]['remarks'].")<br />": ""?>
      &nbsp;<strong>วันที่ : </strong><u>
      <?=$check_date_str?>
      </u><br />
      &nbsp;<strong>เวลา :</strong>&nbsp;<u><span style="cursor:help" class="tooltips" title="เวลาที่บันทึกครั้งแรก"><?=$check_time?></span></u>  <strong>น.</strong><br />
      &nbsp;<strong>ผู้รับผิดชอบ</strong> :<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><?=$check_by?></u></td>
    <td colspan="3" align="left" bgcolor="#E4E4E4"  class="ui-state-default"> <strong>Software</strong></td>
    <td align="left" bgcolor="#E4E4E4" class="ui-state-default" ><strong> ปัญหา / อาการ :</strong></td>
    <td width="15%" valign="top" bgcolor="#E4E4E4" class="ui-state-default"><strong>หมายเหตุ :</strong></td>
  </tr>
  <tr>
    <td width="17%" align="left" valign="top">[
      <?=setChecked($arrData['sw']['portal']);?>
      ]   BI Report (Web Portal)</td>
    <td width="17%" align="left" valign="top">[
      <?=setChecked($arrData['sw']['webrep']);?>
      ] Web Report Studio</td>
    <td width="17%" align="left" valign="top">[
      <?=setChecked($arrData['sw']['sasdi']);?>
      ] SAS Data Integration</td>
    <td rowspan="2" valign="top"><?=nl2br($rs_data[$i]['problems'])?></td>
    <td rowspan="7" valign="top"><?=nl2br($rs_data[$i]['remarks'])?></td>
  </tr>
  <tr>
    <td colspan="3" align="left" bgcolor="#E4E4E4" class="ui-state-default"> <strong>Hardware</strong>  <span class="font-small">(% Disk Usage ต้องไม่เกิน 90%)</span></td>
  </tr>
  <tr >
    <td colspan="2" bgcolor="#E4E4E4"  class="ui-state-default"><strong>&nbsp;&nbsp;&nbsp;CATEDI1</strong></td>
    <td bgcolor="#E4E4E4"  class="ui-state-default"><strong>CATEBI1</strong></td>
    <td align="left" bgcolor="#E4E4E4"  class="ui-state-default"><strong> แก้ไข :</strong></td>
  </tr>
  <tr>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['di']['ftproot']['value'])?>">[
      <?=setChecked($arrData['hw']['di']['ftproot']['item']);?>
      ]
      /ftproot &nbsp;(
      <?=$arrData['hw']['di']['ftproot']['value']?>
      %)</td>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['di']['work']['value'])?>"> [
      <?=setChecked($arrData['hw']['di']['work']['item']);?>
      ]
      /work &nbsp;(
      <?=$arrData['hw']['di']['work']['value']?>
      %)</td>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['bi']['data']['value'])?>">[
      <?=setChecked($arrData['hw']['bi']['data']['item']);?>
      ]
      /data &nbsp;(
      <?=$arrData['hw']['bi']['data']['value']?>
      %)</td>
    <td rowspan="4" valign="top"><?=nl2br($rs_data[$i]['solutions'])?></td>
  </tr>
  <tr>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['di']['data']['value'])?>">[
      <?=setChecked($arrData['hw']['di']['data']['item']);?>
      ]
      /data&nbsp; (
      <?=$arrData['hw']['di']['data']['value']?>
      %)</td>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['di']['archive']['value'])?>">[
      <?=setChecked($arrData['hw']['di']['archive']['item']);?>
      ]
      /archive &nbsp;(
      <?=$arrData['hw']['di']['archive']['value']?>
      %)</td>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['bi']['work']['value'])?>">[
      <?=setChecked($arrData['hw']['bi']['work']['item']);?>
      ]
      /work&nbsp; (
      <?=$arrData['hw']['bi']['work']['value']?>
      %)</td>
  </tr>
  <tr>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['di']['data1']['value'])?>">[
      <?=setChecked($arrData['hw']['di']['data1']['item']);?>
      ]
      /data1&nbsp; (
      <?=$arrData['hw']['di']['data1']['value']?>
      %)</td>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['di']['utilloc']['value'])?>">[
      <?=setChecked($arrData['hw']['di']['utilloc']['item']);?>
      ]
      /utilloc&nbsp; (
      <?=$arrData['hw']['di']['utilloc']['value']?>
      %)</td>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['bi']['utilloc']['value'])?>">[
      <?=setChecked($arrData['hw']['bi']['utilloc']['item']);?>
      ]
      /utilloc&nbsp; (
      <?=$arrData['hw']['bi']['utilloc']['value']?>
      %)</td>
  </tr>
  <tr>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['di']['data2']['value'])?>">[
      <?=setChecked($arrData['hw']['di']['data2']['item']);?>
      ]
      /data2&nbsp; (
      <?=$arrData['hw']['di']['data2']['value']?>
      %)</td>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['di']['var']['value'])?>">[
      <?=setChecked($arrData['hw']['di']['var']['item']);?>
      ]
      /var &nbsp;(
      <?=$arrData['hw']['di']['var']['value']?>
      %)</td>
    <td align="left" bgcolor="<?=setHighlightColor($arrData['hw']['bi']['var']['value'])?>">[
      <?=setChecked($arrData['hw']['bi']['var']['item']);?>
      ]
      /var&nbsp; (
      <?=$arrData['hw']['bi']['var']['value']?>
      %)</td>
  </tr>
  <?php
		}
		
		?>
</table>
<?php

$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML($html, 2);

$mpdf->Output();
?>
