<?php
require_once("../../includes/config.inc.php");
require_once("../../includes/Class/DataTable.Class.php");

$tbl = new dataTable();
$tbl->id = $_GET['setPage'];
$tbl->title = title_menu($_GET['setPage']);
//$tbl->menu = MENU_ACTION;
$tbl->module = $_GET['setModule'];
$tbl->page = $_GET['setPage'];
$tbl->order = 0;
//show_get();
?>

<script type="text/javascript" src="js/jquery.tipsy.js"></script>


<table width="100%" border="0" cellspacing="0" cellpadding="0">        
        <tr>
          <td height="40" align="left" valign="top" class="ui-state-highlight"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="73%" height="46"><label for="emp_name">
                &nbsp; <strong> Employee Information : </strong> <small>(Ex.  ชื่อ , นามสกุล, รหัสพนักงาน, ชื่อหน่วยงาน)</small><br>
                &nbsp;
                <input name="emp_name" type="search" id="emp_name" size="90" placeholder="Fill Employee Information">
                </label>
                <input type="hidden" name="emp_code" id="emp_code"><span id="view_reset_tab1" style="display:none">               
          <button type='reset'  id='btnReset'>ค้นใหม่</button>
                </span><div id="show_emp_detail" style="padding:0px 0px 5px 10px;display:none;"></div>
                 </td>
              <td width="27%" align="right" valign="middle"></td>
              </tr>
            </table></td>
        </tr>
        <tr valign="top">
          <td width="42%" align="left"><div id="list_tab1" style=" width:100%; min-height:400px; overflow:auto;"></div></td>
        </tr>
    </table>
<form id="form_<?=$_GET['setPage']?>" name="form_<?=$_GET['setPage']?>" method="post" action="">
<input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
<input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
</form>

<script type="text/javascript">
$(function(){

		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		//var w = $( window ).height() -200;
		
	//	$("#list_reports").css("height" , w);
		
		$('#emp_name').focus().effect('highlight');	
		
		
		//$.MainAction(setModule,setPage,'rep_group_id' );
		
	   // $.FormAction('MAPPING' ,setModule  ,setPage , 'dwdm_sm_mapping_user');


			
			
		
			$('button:reset').button({
					  icons: {
					   primary: 'ui-icon-refresh'
					  }
					 }).click(function( event ) {
						$('#form_'+setPage)[0].reset();
						$('#list_tab1').html('');						
						$('#show_emp_detail').hide('fade');
						$('#emp_name').val('');
						$('#emp_name').focus().effect('highlight');	
						$('#view_reset_tab1').hide();
				});
		
		
				

		// Auto Complete
		$( "#emp_name" ).autocomplete({
					source: "./modules/"+setModule+"/autocomp_search_emp.php?"+$.now(),
					minLength: 2,					
					select: function( event, ui ) {
						$("#emp_code").val(ui.item.id);											
						
						$.loading("load");
						$.get('./modules/'+setModule+'/dwdm_sm_mapping_user_listing_view.php?"+$.now()+"&emp_code='+$('#emp_code').val()+'&setModule='+setModule+'&setPage='+setPage, function(data){							
						
						$('#list_tab1').html(data);
						$('#view_reset_tab1').show();
						
						$.loading("unload");						
						
						//Show User Detail
						$.get('./modules/'+setModule+'/dwdm_sm_mapping_user_detail.php?'+$.now(), { emp_code : ui.item.id } , function(data){
							$('#show_emp_detail').html(data).show();			
						});
						
							$( "#emp_name").val(ui.item.key);							
							
						});
					}

		});
			
			
 });

</script>