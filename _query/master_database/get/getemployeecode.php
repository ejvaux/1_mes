<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
   
    $sql = "SELECT EMPLOYEE_CODE FROM dmc_employee ORDER BY EMPLOYEE_CODE DESC LIMIT 1 ";
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