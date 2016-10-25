// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		var setTitle =  $("#setTitle").val();
		
			// Setting Dialog
		//setDialog(setPage,520,220);
		$.setDialog(setPage , 520 , 220 ,setTitle);
		
		$.MainAction(setModule,setPage,'');
		
 });

