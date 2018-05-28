<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    

    $prod_date = Date('Y-m-d H:i:s');
    $defqty = $_POST['defect_qty'];
    $lot = $_POST['lot_number'];
    $remarks = $_POST['remarks'];
    $insertUser = $_SESSION['text'];
    
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    $sql = "SELECT qmd_lot_create.LOT_NUMBER, qmd_lot_rework.REWORK_ID, qmd_lot_create.LOT_QTY 
            FROM qmd_lot_create LEFT JOIN qmd_lot_rework ON qmd_lot_rework.LOT_NUMBER = qmd_lot_create.LOT_NUMBER
            WHERE qmd_lot_create.LOT_NUMBER = '$lot' 
            ORDER BY qmd_lot_rework.REWORK_ID DESC LIMIT 1"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $lotqty = $row['LOT_QTY'];

    $reworkID = $row['REWORK_ID'];

    if ($reworkID > 0){
        $reworkID = $row['REWORK_ID'] + 1;
    }
    else {
        $reworkID = '1';
    }
    
    $conn->close();
    
    
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    /* echo "$prod_date
            $lot
            $reworkID
            $lotqty
            $defqty
            $remarks
            $insertUser"; */

    $sql1 = "INSERT INTO qmd_lot_rework
    (   
        PROD_DATE,
        LOT_NUMBER,
        REWORK_ID,
        LOT_QTY,
        DEFECT_QTY,
        REMARKS,
        JUDGE_BY
    )

        VALUES (?,?,?,?,?,?,?)";
            
        $stmt = $conn->prepare($sql1);

        $stmt->bind_param(

            'ssiiiss',
            $prod_date,
            $lot,
            $reworkID,
            $lotqty,
            $defqty,
            $remarks,
            $insertUser
            );
      
        if ($stmt->execute() === TRUE) {
           
            
        }
        else{
            
        }
        $stmt->close();
        $conn->close();
?>

