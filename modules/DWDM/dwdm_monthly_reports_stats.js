// JavaScript Document
$(function(){

	
	// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
	//	$("#sel_years, #sel_months").css({"cursor":"pointer"});
		
		$('.button').button();
		
		$(".a_tooltips").tipsy({html: true ,gravity: 'w' });
		
		
				
		//
		$(".btnGraph button:first").button({
				icons: {
					primary: 'ui-icon-image'
				}			
				}).click(function(){
				 $.loading("load");
				 var d = new Date(),
						//n = d.getMonth()+1;
						y =  $("#hidYears").val();//d.getFullYear();
			//	if(n<10) { n = "0"+n }		
				
				var m = $('#hidMonths').val();		
						
				 $.setDialog("graph",980,740);
					$('#dialog-form-graph').dialog('open');	
					$.get('./modules/'+setModule+'/'+setPage+'_graph_by_months.php',		
							{  setModule : setModule , setPage : setPage , year : y , month :   m },						
									function(data) {																						
										$("#dialog-form-graph").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
			});		
			
			
			
			/*$(".btnGraph2 button:first").button({
				icons: {
					primary: 'ui-icon-image'
				}			
				}).click(function(){
				 $.loading("load");
				
				 $.setDialog("graph",980,740);
					$('#dialog-form-graph').dialog('open');	
					$.get('./modules/'+setModule+'/'+setPage+'_graph_by_months_org.php',		
							{  setModule : setModule , setPage : setPage },						
									function(data) {																						
										$("#dialog-form-graph").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
			});	*/
					
					
		
		
		
		//Change Years
		$("#sel_years").change(function(){		
			 window.location = "?setModule="+setModule+"&setPage="+setPage+"&year="+$(this).val();
			
		});
		
		// เลือกเดือน
				$("#sel_months").change(function(){
					window.location = "?setModule="+setModule+"&setPage="+setPage+"&year="+$("#sel_years").val()+"&month="+$(this).val();
				});
		
			// Setting Dialog
		$.setDialog(setPage,520,360);
		
		
		$.MainAction(setModule,setPage);
			
		
	   });