<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$source_id = $_POST['id'];

//$source_id = $_POST['source_id'];
$module_name = $_POST['module_name'];
$source_name = $_POST['source_name'];
$source_file_name = $_POST['source_file_name'];
$source_file_desc = $_POST['source_file_desc'];
$frequency_of_data = $_POST['frequency_of_data'];
$admin_division = $_POST['admin_division'];
$admin_section = $_POST['admin_section'];
$admin_name = $_POST['admin_name'];
$owner_division = $_POST['owner_division'];
$owner_section = $_POST['owner_section'];
$owner_name = $_POST['owner_name'];
$remark = $_POST['remark'];
$owner_name = $_POST['owner_name'];
$source_type = $_POST['source_type'];
$source_stauts = $_POST['source_stauts'] == "" ? "N" : $_POST['source_stauts'];

//show_post();
$db->debug = 0;

if ($action == "new") {
    $sql = "INSERT INTO tbl_sm_source_files 
                                        ( 
                                                module_name,
                                                source_name,
                                                source_file_name,
                                                source_file_desc,
                                                frequency_of_data,
                                                admin_division,
                                                admin_section,
                                                admin_name,
                                                owner_division,
                                                owner_section,
                                                owner_name,
                                                remark,
                                                source_stauts,
                                                source_type
                                         )
                VALUES (  '$module_name',
                                                '$source_name',
                                                '$source_file_name',
                                                '$source_file_desc',
                                                '$frequency_of_data',
                                                '$admin_division',
                                                '$admin_section',
                                                '$admin_name',
                                                '$owner_division',
                                                '$owner_section',
                                                '$owner_name',
                                                '$remark',
                                                '$source_stauts',
                                                '$source_type'
                                         );";
} else if ($action == "edit") {
    $sql = "UPDATE tbl_sm_source_files 
                SET 
                        module_name = '$module_name',
                        source_name = '$source_name',
                        source_file_name = '$source_file_name',
                        source_file_desc = '$source_file_desc',
                        frequency_of_data = '$frequency_of_data',
                        admin_division = '$admin_division',
                        admin_section = '$admin_section',
                        admin_name = '$admin_name',
                        owner_division = '$owner_division',
                        owner_section = '$owner_section',
                        owner_name = '$owner_name',
                        remark = '$remark',
                        source_stauts  = '$source_stauts',
                        source_type = '$source_type'
        WHERE source_id = $source_id";
} else if ($_GET['doAction'] == "delete") {
    $sql = "DELETE FROM tbl_sm_source_files WHERE source_id = " . $_GET['id'];
}

$result = $db->Execute($sql);
if ($result) {
    echo "1";
} else {
    echo "0";
}
?>