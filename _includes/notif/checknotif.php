<?php

include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";     
   
$sql = "SELECT `notif_message` FROM r_notification LIMIT 1 ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo json_encode($row,true);    

$conn->close();

?>