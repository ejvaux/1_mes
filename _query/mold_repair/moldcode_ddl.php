<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

    $mcode = $_POST['mc'];

    $sql = "SELECT TOOL_NUMBER, ITEM_NAME, 	ITEM_CODE, CUSTOMER_NAME FROM dmc_mold_list WHERE MOLD_CODE = '$mcode' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row,true);    
    
    $conn->close();

?>