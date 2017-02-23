<?php
@session_start();
include('../../includes/config.inc.php');
//show_post();
$action = $_POST['doAction'];
$report_id = $_POST['id'];
$report_name = $_POST['report_name'];
$report_desc = $_POST['report_desc'];
$report_owner = $_POST['report_owner'];
$report_source = $_POST['report_source'];
$report_type = $_POST['report_type'];
$report_keyword = $_POST['report_keyword'];
$report_url = $_POST['report_url'];
$actived = $_POST['actived'] =="" ? "N" : $_POST['actived'] ;
$sub_module_id = $_POST['sub_module_id'];


$db->debug =0;

if($action == "new"){     
		$sql = "INSERT INTO tbl_sm_report 
								( report_name,
								report_desc,
								report_owner,
								report_source,
								report_keyword,
								report_url,	
								report_type,							
								sub_module_id,
								actived )
					VALUES ( '$report_name',
									'$report_desc',
									'$report_owner',
									'$report_source',
									'$report_keyword',
									'$report_url',
									'$report_type',
									'$sub_module_id',									
									'$actived'
								 );";
		
}else if($action == "edit"){ 
		$sql = "UPDATE tbl_sm_report 
								SET   
										report_name = '$report_name', 		
										report_desc = '$report_desc', 	
										report_owner = '$report_owner',
										report_source = '$report_source',
										report_keyword = '$report_keyword',
										report_url = '$report_url',			
										report_type = '$report_type' ,							
										sub_module_id = '$sub_module_id', 		
										actived = '$actived'
					WHERE report_id = $report_id";

}else if($_GET['doAction'] == "delete"){
		$sql = "DELETE FROM tbl_sm_report WHERE report_id = ".$_GET['id'];
}


if($_GET['doAction'] == "delete" || $action == "edit" ){
			$sqlUpdateReport = "DELETE
											FROM tbl_sm_mapping_report
											WHERE report_id  = $report_id";
			$db->Execute($sqlUpdateReport);
}

//echo $sql;
	$result = $db->Execute($sql);
	if($result){
			echo  "1";
	}else{
			echo "0";
}

?>