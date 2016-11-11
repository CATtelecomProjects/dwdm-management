<?php
@session_start();

include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$user_id = $_POST['id'];
$username = $_POST['username'];
$password = base64_encode($_POST['password']);
$emp_code = $_POST['emp_code'];
$user_desc = $_POST['user_desc'];
$user = $_SESSION['sess_name'];
$module_owner = $_POST['module_name'];
/* print "<pre>";
  print_r($_POST);
  print "</pre>"; */

//exit;
$db->debug = 0;
/* * ********************************************* */

function set_authorize() {
    global $db, $user_id, $action, $user;

    /*     * ********************************************* */
    # เพิ่มค่าที่ tbl_user_auth
    // ทำการเคลียร์ค่าใน table tbl_user_auth ตามรหัส user_id	 ทุกครั้ง
    $sql_del_group = "DELETE FROM tbl_user_auth WHERE user_id = $user_id ";
    $db->Execute($sql_del_group);

    // ทำการเคลียร์ค่าใน table tbl_module_auth ตามรหัส user_id	 ทุกครั้ง
    $sql_del_module = "DELETE FROM tbl_module_auth WHERE user_id = $user_id ";
    $db->Execute($sql_del_module);

    if ($action == "new") {
        // หาค่าล่าสุดจาก tbl_users จากค่า auto increatment
        $rs_get_lastID = $db->GetRow("SELECT MAX(user_id) as MAXID FROM  tbl_users ");
        $getMaxID = $rs_get_lastID['MAXID'];
        $set_user_id = $getMaxID;
    } else if ($action == "edit") {
        $set_user_id = $user_id;
    }

    // วนเพิ่มข้อมูลใน Table tbl_user_auth

    if ($_POST['user_group']) { // ถ้าไม่มีการเลือกกลุ่มผู้ใช้งานให้ค่าเริ่มต้นเป็น User/Requester group_id =4						
        //	echo	$sql_add_ugroup = "INSERT INTO tbl_user_auth (group_id,user_id) VALUES (4,$set_user_id); ";			
        //	$db->Execute($sql_add_ugroup);
        foreach ($_POST['user_group'] as $v) {
            $sql_add_ugroup = "INSERT INTO tbl_user_auth (group_id,user_id , update_by) VALUES ($v,$set_user_id , '$user'); ";
            $db->Execute($sql_add_ugroup);
        }
    }


    // วนเพิ่มข้อมูลใน Table tbl_module_auth

    if ($_POST['module_name']) {

        foreach ($_POST['module_name'] as $v) {
            $sql_add_module = "INSERT INTO tbl_module_auth (user_id , module_name) VALUES ($set_user_id ,  '$v'); ";
            $db->Execute($sql_add_module);
        }
    }

    /*     * ********************************************* */
    # End เพิ่มค่าที่ tbl_user_auth


    /*     * ********************************************* */
    # เพิ่มค่าที่ tbl_user_on_site
    // ทำการเคลียร์ค่าใน table tbl_user_on_site ตามรหัส user_id	 ทุกครั้ง
    /* 	
      $sql_del_usersite = "DELETE FROM tbl_user_on_site WHERE user_id = $user_id ";
      $db->Execute($sql_del_usersite);

      // วนเพิ่มข้อมูลใน Table tbl_user_on_site

      if(!$_POST['onsite_id']) return;
      foreach($_POST['onsite_id'] as $v){
      if($site_id <> $v){	// ถ้าไซต์งานอื่นๆ เท่ากับ ไซต์งานหลัก ไม่ต้องบันทึกซ้ำ
      $sql_add_usersite = "INSERT INTO tbl_user_on_site (user_id,site_id) VALUES ($user_id,$v); ";
      $db->Execute($sql_add_usersite);
      }
      }
     */
    /*     * ********************************************* */
    # End เพิ่มค่าที่ tbl_user_auth
}

// End function


if ($action == "new") {
    $sql = "INSERT INTO tbl_users
                                        ( username, password,  user_desc  , update_by  )
                VALUES ( '" . $username . "','" . $password . "','" . $user_desc . "', '$user')";
    $result = $db->Execute($sql);


    set_authorize(); // เรียกใช้การ update ค่าในตาราง  tbl_user_auth
} else if ($action == "edit") {
    $sql = "UPDATE tbl_users 
                SET  username ='" . $username . "', 
                                password = '" . $password . "', 
                                user_desc='" . $user_desc . "',															
                                update_by = '$user',
                                update_time = NOW()
                WHERE user_id = $user_id ";
    $result = $db->Execute($sql);

    set_authorize(); // เรียกใช้การ update ค่าในตาราง tbl_user_on_site และ tbl_user_auth
} else if ($_GET['doAction'] == "delete") {
    $sql = "DELETE FROM tbl_users WHERE user_id = " . $_GET['id'];
    $result = $db->Execute($sql);

    //$sql = "DELETE FROM tbl_user_auth WHERE user_id = ".$_GET['user_id'];
    //$result = $db->Execute($sql);
}


if ($result) {
    echo "1";
} else {
    echo "0";
}
?>