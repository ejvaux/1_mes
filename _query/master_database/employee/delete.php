<?php

    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $rowid = $_POST["id"];
    
    $sql = "DELETE FROM dmc_employee WHERE EMPLOYEE_ID ='$rowid'";

    if ($conn->query($sql) === TRUE) {        
        echo "Record deleted successfully!";
    } 
    
    else {
        echo "Error deleting record: " . $conn->error;
    }

                
        $conn->close();
?>