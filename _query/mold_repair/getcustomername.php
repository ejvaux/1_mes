<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $cuscode = $_POST['cc'];
   
    $sql = "SELECT CUSTOMER_NAME FROM dmc_customer WHERE CUSTOMER_CODE = '$cuscode' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(isset($row)){
        echo json_encode($row,true); 
    }
    else{
        echo "none";
    }
       
    
    $conn->close();

?>