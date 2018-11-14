<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$user = $_SESSION['text'];
$itemcode = $_POST['itemcode'];
$drno = $_POST['drno'];
$grno = $_POST['grno'];

$sql = "DELETE FROM mis_dr_queue WHERE 
q_dr_assigned_id IN 
(SELECT dr_assigned_id FROM mis_dr_assigned WHERE item_code = '$itemcode' AND dr_number = '$drno' AND group_name ='$grno')";

$result = $conn->query($sql);

