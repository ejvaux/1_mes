<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';


$reference = $_POST['ref_num'];


$sql3 = "SELECT packing_number,lot_num,jo_num,item_code,item_name,
machine_code,cust_code,cust_name,SUM(PRINT_QTY) as qty,danpla_reference FROM mis_product 
WHERE danpla_reference = '$reference' or packing_number ='$reference'";

$result3 = $conn->query($sql3);

while($row3 = $result3->fetch_assoc())
{
    $danplaref=$row3['danpla_reference'];
    $packingNo = $row3['packing_number'];
    $lotnumber = $row3['lot_num'];
    $joborderno=$row3['jo_num'];
    $itemcode = $row3['item_code'];
    $itemname = $row3['item_name'];
    $machinecode=$row3['machine_code'];
    $customercode=$row3['cust_code'];
    $customername=$row3['cust_name'];
    $qty=$row3['qty'];
    $user = $_SESSION['text'];



    $sql4 = "INSERT INTO mis_temp_ship_group(packing_number,lot_number,jo_number,item_code,machine_code,item_name,customer_code,customer_name,user_insert,quantity,danpla_reference)
VALUES('$packingNo','$lotnumber','$joborderno','$itemcode','$machinecode','$itemname','$customercode','$customername','$user','$qty','$danplaref')";

$result4=$conn->query($sql4);


}

//echo json_encode($data, true);    