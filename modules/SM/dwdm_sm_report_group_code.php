<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$rep_group_id = $_POST['id'];
$rep_group_name = $_POST['rep_group_name'];
$rep_group_type = $_POST['rep_group_type'];
$rep_group_orders = $_POST['rep_group_orders'];
$rep_group_used = $_POST['rep_group_used'] == "" ? "N" : $_POST['rep_group_used'];
$module_name = $_POST['module_name'];



$db->debug = 0;

if ($action == "new") {
    $sql = "INSERT INTO tbl_sm_report_group 
                                        ( rep_group_name ,
                                                rep_group_type ,
                                                rep_group_used ,
                                                rep_group_orders ,
                                                module_name )
                VALUES ( '$rep_group_name',
                                                '$rep_group_type',
                                                '$rep_group_used',
                                                $rep_group_orders,
                                                '$module_name'
                                         );";
} else if ($action == "edit") {
    $sql = "UPDATE tbl_sm_report_group 
                SET   
                                rep_group_name = '$rep_group_name', 		
                                rep_group_type = '$rep_group_type', 												
                                rep_group_used = '$rep_group_used', 		
                                rep_group_orders = $rep_group_orders, 		
                                module_name = '$module_name'
                WHERE rep_group_id = $rep_group_id";
} else if ($_GET['doAction'] == "delete") {
    $sql = "DELETE FROM tbl_sm_report_group WHERE rep_group_id = " . $_GET['id'];
}

$result = $db->Execute($sql);
if ($result) {
    echo "1";
} else {
    echo "0";
}
?>