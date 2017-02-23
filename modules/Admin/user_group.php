<?php
// Title Menu from function.php
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 4;
$tbl->orderType = "desc";

$tbl->openTable();

// List User Group
$sql_list = "SELECT *
				FROM tbl_user_group ORDER BY update_time DESC ";
$rs_list = $db->GetAll($sql_list);

?>
<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display compact" id="<?=$tbl->id;?>">
  <thead>
    <tr>
      <th width="6%"  class="header_height">จัดการ</th>
      <th width="10%" align="center">รหัสกลุ่มผู้ใช้งาน</th>
      <th width="37%" align="center">ชื่อกลุ่มผู้ใช้งาน</th>
      <th width="29%" align="center">รายละเอียดกลุ่มผู้ใช้งาน</th>
      <th width="18%" align="center">วันที่ปรับปรุงแก้ไข</th>
    </tr>
  </thead>
  <tbody>
         <?php for($i=0;$i<count($rs_list);$i++){ ?>
            <tr>
              <td align="center"> <input type="radio" name="selID" id="selID_<?=$rs_list[$i]['group_id']?>" value="<?=$rs_list[$i]['group_id']?>" <?=$i==0?'checked':''?>/></td>
              <td align="center"><?=$rs_list[$i]['group_id']?></td>
              <td><?=$rs_list[$i]['group_name']?></td>
              <td><?=$rs_list[$i]['group_desc']?></td>
              <td align="center"><?=$rs_list[$i]['update_time'];?></td>
            </tr>
            <?php } // End For ?>
           </tbody>
</table>
<?php 
	$tbl->closeTable(); 
?>
<div id="dialog-form-<?=$_GET['setPage'];?>" style="display:none"></div>
<div id="dialog-confirm" title="Comfirm!!">ยืนยันการลบข้อมูล ?</div>
<input type="hidden" name="hidRadio" id="hidRadio" value="<?=$rs_list[0]['group_id']?>" />
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<input type="hidden" name="setTitle" id="setTitle" value="<?=$tbl->title?>" />