<?php
   /*  _________ DIVISION CODE _____________  */
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    
    $employeecode = $_POST['employeecode'];
    $employeename = $_POST['employeename'];
    $employeestatus = $_POST['employeestatus'];
    $datehired = $_POST['datehired'];
    $insertdatetime = DATE('Y-m-d H:i:s');
    $insertuser = $_SESSION['text'];

    $sql = "INSERT INTO dmc_employee
    (           

        EMPLOYEE_CODE,
        EMPLOYEE_NAME,
        EMPLOYEE_STATUS,
        DATE_HIRED,
        INSERT_DATETIME,
        INSERT_USER

    )
        VALUES (?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'isssss',            
            $employeecode,
            $employeename,
            $employeestatus,
            $datehired,
            $insertdatetime,
            $insertuser 

        );

        if ($stmt->execute() === TRUE) {            
            echo "success";
        } else {            
            echo "Error: " . $conn->error;
        }                
        $stmt->close();
        $conn->close();
?>