<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$id = $_POST['id'];
$user_assign = $_POST['user_assign'];
$date_start = $_POST['date_start'];
$date_finish = $_POST['date_finish'];
$remarks = $_POST['remarks'];
$update_by = $_SESSION['sess_name'];

$db->debug = 0;


if($action == "new"){     
		
		$sql = "INSERT INTO tbl_dwdm_checklist
								(
								user_assign,
								date_start,
								date_finish,
								remarks	,
								update_by							
								 )
					VALUES (
								  $user_assign,												 
								 STR_TO_DATE('$date_start', '%d-%m-%Y'),
								  STR_TO_DATE('$date_finish', '%d-%m-%Y'),
								  '$remarks',
								  '$update_by'
								 );";
		
}else if($action == "edit"){ 
		
			 $sql = "UPDATE tbl_dwdm_checklist
								SET  																				
									user_assign =   $user_assign,		
									date_start =  STR_TO_DATE('$date_start', '%d-%m-%Y'),
									date_finish =   STR_TO_DATE('$date_finish', '%d-%m-%Y'),
									remarks	 =  '$remarks',
									update_by	= 	 '$update_by'								
					WHERE check_id = $id ";
		

}else if($_GET['doAction'] == "delete"){
	 $sql = "DELETE FROM tbl_dwdm_checklist WHERE check_id = ".$_GET['id'];

}else if($_GET['doAction'] == "set_status"){
	$sql = "UPDATE tbl_dwdm_checklist SET check_status = '".$_GET['status']."' WHERE check_id = ".$_GET['id'];

}
	$result = $db->Execute($sql);
	if($result){
			echo  "1";
	}else{
			echo "0";
			
}

?>