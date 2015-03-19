$(function(){
// JavaScript Document

// modules = module name
// pages = page name
// select_id = selection id
/*****************************************************************************************/
// Setting Dialogs
$.setDialog = function(pages,w,h){
				$("#dialog-form-"+pages).dialog({
					autoOpen: false,
					height: h,
					width: w,
					modal: true
		});	
}


/*****************************************************************************************/

 $.loading = function(action){
	 	if(action == "load"){
	 			$("body").addClass("loading"); 
		}else{
				$("body").removeClass("loading");	
		}
};

		
/*****************************************************************************************/
// Main Action 
 $.MainAction= function(modules  ,pages  ,select_id){
				
		 		$('input:radio').click(function(){
					$("#hidRadio").val($(this).val()) ;						
				});
				
				// Check data if no data disables edit,delete button
				var chkLen = $('#hidRadio').length;
				if(chkLen > 0){
					// Set Disable Button
					if($("#hidRadio").val() == ""){
							$( ".doAction button:eq( 1 ) , button:eq( 2 )" ).prop( "disabled", true );
					}
				}
				
				
				// เลือกเมนู
				$('#'+select_id).change(function(){
					window.location = '?setModule='+modules+'&setPage='+pages+'&'+select_id+'='+$(this).val();
				});
			
			//Button
			//	$('#btnReset ,#btnSave').button();
			
				$(".doAction button:first").button({
				icons: {
					primary: 'ui-icon-plusthick'
				}				
				}).click( function() {
					 $.loading("load");
					$('#dialog-form-'+pages).dialog('open');	
					$.get('./modules/'+modules+'/'+pages+'_form.php',		
							{ doAction : 'new' , modules : modules , pages : pages , select_id : $('#'+select_id).val()   },						
									function(data) {																						
										$("#dialog-form-"+pages).html(data);												
									}
							).always(function(data) {			
							 $.loading("unload");
						  });					
						return false;
				}).next().button({
				icons: {
					primary: 'ui-icon-disk'
				}				
				}).click( function() {
					  $.loading("load");
					$('#dialog-form-'+pages).dialog('open');
					var iNum = $('#hidRadio').val();		

						$.get('./modules/'+modules+'/'+pages+'_form.php',	
							{ doAction : 'edit' ,  modules : modules , pages : pages , id : iNum  },					
									function(data) {													
										$("#dialog-form-"+pages).html(data);							
									}
							).always(function(data) {			
							 $.loading("unload");
						  });			
						return false;
				}).next().button({
				icons: {
					primary: 'ui-icon-trash',					
				}
				}).click( function() {
					$.loading("load");
					$('#dialog').dialog('open');
					$('#dialog-confirm').dialog('open');
						$.loading("unload");
						return false;
				}).parent(); 
					//.buttonset();	

		
/*******************  Delete ********************/					

		$("#dialog-confirm").dialog({
			autoOpen: false,
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				'ยกเลิก': function() {
					$(this).dialog('close');
				},
				'ลบ': function() {
					$.loading("load");
					var iNum = $('#hidRadio').val();
					$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล  
               			 url:"./modules/"+modules+"/"+pages+"_code.php",  
						data: { doAction : 'delete' , id : iNum  },  
						async:false,  
						type : 'get',
						success:function(getData){  						
									if(getData == "1"){										
										$("#dialog-confirm").dialog('close');
										$.loading("unload");
										setTimeout("window.location.reload(true)",500);	
									}else{
										//alert('มีข้อผิดพลาด!!');
										$('#dialog-confirm').html('<font color=red>มีข้อผิดพลาด!!</font>');
									} // End if
							}  // End function : success
						});						
				}
			}
		});
		/******************* End Delete ********************/
	} // End function


/*****************************************************************************************/
//debug = true , default = null

 $.FormAction = function(actions ,modules  ,pages , id , debug ){
	
				$('#btnReset ,#btnSave').button();
				
				 var options = { 
						url : './modules/'+modules+'/'+pages+'_code.php',
						type : 'post',
						data : {doAction : actions , id : id },
						beforeSubmit: function(formData, jqForm, options){
						if (Spry) { // checks if Spry is used in your page
							var r = Spry.Widget.Form.validate(jqForm[0]); // validates the form
							if (!r){
								return r;
								}else{
								  //if(debug != true){
									$.loading("load");
								//	}
								
								}
						}
					},
						success: function(data){	
						if(debug != true){
							//alert(data);
							   
								$('#divMsg').html('บันทึกข้อมูลเรียบร้อย !!').fadeIn();
							
							}else{
								//$('#divMsgDiag').html(data).fadeIn();		
								console.log(data);			
							}
						},// post-submit callback 
						 complete: function(){
							  $.loading("unload");
							if(debug != true){												
								 $("#dialog-form-"+pages).dialog('close');			
								$('#divMsg').effect( 'fade', 1500 );								
								//.hide('highlight').fadeOut('slow');	highlight						
								 setTimeout("window.location.reload(true)",1000);	
							}
						 }
					}; 
				 
					// bind to the form's submit event 
					$('#form_'+pages).submit(function() { 					 
						$(this).ajaxSubmit(options); 
						return false; 
					}); 
						
}

/*****************************************************************************************/
});