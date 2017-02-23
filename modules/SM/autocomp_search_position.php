<?php
include('../../includes/dbConnect.php');

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);

$strWord = explode(" " , $term);

 $sql = "SELECT
				  distinct org_code , admin_code, keyword
				FROM view_mapping_position
					WHERE  ";
	
	$loop = 1 ;
	foreach($strWord  as $keyword){
			$isOR = $loop<count($strWord)  ? " AND " : " ";
			$sql .= " (keyword LIKE '%".$keyword."%') $isOR	";
			$loop++;
	}
					$sql .="LIMIT 0,20	 ";
					
					//echo $sql;
					
$rs = $db->GetAll($sql);
for($i=0;$i<count($rs);$i++){	
		$json_data[]=array(  
									'id'=> $rs[$i]['org_code'],									
									'value' => $rs[$i]['keyword'],
									'admin_code'=> $rs[$i]['admin_code']	
									);
		
}
echo json_encode($json_data);

?>

