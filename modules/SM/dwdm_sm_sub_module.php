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

$tbl->openTable();

$SM = new SM();
$SM->_db = $db;

$sess_user_id = $_SESSION['sess_user_id'];
// List Module
$rs_module = $SM->listModules($sess_user_id);

//ถ้ามีการเลือกให้ where ตามค่าที่เลือก ถ้าไม่ ให้เอาค่า module_name มา where
$get_module = isset($_GET['module_name']) ? $_GET['module_name'] : $rs_module[0]['module_name'];

// List Sub Module
 $sql_list = "SELECT
				  b.sub_module_id,
				  a.module_name,
				  a.module_desc ,
				  b.sub_module_name,
				  b.update_time
				FROM tbl_sm_module a
				  INNER JOIN tbl_sm_sub_module b
					ON a.module_name = b.module_name
				WHERE a.module_name = '$get_module'
				ORDER BY a.module_name";
$rs_list = $db->GetAll($sql_list);


?>
<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td align="left" valign="middle">Module  :
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
      <th width='8%' class="header_height">Manage</th>
      <th width='67%'>Sub-Module Name</th>
      <th width='25%'>Update Time</th>      
    </tr>
  </thead>
  <tbody>
    <?php for($i=0;$i<count($rs_list);$i++){ ?>
    <tr>
      <td align='center'><input type="radio" name="selID" id="selID_<?=$rs_list[$i]['sub_module_id']?>" value="<?=$rs_list[$i]['sub_module_id']?>" <?=$i==0?'checked':''?>/></td>
      <td><?=$rs_list[$i]['sub_module_name']?></td>
      <td align="center"><?=$rs_list[$i]['update_time']?></td>     
    </tr>
       <?php }  // End For ?>

  </tbody>
</table>
<?php 
	$tbl->closeTable(); 
?>
<div id="dialog-form-<?=$tbl->page;?>" style="display:none"></div>
<div id="dialog-confirm" title="Comfirm!!">ยืนยันการลบข้อมูล ?</div>
<input type="hidden" name="hidRadio" id="hidRadio" value="<?=$rs_list[0]['sub_module_id']?>" />
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<input type="hidden" name="setTitle" id="setTitle" value="<?=$tbl->title?>" />