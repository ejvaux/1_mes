<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

    $mcode = $_POST['mc'];

    $sql = "SELECT ITEM_NAME FROM dmc_item_list WHERE ITEM_CODE = '$mcode' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row,true);    
    
    $conn->close();

?>