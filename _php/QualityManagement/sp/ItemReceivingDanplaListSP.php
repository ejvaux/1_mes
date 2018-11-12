<?php
 $lot = $_POST['lot_number'];
 $item = $_POST['item_code'];
// DB table to use
$table = <<<EOT
 (
    SELECT 
        ID,
        PRINT_DATE,
        PACKING_NUMBER,
        SUM(PRINT_QTY) as SUMQ,
        ITEM_CODE,
        PRINTED_BY,
        JO_NUM,
        LOT_NUM
    FROM mis_product
    WHERE LOT_NUM = '$lot' and ITEM_CODE = '$item' AND WAREHOUSE_RECEIVE != 'RECEIVED'
    GROUP BY PACKING_NUMBER
 ) temp
EOT;

 
// Table's primary key
$primaryKey = 'ID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'ID', 'dt' => 0 ),
/*     array( 'db' => 'LOT_DEFECT_ID', 'dt' => 1 ), */
    array( 'db' => 'PRINT_DATE', 'dt' => 1 ),
    array( 'db' => 'PACKING_NUMBER', 'dt' => 2 ),
    array( 'db' => 'SUMQ', 'dt' => 3 ),
    array( 'db' => 'ITEM_CODE', 'dt' => 4 ),
    array( 'db' => 'PRINTED_BY', 'dt' => 5 ),
    array( 'db' => 'JO_NUM', 'dt' => 6 ),
    array( 'db' => 'LOT_NUM', 'dt' => 7 )
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