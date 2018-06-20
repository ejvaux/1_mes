<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$sql = "SELECT * FROM mis_temp_ship_group";
$result = $conn->query($sql);
$datavar=array();
$ctr=0;
while($row = $result->fetch_assoc())
{
$ctr+=1;
array_push($datavar,["NO"=> $ctr,"ITEM_CODE"=>$row['item_code'],"PACKING_NUMBER"=>$row['packing_number'],
"LOT_NUMBER"=>$row['lot_number']]);
}
echo json_encode($datavar, true);
?>