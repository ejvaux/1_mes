<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";   
    
    $qcapprovedatetime = date('Y-m-d H:i:s');
    $qcapprover = $_SESSION['text'];
    $moldstatus = "QC APPROVED";
    $repaircontrol = $_POST['repaircontrol'];
  
    $sql = "UPDATE mmc_mold_repair SET        
        
        MOLD_STATUS = '$moldstatus',
        QC_APPROVER = '$qcapprover',
        QC_APPROVE_DATETIME = '$qcapprovedatetime'              

    WHERE MOLD_REPAIR_CONTROL_NO = $repaircontrol";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo /* "Error saving checklist: " . */ $conn->error;        
    }

    $conn->close();
?>