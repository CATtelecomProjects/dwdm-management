// JavaScript Document
$(function(){
	
			ajaxLoading();
	
/******************* End Delete ********************/
		
		// เลือกเมนู
				$('#sel_cate_id').change(function(){
					window.location = '?setModule=Knowledges&setPage=knowledge_view&cate_id='+$(this).val();
				});
		
		
		
		$(".link").click(function(){
					$('#dialog-knowledge_view').dialog('open');			
					$.get('./modules/Knowledges/knowledge_view_detail.php',		
							{ doAction : 'view', id : $(this).attr("ref")},						
									function(data) {													
										$("#dialog-knowledge_view").html(data);				
										//$("input:radio[name=auth_id][disabled=false]:first").attr('checked', true);
									}
							)				
						return false;
				});
		
		
		$("#dialog-knowledge_view").dialog({
					autoOpen: false,
					height: 680,
					width: 820,
					modal: true/*,
					close: function( event, ui ) {
						setTimeout("window.location.reload(true)",1000);	 
				
				} */
		});
		
		
		
	   });

