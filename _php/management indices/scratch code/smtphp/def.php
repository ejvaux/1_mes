<?php




    $tdef=0;
if($stmt = $conn1->query("SELECT COUNT(1_smt.defect_mats.created_at), 1_smt.defect_mats.updated_at FROM 1_smt.defect_mats WHERE 1_smt.defect_mats.created_at BETWEEN '$from%' and '$to%' group by DATE(1_smt.defect_mats.updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>".number_format($def[0],2,'.',',')."</td>";
  $tdef+=$def[0];}
  echo "<td><b>".number_format($tdef,2,'.',',')."<b></td></tr>";
}




 ?>