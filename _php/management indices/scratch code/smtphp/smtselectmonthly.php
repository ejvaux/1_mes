<?php



  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY), COUNT(DATE_) FROM mis_prod_plan_dl WHERE DATE_ between '$begin' and '$end' and JOB_ORDER_NO like'2%' group by DATE_")){
   echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($date = $stmt->fetch_row()) {
    echo "<td><b>$date[0]<b></td>";
    $date_hour_array[] = $date[0];
   //$php_data_array[] = $row;
  }
     echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   





 ?>