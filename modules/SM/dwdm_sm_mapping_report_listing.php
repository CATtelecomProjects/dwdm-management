<?php
header("Content-type:text/html; charset=utf8"); 
include('../../includes/dbConnect.php');
//print_r($_GET);
$rep_group_id =$_GET['rep_group_id'];

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);

$sql_sub_module = "SELECT
							  a.sub_module_id,
							  a.sub_module_name,
							  COUNT(b.report_id) AS count_report_tatal,
							  COUNT(c.report_id) AS count_report_mapping
							FROM tbl_sm_sub_module a
							  JOIN tbl_sm_report b
								ON a.sub_module_id = b.sub_module_id
							  LEFT JOIN tbl_sm_mapping_report c
								ON (b.report_id = c.report_id
									AND c.rep_group_id = $rep_group_id)
							WHERE a.module_name = (SELECT
													 module_name
												   FROM tbl_sm_report_group
												   WHERE rep_group_id = $rep_group_id)
							 AND  b.actived = 'Y'												   
							GROUP BY a.sub_module_id";
$rs_sub_module = $db->GetAll($sql_sub_module);


?>
<style>
	#tbl_mapping tr.hover:hover {
		background-color:#FFFFD9;	
	}
</style>
  <script>     
 $(function() {
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    $( "#accordion" ).accordion({ heightStyle:'content',   icons: icons    });   

	
	$(".check_all").change(function(){
	  var id =$(this).attr("id");
      var obj = $("input[id^='chk_"+id+"']").prop('checked', $(this).prop("checked"));
	  
	 var chk_len =  $("input[id^='chk_"+id+"']").filter(':checked').length;
	 $("#select_report_"+id).html(chk_len).effect('highlight');
	 
	  
	   //is checked add class /is not checked remove class
	   if($(this).is( ":checked" )){
	   		$("tr[id^='row_"+id+"']").addClass("ui-state-active");
	   }else{
		   $("tr[id^='row_"+id+"']").removeClass("ui-state-active");
	   }
	  
      });
	
	
	// Count checked report
	var $checkboxes = $("input[name^='chk_data']");
       
    $checkboxes.change(function(){
    		var sub_module_id = $(this).attr("ref");
			//var countChkBox = $checkboxes.filter(':checked').length;
			var countChkBox = $("input[id^='chk_"+sub_module_id+"']").filter(':checked').length;
			var row = $(this).attr('rel');
			
    	     $("#select_report_"+sub_module_id).html(countChkBox).effect('highlight');
			 
			  $('#row_'+row).toggleClass("ui-state-active");
	    
    });
	
	
  });
  </script>

<div id="accordion">
  <?php
	for($i=0;$i<count($rs_sub_module);$i++){	
	
			$sub_module_id = $rs_sub_module[$i]['sub_module_id'];
			$sub_module_name = $rs_sub_module[$i]['sub_module_name'];
			$count_report_tatal = $rs_sub_module[$i]['count_report_tatal'];
			$count_report_mapping = $rs_sub_module[$i]['count_report_mapping'];
			
//echo json_encode($json_data);
?>
  <h3><?=$sub_module_name?> [<span class="rep_type"></span>] (<strong><span id="select_report_<?=$sub_module_id?>"><?=(int) $count_report_mapping; ?></span>/<?=$count_report_tatal?></strong> Reports) </h3>
  <div>
    <table width="100%" border="0" cellspacing="1" cellpadding="1" id="tbl_mapping">
    <tr class="ui-state-default">
    <td width="69%" align="left"><label><input name="chk_<?=$sub_module_id?>" id="<?=$sub_module_id?>"  type="checkbox" value=""  class="check_all">Select All</label> </td>
    </tr>
 <?php
  	$sql_report = "SELECT
							  a.report_id,
							  b.report_id   AS report_id_map,
							  a.report_name							 
							FROM tbl_sm_report a
							  LEFT JOIN tbl_sm_mapping_report b
								ON (a.report_id = b.report_id
								  AND b.rep_group_id = $rep_group_id)
							WHERE a.sub_module_id = $sub_module_id
							AND a.actived = 'Y'";
  
    $rs_report = $db->GetAll($sql_report);
	for($j=0;$j<count($rs_report);$j++){
		$report_id = $rs_report[$j]['report_id'];
		$report_id_map = $rs_report[$j]['report_id_map'];
		$report_name = $rs_report[$j]['report_name'];
	
		$chk = $report_id == $report_id_map ? 'checked' : '';
		$class = $report_id == $report_id_map ? 'ui-state-active' : '';
  ?>
  	<tr class="<?=$class?> hover" id="row_<?=$sub_module_id?>_<?=$report_id?>">
    <td width="69%" align="left"><label><div><input name="chk_data[]" id="chk_<?=$sub_module_id?>_<?=$report_id?>" type="checkbox" value="<?=$report_id?>" ref="<?=$sub_module_id?>" <?=$chk;?>  rel="<?=$sub_module_id?>_<?=$report_id?>"> <?=$report_name?></div></label></td>
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
