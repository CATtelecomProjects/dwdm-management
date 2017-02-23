// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		$('#org').focus().effect('highlight');
		
		
		var w = $( window ).height() -200;
		
		$("#list_org").css("height" , w);
		
			// Setting Dialog
		$.setDialog(setPage,650,350);
		
		
		$.MainAction(setModule,setPage);
		
	    $.FormAction('MAPPING' ,setModule  ,setPage , 'dwdm_sm_mapping_position' ,false );


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
					$('#list_mapping').html('');
					$('#view_save').hide('fade')
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
						$.get('./modules/'+setModule+'/dwdm_sm_mapping_position_org_listing.php?'+$.now(), { setModule : setModule , setPage : setPage , org_code : $('#org_code').val() , org_data : ui.item.value  }, function(data){							
						
						$('#list_org').html(data);
						$('#list_mapping').html('');
						$('#view_save').hide('fade')
						$.loading("unload");					
					
						
						});
					}

		});
		
		
 });

