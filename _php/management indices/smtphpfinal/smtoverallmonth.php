<?php



  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY), COUNT(DATE_) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
    
   echo "  <table class='t AND and MONTH(created_at)able table-sm table-responsive' >
<tr align = 'center' ><td rowspan='9' width = '100px'><h4 style='margin-top:80%; font-size:auto;'>$line</h4><i>(all)</i></td> </tr><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($date = $stmt->fetch_row()) {
    echo "<td><b>$date[0]<b></td>";
   //$php_data_array[] = $row;
  }
     echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   
$tplan=0;
    if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like '$line'  group by DATE_")){
  echo "<tr align = 'center'> < AND and MONTH(created_at)th width = '100px'>PROD PLAN</th>";
  while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
    echo "<td>".number_format($plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;
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
     //and PROCESS_NAME like 'SMT.INPUT%' and 1_smt.pcb.shift = '$shift' group by DATE(1_smt.pcb.masterdatabase.mis_prod_pl AND and MONTH(created_at)an_dl.DATE_)")){
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
   if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
   on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where cast(1_smt.pcb.created_at + 0.25 as date) BETWEEN  '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
     and 1_smt.pcb.type = '1' group by cast(1_smt.pcb.created_at + 0.25 as date) AND and MONTH(created_at) ")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
   $i=0;
  while ($result = $stmt->fetch_row()){
     echo "<td>".number_format($result[2],0,'.',',') ."</td>";
      $result_array[] = $result[2];
     $tresult+=$result[2];
     $result[1]=$job_array[$i];
     $php_data_array[] = $result;
    $i++;}
  echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 
  }



















$tgap=0; //------------------------------------ 
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and cast(1_smt.pcb.created_at + 0.25 as date) BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%'     and 1_smt.pcb.type = '1' group by cast(1_smt.pcb.created_at + 0.25 as date) AND and MONTH(created_at)")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT)  FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number AND cast(1_smt.pcb.created_at + 0.25 as date) BETWEEN '$from' AND '$to' AND 1_smt.pcb.jo_number 
  LIKE '2%'    and 1_smt.pcb.type = '1' GROUP BY cast(1_smt.pcb.created_at + 0.25 as date) AND and MONTH(created_at)")){
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
if($stmt = $conn2->query("SELECT COUNT(1_smt.defect_mats.created_at), 1_smt.defect_mats.updated_at FROM 1_smt.defect_mats WHERE cast(1_smt.pcb.created_at + 0.25 as date) BETWEEN '$from' and '$to'    and 1_smt.pcb.type = '1'  group by cast(1_smt.pcb.created_at + 0.25 as date) AND and MONTH(created_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tdef+=$def[0];}
  echo "<td><b>".number_format($tdef,0,'.',',')."<b></td></tr>";
}



$tinput=0;
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number AND cast(1_smt.pcb.created_at + 0.25 as date) BETWEEN '$from' AND '$to'
   AND 1_smt.pcb.jo_number LIKE '2%'  and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' GROUP BY cast(1_smt.pcb.created_at + 0.25 as date) AND and MONTH(created_at)")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
$input_array[]=$input[2];
$tinput+=$input[2];
echo "<td>". number_format($input[2],0,".",",")."</td>";}
echo "<td><b>". number_format($tinput,0,".",",")."<b></td></tr>";}



$yield;
$tyield=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, COUNT(1_smt.pcb.RESULT), COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and cast(1_smt.pcb.created_at + 0.25 as date) between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%'  group by cast(1_smt.pcb.created_at + 0.25 as date) AND MONTH(created_at)")){
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

    echo "<script>
          var my_2d = ".json_encode($php_data_array)."
    </script>";
    
    echo "<script>
    var my_3d = ".json_encode($php_data_array)."
    </script>";
    
    getColumn();




 ?>