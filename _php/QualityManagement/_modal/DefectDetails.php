<?php
    $jobOrder = $_POST['jobOrder'];
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
        $subJO = substr($jobOrder,0,1);
        $sql = "SELECT mis_prod_plan_dl.ITEM_CODE as ITEMCODE,mis_prod_plan_dl.ITEM_NAME as ITEMNAME,
                    (SELECT dmc_division_code.DIVISION_CODE WHERE dmc_division_code.SAP_DIVISION_CODE = $subJO) as DIVI_CODE,
                    (SELECT dmc_division_code.DIVISION_NAME WHERE dmc_division_code.SAP_DIVISION_CODE = $subJO) as DIVI_NAME
                    FROM `mis_prod_plan_dl` LEFT JOIN dmc_division_code ON (SUBSTR(mis_prod_plan_dl.JOB_ORDER_NO,1,1)) = dmc_division_code.SAP_DIVISION_CODE
                    WHERE mis_prod_plan_dl.JOB_ORDER_NO = '$jobOrder'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo json_encode($row,true);
        $conn->close();
    ?>

