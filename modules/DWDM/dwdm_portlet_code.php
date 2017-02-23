<?php
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$id = $_POST['id'];
$portlet = $_POST['portlet'];
$desc = $_POST['desc'];


$update_by = $_POST['update_by'];

$db->debug = 0;


if($action == "new"){     
	
		
		$sql = "INSERT INTO tbl_dwdm_portlet
								(
								portlet,								
								description	,
								update_by							
								 )
					VALUES (
								 '$portlet',								 
								  '".nl2br ($desc)."'	,
								  	'$update_by'							 
								 );";
		
}else if($action == "edit"){ 
		
			 $sql = "UPDATE tbl_dwdm_portlet
								SET  																				
										portlet = '$portlet' , 										
										description ='".nl2br ($desc)."'	,
										update_by = '$update_by'									
					WHERE id = $id ";
		

}else if($_GET['doAction'] == "delete"){
	$sql = "DELETE FROM tbl_dwdm_portlet WHERE id = ".$_GET['id'];

}
	$result = $db->Execute($sql);
	if($result){
			echo  "1";
	}else{
			echo "0";
			
}

?>