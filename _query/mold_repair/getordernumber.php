<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
   
    $sql = "SELECT ORDER_NO FROM mmc_mold_fabrication ORDER BY ORDER_NO DESC LIMIT 1 ";
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