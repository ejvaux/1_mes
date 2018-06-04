<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $moldhistoryid = $_POST['moldhistoryid'];
    $date = date('Y-m-d');
    $moldcode = $_POST['moldcode'];
    $requestdate = $_POST['requestdate'];
    $updateuser = $_SESSION['text'];
    $updatedatetime = date('Y-m-d H:i:s');
  
    $sql = "UPDATE  mmc_mold_history SET
        
        MOLD_CODE = '$moldcode',
        REQUEST_DATE = '$requestdate',
        REPAIR_DATE = '$date',
        UPDATE_USER = '$updateuser',
        UPDATE_DATETIME = '$updatedatetime'
        
    WHERE MOLD_HISTORY_ID = $moldhistoryid";   

    if ($conn->query($sql) === TRUE) {        
        echo "success";

    } 
    else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }
    
    $conn->close();
?>