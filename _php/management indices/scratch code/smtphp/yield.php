<?php 
$yield;
$tyield=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, COUNT(1_smt.pcb.RESULT), COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
$i=0;
while ($output = $stmt->fetch_row()){
	$output[1]= $result_array[$i];
$output[2]=$input_array[$i];

 $yield=($output[1]/$output[2])*100;
//echo $output[2]."//";
echo "<td>". number_format($yield,2,".",",")." %</td>";

$i++;
}
$tyield=(($tresult/$tinput)*100);

echo "<td><b>". number_format($tyield,2,".",",")."%<b></td></tr>";}   


?>