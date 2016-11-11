<?php
header("Content-type:text/html; charset=utf8");
include('../../includes/dbConnect.php');
//print_r($_GET);
$emp_code = $_GET['emp_code'];

$term = trim(strip_tags($_GET['term'])); //retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);
?>
<style>
    #tbl_mapping tr.hover:hover {
        background-color:#FFFFD9;	
    }
    #tbl_mapping tr:nth-child(even) {background: #efefef}
    #tbl_mapping tr:nth-child(odd) {background: #FFF}
</style>

<script>
    $(function () {

        var setModule = $("#setModule").val();

        var setPage = $("#setPage").val();

        var icons = {
            header: "ui-icon-circle-arrow-e",
            activeHeader: "ui-icon-circle-arrow-s"
        };
        $("#accordion").accordion({heightStyle: 'content', icons: icons});


        $('.btn_report').button({
            icons: {
                primary: 'ui-icon-zoomin'
            }
        }).click(function (event) {
            var id = $(this).attr('id');
            var name = $(this).attr('rel');

            $.setDialog("mapping-user", 780, 640);
            $("#dialog-form-mapping-user").dialog('open');

            $.get('./modules/' + setModule + '/dwdm_sm_mapping_user_list_report.php',
                    {setModule: setModule, setPage: setPage, id: id, name: name},
                    function (data) {
                        $("#dialog-form-mapping-user").html(data);
                    }
            ).always(function (data) {
                $.loading("unload");
            });
            return false;

        });



    });
</script>


<div id="accordion">
    <?php
    $sql_emp = "SELECT
                    a.module_name,
                    a.module_desc,
                    COUNT(b.rep_group_id) AS count_tatal,
                    COUNT(c.rep_group_id) AS count_mapping
                  FROM tbl_sm_module a
                    JOIN tbl_sm_report_group b
                          ON a.module_name = b.module_name
                     JOIN tbl_sm_mapping_user c
                          ON (b.rep_group_id = c.rep_group_id
                                  AND c.emp_code = '$emp_code')
                  GROUP BY a.module_name;";
    $rs_emp = $db->GetAll($sql_emp);

    for ($i = 0; $i < count($rs_emp); $i++) {

        $module_name = $rs_emp[$i]['module_name'];
        $module_desc = $rs_emp[$i]['module_desc'];
        $count_tatal = $rs_emp[$i]['count_tatal'];
        $count_mapping = $rs_emp[$i]['count_mapping'];

//echo json_encode($json_data);
        ?>
        <h3><?= $module_name ?> : <?= $module_desc; ?> (<strong><span id="select_rep_group_<?= $module_name ?>"><?= (int) $count_mapping; ?></span>/<?= $count_tatal ?></strong> Groups) </h3>
        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="1" id="tbl_mapping">   
                <?php
                $sql_report_group = "SELECT
                                    a.rep_group_id,
                                    b.rep_group_id   AS rep_group_id_map,
                                    a.rep_group_name,
                                    a.module_name,
                                    a.rep_group_used
                                  FROM tbl_sm_report_group a
                                     JOIN tbl_sm_mapping_user b
                                          ON (a.rep_group_id = b.rep_group_id
                                                  AND b.emp_code = '$emp_code')
                                  WHERE module_name = '$module_name' 
                                  ORDER BY a.rep_group_orders";

                $rs_report_group = $db->GetAll($sql_report_group);
                for ($j = 0; $j < count($rs_report_group); $j++) {
                    $rep_group_id = $rs_report_group[$j]['rep_group_id'];
                    $rep_group_id_map = $rs_report_group[$j]['rep_group_id_map'];
                    $rep_group_name = $rs_report_group[$j]['rep_group_name'];
                    $module_name = $rs_report_group[$j]['module_name'];
                    $rep_group_used = $rs_report_group[$j]['rep_group_used'];
                    ?>
                    <tr  class="hover">
                        <td width="87%" align="left"><label><div>(<strong><?= ($j + 1) ?></strong>) <?= $rep_group_name ?></div></label></td>
                        <td width="13%" align="right"><?php if ($rep_group_used == "Y") { ?> <a href="javascript:void(0)" id="<?= $rep_group_id ?>" rel="<?= $rep_group_name ?>" class="btn_report">Detail</a><?php } ?></td>
                    </tr>
                    <?php
                } // End Report Loop
                ?>
            </table>
        </div>
        <?php
    }
    ?>
</div>      
<div id="dialog-form-mapping-user" title="แสดงรายงาน" style="display:none"></div>