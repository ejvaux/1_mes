<?php

    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";   
    
    $ordernumber = $_POST['ordernumber'];
    $manufacturedate = $_POST['manufacturedate'];
    $moldcode = $_POST['moldcode'];
    $customercode = $_POST['customercode'];
    $customername = $_POST['customername'];
    $currentprocess = $_POST['currentprocess'];
    $deliveryplan = $_POST['deliveryplan'];
    $operator = $_POST['operator'];
    $insertrequest = $_SESSION['text'];
    $insertdatetime = date('Y-m-d H:i:s');
    $processdatetime = date('Y-m-d H:i:s');
    $operatorcolumn = $currentprocess . "_OPERATOR";
    
    $sql = "INSERT INTO mmc_mold_fabrication 
    (           
        ORDER_NO,
        MANUFACTURE_DATE,
        MOLD_CODE,
        CUSTOMER_CODE,
        CUSTOMER_NAME,
        CURRENT_PROCESS,
        DELIVERY_PLAN, 
        OPERATOR,
        INSERT_USER,
        INSERT_DATETIME,
        `$currentprocess`,
        `$operatorcolumn`
    )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'isssssssssss',
            $ordernumber,
            $manufacturedate,
            $moldcode,
            $customercode,
            $customername,
            $currentprocess,
            $deliveryplan,
            $operator,
            $insertrequest,
            $insertdatetime,
            $processdatetime,
            $operator
        );

        if ($stmt->execute() === TRUE) {            
            echo "success";
        } else {            
            echo "Error: " . $conn->error;
        }

                
        $stmt->close();
        $conn->close();
?>