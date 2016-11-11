<?php
require_once("../../includes/config.inc.php");

// List Menu Group
$portlet = $_GET['portlet'];
$sql = "SELECT * FROM tbl_dwdm_portlet WHERE portlet = '$portlet'";
$rs = $db->GetRow($sql);
$db->debug = 0;
//echo THEMES;
$url = "http://dw-webreport.cattelecom.com/dwdm-management/modules/DWDM/dwdm_portlet_view.php?portlet=";
?>
<?php
if ($_GET['t'] != 'app') {
    $pic_url = "../../images/Information-icon.png";
    ?>
    <link type="text/css" href="../../css/<?= THEMES ?>/jquery-ui.css" rel="stylesheet" />
    <link type="text/css" href="../../css/main.css" rel="stylesheet" />
<?php
} else {
    $pic_url = "./images/Information-icon.png";
}
?>

<script type="text/javascript">
    $(function () {



    });
</script>


<style type="text/css">
    body {
        margin-top:5;
        background-color:#FFF;
    }
    .tbl_round {
        -moz-border-radius: 5px;
        border-radius: 5px;	
    }

    .str_header {
        font-size:15px;
        font-weight:bold;	
    }
</style>

<table width="99%" border="0" align="center" cellpadding="5" cellspacing="0" id="<?= $tbl->id; ?>">
    <thead>
        <tr>
            <td width="54%" align="left" class="ui-state-default tbl_round"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><img src="<?= $pic_url; ?>" border="0" align="absmiddle"> <span class="str_header">Information</span></td>
                    </tr>
                </table></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td valign="top" bgcolor="#fefefe"><table width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                        <td>&nbsp;
                            <?= $rs['description']; ?></td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td align="right" bgcolor="#fefefe"  ><hr  size="0.1" color="#eeeeee"><span class="font-small">Updated By : <strong>
                        <?= $rs['update_by']; ?>
                    </strong> Last Update : <strong>
                        <?= showdateTimeThai($rs['update_time']); ?>
                    </strong> </span></td>
        </tr>
    </tbody>
</table>
<br>
<?php
if ($_GET['t']) {
    echo "URL : <input name='url' type='text' id='url' readonly='readonly' size='120'  value='$url$portlet'> ";
//<button id='btnCopy'>Copy URL</button>
}
?>
