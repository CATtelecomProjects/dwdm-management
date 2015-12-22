<?php
include('../../includes/config.inc.php');
//show_get();

$year = $_GET['year'];
$month = $_GET['month'];
//show_get();
// Get month for select box
 $sql_month = "SELECT DISTINCT
						  MONTHS
						FROM tbl_dwdm_monthly_stats
						WHERE YEARS=$year
						ORDER BY MONTHS DESC";
$rs_month = $db->GetAll($sql_month);

echo "<table border='0' width='100%'>";
echo "<tr>";
echo "<td width='50%'>";
		echo "ข้อมูลเดือน : ";
        echo "<select name='select_month' id='select_month'>";

          for($i=0;$i<count($rs_month);$i++){ //ThaiMonthFull as $key => $value){
			  $sel = $rs_month[$i]['MONTHS'] == $_GET['month'] ? ' selected ' : '';
			  
			echo "<option value='".$rs_month[$i]['MONTHS']."' $sel>".$ThaiMonthX[$rs_month[$i]['MONTHS']]." ".($year+543)."</option>";	  
		  }
		 echo    "</select>";
echo "</td>";
echo "<td width='50%' align='right'>";
//echo $div_graph = "&nbsp;<span class='btnGraphM''> <button>กราฟรายเดือน</button></span>";
echo "</tr>";
echo "</table>";



// Get data
 $sql = "SELECT
			  NAME,
			  POSITION_NAME,
			  WEB_STATS,
			  TOOL_STATS,
			  TOTALS
			FROM tbl_dwdm_monthly_stats
			WHERE LEVELS = 2
				AND YEARS = $year
				AND MONTHS = $month
			ORDER BY TOTALS DESC";
$rs_data = $db->GetAll($sql);
/*print "<pre>";
print_r($rs_data);
print "</pre>";
*/
?>

<script type="text/javascript">
$(function () {
	
		
	// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
	<?php
	if(count($rs_data)>0){
		
	?>	
	
 // Pie Chart
    $('#graph_pie').highcharts({
		credits:{
				enabled:0
			},
       chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
           text: 'สถิติการเข้าใช้งานระบบ DW/DM <?=' เดือน '.$ThaiMonthX[$month]." ปี ".($year+543)?>'
        },
        tooltip: {
            pointFormat: '<b>สาย {point.name}.</b> ({point.percentage:.0f}%)'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '<b>สาย {point.name}.</b> ({point.percentage:.0f}%)'
                }
            }
        },
        series: [{
            type: 'pie',          
           data: [
			<?php
if(count($rs_data)<=0)  exit;
	$loop=0;
	$cate[] = "";
  for($i=0;$i<count($rs_data);$i++){
	  
	
		$cate[$i] = $rs_data[$i]['POSITION_NAME'];  
		$options = $i==0 ? " , sliced: true, selected: true" : "";
	  
						echo "{ ";
						echo "name : '".$rs_data[$i]['POSITION_NAME']."',";
						echo "y : ".$rs_data[$i]['TOTALS']." $options} ";					
						if($loop<count($rs_data) ){
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
	
	
	
	$('#graph_column').highcharts({
		credits:{
				enabled:0
			},
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
            xAxis: {
            categories: [
			<?php
		if(count($rs_data)<=0)  exit;
				$loop=0;
				 for($i=0;$i<count($rs_data);$i++){
											  
						echo "'สาย ".$rs_data[$i]['POSITION_NAME'].".'";
						
						if($loop<count($rs_data) ){
							echo  	"," ;
						}else{
								echo " ";
						}
						
					$loop++;
				}			
				?>
			
			],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'จำนวน (ครั้ง)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} ครั้ง</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
				dataLabels: {
                    enabled: true
                },
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
           name: "หน่วยงาน",
            colorByPoint: true,
            data: [
		
		<?php
		if(count($rs_data)<=0)  exit;
				$loop=0;
				 for($i=0;$i<count($rs_data);$i++){
					 
						echo "{ ";							  
						echo "name :  'สาย ".$rs_data[$i]['POSITION_NAME'].".',";
						echo "y : ".$rs_data[$i]['TOTALS']." ,";
						echo  " } ";					
						if($loop<count($rs_data) ){
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
	

		
		<?php
				} // End if
		?>

		$("#select_month").change(function(){
			 $.loading("load");

			$.get('./modules/'+setModule+'/'+setPage+'_graph_by_months.php',		
							{ doAction : 'new' , setModule : setModule , setPage : setPage , year  :  2015, month : $(this).val() },						
									function(data) {																						
										$("#dialog-form-graph").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
		});
		
		
		
		//
		$(".btnGraphM button:first").button({
				icons: {
					primary: 'ui-icon-image'
				}			
				}).click(function(){
				 $.loading("load");
				 var d = new Date(),
						//n = d.getMonth()+1;
						y =  $("#hidYears").val();//d.getFullYear();
			//	if(n<10) { n = "0"+n }		
				
				var m = $('#maxMonth').val();		
						
				 $.setDialog("graph",680,540);
					$('#dialog-form-graph').dialog('open');	
					$.get('./modules/'+setModule+'/'+setPage+'_graph_by_months.php',		
							{  setModule : setModule , setPage : setPage , years : y , months :   m },						
									function(data) {																						
										$("#dialog-form-graph").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
			});
		
		
    });
    </script>
		
        <hr>
        <div id="graph_pie" style="min-width: 310px; height: 320px; margin: 0 auto"></div>

        <div id="graph_column" style="min-width: 350px; height: 320px; margin: 0 auto"></div>

