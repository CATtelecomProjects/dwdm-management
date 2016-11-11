<?php
header("Content-type:text/html; charset=utf8");
include('../../includes/dbConnect.php');


$tmp = trim(strip_tags($_GET['term'])); //retrieve the search term that autocomplete sends
$term = iconv('TIS620', 'UTF8', $tmp);

echo $sql = "SELECT user_id , first_name FROM tbl_users  WHERE first_name LIKE '%" . $term . "%' ";
$rs = $db->GetAll($sql);
for ($i = 0; $i < count($rs); $i++) {
    $json_data[] = array(
        'id' => iconv('TIS620', 'UTF8', $rs[$i]['first_name']),
        'value' => $rs[$i]['user_id']
    );
}
echo json_encode($json_data);
?>
