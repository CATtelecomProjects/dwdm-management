<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$group_id = $_POST['id'];
$group_name = $_POST['group_name'];
$group_desc = $_POST['group_desc'];
$user = $_SESSION['sess_name'];


if($action == "new"){     
		$sql = "INSERT INTO tbl_user_group
								( group_name , group_desc, update_by  )
					VALUES ( ".chkNull($group_name)." , ".chkNull($group_desc)." ,  '$user');";
		
}else if($action == "edit"){ 
		$sql = "UPDATE tbl_user_group
								SET   
										group_name =".chkNull($group_name).",
										group_desc =".chkNull($group_desc).",
										update_by = '$user'
					WHERE group_id = $group_id ";

}else if($_GET['doAction'] == "delete"){
	$sql = "DELETE FROM tbl_user_group WHERE group_id = ".$_GET['id'];
}
	$result = $db->Execute($sql);
	if($result){
			echo  "1";
	}else{
			echo "0";
}

?>