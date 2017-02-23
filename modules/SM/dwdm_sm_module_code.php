<?php
@session_start();
include('../../includes/config.inc.php');
include('../../includes/Class/Main.Class.php');

$action = $_POST['doAction'];
$id = $_POST['id'];
$module_name = $_POST['module_name'];
$module_desc = $_POST['module_desc'];


$path = "../$module_name";

$db->debug = 0;


$main = new MainWeb();
$main->_db = $db;



if($action == "new"){     
		
		$sql = "INSERT INTO tbl_sm_module
								(
								module_name,
								module_desc
								 )
					VALUES (
								 '$module_name',
								 '$module_desc'
								 );";
								 
			
				
}else if($action == "edit"){ 
		
			 $sql = "UPDATE tbl_sm_module
								SET  										
										module_name = '$module_name',
										module_desc = '$module_desc'
					WHERE module_name = '$module_name' ";
					

}else if($_GET['doAction'] == "delete"){
	
	$sql = "DELETE FROM tbl_sm_module WHERE module_name = ".$_GET['id'];
	
}
	$result = $db->Execute($sql);
	if($result){
			echo  "1";
	}else{
			echo "0";
			
}

?>