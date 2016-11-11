<?php
@session_start();
include('../../includes/config.inc.php');

$action = $_POST['doAction'];
$emp_code = $_POST['emp_code'];
$chk_data = $_POST['chk_data'];

//$db->debug =1;
//exit;
if ($action == "MAPPING") {

    $sql_reset_mapping = "DELETE FROM tbl_sm_mapping_user WHERE emp_code = '$emp_code' ";
    $result_reset = $db->Execute($sql_reset_mapping);

    if (count($chk_data) > 0) {

        for ($i = 0; $i < count($chk_data); $i++) {
            $sql_mapping = "INSERT INTO tbl_sm_mapping_user 
                                                            (emp_code ,
                                                            rep_group_id )
                                    VALUES ( '$emp_code',
                                                                    '" . $chk_data[$i] . "'
                                                             );";
            $result = $db->Execute($sql_mapping);
        } // End for

        $statusActived = 'Y';
    } else {  // if not select set tbl_sm_emp.actived = 'N'
        $statusActived = 'N';
    }// count($chk_data)>0

    $sql_update_actived = "UPDATE tbl_sm_emp SET actived = '$statusActived' WHERE emp_code = '$emp_code' ";
    $result_update_actived = $db->Execute($sql_update_actived);

    if ($result_update_actived) {
        echo "1";
    } else {
        echo "0";
    }
} // if mapping
?>