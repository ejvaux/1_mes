<?php
        $def_ID = $_POST['def_ID'];
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
        $sql = "SELECT qmd_defect_dl.*, dmc_division_code.DIVISION_NAME as DIVI_NAME
                FROM qmd_defect_dl 
                LEFT JOIN dmc_division_code ON qmd_defect_dl.DIVISION_CODE = dmc_division_code.DIVISION_CODE
                WHERE LOT_DEFECT_ID = '$def_ID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo json_encode($row,true);
        $conn->close();
    ?>

