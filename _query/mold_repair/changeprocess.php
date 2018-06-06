<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $moldfabricationid = $_POST['moldfabricationid'];
    $prevprocess = $_POST['prevprocess'];
    $prevprocessdatetime =$_POST['prevprocessdatetime'];  
    $nextprocess = $_POST['nextprocess'];    
    $nextprocessdatetime = date('Y-m-d H:i:s');
    $date = date('Y-m-d');
    $updateuser = $_SESSION['text'];
    $updatedatetime = date('Y-m-d H:i:s');

    $date1 = strtotime($prevprocessdatetime);
    $date2 = strtotime($nextprocessdatetime);

    $date3 = $date2 - $date1;
    

    function secondsToTime($seconds) {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%a day, %h hr, %i min');
    }

    $date3 = secondsToTime($date3);
    $date3 = "( " . $date3 . " )";

    if($nextprocess == 'FINISHED'){

        $sql = "UPDATE  mmc_mold_fabrication SET
        
        `$prevprocess` = '$date3',
        FINISHED_DATE = '$date',
        CURRENT_PROCESS = '$nextprocess',
        UPDATE_USER = '$updateuser',
        UPDATE_DATETIME = '$updatedatetime'      
        
        WHERE MOLD_FABRICATION_ID = $moldfabricationid";

    }
    else{

        $sql = "UPDATE  mmc_mold_fabrication SET
        
        `$nextprocess` = '$nextprocessdatetime',
        `$prevprocess` = '$date3',
        CURRENT_PROCESS = '$nextprocess',
        UPDATE_USER = '$updateuser',
        UPDATE_DATETIME = '$updatedatetime'        
        
        WHERE MOLD_FABRICATION_ID = $moldfabricationid";

    }         

    if ($conn->query($sql) === TRUE) {        
        echo "success";
    } 
    else {        
        echo "Error updating record: " . $conn->error;        
    }
    
    $conn->close();
?>