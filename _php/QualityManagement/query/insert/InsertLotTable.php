<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
    $lot_creator = $_SESSION['text'];
    $joborder = $_POST['jo_num'];

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    $sql = "SELECT qmd_danpla_tempstore.TEMP_ID as TEMP,
            qmd_danpla_tempstore.DANPLA_SERIAL as DANPLA,
            qmd_danpla_tempstore.JO_NUM as JOBORDER,
            qmd_danpla_tempstore.ITEM_CODE as ITEMCODE,
            qmd_danpla_tempstore.ITEM_NAME as ITEMNAME,
            qmd_danpla_tempstore.MACHINE_CODE as MACHINECODE,
            qmd_danpla_tempstore.LOT_JUDGEMENT AS LOTJUDGEMENT,
            qmd_danpla_tempstore.INSERT_USER AS USER,
            qmd_danpla_tempstore.INSERT_DATETIME AS DATIME,
            SUM(qmd_danpla_tempstore.QUANTITY) as SUMQ,
            mis_prod_plan_dl.TO_WAREHOUSE as WAREHOUSE
            FROM qmd_danpla_tempstore
            LEFT join mis_prod_plan_dl 
            ON qmd_danpla_tempstore.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
            WHERE qmd_danpla_tempstore.JO_NUM = '$joborder'
            AND qmd_danpla_tempstore.INSERT_USER = '$lot_creator'";


    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

            $prod_date =  Date('Y-m-d H:i:s');
            $lot_num = $_POST['lot_number'];
            $count = $_POST['row_count'];

            $danpla = $row['DANPLA'];
            $jo_num = $row['JOBORDER'];
            $item_code = $row['ITEMCODE'];
            $item_name = $row['ITEMNAME'];
            $machine_code = $row['MACHINECODE'];
            $lot_quantity = $row['SUMQ'];
            $warehouse = $row['WAREHOUSE'];
    
    $conn->close();

    /* echo "$prod_date, 
          $lot_num, 
          $jo_num,
          $lot_quantity, 
          $lot_creator,
          $item_code, 
          $item_name,
          $machine_code,
          $warehouse"; */

include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    for ($x = 0; $x < $count-1; $x++){
    
    $sql = "UPDATE mis_product SET LOT_NUM = '$lot_num',SHIP_STATUS='PENDING' WHERE PACKING_NUMBER IN (SELECT DANPLA_SERIAL FROM qmd_danpla_tempstore WHERE INSERT_USER = '$lot_creator' AND JO_NUM = '$joborder')";
    }
    $conn->query($sql);
    $conn->close();
    
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    
    $sql = "INSERT INTO qmd_lot_create
    (   
        PROD_DATE,
        LOT_NUMBER,
        JO_NUM,
        LOT_QTY,
        LOT_CREATOR,
        ITEM_CODE,
        ITEM_NAME,
        MACHINE_CODE,
        TO_WAREHOUSE
    )
        VALUES (?,?,?,?,?,?,?,?,?)";    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            'sssisssss',
            $prod_date,
            $lot_num,
            $jo_num,
            $lot_quantity,
            $lot_creator,
            $item_code,
            $item_name,
            $machine_code,
            $warehouse
            );
        if ($stmt->execute() === TRUE) {
            echo "Record saved successfully"; 
                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";   
                    $sql = "DELETE FROM qmd_danpla_tempstore WHERE INSERT_USER = '$lot_creator' AND JO_NUM = '$joborder' ";
                    $conn->query($sql);
                    $stmt->close();
                    $conn->close();
                    exit;
            }
        else {
            //echo "Error: " . $stmt . "<br>" . $conn->error; 
            $stmt->close();
            $conn->close();
        }
        
        /* else {
             echo "Error: " . $sql . "<br>" . $conn->error; 
        } */

        /* if ($conn->query($sql) === TRUE) {
            echo "<script> alert('Record updated successfully'); window.location.href = '/1_mes/_php/mold_maintenance.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } */
        
                
        
        

        /* include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
        $sql = "DELETE FROM qmd_danpla_tempstore";
        $conn->query($sql);
        $conn->close(); */

 
?>
