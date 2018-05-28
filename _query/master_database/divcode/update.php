<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $divisionid = $_POST['iddivcode'];
        $divisioncode = $_POST['eddivisioncode1'];
        $divisionname = $_POST['eddivisionname'];        
        $sapcode = $_POST['edsapcode'];
        $updatedatetime = DATE('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];

    
    $sql = "UPDATE dmc_division_code SET

        DIVISION_CODE = '$divisioncode',
        DIVISION_NAME = '$divisionname',
        SAP_DIVISION_CODE = $sapcode,
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

    WHERE DIVISION_ID = $divisionid";  
       
    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>