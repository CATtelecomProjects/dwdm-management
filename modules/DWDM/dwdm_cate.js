// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
			// Setting Dialog
		$.setDialog(setPage,500,270);
		
		
		$.MainAction(setModule,setPage,'');
		
 });

