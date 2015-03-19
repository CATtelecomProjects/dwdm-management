// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
			// Setting Dialog
		$.setDialog(setPage,600,300);
		
		
		$.MainAction(setModule,setPage,'group_id');
		
 });

