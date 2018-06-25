<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$packingNo = $_POST['packingno'];
$lotnumber = $_POST['lotno'];

$sql = "UPDATE mis_product SET SHIP_STATUS='APPROVED' WHERE PACKING_NUMBER='$packingNo'";
$result = $conn->query($sql);


$sql2= "UPDATE qmd_lot_create SET LOT_JUDGEMENT='APPROVED' WHERE LOT_NUMBER='$lotnumber'";
$result2 = $conn->query($sql2);

$sql3= "DELETE FROM mis_dr_assigned WHERE lot_number='$lotnumber' AND packing_number='$packingNo'";
$result3 = $conn->query($sql3);



?>