<?php



  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY), COUNT(DATE_) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
   echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
    echo "<td><b>$row[0]<b></td>";
   //$php_data_array[] = $row;
  }
     echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   

    
$tplan=0;
    if($stmt = $conn1->query("SELECT DATE(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
  while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
    echo "<td>".number_format($plan[1],0,'.',',')."</td>";
  $job_array[]=$plan[1];
//$php_data_array[] = $row;
  }
  echo "<td><b>".number_format($tplan,0,'.',',')."<b></td></tr>";}





      $tresult=0;
   if($stmt = $conn1->query("SELECT COUNT(test_smt.pcb.jo_number) FROM test_smt.pcb  INNER JOIN test_masterdatabase.mis_prod_plan_dl  WHERE test_masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = test_smt.pcb.jo_number AND date(test_smt.pcb.created_at) BETWEEN '$from' and '$to' AND test_masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO LIKE '2%' GROUP BY date(test_smt.pcb.created_at)"))
{  $i=0;
  echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
  while ($result = $stmt->fetch_row()){
$tresult+=$result[0];
 $result_array[] = $result[0];
      $result[0]=$job_array[$i];
    echo "<td>".number_format($result[0],0,'.',',')."</td>";
    $i++;
} echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 

  }
  





$tgap=0; //------------------------------------ 
  if($stmt = $conn1->query("SELECT test_masterdatabase.mis_prod_plan_dl.DATE_, test_masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(test_smt.pcb.jo_number) FROM test_masterdatabase.mis_prod_plan_dl, test_smt.pcb 
  WHERE test_masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = test_smt.pcb.jo_number and test_masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and test_smt.pcb.jo_number 
  like '2%' group by date(test_smt.pcb.created_at)")){
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










$trate=0; //------------------------------------ 
  if($stmt = $conn1->query("SELECT test_masterdatabase.mis_prod_plan_dl.DATE_, test_masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(test_smt.pcb.jo_number)  FROM test_masterdatabase.mis_prod_plan_dl, test_smt.pcb 
  WHERE test_masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = test_smt.pcb.jo_number AND test_masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' AND '$to' AND test_smt.pcb.jo_number 
  LIKE '2%' GROUP BY DATE(test_smt.pcb.created_at)")){
   echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
   $i=0;
  while ($rate = $stmt->fetch_row()){
    $rate[1]=$job_array[$i];
   $rate[2]=$result_array[$i];
   // echo $gp[1]."//".$gp[2]."///";

    $rate = (($rate[2] / $rate[1])*100);

    $trate += $rate;

     echo "<td>".number_format($rate,2,'.',',')."%</td>";
    $i++;
  }$w=(($tresult/$tplan)*100);
     echo "<td><b>".number_format($w,2,".",',')."%</b></td></tr>"; //number_format($trate,2,'.',',')."% of ".
  }





 $tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at) FROM defect_mats  WHERE date(created_at) BETWEEN '$from' AND '$to' GROUP BY date(created_at)" )){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){

echo "<td>".number_format($def['0'],0,'.',',')."</td>";
  $tdef+=$def['0'];



 }
  echo "<td><b>".number_format($tdef,0,'.',',')."<b></td></tr>";
}









 ?>