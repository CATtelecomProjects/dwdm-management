<?php
require_once("../../includes/config.inc.php");
// Show Edit Value

if ($_GET['doAction'] == "edit") {
    $id = $_GET['id'];
    $sql_edit = "SELECT  user_id ,username, password, user_desc  FROM tbl_users WHERE user_id = '$id';";
    $rs_edit = $db->GetRow($sql_edit);
}
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

        $.FormAction(actions, modules, pages, id);

    });
</script>



<form id="form_<?= $_GET['pages'] ?>" name="form_<?= $_GET['pages'] ?>" method="post" action="">
    <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr>
            <td width="4%">&nbsp;</td>
            <td width="54%" valign="top"><strong>*Username :</strong><br />
                <span id="sprytextfield1">
                    <label>
                        <input name="username" type="text" id="username" size="20" value="<?= $rs_edit['username'] ?>" />
                    </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td width="42%" rowspan="3" valign="top"><strong>User Group :</strong><br />
                <select name="user_group[]" size="5" multiple="multiple" id="user_group">
<?php
// ถ้าเลือกแก้ไขให้ slect group_id ใน tbl_user_auth
if ($_GET['doAction'] == 'edit') {
    $sql_group = "SELECT  a.group_id,  a.group_name, b.group_id   AS group_id_chk,  b.user_id
                        FROM tbl_user_group a
                                 LEFT JOIN tbl_user_auth b
                                   ON a.group_id = b.group_id
                                         AND b.user_id = $id 
                        ORDER BY a.group_name";
    $rs_group = $db->GetAll($sql_group);
    for ($i = 0; $i < count($rs_group); $i++) {
        $group_id = $rs_group[$i]['group_id'];
        $sel = $group_id == $rs_group[$i]['group_id_chk'] ? 'selected' : '';

        echo "<option value='$group_id' $sel>" . $rs_group[$i]['group_name'] . "</option>\n";
    }
} else {
    $sql_group = "SELECT * FROM tbl_user_group ORDER BY group_name";
    $rs_group = $db->GetAll($sql_group);
    genOptionSelect($rs_group, 'group_id', 'group_name');
}
?>
                </select>
                <br />
                <span class="font-small">*Press Ctrl to select multiple</span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><strong>*Password :</strong><br />
                <span id="sprytextfield2">
                    <label>
                        <input name="password" type="password" id="password" size="20" value="<?= base64_decode($rs_edit['password']) ?>"/>
                    </label>
                    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span></span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><strong>*Confirm Password  :</strong><br />
                <span id="spryconfirm1">
                    <label for="repasswords"></label>
                    <input name="repasswords" type="password" id="repasswords" size="20" value="<?= base64_decode($rs_edit['password']) ?>"/>
                    <span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td valign="top"><strong>*Name  :</strong><br />
                <span id="sprytextfield5">
                    <label>
                        <input name="user_desc" type="text" id="user_desc" size="40" value="<?= $rs_edit['user_desc'] ?>"/>
                    </label>
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td valign="top"><strong>Module Owner :</strong><br />
                <select name="module_name[]" size="4" multiple="multiple" id="module_name[]">
<?php
// ถ้าเลือกแก้ไขให้ slect group_id ใน tbl_user_auth
$sql_module = $_GET['doAction'] == 'edit' ? "  SELECT
                                                                    m.module_name,
                                                                    m.module_desc,
                                                                    a.module_name AS module_name_chk
                                                                  FROM tbl_sm_module M
                                                                    LEFT JOIN tbl_module_auth A
                                                                          ON m.module_name = A.module_name
                                                                           AND a.user_id = $id
                                                                  ORDER BY m.module_name " : "  SELECT
                                                                    m.module_name,
                                                                    m.module_desc
                                                                  FROM tbl_sm_module M									 
                                                                  ORDER BY m.module_name";

$rs_module = $db->GetAll($sql_module);


for ($i = 0; $i < count($rs_module); $i++) {
    $module_name = $rs_module[$i]['module_name'];
    $sel = $module_name == $rs_module[$i]['module_name_chk'] ? 'selected' : '';

    echo "<option value='$module_name' $sel>" . $rs_module[$i]['module_name'] . " : " . $rs_module[$i]['module_desc'] . "</option>\n";
}
?>
                </select>
                <br />
                <span class="font-small">*Press Ctrl to select multiple</span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td valign="top">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><?= MENU_SUBMIT ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn: ["blur"]});
    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn: ["blur"], minChars: 6});
    var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {validateOn: ["blur"]});
    var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password", {validateOn: ["blur"]});
</script> 