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
// DB table to use


if($sday!='none' && $eday!='none'){
$table = <<<EOT
 (
    SELECT 
        ID,
        PACKING_NUMBER,
        DATE_,
        JO_NUM,
        PRINT_DATE,
        ITEM_CODE,
        ITEM_NAME,
        SUM(PRINT_QTY) AS SUMQ,
        PRINTED_BY
    FROM mis_product
    WHERE LOT_NUM = '' AND (DATE_ BETWEEN '$sday' AND '$eday')
    GROUP BY PACKING_NUMBER
 ) temp
EOT;
}
else if($sday!='none' && $eday=='none'){
$table = <<<EOT
 (
    SELECT 
        ID,
        PACKING_NUMBER,
        DATE_,
        JO_NUM,
        PRINT_DATE,
        ITEM_CODE,
        ITEM_NAME,
        SUM(PRINT_QTY) AS SUMQ,
        PRINTED_BY
    FROM mis_product
    WHERE LOT_NUM = '' AND DATE_ LIKE '%$sday%' 
    GROUP BY PACKING_NUMBER
 ) temp
EOT;
}
else if($sday=='none' && $eday!='none'){
$table = <<<EOT
 (
    SELECT 
        ID,
        PACKING_NUMBER,
        DATE_,
        JO_NUM,
        PRINT_DATE,
        ITEM_CODE,
        ITEM_NAME,
        SUM(PRINT_QTY) AS SUMQ,
        PRINTED_BY
    FROM mis_product
    WHERE LOT_NUM = '' AND DATE_ LIKE '%$eday%' 
    GROUP BY PACKING_NUMBER
 ) temp
EOT;
}
else{
$table = <<<EOT
 (
    SELECT 
        ID,
        PACKING_NUMBER,
        DATE_,
        JO_NUM,
        PRINT_DATE,
        ITEM_CODE,
        ITEM_NAME,
        SUM(PRINT_QTY) AS SUMQ,
        PRINTED_BY
    FROM mis_product
    WHERE LOT_NUM = ''
    GROUP BY PACKING_NUMBER
 ) temp
EOT;
}

 
// Table's primary key
$primaryKey = 'ID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'ID', 'dt' => 0 ),
/*     array( 'db' => 'LOT_DEFECT_ID', 'dt' => 1 ), */
    array( 'db' => 'PACKING_NUMBER', 'dt' => 1 ),
    array( 'db' => 'DATE_', 'dt' => 2 ),
    array( 'db' => 'JO_NUM', 'dt' => 3 ),
    array( 'db' => 'PRINT_DATE', 'dt' => 4 ),
    array( 'db' => 'ITEM_CODE', 'dt' => 5 ),
    array( 'db' => 'ITEM_NAME', 'dt' => 6 ),
    array( 'db' => 'SUMQ', 'dt' => 7 ),
    array( 'db' => 'PRINTED_BY', 'dt' => 8 ),
);
 
// SQL server connection information
$sql_details = array(
    'type' => 'Mysql',
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
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns)
);
?>