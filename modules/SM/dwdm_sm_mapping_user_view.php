<?php
$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;

// List Module
/* $sql_sub_module = "SELECT
  sub_module_id,
  sub_module_name,
  module_name
  FROM tbl_sm_sub_module
  ORDER BY module_name"; */
//$rs_sub_module = $db->GetAll($sql_sub_module);
?>

<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="./modules/<?= $_GET['setModule'] ?>/<?= $_GET['setPage'] ?>.js"></script>

<table width="100%" border="0" cellspacing="2" cellpadding="0" class='ui-widget-content'>
    <tr>
        <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
                <tr>
                    <td height='20' align='left' valign='middle'><div class='txt_header'> <b>
<?= $tbl->title ?>
                            </b></div></td>
                </tr>
                <tr>
                    <td height="40" align="left" valign="top" class="ui-state-highlight"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                                <td width="73%"><label for="emp_name">
                                        &nbsp; <strong> Employee Information : </strong> <small>(Ex.  ชื่อ , นามสกุล, รหัสพนักงาน, ชื่อหน่วยงาน)</small><br>
                                        &nbsp;
                                        <input name="emp_name" type="search" id="emp_name" size="80" placeholder="Fill Employee Information">
                                    </label>
                                    <input type="hidden" name="emp_code" id="emp_code">
                                    <div id="show_emp_detail" style="padding:0px 0px 5px 10px;display:none;"></div> </td>
                                <td width="27%" align="right" valign="top"><span id="view_save" style="display:none">               
                                        <button type='reset'  id='btnReset'/>ค้นหาใหม่</button>
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
<form id="form_<?= $_GET['setPage'] ?>" name="form_<?= $_GET['setPage'] ?>" method="post" action="">
    <input type="hidden" name="setModule" id="setModule" value="<?= $_GET['setModule'] ?>" />
    <input type="hidden" name="setPage" id="setPage" value="<?= $_GET['setPage'] ?>" />
</form>
