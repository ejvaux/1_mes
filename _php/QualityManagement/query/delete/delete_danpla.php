<?php 
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $danpla = $_POST['danpla'];

        $sql = "DELETE FROM qmd_danpla_tempstore WHERE TEMP_ID = '$danpla'";
        if($conn->query($sql) === TRUE) {
            echo "SUCCESS";
            } 
        else{
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }
    
?>