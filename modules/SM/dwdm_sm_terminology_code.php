<?php
@session_start();
include('../../includes/config.inc.php');
//show_post();
$action = $_POST['doAction'];

/* $term_id = $_POST['term_id'];
  $term_name = trim($_POST['term_name']); */

$id = $_POST['id'];
$word = trim($_POST['word']);
$descriptions = trim($_POST['descriptions']);
$sub_module_id = trim($_POST['sub_module_id']);

$db->debug = 0;

// ฟังก์ชั่นในการตรวจสอบค่าใน tbl_sm_terminology_cate 
/* function chkTerm($term_name){
  global $db;

  $sql = "SELECT term_id FROM tbl_sm_terminology_cate WHERE term_name = '$term_name' ";
  $rs = $db->GetRow($sql);

  // ตรวจสอบว่าค่าที่กรอกมีในหมวดหมู่แล้วหรือไม่
  if ( $rs['term_id'] ){ //ถ้ามีให้ return ค่า term_id

  return $rs['term_id'];

  }else{ //ถ้าไม่มี ให้  insert data ลงที่ table tbl_sm_terminilogy_cate ก่อน แล้ว return ค่า last id

  $sql_cate = "INSERT INTO tbl_sm_terminology_cate (term_name) VALUES('$term_name') ";
  $db->Execute($sql_cate);
  $term_id = $db->Insert_ID();
  return $term_id;

  }

  } */


/* if($action <> "" ) {
  // เรียกใช้ฟังก์ชั่น chkTerm
  $term_id = chkTerm($term_name);
  }
 */


if ($action == "new") {     // Insert Data
    $sql = "INSERT INTO tbl_sm_terminology 
                                        ( word,
                                        descriptions,
                                        term_id,
                                        sub_module_id)
                VALUES ( '$word',
                                                '$descriptions' ,
                                                '$term_id',
                                                $sub_module_id
                                         );";
} else if ($action == "edit") {  // Update Data
    $sql = "UPDATE tbl_sm_terminology 
                                        SET   
                                                        word = '$word', 		
                                                        descriptions = '$descriptions',
                                                        term_id = '$term_id' ,
                                                        sub_module_id = sub_module_id 
                WHERE id = $id";
} else if ($_GET['doAction'] == "delete") { // Delete Data
    $sql = "DELETE FROM tbl_sm_terminology WHERE id = " . $_GET['id'];
}

//echo $sql;
$result = $db->Execute($sql);
if ($result) {
    echo "1";
} else {
    echo "0";
}
?>