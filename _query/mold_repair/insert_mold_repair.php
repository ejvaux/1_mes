<?php

    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    /* $numbering = $_POST['num']; */
    $date = date('Y-m-d');
    $repaircontrol = $_POST['repaircontrol'];
    $moldcode = $_POST['moldcode'];
    $toolnumber = $_POST['toolnumber'];
    $itemname = $_POST['itemname'];
    $itemcode = $_POST['itemcode'];
    $customername = $_POST['customername'];
    /* $moldshot = $_POST['moldshot']; */
    $machinecode = $_POST['machinecode'];
    $daterequired = $_POST['daterequired'];
    $timerequired = $_POST['timerequired'];
    $defectname = $_POST['defectname'];
    /* $repairremarks = $_POST['repairremarks']; */
    $userrequest = $_SESSION['text'];
    $moldstatus = $_POST['moldstatus'];
    $insertdatetime = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO mmc_mold_repair 
    (   
        /* NO, */
        REQUEST_DATE,
        MOLD_REPAIR_CONTROL_NO,
        MOLD_CODE,
        TOOL_NUMBER,
        ITEM_NAME,
        ITEM_CODE,
        CUSTOMER_NAME, 
        /* MOLD_SHOT, */
        MACHINE_CODE,
        DATE_REQUIRED,
        TIME_REQUIRED,
        DEFECT_NAME,
        /* REPAIR_REMARKS, */
        USER_REQUEST,
        MOLD_STATUS,
        INSERT_DATETIME
    )

        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'sissssssssssss',
            /* $numbering, */
            $date,
            $repaircontrol,
            $moldcode,
            $toolnumber,
            $itemname,
            $itemcode,
            $customername,
            /* $moldshot, */
            $machinecode,
            $daterequired,
            $timerequired,
            $defectname,
            /* $repairremarks, */
            $userrequest,
            $moldstatus,
            $insertdatetime
        );

        if ($stmt->execute() === TRUE) {

            $stmt->close();
            $conn->close();

            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
            
            $sql = "UPDATE dmc_mold_list SET  
            REPAIR_MOLD_SHOT = 0,
            DAYS_USED = 0
            WHERE MOLD_CODE = '$moldcode'";   

            if ($conn->query($sql) === TRUE) {                
                echo "success";
            } else {                
                echo "Error updating record: " . $conn->error;        
            }
            
        } else {            
            echo "Error: " . $conn->error;
        }

                
        /* $stmt->close(); */
        $conn->close();
?>