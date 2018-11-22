<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    
$lot = $_POST['lot'];
$item = $_POST['item'];
$decision = $_POST['decision'];

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
    $sql = "UPDATE mis_product SET SHIP_STATUS='$decision' WHERE LOT_NUM ='$lot' AND ITEM_CODE = '$item'";
        if($conn->query($sql) === TRUE) {
                echo "SUCCESS";
                } 
            else{
                echo "Error updating record: " . $sql . "<br>" . $conn->error;        
                }
        $conn->close();
    
?>