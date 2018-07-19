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
     $eday = $_POST['eday'];
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
/* $table = 'mmc_mold_repair'; */

if($sday!='none' && $eday!='none'){
    $table = <<<EOT
 (
    SELECT 
      *
    FROM bug_reports
    WHERE `send_at` BETWEEN '$sday' AND '$eday'
 ) temp
EOT;
}
else{
    $table = <<<EOT
 (
    SELECT 
      *
    FROM bug_reports    
 ) temp
EOT;
}


/* $table = <<<EOT
 (
    SELECT 
      *
    FROM bug_reports    
 ) temp
EOT; */

 
// Table's primary key
$primaryKey = 'report_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array( 
    array( 'db' => 'report_id', 'dt' => 0 ),
    array( 'db' => 'r_message', 'dt' => 1 ),  
    array( 'db' => 'sender', 'dt' => 2 ), 
    array( 'db' => 'send_at', 'dt' => 3 )
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