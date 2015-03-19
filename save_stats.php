<?php
@session_start();
include('./includes/config.inc.php');

############################
# Set Debug Mode for Develope / In case on Site  set to false
$db->debug = true; # Change to false for Production
						
if($_GET['action'] == "save_stat"){

	
		// บันทึกการใ้ช้งานระบบจากการ cli
		  $sql_stat = "INSERT INTO  tbl_stats_events
											(session_id,menu_id) 
								VALUES(											
											 '".$_SESSION['sess_id']."' ,										 
											 ".$_GET['program_id']."
											)";
		$db->Execute($sql_stat);	
}
	
?>