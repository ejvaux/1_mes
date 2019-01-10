<?php 
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $temp = $_POST['id'];

        $sql = "DELETE FROM qmd_item_tempstore WHERE TEMP_ID = '$temp'";
        if($conn->query($sql) === TRUE) {
            echo "SUCCESS";
            } 
        else{
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }
    
?>