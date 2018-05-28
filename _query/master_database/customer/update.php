<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $customerid = $_POST['idcustomer'];
        $customercode = $_POST['eccustomercode'];
        $customerinitial = $_POST['eccustomerinitial'];
        $divisioncode = $_POST['ecdivisioncode'];
        $customername = $_POST['eccustomername'];
        $groupcode = $_POST['ecgroupcode'];
        $updatedatetime = date('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];
  
    $sql = "UPDATE dmc_customer SET
        
        CUSTOMER_CODE = '$customercode',
        CUSTOMER_INITIAL = '$customerinitial',
        DIVISION_CODE = '$divisioncode',
        CUSTOMER_NAME = '$customername',
        GROUP_CODE = '$groupcode',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

    WHERE CUSTOMER_ID = $customerid";   

    if ($conn->query($sql) === TRUE) {
        
        echo "success";
    } else {
        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>