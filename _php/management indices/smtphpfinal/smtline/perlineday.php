<?php



  if($stmt = $conn1->query("SELECT DATE_, PLAN_QTY FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
    
   echo "  <table class='table table-sm table-responsive' >
<tr align = 'center' ><td rowspan='9' width = '100px'><h4 style='margin-top:80%; font-size:auto;'>$line</h4><i>(night shift)</i></td> </tr><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($date = $stmt->fetch_row()) {
    echo "<td><b>$date[0]<b></td>";
  $date_array[] = $date;
  }
     echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   
$tplan=0;
    if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like '$line'  group by DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
  while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
    echo "<td>".number_format($plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $plan;
  }
  echo "<td><b>".number_format($tplan,0,'.',',')."<b></td></tr>";}

    //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result

      //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result    //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result
  
   // $tresult=0;
     //if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.id) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    // on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number 
    
     // where DATE(1_smt.pcb.created_at) BETWEEN '$from 06%' and '$to 05%' and 1_smt.pcb.jo_number like '2%' 
     //and PROCESS_NAME like 'SMT.INPUT%' and 1_smt.pcb.shift = '$shift' and PDLINE_NAME like '$line' group by DATE(1_smt.pcb.masterdatabase.mis_prod_plan_dl.DATE_)")){
     //echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    // $i=0;
    //while ($result = $stmt->fetch_row()){
    //   echo "<td>".number_format($result[1],0,'.',',') ."</td>";
    //    $result_array[] = $result[1];
    //   $tresult+=$result[1];
    //   $result[0]=$job_array[$i];
    //   $php_data_array[] = $result;
    //  $i++;}
    //echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 
    //}
    //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result

      //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result    //1363 accurate 966 mine.. testing on prod result
      //1363 accurate 966 mine.. testing on prod result
  
      $tresult=0;
   if($stmt = $conn2->query("SELECT COUNT(RESULT) FROM pcb 
   where cast(created_at + 0.25 as date) BETWEEN  '$from' and '$to' and jo_number like '2%' 
   and  shift = '$shift'  and type = '1' and PDLINE_NAME like '$line' group by cast(created_at + 0.25 as date) ")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
   $i=0;
  while ($result = $stmt->fetch_row()){
     echo "<td>".number_format($result[0],0,'.',',') ."</td>";
      $result_array[] = $result[0];
     $tresult+=$result[0];

     $php_data_array[] =$result;
    $i++;}
  echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 
  }


$tgap=0; //------------------------------------ 
  if($stmt = $conn2->query("SELECT  COUNT(RESULT) FROM pcb 
  WHERE cast(created_at + 0.25 as date) BETWEEN '$from' and '$to' and jo_number 
  like '2%'   and  shift = '$shift'  and type = '1' and PDLINE_NAME like '$line' group by cast(created_at + 0.25 as date)")){
   echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
   $i=0;
  while ($gp = $stmt->fetch_row()){
    $job_array[$i];
    $gp[0]=$result_array[$i];
    //echo $gp[1]."//".$gp[2]."///";
    $gap = $job_array[$i] - $gp[0];
     echo "<td>".number_format($gap,0,'.',',')."</td>";
     $tgap = $tplan - $tresult;
    $i++;}
     echo "<td><b>".number_format($tgap,0,'.',',')."<b></td></tr>";
  }


$trate=0; //------------------------------------ 
  if($stmt = $conn2->query("SELECT  COUNT(RESULT)  FROM pcb 
  WHERE  cast(created_at + 0.25 as date) BETWEEN '$from' AND '$to' AND jo_number 
  LIKE '2%'  and  shift = '$shift'  and type = '1' and PDLINE_NAME like '$line' GROUP BY cast(created_at + 0.25 as date)")){
   echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
   $i=0;
  while ($rate = $stmt->fetch_row()){
    $job_array[$i];
   $rate[0]=$result_array[$i];
   // echo $gp[1]."//".$gp[2]."///";

    $rate = (($rate[0] /  $job_array[$i])*100);

    $trate += $rate;

     echo "<td>".number_format($rate,2,'.',',')."%</td>";
    $i++;
  }$w=(($tresult/$tplan)*100);
     echo "<td><b>".number_format($w,2,".",',')."%</b></td></tr>"; //number_format($trate,2,'.',',')."% of ".
  }



$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE cast(created_at + 0.25 as date) BETWEEN '$from' and '$to'  and  shift = '$shift'  and line_id='$line_id'   group by cast(created_at + 0.25 as date)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tdef+=$def[0];}
  echo "<td><b>".number_format($tdef,0,'.',',')."<b></td></tr>";
}



$tinput=0;
  if($stmt = $conn2->query("SELECT jo_number, COUNT(PROCESS_NAME) FROM pcb 
  WHERE    cast(created_at + 0.25 as date) BETWEEN '$from' AND '$to'
   AND jo_number LIKE '2%' and shift = '$shift' and PDLINE_NAME like '$line' and PROCESS_NAME  like 'SMT.INPUT%' GROUP BY cast(created_at + 0.25 as date)")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
$input_array[]=$input[1];
$tinput+=$input[1];
echo "<td>". number_format($input[1],0,".",",")."</td>";}
echo "<td><b>". number_format($tinput,0,".",",")."<b></td></tr>";}




$yield;
$tyield=0;
if($stmt = $conn2->query("SELECT  COUNT(RESULT), COUNT(PROCESS_NAME) FROM pcb
WHERE  cast(created_at + 0.25 as date) between '$from' and '$to' 
and jo_number like '2%' and PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like '$line' and shift = '$shift' group by cast(created_at + 0.25 as date)")){
echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
$i=0;
while ($output = $stmt->fetch_row()){
  $output[0]= $result_array[$i];
$output[1]=$input_array[$i];

 $yield=($output[0]/$output[1])*100;
//echo $output[2]."//";
echo "<td>". number_format($yield,2,".",",")." %</td>";

$i++;
}
$tyield=(($tresult/$tinput)*100);

echo "<td><b>". number_format($tyield,2,".",",")."%<b></td></tr>";}  


 echo "<script>
          var PLAN = ".json_encode($date_array)."
    </script>";
    
    echo "<script>
    var RESULT = ".json_encode($php_data_array)."
    </script>";
    
    getColumn();





 ?>