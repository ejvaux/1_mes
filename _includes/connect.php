<?php
/* error_reporting(E_NOTICE ); */

set_error_handler(function($errno, $errstr, $errfile, $errline ){
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});

$servername = "localhost";
$username = "root";     
$password = "";
$dbname = "masterdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
/* if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  */

?>