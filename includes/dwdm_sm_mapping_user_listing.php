<?php
header("Content-type:text/html; charset=utf8"); 
include('../../includes/dbConnect.php');
//print_r($_GET);
$emp_code =$_GET['emp_code'];

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);


?>
<style>
.highlight { font-weight:bold; }

table#tbl_mapping tr:nth-child(even) {background: #efef}
table#tbl_mapping tr:nth-child(odd) {background: #FFF}
table#tbl_mapping td:hover {background: #ff00}

</style>
  <script>     
 $(function() {
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    $( "#accordion" ).accordion({ heightStyle:'content',   icons: icons    });   

	
	$(".check_all").change(function(){
	  var module =$(this).attr("id");
      var obj = $("input[id^='chk_"+module+"']").prop('checked', $(this).prop("checked"));
	   $("tr[id^='row']").toggleClass("ui-state-active");
	  
	  
	 var chk_len =  $("input[id^='chk_"+module+"']").filter(':checked').length;
	 $("#select_rep_group_"+module).html(chk_len).effect('highlight');
	  
	 
	  
      });
	
	
	// Count checked report
	var $checkboxes = $("input[name^='chk_data']");
       
    $checkboxes.change(function(){
    		var module_name = $(this).attr("ref");
			//var countChkBox = $checkboxes.filter(':checked').length;
			var countChkBox = $("input[id^='chk_"+module_name+"']").filter(':checked').length;    	    
			var row = $(this).attr('rel');
			
			 if (countChkBox >0) {
					$("input[id^='chk_"+module_name+"']").filter(':first').prop('checked',true); 
					
					var countChkBox = $("input[id^='chk_"+module_name+"']").filter(':checked').length;    	    
					//alert(countChkBox);
					
			 }//if select set Page Share Portal is Checked
	    	
			 $('#row_'+row).toggleClass("ui-state-active");
			
	
			
			
			 $("#select_rep_group_"+module_name).html(countChkBox).effect('highlight'); // Show count select
    });
	
	
	
/*	$('table#tbl_mapping tr ').click(function() {
    $(this).toggleClass("ui-state-active");
});*/
	
  });
  </script>

</head>
<body>
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
								  LEFT JOIN tbl_sm_mapping_user c
									ON (b.rep_group_id = c.rep_group_id
										AND c.emp_code = '$emp_code')
								GROUP BY a.module_name;";
$rs_emp = $db->GetAll($sql_emp);

	for($i=0;$i<count($rs_emp);$i++){	
	
			$module_name = $rs_emp[$i]['module_name'];
			$module_desc = $rs_emp[$i]['module_desc'];
			$count_tatal = $rs_emp[$i]['count_tatal'];
			$count_mapping = $rs_emp[$i]['count_mapping'];
			
//echo json_encode($json_data);
?>
  <h3><?=$module_name?> : <?=$module_desc;?> (<strong><span id="select_rep_group_<?=$module_name?>"><?=(int) $count_mapping; ?></span>/<?=$count_tatal?></strong> Groups) </h3>
  <div>
    <table width="100%" border="0" cellspacing="1" cellpadding="1" id="tbl_mapping">
    <tr class="ui-state-default">
    <td width="69%" align="left" class="ui-state-highlight"><label><input name="chk_<?=$module_name?>" id="<?=$module_name?>"  type="checkbox" value=""  class="check_all">Select All</label>  </td>
    </tr>
 <?php
  	$sql_report_group = "SELECT
							  a.rep_group_id,
							  b.rep_group_id   AS rep_group_id_map,
							  a.rep_group_name,
							  a.module_name
							FROM tbl_sm_report_group a
							  LEFT JOIN tbl_sm_mapping_user b
								ON (a.rep_group_id = b.rep_group_id
									AND b.emp_code = '$emp_code')
							WHERE module_name = '$module_name'
							ORDER BY a.rep_group_orders";
  
    $rs_report_group = $db->GetAll($sql_report_group);
	for($j=0;$j<count($rs_report_group);$j++){
		$rep_group_id = $rs_report_group[$j]['rep_group_id'];
		$rep_group_id_map = $rs_report_group[$j]['rep_group_id_map'];
		$rep_group_name = $rs_report_group[$j]['rep_group_name'];
		$module_name = $rs_report_group[$j]['module_name'];
	
		$chk = $rep_group_id == $rep_group_id_map ? 'checked' : '';
		$class = $rep_group_id == $rep_group_id_map ? 'ui-state-active' : '';
  ?>
  	<tr class="nav" id="row_<?=$emp_code?>_<?=$rep_group_id?>">
    <td width="69%" align="left" class="<?=$class?>"><label><div><input name="chk_data[]" id="chk_<?=$module_name?>_<?=$rep_group_id?>" type="checkbox" value="<?=$rep_group_id?>" ref="<?=$module_name?>" rel="<?=$emp_code?>_<?=$rep_group_id?>" <?=$chk;?>> <?=$rep_group_name?> -> chk_<?=$module_name?>_<?=$rep_group_id?></div></label></td>
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
