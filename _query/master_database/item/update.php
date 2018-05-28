<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $itemid = $_POST['iditem'];
        $itemcode = $_POST['eiitemcode'];
        $divisioncode = $_POST['eidivisioncode'];
        $customercode = $_POST['eicustomercode'];
        $customername = $_POST['eicustomername'];
        $barcode = $_POST['eibarcode'];
        $itemname = $_POST['eiitemname'];
        $model = $_POST['eimodel'];
        $itemprintcode = $_POST['eiitemprintcode'];
        $groupcode = $_POST['eigroupcode'];
        $description = $_POST['eidescription'];
        $updatedatetime = Date('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];
  
    $sql = "UPDATE dmc_item_list SET
        
        ITEM_CODE = '$itemcode',
        DIVISION_CODE = '$divisioncode',
        CUSTOMER_CODE = '$customercode',
        CUSTOMER_NAME = '$customername',
        BARCODE = '$barcode',
        ITEM_NAME = '$itemname',
        MODEL = '$model',
        ITEM_PRINTCODE = '$itemprintcode',
        GROUP_CODE = '$groupcode',
        DESCRIPTION = '$description',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

    WHERE ITEM_ID = $itemid";   

    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>