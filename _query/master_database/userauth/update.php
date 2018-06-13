<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $idauth = $_POST['iduserauth'];
        $authoritycode = $_POST['eaauthoritycode'];
        $userauthority = $_POST['eauserauthority'];
        $updatedatetime = Date('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];

    
    $sql = "UPDATE dmc_user_authority SET

        AUTHORITY_CODE = '$authoritycode',
        USER_AUTHORITY = '$userauthority',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

    WHERE AUTHORITY_ID = $idauth";  
       
    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>