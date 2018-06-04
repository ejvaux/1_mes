<?php

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
        $lotNumber = $_POST['lotNumber'];
        $sql = "SELECT LOT_QTY,PROD_DATE FROM qmd_lot_create WHERE LOT_NUMBER ='$lotNumber'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo json_encode($row,true);
        $conn->close();

?>