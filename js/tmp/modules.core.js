// JavaScript Document
$(function(){
			
				//Modules
				var modules = $("#modules").val();
				
				//Page
				var pages = $("#setPage").val();
				
				//Select id
				var select_id = $("#select_id").val();
				
				//var dialog_height = 420;
				
				//var dialog_width = 520;
	
				// กำหนดค่าตอนเลือก Radio เพื่อส่งค่าไปแก้ไข / ลบ
		 		$('input:radio').click(function(){
					$("#hidRadio").val($(this).val()) ;						
				});
				

				// เลือกเมนู
				$('#'+select_id).change(function(){
					window.location = '?setModule='+modules+'&setPage='+pages+'&'+select_id+'='+$(this).val();
				});
			
			//Button
				$('#btnReset ,#btnSave').button();
			
				$(".doAction button:first").button({
				icons: {
					primary: 'ui-icon-plusthick'
				}				
				}).click( function() {
					$('#dialog-form-'+pages).dialog('open');	
					$.get('./modules/'+modules+'/'+pages+'_form.php',		
							{ doAction : 'new' , modules : modules , pages : pages , select_id : $('#'+select_id).val()   },						
									function(data) {													
										$("#dialog-form-"+pages).html(data);					
									}
							)					
						return false;
				}).next().button({
				icons: {
					primary: 'ui-icon-disk'
				}				
				}).click( function() {
					$('#dialog-form-'+pages).dialog('open');
					var iNum = $('#hidRadio').val();		
						$.get('./modules/'+modules+'/'+pages+'_form.php',	
							{ doAction : 'edit' ,  modules : modules , pages : pages , select_id : iNum  },					
									function(data) {													
										$("#dialog-form-"+pages).html(data);							
									}
							)		
						return false;
				}).next().button({
				icons: {
					primary: 'ui-icon-trash',					
				}
				}).click( function() {
					$('#dialog').dialog('open');
					$('#dialog-confirm').dialog('open');
						return false;
				}).parent()
					//.buttonset();	
					
					// Dialog		

		
		

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
					var iNum = $('#hidRadio').val();
					$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล  
               			 url:"./modules/"+modules+"/"+pages+"_code.php",  
						data: { action: 'delete' , select_id : iNum  },  
						async:false,  
						type : 'get',
						success:function(getData){  						
									if(getData == "1"){
										$("#dialog-confirm").dialog('close');
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
		
});
		
/******************* End Delete ********************/
function setDialog(pages,w,h){
				$("#dialog-form-"+pages).dialog({
					autoOpen: false,
					height: h,
					width: w,
					modal: true
		});	
}
		


