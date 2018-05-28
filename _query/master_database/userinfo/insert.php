<?php
   /*  _________ USER INFO _____________  */
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }   
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $emailaddress = $_POST['emailaddress'];
    $userauthority = $_POST['userauthority'];
    $insertdatetime = Date('Y-m-d H:i:s');
    $insertuser = $_SESSION['text'];
    $userpassword = '228487974466a761f027a67fb52b6e58';

    $sql = "INSERT INTO dmc_user_info
    (           

        USER_ID,
        USER_NAME,
        EMAIL_ADDRESS,
        USER_AUTHORITY,
        INSERT_DATETIME,
        INSERT_USER,
        USER_PASSWORD

    )
        VALUES (?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'sssssss',
            $userid,
            $username,
            $emailaddress,
            $userauthority,
            $insertdatetime,
            $insertuser,
            $userpassword

        );

        if ($stmt->execute() === TRUE) {            
            echo "success";
        } else {            
            echo "Error: " . $conn->error;
        }                
        $stmt->close();
        $conn->close();
?>