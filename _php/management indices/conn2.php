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
<!-- 
	BARCODE DATA AND DANPLA BARCODE
   		 AA16 = Barcode
   		 191209 = Date
   		 D = Day shift
   		 T or D or P = Per Tray, or Danpla, or Polybag
   		 0001 = Count Number/Peices


   	LOT NUMBER
   	191209 = Date
   	L02 = MOLD/MACHINE NO.
-->