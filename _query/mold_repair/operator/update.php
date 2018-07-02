<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $operatorid = $_POST['operatorid'];
        $operatorname = $_POST['operatorname'];
        $updatedatetime = date('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];
  
    $sql = "UPDATE mmc_mold_operator SET
        
        OPERATOR_NAME = '$operatorname',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

    WHERE OPERATOR_ID = $operatorid";   

    if ($conn->query($sql) === TRUE) {
        
        echo "success";
    } else {
        
        echo "Error updating record: " . $conn->error;        
    }

    $conn->close();
?>