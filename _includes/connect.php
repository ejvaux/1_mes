<?php
require $_SERVER['DOCUMENT_ROOT']. '/1_mes/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT'].'\1_mes');
$dotenv->load();
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];     
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_DATABASE'];
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>