<?php
   /*  _________ DIVISION CODE _____________  */
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    
    $divisioncode = $_POST['divisioncode'];
    $divisionname = $_POST['divisionname'];
    $sapcode = $_POST['sapcode'];
    $insertdatetime = DATE('Y-m-d H:i:s');
    $insertuser = $_SESSION['text'];

    $sql = "INSERT INTO dmc_division_code
    (           

        DIVISION_CODE,
        DIVISION_NAME,
        SAP_DIVISION_CODE,
        INSERT_DATETIME,
        INSERT_USER

    )
        VALUES (?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'ssiss',
            $divisioncode,
            $divisionname,
            $sapcode,
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