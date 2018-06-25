<?php

$servername = "localhost";
$username = "root";     
$password = "";
$dbname = "masterdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL sel_mold_itemcode()";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()){   
    $json[] = $row;
}

$conn->close();

$json = json_encode($json);
$json = json_decode($json);

/* foreach($json as $obj) {
    echo $obj->ITEM_CODE . "\n";
  } */

  foreach($json as $obj) {
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $query = $conn->query("CALL get_mold_status('" . $obj->ITEM_CODE . "',@moldshot,@itemcode);");
    $result = $conn->query('SELECT @itemcode as `ITEM_CODE`, @moldshot as `MOLD_SHOT`') or die($conn->error);
    $row = $result->fetch_assoc();
    $moldshot[] = $row;
    /* echo json_encode($row1) . "\n"; */
    /* echo $row1[$obj->ITEM_CODE ] . "\n"; */

    $conn->close();
  }
    $moldshot = json_encode($moldshot);
    $moldshot = json_decode($moldshot);
    
    foreach($moldshot as $obj){
        /* echo $obj->ITEM_CODE . " " . $obj->MOLD_SHOT . "\n"; */

        $conn = new mysqli($servername, $username, $password,$dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        /* $sql1 = "CALL update_mold_status('" . $obj->ITEM_CODE . "',10);"; */
        $result = $conn->query("CALL update_mold_status('PMXF0012ZA-B','90')") or die($conn->error);
        $row1 = $result->fetch_assoc() or die($conn->error);
        
        /* if($row = $result->fetch_assoc()){
            echo "Success";
        }
        else{
            echo "Failed";
        } */
    }

?>