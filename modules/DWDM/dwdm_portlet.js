// JavaScript Document
$(function(){

	
	// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		var setTitle =  $("#setTitle").val();
		
			
				$(".preview").button({
				icons: {
					primary: 'ui-icon-search'
				}			
				}).click( function() {
					$.loading("load");
					$('#dialog-form-dwdm_portlet').dialog('open');	
					var portlet = $(this).val();	
					$.get('./modules/'+setModule+'/'+setPage+'_view.php?t=app',		
							{ portlet : portlet   },						
									function(data) {													
										$("#dialog-form-"+setPage).html(data);	
										$.loading("unload");				
									}
							)					
						return false;
				});
			
				
		
			// Setting Dialog
		$.setDialog(setPage,860,550,setTitle );
		
		
		$.MainAction(setModule,setPage);
			
		
	   });

