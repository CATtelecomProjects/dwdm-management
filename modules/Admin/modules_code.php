<?php
@session_start();
include('../../includes/config.inc.php');
include('../../includes/Class/Main.Class.php');

$action = $_POST['doAction'];
$id = $_POST['id'];
$module_name = $_POST['module_name'];
$module_desc = $_POST['module_desc'];
$user = $_SESSION['sess_name'];

$path = "../$module_name";

$db->debug = 0;


$main = new MainWeb();
$main->_db = $db;

function create_dir() {
    global $path;
    //$dirname = $_POST['docs_years'];
    $filename = $path; // . $dirname . "/";

    if (!file_exists($filename)) {
        mkdir($path . $dirname, 777, true);
        //	echo "The directory $dirname was successfully created.";
        //exit;
    }
}

if ($action == "new") {


    $sql = "INSERT INTO tbl_modules
                                        (
                                        module_name,
                                        module_desc,
                                        update_by
                                         )
                VALUES (
                                         '$module_name',
                                         '$module_desc',								
                                          '$user'
                                         );";

    create_dir();
} else if ($action == "edit") {

    $sql = "UPDATE tbl_modules
                                SET  										
                                    module_name = '$module_name',
                                    module_desc = '$module_desc',										
                                    update_by = '$user' 
                WHERE id = $id ";

    create_dir();
} else if ($_GET['doAction'] == "delete") {
    //$sql_del_cate = "DELETE FROM tbl_knowledge_auth WHERE knowledge_cate_id =   ".$_GET['id'];
    //$db->Execute($sql_del_cate);

    $sql = "DELETE FROM tbl_modules WHERE id = " . $_GET['id'];

    $data = $main->getTableData("id=" . $_GET['id'] . "", "module_name", "tbl_modules");
    $filename = "../" . $data; // . $dirname . "/";

    if (is_dir($filename)) {
        rmdir($filename);
    }
}
$result = $db->Execute($sql);
if ($result) {
    echo "1";
} else {
    echo "0";
}
?>