<?php
header("Content-type:text/html; charset=utf8");
include('../../includes/dbConnect.php');
//print_r($_GET);
$module = $_GET['module'];

$term = trim(strip_tags($_GET['term'])); //retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);

$strSQL = $module <> "ALL" ? " AND a.module_name = '$module' " : "";

$sql_sub_module = "SELECT
                                a.sub_module_id,
                                a.sub_module_name,
                                a.module_name,
                                COUNT(b.report_id) AS count_report_tatal
                              FROM tbl_sm_sub_module a
                                JOIN tbl_sm_report b
                                      ON a.sub_module_id = b.sub_module_id
                                       $strSQL
                              WHERE b.actived = 'Y'
                              GROUP BY a.sub_module_id
                              ORDER BY 2";
$rs_sub_module = $db->GetAll($sql_sub_module);
?>
<style>
    #tbl_mapping tr.hover:hover {
        background-color:#FFFFD9;	
    }
</style>
<script>
    $(function () {
        var icons = {
            header: "ui-icon-circle-arrow-e",
            activeHeader: "ui-icon-circle-arrow-s"
        };
        $("#accordion_report").accordion({heightStyle: 'content', icons: icons});



    });
</script>

<div id="accordion_report">
<?php
for ($i = 0; $i < count($rs_sub_module); $i++) {

    $sub_module_id = $rs_sub_module[$i]['sub_module_id'];
    $module_name = $rs_sub_module[$i]['module_name'];
    $sub_module_name = $rs_sub_module[$i]['sub_module_name'];
    $count_report_tatal = $rs_sub_module[$i]['count_report_tatal'];
    $count_report_mapping = $rs_sub_module[$i]['count_report_mapping'];

//echo json_encode($json_data);
    ?>
        <h3>[<?= $module_name ?>] - <?= $sub_module_name ?> (<strong><?= $count_report_tatal ?></strong> Reports) </h3>
        <div>

            <ul type="square">

    <?php
    $sql_report = "SELECT
                            a.report_id,
                            a.report_name,
                            a.report_desc,
                            a.sub_module_id
                          FROM tbl_sm_report a
                            JOIN tbl_sm_sub_module b
                                  ON (a.sub_module_id = b.sub_module_id)
                          WHERE a.sub_module_id = $sub_module_id
                           AND  a.actived = 'Y'
                          ORDER BY a.report_name";

    $rs_report = $db->GetAll($sql_report);
    for ($j = 0; $j < count($rs_report); $j++) {
        $report_id = $rs_report[$j]['report_id'];
        $report_desc = $rs_report[$j]['report_desc'];
        $report_name = $rs_report[$j]['report_name'];
        ?>
                    <li class="hover"><strong><u><?= $report_name ?></u></strong> - <?= $report_desc ?></li>

                    <?php
                } // End Report Loop
                ?>
            </ul>
            </table>
        </div>
                <?php
            }
            ?>
</div>      
