<?php
// Title Menu from function.php
//$title = title_menu($_GET['name']);

$name = $_GET['name'];
$param = "&name=$name";

$sql = "SELECT * FROM tbl_contents WHERE content_name = '$name'";
$rs = $db->GetRow($sql);
$db->debug = 0;
?>
<script type="text/javascript" src="./modules/<?= $_GET['setModule'] ?>/<?= $_GET['setPage']; ?>.js"></script>

<div id="container">
    <table width="100%" border="0" cellpadding="0" cellspacing="2" class="ui-widget-content">
        <tr>
            <td width="69%" height="25">&nbsp;<b>
                    <?= title_menu($_GET['setPage'], $param); ?>
                </b></td>
            <td width="31%" align="right" valign="bottom">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" valign="top"><table width="98%" border="0" align="center" cellpadding="10" cellspacing="0">
                    <tr>
                        <td ><?= $rs['content_desc']; ?></td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    </table>
</div>
