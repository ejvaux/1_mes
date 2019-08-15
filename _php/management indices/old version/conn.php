<?php
$servername = "localhost";
$username = "root1";
$password = "0000";
$dbname = "masterdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else { echo "<br>";}
    ?>


    