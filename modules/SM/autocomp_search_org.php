<?php
include('../../includes/dbConnect.php');

$term = trim(strip_tags($_GET['term'])); //retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);

$sql = "SELECT
                org_code,
                org_name,
                org_short,
                org_parent,
                org_level,
                actived,
                default_auth
              FROM tbl_sm_org
                      WHERE  (org_code LIKE '%" . $term . "%' OR org_name LIKE '%" . $term . "%' OR org_short LIKE '%" . $term . "%' )					
                      LIMIT 0,20	 ";
$rs = $db->GetAll($sql);
for ($i = 0; $i < count($rs); $i++) {
    $json_data[] = array(
        'id' => $rs[$i]['org_code'],
        'value' => $rs[$i]['org_code'] . " : " . $rs[$i]['org_name'] . " (" . $rs[$i]['org_short'] . ")",
        'short' => $rs[$i]['org_short'],
        'parent' => $rs[$i]['org_parent'],
        'level' => $rs[$i]['org_level'],
        'actived' => $rs[$i]['actived'],
        'default' => $rs[$i]['default_auth']
    );
}
echo json_encode($json_data);
?>

