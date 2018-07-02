<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $operatorname = $_POST['operatorname'];
    $insertuser = $_SESSION['text'];
    $insertdatetime = date('Y-m-d H:i:s');
  
    $sql = "INSERT INTO mmc_mold_operator
    (   
        OPERATOR_NAME,
        INSERT_USER,
        INSERT_DATETIME

    )

        VALUES (?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'sss',
            $operatorname,
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