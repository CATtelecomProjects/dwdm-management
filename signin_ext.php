<?php
session_start();
//$_SESSION['userid'] = 'apinan.s';
//$_SESSION['password'] = 'P@ssw0rd';
$username =  'guest';
$password = '123456';
$redirect = $_POST['redirect'];
$bis_user = $_POST['userid'];
$bis_pass = $_POST['password'];
$bis_name = $_POST['desc'];

// กำหนด session เพื่อใช้งาน user ที่ส่งงานมาจาก bis
$_SESSION['sess_bis_user'] = $bis_user;
$_SESSION['sess_bis_pass'] = $bis_pass;
$_SESSION['sess_bis_name'] = iconv('TIS-620', 'UTF-8', $bis_name);

$autoForm = " <form id= \"logonForm\" action=\"http://dw-webreport.cattelecom.com/dwdm-management/checkuser_ext.php\" method=\"post\"> ";
		$autoForm .= " <input name=\"username\" id=\"username\" type=\"hidden\" value=\"".$username."\"> ";
		$autoForm .= " <input name=\"password\" id=\"password\" type=\"hidden\" value=\"".$password."\">";
		$autoForm .= " <input name=\"doAction\" id=\"doAction\" type=\"hidden\" value=\"signin_ext\">";		
		$autoForm .= " <input name=\"redirect\" id=\"redirect\" type=\"hidden\" value=\"".$redirect."\">";				
		
		$autoForm .= " </form>";    	
		
		
		echo $autoForm;
echo '<script language="javascript">';
	
		echo "document.getElementById('logonForm').submit();"; // SUBMIT FORM
		
		echo '</script>';


echo "<span style=\"text-align:center\"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
echo "<h5><img src=\"./images/loading-gear.gif\"><br> Sign in to DW/DM : Back Office...</h5></span>";
		

?>
