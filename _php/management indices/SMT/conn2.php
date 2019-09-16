<?php
$servername = "172.16.1.13";
$username = "root1";
$password = "0000";
$dbname1 = "masterdatabase";
$dbname2 = "1_smt";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname1);
$conn2 = new mysqli($servername, $username, $password, $dbname2);


// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $masterdatabase->connect_error);
} 
if ($conn2->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
} 
else { echo "<br>";}
    ?>