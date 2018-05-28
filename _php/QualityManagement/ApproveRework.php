<?php

session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    $insertUser = $_SESSION['text'];
    $prod_date = Date('Y-m-d H:i:s');
    $lot = $_POST['lot_number'];
    
//select
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
        $sql = "SELECT qmd_lot_create.LOT_NUMBER, qmd_lot_rework.REWORK_ID, qmd_lot_create.LOT_QTY, qmd_lot_create.DEFECT_QTY,qmd_lot_create.REMARKS
                FROM qmd_lot_create LEFT JOIN qmd_lot_rework ON qmd_lot_rework.LOT_NUMBER = qmd_lot_create.LOT_NUMBER
                WHERE qmd_lot_create.LOT_NUMBER = '$lot' 
                ORDER BY qmd_lot_rework.REWORK_ID DESC LIMIT 1"; 
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $lotqty = $row['LOT_QTY'];
        $defqty = $row['DEFECT_QTY'];
        $reworkID = $row['REWORK_ID'];
        $remarks = $row['REMARKS'];
        if ($reworkID > 0){
            $reworkID = $row['REWORK_ID'] + 1;
        }
        else {
            $reworkID = '1';
        }
        
        $conn->close();

//insert
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
        /*      $prod_date,
                $lot,
                $reworkID,
                $lotqty,
                $defqty,
                $remarks,
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



//Update lot_create
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $user = $_SESSION['text'];
        $lot = $_POST['lot_number'];
        $sql = "UPDATE qmd_lot_create SET LOT_JUDGEMENT = 'PENDING' WHERE LOT_NUMBER = '$lot'";
        if($conn->query($sql) === TRUE) {
            echo "LOT RECOVERED!";

            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
                        $sql = "DELETE FROM qmd_defect_dl WHERE LOT_NUMBER = '$lot'";
                        $conn->query($sql);
                $conn->close();
                exit;
            } 
        else{
            
            echo "Error updating record: " . $sql . "<br>" . $conn->error;        
            }

    
    $conn->close();




?>