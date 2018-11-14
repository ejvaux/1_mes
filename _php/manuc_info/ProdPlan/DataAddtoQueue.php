<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$user = $_SESSION['text'];

$drno = $_POST['drno'];
$grno = $_POST['grno'];
$itemcode = $_POST['itemcode'];

$sql = "SELECT dr_assigned_id FROM mis_dr_assigned WHERE (item_code = '$itemcode') AND
 (dr_number = '$drno') AND (group_name = '$grno')";

 $result = $conn->query($sql);
$check="";
 while($row = $result->fetch_assoc())
 {
    $datared = checkifexists($row['dr_assigned_id']);
    
    if($datared=="exists")
    {
        $check = "already exists";
    }

    else
    {
        $check = "Inserted";
        inserttoqueue($row['dr_assigned_id'],$user);
    }


 }
 echo json_encode($check,true);     



function checkifexists($drid)
{
    include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
    $res = "";
    $sql = "SELECT queue_id FROM mis_dr_queue WHERE q_dr_assigned_id = '$drid'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        $res = "exists";
    }
    else
    {
        $res = "clear";
        
    }
return $res;
}


function inserttoqueue($drid,$user)
{
    include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

    $sql="INSERT INTO mis_dr_queue(q_dr_assigned_id,q_user) VALUES('$drid','$user')";
    $result= $conn->query($sql);
    

}

