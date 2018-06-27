<?php
error_reporting(0);
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
$myfile = fopen("moldshot_update.log", "a") or die("Unable to open file!");

echo $txt = "\n\n#### " . Date('Y-m-d H:i') . " ####\n\n";
fwrite($myfile, $txt);

echo $txt = "PROCESS START\n\n";
sleep(2);
echo $txt = "Retrieving item codes in mold list.\n\n";
sleep(2);

$sql = "CALL sel_mold_itemcode()";
$result = $conn->query($sql);
$nm = 0;
while ($row = $result->fetch_assoc()){    
    
    if($row['ITEM_CODE']==null){             
        $nm++;        
    }
    else{
        $json[] = $row;
    } 
    
    $msg = "Checking " . $obj->MOLD_CODE . "...";
    echo str_pad($msg, 60) . "\r";
}

$conn->close();

$txt = $nm . " mold/s - No Item Code.\n\n";
echo str_pad($txt, 30) . "\r";
fwrite($myfile, $txt);
sleep(2);

echo $txt = "Checking and Calculating mold shots.\n\n";
sleep(2);

$json = json_encode($json);
$json = json_decode($json);

  foreach($json as $obj) {
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $query = $conn->query("CALL get_mold_shot('" . $obj->ITEM_CODE . "',@moldshot,@itemcode,@moldcode);");
    $result = $conn->query('SELECT @moldcode as `MOLD_CODE`, @itemcode as `ITEM_CODE`, @moldshot as `MOLD_SHOT`') or die($conn->error);
    $row = $result->fetch_assoc();
    $moldshot[] = $row;
  }
    $conn->close();



    echo $txt = "DONE!\n\n";
    sleep(2);    
 
    $moldshot = json_encode($moldshot);
    $moldshot = json_decode($moldshot);

    echo "Updating mold shots.\n\n";
    $txt = "Mold shot update.\n\n";
    fwrite($myfile, $txt);
    sleep(2);

    $count = 0;
    $count2 = 0;
    $len = count($moldshot);
    $counter = 100 / $len;

    foreach($moldshot as $obj){

        $count = $count + $counter;
        if($count>100){
            $count = 100;
        }
    
        $conn = new mysqli($servername, $username, $password,$dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql1 = "CALL update_mold_shot('" . $obj->ITEM_CODE . "','" . $obj->MOLD_SHOT . "')";
        
        if ($conn->query($sql1) === TRUE) {
        
            $msg = "Progress: ". round($count) . "% " . $obj->MOLD_CODE . " Successfully Updated!";
            echo str_pad($msg, 52) . "\r";

        } else {
            
            $msg = "Error updating " . $obj->MOLD_CODE . ". mold shot = " . $obj->MOLD_SHOT;             
            echo str_pad($msg, 52) . "\n\n";
            $msg = "Error updating " . $obj->MOLD_CODE . ". mold shot = " . $obj->MOLD_SHOT . "\n\n";
            fwrite($myfile, $msg);
            $count2 = $count2 + $counter;
            sleep(1);
        }        
        /* sleep(1); */        
    }
    if(round($count2)!=100){
        $count2 = 100 - round($count2);
    }
    else{
        $count2 = 0;
    }
    
    echo $txt = str_pad($count2 . "% Updated", 52) . "\n\n";
    fwrite($myfile, $txt);
    sleep(2);

    echo "Updating mold days used.\n\n";
    $txt = "Mold days used update.\n\n";
    fwrite($myfile, $txt);
    sleep(2);

    $count = 0;
    $count2 = 0;

    foreach($moldshot as $obj){

        $count = $count + $counter;
        if($count>100){
            $count = 100;
        }
    
        $conn = new mysqli($servername, $username, $password,$dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql1 = "CALL update_mold_day_used('" . $obj->ITEM_CODE . "','" . $obj->MOLD_SHOT . "')";
        
        if ($conn->query($sql1) === TRUE) {
        
            $msg = "Progress: ". round($count) . "% " . $obj->MOLD_CODE . " Successfully Updated!";
            echo str_pad($msg, 52) . "\r";

        } else {
            
            $msg = "Error updating " . $obj->MOLD_CODE;
            echo str_pad($msg, 52) . "\n\n";
            $msg = "Error updating " . $obj->MOLD_CODE . "\n\n";
            fwrite($myfile, $msg);
            $count2 = $count2 + $counter;
            sleep(1);
        }
        
        /* sleep(1); */        
    }

    if(round($count2)!=100){
        $count2 = 100 - round($count2);
    }
    else if(round($count2)>=100){
        $count2 = 0;
    }

    echo $txt = str_pad($count2 . "% Updated", 52) . "\n\n";
    fwrite($myfile, $txt);
    sleep(2);

    echo "Checking molds for PM.\n\n";
    $txt = "Mold/s for PM:\n\n";
    fwrite($myfile, $txt);
    sleep(2);

    $count = 0;
    $pm = 0;

    foreach($moldshot as $obj){
        /* echo $obj->MOLD_CODE . " " . $obj->ITEM_CODE . " " . $obj->MOLD_SHOT . "\n"; */

        $count = $count + $counter;
        if($count>100){
            $count = 100;
        }
            
        $conn = new mysqli($servername, $username, $password,$dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql1 = "CALL check_mold_pm('" . $obj->MOLD_CODE . "')";
        $query = $conn->query("CALL check_mold_pm('" . $obj->MOLD_CODE . "',@output)");
        $result = $conn->query('SELECT @output as `OUTPUT`') or die($conn->error);
        $row = $result->fetch_assoc();
        
        if ($row['OUTPUT']=='TRUE') {       
            echo $msg = $obj->MOLD_CODE . "\n";       
            fwrite($myfile, $msg);              
            $pm++;
            sleep(1);   
        }        
            
        /* sleep(1); */        
    }

    echo $txt = "\n" . $pm . " mold/s PM initialized.\n\n";
    fwrite($myfile, $txt);
    sleep(2);

    echo $txt = "PROCESS FINISHED\n\n";
?>