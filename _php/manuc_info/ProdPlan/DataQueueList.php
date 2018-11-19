<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$user = $_SESSION['text'];
$datavar=array();
$ctr = 0;

$sql="SELECT item_code,item_name,SUM(quantity) as sumqty,dr_number,group_name FROM mis_dr_assigned 
WHERE dr_assigned_id IN (SELECT q_dr_assigned_id FROM mis_dr_queue WHERE q_user = '$user')
GROUP BY item_code";
$result = $conn->query($sql);


while($row = $result->fetch_assoc())
{
    $ctr +=1;

    
    $drnum = ($row['dr_number']==NULL||$row['dr_number']=="")?"UNASSIGNED DR":$row['dr_number'];
    $grnum = ($row['group_name']==NULL||$row['group_name']=="")?"No group name":$row['group_name'];
    
    array_push($datavar,["NO"=> $ctr,"ITEM_CODE"=>$row['item_code'],
    "ITEM_NAME"=>$row['item_name'],"QTY"=>$row['sumqty'],"DR_NO"=>$drnum,"GR_NAME"=>$grnum]);
}




echo json_encode($datavar, true);
