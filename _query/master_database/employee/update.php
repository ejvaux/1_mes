<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $employeeid = $_POST['employeeid'];
        $employeecode = $_POST['employeecode'];
        $employeename = $_POST['employeename'];
        $employeestatus = $_POST['employeestatus'];
        $datehired = $_POST['datehired'];
        $division = $_POST['division'];
        $updatedatetime = DATE('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];

    
    $sql = "UPDATE dmc_employee SET

        EMPLOYEE_CODE = '$employeecode',
        EMPLOYEE_NAME = '$employeename',
        EMPLOYEE_STATUS = '$employeestatus',
        DATE_HIRED = '$datehired',
        DIVISION = '$division',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

    WHERE EMPLOYEE_ID = $employeeid";  
       
    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>