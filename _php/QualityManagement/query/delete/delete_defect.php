<?php
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php"; 
    $def_ID = $_POST['defect_ID'];

    $sql = "DELETE FROM qmd_defect_dl WHERE LOT_DEFECT_ID = '$def_ID'";
     if($conn->query($sql) === TRUE){
            echo "SUCCESS";
            }
        else{
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }
?>