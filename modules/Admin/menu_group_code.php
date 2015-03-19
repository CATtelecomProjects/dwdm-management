<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$mgroup_id = $_POST['id'];
$menu_group_th = $_POST['menu_group_th'];
$menu_group_en = $_POST['menu_group_en'];
$modules_id = $_POST['modules_id'];
$menu_order = $_POST['menu_order'];
$icon_id = $_POST['icon_id'];
$user = $_SESSION['sess_name'];

$db->debug =0;

if($action == "new"){     
		$sql = "INSERT INTO tbl_menu_group 
								(  menu_group_th, menu_group_en, modules_id,menu_order, icon_id ,update_by )
					VALUES ( '$menu_group_th',
								 ".chkNull($menu_group_en).", 
								$modules_id,
								 ".chkNull($menu_order).", 
								 ".chkNull($icon_id).",
								 '$user'
								 );";
		
}else if($action == "edit"){ 
		$sql = "UPDATE tbl_menu_group 
								SET   
										menu_group_th = '$menu_group_th', 
										menu_group_en=".chkNull($menu_group_en).",  
										modules_id= $modules_id,  
										menu_order =".chkNull($menu_order).",  
										icon_id = ".chkNull($icon_id)." ,
										update_by  = '$user' 										
					WHERE mgroup_id = $mgroup_id ";

}else if($_GET['doAction'] == "delete"){
		$sql = "DELETE FROM tbl_menu_group WHERE mgroup_id = ".$_GET['id'];
}
	$result = $db->Execute($sql);
	if($result){
			echo  "1";
	}else{
			echo "0";
}

?>