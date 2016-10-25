<?php
// Title Menu from function.php
include('../../includes/config.inc.php');
require_once("../../includes/Class/DataTable.Class.php");
$tbl = new dataTable();
$tbl->id = $_GET['setPage']."_reports_problems";
$tbl->title = "รายงานการตรวจสอบระบบ DW/DM";
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;
$tbl->pagingLength = 10;
$tbl->orderType = "DESC";

$years = $_GET['years'];
//show_get();
// Get data
 $sql = "SELECT
				  a.check_id,
				  check_date,
				  a.check_by,
				  b.user_desc,
				  a.problems,
				  a.solutions,
				  a.remarks
				FROM tbl_dwdm_checklist_detail a,
				  tbl_users b
				WHERE a.check_by = b.user_id
					AND (a.problems <> '' OR a.solutions <> '')
					AND YEAR(a.check_date) = $years
				ORDER BY a.check_date desc";
$rs_data = $db->GetAll($sql);




//$tbl->openTable();

?>
<div id="dialog-form-graph-content">
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td align="left" valign="middle">
<?php
      //show_get();
// Get years for select box
 $sql_years = "SELECT DISTINCT
						  YEAR(check_date ) AS years
						FROM tbl_dwdm_checklist_detail
						ORDER BY years DESC";
$rs_years = $db->GetAll($sql_years);


		echo "รายงานข้อมูลปี : ";
        echo "<select name='select_year_r' id='select_year_r'>";
          for($i=0;$i<count($rs_years);$i++){ //ThaiMonthFull as $key => $value){
			  $sel = $rs_years[$i]['years'] == $years ? ' selected ' : '';
			  
			echo "<option value='".$rs_years[$i]['years']."' $sel>".($rs_years[$i]['years']+543)."</option>";	  
		  }
		 echo    "</select>";
?>
</td>
    <td align="right" valign="top"></td>
  </tr>
</table>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1" id="tab-1">แสดงรายการที่มีปัญหา</a></li>
   
  </ul>
  <div id="tabs-1">
 <?php
  $tbl->openTemplate();
  ?>
   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display compact" id="<?=$tbl->id?>">
      <thead>
        <tr>
          <th width="13%">วันที่ตรวจสอบ</th>
          <th width="16%">ผู้ตรวจสอบ</th>
          <th width="47%">ปัญหา</th>
          <th width="24%">วิธีการแก้ไข</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i=0;$i<count($rs_data);$i++){ ?>
        <tr>
          <td align="center" valign="top"><?=$rs_data[$i]['check_date']?></td>
          <td align="center" valign="top"><?=$rs_data[$i]['user_desc']?></td>
          <td valign="top"><?=$rs_data[$i]['problems']?></td>
          <td valign="top"><?=$rs_data[$i]['solutions']?></td>
        </tr>
        <?php } // End For ?>
      </tbody>
    </table>
<?php
$tbl->closeTemplate();
?>
  </div>  
 
</div>
<?php 
//	$tbl->closeTable(); 
?>
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
</div>
<script type="text/javascript">
$(function () {
	
		
	// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();

		  $( "#tabs" ).tabs();
		
		$("#select_year_r").change(function(){
			 $.loading("load");			 
			$.get('./modules/'+setModule+'/'+setPage+'_reports_problems.php',		
							{setModule : setModule , setPage : setPage , years  :  $(this).val()  },						
									function(data) {																						
										$("#dialog-form-graph-content").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
		});
		
		
    });
    </script>
	



