<?php
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 1;

$db->debug=0;

$tbl->openTable();

//$strSQL = $module <> "ALL" ? "WHERE r.module_name = '$module'" : "";

$sql = "SELECT
			  a.*,
			  b.sub_module_name
			FROM tbl_sm_terminology a
			  JOIN tbl_sm_sub_module b
				ON a.sub_module_id = b.sub_module_id
			ORDER BY a.sub_module_id";

$rs = $db-> GetAll($sql);

?>

<!--<script src="./vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables/datatables/media/js/dataTables.jqueryui.min.js"></script>
<link rel="stylesheet" type="text/css" href="./vendor/datatables/datatables/media/css/dataTables.jqueryui.min.css">-->
<script type="text/javascript" src="./modules/<?=$tbl->module?>/<?=$tbl->page?>.js"></script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display compact" id="<?=$tbl->id?>">
  <thead>
    <tr>
            <th width='6%' class="header_height">จัดการ</th>
            <th width='27%'>กลุ่มรายงาน</th>
            <th width='18%'>คำศัพท์</th>
            <th width='37%'>รายละเอียดคำศัพท์</th>                       
            <th width='12%'>วันที่ปรังปรุงล่าสุด</th>
          </tr>
  </thead> 
  <tbody>
    <?php
	if(sizeof($rs)>0){
		for($i=0;$i<sizeof($rs);$i++){
		?>
				<tr>
				<td align="center"> <input type="radio" name="selID" id="selID_<?=$rs[$i]['id']?>" value="<?=$rs[$i]['id']?>"/></td>
				<td><?=$rs[$i]['sub_module_name'];?></td>
				<td><?=$rs[$i]['word'];?></td>
				<td><?=$rs[$i]['descriptions'];?></td>
				<td align="center"><?=$rs[$i]['update_time'];?></td>
				</tr>
         <?php
		}
	}

?>
  </tbody>
</table>
<?php 
	$tbl->closeTable(); 
?>
<div id="dialog-form-<?=$tbl->page;?>" style="display:none"></div>
<div id="dialog-confirm" title="Comfirm!!">ยืนยันการลบข้อมูล ?</div>
<input type="hidden" name="hidRadio" id="hidRadio" value="" />
<input type="hidden" name="setModule" id="setModule" value="<?=$tbl->module?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$tbl->page?>" />
<input type="hidden" name="setTitle" id="setTitle" value="<?=$tbl->title?>" />

<script type="text/javascript">
    $(document).ready(function() {
		
		//$.DataTableMerg('tbl_terminology' ,1 ,25 , 60 ,5 ); // table_id , target, Length , scrollY ,colspan

} );
</script>