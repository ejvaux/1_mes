<?php
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $result = "SELECT SUM(QUANTITY) AS total_qty FROM qmd_danpla_tempstore"; 
        $row2 = $conn->query($result);
        $row = $row2->fetch_assoc();
        $sum = $row['total_qty'];

        /* echo $sum; */

        $int = (int)$sum;
        echo json_encode($int,true);   
        $conn->close();
?>