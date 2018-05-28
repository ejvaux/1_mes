<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

    $rowid = $_POST["id"];
   
    $sql = "SELECT * FROM mmc_mold_repair WHERE MOLD_REPAIR_CONTROL_NO ='$rowid' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row,true);    
    
    $conn->close();

?>