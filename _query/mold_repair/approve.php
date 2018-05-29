<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $approvedatetime = date('Y-m-d H:i:s');
    $approver = $_SESSION['text'];
    $moldstatus = "FINISHED";
    $repaircontrol = $_POST['repaircontrol'];
  
    $sql = "UPDATE mmc_mold_repair SET        
        
        MOLD_STATUS = '$moldstatus',
        APPROVER = '$approver',
        APPROVE_DATETIME = '$approvedatetime'
        

    WHERE MOLD_REPAIR_CONTROL_NO = $repaircontrol";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error updating record: " . $conn->error;        
    }

    $conn->close();
?>