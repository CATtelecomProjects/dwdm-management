<?php
@session_start();
include('../../includes/config.inc.php');

//menu_id , menu_name_th, menu_name_th,menu_file,mgroup_id,icon_id
$action = $_POST['doAction'];
$menu_id = $_POST['id'];
$menu_name_th = $_POST['menu_name_th'];
$menu_name_en = $_POST['menu_name_en'];
$menu_file = $_POST['menu_file'];
$mgroup_id = $_POST['mgroup_id'];
$menu_order = $_POST['menu_order'];
$menu_param = $_POST['menu_param'];
$icon_id = $_POST['icon_id'];
$user = $_SESSION['sess_name'];


$db->debug =0;

function CopyTemplate(){
global $menu_file;
echo	$source = "../Template";
echo 	$target = "../Statistics/$menu_file";
	@copy(	$source."/template.js", $target.".js");
}

if($action == "new"){     
		$sql = "INSERT INTO tbl_menu 
								(  menu_name_th, menu_name_en,menu_file,menu_param,mgroup_id,menu_order,icon_id , update_by )
					VALUES ( '$menu_name_th',
								 ".chkNull($menu_name_en).", 
								 ".chkNull($menu_file).",
								 ".chkNull($menu_param).",
								 ".chkNull($mgroup_id).", 
								 ".chkNull($menu_order).", 
								 ".chkNull($icon_id)." ,
								 '$user'
								 );";
								 
						//	CopyTemplate();	 
		
}else if($action == "edit"){ 
		 $sql = "UPDATE tbl_menu 
								SET   
										menu_name_th = '$menu_name_th', 
										menu_name_en=".chkNull($menu_name_en).",  
										menu_file=".chkNull($menu_file).",  
										menu_param =".chkNull($menu_param).", 
										mgroup_id = ".chkNull($mgroup_id).",  
										menu_order = ".chkNull($menu_order).",
										icon_id = ".chkNull($icon_id)." ,
										update_by = '$user'
					WHERE menu_id = $menu_id ";

}else if($_GET['doAction'] == "delete"){
	$sql = "DELETE FROM tbl_menu WHERE menu_id = ".$_GET['id'];
}
	$result = $db->Execute($sql);
	if($result){
			echo  "1";
	}else{
			echo "0";
}

?>