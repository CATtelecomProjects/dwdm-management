// JavaScript Document
$(function(){
			
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		// Setting Dialog
		$.setDialog(setPage,520,420);
		
		$.MainAction(setModule,setPage,'mgroup_id');
		
		
	   });

