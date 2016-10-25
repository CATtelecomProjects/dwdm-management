<?php
@session_start();
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
// List Module
$sql_sub_module = "SELECT
								  sub_module_id,
								  sub_module_name,
								  module_name
								FROM tbl_sm_sub_module
								ORDER BY module_name";
//$rs_sub_module = $db->GetAll($sql_sub_module);


?>

<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td height="40" align="left" valign="middle" class="ui-state-highlight"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="77%" height="46"><label for="org"></label>
            &nbsp; <strong> Organization Name : </strong> <small>(Ex. หน่วย,กลุ่ม,ฝ่าย,ส่วน)</small><br>
            &nbsp;
            <input name="org" type="search" id="org" size="90"  placeholder="Fill Organization Information">
            <input type="hidden" name="org_code" id="org_code"><span id="view_org" style="display:none">         
            <button type='reset' name='btnReset' id='btnReset'>
            ค้นใหม่
            </button>
            </span></td>
          <td width="23%" align="right" valign="middle"></td>
        </tr>
      </table></td>
  </tr>
  <tr valign="top">
    <td align="left"><div id="list_org" style=" width:100%; min-height:300px; overflow:auto;"></div>
      </td>
  </tr>
</table>
<form id="form_<?=$_GET['setPage']?>" name="form_<?=$_GET['setPage']?>" method="post" action="">
  <input type="hidden" name="setModule" id="setModule" value="<?=$_GET['setModule']?>" />
  <input type="hidden" name="setPage" id="setPage" value="<?=$_GET['setPage']?>" />
</form>
<div id="dialog-form-<?=$_GET['setPage']?>"></div>


<script type="text/javascript">
// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		$('#org').focus().effect('highlight');
				
			// Setting Dialog
		$.setDialog(setPage,650,350);
		
		
		$.MainAction(setModule,setPage);
		
	  //  $.FormAction('MAPPING' ,setModule  ,setPage , 'dwdm_sm_mapping_position' ,false );


			$( "button:first" ).button({
			  icons: {
				primary: "ui-icon-disk"
			  }		 
			});
			
			$('button:reset').button({
					  icons: {
					   primary: 'ui-icon-circle-close'
					  }
					 }).click(function( event ) {
					$('#form_'+setPage)[0].reset();
					$('#list_org').html('');			
					$('#org').val('');				
					$('#view_org').hide('fade')
						
					$('#org').focus().effect('highlight');	
				});
				
		
		
		// Auto Complete
		$( "#org" ).autocomplete({
					source: "./modules/"+setModule+"/autocomp_search_org.php?"+$.now(),
					minLength: 2,
					select: function( event, ui ) {
						$("#org_code").val(ui.item.id);						
						
						var str = 
						$.loading("load");
						$.get('./modules/'+setModule+'/dwdm_sm_search_org_list.php?'+$.now(), { setModule : setModule , setPage : setPage , org_code : $('#org_code').val() , org_data : ui.item.value  }, function(data){							
						
						$('#list_org').html(data);
						$('#list_mapping').html('');
						$('#view_org').show('fade')
						$.loading("unload");					
					
						
						});
					}
		});
		
		
 });



</script>