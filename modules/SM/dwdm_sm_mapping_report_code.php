<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$rep_group_id = $_POST['rep_group_id'];
$chk_data = $_POST['chk_data'];

//$actived = $_POST['actived'] =="" ? "N" : $_POST['actived'] ;

//show_post();

$db->debug =0;

if($action == "MAPPING"){     
		
		// Delete data from tbl_sm_mapping_report
		$sql_reset_mapping = "DELETE FROM tbl_sm_mapping_report WHERE rep_group_id = $rep_group_id";
		$result_reset = $db->Execute($sql_reset_mapping);
		
		if(count($chk_data)>0){
		
		
				for($i=0;$i<count($chk_data);$i++){
					$sql_mapping = "INSERT INTO tbl_sm_mapping_report 
											( rep_group_id,
											report_id )
								VALUES ( '$rep_group_id',
												'".$chk_data[$i]."'
											 );";
							$result = $db->Execute($sql_mapping);
				} // End for			

			
		} // count($chk_data)>0
		
		echo  "1";
		
		
} // if mapping

?>