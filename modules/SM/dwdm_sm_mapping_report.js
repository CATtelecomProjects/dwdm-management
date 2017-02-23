// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		$('#rep_group_name').focus().effect('highlight');
		
		var w = $( window ).height() -200;
		
		$("#list_reports").css("height" , w);
		
			// Setting Dialog
		$.setDialog(setPage,650,350);
		
		
		$.MainAction(setModule,setPage,'sub_module_id' );
		
	    $.FormAction('MAPPING' ,setModule  ,setPage , 'dwdm_sm_mapping_report' );


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
					$('#list_reports').html('');
					$('#view_save').hide('fade')
					$('#rep_group_name').focus().effect('highlight');	
				});
				

		// Auto Complete
		$( "#rep_group_name" ).autocomplete({
					source: "./modules/"+setModule+"/autocomp_search_rep_group.php?"+$.now(),
					minLength: 2,
					select: function( event, ui ) {
						$("#rep_group_id").val(ui.item.id);						
						
						
						$.loading("load");
						$.get('./modules/'+setModule+'/dwdm_sm_mapping_report_listing.php?'+$.now()+'&rep_group_id='+$('#rep_group_id').val()+'&setModule='+setModule+'&setPage='+setPage, function(data){							
						
						$('#list_reports').html(data);
						$.loading("unload");
						$('#view_save').show('fade');
						$(".rep_type").html(ui.item.type);
						
						});
					}

		});
		
		
 });

