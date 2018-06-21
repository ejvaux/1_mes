<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

    $rowid = $_POST["id"];
   
    $sql = "SELECT * FROM dmc_mold_list WHERE MOLD_ID ='$rowid' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row,true);    
    
    $conn->close();

?>