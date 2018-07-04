<?php


include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$packingno=$_POST['packingno'];
$lotno=$_POST['lotno'];
$itemcode=$_POST['itemcode'];

$sql="DELETE FROM mis_temp_ship_group WHERE packing_number='$packingno' AND lot_number = '$lotno' AND item_code = '$itemcode'";
$result = $conn->query($sql);


?>