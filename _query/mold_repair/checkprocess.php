<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

    $rowid = $_POST["moldfabricationid"];
    $currentprocess = $_POST['currentprocess'];
   
    $sql = "SELECT * FROM mmc_mold_fabrication WHERE MOLD_FABRICATION_ID = $rowid ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row,true);    
    
    $conn->close();

?>