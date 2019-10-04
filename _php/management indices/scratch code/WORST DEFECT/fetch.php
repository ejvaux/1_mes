<?php
//fetch.php
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
else { echo "<br>";}  


$i=1;
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
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
  AND 1_smt.pcb.serial_number LIKE '%".$search."%'
  ORDER BY 1_smt.defect_mats.created_at
  ASC
  
 ";
}
else
{
 $query = "
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
  ORDER BY 1_smt.defect_mats.created_at
  ASC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  
<style type="text/css">
  .tableFix { /* Scrollable parent element */
  position: relative;
  overflow: auto;
  height: 450px;
}

.tableFix table{
  width: 100%;
  border-collapse: collapse;
}

.tableFix th,
.tableFix td{
  padding: 8px;
  text-align: center;
}

.tableFix thead th {
  position: sticky; top: 0px; background: #fff; 
}
</style>
<div class="tableFix">
<table class="table table-striped" style=" text-align:center;">
  <thead>
    <tr>
      <th scope="col">NO.</th>
      <th scope="col">SERIAL NUMBER</th>
      <th scope="col">PROD. LINE</th>
      <th scope="col">DEFECT</th>
            <th scope="col">PROCESS</th>
                  <th scope="col">DEFECT DATE/TIME</th>
    </tr>
  </thead>
  <tbody>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr style="font-size:20px;">

      <td>"'.$i.'"</td>
      <td>"'.$def_id[1].'"</td>
      <td>"'.$def_id[2].'"</td>
      <td>"'.$def_id[0].'"</td>
      <td>"'.$def_id[3].'"</td>
      <td>"'.$def_id[4].'"</td>

    </tr>
  ';
  $i++;
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}



















?>