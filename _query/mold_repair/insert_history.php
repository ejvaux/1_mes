<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $date = date('Y-m-d');
    $moldcode = $_POST['moldcode'];
    $requestdate = $_POST['requestdate'];
    $insertuser = $_SESSION['text'];
    $insertdatetime = date('Y-m-d H:i:s');
  
    $sql = "INSERT INTO mmc_mold_history
    (   
        MOLD_CODE,
        REQUEST_DATE,
        REPAIR_DATE,
        INSERT_USER,
        INSERT_DATETIME

    )

        VALUES (?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'sssss',
            $moldcode,
            $requestdate,
            $date,
            $insertuser,
            $insertdatetime

        );

        if ($stmt->execute() === TRUE) {           
            echo "success";
        } else {            
            echo "Error: " . $conn->error;
        }
                
        $stmt->close();
        $conn->close();
?>