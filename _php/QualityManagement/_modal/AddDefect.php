<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
    $jo = $_POST['JobOrderNo'];
    $lotNum = $_POST['datalistLotNumber'];
    $divCode = $_POST['DivCodeID'];
    $divName = $_POST['DivNameID'];
    $itemCode = $_POST['itemCodeID'];
    $itemName = $_POST['itemNameID'];
    $lotQty = $_POST['LotQuantityID'];
    $defCode = $_POST['DefectCodeID'];
    $defName = $_POST['DefectInputID'];
    $defDateTime = $_POST['dateTimeDefect'];
    $defQty = $_POST['DefQty'];
    $rejectremarks = 'DEFECT';
    $insertDate =  Date('Y-m-d H:i:s');
    $insertUser = $_SESSION['text'];

include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    

    $sql = "INSERT INTO qmd_defect_dl
    (   
        DIVISION_CODE,
        JOB_ORDER_NO,
        LOT_NUMBER,
        ITEM_CODE,
        ITEM_NAME,
        PROD_DATE,
        DEFECT_CODE,
        DEFECT_NAME,
        DEF_QUANTITY,
        LOT_QTY,
        REJECTION_REMARKS,
        INSERT_DATETIME,
        INSERT_USER
    )

        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
        $stmt1 = $conn->prepare($sql);

        $stmt1->bind_param(

            'ssssssssiisss',
            $divCode,
            $jo,
            $lotNum,
            $itemCode,
            $itemName,
            $defDateTime,
            $defCode,
            $defName,
            $defQty,
            $lotQty,
            $rejectremarks,
            $insertDate,
            $insertUser
            );
        if ($stmt1->execute() === TRUE) {
            echo "Record saved successfully";
        }
        else{
            echo "Error: " . $stmt1 . "<br>" . $conn->error; 
        }
        $stmt1->close();
        $conn->close();
?>
