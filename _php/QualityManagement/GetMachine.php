<?php
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $result = "SELECT MACHINE_CODE FROM qmd_danpla_tempstore"; 
        $row2 = $conn->query($result);
        $row = $row2->fetch_assoc();
        

        /* echo $sum; */

        $machine = $row;
        echo json_encode($machine,true);   
        $conn->close();
?>