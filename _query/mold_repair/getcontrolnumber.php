<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
   
    $sql = "SELECT MOLD_REPAIR_CONTROL_NO FROM mmc_mold_repair ORDER BY MOLD_REPAIR_CONTROL_NO DESC LIMIT 1 ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(isset($row)){
        echo json_encode($row,true); 
    }
    else{
        echo "none";
    }
       
    
    $conn->close();

?>