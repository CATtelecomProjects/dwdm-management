// JavaScript Document
$(function(){


			ajaxLoading();			

			//Button
				$(".doAction button:first").button({
				icons: {
					primary: 'ui-icon-disk'
				}			
				}).click( function() {
					$('#doAction').val('Save');			
					
					
					var options = { 					 
						url : './modules/Knowledges/knowledge_auth_code.php',
						type : 'post',						
						success: function(data){
							$('#divMsg').html(' บันทึกข้อมูลเรียบร้อย !!').fadeIn();							
							//$('#divMsg').html(data).fadeIn();
						},// post-submit callback 
						 complete: function(){
							 $.loading("unload");
							 $('#divMsg').fadeOut(2000);
							setTimeout("window.location.reload(true)",2000);						
						 }
					}; 
				 
					// bind to the form's submit event 
					$('#form_knowledge_auth').submit(function() { 
						
						$.loading("load");
					
						$(this).ajaxSubmit(options); 
						return false; 
					}); 
					
				})
					//.buttonset();	
				
				
				// เลือกเมนู
				$('#group_id').change(function(){
					window.location = '?setModule=Knowledges&setPage=knowledge_auth&group_id='+$(this).val();
				});
				
  });

