<?php

$tplan=0;
    if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
  while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
    echo "<td>".number_format($plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;
  }
  echo "<td><b>".number_format($tplan,0,'.',',')."<b></td></tr>";}


 ?>