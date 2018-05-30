<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";


    $sql = "SELECT *,SUM(QUANTITY) as SUMQ FROM qmd_danpla_tempstore";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

            $count = $_POST['row_count'];
            $danpla = $row['DANPLA_SERIAL'];
            $jo_num = $row['JO_NUM'];
            $item_code = $row['ITEM_CODE'];
            $item_name = $row['ITEM_NAME'];
            $machine_code = $row['MACHINE_CODE'];
            $prod_date =  Date('Y-m-d H:i:s');
            $lot_num = $_POST['lot_number'];
            $lot_quantity = $row['SUMQ'];
            $lot_creator = $_SESSION['text'];
            $lot_num = $_POST['lot_number'];
    
    $conn->close();

include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    for ($x = 0; $x < $count-1; $x++){
    $sql = "UPDATE mis_product SET LOT_NUM = '$lot_num' WHERE PACKING_NUMBER IN (SELECT DANPLA_SERIAL FROM qmd_danpla_tempstore)";
    }
    $conn->query($sql);
    $conn->close();
    
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    echo "$prod_date, $lot_num, $jo_num,
            $lot_quantity, $lot_creator,
            $item_code, $item_name,
            $machine_code";

    $sql = "INSERT INTO qmd_lot_create
    (   
        PROD_DATE,
        LOT_NUMBER,
        JO_NUM,
        LOT_QTY,
        LOT_CREATOR,
        ITEM_CODE,
        ITEM_NAME,
        MACHINE_CODE
    )
        VALUES (?,?,?,?,?,?,?,?)";    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            'sssissss',
            $prod_date,
            $lot_num,
            $jo_num,
            $lot_quantity,
            $lot_creator,
            $item_code,
            $item_name,
            $machine_code
            );
        if ($stmt->execute() === TRUE) {
            echo "Record saved successfully"; 
                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";   
                    $sql = "DELETE FROM qmd_danpla_tempstore";
                    $conn->query($sql);
                    $stmt->close();
                    $conn->close();
                    exit;
            } 
        else {
            echo "Error: " . $stmt . "<br>" . $conn->error; 
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
