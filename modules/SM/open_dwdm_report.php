<?php

@session_start();
require_once("../../includes/config.inc.php");
require_once("../../includes/functions.php");

//$username = $_SESSION['sess_user_name'];

$report_id = $_GET['report_id'];

$sql_report = "SELECT report_url , report_type FROM tbl_sm_report WHERE report_id = $report_id ";
$rs_report = $db->GetRow($sql_report);

$reportURL = $rs_report['report_url'];
$report_type = $rs_report['report_type'];


// รับค่า url จาก GET
//$reportURL = $_GET['reportURL'];
//$report_type = $_GET['report_type'];



echo "<span style=\"text-align:center\"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
echo "<h5><img src=\"../../images/loading-gear.gif\"><br> Opening Report...</h5></span>";



if ($report_type == "R") { // SAS Report
//ตัดคำจาก URL 
    $tmp = explode("com.sas.portal.ItemId=", $reportURL);

// ตัดเอา URL ชุดหลัง
    $report_url = urldecode($tmp[1]);

//target=\"_blank\"
    $autoForm = " <form name= id=\"DWDMForm\" action=\"http://dw-webreport.cattelecom.com:7001/SASLogon/Logon.do\" method=\"post\" id=\"DWDMForm\"> ";
    $autoForm .= " <input name=\"ux\" type=\"hidden\" value=\"" . $_SESSION['sess_bis_user'] . "\"/> ";
    $autoForm .= " <input name=\"px\" type=\"hidden\" value=\"" . base64_decode($_SESSION['sess_bis_pass']) . "\"/>";
    $autoForm .= " <input type=\"hidden\" name=\"_sasapp\" value=\"Information Delivery Portal 4.3\" />  ";
    $autoForm .= " <input type=\"hidden\" name=\"com.sas.portal.ItemId\" value=\"$report_url\" />  ";

//$autoForm .= $redirect;

    $autoForm .= " </form>";
    echo $autoForm;


    echo '<script language="javascript">';
    echo "document.getElementById('DWDMForm').submit();"; // SUBMIT FORM
    echo '</script>';
} else if ($report_type == "D") { // Direct Report
    echo '<script language="javascript">';
    echo "window.location.href = '$reportURL';"; // goto url
    echo "</script>";
}
?>