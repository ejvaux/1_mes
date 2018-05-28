<?php
session_start();

include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $userid = $_SESSION['username'];
    
    $sql = "UPDATE dmc_user_info SET
        
        TOKEN = null

    WHERE USER_ID = '$userid'";   

    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } else {
        
        echo "Error deleting token: " . $sql . "<br>" . $conn->error;        
    }

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy();

session_start();
$_SESSION['log_alert'] = "logout"; 

?>