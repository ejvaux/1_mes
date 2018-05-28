<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $no = $_POST['iduserinfo'];
        $userid = $_POST['euuserid'];
        $username = $_POST['euusername'];
        $emailaddress = $_POST['euemailaddress'];
        $userauthority = $_POST['euuserauthority'];
        $updatedatetime = Date('Y-m-d H:i:s');
        $updateuser = $_SESSION['text'];
        $userpassword = '228487974466a761f027a67fb52b6e58';
        $condition = $_POST['euuserpassword'];

    if($condition == 'def'){
        $sql = "UPDATE dmc_user_info SET
        
        USER_ID = '$userid',
        USER_NAME = '$username',
        EMAIL_ADDRESS = '$emailaddress',
        USER_AUTHORITY = '$userauthority',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser',
        USER_PASSWORD = '$userpassword'

        WHERE NO = $no";
    }
    else if($condition == 'exst'){
        $sql = "UPDATE dmc_user_info SET
        
        USER_ID = '$userid',
        USER_NAME = '$username',
        EMAIL_ADDRESS = '$emailaddress',
        USER_AUTHORITY = '$userauthority',
        UPDATE_DATETIME = '$updatedatetime',
        UPDATE_USER = '$updateuser'

        WHERE NO = $no";
    }
    else{
        echo "Invalid Password";
    } 
       
    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } else {        
        echo "Error updating record: " . $sql . "<br>" . $conn->error;        
    }

    $conn->close();
?>