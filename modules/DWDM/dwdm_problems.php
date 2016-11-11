<?php
// Title Menu from function.php
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 6;
$tbl->orderType = "desc";
$tbl->pagingLength = "50";

$db->debug = 0;

$tbl->openTable();

$sql_cate = "SELECT
                    cate_id,
                    cate_name
                  FROM tbl_dwdm_category
                  WHERE active = 'Y'
                  ORDER BY menu_order";
$rs_cate = $db->GetAll($sql_cate);


// P = Process
// S = Success		
$arrayStatus = array("P" => "กำลังดำเนินการ", "S" => "ดำเนินการเสร็จแล้ว");

//ถ้ามีการเลือกให้ where ตามค่าที่เลือก ถ้าไม่ ให้เอาค่า problem_status มา where
$problem_status = $_GET['problem_status'] ? $_GET['problem_status'] : "P";

$cate_id = $_GET['cate_id'];


// เงื่อนไขการแสดง
if (isset($_GET['problem_status']) && $problem_status <> "A") {
    $str_query = " AND  a.problem_status = '$problem_status' ";
} else if ($problem_status == "A") {
    $str_query = " ";
} else {
    $str_query = " AND  a.problem_status = 'P' ";
}

// เงื่อนไขการแสดง
if (isset($_GET['cate_id']) && $cate_id <> "ALL") {
    $str_query_cate = " AND  a.cate_id = $cate_id ";
} else if ($cate_id == "ALL") {
    $str_query_cate = " ";
}

$sql_list = "SELECT a.id,
                            a.cate_id,
                            a.problem_status,
                            DATE_FORMAT(a.problem_date_start, '%Y-%m-%d %H:%i') AS problem_date_start,
                            a.problem_topic,
                            a.problem_owner,
                            a.problem_by,
                            a.problem_solution,
                            DATE_FORMAT(a.problem_date_finish, '%Y-%m-%d %H:%i') AS problem_date_finish,
                            a.problem_remark,
                            a.update_time,
                            a.update_by,
                            b.cate_name, 
                            b.cate_name
          FROM tbl_dwdm_problems a,
                            tbl_dwdm_category b	
          WHERE a.cate_id = b.cate_id 	
          $str_query	 $str_query_cate		 
          ORDER BY a.problem_date_start DESC ";
$rs_list = $db->GetAll($sql_list);
?>
<script type="text/javascript" src="./modules/<?= $_GET['setModule'] ?>/<?= $_GET['setPage'] ?>.js"></script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
    <tr>
        <td align="left" valign="middle">สถานะตรวจสอบ :
            <label>
                <select name="problem_status" id="problem_status">
                    <option value="A">สถานะทั้งหมด</option>
                    <option value="P" <?= $problem_status == "P" ? "selected" : ""; ?>>กำลังดำเนินการ</option>
                    <option value="S" <?= $problem_status == "S" ? "selected" : ""; ?>>ดำเนินการเสร็จแล้ว</option>              
                </select>
            </label>

            หมวดหมู่ : 
            <label for="sel_cate_id"></label>
            <select name="sel_cate_id" id="sel_cate_id">
                <option value="ALL" <?= $_GET['cate_id'] == "ALL" ? "selected" : ""; ?>>แสดงทั้งหมด</option>
<?php
genOptionSelect($rs_cate, 'cate_id', 'cate_name', $_GET['cate_id']);
?>        
            </select>
        </td>
        <td align="right" valign="top"><?= MENU_ACTION ?></td>
    </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display compact" id="<?= $tbl->id; ?>">
    <thead>
        <tr>
            <th width="4%"  class="header_height">จัดการ</th>
            <th width="8%">หมวดหมู่</th>
            <th width="51%">ปัญหา/อาการ</th>
            <th width="11%">ผู้แจ้งปัญหา</th>
            <th width="8%">สถานะ</th>
            <th width="9%">วันที่แจ้งปัญหา</th>
            <th width="9%">วันที่แล้วเสร็จ</th>
        </tr>
    </thead>
    <tbody>
<?php
for ($i = 0; $i < count($rs_list); $i++) {
    $problem_status_str = $arrayStatus[$rs_list[$i]['problem_status']];
    ?>
            <tr>
                <td align="center" valign="top"><label>
                        <input type="radio" name="selID" id="selID_<?= $rs_list[$i]['id'] ?>" value="<?= $rs_list[$i]['id'] ?>" <?= $i == 0 ? 'checked' : '' ?>/>
                    </label><?= $rs_list[$i]['id'] ?></td>
                <td align="center" valign="top"><?= $rs_list[$i]['cate_name'] ?></td>
                <td align="left" valign="top"><a href="#" class="OpenView" rel="<?= $rs_list[$i]['id'] ?>"><?= $rs_list[$i]['problem_topic'] ?></a></td>
                <td valign="top"><?= $rs_list[$i]['problem_owner'] ?></td>
                <td align="center" valign="top"><?= $problem_status_str ?></td>
                <td align="center" valign="top"><?= $rs_list[$i]['problem_date_start']; ?></td>
                <td align="center" valign="top"><?= $rs_list[$i]['problem_status'] == "S" ? $rs_list[$i]['problem_date_finish'] : "N/A"; ?></td>
            </tr>
<?php } // End for  ?>
    </tbody>
</table>
<?php
$tbl->closeTable();
?>
<div id="dialog-form-<?= $_GET['setPage']; ?>" style="display:block"></div>
<div id="dialog-confirm" title="Comfirm!!">ยืนยันการลบข้อมูล ?</div>
<input type="hidden" name="hidRadio" id="hidRadio" value="<?= $rs_list[0]['id'] ?>" />
<input type="hidden" name="setModule" id="setModule" value="<?= $_GET['setModule'] ?>" />
<input type="hidden" name="setPage" id="setPage" value="<?= $_GET['setPage'] ?>" />
<input type="hidden" name="setTitle" id="setTitle" value="<?= $tbl->title ?>" />