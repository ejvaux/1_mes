<?php
$servername = "172.16.1.13";
$username = "root1";
$password = "0000";
$dbname1 = "masterdatabase";
$dbname2 = "1_smt";

// Create connection

$connect = new mysqli($servername, $username, $password, $dbname2);


// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $masterdatabase->connect_error);
} 
$defect_name=$_POST['defect_name'];
  $defect_id=$_POST['defect_id'];
    $from=date('Y-m-d H:i:s', strtotime($_POST['from']));
    $to=date('Y-m-d H:i:s', strtotime($_POST['to']));

if (isset($_POST['submit'])) {
    $search_query = $_POST['serial_number'];


if($stmt = $connect->query("
  SELECT 
  masterdatabase.dmc_defect_code.DEFECT_NAME, 1_smt.pcb.serial_number, 1_smt.pcb.PDLINE_NAME, masterdatabase.smt_processes.name, 1_smt.defect_mats.created_at
  FROM 
  1_smt.defect_mats 
  INNER JOIN 
  masterdatabase.dmc_defect_code ON  masterdatabase.dmc_defect_code.DEFECT_ID=1_smt.defect_mats.defect_id
  INNER JOIN 
  1_smt.pcb ON 1_smt.pcb.id=1_smt.defect_mats.pcb_id
  INNER JOIN
  masterdatabase.smt_processes ON masterdatabase.smt_processes.id=1_smt.defect_mats.process_id
  WHERE 

  1_smt.defect_mats.created_at BETWEEN '$from' AND '$to'   
  AND 1_smt.defect_mats.defect_id='$defect_id' 
  AND 1_smt.defect_mats.division_id='2'
 " )){
$i='1';
while ($def_id = $stmt->fetch_row()){
echo "<tr style='font-size:20px;'>

      <td>".$i."</td>
      <td>".$def_id[1]."</td>
      <td>".$def_id[2]."</td>
      <td>".$def_id[0]."</td>
      <td>".$def_id[3]."</td>
      <td>".$def_id[4]."</td>

    </tr>";




$i++;

}}}


?>