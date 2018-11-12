<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$itemcode = $_POST['itemcode'];
$groupname = $_POST['groupname'];
$cur_dr = $_POST['cur_dr'];
$new_dr = $_POST['new_dr'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['text'];
$datenow=date("Y-m-d");

$sql = "UPDATE mis_dr_assigned SET dr_number = '$new_dr',dr_date='$datenow',Date_Inserted = '$datenow',user_ins = '$user'
  WHERE item_code = '$itemcode'";
  
    if($cur_dr=="UNASSIGNED DR")
    {
       $sql .="  AND dr_number IS NULL AND group_name = '$groupname'";
    }
    else
    {
        if($groupname=="No group name")
        {
            $sql .="  AND dr_number ='$cur_dr' AND group_name IS NULL";
        
        }
        else{
            $sql .="  AND dr_number ='$cur_dr' AND group_name = '$groupname'";
        }
    }



    $result = $conn->query($sql);
    $res = "";

    if($result) 
    {
        $res = true;
    }
    else
    {
        $res = false;
    }

    echo json_encode($res,true);