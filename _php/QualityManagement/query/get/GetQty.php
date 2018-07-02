<?php 

$lot = $_POST['lot_number'];
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    $sql = "SELECT LOT_QTY 
            FROM qmd_lot_create 
            WHERE LOT_NUMBER = '$lot' "; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $lotqty = $row['LOT_QTY'];
    echo $lotqty;
    $conn->close();


?>