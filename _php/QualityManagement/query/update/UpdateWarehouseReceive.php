<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
$lot_num = $_POST['lot_num'];
$lot_creator = $_SESSION['text'];
$warehouse = $_POST['warehouse'];
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $sql = "UPDATE qmd_lot_create SET TO_WAREHOUSE = '$warehouse', WAREHOUSE_RECEIVE = 'RECEIVED' WHERE LOT_NUMBER ='$lot_num'";
    if($conn->query($sql) === TRUE) {
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
                $sql1 = "DELETE FROM qmd_item_tempstore WHERE INSERT_USER = '$lot_creator'";
                if($conn->query($sql1) === TRUE){
                    $conn->close();
                    echo "SUCCESS";
                }
                else{
                    echo "Error updating record: " . $sql1 . "<br>" . $conn->error;       
                    $conn->close();   
                }
                
    }
    else{
        echo "Error updating record: " . $sql . "<br>" . $conn->error;       
        $conn->close();   
    }
    
?>