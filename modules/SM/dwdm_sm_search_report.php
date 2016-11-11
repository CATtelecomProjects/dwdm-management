<?php
// Title Menu from function.php
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;
$tbl->saveState = true;
$tbl->pagingLength = "10";

$tbl->openTable();

$web = new MainWeb();


$emp_code = $_SESSION['sess_user_name'];
// ตรวจสอบ User ถ้ายังไม่มีการ login มาจาก BIS ให้ทำการไปตรวจสอบจาก BIS เพื่อหา รหัสผ่าน
if (!isset($_SESSION['sess_bis_user'])) {
    pageback('https://bis.cattelecom.com/modules/Login/check_id_ext.php?emp_code=' . $emp_code . '&setModule=SM&setPage=dwdm_sm_search_report', '');
    // กำหนด session เพื่อใช้งาน user ที่ส่งงานมาจาก bis
}


// ถ้าไม่มีการส่ง session รหัสพนักงาน จาก bis มาให้ใช้รหัสพนักงานจากระบบ back office
$userid = isset($_SESSION['sess_bis_user']) ? $_SESSION['sess_bis_user'] : $_SESSION['sess_user_name'];

//รับค่าจากตัวแปร _GET
$search_string = $_GET['q'];

//กำหนด field ที่ต้องการค้นหา
$field = array('s.module_name', 'm.report_name', 'm.report_desc', 'm.report_keyword', 'm.report_url', 'm.report_source');

// แยกตัวแปรออกเป็น Array
$input = explode(',', $search_string);


// แยก keyword
$loop = 0;
foreach ($field as $f) {
    foreach ($input as $i) {
        $ex = $loop == 0 ? " " : "OR";
        $sql_string .= " $ex (" . $f . " LIKE '%" . $i . "%')";
        $loop++;
    }
}

// ถ้าไม่มีการส่ง keyword ไม่มีเงื่อืนไขค้นหา
$concat_sql = !isset($_GET['q']) ? "" : " WHERE $sql_string ";

/*
  echo  $sql_list = "SELECT
  s.module_name,
  m.*
  FROM tbl_sm_sub_module s JOIN (
  SELECT
  r.*,
  t.is_auth
  FROM tbl_sm_report r
  LEFT JOIN (SELECT DISTINCT
  (m.report_id),
  'Y'        AS is_auth
  FROM tbl_sm_mapping_report m
  JOIN tbl_sm_report r
  ON m.report_id = r.report_id
  WHERE m.rep_group_id IN(SELECT
  rep_group_id
  FROM tbl_sm_report_group
  WHERE rep_group_id IN(SELECT
  rep_group_id
  FROM tbl_sm_mapping_user
  WHERE emp_code = '$userid'))) AS t
  ON r.report_id = t.report_id) AS M ON s.sub_module_id = m.sub_module_id
  WHERE m.actived = 'Y'
  $concat_sql
  ORDER BY s.module_name,m.report_name";
 */
// List User Group

$sql_list = "SELECT
                s.module_name,
               m.*
               FROM tbl_sm_sub_module s JOIN (
               SELECT
                 r.*,
                 t.is_auth
               FROM tbl_sm_report r
                 LEFT JOIN (SELECT DISTINCT
                                          (m.report_id),
                                          'Y'        AS is_auth
                                        FROM tbl_sm_mapping_report m
                                          JOIN tbl_sm_report r
                                                ON m.report_id = r.report_id
                                        WHERE m.rep_group_id IN(
                                                                       SELECT	 rep_group_id
                                                                  FROM tbl_sm_mapping_user
                                                                  WHERE emp_code = '$userid')) AS t
                       ON r.report_id = t.report_id 
                       WHERE  r.actived = 'Y') AS M 
                       ON s.sub_module_id = m.sub_module_id    					
                               $concat_sql
                       ORDER BY s.module_name,m.report_name";
$rs_list = $db->GetAll($sql_list);
?>
<style type="text/css">
    /* dataTables_info */
    .dataTables_filter {
        display: none;
    }
    #contact {
        text-indent: 10px;
        border-radius: 4px;
        -moz-border-radius: 4px;
    }
</style>
<script src="./js/jQuery-tagEditor/jquery.tag-editor.min.js"></script>
<link rel="stylesheet" type="text/css" href="./js/jQuery-tagEditor/jquery.tag-editor.css">

<form action="" method="get">
    <input type="hidden" name="setModule" id="setModule" value="<?= $_GET['setModule'] ?>" />
    <input type="hidden" name="setPage" id="setPage" value="<?= $_GET['setPage'] ?>" />
    <div id="searchTool">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="40" align="left" valign="top" class="ui-state-highlight"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="1%">&nbsp;</td>
                            <td width="57%"><label for="emp_name" ><strong> ค้นหารายงาน : </strong> <small>(เช่น  ชื่อรายงาน , รายละเอียดรายงาน เป็นต้น)</small> </label>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th width="65%" align="left" scope="col"> <input name="q" type="text" id="q" size="60"  value="<?= $_GET['q'] ?>">
                                        </th>
                                        <th width="35%" align="left" scope="col">&nbsp;
                                            <button type='Submit'  id='btnSearch'>ค้นหา</button>
                                            <button type='reset'  id='btnReset'>ล้าง</button></th>
                                    </tr>
                                    <tr>
                                        <td align="left" scope="col">&nbsp;</td>
                                        <td align="left" scope="col">&nbsp;</td>
                                    </tr>
                                </table></td>
                            <td width="42%" align="right"><div id="divContact"  style="font-weight:normal; display:none">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                        <tr>
                                            <td width="50%">&raquo;  CM : ธนาทิพย์ฯ (ติ๋ว)  7336 , ภัทริกาฯ (อ๊อฟ)  7334</td>
                                            <td width="50%">&raquo;  FI : ณัฐวัฒน์ฯ (ไผ่)  7336 , พิสิฐฯ (ตั้ง)  7333</td>
                                        </tr>
                                        <tr>
                                            <td>&raquo;  HKR : พรรณี (ตุ้ย)  7333 , พิสิฐฯ (ตั้ง)  7333</td>
                                            <td>&raquo;  NUA : ธรรมรัฐฯ (หนึ่ง)  7333 , ปิยะพงษ์ฯ (ติง)  7334</td>
                                        </tr>
                                    </table>
                                </div>
                                <span id='btncontact'>
                                    <button type="button">ติดต่อเจ้าหน้าที่</button>
                                </span></td>
                        </tr>
                    </table></td>
            </tr>
            <tr valign="top">
                <td width="42%" align="left"><div style="padding-bottom:5px"></div>
                    <div id="showData">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display compact" id="<?= $tbl->id; ?>">
                            <thead>
                                <tr>
                                    <th width="6%" align="center">โมดูล</th>
                                    <th width="24%" align="center">ชื่อรายงาน</th>
                                    <th width="39%" align="center"> รายละเอียดรายงาน</th>
                                    <th width="13%" align="center">ระบบต้นทาง</th>
                                    <th width="11%" align="center">เจ้าของรายงาน</th>
                                    <th width="7%" align="center">ดูรายงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($rs_list); $i++) {
                                    $is_auth = $rs_list[$i]['is_auth'];
                                    $report_id = $rs_list[$i]['report_id'];
                                    //$report_type = $rs_list[$i]['report_type'];	 
                                    //$report_url =  $rs_list[$i]['report_url'];	 

                                    if ($is_auth == "Y") {
                                        $img = "<img src='./images/menu_actions/icon-view.png' border='0' title='เปิดดูรายงาน' class='tooltips'>";
                                        // $link = "<a href='./modules/".$_GET['setModule']."/open_dwdm_report.php?reportURL=$report_url&report_type=$report_type'  target='_blank'>$img</a>";
                                        $link = "<a href='./modules/" . $_GET['setModule'] . "/open_dwdm_report.php?report_id=$report_id'  target='_blank'>$img</a>";
                                    } else {
                                        $img = "<img src='./images/icon-cancel.png' border='0' class='tooltips' title='ยังไม่มีสิทธิ์ดูรายงานนี้'>";
                                        $link = $img;
                                    }
                                    ?>
                                    <tr>
                                        <td align="center"><?= highlight($rs_list[$i]['module_name'], $search_string); ?></td>
                                        <td><?= highlight($rs_list[$i]['report_name'], $search_string); ?></td>
                                        <td><?= highlight($rs_list[$i]['report_desc'], $search_string); ?></td>
                                        <td><?= highlight($rs_list[$i]['report_source'], $search_string); ?></td>
                                        <td><?= highlight($rs_list[$i]['report_owner'], $search_string); ?></td>
                                        <td align="center"><?= $link ?></td>
                                    </tr>
                                <?php } // End For  ?>
                            </tbody>
                        </table>
                    </div></td>
            </tr>
        </table>
    </div>
</form>
<?php
//}
$tbl->closeTable();
?>
<div id="dialog-form-<?= $_GET['setPage']; ?>"  style="display:none"></div>
<script type="text/javascript" src="./modules/<?= $_GET['setModule'] ?>/<?= $_GET['setPage'] ?>.js"></script>
<div class="ui-state-highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#F00; font-size:small;"><strong>หมายเหตุ</strong> : เมื่อต้องการกลับมายังหน้าค้นหาให้ทำการกดปิดหน้าต่างของรายงานที่กำลังเปิดอยู่ หรือ ทำการ logout ออกจากระบบ และห้ามกดที่เมนู Portal <img src="./images/search_webreport_not_click.png" width="194" height="41"></span></div>
