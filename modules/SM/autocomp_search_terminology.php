<?php
include('../../includes/dbConnect.php');

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);

$sql = "SELECT
				  word
				FROM tbl_sm_terminology
					WHERE  (word LIKE '%".$term."%' )					
					LIMIT 0,20	 ";
$rs = $db->GetAll($sql);
for($i=0;$i<count($rs);$i++){	
		$json_data[]=array(  
									'id'=> $rs[$i]['word'],
									'value' => $rs[$i]['word']
									);
		
}
echo json_encode($json_data);

?>

