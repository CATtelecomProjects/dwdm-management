<?php

require('adodb.inc.php');
#Define Valiable for DB Connection
define("DB_HOST", "127.0.0.1");
define("DB_USER", "catadmin");
define("DB_PASS", "p@ssw0rd");
define("DB", "dwdm_db");

# Create DB Connecttion
//$dsn = "pdo_mysql://".DB_USER.":".DB_PASS."@".DB_HOST."/".DB."?persist";   
$dsn = "mysqli://" . DB_USER . ":" . DB_PASS . "@" . DB_HOST . "/" . DB;
$db = NewADOConnection($dsn);
$db->SetFetchMode(ADODB_FETCH_ASSOC);

# Sst Charaterset to Encode DB
$db->Execute("SET NAMES utf8");
$db->Execute("SET character_set_results=utf8");
$db->Execute("SET character_set_client=utf8");
$db->Execute("SET character_set_connection=utf8");
#$db->SetCharset("utf8");
# Set Debug Mode for Develope / In case on Site  set to false
$db->debug = 0; # Change to false for Production
?>          