<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$id = $_POST['id'];
$cate_name = $_POST['cate_name'];
$active = $_POST['active'];
$menu_order = $_POST['menu_order'];
$user = $_SESSION['sess_name'];

$db->debug = 0;


if ($action == "new") {


    $sql = "INSERT INTO tbl_dwdm_category
                                        (
                                        cate_name,
                                        active,
                                        menu_order,
                                        update_by
                                         )
                VALUES (
                                         " . chkNull($cate_name) . ",								
                                          '$active',
                                          '$menu_order',
                                          '$user'
                                         );";
} else if ($action == "edit") {

    $sql = "UPDATE tbl_dwdm_category
                SET  										
                        cate_name =" . chkNull($cate_name) . ",					
                        active = '$active',
                        menu_order = '$menu_order',
                        update_by = '$user' 
                WHERE cate_id = $id ";
} else if ($_GET['doAction'] == "delete") {
    //$sql_del_cate = "DELETE FROM tbl_knowledge_auth WHERE knowledge_cate_id =   ".$_GET['id'];
    //$db->Execute($sql_del_cate);

    $sql = "DELETE FROM tbl_dwdm_category WHERE cate_id = " . $_GET['id'];
}
$result = $db->Execute($sql);
if ($result) {
    echo "1";
} else {
    echo "0";
}
?>