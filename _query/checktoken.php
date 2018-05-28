<?php   
    
    session_start();

    if(!isset($_SESSION['token'])) {
        echo "nothing";
    }
    else{

        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $token = $_SESSION['token'];
        $userid = $_SESSION['username'];   

        $sql = "SELECT TOKEN FROM dmc_user_info WHERE USER_ID = '$userid'";
        $result = $conn->query($sql);  

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                $user_token =  $row['TOKEN'];
            }

            if($user_token == $token ){
                echo "success";
            }
            else{                
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

                $userid = $_SESSION['username'];
                
                $sql = "UPDATE dmc_user_info SET
                    
                    TOKEN = null

                WHERE USER_ID = '$userid'";   

                $conn->query($sql);                     

                // remove all session variables
                session_unset(); 
                // destroy the session 
                session_destroy();

                echo "failed";
                /* echo $token;
                echo " ---- ";
                echo $user_token; */

            }

        } else {
            echo "0 results";
        }

        $conn->close();
    }
?>