<?php
    // Turn off error reporting
    error_reporting(0);
    // Report runtime errors
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    /* if(!isset($_SESSION['username'])){
            
        // not logged in
        header('Location: /1_mes/');
        exit();
    } */
    $host="localhost"; // Host name 
    $username="root"; // Mysql username 
    $password=""; // Mysql password 
    $db_name="masterdatabase"; // Database name 
    $tbl_name="dmc_user_info"; // Table name 
    $conn=mysqli_connect("localhost","root","","masterdatabase");
    if (mysqli_connect_errno()){        
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // username and password sent from form 
    $myusername=$_POST['myusername']; 
    $mypassword=$_POST['mypassword'];
    $salt = "ejvaux"; 
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);    
    $mypassword = md5($salt . $mypassword);    
    $result = mysqli_query($conn,"SELECT * FROM dmc_user_info  WHERE USER_ID='$myusername' and USER_PASSWORD='$mypassword'");    
    while($row = mysqli_fetch_array($result)){        
        $user_id =  $row['USER_ID'];
        $user_password =  $row['USER_PASSWORD'];
        $user_authority =  $row['USER_AUTHORITY'];
        $user_name =  $row['USER_NAME'];
        $emailadd = $row['EMAIL_ADDRESS'];        
    }
    if ($user_id == $myusername && $user_password == $mypassword) {        
        $_SESSION['username'] = $user_id;
        /* $myusername = $_SESSION['username']; */
        $_SESSION['text'] = ucwords(strtolower($user_name));
        $_SESSION['auth'] = $user_authority;
        $_SESSION['email'] = $emailadd;
        $_SESSION['log_alert'] = "login";   
       
        echo "success";           
    }    
    else{
        echo "Wrong Username/Password or No existing account";
    } 
