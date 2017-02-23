// JavaScript Document
$(function(){

		
// modules = module name
// pages = page name
// select_id = selection id
var setModule = $("#setModule").val();

var setPage =  $("#setPage").val();


// Accordion
		$("#accordion_users, #accordion_reports, #accordion_stats").accordion({ 									
							heightStyle: 'content'
		});
				
		$(".tooltips").tipsy({html: true  , trigger: "hover",gravity: "s" });	
			
		$('.box-score').click(function(e){
			var doAction = $(this).attr('rel');
			var module = $(this).attr('ref');	
			
			var useFile = doAction == "USERS" ? "_list_user_by_module.php" : "_list_user_by_report.php";
			
			$("#dialog-form-detail").html("");	
			
			$.setDialog("detail",980,750);
			
						
			$('#dialog-form-detail').dialog('open');	
			
			
			$("span.ui-dialog-title").text("LIST  "+ doAction+" ["+module+"]"); 
			
			$.loading("load");	
					
					$.get('./modules/'+setModule+'/'+setPage+useFile+'?'+$.now(),		
							{  setModule : doAction , module : module },						
									function(data) {																						
										$("#dialog-form-detail").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
			
			
		});
		
 });

