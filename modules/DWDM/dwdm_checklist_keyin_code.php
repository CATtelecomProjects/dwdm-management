<?php
@session_start();
include('../../includes/config.inc.php');

$id = $_POST['id'];
$check_id = $_POST['check_id'];
$check_date = $_POST['check_date'];
$check_by = $_SESSION['sess_user_id'];
$problems = $_POST['problems'];
$solutions = $_POST['solutions'];
//$datasets =  json_encode($_POST['arrData']);
$remarks = $_POST['remarks'];
$holiday = $_POST['holiday'];

if ($holiday == "Y") {
    $datasets = "";
    $holiday = $_POST['holiday'];
    $check_time = "08:30";
} else {
    $datasets = json_encode($_POST['arrData']);
    $holiday = "N";
    $check_time = $_POST['check_time'];
}

//show_post();


$db->debug = 1;
//exit;
// check data exists
$sql_check = "SELECT
                        id
                       FROM tbl_dwdm_checklist_detail
                       WHERE check_id = $check_id
                               AND check_date = STR_TO_DATE('$check_date', '%d-%m-%Y')";
$rs_check = $db->GetAll($sql_check);

// Existing data => Update
if (count($rs_check) > 0) {

    $sql = "UPDATE tbl_dwdm_checklist_detail
                SET 																
                check_by =  '$check_by',
                datasets =  '$datasets',
                problems =  '$problems',
                solutions = '$solutions',
                remarks =  '$remarks',
                holiday = '$holiday'	,
                update_time = NOW()													
            WHERE id = $id ";
} else { // No data => Insert
    $sql = "INSERT INTO tbl_dwdm_checklist_detail
                                        (
                                        check_id,
                                        check_date,
                                        check_time,
                                        check_by,
                                        datasets,
                                        problems,
                                        solutions,
                                        remarks	,
                                        holiday					
                                         )
                VALUES (
                                          $check_id,												 
                                          STR_TO_DATE('$check_date', '%d-%m-%Y'),
                                          STR_TO_DATE('$check_time', '%H:%i'),								  
                                          '$check_by',
                                          '$datasets',
                                          '$problems',
                                          '$solutions',
                                          '$remarks',
                                          '$holiday'							  
                                         );";
}


$result = $db->Execute($sql);
if ($result) {
    $sql = "UPDATE tbl_dwdm_checklist SET check_status = 'K' WHERE check_id = $check_id";
    $db->Execute($sql);
    echo "1";
} else {
    echo "0";
}
?>