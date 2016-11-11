<?php
include('../../includes/dbConnect.php');

$term = trim(strip_tags($_GET['term'])); //retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);

$sql = "SELECT
            term_id,term_name
          FROM tbl_sm_terminology_cate
                  WHERE  (term_name LIKE '%" . $term . "%' )					
                  LIMIT 0,20	 ";
$rs = $db->GetAll($sql);
for ($i = 0; $i < sizeof($rs); $i++) {
    $json_data[] = array(
        'id' => $rs[$i]['term_id'],
        'value' => $rs[$i]['term_name']
    );
}
echo json_encode($json_data);
?>

