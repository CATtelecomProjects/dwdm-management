<?php
@header('Content-Type: text/html; charset=utf-8');
include("../../includes/DataTable/Class.ServerSide.php");
	
$dtss  = new DataTableSS();
	
// DB table to use
$dtss->table = 'tbl_sm_terminology';

// Table's primary key
$dtss->primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$dtss->columns = array(
	array( 'db' => 'id', 'dt' => 0 ),
	array( 'db' => 'word',  'dt' => 1 ),
	array( 'db' => 'descriptions',  'dt' => 2 ),	
	array( 'db' => 'update_time',     'dt' =>3)
	);
	
//$sub_module_id = $_GET['sub_module_id'];
//$dtss->whereAll = "sub_module_id = '$sub_module_id' ";	
//$dtss->GET = $_GET;	

echo json_encode(	$dtss->Init());

?>