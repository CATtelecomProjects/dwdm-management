<?php
// Title Menu from function.php
$db->debug=0;

// Get years for select box
 $sql_years = "SELECT DISTINCT
						  YEARS AS years
						FROM tbl_dwdm_monthly_stats
						ORDER BY years DESC";
$rs_years = $db->GetAll($sql_years);

 $currentYear = $rs_years[0]['years'];

 $currentYear = isset($_GET['year']) ? $_GET['year'] : $currentYear ;

		$str_years = " > ประจำปี : &nbsp;";
        $str_years .=  "<select name='sel_years' id='sel_years'>";
        
		  for($i=0;$i<count($rs_years);$i++){ //ThaiMonthFull as $key => $value){
			  $sel = $rs_years[$i]['years'] == $currentYear ? ' selected ' : '';
			 $str_years .= "<option value='".$rs_years[$i]['years']."' $sel>".($rs_years[$i]['years']+543)."</option>";	  
		  }
		  $str_years .=    "</select>";

$str_years = !isset($_GET['page']) ? $str_years : "";

// Get Months


 $sql_months = "SELECT DISTINCT
						  MONTHS AS months
						FROM tbl_dwdm_monthly_stats
						WHERE YEARS= $currentYear
						ORDER BY MONTHS DESC";
$rs_months = $db->GetAll($sql_months);

$currentMonth = !isset($_GET['month']) ?  $rs_months[0]['months'] : $_GET['month'];



		$str_month = " > ประจำเดือน : &nbsp;";
        $str_month .=  "<select name='sel_months' id='sel_months'>";
          for($i=0;$i<count($rs_months);$i++){ //ThaiMonthFull as $key => $value){
			  $sel = $rs_months[$i]['months'] == $currentMonth ? ' selected ' : '';
			  
			 $str_month .= "<option value='".$rs_months[$i]['months']."' $sel>".($ThaiMonthX[$rs_months[$i]['months']])."</option>";	  
		  }
		  $str_month .=    "</select>";




$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']) . $str_years . $str_month;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;
$tbl->pagingLength = 50;
$tbl->orderType = "asc";

$db->debug=0;

//show_post();
$auth = new Auth();
$auth->db =$db;
$auth->user_id = $_SESSION['sess_user_id'];

$div_graph = "&nbsp;<span class='btnGraph'> <button>แสดงกราฟ</button></span>";
//$div_graph .= "<span class='btnGraphYear'> <button>กราฟรายปี</button></span>";
//$div_report = "<span class='btnReport'><button>รายงาน</button></span>";


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



//Query Data
 $sql_list = "SELECT
					  *
					FROM tbl_dwdm_monthly_stats	
					WHERE 						
							YEARS = $currentYear
					AND	MONTHS = $currentMonth				
					ORDER BY ID DESC";
		

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
        <th width="5%"  class="header_height"><?=$isChief?"จัดการ":"ลำดับ"?></th>
        <th width="34%">หน่วยงาน/ชื่อ - สกุล</th>
        <th width="16%">ชื่อย่อหน่วยงาน/ตำแหน่ง</th>
        <th width="15%">ใช้งานผ่าน Web</th>
        <th width="17%">ใช้งานผ่าน Tools SAS</th>
        <th width="13%">รวมทั้งหมด</th>
      </tr>
    </thead>

    <tbody>
      <?php 
	
   $rs_list = $db->GetAll($sql_list);		
   
   $arrBGColor = array("2"=>"#FFCCAA",
   								 "3"=>"#CCEECC",
								 "4"=>"#EEFFDD");
   
   
	$maxRecord = count($rs_list);
	$sumWeb= 0;
	$sumTool = 0;
	
	for($i=0;$i<count($rs_list);$i++){
	
		$isChecked = $i==0?'checked':'';
		$bgcolor=$rs_list[$i]['TYPES']=="O"?$arrBGColor[$rs_list[$i]['LEVELS']]:"";
		
		
		$sumWeb+= $rs_list[$i]['TYPES']=="E" ? $rs_list[$i]['WEB_STATS']  : 0;
		$sumTool+= $rs_list[$i]['TYPES']=="E" ? $rs_list[$i]['TOOL_STATS'] : 0;
		
	?>
      <tr >
        <td align="center" bgcolor=<?=$bgcolor;?>>
            <?php
					 echo ($maxRecord);	
		 ?></td>
        <td align="left" bgcolor=<?=$bgcolor;?>><?=str_repeat("&nbsp;&nbsp;&nbsp;",$rs_list[$i]['LEVELS']).$rs_list[$i]['NAME'];?></td>
        <td align="center" bgcolor=<?=$bgcolor;?>><?=$rs_list[$i]['POSITION_NAME'];?></td>
        <td align="center" bgcolor=<?=$bgcolor;?>><?=$rs_list[$i]['WEB_STATS'];?></td>
        <td align="center" bgcolor=<?=$bgcolor;?>><?=$rs_list[$i]['TOOL_STATS'];?></td>
        <td align="center" bgcolor=<?=$bgcolor;?>><?=$rs_list[$i]['TOTALS'];?></td>
      </tr>
      <?php 
	  $maxRecord--;
	  } // End for ?>
      
      
      
      
    </tbody>
     <tr>
        <th align="center"  bgcolor="#FFCC33" ></th>        
        <th align="center"  bgcolor="#FFCC33" ></th>
        <th align="right"  bgcolor="#FFCC33" >รวมทั้งหมด :</th>
        <th align="center"  bgcolor="#FFCC33" ><?=$sumWeb;?></th>
        <th align="center"  bgcolor="#FFCC33" ><?=$sumTool;?></th>
        <th align="center"  bgcolor="#FFCC33" ><?=($sumWeb+$sumTool);?></th>
      </tr>
  </table>
</form>
<?php 
	$tbl->closeTable(); 
  }



?>
<div id="dialog-form-<?=$tbl->page;?>" title="<?=title_menu($_GET['setPage'])?>" style="display:none"></div>
<div id="dialog-form-graph" title="DW/DM Statistics " style="display:none"></div>
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<input name="hidMonths" id="hidMonths" type="hidden" value="<?=$currentMonth?>" />
<input name="hidYears" id="hidYears" type="hidden" value="<?=$currentYear?>" />

<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
<script src="./js/highcharts/highcharts.js"></script>
<script src="./js/highcharts/highcharts-3d.js"></script>
<!--<script src="./js/highcharts/highcharts-3d.js"></script>-->
<script src="./js/highcharts/exporting.js"></script>