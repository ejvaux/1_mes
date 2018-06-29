<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $moldid = $_POST['idmoldlist'];
    $moldcode = $_POST['emoldcode'];
    $toolnumber = $_POST['etoolnumber'];
    $itemcode = $_POST['eitemcode'];
    $itemname = $_POST['eitemname'];
    $customercode = $_POST['ecustomercode'];
    $customername = $_POST['ecustomername'];
    $approvaldate = $_POST['eapprovaldate'];
    $drawingrevision = $_POST['edrawingrevision'];
    $guaranteeshot = $_POST['eguaranteeshot'];
    $moldshot = $_POST['emoldshot'];
    $cavity = $_POST['ecavity'];
    $moldremarks = $_POST['emoldremarks'];
    $assetnumber = $_POST['eassetnumber'];
    $transferdate = $_POST['etransferdate'];
    $updatedatetime = date('Y-m-d H:i:s');
    $updateuser = $_SESSION['text'];
    $moldmodel = $_POST['moldmodel'];
    $moldmaker = $_POST['moldmaker'];
    $moldcategory = $_POST['moldcategory'];
  
    $sql = "UPDATE dmc_mold_list SET
        
        MOLD_CODE = '$moldcode',	
        TOOL_NUMBER = '$toolnumber',	
        ITEM_CODE = '$itemcode',		
        ITEM_NAME = '$itemname',		
        CUSTOMER_CODE = '$customercode',	
        CUSTOMER_NAME = '$customername',	
        APPROVAL_DATE = '$approvaldate',	
        DRAWING_REVISION = '$drawingrevision',
        GUARANTEE_SHOT = '$guaranteeshot',
        MOLD_SHOT = '$moldshot',
        CAVITY = '$cavity',		
        MOLD_REMARKS = '$moldremarks',	
        ASSET_NUMBER = '$assetnumber',	
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser',		
        TRANSFER_DATE = '$transferdate',
        MOLD_MODEL = '$moldmodel',
        MOLD_MAKER = '$moldmaker',
        MOLD_CATEGORY = '$moldcategory'

    WHERE MOLD_ID = $moldid";   

    if ($conn->query($sql) === TRUE) {
        
        echo "success";
    } else {
        
        echo "Error updating record: " . $conn->error;        
    }

    $conn->close();
?>