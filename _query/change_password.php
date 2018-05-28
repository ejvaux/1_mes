<?php

    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    
    // username and password sent from form 
    $salt = "ejvaux";
    $myusername = $_SESSION['username'];
    $myusername = stripslashes($myusername); 
    $cpw = $_POST['currentpw'];
    $npw  = $_POST['newpw'];
    $rnpw = $_POST['rtnewpw'];

    $cpw = stripslashes($cpw);
    $npw  = stripslashes($npw);
    $rnpw = stripslashes($rnpw);
    $cpw =  md5($salt . $cpw); 

    $sql = "SELECT * FROM dmc_user_info  WHERE USER_ID='$myusername'";
    $result = $conn->query($sql);
        
    while($row = mysqli_fetch_array($result)){
        
        $user_id =  $row['USER_ID'] ;
        $user_password =  $row['USER_PASSWORD'] ;
        $num = $row['NO'] ;
    }

    if($user_password == $cpw){
        /* echo "<script> alert('Match')</script>"; */
        if ($npw == $rnpw) {

            $np = md5($salt . $npw);

            $sql = "UPDATE dmc_user_info SET USER_PASSWORD = '$np' WHERE NO ='$num'";
        
            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Record updated successfully'); window.location.href = '/1_MES/';</script>";
                /* header("Location: /1_MES/"); */
                
            } else {
                echo "<script> alert('Error updating record: '); window.location.href = '/1_mes/_php/change_pass.php'</script>". mysqli_error($conn);
            }
        
        }

        else{
            echo "<script> alert('New Password and Retyped Password did not match'); window.location.href = '/1_mes/_php/change_pass.php'</script>";
        }

    }   
    
        else{
                
        echo "<script> alert('Password did not match.'); window.location.href = '/1_mes/_php/change_pass.php'</script>";
        /* echo "<script></script>"; */           
                
        }

                

        $conn->close();
?>