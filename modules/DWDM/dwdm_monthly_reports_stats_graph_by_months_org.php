<?php
include('../../includes/config.inc.php');
//show_get();

$years = $_GET['years'];
$months = $_GET['months'];
//show_get();
// Get month for select box
$sql_year = "SELECT DISTINCT
                    (years) AS check_year
                    FROM TBL_DWDM_MONTHLY_STATS
                    ORDER BY years DESC";
$rs_year = $db->GetAll($sql_year);

echo "<table border='0' width='100%'>";
echo "<tr>";
echo "<td width='50%'>";
echo "ข้อมูลปี : ";
echo "<select name='select_year' id='select_year'>";

for ($i = 0; $i < count($rs_year); $i++) { //ThaiMonthFull as $key => $value){
    $sel = $rs_year[$i]['check_year'] == $_GET['months'] ? ' selected ' : '';

    echo "<option value='" . $rs_year[$i]['check_year'] . "' $sel>" . $rs_year[$i]['check_year'] . "</option>";
}
echo "</select>";

echo "</td>";
echo "<td width='50%' align='right'>";
echo $div_graph = "&nbsp;<span class='btnGraphY''> <button>กราฟรายเดือน</button></span>";
echo "</tr>";
echo "</table>";
exit;
// Get data
$sql = "SELECT
            check_id,
            DATE_FORMAT(check_date, '%d') AS check_date,
            datasets
          FROM tbl_dwdm_checklist_detail
          WHERE MONTH(check_date) = $months
                  AND YEAR(check_date) = $years
                  AND holiday <> 'Y'
          ORDER BY check_date";
$rs_data = $db->GetAll($sql);

if (count($rs_data) <= 0)
    exit;

//Assign Path for graph
$arrPathDI = array("ftproot", "data", "data1", "data2", "work", "archive", "utilloc", "var");
$arrPathBI = array("data", "work", "utilloc", "var");

for ($i = 0; $i < count($rs_data); $i++) {

    $arrData = json_decode($rs_data[$i]['datasets'], true);


    foreach ($arrPathDI as $data) {
        // $path['di'][$data][$rs_data[$i]['check_date']] = $arrData['hw']['di'][$data]['value']== "" ? "null" : $arrData['hw']['di'][$data]['value'];
        if ($arrData['hw']['di'][$data]['value'] <> "") {
            $path['date']['di'][$rs_data[$i]['check_date']] = $rs_data[$i]['check_date'];
            $path['di'][$data][$rs_data[$i]['check_date']] = $arrData['hw']['di'][$data]['value'];
        }
    }

    foreach ($arrPathBI as $data) {
        //$path['bi'][$data][$rs_data[$i]['check_date']] = $arrData['hw']['bi'][$data]['value'] == "" ?  "null"  : $arrData['hw']['bi'][$data]['value'];
        if ($arrData['hw']['bi'][$data]['value'] <> "") {
            $path['date']['bi'][$rs_data[$i]['check_date']] = $rs_data[$i]['check_date'];
            $path['bi'][$data][$rs_data[$i]['check_date']] = $arrData['hw']['bi'][$data]['value'];
        }
    }
}
// show_array($path['date']['di']);
?>

<script type="text/javascript">
    $(function () {


        // modules = module name
        // pages = page name
        // select_id = selection id
        var setModule = $("#setModule").val();

        var setPage = $("#setPage").val();

<?php
if (count($rs_data) > 0) {
    ?>

            $('#divShowGraphEDI1').highcharts({
                credits: {
                    enabled: 0
                },
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'DW/DM Daily Disk Usage (CATEDI1)',
                    x: -20 //center
                },
                subtitle: {
                    text: '<?= $EngMonthFull[$_GET['months']] ?> <?= $_GET['years'] ?>',
                                    x: -20
                                },
                                xAxis: {
                                    title: {
                                        text: 'Days'
                                    }, categories: [<?= implode($path['date']['di'], ',') ?>]
                                },
                                yAxis: {
                                    min: 0,
                                    max: 100,
                                    title: {
                                        text: 'Disk Usage (%)'
                                    },
                                    plotLines: [{
                                            value: 0,
                                            width: 1,
                                            color: '#808080'
                                        }]
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                            '<td style="padding:0"><b>{point.y:.0f}%</b></td></tr>',
                                    footerFormat: '</table>',
                                    shared: true,
                                    useHTML: true
                                },
                                /* tooltip: {
                                 valueSuffix: '%'
                                 },*/
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle',
                                    borderWidth: 1
                                },
                                plotOptions: {
                                    line: {
                                        //connectNulls: true,
                                        dataLabels: {
                                            enabled: false
                                        },
                                        enableMouseTracking: true
                                    }
                                },
                                series: [
    <?php
    $loop = 0;
    foreach ($arrPathDI as $data) {
        echo "{ ";
        echo "name : '/" . $data . "',";
        echo "data : [" . implode($path['di'][$data], ',') . "]} ";
        if ($loop < count($arrPathDI)) {
            echo ",";
        } else {
            echo " ";
        }

        $loop++;
    }
    ?>
                                ]
                            });

                            $('#divShowGraphEBI1').highcharts({
                                credits: {
                                    enabled: 0
                                },
                                chart: {
                                    zoomType: 'x'
                                },
                                title: {
                                    text: 'DW/DM Daily Disk Usage (CATEBI1)',
                                    x: -20 //center
                                },
                                subtitle: {
                                    text: '<?= $EngMonthFull[$_GET['months']] ?> <?= $_GET['years'] ?>',
                                                    x: -20
                                                },
                                                xAxis: {
                                                    title: {
                                                        text: 'Days'
                                                    }, categories: [<?= implode($path['date']['bi'], ',') ?>]
                                                },
                                                yAxis: {
                                                    min: 0,
                                                    max: 100,
                                                    title: {
                                                        text: 'Disk Usage (%)'
                                                    },
                                                    plotLines: [{
                                                            value: 0,
                                                            width: 1,
                                                            color: '#808080'
                                                        }]
                                                },
                                                tooltip: {
                                                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                                            '<td style="padding:0"><b>{point.y:.0f}%</b></td></tr>',
                                                    footerFormat: '</table>',
                                                    shared: true,
                                                    useHTML: true
                                                },
                                                /* tooltip: {
                                                 valueSuffix: '%'
                                                 },*/
                                                legend: {
                                                    layout: 'vertical',
                                                    align: 'right',
                                                    verticalAlign: 'middle',
                                                    borderWidth: 1
                                                },
                                                plotOptions: {
                                                    line: {
                                                        dataLabels: {
                                                            enabled: false
                                                        },
                                                        enableMouseTracking: true
                                                    }
                                                },
                                                series: [
    <?php
    $loop = 0;
    foreach ($arrPathBI as $data) {
        echo "{ ";
        echo "type: 'line',";
        echo "name : '/" . $data . "',";
        echo "data : [" . implode($path['bi'][$data], ',') . "]} ";
        if ($loop < count($arrPathBI)) {
            echo ",";
        } else {
            echo " ";
        }

        $loop++;
    }
    ?>
                                                ]
                                            });

    <?php
} // End if
?>

                                        $("#select_month").change(function () {
                                            $.loading("load");
                                            $.get('./modules/' + setModule + '/' + setPage + '_graph_by_daily.php',
                                                    {doAction: 'new', setModule: setModule, setPage: setPage, years: <?= $_GET['years'] ?>, months: $(this).val()},
                                                    function (data) {
                                                        $("#dialog-form-graph").html(data);
                                                    }
                                            ).always(function (data) {
                                                $.loading("unload");
                                            });
                                            return false;
                                        });


                                        $(".btnGraphY button:first").button({
                                            icons: {
                                                primary: 'ui-icon-image'
                                            }
                                        }).click(function () {
                                            $.loading("load");
                                            var d = new Date(),
                                                    //n = d.getMonth()+1;
                                                    y = $("#hidYears").val();//d.getFullYear();
                                            //	if(n<10) { n = "0"+n }		

                                            var m = $('#maxMonth').val();

                                            $.setDialog("graph", 980, 740);
                                            $('#dialog-form-graph').dialog('open');
                                            $.get('./modules/' + setModule + '/' + setPage + '_graph_by_monthly.php',
                                                    {setModule: setModule, setPage: setPage, years: y, months: m},
                                                    function (data) {
                                                        $("#dialog-form-graph").html(data);
                                                    }
                                            ).always(function (data) {
                                                $.loading("unload");
                                            });
                                            return false;
                                        });



                                    });
</script>

<hr>
<div id="divShowGraphEDI1" style="min-width: 310px; height: 320px; margin: 0 auto"></div>
<hr>
<div id="divShowGraphEBI1" style="min-width: 310px; height: 320px; margin: 0 auto"></div>

