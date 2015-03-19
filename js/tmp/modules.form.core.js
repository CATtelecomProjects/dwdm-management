// JavaScript Document
$(function(){

				ajaxLoading();			
			
			//Button
				$('#btnReset ,#btnSave').button();				
				
				//doAction
				var doAction = $("#doAction").val();				
				//Modules
				var modules = $("#modules").val();				
				//Page
				var pages = $("#setPages").val();				
				//Select id
				var key_id = $("#key_id").val();
				
				
				 var options = { 
						url : './modules/'+modules+'/'+pages+'_code.php',
						type : 'post',
						data : {doAction : doAction , select_id : key_id},
						beforeSubmit: function(formData, jqForm, options){
						if (Spry) { // checks if Spry is used in your page
							var r = Spry.Widget.Form.validate(jqForm[0]); // validates the form
							if (!r)
								return r;
						}
					},
						success: function(data){	
						//alert(data);					
							$('#divMsgDiag').html(data).fadeIn();
							//$('#divMsgDiag').html('บันทึกข้อมูลเรียบร้อย !!').fadeIn();
						},// post-submit callback 
						 complete: function(){
						//	$('#divMsgDiag').fadeOut(2000);							
						//	setTimeout("window.location.reload(true)",1000);	
						 }
					}; 
				 
					// bind to the form's submit event 
					$('#form_'+pages).submit(function() { 
						$(this).ajaxSubmit(options); 
						return false; 
					}); 
});