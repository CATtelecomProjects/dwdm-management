<?php
include "./includes/Class/SM.Class.php";
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;

$db->debug = 0;

$SM = new SM();
$SM->_db = $db;


// List Sub-Module
$sess_user_id = $_SESSION['sess_user_id'];
if (!isset($_GET['sub_module_id'])) {
    /* $sql_sub_module1 = "SELECT
      sub_module_id,
      sub_module_name,
      module_name
      FROM tbl_sm_sub_module
      WHERE module_name IN(SELECT
      module_name
      FROM tbl_module_auth
      WHERE user_id = $sess_user_id)
      ORDER BY module_name,sub_module_name"; */
    $rs_sub_module = $SM->getSubModule($sess_user_id);
}

$rs_module = $SM->listModules($sess_user_id);
?>
<style type="text/css">
    #<?= $tbl->id;
?>   td:nth-child(6),td:nth-child(7) {
        text-align: center;
    }
</style>
<script type="text/javascript" src="./modules/<?= $_GET['setModule'] ?>/<?= $_GET['setPage'] ?>.js"></script>
<table width="100%" border="0" cellspacing="2" cellpadding="0" class='ui-widget-content'>
    <tr>
        <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
                <tr>
                    <td align='left' valign='middle' height='20'><div class='txt_header'> <b>
                                <?= $tbl->title ?>
                            </b></div></td>
                    <td align='right' valign='top'><?= $tbl->menu ?></td>
                </tr>
                <tr>
                    <td align="left" valign="middle"><strong>Sub Module  :</strong>
                        <label>
                            <select name="sub_module_id" id="sub_module_id" class="input">
                                <?php
                                // List Module
                                //ถ้ามีการเลือกให้ where ตามค่าที่เลือก ถ้าไม่ ให้เอาค่า module_name มา where
                                $get_sub_module_id = isset($_GET['sub_module_id']) ? $_GET['sub_module_id'] : $rs_sub_module[0]['sub_module_id'];
                                $SM->listSubModule($get_sub_module_id, $rs_module);
                                ?>
                            </select>
                        </label></td>
                    <td align="right" valign="top"><?= MENU_ACTION ?></td>
                </tr>
            </table>
            <table width='100%' border='0' cellpadding='0' cellspacing='0' class='display compact' id='<?= $tbl->id; ?>'>
                <thead>
                    <tr>
                        <th width='5%' class="header_height">Manage</th>
                        <th width='22%'>Report Name</th>
                        <th width='36%'>Report Description</th>                       
                        <th width='10%'>Source</th>
                        <th width='11%'>Owner</th>
                        <th width='6%'>Actived</th>
                        <th width='10%'>Update Time</th>
                    </tr>
                </thead>
            </table></td>
    </tr>
</table>
<?php
//$tbl->closeTable(); 
?>
<div id="dialog-form-<?= $tbl->page; ?>" style="display:none"></div>
<div id="dialog-confirm" title="Comfirm!!">ยืนยันการลบข้อมูล ?</div>
<input type="hidden" name="hidRadio" id="hidRadio" value="" />
<input type="hidden" name="setModule" id="setModule" value="<?= $_GET['setModule'] ?>" />
<input type="hidden" name="setPage" id="setPage" value="<?= $_GET['setPage'] ?>" />
<input type="hidden" name="setTitle" id="setTitle" value="<?= $tbl->title ?>" />

<script>
    $(function () {

        $.DataTableServSide('<?= $tbl->id; ?>', '<?= $_GET['setModule'] ?>', '<?= $_GET['setPage'] ?>', 'sub_module_id', '<?= $get_sub_module_id ?>');

    });

</script> 
