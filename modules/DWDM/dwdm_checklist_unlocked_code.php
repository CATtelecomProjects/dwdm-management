<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$id = $_POST['id'];
$unlock_desc = $_POST['unlock_desc'];
$update_by = $_SESSION['sess_name'];
$status = $_POST['status'];

$db->debug = 0;
//show_post();


if ($_POST['doAction'] == "set_status") {
    $sql = "UPDATE tbl_dwdm_checklist SET check_status = '$status' , unlock_desc = '$unlock_desc' WHERE check_id = $id ";
}

$result = $db->Execute($sql);
if ($result) {
    echo "1";
} else {
    echo "0";
}
?>