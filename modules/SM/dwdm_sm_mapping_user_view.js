// JavaScript Document


$(function(){

		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		var w = $( window ).height() -200;
		
		$("#list_reports").css("height" , w);
		
		$('#emp_name').focus().effect('highlight');	
		
		
		//$.MainAction(setModule,setPage,'rep_group_id' );
		
	   // $.FormAction('MAPPING' ,setModule  ,setPage , 'dwdm_sm_mapping_user');


			$( "button:first" ).button({
			  icons: {
				primary: "ui-icon-disk"
			  }		 
			});
			
			$('button:reset').button({
					  icons: {
					   primary: 'ui-icon-refresh'
					  }
					 }).click(function( event ) {
						$('#form_'+setPage)[0].reset();
						$('#list_reports').html('');						
						$('#show_emp_detail').hide('fade');
						$('#emp_name').val('');
						$('#emp_name').focus().effect('highlight');	
						$('#view_save').hide();
				});
				

		// Auto Complete
		$( "#emp_name" ).autocomplete({
					source: "./modules/"+setModule+"/autocomp_search_emp.php?"+$.now(),
					minLength: 2,					
					select: function( event, ui ) {
						$("#emp_code").val(ui.item.id);											
						
						$.loading("load");
						$.get('./modules/'+setModule+'/dwdm_sm_mapping_user_listing_view.php?"+$.now()+"&emp_code='+$('#emp_code').val()+'&setModule='+setModule+'&setPage='+setPage, function(data){							
						
						$('#list_reports').html(data);
						$('#view_save').show();
						
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

