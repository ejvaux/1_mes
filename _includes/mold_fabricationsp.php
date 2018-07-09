<?php

 if(isset($_POST['sday'])){
    $sday = $_POST['sday'];
 }
 else{
     $sday = "none";
 }

 if(isset($_POST['eday'])){
    $eday = $_POST['eday'];
 }
 else{
     $eday = "none";
 }

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
// $table = 'mmc_mold_fabrication';

if($sday!='none' && $eday!='none'){
    $table = <<<EOT
 (
    SELECT 
      *
    FROM mmc_mold_fabrication
    WHERE INSERT_DATETIME BETWEEN '$sday' AND '$eday'
 ) temp
EOT;
}
else{
    $table = <<<EOT
 (
    SELECT 
      *
    FROM mmc_mold_fabrication    
 ) temp
EOT;
}
 
// Table's primary key
$primaryKey = 'MOLD_FABRICATION_ID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'MOLD_FABRICATION_ID', 'dt' => 1 ),
    array( 'db' => 'ORDER_NO', 'dt' => 2 ),
    array( 'db' => 'MANUFACTURE_DATE', 'dt' => 3 ),
    array( 'db' => 'MOLD_CODE', 'dt' => 4 ),
    array( 'db' => 'CUSTOMER_CODE', 'dt' => 5 ),
    array( 'db' => 'CUSTOMER_NAME', 'dt' => 6 ),
    array( 'db' => 'CURRENT_PROCESS', 'dt' => 7 ),
    array( 'db' => 'OPERATOR', 'dt' => 8 ),
    array( 'db' => 'DESIGN-1', 'dt' => 9 ),
    array( 'db' => 'DESIGN-2', 'dt' => 10 ),
    array( 'db' => 'DESIGN-3', 'dt' => 11 ),
    array( 'db' => 'RADIAL-1', 'dt' => 12 ),
    array( 'db' => 'LATHER-1', 'dt' => 13 ),
    array( 'db' => 'BANDSAW', 'dt' => 14 ),
    array( 'db' => 'ML', 'dt' => 15 ),
    array( 'db' => 'GS-1', 'dt' => 16 ),
    array( 'db' => 'GS-2', 'dt' => 17 ),
    array( 'db' => 'HSM', 'dt' => 18 ),
    array( 'db' => 'HSM-1', 'dt' => 19 ),
    array( 'db' => 'HSM-2', 'dt' => 20 ),
    array( 'db' => 'WEDM', 'dt' => 21 ),
    array( 'db' => 'M-EDM', 'dt' => 22 ),
    array( 'db' => 'EDM', 'dt' => 23 ),
    array( 'db' => 'ASSEMBLE-1', 'dt' => 24 ),
    array( 'db' => 'POLISHING-1', 'dt' => 25 ),
    array( 'db' => 'DELIVERY_PLAN', 'dt' => 26 ),
    array( 'db' => 'FINISHED_DATE', 'dt' => 27 ),
    array( 'db' => 'INSERT_USER', 'dt' => 28 ),
    array( 'db' => 'INSERT_DATETIME', 'dt' => 29 ),
    array( 'db' => 'UPDATE_USER', 'dt' => 30 ),
    array( 'db' => 'UPDATE_DATETIME', 'dt' => 31 ),
    
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