<?php
@session_start();
require_once("../../includes/config.inc.php");
require_once("../../includes/Class/DataTable.Class.php");

$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;
//show_get();
?>

<script type="text/javascript" src="js/jquery.tipsy.js"></script>


<table width="100%" border="0" cellspacing="0" cellpadding="0">        
    <tr>
        <td height="40" align="left" valign="top" class="ui-state-highlight"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="73%" height="46"> <label for="sub_module"></label>
                        &nbsp; <strong> Report Group : </strong> <small>(Ex. Report , NUA , View)</small><br>
                        &nbsp;
                        <input name="rep_group_name" type="search" id="rep_group_name" size="90" placeholder="Fill Report group name">
                        <label for="rep_group_id"></label>
                        <span id="view_reset_tab2" style="display:none">               
                            <button type='reset'  id='btnReset'>ค้นใหม่</button>
                            <a href="javascript:void(0)" id="<?= $rep_group_id ?>" rel="<?= $rep_group_name ?>" class="btn_detail">Detail</a>
                        </span>
                        <input type="hidden" name="rep_group_id" id="rep_group_id">
                    </td>
                    <td width="27%" align="right" valign="middle"></td>
                </tr>
            </table></td>
    </tr>
    <tr valign="top">
        <td align="left"><div id="list_tab2" style=" width:100%; min-height:400px; overflow:auto;"></div></td>
    </tr>
</table>
<form id="form_<?= $_GET['setPage'] ?>" name="form_<?= $_GET['setPage'] ?>" method="post" action="">
    <input type="hidden" name="setModule" id="setModule" value="<?= $_GET['setModule'] ?>" />
    <input type="hidden" name="setPage" id="setPage" value="<?= $_GET['setPage'] ?>" />
</form>
<div id="dialog-form-<?= $_GET['setPage'] ?>"></div>
<script type="text/javascript">
    $(function () {

        // modules = module name
        // pages = page name
        // select_id = selection id
        var setModule = $("#setModule").val();

        var setPage = $("#setPage").val();


        $('#rep_group_name').focus().effect('highlight');

        $('button:reset').button({
            icons: {
                primary: 'ui-icon-refresh'
            }
        }).click(function (event) {
            $('#form_' + setPage)[0].reset();
            $('#list_tab2').html('');
            $('#show_emp_detail').hide('fade');
            $('#rep_group_name').val('');
            $('#rep_group_name').focus().effect('highlight');
            $('#view_reset_tab2').hide();
        });

        // Auto Complete
        $("#rep_group_name").autocomplete({
            source: "./modules/" + setModule + "/autocomp_search_rep_group.php?" + $.now(),
            minLength: 2,
            select: function (event, ui) {
                $("#rep_group_id").val(ui.item.id);

                $.loading("load");
                $.get('./modules/' + setModule + '/dwdm_sm_search_report_group_view.php?' + $.now() + '&rep_group_id=' + $('#rep_group_id').val() + '&setModule=' + setModule + '&setPage=' + setPage, function (data) {
                    console.log(data);
                    $('#list_tab2').html(data);
                    $.loading("unload");
                    $('#view_reset_tab2').show('fade');

                    $('.btn_detail').attr('id', $('#rep_group_id').val());
                    $('.btn_detail').attr('rel', $('#rep_group_name').val());


                });
            }
        });

        // Click Vire report group detail
        $('.btn_detail').button({
            icons: {
                primary: 'ui-icon-zoomin'
            }
        }).click(function (event) {
            var id = $(this).attr('id');
            var name = $(this).attr('rel');

            $.setDialog("dwdm_sm_search", 780, 640);
            $("#dialog-form-dwdm_sm_search").dialog('open');

            $.get('./modules/' + setModule + '/dwdm_sm_mapping_user_list_report.php',
                    {setModule: setModule, setPage: setPage, id: id, name: name},
                    function (data) {
                        $("#dialog-form-dwdm_sm_search").html(data);
                    }
            ).always(function (data) {
                $.loading("unload");
            });
            return false;

        });




    });

</script>