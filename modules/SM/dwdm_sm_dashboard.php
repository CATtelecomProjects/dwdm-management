<?php
// Title Menu from function.php
if(isset($_GET['target'])){
	include('../../includes/config.inc.php');
	include('../../includes/Class/DataTable.Class.php');
	include('../../includes/Class/Main.Class.php');
	$setPage= "dwdm_sm_dashboard";
	$setModule = "SM";
}else{
   	$setPage= $_GET['setPage'];
	$setModule = $_GET['setModule'];
}
	

$tbl = new dataTable();
$tbl->id = $setPage;
$tbl->title = title_menu($setPage);
$tbl->menu = MENU_ACTION;
$tbl->module = $setModule;
$tbl->page = $page;
$tbl->order = 3;
$tbl->orderType = "desc";

//$tbl->openTable();
$db->debug=false;

$web = new MainWeb();

/* Total Users */
$sqlTotalUser = "SELECT
				  COUNT(DISTINCT(m.emp_code)) AS TotalUser
				FROM tbl_sm_mapping_user m
				  JOIN tbl_sm_emp e
					ON m.emp_code = e.emp_code
					  AND e.actived = 'Y'";
$rsTotalUser = $db->GetRow($sqlTotalUser);

/* Get User total */
$sqlGetUserTotal = "SELECT
							  r.module_name,
							  COUNT(DISTINCT(m.emp_code)) AS TotalUser
							FROM tbl_sm_mapping_user m
							  JOIN tbl_sm_report_group r
								ON m.rep_group_id = r.rep_group_id
							  JOIN tbl_sm_emp e
								ON m.emp_code = e.emp_code
								  AND e.actived = 'Y'
							GROUP BY r.module_name
							ORDER BY TotalUser desc";
$rsGetUserTotal = $db->GetAll($sqlGetUserTotal);
$SumUsers = 0;
for($i=0;$i<sizeof($rsGetUserTotal);$i++){
	$Users[$i]['module_name'] = $rsGetUserTotal[$i]['module_name'];
	$Users[$i]['TotalUser'] = $rsGetUserTotal[$i]['TotalUser'];		
	$SumUsers+=$Users[$i]['TotalUser'];
}


/* Get Report total */
$sqlGetReportTotal = "SELECT
								  s.module_name,
								  COUNT(*)      AS TotalReport
								FROM tbl_sm_report r
								  JOIN tbl_sm_sub_module s
									ON r.sub_module_id = s.sub_module_id
									  AND r.actived = 'Y'
								GROUP BY s.module_name
								ORDER BY TotalReport desc";
$rsGetReportTotal = $db->GetAll($sqlGetReportTotal);		
$SumReports = 0;						
for($i=0;$i<sizeof($rsGetReportTotal);$i++){
	$Reports[$i]['module_name'] = $rsGetReportTotal[$i]['module_name'];
	$Reports[$i]['TotalReport'] = $rsGetReportTotal[$i]['TotalReport'];			
	$SumReports+=$Reports[$i]['TotalReport'];
}



$sql_stat_yymm = "SELECT DISTINCT
							  years,
							  months
							FROM tbl_dwdm_monthly_stats
							ORDER BY years DESC,months DESC
							LIMIT 0,1";
$rs_stat_yymm = $db->GetRow($sql_stat_yymm);

?>
<?php
if(isset($_GET['target'])){
?>
<!--<script src="./dwdm_sm_dashboard.js"></script>-->
<?php
}
?>

<style type="text/css">
.tbl_dashboard {
	text-align:center;
	display:inline-table;
}
.dashboard-header {
	font-size: 13px;
}
.text-score {
	font-size: 18px;
	color: #FF0000;
	font-weight: bold;
}
.text-total {
	font-size: 23px;
	color: #FF0000;
	font-weight: bold;
}
.box-score {
	border-style: solid;
	border-width: thin;
	cursor: pointer;
	border-color: #CACACA;
	display: inline-block;
	padding: 5px 10px 5px 10px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	min-width: 100px;
	text-align: center;
	background: rgba(255,255,255,1);
	background: -moz-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
	background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
	background: -webkit-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
	background: -o-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
	background: -ms-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
	background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );	
	-webkit-box-shadow: 4px 5px 5px -2px rgba(0,0,0,0.20);
	-moz-box-shadow: 4px 5px 5px -2px rgba(0,0,0,0.20);
	box-shadow: 4px 5px 5px -2px rgba(0,0,0,0.20);
}
.box-score:hover {
	border-color: #FF6467;
	background-color: #FDFFF4;
}
#accordion_users, #accordion_reports>h3 {
	font-size: 12px;
}
</style>
<script type="text/javascript" src="./modules/<?=$setModule?>/<?=$setPage?>.js"></script>
<!--<link href="../../css/ui.lightness-theme/jquery-ui.css" rel="stylesheet" type="text/css">-->
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="display ui-widget-content" id="<?=$tbl->id;?>">
  <thead>
    <tr>
      <th colspan="4" align="left"  class="header_height">&nbsp;
        <?=$tbl->title?></th>
    </tr>
    <!--<tr>
      <th height="30" colspan="4"  class="ui-state-focus"><span class="dashboard-header">Security Matrix Adminstrator Dashboard</span></th>
    </tr>-->
  </thead>
  <tbody>
    <tr>
      <td colspan="2" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl_dashboard">
          <tr>
            <td><div id="dashboard" style="width:auto">
                <div id="div_users" style="display:inline-table;width:49% !important;position:relative">
                  <div id="accordion_users">
                    <h3 align="left"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Total users by module</a></h3>
                    <div id="div_total_users" style="text-align:center">
                      <div class="box-score tooltips" ref="ALL" rel="USERS" style="background-color:#FDFFEB" title="จำนวนผู้ใช้งานทั้งหมดที่มีสิทธิ์ใช้งาน"><span class="text-total"><?=number_format($rsTotalUser['TotalUser'])?></span><br>
                        <strong>All</strong></div>
                      <div>&nbsp;</div>
                      <div id="score_users">
                        <?php				
					for($i=0;$i<sizeof($Users);$i++){
						$moduleName = $Users[$i]['module_name'];
						$TotalUser = $Users[$i]['TotalUser'];											
						 echo "<div class=\"box-score tooltips\" ref=\"$moduleName\" rel=\"USERS\"  title=\"$moduleName <strong>$TotalUser</strong> Users\"><span class=\"text-score\">$TotalUser</span><br><strong>$moduleName</strong></div> ";						
					}
				?>
                      </div>
                      <br>
                      <div>
                        <div id="pie_users" style="min-width: 270px; height:280px; max-width: 300px; margin: 0 auto; display:inline-block"></div>
                        <div id="bar_users" style="min-width: 270px; height: 280px; max-width:300px; margin: 0 auto; display:inline-block"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="div_reports" style="display:inline-table;width:49% !important;position:relative">
                  <div id="accordion_reports">
                    <h3 align="left"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i> Total reports  by module</a></h3>
                    <div id="div_total_users"  style="text-align:center">
                      <div class="box-score tooltips"  ref="ALL" rel="REPORTS" style="background-color:#FDFFEB" title="จำนวนรายงานทั้งหมด"><span class="text-total"><?=number_format($SumReports)?></span><br>
                        <strong>All</strong></div>
                      <div>&nbsp;</div>
                      <div id="score_users">
                        <?php				
					for($i=0;$i<sizeof($Reports);$i++){
						$moduleName = $Reports[$i]['module_name'];
						$TotalReport = $Reports[$i]['TotalReport'];											
						 echo "<div class=\"box-score tooltips\" ref=\"$moduleName\" rel=\"REPORTS\" title=\"$moduleName <strong>$TotalReport</strong> Reports\"><span class=\"text-score\">$TotalReport</span><br><strong>$moduleName</strong></div> ";						
					}
				?>
                      </div>
                      <br>
                      <div>
                        <div id="pie_reports" style="min-width: 270px; height:280px; max-width: 300px; margin: 0 auto; display:inline-block"></div>
                        <div id="bar_reports" style="min-width: 270px; height: 280px; max-width:300px; margin: 0 auto;display:inline-block"></div>
                      </div>
                    </div>
                  </div>
                </div>   
                <div id="div_stats" style="width:100% !important;position:relative !important">
                  <div id="accordion_stats">
                    <h3 align="left"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i> Total user access per month</a></h3>                    
                        <div id="graph_stats" style="height: auto; max-width:100%;"></div>                       
                      </div>
                    </div>                  
                <div id="last_update" style="float:left ;width:100%" align="right"><small>Last update : <?=date('d-M-Y H:i:s A')?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </div></td>
          </tr>
      </table></td>
    </tr>
  </tbody>
</table>
<?php 
//	$tbl->closeTable(); 
?>
<div id="dialog-form-<?=$_GET['setPage'];?>"  style="display:none"></div>
<script src="./js/highcharts/highcharts.js"></script> 
<script src="./js/highcharts/highcharts-3d.js"></script> 
<!--<script src="./js/highcharts/highcharts-3d.js"></script>--> 
<script src="./js/highcharts/exporting.js"></script>
<input type="hidden" name="setModule" id="setModule" value="<?=$setModule?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$setPage?>" />
<input type="hidden" name="setTitle" id="setTitle" value="<?=$tbl->title?>" />
<!--<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>--> 
<script type="text/javascript">

$(function(){
	 $(document).ready(function () {

/*******************************************************/		 
		 /* User Chart */		 
		 // Build the chart
        $('#pie_users').highcharts({
			credits:{
				enabled:0
			},
		exporting: {
            enabled: false
        },
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
				backgroundColor:'rgba(255, 255, 255, 0.1)',
				options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
					depth: 35,
                    dataLabels: {
                        enabled: true,
						distance: -45,
						format: '{point.percentage:.2f} %'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total ',
                colorByPoint: true,
                data: [
                <?php
				$loop=0;
					for($i=0;$i<sizeof($rsGetUserTotal);$i++){
						$moduleName = $rsGetUserTotal[$i]['module_name'];
						$TotalUser = $rsGetUserTotal[$i]['TotalUser'];
						$slice =  $loop == 0 ?  ",sliced: true, selected: true " : "";
						echo "{ name: '$moduleName', y: $TotalUser $slice}  ";
						
						if($loop<count($rsGetUserTotal) ){
							echo  	"," ;
						}else{
								echo " ";
						}
						$loop++;
					}
				?>				
            ]
            }]
        });
		 
		 
		 
		 // Create the chart
    $('#bar_users').highcharts({		
			credits:{
				enabled:0
			},
		exporting: {
            enabled: false
        },
        chart: {
            type: 'column',
			backgroundColor:'rgba(255, 255, 255, 0.1)'
        },		
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: ''
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Users<br/>'
        },

        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [
			 <?php
				$loop=0;
					for($i=0;$i<sizeof($rsGetUserTotal);$i++){
						$moduleName = $rsGetUserTotal[$i]['module_name'];
						$TotalUser = $rsGetUserTotal[$i]['TotalUser'];
						
						echo "{ name: '$moduleName', y: $TotalUser}  ";
						
						if($loop<count($rsGetUserTotal) ){
							echo  	"," ;
						}else{
								echo " ";
						}
						$loop++;
					}
				?>
			]
        }]
    });

 /* End User Chart */		 
		/*******************************************************/		 
 
 
 
 
 /*******************************************************/		 
		 /* Report Chart */		 
		 // Build the chart
       $('#pie_reports').highcharts({
			credits:{
				enabled:0
			},
		exporting: {
            enabled: false
        },
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
				backgroundColor:'rgba(255, 255, 255, 0.1)',
				options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
					depth: 35,
                    dataLabels: {
                        enabled: true,
						distance: -45,
						format: '{point.percentage:.2f} %'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total ',
                colorByPoint: true,
                data: [
               <?php
				$loop=0;
					for($i=0;$i<sizeof($rsGetReportTotal);$i++){
						$moduleName = $rsGetReportTotal[$i]['module_name'];
						$TotalReport = $rsGetReportTotal[$i]['TotalReport'];
						$slice =  $loop == 0 ?  ",sliced: true, selected: true " : "";
						echo "{ name: '$moduleName', y: $TotalReport $slice}  ";
						
						if($loop<count($rsGetReportTotal) ){
							echo  	"," ;
						}else{
								echo " ";
						}
						$loop++;
					}
				?>				
            ]
            }]
        });
		 
		 
		 
		 // Create the chart
    $('#bar_reports').highcharts({		
			credits:{
				enabled:0
			},
		exporting: {
            enabled: false
        },
        chart: {
            type: 'column',
			backgroundColor:'rgba(255, 255, 255, 0.1)'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: ''
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Reports<br/>'
        },

        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [
			 <?php
				$loop=0;
					for($i=0;$i<sizeof($rsGetReportTotal);$i++){
						$moduleName = $rsGetReportTotal[$i]['module_name'];
						$TotalReport = $rsGetReportTotal[$i]['TotalReport'];
						
						echo "{ name: '$moduleName', y: $TotalReport}  ";
						
						if($loop<count($rsGetReportTotal) ){
							echo  	"," ;
						}else{
								echo " ";
						}
						$loop++;
					}
				?>
			]
        }]
    });

 /* End Report Chart */		 
		/*******************************************************/	
 

$.get('./modules/DWDM/dwdm_monthly_reports_stats_graph_by_months.php?setModule=DWDM&setPage=dwdm_monthly_reports_stats&year=<?=$rs_stat_yymm['years']?>&month=<?=$rs_stat_yymm['months']?>&target=main', function(data){						
					$('#graph_stats').html(data);
				});
 
 
   });				
});
</script> 
<div id="dialog-form-detail" style="display:none"></div>