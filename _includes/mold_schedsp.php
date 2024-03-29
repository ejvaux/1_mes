<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'MMC_MOLD_SCHEDULING';
 
// Table's primary key
$primaryKey = 'MOLD_SCHED_ID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'MOLD_SCHED_ID', 'dt' => 0 ),
    array( 'db' => 'MOLD_PM_CONTROL_NO', 'dt' => 1 ),
    array( 'db' => 'MOLD_CODE', 'dt' => 2 ),
    array( 'db' => 'TOOL_NUMBER', 'dt' => 3 ),
    array( 'db' => 'ITEM_CODE', 'dt' => 4 ),
    array( 'db' => 'ITEM_NAME', 'dt' => 5 ),
    array( 'db' => 'CUSTOMER_CODE', 'dt' => 6 ),
    array( 'db' => 'CUSTOMER_NAME', 'dt' => 7 ),
    array( 'db' => 'MACHINE_CODE', 'dt' => 8 ),
    array( 'db' => 'MAINTENANCE_DATE', 'dt' => 9 ),         
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'masterdatabase',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( $_SERVER['DOCUMENT_ROOT'].'/1_mes/_includes/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);