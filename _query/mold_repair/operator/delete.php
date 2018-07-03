<?php

    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include_once $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/dbclass.php";
    $db = new DBQUERY;
    
    echo $db->delete_row('mmc_mold_operator','OPERATOR_ID',$_POST["id"]);
    
    /* include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $rowid = $_POST["id"];
    
    $sql = "DELETE FROM mmc_mold_operator WHERE OPERATOR_ID ='$rowid'";

    if ($conn->query($sql) === TRUE) {        
        echo "Record deleted successfully!";
    } 
    
    else {
        echo "Error deleting record: " . $conn->error;
    }

                
        $conn->close() */;
?>