<?php
// Title Menu from function.php

$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;


$tbl->openTable();

$arrTabs = array(1=>"ค้นหารายละเอียดผู้ใช้งาน",
						 2=>"ค้นหาตามกลุ่มรายงาน",
						 3=>"ค้นหาตามหน่วยงาน",
						 4=>"ค้นหาตามตำแหน่งงาน");

?>
<style type="text/css">
 .divSearchContent {	   
   /* max-width: 1260px;
    min-width: 780px;
	height:90%;
    margin: 0 auto;     
    overflow: scroll; */
 }
</style>
<div id="tabs">
  <ul>
  <?php
 		foreach($arrTabs as $key => $value){			
			echo  "<li><a href=\"#tabs-$key\" id=\"tab-$key\">$value</a></li>";		
		}
?>
  </ul>
  <?php
 		foreach($arrTabs as $key => $value){			
			echo  "<div id=\"tabs-$key\" class=\"divSearchContent\"></div>";	
		}
?>

</div>
<?php 
	$tbl->closeTable(); 
?>

<form id="form_<?=$_GET['setPage']?>" name="form_<?=$_GET['setPage']?>" method="post" action="">
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
</form>
