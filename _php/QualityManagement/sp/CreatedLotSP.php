<?php
 
// DB table to use
$table = <<<EOT
 (
    SELECT 
        LOT_ID,
        PROD_DATE,
        LOT_NUMBER,
        JO_NUM,
        SUM(LOT_QTY) AS SUMQ,
        LOT_CREATOR,
        ITEM_CODE,
        ITEM_NAME
    FROM qmd_lot_create
    GROUP BY LOT_NUMBER
 ) temp
EOT;

 
// Table's primary key
$primaryKey = 'LOT_ID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'LOT_ID', 'dt' => 0 ),
/*     array( 'db' => 'LOT_DEFECT_ID', 'dt' => 1 ), */
    array( 'db' => 'PROD_DATE', 'dt' => 1 ),
    array( 'db' => 'LOT_NUMBER', 'dt' => 2 ),
    array( 'db' => 'JO_NUM', 'dt' => 3 ),
    array( 'db' => 'SUMQ', 'dt' => 4 ),
    array( 'db' => 'LOT_CREATOR', 'dt' => 5 ),
    array( 'db' => 'ITEM_CODE', 'dt' => 6 ),
    array( 'db' => 'ITEM_NAME', 'dt' => 7 ),
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
 
require( $_SERVER['DOCUMENT_ROOT'].'/1_mes/_includes/ssp2.class.php' );
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);
?>