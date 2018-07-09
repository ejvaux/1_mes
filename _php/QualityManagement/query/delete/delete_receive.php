<?php 

include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
         if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        $user = $_SESSION['text'];
        $sql = "DELETE FROM qmd_item_tempstore WHERE INSERT_USER = '$user'";
        if($conn->query($sql) === TRUE) {
            echo "SUCCESS";
            } 
        else{
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }
    
?>