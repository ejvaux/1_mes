<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname1 = "test_masterdatabase";
$dbname2 = "test_smt";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname1);
$conn2 = new mysqli($servername, $username, $password, $dbname2);
// Check connections
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
} 
if ($conn2->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
} 
else { echo "<br>";}


    ?>




    