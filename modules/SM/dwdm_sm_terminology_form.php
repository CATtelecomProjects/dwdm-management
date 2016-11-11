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
    $sql_edit = "SELECT
                        *
                      FROM  tbl_sm_terminology 
                      WHERE id = $id
                      ORDER BY sub_module_id";
    $rs_edit = $db->GetRow($sql_edit);

    $id = $rs_edit['id'];
} else {
    $id = $_GET['id'];
}

// กำหนด Path ที่เก็บ Souce Code
$sess_user_id = $_SESSION['sess_user_id'];

$rs_module = $SM->listModules($sess_user_id);
?>

<!--<script src="./js/jQuery-tagEditor/jquery.tag-editor.min.js"></script>
<link rel="stylesheet" type="text/css" href="./js/jQuery-tagEditor/jquery.tag-editor.css">
-->

<form id="form_<?= $_GET['pages'] ?>" name="form_<?= $_GET['pages'] ?>" method="post" action="">
    <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td width="6%">&nbsp;</td>
            <td><strong>กลุ่มรายงาน  :</strong><br>
                <label>
                    <select name="sub_module_id" id="sub_module_id" class="input">
                        <?php
                        // List Module
                        //ถ้ามีการเลือกให้ where ตามค่าที่เลือก ถ้าไม่ ให้เอาค่า module_name มา where
                        $get_sub_module_id = isset($rs_edit['sub_module_id']) ? $rs_edit['sub_module_id'] : $rs_sub_module1[0]['sub_module_id'];
                        $SM->listSubModule($get_sub_module_id, $rs_module);
                        ?>
                    </select>
                </label></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td width="94%" valign="top"><strong>คำศัพท์ :<br>
                </strong><span id="sprytextfield1">
                    <input name="word" type="text" id="word" value="<?= $rs_edit['word'] ?>" size="50">
                    <span class="textfieldRequiredMsg">A value is required.</span></span><small><br>
                    * เช่น งบการเงิน,รายได้, ลูกค้า, พนักงาน,CDR</small></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2"><strong>ความหมายคำศัพท์ :<br>
                </strong><span id="sprytextarea1">
                    <textarea name="descriptions" cols="70" rows="4" id="descriptions"><?= $rs_edit['descriptions'] ?></textarea>
                    <span class="textareaRequiredMsg">A value is required.</span></span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2"><?= MENU_SUBMIT ?></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
    </table>
</form>
<script type="text/javascript">
<!--
//-->




    $(function () {

        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

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


        /*$('#descriptions').tagEditor({
         clickDelete: true,		
         delimiter: ',', 
         placeholder: 'Enter Description ...'	,		
         forceLowercase: false,
         removeDuplicates: true,						
         sortable: true // jQuery UI sortable
         
         });*/

// Auto Complete
        $("#term_name").autocomplete({
            source: "./modules/" + modules + "/autocomp_search_terminology_cate.php?" + $.now(),
            minLength: 2,
            select: function (event, ui) {
                $("#term_id").val(ui.item.id);

                /*$.loading("load");
                 $.get('./modules/'+setModule+'/dwdm_sm_search_teminology_list.php?'+$.now(), { setModule : setModule , setPage : setPage , q : $('#q').val()   }, function(data){							
                 
                 $('#showData').html(data);
                 $.loading("unload");					
                 */
            }

        });



    });
    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn: ["blur", "change"]});
    var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn: ["blur", "change"]});
</script> 
