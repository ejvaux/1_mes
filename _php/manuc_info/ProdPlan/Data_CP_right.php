<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$templatename=$_POST['tempname'];
$datavar=[];
$ctr=0;
$sql="SELECT itemcode, itemname,customercode,customername,machinecode,cavity,run_qty,cycle_time,machine_capacity
        FROM cp_allocated WHERE templatename = '$templatename'";

$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
    $ctr+=1;
    array_push($datavar,["ITEM_CODE"=>$row['itemcode'],"ITEM_NAME"=> $row['itemname'] ,
    "CUSTOMER_CODE"=>$row['customercode'],
    "CUSTOMER_NAME"=>$row['customername'], "MACHINE_CODE"=>$row['machinecode'],"CAVITY"=>$row['cavity'],
    "RUN_QTY"=>$row['run_qty'],"TOOL_NUM"=>"",
    "CYCLE_TIME"=>$row['cycle_time'],"QTY"=>$row['machine_capacity'],"NO"=>$ctr
    ]);
    
}        

echo json_encode($datavar,true); 
  