<?php
            

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

    $mcode = $_POST['mc'];

    $sql = "SELECT * FROM dmc_item_mold_matching WHERE ITEM_CODE = '$mcode' ";
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