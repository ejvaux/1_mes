<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$packingNo = $_POST['packingno'];
$lotnumber = $_POST['lotno'];
$joborderno=$_POST['jono'];
$itemcode = $_POST['itemcode'];
$itemname = $_POST['itemname'];
$machinecode=$_POST['machinecode'];
$customercode=$_POST['customercode'];
$customername=$_POST['customername'];
$qty=$_POST['qty'];
$refno=$_POST['danpla_reference'];
$user = $_SESSION['text'];


$sql = "INSERT INTO mis_temp_ship_group(packing_number,lot_number,jo_number,item_code,machine_code,item_name,customer_code,customer_name,user_insert,quantity,danpla_reference)
VALUES('$packingNo','$lotnumber','$joborderno','$itemcode','$machinecode','$itemname','$customercode','$customername','$user','$qty','$refno')";

$result = $conn->query($sql);

?>