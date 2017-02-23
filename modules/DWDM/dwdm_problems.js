// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		var setTitle =  $("#setTitle").val();
		
			// Setting Dialog
		$.setDialog(setPage,700,590,setTitle);
		
		
		$.MainAction(setModule,setPage);
		
		// àÅ×Í¡àÁ¹Ù
				$('#problem_status , #sel_cate_id').change(function(){
					window.location = '?setModule='+setModule+'&setPage='+setPage+'&problem_status='+$("#problem_status").val()+'&cate_id='+$("#sel_cate_id").val();
				});
				
				
				// Open View
				$(".OpenView").click(function(){
					 $.loading("load");
					$.setDialog(setPage,750,670);
					
					var id = $(this).attr("rel");
					
					$('#dialog-form-'+setPage).dialog('open');	
					$.get('./modules/'+setModule+'/'+setPage+'_views.php',		
							{setModule : setModule ,setPage : setPage,  id : id },						
									function(data) {																						
										$("#dialog-form-"+setPage).html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
				});
				
				
 });

