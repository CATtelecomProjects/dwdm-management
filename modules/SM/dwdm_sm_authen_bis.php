<?php 
@session_start();
require_once("../../includes/config.inc.php");


$emp_code = $_SESSION['sess_user_name'];


$setModule = $_POST['setModule'];

$setPage = $_POST['setPage'];

if(($setModule == "" || $setPage == "")){
		$url = "../../";
}else{
		$url =  "../../index.php?setModule=$setModule&setPage=$setPage";
}


if($_POST['doAction'] == "signin_ext"){
	$_SESSION['sess_bis_user'] = $_POST['bis_user'];
	$_SESSION['sess_bis_pass'] = $_POST['bis_pass'];
	$_SESSION['sess_bis_name'] = iconv('TIS-620', 'UTF-8', $_POST['bis_name']);
	pageback("$url",''); 
}


?>