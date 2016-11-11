<?php
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;

// List Module
$sql_sub_module = "SELECT
                                sub_module_id,
                                sub_module_name,
                                module_name
                              FROM tbl_sm_sub_module
                              ORDER BY module_name";
//$rs_sub_module = $db->GetAll($sql_sub_module);
?>
<script type="text/javascript" src="./modules/<?= $_GET['setModule'] ?>/<?= $_GET['setPage'] ?>.js"></script>
<form id="form_<?= $_GET['setPage'] ?>" name="form_<?= $_GET['setPage'] ?>" method="post" action="">
    <table width="100%" border="0" cellspacing="2" cellpadding="0" class='ui-widget-content'>
        <tr>
            <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
                    <tr>
                        <td height='20' align='left' valign='middle'><div class='txt_header'> <b>
<?= $tbl->title ?>
                                </b></div></td>
                    </tr>
                    <tr>
                        <td height="40" valign="middle" class="ui-state-highlight"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="72%"> <label for="sub_module"></label>
                                        &nbsp; <strong> Report Group : </strong> <small>(Ex. Report , NUA , View)</small><br>
                                        &nbsp;
                                        <input name="rep_group_name" type="search" id="rep_group_name" size="80" placeholder="Fill Report group name">
                                        <label for="rep_group_id"></label>
                                        <input type="hidden" name="rep_group_id" id="rep_group_id"></td>
                                    <td width="28%" align="right" valign="middle"> <span id="view_save" style="display:none">
                                            <button class="btn" id="btnSave"> Save </button>
                                            <button type='reset' name='btnReset' id='btnReset'/>Reset</button>
                                        </span></td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr valign="top">
                        <td width="42%" align="left" class="ui-widget-content"><div id="list_reports" style=" width:100%; min-height:400px; overflow:auto;"></div></td>
                    </tr>
                </table></td>
        </tr>
    </table>

    <input type="hidden" name="setModule" id="setModule" value="<?= $_GET['setModule'] ?>" />
    <input type="hidden" name="setPage" id="setPage" value="<?= $_GET['setPage'] ?>" />
</form>
