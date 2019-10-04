<?php

$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['to']));
$start=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
$to=date($_POST['to']);
$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['to']));
$start1=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end1=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));


if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE='$line' group by DATE_")){
    
   echo "  <table class='table table-sm table-responsive' >
<tr align = 'center' ><td rowspan='9' width = '100px'><h4 style='margin-top:80%; font-size:auto;'>$line</h4><i>(all shift)</i></td> </tr><tr align = 'center'> <th width = '100px'>DATE</th>"; 
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
//$php_data_array[] = $row;
  }
  echo "<td><b>".number_format($tplan,0,'.',',')."<b></td></tr>";}





      $tresult=0;
         echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
      for ($fromstart; $fromstart <=$toend ; $fromstart++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end' and jo_number like '2%' 
     and type = '1' and PDLINE_NAME like '$line' ")){

   $i=0;
  while ($result = $stmt->fetch_row()){

 echo "<td>".number_format($result[0],0,'.',',') ."</td>";



 $tresult+=$result[0];
      $result_array[] = $result[0];
$php_data_array[] =$result[0];   $i++;

$start=date('Y-m-d H:i:s',strtotime("$start +1 days"));
$end=date('Y-m-d H:i:s',strtotime("$end +1 days"));

}}}


echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 



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




  $tdef=0;echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
  for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and line_id='$line_id'  ")){

while ($def = $stmt->fetch_row()){
 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tdef+=$def[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
$defect_array[]=$def[0];
}}}
  echo "<td><b>".number_format($tdef,0,'.',',')."<b></td></tr>";





$tinput=0;     
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
 for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
  if($stmt = $conn2->query("SELECT jo_number, COUNT(PROCESS_NAME) FROM pcb WHERE created_at>='$start1' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end1'
   AND jo_number LIKE '2%' and PDLINE_NAME like '$line' and PROCESS_NAME  like 'SMT.INPUT%' ")){

while ($input = $stmt->fetch_row()){
$input_array[]=$input[1];
$tinput+=$input[1];
echo "<td>". number_format($input[1],0,".",",")."</td>";
$start1=date('Y-m-d H:i:s',strtotime("$start1 +1 days"));
$end1=date('Y-m-d H:i:s',strtotime("$end1 +1 days"));

}}}
echo "<td><b>". number_format($tinput,0,".",",")."<b></td></tr>";




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