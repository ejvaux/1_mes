<?php
 
// DB table to use
$table = 'qmd_defect_dl';
 
// Table's primary key
$primaryKey = 'LOT_DEFECT_ID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'LOT_DEFECT_ID', 'dt' => 0 ),
/*     array( 'db' => 'LOT_DEFECT_ID', 'dt' => 1 ), */
    array( 'db' => 'JOB_ORDER_NO', 'dt' => 1 ),
    array( 'db' => 'PROD_DATE', 'dt' => 2 ),
    array( 'db' => 'ITEM_CODE', 'dt' => 3 ),
    array( 'db' => 'ITEM_NAME', 'dt' => 4 ),
    array( 'db' => 'INSERT_USER', 'dt' => 5 ),
    array( 'db' => 'INSERT_DATETIME', 'dt' => 6 ),
    array( 'db' => 'DEF_QUANTITY', 'dt' => 7 ),
    array( 'db' => 'DEFECT_NAME', 'dt' => 8 ),
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
?>