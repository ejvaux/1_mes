<?php
   /*  _________ ITEM LIST _____________  */
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $itemcode = $_POST['itemcode'];
        $divisioncode = $_POST['divisioncode'];
        $customercode = $_POST['customercode'];
        $customername = $_POST['customername'];
        $barcode = $_POST['barcode'];
        $itemname = $_POST['itemname'];
        $model = $_POST['model'];
        $itemprintcode = $_POST['itemprintcode'];
        $groupcode = $_POST['groupcode'];
        $description = $_POST['description'];
        $packqty = $_POST['packqty'];
        $danplaqty = $_POST['danplaqty'];
        $labeltype = $_POST['labeltype'];
        $insertdatetime = Date('Y-m-d H:i:s');
        $insertuser = $_SESSION['text'];
    
    $sql = "INSERT INTO dmc_item_list
    (           
        ITEM_CODE,
        DIVISION_CODE,
        CUSTOMER_CODE,
        CUSTOMER_NAME,
        BARCODE,
        ITEM_NAME,
        MODEL,
        ITEM_PRINTCODE,
        GROUP_CODE,
        DESCRIPTION,
        INSERT_DATETIME,
        INSERT_USER,
        PACK_QTY,
        DANPLA_QTY,
        LABEL_TYPE

    )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'ssssssssssssiis',
            $itemcode,
            $divisioncode,
            $customercode,
            $customername,
            $barcode,
            $itemname,
            $model,
            $itemprintcode,
            $groupcode,
            $description,
            $insertdatetime,
            $insertuser,
            $packqty,
            $danplaqty,
            $labeltype
        );

        if ($stmt->execute() === TRUE) {            
            echo "success";
        } else {            
            echo "Error: " . $conn->error;
        }                
        $stmt->close();
        $conn->close();
?>