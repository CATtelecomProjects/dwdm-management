<?php
@session_start();
include('../../includes/config.inc.php');

$user = $_SESSION['sess_name'];

$db->debug=0;

if($_POST['doAction']){
	$group_id = $_POST['group_id'];
	
	// ลบข้อมมูลทั้งหมดก่อนทำการ Insert
	 $sql_del_knowledge_auth = "DELETE FROM tbl_knowledge_auth WHERE group_id = $group_id";
		$db->Execute($sql_del_knowledge_auth);
		
	//เพิ่มข้อมูล
	for($i=0;$i<count($_POST['chk_knowledge']);$i++){
		$knowledge_cate_id = $_POST['chk_knowledge'][$i];
	 	 $sql_add_knowledge_auth = "INSERT INTO tbl_knowledge_auth ( group_id ,knowledge_cate_id, update_by) VALUES( $group_id ,$knowledge_cate_id , '$user');";
		$result = $db->Execute($sql_add_knowledge_auth);
	} // End for
} // End if

if($result){
			echo  "1";
	}else{
			echo "0";
}

?>
