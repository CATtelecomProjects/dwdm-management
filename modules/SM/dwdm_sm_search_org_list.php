<?php
header("Content-type:text/html; charset=utf8"); 
include('../../includes/dbConnect.php');
//print_r($_GET);
$org_code =$_GET['org_code'];

?>
<style>
	/*#tbl_mapping tr.hover:hover {
		background-color:#FFFFD9;	
		
	}
	
	 .mouse-over {
   
    background-color: #D9FFD9;
  }
  .mouse-out {   
    background-color: '';
  }*/
	
	
	.list_data {
		padding:3px;	
		cursor:pointer;
	}
</style>
  <script>     
 $(function() {
	 	// modules = module name
		// pages = page name
		// select_id = selection id
		var setModule = $("#setModule").val();
		
		var setPage =  $("#setPage").val();
	 
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    $( "#accordion" ).accordion({ heightStyle:'content',   icons: icons    });   

	$('.btn_report').button({
					  icons: {
					   primary: 'ui-icon-zoomin'
					  }
					 }).click(function( event ) {						
						
						 var id = $(this).attr('id');			
						 var name = 	$(this).attr('rel');		 
						 
						 $.setDialog("dwdm_sm_search",780,640);
							$("#dialog-form-dwdm_sm_search").dialog('open');							
							
							$.get('./modules/'+setModule+'/dwdm_sm_mapping_user_listing.php?'+$.now()+'&emp_code='+id+'&setModule='+setModule+'&setPage='+setPage+'&action=View', function(data){																					
												$("#dialog-form-dwdm_sm_search").html(data);												
											}
									).always(function(data) {			
									 $.loading("unload");
								  });					
								return false;
					
						$("#dialog-form-dwdm_sm_search").html(name);	
		});
	 
	 $('.hover').hover(function() {
			 $(this).toggleClass( "ui-state-highlight", 0 , "" );
	 });
	 
	  $('.hover').click(function() {
			 $(this).toggleClass( "ui-state-highlight", 0 ,"" );
	 });
	 
	 
	 $(".tooltips").tipsy({html: true  , trigger: "hover",gravity: "w" });	
			
	$('.tooltips').css("cursor","pointer");
	 
	 
  });
  </script>

<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr class="ui-state-focus">
    <th height="22" scope="col">รหัสพนักงาน</th>
    <th scope="col">ชื่อ-สกุล</th>
    <th scope="col">ตำแหน่ง</th>
    <th scope="col">อีเมล</th> 
    <th scope="col">รายละเอียด</th> 
  </tr>
 

 <?php
 
 $sql_emp = "SELECT
					  e.emp_code,
					  e.emp_name,
					  e.emp_pos_desc,
					  e.emp_email,
					  o.org_name,
					  e.actived
					FROM tbl_sm_emp e
					  JOIN tbl_sm_org o
						ON e.org_code = o.org_code
					WHERE o.org_code = '$org_code'
					ORDER BY o.org_code,e.emp_admin_code DESC";
$rs_emp = $db->GetAll($sql_emp);
	if(count($rs_emp)>0){

	for($i=0;$i<count($rs_emp);$i++){	
	
			$emp_code = $rs_emp[$i]['emp_code'];
			$emp_name = $rs_emp[$i]['emp_name'];
			$emp_pos_desc = $rs_emp[$i]['emp_pos_desc'];
			$emp_email = $rs_emp[$i]['emp_email'];
			$org_name = $rs_emp[$i]['org_name'];
			$actived = $rs_emp[$i]['actived'];

			$iconStatus = $actived == "Y" ? "<img src='./images/on.gif' align='absmiddle' class='tooltips' title='มีสิทธิ์ใช้งาน'>" : "<img src='./images/off.gif' align='absmiddle'  class='tooltips' title='ยังไม่มีสิทธิ์ใช้งาน'>";
			$img = "<img src='https://intranet.cattelecom.com/web_data/profile/$emp_code.jpg'>";													
			$status = " <img src='images/my-profile.png' class='tooltips' align='absmiddle' title=\"$img\">";
			
			echo "<tr class=\"ui-widget-content\">\n";
			echo "<td align=\"center\">$status $emp_code</td>\n";
			echo "<td>$iconStatus $emp_name</td>\n";
			echo "<td>$emp_pos_desc</td>\n";
			echo "<td>$emp_email</td>\n";
			echo "<td align=\"center\"><a href=\"javascript:void(0)\" id=\"$emp_code\" rel=\"$emp_name\" class=\"btn_report\">Detail</a></td>\n";
			echo " </tr>\n";		
			
				}		

	?>
    
 <?php 
	} // End Report Loop
?>

</table>
