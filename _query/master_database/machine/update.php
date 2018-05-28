<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $machineid = $_POST['idmachine'];
        $machinecode = $_POST['emmachinecode'];
        $machinemaker = $_POST['emmachinemaker'];
        $tonnage = $_POST['emtonnage'];
        $machinegroup = $_POST['emmachinegroup'];
        $assetnumber = $_POST['emassetnumber'];
        $updatedatetime = date('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];
  
    $sql = "UPDATE dmc_machine_list SET
        
        MACHINE_CODE = '$machinecode',
        MACHINE_MAKER = '$machinemaker',
        TONNAGE = '$tonnage',
        MACHINE_GROUP = '$machinegroup',
        ASSET_NUMBER = '$assetnumber',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

    WHERE MACHINE_ID = $machineid";   

    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>