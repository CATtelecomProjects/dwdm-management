<?php
@session_start();

include('./includes/config.inc.php');
include('./includes/Class/Main.Class.php');

$db->debug=0;

$main = new MainWeb();
$rendom_text = $main->random_gen(64);



if(!$_POST['doAction']) return;
$username = $_POST['username'];
$password = base64_encode($_POST['password']);
$redirect = $_POST['redirect'];


$sql_chk = "SELECT * FROM tbl_users WHERE username = '$username'  AND password = '$password';";
$rs_chk=$db->GetRow($sql_chk);
//show_post();
if(count($rs_chk)>0){
	// หาหน่วยงานแรกที่สังกัดเพื่อกำหนดเป็นค่าแรกใน Session
	
	$_SESSION['sess_id'] = $rendom_text; // session_id();
	$_SESSION['sess_user_id'] = $rs_chk['user_id'];
	$_SESSION['sess_user_name'] = $rs_chk['username'];
	$_SESSION['sess_name'] = $rs_chk['user_desc'];
	$_SESSION['sess_email'] = $rs_chk['email'];

	// หาค่า IP Address
	if($_SERVER['HTTP_X_FORWARDED_FOR'] == ""){
		$IP = $_SERVER['REMOTE_ADDR'];
	}else{
		$IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	$sql_stat = "INSERT INTO 
								tbl_stats_login 
										(user_id,
										session_id,
										login_datetime,
										ip_address) 
							VALUES (
										".$rs_chk['user_id'].",
										'".$_SESSION['sess_id']."',
										NOW(),							
										'".$IP."'										
										) ";
	$db->Execute($sql_stat);
	
	//echo "1";
}else{
	//echo "0";
}


echo "<span style=\"text-align:center\"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
echo "<h5><img src=\"./images/loading-gear.gif\"><br> Loading to DW/DM...</h5></span>";
		
?>

<script>

setTimeout("window.location='index.php?<?=urldecode($redirect)?>';",0);	
</script>
