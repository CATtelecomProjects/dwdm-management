<?php
include "./includes/Class/SM.Class.php";
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;

$db->debug=0;

$SM = new SM();
$SM->_db = $db;
//$tbl->openTable();

// List Module
$sess_user_id = $_SESSION['sess_user_id'];
// List Module
$rs_module = $SM->listModules($sess_user_id);

//ถ้ามีการเลือกให้ where ตามค่าที่เลือก ถ้าไม่ ให้เอาค่า module_name มา where
$get_module = isset($_GET['module_name']) ? $_GET['module_name'] : $rs_module[0]['module_name'];


?>
<style type="text/css">
#<?=$tbl->id;
?> td:nth-child(3), td:nth-child(4), td:nth-child(5), td:nth-child(6) {
 text-align: center;
}
</style>
<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
<table width="100%" border="0" cellspacing="2" cellpadding="0" class='ui-widget-content'>
  <tr>
    <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
        <tr>
          <td align='left' valign='middle' height='20'><div class='txt_header'> <b>
              <?=$tbl->title?>
              </b></div></td>
          <td align='right' valign='top'><?=$tbl->menu?></td>
        </tr>
        <tr>
          <td align="left" valign="middle"> Module  :
            <label>
        <select name="module_name" id="module_name" class="input">
          <?php					  
					  genOptionSelect($rs_module,'module_name','module_name',$_GET['module_name'],'','module_desc');
		  ?>
        </select>
      </label></td>
    <td align="right" valign="top"><?=MENU_ACTION?></td>
  </tr>
</table>
<table width='100%' border='0' cellpadding='0' cellspacing='0' class='display compact' id='<?=$tbl->id;?>'>
  <thead>
    <tr>
      <th width='5%' class="header_height">Manage</th>
      <th width='53%'>Report Group Name</th>
      <th width='10%'>Group Type</th>
      <th width='11%'>Used</th>
      <th width='9%'>Order</th>
      <th width='12%'>Update Time</th>
    </tr>
  </thead>
</table>
<?php 
	//$tbl->closeTable(); 
?>
<div id="dialog-form-<?=$tbl->page;?>" style="display:none"></div>
<div id="dialog-confirm" title="Comfirm!!">ยืนยันการลบข้อมูล ?</div>
<input type="hidden" name="hidRadio" id="hidRadio" value="" />
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<input type="hidden" name="setTitle" id="setTitle" value="<?=$tbl->title?>" />
<script>
	$(function(){		
		
		$.DataTableServSide('<?=$tbl->id;?>' , '<?=$_GET['setModule']?>'  ,'<?=$_GET['setPage']?>' , 'module_name' ,'<?=$get_module?>' );	

    } );
	

	
</script> 
