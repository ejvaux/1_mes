<?php
   /*  _________ DEFECT _____________  */
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    
    $defectcode = $_POST['defectcode'];
    $divisioncode = $_POST['divisioncode'];
    $defectgroup = $_POST['defectgroup'];
    $defectname = $_POST['defectname'];
    $insertdatetime = Date('Y-m-d H:i:s');
    $insertuser = $_SESSION['text'];

    $sql = "INSERT INTO dmc_defect_code
    (           

        DEFECT_CODE,
        DIVISION_CODE,
        DEFECT_GROUP,
        DEFECT_NAME,
        INSERT_DATETIME,
        INSERT_USER

    )
        VALUES (?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'ssssss',
            $defectcode,
            $divisioncode,
            $defectgroup,
            $defectname,
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