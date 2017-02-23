<?php
header("Content-type:text/html; charset=utf8"); 
include('../../includes/dbConnect.php');
print_r($_GET);
$q =$_GET['q'];

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

<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr class="ui-state-focus">
    <th width="49%" height="22" scope="col">ความหมายคำศัพท์</th>
    <th width="51%" scope="col">รายงานที่เกี่ยวข้อง</th>
  </tr>
 

 <?php
 
  $sql = "SELECT
					  *
					FROM tbl_sm_terminology
					WHERE word LIKE  '%$q%'
					";
$rs = $db->GetAll($sql);
	if(count($rs)>0){

	for($i=0;$i<count($rs);$i++){	
	
			$word = $rs[$i]['word'];
			$descriptions = $rs[$i]['descriptions'];
			
			/*$iconStatus = $actived == "Y" ? "<img src='./images/on.gif' align='absmiddle' class='tooltips' title='มีสิทธิ์ใช้งาน'>" : "<img src='./images/off.gif' align='absmiddle'  class='tooltips' title='ยังไม่มีสิทธิ์ใช้งาน'>";
			$img = "<img src='https://intranet.cattelecom.com/web_data/profile/$emp_code.jpg'>";													
			$status = " <img src='images/my-profile.png' class='tooltips' align='absmiddle' title=\"$img\">";*/
?>			
			<tr class="ui-widget-content hover">
			<td>&nbsp;<?=$word?></td>
			<td><?=$descriptions;?></td>			
			 </tr>		

<?php			
				}		

	?>
    
 <?php 
	} // End Report Loop
?>

</table>
