<?php
@session_start();
//header('Content-Type: text/html; charset=utf-8');
include('../../includes/config.inc.php');

//show_post();
//show_array($_FILES['docs_filename']);
$db->debug = 0;

$datetime = date('Ymd'); //His

$action = $_POST['doAction'];
$id = $_POST['id'];
$cate_id = $_POST['cate_id'];
$cate_id_old = $_POST['cate_id_old'];
$issue_title = $_POST['issue_title'];
$issue_desc = $_POST['issue_desc'];
$publish = $_POST['publish'];
$update_by = $_POST['update_by'];
$user = $_SESSION['sess_name'];

//show_get();
//exit;
//show_array($_POST);
//show_array($_FILES);
//$sql_cate = "SELECT * FROM tbl_knowledge_cate WHERE id = $cate_id ";
//$rs_cate = $db->GetRow($sql_cate);
//$path = "./uploads_dir/".$rs_cate['name']."/";
$path = "./uploads_dir/";
//exit;
$file_name = $cate_id . "-" . $datetime . "-" . $_FILES["docs_filename"]["name"];

function docs_uploads() {

    global $path, $file_name, $db, $id;

    //	create_dir(); // สร้าง directory ตามปี
    // Upload File
    if (!file_exists($path . iconv('UTF-8', 'TIS620', $file_name))) {
        // echo $_FILES["docs_filename"]["name"] . "not already exists. ";
        //}else {
        $result = move_uploaded_file($_FILES["docs_filename"]["tmp_name"], $path . iconv('UTF-8', 'TIS620', $file_name));
        if ($result) {
            update_files_table($id);
        }
    } else {
        //echo $_FILES["docs_filename"]["name"] . " already exists. ";
        move_uploaded_file($_FILES["docs_filename"]["tmp_name"], $path . iconv('UTF-8', 'TIS620', $file_name));
        echo "2";
    }
}

function delete_file($id) {
    global $db, $path;
// หาชื่อไฟล์เพื่อทำการลบ
    $sql_del = "select * from tbl_knowledge_files where file_id=$id";

    $rs_del = $db->GetRow($sql_del);

    $filePath = $path . "/" . iconv('UTF-8', 'TIS620', $rs_del['file_name']);

    @unlink($filePath);
}

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

function move_file() {
    global $path, $docs_filename, $cate_id, $cate_id_old;

    create_dir();

    $newPath = $path . iconv('UTF-8', 'TIS620', $docs_filename);
    $oldPath = "../../" . UPLOADS_DIR . "/" . $docs_cate_code_old . "/" . iconv('UTF-8', 'TIS620', $docs_filename);

    // คัดลอกไฟล์จากพาทเดิมไปพาทใหม่
    if (@copy("$oldPath", "$newPath")) {
        @unlink($oldPath);
    }
}

function update_files_table($id) {
    global $file_name, $db, $user;
    $sql = "INSERT INTO tbl_knowledge_files (kn_id,file_name , update_by) 
					VALUES($id, '" . $file_name . "' , '$user') ";
    $db->Execute($sql);

    $sql2 = "UPDATE  tbl_knowledge SET update_time = NOW() WHERE id = $id ";
    $db->Execute($sql2);
}

if ($action == "new") {      // New Record action
$sql = "INSERT INTO tbl_knowledge
                                ( cate_id,issue_title,issue_desc,update_by,publish  )
        VALUES ( '" . $cate_id . "','" . $issue_title . "','" . $issue_desc . "','" . $update_by . "','" . $publish . "' );";
    //$result = $db->Execute($sql);
    //
	
	
	
			
	/* 	if($_FILES['docs_filename']){

      docs_uploads(); // Upload Document to server


      $sql =  "SELECT MAX(id) as MaxID  FROM tbl_knowledge;";
      $rs = $db->GetRow($sql);

      update_files_table($rs['MaxID']);

      } */
} else if ($action == "edit") {   /// Update Record action

    /* if($_FILES['docs_filename']){

      docs_uploads(); // Upload Document to server

      update_files_table($id);

      }
     */


    // ถ้าเลือกหมวดเอกสารใหม่
    /* if($cate_id <> $cate_id_old){
      move_file();
      } */

    $sql = "UPDATE tbl_knowledge 
                SET  cate_id ='" . $cate_id . "', 
                                issue_title = '" . $issue_title . "', 
                                issue_desc='" . $issue_desc . "',
                                update_by ='" . $update_by . "',
                                publish = '" . $publish . "' ,
                                update_by = '$user'
                WHERE id = $id ";
} else if ($_GET['doAction'] == "delete") { // Delete Record action
    global $db;
//	delete_file($_GET['docs_id']); // Function for Delete file

    $sql = "DELETE FROM tbl_knowledge WHERE id = " . $_GET['id'];


    $sql_file = "SELECT * FROM tbl_knowledge_files WHERE kn_id = " . $_GET['id'];
    $rs_file = $db->GetAll($sql_file);
    for ($i = 0; $i < count($rs_file); $i++) {
        delete_file($rs_file[$i]['file_id']); // Function for Delete file	
    }
} else if ($_GET['doAction'] == "delete_file") { // Delete file action 
    $id = $_GET['id'];


    delete_file($id); // Function for Delete file

    $sql = "DELETE FROM   tbl_knowledge_files WHERE file_id = $id";
} else if ($action = "Upload") { // Upload  File
    if ($_FILES['docs_filename']) {

        docs_uploads(); // Upload Document to server
    }
}

$result = $db->Execute($sql);

if ($result) {
    echo "1";
} else {
    echo "0";
}
?>