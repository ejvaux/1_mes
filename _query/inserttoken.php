<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $bytes = random_bytes(32);
    $token = bin2hex($bytes);
    $userid = $_SESSION['username'];
    
    $sql = "UPDATE dmc_user_info SET
        
        TOKEN = '$token'

    WHERE USER_ID = '$userid'";   

    if ($conn->query($sql) === TRUE) {
        $_SESSION['token'] = $token;
        echo "success";
    } else {
        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>