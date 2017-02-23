 $(function() {

    $( "#tabs" ).tabs();

	var setModule = $("#setModule").val();
	var setPage = $("#setPage").val();
	
	var w = $( window ).height() -180;
	
	$("#tabs").css("height" , w);
	
	// Load data into Tab1
	$.loading("load");	
	$.get("./modules/"+setModule+"/"+setPage+"_info.php" ,{ setModule : setModule , setPage :setPage } , function(data) {		
			$("#tabs-1").html(data);			
			$.loading("unload"); 		
		  });
	
		
	//ค้นหารายละเอียดผู้ใช้งาน
	$("#tab-1").click(function(){			
		 $.loading("load");	 	
		$.get("./modules/"+setModule+"/"+setPage+"_info.php?"+$.now() ,{ setModule : setModule , setPage :setPage} , function(data) {		
			$("#tabs-1").html(data);			
			$.loading("unload");
		});	
	});
	
	//ค้นหาตามกลุ่มรายงาน
	$("#tab-2").click(function(){		
	$.loading("load");	 	
		$.get("./modules/"+setModule+"/"+setPage+"_report_group.php?"+$.now() ,{ setModule : setModule , setPage :setPage} , function(data) {			
			$("#tabs-2").html(data);			
			$.loading("unload");
		});	
	});
	
	//ค้นหาตามหน่วยงาน
	$("#tab-3").click(function(){		
	$.loading("load");	 	
		$.get("./modules/"+setModule+"/"+setPage+"_org.php?"+$.now() ,{ setModule : setModule , setPage :setPage} , function(data) {
			$("#tabs-3").html(data);
			$.loading("unload");
		});	
	});
	
	//ค้นหาตามตำแหน่งงาน
	$("#tab-4").click(function(){			
	$.loading("load");	 	
		$.get("./modules/"+setModule+"/"+setPage+"_position.php?"+$.now() ,{ setModule : setModule , setPage :setPage} , function(data) {
			$("#tabs-4").html(data);
			$.loading("unload");
		});	
	});

  });
