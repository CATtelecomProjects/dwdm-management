$(function(){
// JavaScript Document

// modules = module name
// pages = page name
// select_id = selection id
/*****************************************************************************************/
// Setting Dialogs
$.setDialog = function(pages,w,h , title){
				$("#dialog-form-"+pages).dialog({
					autoOpen: false,
					height: h,
					width: w,
					modal: true,
					close: function(event, ui) 
			        { 
            			$(this).dialog('close');						
        			} ,
				}).parent().find('.ui-dialog-title').html(title);	
				
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
				
		 		
				
				$("input:radio").click(function() {
   							$("#hidRadio").val($(this).val()) ;		
					});
				
				// Check data if no data disables edit,delete button
				var chkLen = $('#hidRadio').length;
	
				if(chkLen > 0){
					// Set Disable Button
					if($("#hidRadio").val() == ""){
							//$( ".doAction button:eq( 1 ) , button:eq( 2 )" ).prop( "disabled", true );
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
					$.get('./modules/'+modules+'/'+pages+'_form.php?'+$.now(),		
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
					if($("#hidRadio").val() == "" ) { alert("Select Radio for Continue");return false;};
					  $.loading("load");
					$('#dialog-form-'+pages).dialog('open');
					var iNum = $('#hidRadio').val();		
						
						$.get('./modules/'+modules+'/'+pages+'_form.php?'+$.now(),	
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
					primary: 'ui-icon-trash'					
				}
				}).click( function() {
					if($("#hidRadio").val() == "" ) { alert("Select Radio for Continue");return false;};
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
               			 url:"./modules/"+modules+"/"+pages+"_code.php?"+$.now(),  
						data: { doAction : 'delete' , id : iNum  },  
						async:false,  
						type : 'get',
						success:function(getData){  						
									if($.trim(getData) == "1"){										
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
						url : './modules/'+modules+'/'+pages+'_code.php?'+$.now(),
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


$.DataTableServSide = function(table_id ,modules  ,pages , key1 , var1 ){
		
	 var table =  $('#'+table_id).DataTable( 
   {
        "processing": true,
        "serverSide": true,
		'bJQueryUI': true,
		'bStateSave': true,
		 'iDisplayLength' : 25,
		'sPaginationType': 'full_numbers',
		
		 'language': {
		 'lengthMenu': 'แสดง _MENU_ เรคคอร์ดต่อหน้า', 
		 'zeroRecords': 'ไม่พบข้อมูลที่ค้นหา', 
		'info': 'แสดงหน้าที่ _PAGE_ ถึง _PAGES_ ทั้งหมด _TOTAL_ เรคคอร์ด ',
		'sSearch': '<b>ค้นหา</b> :', 
		 'infoEmpty': 'ไม่พบข้อมูล',
		 'sProcessing': '<img src=\"./images/loading-gear.gif\">',
		 'infoFiltered': '(จากทั้งหมด _MAX_ เรคคอร์ด )',	
		'oPaginate':{sFirst:'&laquo;',sLast:'&raquo;',sNext:'&#8250;',sPrevious:'&#8249;'}
		} ,		 
		
        "ajax": "./modules/"+modules+"/"+pages+"_ajax.php?"+$.now()+"&"+key1+"="+var1,
		'columnDefs': [{
         'targets': 0,
         'className': 'dt-body-center',		
         'render': function (data, type, full, meta){
             return '<input type="radio" name="id[]"  id="rowID_'+ $('<div/>').text(data).html() +'" value="'+ $('<div/>').text(data).html() +'">';
         }
      }]
    } );
	
	
	
    $('#'+table_id+' tbody').on('click', 'tr', function () {
			var data = table.row( this ).data();
			$('#rowID_'+data[0]).prop( "checked", true );
			$("#hidRadio").val(data[0]);
			//console.log( data[0]);
    } );			
	
}


/*****************************************************************************************/


$.DataTableMerg = function(table_id , target, Length , scrollY ,colspan ){
		
	 var table = $("#"+table_id).DataTable({
        "columnDefs": [
            { "visible": false, "targets": target }
        ],
        "order": [[ target, 'asc' ]],
		 "scrollY":        scrollY+"vh",
        "scrollCollapse": true,
        "displayLength": Length,		
		 'language': {
		 'lengthMenu': 'แสดง _MENU_ เรคคอร์ดต่อหน้า', 
		 'zeroRecords': 'ไม่พบข้อมูลที่ค้นหา', 
		'info': 'แสดงหน้าที่ _PAGE_ ถึง _PAGES_ ทั้งหมด _TOTAL_ เรคคอร์ด ',
		'sSearch': '<b>ค้นหา</b> :', 
		 'infoEmpty': 'ไม่พบข้อมูล',
		 'sProcessing': '<img src=\"./images/loading-gear.gif\">',
		 'infoFiltered': '(จากทั้งหมด _MAX_ เรคคอร์ด )',	
		'oPaginate':{sFirst:'&laquo;',sLast:'&raquo;',sNext:'&#8250;',sPrevious:'&#8249;'}
		} ,	
		
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(target, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="'+colspan+'"><strong>'+group+'</strong></td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#'+table_id+' tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === target && currentOrder[1] === 'asc' ) {
            table.order( [ target, 'desc' ] ).draw();
        }
        else {
            table.order( [ target, 'asc' ] ).draw();
        }
    } );
}
	
	
});