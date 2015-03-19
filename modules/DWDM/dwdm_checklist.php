<?php
// Title Menu from function.php

// Get years for select box
 $sql_years = "SELECT DISTINCT
						  YEAR(date_start ) AS years
						FROM tbl_dwdm_checklist
						ORDER BY years DESC";
$rs_years = $db->GetAll($sql_years);

 $currentYear = $rs_years[0]['years'];

 $years = isset($_GET['years']) ? $_GET['years'] : $currentYear ;

		$str_years = " > ประจำปี : &nbsp;";
        $str_years .=  "<select name='sel_years' id='sel_years'>";
          for($i=0;$i<count($rs_years);$i++){ //ThaiMonthFull as $key => $value){
			  $sel = $rs_years[$i]['years'] == $years ? ' selected ' : '';
			  
			 $str_years .= "<option value='".$rs_years[$i]['years']."' $sel>".($rs_years[$i]['years']+543)."</option>";	  
		  }
		  $str_years .=    "</select>";

$str_years = !isset($_GET['page']) ? $str_years : "";


$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']) . $str_years;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;
$tbl->pagingLength = 20;
$tbl->orderType = "desc";

$db->debug=0;

//show_post();
$auth = new Auth();
$auth->db =$db;
$auth->user_id = $_SESSION['sess_user_id'];

$div_graph = "&nbsp;<span class='btnGraph'> <button>กราฟรายเดือน</button></span>";
$div_graph .= "<span class='btnGraphYear'> <button>กราฟรายปี</button></span>";
$div_report = "<span class='btnReport'><button>รายงาน</button></span>";


$isOper = $auth->checkUserAuth(3);
$isChief = $auth->checkUserAuth(4);

if($isChief && !isset($_GET['page'])){
	$tbl->menu = MENU_ACTION."  ".$div_graph." ".$div_report;	
	$sql_option = "";
}else{
	$tbl->menu = $div_graph." ".$div_report;		
}

if(isset($_GET['page'])){
	$sql_option = " AND a.check_id = ".$_GET['check_id'];
	$tbl->menu = MENU_BACK;	
}


$sql_maxMonth = "SELECT
							  MAX( DATE_FORMAT(check_date, '%m')) AS max_month
							FROM tbl_dwdm_checklist_detail
							WHERE YEAR(check_date) = $years";
$rs_maxMonth = $db->GetRow($sql_maxMonth);
$maxMonth = $rs_maxMonth['max_month'];
//Query Data
 $sql_list = "SELECT
					  a.check_id,
					  a.user_assign,
					  b.user_desc,
					  a.remarks,
					  a.check_status,
					  a.date_start as date_start1,
					  a.date_finish as date_finish1,
					  a.unlock_desc,
					  DATE_FORMAT(a.date_start, '%d-%m-%Y') AS date_start,
					  DATE_FORMAT(a.date_finish, '%d-%m-%Y') AS date_finish
					FROM tbl_dwdm_checklist a,
					  tbl_users b
					WHERE a.user_assign = b.user_id
					AND YEAR(a.date_start) = $years
					$sql_option 
					ORDER BY check_id  DESC";
		

$tbl->openTable();


?>

<style type="text/css">
.xdsoft_datetimepicker  .xdsoft_calendar td,.xdsoft_datetimepicker  .xdsoft_calendar th {
	font-size:12px;	
	height:32px;
	line-height:32px;
}

.ui-button .ui-button-text
{
 line-height: 1.0;
}
</style>


<?php

  if(!isset($_GET['page'])){
	
  ?>

<form method="post" action="" name="form_add" id="form_add">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="<?=$tbl->id;?>">
    <thead>
      <tr>
        <th width="4%"  class="header_height"><?=$isChief?"จัดการ":"ลำดับ"?></th>
        <th width="18%">วันที่ตรวจสอบ</th>
        <th width="21%">รายชื่อผู้ตรวจสอบระบบ</th>
        <th width="33%">หมายเหตุ</th>
        <th width="11%">สถานะ</th>
        <th width="13%">แสดง</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	
   $rs_list = $db->GetAll($sql_list);		
	$maxRecord = count($rs_list);
	for($i=0;$i<count($rs_list);$i++){
	
		$isChecked = $i==0?'checked':'';
		
		$date_start_ex = explode("-",$rs_list[$i]['date_start']);
		$date_finish_ex = explode("-",$rs_list[$i]['date_finish']);	
		
		$date_start = (int) $date_start_ex[0]." ".$ThaiMonth[$date_start_ex[1]]." ".($date_start_ex[2]+543);
		$date_finish =  (int) $date_finish_ex[0]." ".$ThaiMonth[$date_finish_ex[1]]." ".($date_finish_ex[2]+543);
		
		$unlock_desc = $rs_list[$i]['unlock_desc'];
	?>
      <tr>
        <td align="center"><label>
            <?php
		 if($isChief){
         		echo "<input type='radio' name='selID' id='selID_".$rs_list[$i]['check_id']."' value='".$rs_list[$i]['check_id']."' ".$isChecked."/>";
		 }else{
			 echo ($maxRecord);
		 }
		 ?>
          </label></td>
        <td align="center"><?=$date_start;?>
-
  <?=$date_finish;?></td>
        <td><?=$rs_list[$i]['user_desc']?></td>
        <td><?=$rs_list[$i]['remarks'];?></td>
        <td align="center"><img src="./images/<?=$checklist_status[$rs_list[$i]['check_status']]['icon']?>" style='cursor:help' class="tooltips" title="<?=$checklist_status[$rs_list[$i]['check_status']]['title']?><br><i><?=$unlock_desc?></i>"></td>
        <td align="center"><button name="views" class="views button" value="<?=$rs_list[$i]['check_id']?>" style="cursor:pointer">View</button></td>
      </tr>
      <?php 
	  $maxRecord--;
	  } // End for ?>
    </tbody>
  </table>
</form>
<?php 
	$tbl->closeTable(); 
  }


if($_GET['page'] == "form"){
	

$rs_list = $db->GetRow($sql_list);		

$date_start = explode("-",$rs_list['date_start']);
$date_finish = explode("-",$rs_list['date_finish']);
$check_status = $rs_list['check_status'];
$unlock_desc = $rs_list['unlock_desc'];

?>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <th height="20" colspan="2" align="center" class="ui-state-focus"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="18%">     
        <?php
		if($isOper && ($check_status == "K" || $check_status == "P"  || $check_status == "U")){
		echo "<button name='keyin' class='keyin'>เลือกวันที่เพื่อบันทึกข้อมูล</button>";
		}
        ?>
        </td>
        <td width="70%" align="center"> รายการตรวจสอบระบบ DW/DM ระหว่างวันที่ <u>
        <?= (int) $date_start[0];?> <?=$ThaiMonthFull[$date_start[1]];?>  <?=($date_start[2]+543);?></u>  ถึงวันที่ <u>
        <?= (int) $date_finish[0];?>       
        <?=$ThaiMonthFull[$date_finish[1]];?>        
        <?=($date_finish[2]+543);?></u>&nbsp;โดย : <b><?=$rs_list['user_desc']?></b> , สถานะ : &nbsp;<img src="./images/<?=$checklist_status[$rs_list['check_status']]['icon']?>" class="tooltips" style='cursor:help' title="<?=$checklist_status[$rs_list['check_status']]['title']?><br><i><?=$unlock_desc?></i>" align="absmiddle" id="img_status">
        <input name="date_start" type="hidden" id="date_start" value="<?=$rs_list['date_start']?>" />
        <input name="date_end" id="date_end" type="hidden" value="<?=$rs_list['date_finish']?>" />
        <input name="check_id" id="check_id" type="hidden" value="<?=$rs_list['check_id']?>" />
         <input name="check_status" id="check_status" type="hidden" value="<?=$rs_list['check_status']?>" />
        <input name="current_page" id="current_page" type="hidden" value="<?=$_GET['page']?>" />
        <input name="isChief" id="isChief" type="hidden" value="<?=$isChief?>" />
        <input name="isOper" id="isOper" type="hidden" value="<?=$isOper?>" />
        </td>
        <td width="12%" align="right"><div id="divAction">
        <?php
		//if(!$isChief && $check_status == "K"){
      // 		 echo "<span name='btnSend' id='btnSend' class='btnAction' ref='S'>ส่งผลการตรวจสอบ</span>";		
		//}else
		 if($isChief && $check_status == "S"){
			 echo "<span name='btnApprove' id='btnApprove' class='btnAction' ref='A'>อนุมัติ</span>";	
		}else  if($isChief && ($check_status == "A" || $check_status == "S" )){
			 echo "<span name='btnUnlock' id='btnUnlock' class='btnUnlock' ref='U'>ส่งกลับแก้ไข</span>";	
		}
		?>
        </div>
        </td>
      </tr>
    </table></th>
  </tr>
  <tr class="div_keyin">
    <td width="14%" align="center" valign="top" id="td_calendar"><input type="text" name="show_calendar" id="show_calendar" /></td>
    <td width="86%" align="center" valign="top" id="td_form" ><div id="div_form_content"></div></td>
  </tr>
  <tr>
    <td colspan="2"><div id="div_display"></div></td>
  </tr>
</table>

<?php
	}

?>
<div id="dialog-form-<?=$tbl->page;?>" title="<?=title_menu($_GET['setPage'])?>" style="display:none"></div>
<div id="dialog-form-graph" title="DW/DM Disk Usage " style="display:none"></div>
<div id="dialog-form-report" title="รายงานการตรวจสอบระบบ DW/DM " style="display:none"></div>
<div id="dialog-confirm" title="Comfirm!!" style="display:none">ยืนยันการลบข้อมูล ?</div>
<input type="hidden" name="hidRadio" id="hidRadio" value="<?=$rs_list[0]['check_id']?>" />
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<input name="maxMonth" id="maxMonth" type="hidden" value="<?=$maxMonth?>" />
<input name="hidYears" id="hidYears" type="hidden" value="<?=$years?>" />

<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
<script src="./js/highcharts/highcharts.js"></script>
<script src="./js/highcharts/exporting.js"></script>