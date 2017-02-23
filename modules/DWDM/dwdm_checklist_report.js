$(document).ready(function() {
	
	 //$( "#tabs" ).tabs();
	
    $('.tableData').DataTable( {
        dom: 'Bfrt',
		bJQueryUI: true,
		bPaginate: 100, 
       	iDisplayLength : 100 ,
        order: [[0,'ASC' ]],
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
	
	
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
		
		var setTitle =  $("#setTitle").val();
	
	$.MainAction(setModule,setPage,'Years');
	
	
} );


