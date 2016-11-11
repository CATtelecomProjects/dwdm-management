<?php
include('../../includes/dbConnect.php');
$emp_code = $_GET['emp_code'];

$sql_emp = "SELECT
                    a.emp_code,
                    a.emp_name,
                    a.emp_pos_desc,
                    a.emp_pos_short,
                    a.emp_email,
                    b.org_name,
                    b.org_short,
                    a.actived
                  FROM tbl_sm_emp a
                    JOIN tbl_sm_org b
                          ON a.org_code = b.org_code
                  WHERE a.emp_code =  '$emp_code' ";
$rs_emp = $db->GetRow($sql_emp);

$emp_code = $rs_emp['emp_code'];
$emp_name = $rs_emp['emp_name'];
$emp_email = $rs_emp['emp_email'];
$emp_pos_desc = $rs_emp['emp_pos_desc'];
$emp_pos_short = $rs_emp['emp_pos_short'];
$org_name = $rs_emp['org_name'];
$org_short = $rs_emp['org_short'];
$actived = $rs_emp['actived'];

//$isActived = $actived == "Y" ? "มีสิทธิ์ใช้งาน" : "ยังไม่มีสิทธิ์ใช้งาน";
$arrStatus = array("Y" => array("title" => "มีสิทธิ์ใช้งาน",
        "icon" => "on.gif"),
    "N" => array("title" => "ยังไม่มีสิทธิ์ใช้งาน",
        "icon" => "off.gif"));

$img = "<img src='https://intranet.cattelecom.com/web_data/profile/$emp_code.jpg' align='absmiddle'>";
$status = " <img src='./images/" . $arrStatus[$actived]['icon'] . "' class='tooltips' title='" . $arrStatus[$actived]['title'] . "'> " . $arrStatus[$actived]['title'];
$status .= " <img src='images/my-profile.png' class='tooltips' align='absmiddle' title=\"$img\">";


$str = "<strong><u>ตำแหน่ง</u> : </strong>$emp_pos_desc ($emp_pos_short)<br>";
$str .= "<strong><u>หน่วยงาน</u> : </strong>$org_name ($org_short)<br>";
$str .= "<strong><u>Email</u> : </strong>$emp_email<br>";
$str .= "<strong><u>สถานะ</u> : </strong> $status <br> ";

echo $str;
?>
<script>
    $(function () {
        $(".tooltips").tipsy({html: true, trigger: "hover", gravity: "w"});

        $('.tooltips').css("cursor", "pointer");

    });