<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$user = $_SESSION['text'];
$itemcode = $_POST['itemcode'];
$drno = $_POST['drno'];
$grno = $_POST['grno'];



$sql = "DELETE FROM mis_dr_queue WHERE 
q_dr_assigned_id IN 
(SELECT dr_assigned_id FROM mis_dr_assigned WHERE (item_code = '$itemcode')";

if($drno=="UNASSIGNED DR")
{
   $sql .="  AND (dr_number IS NULL AND group_name = '$grno'))";
}
else
{
    if($grno=="No group name")
    {
        $sql .="  AND (dr_number ='$drno' AND group_name IS NULL))";
    
    }
    else{
        $sql .="  AND (dr_number ='$drno' AND group_name = '$grno'))";
    }
}

$sql.=" AND q_user = '$user'";
$result = $conn->query($sql);

