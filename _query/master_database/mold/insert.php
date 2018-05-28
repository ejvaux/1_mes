<?php

    /* ___________ MOLD _______________ */

    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $moldcode = $_POST['moldcode'];
    $toolnumber = $_POST['toolnumber'];
    $itemcode = $_POST['itemcode'];
    $itemname = $_POST['itemname'];
    $customercode = $_POST['customercode'];
    $customername = $_POST['customername'];
    $approvaldate = $_POST['approvaldate'];
    $drawingrevision = $_POST['drawingrevision'];
    $guaranteeshot = $_POST['guaranteeshot'];
    $moldshot = $_POST['moldshot'];
    $cavity = $_POST['cavity'];
    $moldremarks = $_POST['moldremarks'];
    $assetnumber = $_POST['assetnumber'];
    $transferdate = $_POST['transferdate'];
    $insertdatetime = date('Y-m-d H:i:s');
    $insertuser = $_SESSION['text'];
    
    $sql = "INSERT INTO dmc_mold_list
    (   
        MOLD_CODE,	
        TOOL_NUMBER,	
        ITEM_CODE,		
        ITEM_NAME,		
        CUSTOMER_CODE,	
        CUSTOMER_NAME,	
        APPROVAL_DATE,	
        DRAWING_REVISION,
        GUARANTEE_SHOT,
        MOLD_SHOT,
        CAVITY,		
        MOLD_REMARKS,	
        ASSET_NUMBER,	
        INSERT_DATETIME,
        INSERT_USER,		
        TRANSFER_DATE

    )

        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'ssssssssiiisssss',
            $moldcode,
            $toolnumber,            
            $itemcode,
            $itemname,
            $customercode,
            $customername,
            $approvaldate,
            $drawingrevision,
            $guaranteeshot,
            $moldshot,
            $cavity,
            $moldremarks,
            $assetnumber,
            $insertdatetime,
            $insertuser,
            $transferdate
        );

        if ($stmt->execute() === TRUE) {            
            echo "success";
        } else {            
            echo "Error: " . $conn->error;
        }                
        $stmt->close();
        $conn->close();
?>