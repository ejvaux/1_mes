<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $defectid = $_POST['iddefect'];
        $defectcode = $_POST['eddefectcode'];
        $divisioncode = $_POST['eddivisioncode'];
        $defectgroup = $_POST['eddefectgroup'];
        $defectname = $_POST['eddefectname'];
        $updatedatetime = Date('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];
  
    $sql = "UPDATE dmc_defect_code SET
        
        DEFECT_CODE = '$defectcode',
        DIVISION_CODE = '$divisioncode',
        DEFECT_GROUP = '$defectgroup',
        DEFECT_NAME = '$defectname',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

    WHERE DEFECT_ID = $defectid";   

    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>