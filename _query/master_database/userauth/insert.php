<?php
   /*  _________ USER AUTH _____________  */
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    
        $authoritycode = $_POST['authoritycode'];
        $userauthority = $_POST['userauthority'];
        $insertdatetime = Date('Y-m-d H:i:s');
        $insertuser = $_SESSION['text'];

    $sql = "INSERT INTO dmc_user_authority
    (           

        AUTHORITY_CODE,
        USER_AUTHORITY,
        INSERT_DATETIME,
        INSERT_USER
    )
        VALUES (?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'ssss',
            $authoritycode,
            $userauthority,
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