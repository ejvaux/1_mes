<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $moldfabricationid = $_POST['moldfabricationid'];    
    $currentprocess = $_POST['currentprocess'];    
    $processdatetime = date('Y-m-d H:i:s');
    $date = date('Y-m-d');

    if($currentprocess == 'FINISHED'){

        $sql = "UPDATE  mmc_mold_fabrication SET
        
        FINISHED_DATE = '$date',
        CURRENT_PROCESS = '$currentprocess'      
        
        WHERE MOLD_FABRICATION_ID = $moldfabricationid";

    }
    else{

        $sql = "UPDATE  mmc_mold_fabrication SET
        
        `$currentprocess` = '$processdatetime',
        CURRENT_PROCESS = '$currentprocess'        
        
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