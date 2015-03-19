<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?php

include('includes/adodb.inc.php');
$tnsName = "DWCAT";
$userName = "mis";
$Password = "mis805";

$dbOra = NewADOConnection("oci8");
$dbOra ->Connect($tnsName, $userName, $Password);
$dbOra->SetFetchMode(ADODB_FETCH_ASSOC);
$dbOra -> debug=1;

$sql = "select * from user_login where username like '%ni%' ";
$rs = $dbOra->GetAll($sql);
print "<pre>";
print_r($rs);
print "</pre>";


?>