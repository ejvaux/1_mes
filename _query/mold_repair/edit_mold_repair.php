<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

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
    $moldstatus = $_POST['moldstatus'];
  
    $sql = "UPDATE mmc_mold_repair SET
        
        MOLD_CODE = '$moldcode',
        TOOL_NUMBER = '$toolnumber',
        ITEM_NAME = '$itemname',
        ITEM_CODE = '$itemcode',
        CUSTOMER_NAME = '$customername', 
        MACHINE_CODE = '$machinecode',
        DATE_REQUIRED = '$daterequired',
        TIME_REQUIRED = '$timerequired',
        DEFECT_NAME = '$defectname',
        MOLD_STATUS = '$moldstatus'
    WHERE MOLD_REPAIR_CONTROL_NO = $repaircontrol";

    /* $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id='$repaircontrol'"; */  

    if ($conn->query($sql) === TRUE) {
        /* echo "<script> alert('Record updated successfully'); window.location.href = '/1_mes/_php/mold_maintenance/mold_maintenance.php'</script>"; */
        echo "success";
    } else {
        /* echo "<script> alert('Error updating record: " . $sql . "<br>" . $conn->error ."'); window.location.href = '/1_mes/_php/mold_maintenance/mold_maintenance.php'</script>"; */
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>