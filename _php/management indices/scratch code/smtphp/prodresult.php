<?php 

  $tresult=0;
   if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
   on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
   and PROCESS_NAME like 'SMT.INPUT%' group by masterdatabase.mis_prod_plan_dl.DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
   $i=0;
  while ($row = $stmt->fetch_row()){
     echo "<td>".number_format($row[2],0,'.',',') ."</td>";
      $result_array[] = $row[2];
     $tresult+=$row[2];
     $row[1]=$job_array[$i];
     $php_data_array[] = $row;
    $i++;}
  echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 
  }
?>