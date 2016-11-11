<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$active = $_POST['active'];
$menu_order = $_POST['menu_order'];
$user = $_SESSION['sess_name'];

$db->debug = 0;


if ($action == "new") {


    $sql = "INSERT INTO tbl_knowledge_cate
                                        (
                                        name,
                                        description,
                                        active,
                                        menu_order,
                                        update_by
                                         )
                VALUES (
                                         " . chkNull($name) . ",
                                          " . chkNull($description) . ",
                                          '$active',
                                          '$menu_order',
                                          '$user'
                                         );";
} else if ($action == "edit") {

    $sql = "UPDATE tbl_knowledge_cate
                SET  										
                                name =" . chkNull($name) . " ,
                                description =" . chkNull($description) . ",
                                active = '$active',
                                menu_order = '$menu_order',
                                update_by = '$user' 
                WHERE id = $id ";
} else if ($_GET['doAction'] == "delete") {
    //$sql_del_cate = "DELETE FROM tbl_knowledge_auth WHERE knowledge_cate_id =   ".$_GET['id'];
    //$db->Execute($sql_del_cate);

    $sql = "DELETE FROM tbl_knowledge_cate WHERE id = " . $_GET['id'];
}
$result = $db->Execute($sql);
if ($result) {
    echo "1";
} else {
    echo "0";
}
?>