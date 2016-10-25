<?php
include("../../includes/DataTable/Class.ServerSide.php");

$dtss  = new DataTableSS();
	
// DB table to use
$dtss->table = 'tbl_sm_source_files';

// Table's primary key
$dtss->primaryKey = 'source_file_name';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$dtss->columns = array(
	array( 'db' => 'source_id', 'dt' => 0 ),
	array( 'db' => 'source_name',  'dt' => 1 ),
	array( 'db' => 'source_file_name',   'dt' => 2 ),
	array( 'db' => 'source_file_desc',     'dt' => 3 ),
	array( 'db' => 'source_type',     'dt' => 4 ),
	array( 'db' => 'frequency_of_data',     'dt' => 5 ),
	array( 'db' => 'update_time',     'dt' => 6 )
	);
	
$module_name = $_GET['module_name'];
$dtss->whereAll = "module_name = '$module_name' ";	
$dtss->GET = $_GET;	

echo json_encode(	$dtss->Init());

?>