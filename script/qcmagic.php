<?php
$servername = "localhost";
$username = "root";     
$password = "";
$dbname = "masterdatabase";

// Create connection
//$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection


for($x = 100001870; $x <= 100001885; $x++){
    $jo[] = $x;
    
}
foreach($jo as $joborder){
    $totalJO = 0;
    $totalPerJO = 0;
    echo "\n---------------------------------------$joborder--------------------------------\n";
    $conn = new mysqli($servername, $username, $password,$dbname);   
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT COUNT(PACKING_NUMBER) as coID,PACKING_NUMBER,SUM(PRINT_QTY) AS SUMQ FROM mis_product WHERE JO_NUM = '$joborder' GROUP BY PACKING_NUMBER";
    $result = $conn->query($sql);
    if($result = $conn->query($sql)){
            }
            else{echo $conn->error;}
              if ($result->num_rows > 0)
              {
                  while($row = $result->fetch_assoc()) 
                  {
                    echo "\t".$row['PACKING_NUMBER']."\t";
                    echo $row['SUMQ']."\t";
                    echo $row['coID']." POLYBAG(s)\n";
                    $totalJO = $totalJO + $row['coID'];
                    $totalPerJO = $totalPerJO + $row['SUMQ'];
                  }
                }
            else{
                 echo "\t No Results found.\n";
            }
    $conn->close();
    echo "\n--------------------------------$totalJO----$totalPerJO---------------------------------------\n";
}

    //echo $joborder = 'DISAPPROVED';
   /*  $conn = new mysqli($servername, $username, $password,$dbname);   
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //$sql = "SELECT `PACKING_NUMBER` FROM mis_product WHERE `JO_NUM` = $joborder";
    //$result = $conn->query($sql);
    $sql = "SELECT * FROM mis_product WHERE JO_NUM = '100000001'";
            if($result = $conn->query($sql)){
            }
            else{echo $conn->error;}
              if ($result->num_rows > 0)
              {
                  while($row = $result->fetch_assoc()) 
                  {
                    echo $row['PACKING_NUMBER']."\n";
                  }
                }
            else{
                 echo "\t No Results found.\n";
            }
    $conn->close(); */
?>