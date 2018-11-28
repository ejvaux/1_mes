<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['text'];

$new_dr = $_POST['new_dr'];
$datenow=date("Y-m-d");

$sql = "UPDATE mis_dr_assigned 
        SET dr_number = '$new_dr', dr_date = '$datenow', Date_Inserted = '$datenow'
        WHERE dr_assigned_id IN (SELECT q_dr_assigned_id FROM mis_dr_queue WHERE q_user = '$user')";
$result = $conn->query($sql);


$sql3="SELECT * FROM mis_dr_assigned WHERE  dr_number='$new_dr' LIMIT 100";
$result3 = $conn->query($sql3);

while($row=$result3->fetch_assoc())
{
$sql4="UPDATE mis_product SET SHIP_STATUS = 'SHIPPED' 
WHERE PACKING_NUMBER = '".$row['packing_number']."'";
$result4=$conn->query($sql4);
}


$sql2 ="DELETE FROM mis_dr_queue WHERE q_user = '$user'";
$result = $conn->query($sql2);

