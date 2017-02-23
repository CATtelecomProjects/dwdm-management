<!--<link rel="stylesheet" type="text/css" href="./vendor/datatables/datatables/media/css/jquery.dataTables.min.css">-->
<link rel="stylesheet" type="text/css" href="./vendor/Buttons/css/buttons.dataTables.css">
<link rel="stylesheet" type="text/css" href="./vendor/datatables/datatables/media/css/dataTables.jqueryui.min.css">
<script type="text/javascript" language="javascript" src="./vendor/Buttons/js/dataTables.buttons.js"></script>
<script type="text/javascript" language="javascript" src="./vendor/jszip/dist/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="./vendor/pdfmake/build/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="./vendor/pdfmake/build/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="./vendor/Buttons/js/buttons.html5.js"></script>
<script type="text/javascript" src="./modules/<?=$_GET['setModule']?>/<?=$_GET['setPage']?>.js"></script>
<script src="./js/highcharts/highcharts.js"></script>
<script src="./js/highcharts/highcharts-3d.js"></script>
<script src="./js/highcharts/exporting.js"></script>
<?php

$db->debug=0;
$StaticTime = '9.30';


$sqlYear = "SELECT DISTINCT
							  YEARS
							FROM view_checklist_monthly_summary ORDER BY YEARS desc";
$rsYear = $db->GetAll($sqlYear);

$getYear = $_GET['Years'] ? $_GET['Years'] : $rsYear[0]['YEARS'];


// เงื่อนไขการแสดง
if( $getYear <> "All"){
	$str_query	= " WHERE  YEARS = $getYear";
}else{
	$str_query = "";
}
	
// Title Menu from function.php

$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;


// $tbl->openTable();

?>

<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td height="28" valign="middle" class="ui-state-hover">&nbsp;&nbsp;
      <?= $tbl->title; ?>
      <strong>&nbsp;&nbsp;
      <select name="Years" id="Years">
        <option value="All">All</option>
        <?php					  
					  genOptionSelect($rsYear,'YEARS','YEARS',$getYear);
		  ?>
      </select>
      </strong></td>
  </tr>
</table>
<div id="tabs-1">
  <table width="100%" cellpadding="2" cellspacing="0" class="display tableData " id="<?=$tbl->id?>1">
    <thead>
      <tr>
        <th>Year</th>
        <th>Month</th>
        <th>Intime</th>
        <th>Not Intime</th>
        <th>Total</th>
        <th>% Intime</th>
        <th>% Not Intime</th>
      </tr>
    </thead>
    <tbody>
      <?php
					// List User Group
$sql_list = "SELECT * , 
				  ROUND((INTIME * 100) / TOTAL,2 ) AS PERCENT_INTIME,
				  ROUND((NOT_INTIME * 100) / TOTAL,2 ) AS PERCENT_NOT_INTIME
				FROM view_checklist_monthly_summary $str_query ORDER BY YEARS DESC , MONTHS DESC ";
$rs_list = $db->GetAll($sql_list);

	for($i=0;$i<sizeof($rs_list);$i++){
		$arrMonth[] = "'".$EngMonth_Z[$rs_list[$i]['MONTHS']]."'";
		$arrIntime[] = $rs_list[$i]['PERCENT_INTIME'];
		$arrNotIntime[] = $rs_list[$i]['PERCENT_NOT_INTIME'];
	 ?>
      <tr>
        <th><?=$rs_list[$i]['YEARS']?></th>
        <th><?=$rs_list[$i]['MONTHS']?></th>
        <th><?=$rs_list[$i]['INTIME']?></th>
        <th><?=$rs_list[$i]['NOT_INTIME']?></th>
        <th><?=$rs_list[$i]['TOTAL']?></th>
        <th><?=$rs_list[$i]['PERCENT_INTIME']?></th>
        <th><?=$rs_list[$i]['PERCENT_NOT_INTIME']?></th>
      </tr>
      <?php
					  }
					  ?>
    </tbody>
  </table>
</div>
<div> <strong>หมายเหตุ</strong> : เวลาในการตรวจสอบระบบไม่เกิน <span style="color:red; font-weight:bold">
  <?= $StaticTime?>
  น.</span> และไม่นับรวมวันหยุด </div>
<div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<?php 

//show_array($arrMonth);


//	$tbl->closeTable(); 
?>
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
<script type="text/javascript">
$(function () {
     $('#chart').highcharts({
		 credits:{
				enabled:0
			},
        chart: {
            type: 'column',
			options3d: {
                enabled: true,
                alpha: 5,
                beta: 5,
                viewDistance: 90,
                depth: 90
            }
        },
        title: {
            text: 'DW/DM Checklist Report <?= $getYear?>'
        },
        xAxis: {
            categories: [<?=implode($arrMonth, ',')?>],
			title: {
                text: 'Months'
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total checklist consumption (%)'
            },
			stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b> {point.percentage:.2f}%</b><br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percent',						
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'black',
					formatter: function() {
                     return  this.percentage.toFixed(2);
            	    }
                }
            }
        },
        series: [{
            name: 'Intime',
            data: [<?=implode($arrIntime, ',')?>]
        }, {
            name: 'Not Intime',
            data: [<?=implode($arrNotIntime, ',')?>]
        }]
    });
});
</script>