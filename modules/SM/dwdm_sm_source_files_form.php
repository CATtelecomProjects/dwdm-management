<?php
@session_start();
require_once("../../includes/config.inc.php");
include "../../includes/Class/Main.Class.php";
include "../../includes/Class/SM.Class.php";

$SM = new SM();
$SM->_db = $db;

// Show Edit Value
//show_get();
if ($_GET['doAction'] == "edit") {
    $id = $_GET['id'];
    $sql_edit = "SELECT *
                        FROM tbl_sm_source_files
                        WHERE source_id =  $id";
    $rs_edit = $db->GetRow($sql_edit);

    $module_name = $rs_edit['module_name'];
} else {
    $module_name = $_GET['select_id'];
}

// กำหนด Path ที่เก็บ Souce Code
$sess_user_id = $_SESSION['sess_user_id'];
// List Module
$rs_module = $SM->listModules($sess_user_id);
?>
<script language="javascript">

    $(function () {

        ajaxLoading();

        //doAction
        var actions = '<?= $_GET['doAction'] ?>';
        //Modules
        var modules = '<?= $_GET['modules'] ?>';
        //Page
        var pages = '<?= $_GET['pages'] ?>';

        //ID
        var id = '<?= $id ?>';

        $.FormAction(actions, modules, pages, id, false);


    });
</script>


<form id="form_<?= $_GET['pages'] ?>" name="form_<?= $_GET['pages'] ?>" method="post" action="">
    <table width="100%" border="0" cellspacing="2" cellpadding="3">
        <tr>
            <td>&nbsp;</td>
            <td>*<strong>โมดูล</strong>: <br />
                <label for="module_name"></label>
                <select name="module_name" id="module_name">
                    <?php
                    genOptionSelect($rs_module, 'module_name', 'module_name', $module_name, '', 'module_desc');
                    ?>
                </select></td>
        <tr>
            <td width="7%">&nbsp;</td>
            <td><strong>*ระบบไฟล์ต้นทาง</strong> :<br />
                <span id="sprytextfield2">
                    <label>
                        <input name="source_name" type="text" id="source_name" value="<?= $rs_edit['source_name'] ?>" size="70" maxlength="60" />
                    </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><strong>*ชื่อไฟล์ต้นทาง :</strong><br>
                <span id="sprytextfield1">
                    <label for="source_file_name"></label>
                    <input name="source_file_name" type="text" id="source_file_name" value="<?= $rs_edit['source_file_name'] ?>" size="70" maxlength="60">
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><strong>รายละเอียดไฟล์ต้นทาง : </strong><br>
                <textarea name="source_file_desc" cols="70" id="source_file_desc"><?= $rs_edit['source_file_desc'] ?></textarea></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><strong>*ความถี่ในการส่งข้อมูล : <br></strong>
                <span id="sprytextfield4">
                    <label for="frequency_of_data"></label>
                    <input name="frequency_of_data" type="text" id="frequency_of_data" size="35" value="<?= $rs_edit['frequency_of_data'] ?>">
                    <span class="textfieldRequiredMsg">A value is required.</span></span>      </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><strong>*ประเภทข้อมูล : <br>
                    <label for="source_type"></label>
                    <select name="source_type" id="source_type">
                        <option value="M" <?= $rs_edit['source_type'] == "M" ? "selected" : "" ?>>Master/Lookup</option>
                        <option value="T"  <?= $rs_edit['source_type'] == "T" ? "selected" : "" ?>>Transaction</option>
                    </select>
                </strong></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><fieldset style="width:60%">
                    <legend><strong>ข้อมูลผู้ดูแลระบบต้นทาง :</strong><br>

                    </legend>
                    <strong>ฝ่าย :</strong>        <br>
                    <input name="admin_division" type="text" id="admin_division" value="<?= $rs_edit['admin_division'] ?>" size="70" maxlength="60" />
                    <br>
                    <strong>ส่วน :</strong> <br>
                    <input name="admin_section" type="text" id="admin_section" value="<?= $rs_edit['admin_section'] ?>" size="70" maxlength="60" />
                    <strong><br>
                        ชื่อผู้ดูแล :</strong> <br>
                    <input name="admin_name" type="text" id="admin_name" value="<?= $rs_edit['admin_name'] ?>" size="70" maxlength="60" />
                </fieldset></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><fieldset  style="width:60%">
                    <legend><strong>ข้อมูลผู้รับผิดชอบข้อมูล :</strong><br>

                    </legend>
                    <strong>ฝ่าย :</strong>        <br>
                    <input name="owner_division" type="text" id="owner_division" value="<?= $rs_edit['owner_division'] ?>" size="70" maxlength="60" />
                    <br>
                    <strong>ส่วน :</strong> <br>
                    <input name="owner_section" type="text" id="owner_section" value="<?= $rs_edit['owner_section'] ?>" size="70" maxlength="60" />
                    <strong><br>
                        ชื่อผู้รับผิดชอบ :</strong> <br>
                    <input name="owner_name" type="text" id="owner_name" value="<?= $rs_edit['owner_name'] ?>" size="70" maxlength="60" />
                </fieldset></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <?php
            $arrDataType = array("R" => "R=Read",
                "W" => "W=Write",
                "A" => "A=Analytics",
                "X" => "X=Admin");
            ?>
            <td width="93%"><strong>*หมายเหตุ :</strong><br>
                <label for="remark"></label>
                <label for="remark"></label>
                <textarea name="remark" id="remark" cols="70"><?= $rs_edit['remark'] ?></textarea>
                <br></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2"><strong>สถานะ :</strong> <br>
                <!-- Switch -->
                <div class="switch">
                    <input type="checkbox" name="source_stauts" id="source_stauts" <?= setCheckBox($rs_edit['source_stauts'], 'Y'); ?> value="Y">
                    Active</div></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2"><?= MENU_SUBMIT ?></td>
        </tr>
    </table>
</form>
<script type="text/javascript">
<!--
    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn: ["blur"]});
    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn: ["blur", "change"]});
    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn: ["blur", "change"]});
//-->
</script> 
