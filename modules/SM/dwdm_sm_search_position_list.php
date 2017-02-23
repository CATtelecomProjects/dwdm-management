<?php
header("Content-type:text/html; charset=utf8"); 
include('../../includes/dbConnect.php');
//print_r($_GET);
$org_code =$_GET['org_code'];
$admin_code =$_GET['admin_code'];

//$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
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
 $(function() {
	 
	var setModule = $("#setModule").val();
		
	var setPage =  $("#setPage").val(); 
	 
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    $( "#accordion" ).accordion({ heightStyle:'content',   icons: icons    });   

	
  });
  </script>


<div id="accordion">
  <?php
  $sql_module = "SELECT DISTINCT
						  module_name,
						  COUNT(*)    AS TotalReport
						FROM view_mapping_position
						WHERE org_code = '$org_code'
							AND admin_code = '$admin_code'
							GROUP BY 1;";
$rs_module = $db->GetAll($sql_module);

	for($i=0;$i<count($rs_module);$i++){	
	
			$module_name = $rs_module[$i]['module_name'];
			$TotalReport = $rs_module[$i]['TotalReport'];
			
			
//echo json_encode($json_data);
?>
  <h3><?=$module_name?> : <?=$module_desc;?> (<strong><span id="select_rep_group_<?=$module_name?>"><?=$TotalReport?></strong> Report) </h3>
  <div>
    <table width="100%" border="0" cellspacing="1" cellpadding="2" id="tbl_mapping">   
 <?php
  	$sql_report = "SELECT										 
										  sub_module_name,
										  report_name
										FROM view_mapping_position
										WHERE org_code = '$org_code'
											AND admin_code = '$admin_code'
											AND module_name = '$module_name'
											ORDER BY report_id; ";
  
    $rs_report = $db->GetAll($sql_report);
	for($j=0;$j<count($rs_report);$j++){
		$sub_module_name = $rs_report[$j]['sub_module_name'];
		$report_name = $rs_report[$j]['report_name'];
		
  ?>
  	<tr  class="hover">
  	  <td width="7%" align="center"><strong>
  	    <?=($j+1)?>
  	  </strong></td>
    <td width="33%" align="left"><label><?=$sub_module_name?></label></td>
    <td width="60%" align="left"><?= $report_name ?></td>
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