<?php
include('../../includes/dbConnect.php');

$term = trim(strip_tags($_GET['term'])); //retrieve the search term that autocomplete sends
//$term = iconv('TIS620', 'UTF8', $tmp);

$sql = "SELECT *
            FROM view_sm_emp
            WHERE emp_actived = 'Y' AND   (emp_name LIKE '%" . $term . "%' OR emp_code LIKE '%" . $term . "%'  OR org_name LIKE '%" . $term . "%' OR org_short LIKE '%" . $term . "%')					
                            ORDER BY  emp_code  ";
$rs = $db->GetAll($sql);
for ($i = 0; $i < count($rs); $i++) {

    $actived = $rs[$i]['actived'] == "Y" ? "<img src='./images/on.gif' align='absmiddle'>" : "<img src='./images/off.gif' align='absmiddle'>";

    $json_data[] = array(
        'id' => $rs[$i]['emp_code'],
        'key' => $rs[$i]['emp_code'] . " : " . $rs[$i]['emp_name'] . " (" . $rs[$i]['org_short'] . ")",
        'value' => $actived . " " . $rs[$i]['emp_code'] . " : " . $rs[$i]['emp_name'] . " - " . $rs[$i]['emp_pos_short'] . " (" . $rs[$i]['org_short'] . ")",
        'type' => $rs[$i]['rep_group_type'],
        'pos' => $rs[$i]['emp_pos_desc'] . " (" . $rs[$i]['emp_pos_short'] . ")",
        'email' => $rs[$i]['emp_email'],
        'org' => $rs[$i]['org_name'] . " (" . $rs[$i]['org_short'] . ")",
        'actived' => $rs[$i]['count_rep_group']
    );
}
echo json_encode($json_data);
?>

