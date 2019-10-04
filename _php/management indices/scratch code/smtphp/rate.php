<?php 

$trate=0; //------------------------------------ 
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT)  FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number AND masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' AND '$to' AND 1_smt.pcb.jo_number 
  LIKE '2%' GROUP BY masterdatabase.mis_prod_plan_dl.DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
   $i=0;
  while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
   $gp[2]=$result_array[$i];
   // echo $gp[1]."//".$gp[2]."///";

    $rate = (($gp[2] / $gp[1])*100);

    $trate += $rate;

     echo "<td>".number_format($rate,2,'.',',')."%</td>";
    $i++;
  }$w=(($tresult/$tplan)*100);
     echo "<td><b>".number_format($w,2,".",',')."%</b></td></tr>"; //number_format($trate,2,'.',',')."% of ".
  }



?>