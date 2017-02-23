<?php
include("../../includes/DataTable/Class.ServerSide.php");

$dtss  = new DataTableSS();
	
// DB table to use
$dtss->table = 'tbl_sm_report_group';

// Table's primary key
$dtss->primaryKey = 'rep_group_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$dtss->columns = array(
	array( 'db' => 'rep_group_id', 'dt' => 0 ),
	array( 'db' => 'rep_group_name',  'dt' => 1 ),
	array( 'db' => 'rep_group_type',   'dt' => 2 ),
	array( 'db' => 'rep_group_used',     'dt' => 3 ),
	array( 'db' => 'rep_group_orders',     'dt' => 4 ),
	array( 'db' => 'update_time',     'dt' => 5 )
	);
	
$module_name = $_GET['module_name'];
$dtss->whereAll = "module_name = '$module_name' ";	
$dtss->GET = $_GET;	

echo json_encode(	$dtss->Init());

?>