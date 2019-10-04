<?php



$tinput=0;
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number AND masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' AND '$to'
   AND 1_smt.pcb.jo_number LIKE '2%'  GROUP BY masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
$input_array[]=$input[2];
$tinput+=$input[2];
echo "<td>". number_format($input[2],2,".",",")."</td>";}
echo "<td><b>". number_format($tinput,2,".",",")."<b></td></tr>";}



 ?>