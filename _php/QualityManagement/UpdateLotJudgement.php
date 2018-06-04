<?php

session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    $update_dateTime =  Date('Y-m-d H:i:s');
    $decision = $_POST['decision'];
    if($decision=="APPROVE"){
        $user = $_SESSION['text'];
        $lot = $_POST['lot_number'];
        $qty = "0";
        $remarks = "";
        $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'APPROVED', JUDGE_BY = '$user', DEFECT_QTY = '$qty', REMARKS='$remarks', JUDGEMENT_DATE = $update_dateTime WHERE LOT_NUMBER = '$lot'";
        if($conn->query($sql) === TRUE) {
            echo "SUCCESS";
            } 
        else{
            
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }

        }
    else if($decision == "DISAPPROVE"){
        $user = $_SESSION['text'];
        $lot = $_POST['lot_number'];
        $qty = $_POST['defect_qty'];
        $remarks = $_POST['remarks'];
        $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'DISAPPROVED', JUDGE_BY = '$user',DEFECT_QTY = '$qty', REMARKS = '$remarks', JUDGEMENT_DATE = $update_dateTime WHERE LOT_NUMBER = '$lot'";
        if($conn->query($sql) === TRUE) {
            echo "SUCCESS";
            } 
        else{
            
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }

        }
        
    else if($decision == "PENDING-REWORK"){
        $user = $_SESSION['text'];
        $lot = $_POST['lot_number'];
        $qty = $_POST['defect_qty'];
        $remarks = $_POST['remarks'];

        $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'PENDING', JUDGE_BY = '$user',DEFECT_QTY = '$qty', REMARKS = '$remarks', JUDGEMENT_DATE = $update_dateTime WHERE LOT_NUMBER = '$lot'";
        if($conn->query($sql) === TRUE) {
            echo "SUCCESS";

           


            } 
        else{
            
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }
        }

    else if($decision == "PENDING"){
        $user = $_SESSION['text'];
        $lot = $_POST['lot_number'];
        $qty = "0";
        $remarks = "";
        $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'PENDING', JUDGE_BY = '$user',DEFECT_QTY = '$qty', REMARKS = '$remarks', JUDGEMENT_DATE = $update_dateTime WHERE LOT_NUMBER = '$lot'";
        if($conn->query($sql) === TRUE) {
            echo "SUCCESS";
            } 
        else{
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }

        }

    $conn->close();

    
?>