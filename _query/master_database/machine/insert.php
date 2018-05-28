<?php
   /*  _________ MACHINE _____________  */
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    
        $machinecode = $_POST['machinecode'];
        $machinemaker = $_POST['machinemaker'];
        $tonnage = $_POST['tonnage'];
        $machinegroup = $_POST['machinegroup'];
        $assetnumber = $_POST['assetnumber'];
        $insertdatetime = date('Y-m-d H:i:s');
        $insertuser = $_SESSION['text'];

    $sql = "INSERT INTO dmc_machine_list
    (           

        MACHINE_CODE,
        MACHINE_MAKER,
        TONNAGE,
        MACHINE_GROUP,
        ASSET_NUMBER,
        INSERT_DATETIME,
        INSERT_USER

    )
        VALUES (?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'sssssss',
            $machinecode,
            $machinemaker,
            $tonnage,
            $machinegroup,
            $assetnumber,
            $insertdatetime,
            $insertuser

        );

        if ($stmt->execute() === TRUE) {            
            echo "success";
        } else {            
            echo "Error: " . $conn->error;
        }                
        $stmt->close();
        $conn->close();
?>