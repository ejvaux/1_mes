<?php

$tgap=0; //------------------------------------ 
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%' group by masterdatabase.mis_prod_plan_dl.DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
   $i=0;
  while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2]=$result_array[$i];
    //echo $gp[1]."//".$gp[2]."///";
    $gap = $gp[1] - $gp[2];
     echo "<td>".number_format($gap,0,'.',',')."</td>";
     $tgap = $tplan - $tresult;
    $i++;}
     echo "<td><b>".number_format($tgap,0,'.',',')."<b></td></tr>";
  }



?>