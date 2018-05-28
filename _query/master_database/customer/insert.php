<?php
   /*  _________ CUSTOMER _____________  */
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $customercode = $_POST['customercode'];
        $customerinitial = $_POST['customerinitial'];
        $divisioncode = $_POST['divisioncode'];
        $customername = $_POST['customername'];
        $groupcode = $_POST['groupcode'];
        $insertdatetime = date('Y-m-d H:i:s');
        $insertuser = $_SESSION['text'];
    
    $sql = "INSERT INTO dmc_customer
    (           
        CUSTOMER_CODE,
        CUSTOMER_INITIAL,
        DIVISION_CODE,
        CUSTOMER_NAME,
        GROUP_CODE,
        INSERT_DATETIME,
        INSERT_USER
    )

        VALUES (?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'sssssss',
            $customercode,
            $customerinitial,
            $divisioncode,
            $customername,
            $groupcode,
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