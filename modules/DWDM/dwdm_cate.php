<?php
// Title Menu from function.php
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 1;


$tbl->openTable();


$web = new MainWeb();

// List User Group
$sql_list = "SELECT *
				FROM tbl_dwdm_category  ORDER BY menu_order ";
$rs_list = $db->GetAll($sql_list);

?>
<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display compact" id="<?=$tbl->id;?>">
  <thead>
    <tr>
      <th width="9%"  class="header_height">จัดการ</th>
      <th width="14%" align="center">ลำดับ</th>
      <th width="40%" align="center">ชื่อหมวดหมู่</th>
      <th width="16%" align="center">เผยแพร่</th>
      <th width="21%" align="center">วันที่ปรับปรุงล่าสุด</th>
    </tr>
  </thead>
  <tbody>
         <?php for($i=0;$i<count($rs_list);$i++){ ?>
            <tr>
              <td align="center"> <input type="radio" name="selID" id="selID_<?=$rs_list[$i]['cate_id']?>" value="<?=$rs_list[$i]['cate_id']?>" <?=$i==0?'checked':''?>/></td>
              <td align="center"><?=$rs_list[$i]['menu_order'];?></td>
              <td><?=$rs_list[$i]['cate_name']?></td>
              <td align="center"><?=$web->ShowActiveIcon($rs_list[$i]['active']);?></td>
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
<input type="hidden" name="hidRadio" id="hidRadio" value="<?=$rs_list[0]['cate_id']?>" />
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<input type="hidden" name="setTitle" id="setTitle" value="<?=$tbl->title?>" />