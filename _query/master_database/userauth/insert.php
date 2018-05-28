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

    $sql = "INSERT INTO dmc_user_authority
    (           

        AUTHORITY_CODE,
        USER_AUTHORITY
    )
        VALUES (?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'ss',
            $authoritycode,
            $userauthority

        );

        if ($stmt->execute() === TRUE) {            
            echo "success";
        } else {            
            echo "Error: " . $conn->error;
        }                
        $stmt->close();
        $conn->close();
?>