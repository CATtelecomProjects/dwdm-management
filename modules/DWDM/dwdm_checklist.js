// JavaScript Document
$(function(){

	
	// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		var setTitle =  $("#setTitle").val();
		
		$.setDialog(setPage,700,590,setTitle);
		
		$('.button').button();
		
		$(".a_tooltips").tipsy({html: true ,gravity: 'w' });
		
		
			
		$(".div_keyin").hide();	
		
					
			// Date  picker
			var minDateVal = $('#date_start').val();
			var maxDateVal = $('#date_end').val();
			var check_id =$("#check_id").val();
			
			$('#show_calendar').datetimepicker({
			  format:'d-m-Y',
			  inline:true,
			  lang:'th',
			  timepicker:false,
			  todayButton : true,
			  minDate: minDateVal,	
			  maxDate: maxDateVal,
			  startDate:$('#current_date').val(),formatDate:'d-m-Y',
			//  weeks : true,			 	
			  onSelectDate:function(dp,$input){
										//console.log($input.val());
										$.loading("load");	
										$("#div_form_content").show();
										$("#td_calendar").width("14%");
										$("#td_form").width("86%");								
										$.get('./modules/'+setModule+'/'+setPage+'_keyin.php?modules='+setModule+'&pages='+setPage+'&check_id='+check_id+'&date='+$input.val(),function(data){									
												$("#div_form_content").html(data);
											$.loading("unload");
										});
										
										
										
									  }
			});
			
			
			
			// check current page
			var page = $("#current_page").val();
			if(page == "form"){
				$("#td_calendar").width("100%");
				$("#td_form").width("0%");
				
			/*	$.get('./modules/'+setModule+'/'+setPage+'_keyin.php?check_id='+check_id+'&date='+$("#date_start").val(),
						function(data){
											$("#div_form_content").html(data);										
										});
				*/						
			}
			
			
			
		
			// Open Checklist
			
			$(".views").button({
				icons: {
					primary: 'ui-icon-search'
				}			
				}).click(function(){
					
				var check_id = $(this).val();
					window.location = "?setModule="+setModule+"&setPage="+setPage+"&page=form&years="+$("#sel_years").val()+"&check_id="+check_id;
					return false;
			});
			
		
			
			// Open Keyin Form
			
			$(".keyin").button({
				icons: {
					primary: 'ui-icon-calendar'
				}			
				}).click(function(){
						$(".div_keyin").toggle("blind");
						
			});
		
		
		
		// Function to Dislplay data
		$.show_checklist = function (check_id){
			$.loading('load');
			$.get('./modules/'+setModule+'/'+setPage+'_view.php?setModule='+setModule+'&setPage='+setPage+'&check_id='+check_id,	
					function(data){
								$("#div_display").html(data);										
								$.loading('unload');
					});		
			
		}
		
		if(page == "form"){
		// on load call display data
		$.show_checklist(check_id);
		}
		
		// Back Button
		$(".back button:first").button({
				icons: {
					primary: 'ui-icon-arrowreturnthick-1-w'
				}				
				}).click( function() {					
					window.location = "?setModule=DWDM&setPage=dwdm_checklist";
				});
				
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
				
				var m = $('#maxMonth').val();		
						
				 $.setDialog("graph",980,740);
					$('#dialog-form-graph').dialog('open');	
					$.get('./modules/'+setModule+'/'+setPage+'_graph_by_daily.php',		
							{  setModule : setModule , setPage : setPage , years : y , months :   m },						
									function(data) {																						
										$("#dialog-form-graph").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
			});		
			
			
			
			$(".btnGraphYear button:first").button({
				icons: {
					primary: 'ui-icon-image'
				}			
				}).click(function(){
				 $.loading("load");
				 var d = new Date(),
						//n = d.getMonth()+1;
						y =  $("#hidYears").val();//d.getFullYear();
			//	if(n<10) { n = "0"+n }		
				
				var m = $('#maxMonth').val();		
						
				 $.setDialog("graph",980,740);
					$('#dialog-form-graph').dialog('open');	
					$.get('./modules/'+setModule+'/'+setPage+'_graph_by_monthly.php',		
							{  setModule : setModule , setPage : setPage , years : y , months :   m },						
									function(data) {																						
										$("#dialog-form-graph").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
			});	
					
					
			$(".btnReport button:first").button({
				icons: {
					primary: 'ui-icon-image'
				}			
				}).click(function(){
				 $.loading("load");
				 var d = new Date(),
						//n = d.getMonth()+1;
						y =  $("#hidYears").val();						//d.getFullYear();
			//	if(n<10) { n = "0"+n }		
				
				var m = $('#maxMonth').val();		
						
				 $.setDialog("report",1200,820);
					$('#dialog-form-report').dialog('open');	
					$.get('./modules/'+setModule+'/'+setPage+'_reports_problems.php',		
							{ setModule : setModule , setPage : setPage , years : y  },						
									function(data) {																						
										$("#dialog-form-report").html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
			});				
		
		
		// Send Button
		$("#btnApprove").button({
				icons: {
					primary: 'ui-icon-circle-check'
				}			
				}).click(function(){		
					if(confirm("ต้องการดำเนินการ ใช่ หรือ ไม่ ?")){			
						$.loading("load");
						var status = $(this).attr("ref");						
						$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล  
               			 url:"./modules/"+setModule+"/"+setPage+"_code.php",  
						data: { doAction : 'set_status' , status : status, id : check_id  },  
						async:false,  
						type : 'get',
						success:function(getData){  												
										$.loading("unload");
										$('#divMsg').html(' ดำเนินการเรียบร้อย !!').fadeIn();		
										setTimeout("window.location.reload(true)",2000);	
									
							}  // End function : success
						});	
					}
			});
			
			
			// Export Button
		$("#btnExport").button({
				icons: {
					primary: 'ui-icon-extlink'
				}			
				}).click(function(){		
					window.open("modules/DWDM/dwdm_checklist_export.php?check_id="+check_id);
			});
			
		
		//Change Years
		$("#sel_years").change(function(){		
			 window.location = "?setModule=DWDM&setPage=dwdm_checklist&years="+$(this).val();
			
		});
		
		
			// Setting Dialog
		$.setDialog(setPage,520,360);
		
		
		$.MainAction(setModule,setPage);
			
		
	   });