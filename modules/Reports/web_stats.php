<?php
// Title Menu from function.php

$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;

 $sql_months = "SELECT DISTINCT
						  (DATE_FORMAT(login_date, '%m')) AS months,
						  (DATE_FORMAT(login_date, '%Y')) AS years	
						FROM 01_view_stats_by_login
						LIMIT 0,12";
$rs_months = $db->GetAll($sql_months);

$tbl->openTable();

?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td align="left" valign="middle">สถิติเดือน :
      <label>
        <select name="months" id="months" class="input">
          <?php					  
					  for($i=0;$i<count($rs_months);$i++){ //ThaiMonthFull as $key => $value){
						  $sel = $rs_months[$i]['months'] == date('m') ? ' selected ' : '';
						  echo "<option value='".$rs_months[$i]['months']."' $sel>".$ThaiMonthFull[$rs_months[$i]['months']]." ".($rs_months[$i]['years']+543)."</option>";	  
					  }
		  ?>
        </select>
      </label></td>
    <td align="right" valign="top"></td>
  </tr>
</table>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1" id="tab-1">สถิติตามรายวัน</a></li>
    <li><a href="#tabs-2" id="tab-2">สถิติตามตามผู้ใช้งาน</a></li>
    <li><a href="#tabs-3" id="tab-3">สถิติตามการใช้งานโปรแกรม</a></li>
  </ul>
  <div id="tabs-1"></div>  
  <div id="tabs-2"></div>
  <div id="tabs-3"></div>
</div>
<?php 
	$tbl->closeTable(); 
?>
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
