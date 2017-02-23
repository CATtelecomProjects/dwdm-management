<?php
header("Content-type:text/html; charset=utf8"); 
include('../../includes/dbConnect.php');
//print_r($_GET);
$emp_code =$_GET['emp_code'];
$action = $_GET['action']; // ไม่มีส่งมาคือ หน้าจอบันทึกข้อมูล ถ้าส่งมาเป็นหน้าจอ View

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);


?>
<style>
	#tbl_mapping tr.hover:hover {
		background-color:#FFFFD9;	
	}
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

	
	$('.btn_report').button({
					  icons: {
					   primary: 'ui-icon-zoomin'
					  }
					 }).click(function( event ) {
						 var id = $(this).attr('id');			
						 var name = 	$(this).attr('rel');		 
						 
						 $.setDialog("mapping-user",780,640);
				
							$("#dialog-form-mapping-user").dialog('open');							
							
							$.get('./modules/'+setModule+'/dwdm_sm_mapping_user_list_report.php',		
									{  setModule : setModule , setPage : setPage , id : id , name : name},						
											function(data) {																						
												$("#dialog-form-mapping-user").html(data);												
											}
									).always(function(data) {			
									 $.loading("unload");
								  });					
								return false;
					
		});
	
	
	$(".check_all").change(function(){
	  var module =$(this).attr("id");
      var obj = $("input[id^='chk_"+module+"']").prop('checked', $(this).prop("checked"));
	   
	   //is checked add class /is not checked remove class
	   if($(this).is( ":checked" )){
	   		$("tr[id^='row_"+module+"']").addClass("ui-state-active");
	   }else{
		   $("tr[id^='row_"+module+"']").removeClass("ui-state-active");
	   }
	  
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
			var $sharedPortal = $("input[id^='chk_"+module_name+"']").filter(':first');
			
			 if (countChkBox >0) {
				
				var row_1st = $sharedPortal.attr('rel');		
				
						//$sharedPortal.prop('checked',true); # Comment by ting 2016-05-24
						//$('#row_'+row_1st).addClass("ui-state-active"); # Comment by ting 2016-05-24
					
					var countChkBox = $("input[id^='chk_"+module_name+"']").filter(':checked').length;    	    
					//alert(countChkBox);
					
			 }else{
					 // $('#row_'+row_1st).removeClass("ui-state-active"); # Comment by ting 2016-05-24
			 }//if select set Page Share Portal is Checked
	    	
			  $("tr[id^='row_"+row+"']").toggleClass("ui-state-active");
			
	
			
			 
			 // if count =1 mean shared page portal is 1 row select will set to 0 and remove class
			 if(countChkBox == 1){
				//  $('#row_'+row_1st).removeClass("ui-state-active"); # Comment by ting 2016-05-24
				  $sharedPortal.prop("checked",false);
				  countChkBox--;
			 }
			 
			  $("#select_rep_group_"+module_name).html(countChkBox).effect('highlight'); // Show count select
    });
	
	
	

	
/*	$('table#tbl_mapping tr ').click(function() {
    $(this).toggleClass("ui-state-active");
});*/
	
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
    <table width="100%" border="0" cellspacing="0" cellpadding="1" id="tbl_mapping">
    <tr class="ui-state-default">
    <td colspan="2" align="left" class="ui-state-highlight">
    <?php
	if(!isset($_GET['action'])){ 
	?>
    <label><input name="chk_<?=$module_name?>" id="<?=$module_name?>"  type="checkbox" value=""  class="check_all">Select All</label>  
    <?php
	}
	?>&nbsp;
    </td>
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
  	<tr  class="<?=$class?> hover" id="row_<?=$module_name?>_<?=$emp_code?>_<?=$rep_group_id?>">
    <td width="87%" align="left"><?php
	if(!isset($_GET['action'])){ 
	?>
    <label><div><input name="chk_data[]" id="chk_<?=$module_name?>_<?=$rep_group_id?>" type="checkbox" value="<?=$rep_group_id?>" ref="<?=$module_name?>" rel="<?=$module_name?>_<?=$emp_code?>_<?=$rep_group_id?>" <?=$chk;?>> <?=$rep_group_name?></div></label>
    <?php
	}else{
		 echo $rep_group_name;
	}
	?>   
    </td>
    <td width="13%" align="center"><a href="javascript:void(0)" id="<?=$rep_group_id?>" rel="<?=$rep_group_name?>" class="btn_report">Detail</a></td>
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