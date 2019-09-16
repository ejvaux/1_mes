

 







<?php
 $i=$_POST['i'];
  $defect_name=$_POST['name'];
  $defect_id=$_POST['id'];
    $from=date('Y-m-d H:i:s', strtotime($_POST['from'].' 06:00:00'));
    $to=date('Y-m-d H:i:s', strtotime($_POST['to'].' 05:59:59'));
        $line_id=$_POST['line_id'];








 //            echo "<br>";
 //             echo $process_id."<br>";
 //             echo $line_id."<br>";
 //             echo $from."<br>";
 //            echo $to."<br>";
 //             echo $defect_name."<br>";
 //             echo $defect_id;










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
  AND 1_smt.defect_mats.division_id='2'
    AND 1_smt.defect_mats.line_id='$line_id' 
  ORDER BY 1_smt.defect_mats.created_at
  ASC  " )){






//if($stmt = $conn2->query("SELECT masterdatabase.dmc_defect_code.DEFECT_NAME, masterdatabase.dmc_defect_code.DEFECT_ID FROM 1_smt.,masterdatabase.dmc_defect_code JOIN 1_smt.defect_mats ON  masterdatabase.dmc_defect_code.DEFECT_ID=1_smt.defect_mats.defect_id WHERE 1_smt.defect_mats.created_at BETWEEN'$from' AND '$to' AND 1_smt.defect_mats.line_id='$line_id' AND 1_smt.defect_mats.process_id='$process_id'   and 1_smt.defect_mats.defect_id='$defect_id' ORDER BY COUNT(1_smt.defect_mats.process_id) DESC LIMIT 0,9 " )){
$i='1';
?>
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
<table class="table table-bordered" style=" text-align:center;">
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
<?php
while ($def_id = $stmt->fetch_row()){

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //echo "<td><medium><button style='color:darkblue; border-style:none; background-color:transparent;' data-toggle='modal' data-target='#".$def_id['1']."' ><i>". strtoupper($def_id['0'])."</button></i></medium></td>";



echo "<tr style='font-size:20px;'>

      <td>".$i."</td>
      <td>".$def_id[1]."</td>
      <td>".$def_id[2]."</td>
      <td>".$def_id[0]."</td>
      <td>".$def_id[3]."</td>
      <td>".$def_id[4]."</td>

    </tr>";




$i++;
$defectname_array[]=$def_id['0'];
}}








?>



    

</tbody></table>

