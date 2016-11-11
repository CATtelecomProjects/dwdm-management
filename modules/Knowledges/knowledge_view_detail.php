<?php
@session_start();
require_once("../../includes/config.inc.php");
require_once("../../includes/Class/Auth.Class.php");
require_once("../../includes/Class/Main.Class.php");
// Show Edit Value

$db->debug = 0;

if ($_GET['doAction'] == "view") {
    $id = $_GET['id'];
    $sql_edit = "SELECT
                        a.*,
                        b.name
                      FROM tbl_knowledge a,
                        tbl_knowledge_cate b
                      WHERE a.cate_id = b.id
                              AND a.id =  $id";
    $rs_view = $db->GetRow($sql_edit);
    $cate_id = $rs_view['cate_id'];

    $sql_list_file = "SELECT * FROM tbl_knowledge_files WHERE kn_id = $id ";
    $rs_list_file = $db->GetAll($sql_list_file);
} else {
    $cate_id = $_GET['cate_id'];
}


$web = new MainWeb();
?>
<script language="javascript">
    $(function () {

        $(".tooltips").tipsy({gravity: 's'});

        $("img").css({'cursor': 'pointer'});

        //ajaxLoading();			

<?php
if (count($rs_list_file) > 0) {
    echo "$( '#tabs' ).tabs();";
} else {
    echo "$('#tabs' ).tabs({ disabled: [ 1] } );";
}
?>

        //Button
        $('#btnReset ,#btnSave ,#upload').button();


        $(".show_pics").colorbox({rel: 'show_pics'});

        //########################################

    });
</script>
<style type="text/css">
    .tbl_round {
        -moz-border-radius: 5px;
        border-radius: 5px;
    }
</style>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">รายละเอียด</a></li>
        <li><a href="#tabs-2" class="tab-disabled">ไฟล์แนบ (<span id="label_attach_h"><?= number_format(count($rs_list_file)); ?></span>)</a></li>
    </ul>
    <div id="tabs-1">
        <form action="" method="post" enctype="multipart/form-data" name="form_knowledge" id="form_knowledge">
            <table width="100%" border="0" cellspacing="5" cellpadding="2">
                <tr>
                    <td align="right" valign="top" class="ui-state-focus">หมวดหมู่ : </td>
                    <td width="82%" valign="top" class="ui-widget-content"><?= $rs_view['name'] ?></td>
                </tr>
                <tr>
                    <td align="right" valign="top" class="ui-state-focus">ชื่อผู้บันทึก :</td>
                    <td valign="top" class="ui-widget-content"><?= $rs_view['update_by']; ?></td>
                </tr>
                <tr>
                    <td align="right" valign="top" class="ui-state-focus">สถานะ : </td>
                    <td valign="top" class="ui-widget-content"><?= $web->ShowActiveIcon($rs_view['publish']); ?>           
<?= $rs_view['publish'] == "Y" ? "เผยแพร่" : "ไม่เผยแพร่" ?></td>
                </tr>
                <tr>
                    <td align="right" valign="top" class="ui-state-focus">หัวข้อปัญหา :</td>
                    <td valign="top" class="ui-widget-content"><label>
<?= $rs_view['issue_title'] ?>
                        </label></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="ui-state-focus"> วิธีแก้ไข / ข้อเสนอแนะ :</td>
                    <td valign="top" class="ui-widget-content"><label for="issue_desc"></label>
<?= $rs_view['issue_desc'] ?></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="tabs-2">
        <div id="div_list_file">
            <table width="100%" border="0" cellspacing="1" cellpadding="3"  class="tbl_round">
<?php
?>
                <tr class="ui-widget-header">
                    <th width="7%" align="center">ลำดับ</th>
                    <th width="93%">รายชื่อไฟล์</th>
                </tr>
                <?php
                if (count($rs_list_file) > 0) {

                    $img_ext = array('png', 'gif', 'jpg', 'jepg', 'bmp');

                    for ($i = 0; $i < count($rs_list_file); $i++) {

                        $extension = @strtolower(end(explode('.', $rs_list_file[$i]['file_name'])));

                        if (in_array($extension, $img_ext)) {
                            $class = "show_pics";
                            $openBlank = "";
                        } else {
                            $class = "";
                            $openBlank = "target='_blank' ";
                        }
                        ?>
                        <tr>
                            <td align="center" bgcolor="#FFFFFF"><?= ($i + 1); ?></td>
                            <td bgcolor="#FFFFFF"><a href="./modules/Knowledges/uploads_dir/<?= $rs_list_file[$i]['file_name'] ?>" class="<?= $class; ?>" <?= $openBlank; ?>>
                        <?= $rs_list_file[$i]['file_name'] ?>
                                </a></td>
                        </tr>
        <?php
    }
}
?>
                <tr>
                    <td align="center">&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<span id="divMsgDiag"></span>