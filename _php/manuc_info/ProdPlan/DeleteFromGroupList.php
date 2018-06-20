<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$packingno=$_POST['packingno'];
$lotno=$_POST['lotno'];
$itemcode=$_POST['itemcode'];
$groupname=$_POST['groupname'];


$sql="DELETE FROM mis_dr_assigned WHERE packing_number='$packingno' AND lot_number = '$lotno' 
AND item_code = '$itemcode' AND group_name='$groupname'";
$result = $conn->query($sql);


?>