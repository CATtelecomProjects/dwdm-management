// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		var setTitle =  $("#setTitle").val();
		
			// Setting Dialog
		$.setDialog(setPage,690,690,setTitle);
		
		
		$.MainAction(setModule,setPage,'module_name');
		
 });

