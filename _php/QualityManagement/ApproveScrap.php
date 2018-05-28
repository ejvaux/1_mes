<?php

session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    $scrapDate = Date('Y-m-d H:i:s');
    $lot = $_POST['lot_number'];
    $user = $_SESSION['text'];
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    $sql = "SELECT LOT_QTY FROM qmd_lot_create WHERE LOT_NUMBER = '$lot'";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
                    $lotqty = $row['LOT_QTY'];
            
                        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
                        $sql1 ="UPDATE qmd_defect_dl SET DEF_QUANTITY = $lotqty, UPDATE_USER = '$user', UPDATE_DATETIME = '$scrapDate', REJECTION_REMARKS = 'DEFECT'
                                    WHERE LOT_NUMBER = '$lot'";
                        if($conn->query($sql1) === TRUE) {    
                            echo "SUCCESS";
                            }
                        else{
                            echo "Error updating record: " . $sql2 . "<br>" . $conn->error;    
                            exit;
                            }
            }
        $conn->close();


include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

        $sql2 = "UPDATE qmd_lot_create SET DEFECT_QTY = $lotqty, JUDGE_BY = '$user', JUDGEMENT_DATE='$scrapDate' WHERE LOT_NUMBER = '$lot'";
        if($conn->query($sql2) === TRUE) {
            echo "SUCCESS";
            }
        else{
            echo "Error updating record: " . $sql2 . "<br>" . $conn->error;    
            exit;
            }
            $conn->close();  
?>