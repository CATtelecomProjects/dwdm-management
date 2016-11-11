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
                        <td height='20' colspan="3" align='left' valign='middle'><div class='txt_header'> <b>
<?= $tbl->title ?>
                                </b></div></td>
                    </tr>       
                    <tr>
                        <td height="40" colspan="3" align="left" valign="middle" class="ui-state-highlight"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="70%"><label for="org"></label>
                                        &nbsp; <strong> Organization Name : </strong> <small>(Ex. หน่วย,กลุ่ม,ฝ่าย,ส่วน)</small><br>
                                        &nbsp;
                                        <input name="org" type="search" id="org" size="90" placeholder="Fill Organization Information">           
                                        <input type="hidden" name="org_code" id="org_code"></td>
                                    <td width="30%" align="right" valign="middle"> <span id="view_save" style="display:none">
                                            <button class="btn" id="btnSave"> Save </button>
                                            <button type='reset' name='btnReset' id='btnReset'/>Reset</button>
                                        </span></td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr valign="top">
                        <td width="40%" align="left" class="ui-widget-content"><div id="list_org" style=" width:100%; min-height:300px; overflow:auto;"></div></td>
                        <td width="0%" align="left"></td>
                        <td width="60%" align="left" class="ui-widget-content"><div id="list_mapping" style=" width:100%; min-height:300px; overflow:auto;"></div></td>
                    </tr>
                </table></td>
        </tr>
    </table>

    <input type="hidden" name="setModule" id="setModule" value="<?= $_GET['setModule'] ?>" />
    <input type="hidden" name="setPage" id="setPage" value="<?= $_GET['setPage'] ?>" />
</form>
