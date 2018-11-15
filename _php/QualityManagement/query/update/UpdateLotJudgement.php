<?php

session_start();
    $decision = $_POST['decision'];
    $user = $_SESSION['text'];
    $lot = $_POST['lot_number'];
    $item = $_POST['item_code'];
    $update_dateTime =  Date('Y-m-d H:i:s');

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

function updateShipStatus($decision, $item, $lot){
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    if($decision == 'APPROVE')
    {
        $decision="APPROVED";
    }

        $sql = "UPDATE mis_product SET SHIP_STATUS='$decision' WHERE LOT_NUM ='$lot' AND ITEM_CODE = '$item'";
        if($conn->query($sql) === TRUE) {
                echo "SUCCESS";
                } 
            else{
                echo "Error updating record: " . $sql . "<br>" . $conn->error;        
                }
        $conn->close();
}

updateShipStatus($decision, $item, $lot);

if($decision == "EPSON_APPROVED"){
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
        $sql = "UPDATE qmd_lot_create SET EPSON_QC_APPROVED = 'APPROVED' WHERE LOT_NUMBER ='$lot' AND ITEM_CODE = '$item'";
        if($conn->query($sql) === TRUE) {
                echo "SUCCESS";
                } 
            else{
                echo "Error updating record: " . $sql . "<br>" . $conn->error;        
                }
    
            }
else{
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
        
        if($decision=="APPROVE"){
            
            $qty = "0";
            $remarks = "";
            $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'APPROVED', JUDGE_BY = '$user', DEFECT_QTY = '$qty', REMARKS='$remarks', JUDGEMENT_DATE = '$update_dateTime' WHERE LOT_NUMBER = '$lot' AND ITEM_CODE = '$item'";
            if($conn->query($sql) === TRUE) {
                echo "SUCCESS";
                } 
            else{
                
                echo "Error updating record: " . $sql . "<br>" . $conn->error;        
                }
                $decision = 'APPROVED';
            }
        else if($decision == "DISAPPROVE"){
            $qty = $_POST['defect_qty'];
            $remarks = $_POST['remarks'];
            $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'DISAPPROVED', JUDGE_BY = '$user',DEFECT_QTY = '$qty', REMARKS = '$remarks', JUDGEMENT_DATE = '$update_dateTime' WHERE LOT_NUMBER = '$lot' AND ITEM_CODE = '$item'";
            if($conn->query($sql) === TRUE) {
                echo "SUCCESS";
                } 
            else{
                
                echo "Error updating record: " . $sql . "<br>" . $conn->error;        
                }
                $decision = 'DISAPPROVED';
            }
            
        else if($decision == "PENDING-REWORK"){
            $qty = $_POST['defect_qty'];
            $remarks = $_POST['remarks'];

            $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'PENDING', JUDGE_BY = '$user',DEFECT_QTY = '$qty', REMARKS = '$remarks', JUDGEMENT_DATE = '$update_dateTime' WHERE LOT_NUMBER = '$lot' AND ITEM_CODE = '$item'";
            if($conn->query($sql) === TRUE) {
                echo "SUCCESS";
                } 
            else{
                
                echo "Error updating record: " . $sql . "<br>" . $conn->error;        
                }
            $decision = 'PENDING';
            }

        else if($decision == "PENDING"){
            $user = $_SESSION['text'];
            $lot = $_POST['lot_number'];
            $qty = "0";
            $remarks = "";
            $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'PENDING', JUDGE_BY = '$user',DEFECT_QTY = '$qty', REMARKS = '$remarks', JUDGEMENT_DATE = '$update_dateTime' WHERE LOT_NUMBER = '$lot' AND ITEM_CODE = '$item'";
            if($conn->query($sql) === TRUE) {
                echo "SUCCESS";
                } 
            else{
               echo "Error updating record: " . $sql . "<br>" . $conn->error;        
                }

            }
            $conn->close();       
    }