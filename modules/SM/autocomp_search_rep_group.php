<?php
@session_start();
include('../../includes/dbConnect.php');

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);

$sess_user_id = $_SESSION['sess_user_id'];

	$sql = "SELECT
	  rep_group_id,
	  rep_group_name,
	  rep_group_type
	FROM tbl_sm_report_group
	 WHERE rep_group_name LIKE '%".$term."%'
	 AND rep_group_used = 'Y' 
	 AND module_name IN(SELECT
							 module_name
						   FROM tbl_module_auth
						   WHERE user_id = $sess_user_id)
	 ORDER BY rep_group_orders 
	 LIMIT 0,50 ";
$rs = $db->GetAll($sql);
for($i=0;$i<count($rs);$i++){	
		$json_data[]=array(  
									'id'=> $rs[$i]['rep_group_id'],
									'value' => $rs[$i]['rep_group_name'],
									'type' => $rs[$i]['rep_group_type']
									);
		
}
echo json_encode($json_data);

?>

