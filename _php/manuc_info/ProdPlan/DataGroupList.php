<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$search=$_POST['search'];


if($search!="")
{
    $sql = "SELECT * FROM mis_dr_assigned WHERE (dr_number = '') AND (group_name LIKE '%$search%' OR packing_number LIKE '%$search%'
    OR lot_number LIKE '%$search%' OR jo_number LIKE '%$search%' OR item_code LIKE '%$search%' OR machine_code LIKE '%$search%') ORDER BY dr_assigned_id DESC";

}
else
{
    $sql = "SELECT * FROM mis_dr_assigned WHERE dr_number = ''  ORDER BY dr_assigned_id DESC";

}

$result = $conn->query($sql);
$datavar=array();
$ctr=0;
while($row = $result->fetch_assoc())
{
$ctr+=1;
array_push($datavar,["NO"=> $ctr,"GROUP_NAME"=>$row['group_name'],"PACKING_NUMBER"=>$row['packing_number'],
"LOT_NUMBER"=>$row['lot_number'],"JOB_ORDER_NO"=>$row['jo_number'],"ITEM_CODE"=>$row['item_code'],"ITEM_NAME"=>$row['item_name'],
"CUSTOMER_CODE"=>$row['customer_code'],"CUSTOMER_NAME"=>$row['customer_name']]);
}
echo json_encode($datavar, true);
?>