<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$org_code = $_POST['org_code'];
$admin_code = $_POST['admin_code'];

$chk_data = $_POST['chk_data'];

//print_r($_POST);

$db->debug =0;
//exit;
if($action == "MAPPING"){     
				
  	    $sql_reset_mapping = "DELETE FROM tbl_sm_mapping_position WHERE org_code = '$org_code' AND admin_code = '$admin_code' ";
		$result_reset = $db->Execute($sql_reset_mapping);
		
		if(count($chk_data)>0){
		
				for($i=0;$i<count($chk_data);$i++){
					$sql_mapping = "INSERT INTO tbl_sm_mapping_position 
											(org_code ,
											admin_code,
											rep_group_id )
								VALUES ( '$org_code',
												'$admin_code',
												'".$chk_data[$i]."'
											 );";
					 $result = $db->Execute($sql_mapping);
				} // End for
		
		}// count($chk_data)>0
		
		//Update mapping user by position automation
		$sql_get_emp = "SELECT emp_code FROM tbl_sm_emp WHERE org_code = '$org_code' AND emp_admin_code = '$admin_code' ";
		$rs_get_emp = $db->GetAll($sql_get_emp);
		
		if(count($rs_get_emp)>0){ // if have member
				for($i=0;$i<count($rs_get_emp);$i++){
					
					$emp_code = $rs_get_emp[$i]['emp_code'];
					
					$sql_update_mapping_user = "INSERT INTO tbl_sm_mapping_user
																			(emp_code,
																			 rep_group_id)
																SELECT
																  '$emp_code',
																  rep_group_id
																FROM tbl_sm_mapping_position
																WHERE org_code = '$org_code'
																	AND admin_code = '$admin_code'
																	AND rep_group_id NOT IN(SELECT
																							  rep_group_id
																							FROM tbl_sm_mapping_user
																							WHERE emp_code = '$emp_code')";	
				$rs_update_mapping_user = $db->Execute($sql_update_mapping_user);																						
				} // End ofr
		} // End if
			
		
		if($result_reset){
							echo  "1";													
					}else{
							echo "0";
		}
		
		
} // if mapping

?>