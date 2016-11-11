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
    pageback("https://bis.cattelecom.com/modules/Login/check_id_ext.php?emp_code=" . $emp_code . "&setModule=SM&setPage=dwdm_sm_search_terminology", "");
    // กำหนด session เพื่อใช้งาน user ที่ส่งงานมาจาก bis
}


// ถ้าไม่มีการส่ง session รหัสพนักงาน จาก bis มาให้ใช้รหัสพนักงานจากระบบ back office
$userid = isset($_SESSION['sess_bis_user']) ? $_SESSION['sess_bis_user'] : $_SESSION['sess_user_name'];

//รับค่าจากตัวแปร _GET
$search_string = $_GET['q'];

//กำหนด field ที่ต้องการค้นหา
//$field = array('s.module_name','m.report_name','m.report_desc','m.report_keyword','m.report_url','m.report_source');
// แยกตัวแปรออกเป็น Array
//$input  = explode(',',$search_string);
// แยก keyword
/* $loop = 0;
  foreach($field as $f){
  foreach ($input as $i){
  $ex = $loop == 0 ? " " : "OR";
  $sql_string .= " $ex (".$f." LIKE '%".$i."%')";
  $loop++;
  }
  } */

// ถ้าไม่มีการส่ง keyword ไม่มีเงื่อืนไขค้นหา
//$concat_sql = !isset($_GET['q']) ? ""  : " WHERE $sql_string ";

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

/*  $sql_list = "SELECT
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
 */
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
<!--<script src="./js/jQuery-tagEditor/jquery.tag-editor.min.js"></script>
<link rel="stylesheet" type="text/css" href="./js/jQuery-tagEditor/jquery.tag-editor.css">-->

<form action="" method="get">
    <input type="hidden" name="setModule" id="setModule" value="<?= $_GET['setModule'] ?>" />
    <input type="hidden" name="setPage" id="setPage" value="<?= $_GET['setPage'] ?>" />
    <div id="searchTool">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="40" align="left" valign="top" class="ui-state-highlight"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="1%">&nbsp;</td>
                            <td width="57%"><label for="emp_name" ><strong> ค้นหานิยามคำศัพท์ : </strong> <small>(เช่น  รายได้ , ลูกค้า, เจ้าหนี้ เป็นต้น)</small> </label>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th colspan="2" align="left" scope="col"> <input name="q" type="text" id="q" size="80"  value="<?= $_GET['q'] ?>">
                                            &nbsp;
                                            <!--<button type='Submit'  id='btnSearch'>ค้นหา</button>-->
                                            <button type='reset'  id='btnReset'>ค้นใหม่</button></th>
                                    </tr>
                                    <tr>
                                        <td width="65%" align="left" scope="col">&nbsp;</td>
                                        <td width="35%" align="left" scope="col">&nbsp;</td>
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