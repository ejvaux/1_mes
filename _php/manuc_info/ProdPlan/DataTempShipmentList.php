<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$user= $_SESSION['text'];
$sql = "SELECT * FROM mis_temp_ship_group WHERE user_insert='$user'";
$result = $conn->query($sql);
$datavar=array();
$ctr=0;
while($row = $result->fetch_assoc())
{
$ctr+=1;
array_push($datavar,["NO"=> $ctr,"ITEM_CODE"=>$row['item_code'],"PACKING_NUMBER"=>$row['packing_number'],
"LOT_NUMBER"=>$row['lot_number'],"ITEM_NAME"=>$row['item_name'],
"CUSTOMER_CODE"=>$row['customer_code'],"CUSTOMER_NAME"=>$row['customer_name'],"QTY"=>$row['quantity'],"REFERENCE_NUMBER"=>$row['danpla_reference']]);
}
echo json_encode($datavar, true);
?>