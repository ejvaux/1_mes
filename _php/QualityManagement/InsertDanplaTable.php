<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $jo_barcode = $_POST['jo_barcode'];
    $jo_num = $_POST['jo_num'];
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $print_qty = $_POST['print_qty'];
    $machine_code = $_POST['machine_code'];
    $insertUser = $_SESSION['text'];
    $insert_datetime = Date('Y-m-d H:i:s');

    $sql = "INSERT INTO qmd_danpla_tempstore
    (   
        DANPLA_SERIAL,
        JO_NUM,
        ITEM_CODE,
        ITEM_NAME,
        QUANTITY,
        MACHINE_CODE,
        INSERT_USER,
        INSERT_DATETIME

    )

        VALUES (?,?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            'ssssisss',
            $jo_barcode,
            $jo_num,
            $item_code,
            $item_name,
            $print_qty,
            $machine_code,
            $insertUser,
            $insert_datetime
        );
        
        if ($stmt->execute() === TRUE) {
             echo "Record saved successfully"; 
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error; 
        }

        /* if ($conn->query($sql) === TRUE) {
            echo "<script> alert('Record updated successfully'); window.location.href = '/1_mes/_php/mold_maintenance.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } */

                
        $stmt->close();
        $conn->close();

?>