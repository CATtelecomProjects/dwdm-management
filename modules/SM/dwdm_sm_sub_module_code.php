<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$sub_module_id = $_POST['id'];
$sub_module_name = $_POST['sub_module_name'];
$module_name = $_POST['module_name'];

$db->debug =0;

if($action == "new"){     
		$sql = "INSERT INTO tbl_sm_sub_module 
								(   sub_module_name , module_name )
					VALUES ( '$sub_module_name',
									'$module_name'
								 );";
		
}else if($action == "edit"){ 
		$sql = "UPDATE tbl_sm_sub_module 
								SET   
										sub_module_name = '$sub_module_name', 		
										module_name = '$module_name'
					WHERE sub_module_id = $sub_module_id";

}else if($_GET['doAction'] == "delete"){
		$sql = "DELETE FROM tbl_sm_sub_module WHERE sub_module_id = ".$_GET['id'];
}
	$result = $db->Execute($sql);
	if($result){
			echo  "1";
	}else{
			echo "0";
}

?>