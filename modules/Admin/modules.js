// JavaScript Document
$(function(){

		
		// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
			// Setting Dialog
		//setDialog(setPage,520,220);
		$.setDialog(setPage , 520 , 220 );
		
		$.MainAction(setModule,setPage,'');
		
 });

