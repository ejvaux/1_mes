<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    $rejectremarks = 'PENDING';
    $defectQty = $_POST['defectQty'];
    $lotNumber = $_POST['lotNumber'];
    $defectName = $_POST['remarks'];
    $insertDate =  Date('Y-m-d H:i:s');
    $insertUser = $_SESSION['text'];


    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    $sql = "SELECT dmc_defect_code.DEFECT_CODE,dmc_defect_code.DIVISION_CODE,
            mis_product.ITEM_CODE, mis_product.ITEM_NAME, mis_product.PRINT_DATE, qmd_lot_create.JO_NUM, qmd_lot_create.LOT_QTY
            FROM mis_product LEFT JOIN dmc_customer ON mis_product.CUST_CODE = dmc_customer.CUSTOMER_CODE
            LEFT JOIN dmc_defect_code ON dmc_customer.DIVISION_CODE = dmc_defect_code.DIVISION_CODE
            LEFT JOIN qmd_lot_create ON qmd_lot_create.LOT_NUMBER = mis_product.LOT_NUM
            WHERE dmc_defect_code.DEFECT_NAME ='$defectName' AND mis_product.LOT_NUM = '$lotNumber'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $defectCode = $row['DEFECT_CODE'];
    $divCode = $row['DIVISION_CODE'];
    $itemCode = $row['ITEM_CODE'];
    $itemName = $row['ITEM_NAME'];
    $prod_date = $row['PRINT_DATE'];
    $jobOrder = $row['JO_NUM'];
    $lotqty = $row['LOT_QTY'];
    if($lotqty==$defectQty){
        $rejectremarks = 'DEFECT';
    }
    $conn->close();

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
            $jobOrder,
            $lotNumber,
            $itemCode,
            $itemName,
            $prod_date,
            $defectCode,
            $defectName,
            $defectQty,
            $lotqty,
            $rejectremarks,
            $insertDate,
            $insertUser
            );
        $stmt1->execute();
        $conn->close();
?>
