<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $moldfabricationid = $_POST['moldfabricationid'];
    $ordernumber = $_POST['ordernumber'];
    $manufacturedate = $_POST['manufacturedate'];
    $moldcode = $_POST['moldcode'];
    $customercode = $_POST['customercode'];
    $customername = $_POST['customername'];
    $currentprocess = $_POST['currentprocess'];
    $deliveryplan = $_POST['deliveryplan'];
    $operator = $_POST['operator'];
    $updateuser = $_SESSION['text'];
    $updatedatetime = date('Y-m-d H:i:s');
  
    $sql = "UPDATE  mmc_mold_fabrication SET
        
        ORDER_NO = '$ordernumber',
        MANUFACTURE_DATE = '$manufacturedate',
        MOLD_CODE = '$moldcode',
        CUSTOMER_CODE = '$customercode',
        CUSTOMER_NAME = '$customername',
        CURRENT_PROCESS = '$currentprocess',
        DELIVERY_PLAN = '$deliveryplan',
        OPERATOR = '$operator',
        UPDATE_USER = '$updateuser',
        UPDATE_DATETIME = '$updatedatetime'
        
    WHERE MOLD_FABRICATION_ID = $moldfabricationid";   

    if ($conn->query($sql) === TRUE) {        
        echo "success";

    } 
    else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }
    
    $conn->close();
?>