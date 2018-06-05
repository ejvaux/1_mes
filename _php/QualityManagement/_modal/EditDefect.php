<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    $defect_id = $_POST['defect_ID'];
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

        $sql = "UPDATE qmd_defect_dl SET 
        DIVISION_CODE = ' $divCode',
        JOB_ORDER_NO = '$jo',
        LOT_NUMBER = '$lotNum',
        ITEM_CODE = '$itemCode',
        ITEM_NAME = '$itemName',
        PROD_DATE = '$defDateTime',
        DEFECT_CODE = '$defCode',
        DEFECT_NAME = '$defName',
        DEF_QUANTITY = '$defQty',
        LOT_QTY = '$lotQty',
        REJECTION_REMARKS = '$rejectremarks',
        INSERT_DATETIME = '$insertDate',
        INSERT_USER = '$insertUser'
        WHERE LOT_DEFECT_ID = '$defect_id'";
        if($conn->query($sql) === TRUE) {
            echo "SUCCESS";
            } 
        else{
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }

    $conn->close();
    
?>


