<?php
        $def_ID = $_POST['def_ID'];
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
        $sql = "SELECT * FROM qmd_defect_dl WHERE LOT_DEFECT_ID = '$def_ID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo json_encode($row,true);
        $conn->close();
    ?>

