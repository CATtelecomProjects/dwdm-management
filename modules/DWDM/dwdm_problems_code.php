<?php
@session_start();
//header('Content-Type: text/html; charset=utf-8');
include('../../includes/config.inc.php');

//show_post();

$db->debug=0;

$action = $_POST['doAction'];
$id = $_POST['id'];
$problem_status = $_POST['status'];
$cate_id = $_POST['cate_id'];
$problem_date_start = $_POST['problem_date_start'];
$problem_topic = $_POST['problem_topic'];
$problem_owner = $_POST['problem_owner'];

// Stauts 
// P = Pending
// S = Success


if($problem_status == "P"){
	$problem_date_finish = $_POST['problem_date_finish_dis'];
	$problem_solution = $_POST['problem_solution_dis'];
	$problem_by = $_POST['problem_by_dis'];
}else{
	$problem_date_finish = $_POST['problem_date_finish'];
	$problem_solution = $_POST['problem_solution'];
	$problem_by = $_POST['problem_by'];
	
}
$user = $_SESSION['sess_name'];

if($action == "new"){      // New Record action
		
		$sql = "INSERT INTO tbl_dwdm_problems
								(	
									cate_id ,
									problem_status,
									problem_date_start,
									problem_topic,
									problem_owner,
									problem_by,
									problem_solution,
									problem_date_finish,
									update_by  )
					VALUES (
									$cate_id ,
									'$problem_status',
									STR_TO_DATE('$problem_date_start', '%d-%m-%Y %H:%i'),
									'$problem_topic',
									'$problem_owner',
									'$problem_by',
									'$problem_solution',
									STR_TO_DATE('$problem_date_finish', '%d-%m-%Y %H:%i'),
									'$user'
					);";
	
	
		
}else if($action == "edit"){   /// Update Record action

	 	 $sql = "UPDATE tbl_dwdm_problems 
								SET   
										 cate_id = $cate_id ,
										 problem_status ='$problem_status', 
										 problem_date_start = STR_TO_DATE('$problem_date_start', '%d-%m-%Y %H:%i'),
										 problem_topic ='$problem_topic', 
										 problem_owner ='$problem_owner', 
										 problem_by ='$problem_by', 
										 problem_solution ='$problem_solution', 
										 problem_date_finish = STR_TO_DATE('$problem_date_finish', '%d-%m-%Y %H:%i'),										
										update_by = '$user'
					WHERE id = $id ";
		

}else if($_GET['doAction'] == "delete"){ // Delete Record action

	
	$sql = "DELETE FROM tbl_dwdm_problems WHERE id = ".$_GET['id'];	
		
}


	$result = $db->Execute($sql);
	
	if($result){
			echo  "1";
	}else{
			echo "0";
	}

?>