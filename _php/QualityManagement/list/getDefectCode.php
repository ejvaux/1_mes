<?php

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
        $defectName = $_POST['defectName'];
        $sql = "SELECT DEFECT_CODE FROM dmc_defect_code WHERE DEFECT_NAME ='$defectName'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo json_encode($row,true);
        $conn->close();

?>