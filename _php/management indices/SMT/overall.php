<?php
$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['from']));
$start=date('Y-m-d',strtotime($_POST['from']));
$end=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to=date($_POST['from']);


  echo "  <table class='table table-md table-responsive' >
<tr align = 'center' > <th width = '150px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>SMT LINE</th><td style='  padding-left: 180px;'></td>";
      for ($fromstart; $fromstart <=$toend ; $fromstart++) { 
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY), MACHINE_CODE FROM mis_prod_plan_dl WHERE DATE_ >='$start' AND DATE_ADD(DATE_, INTERVAL 0 DAY) <='$end' and JOB_ORDER_NO like'2%' GROUP by MACHINE_CODE  ")){
  while ($date = $stmt->fetch_row()) {
    echo "<td  style='font-size:25px;'><b>".$date[2]."<b></td>";
  $date_array[] = $date;
  $start=date('Y-m-d',strtotime("$start +1 days"));
  $end=date('Y-m-d',strtotime("$end +1 days"));
}}}
     echo "<td  width='100px' style='font-size:25px;'><b>TOTAL<b></td></tr>";


$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
$tplan=0;  
  echo "<tr align = 'center'> <th width = '120px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>PROD PLAN</th><td style='  padding-left: 90px;'></td>";
    for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), PLAN_QTY FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 0 DAY) <='$end1' and JOB_ORDER_NO like'2%' GROUP by MACHINE_CODE  ")){
  while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
    echo "<td style='font-size:25px;'>".number_format($plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
    $start1=date('Y-m-d',strtotime("$start1 +1 days"));
    $end1=date('Y-m-d',strtotime("$end1 +1 days"));
  }}}
  echo "<td style='font-size:25px;'><b>".number_format($tplan,0,'.',',')."<b></td></tr>";




$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;
           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>PROD RESULT</th><td style='  padding-left: 90px;'></td>";
      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' GROUP by line_id  ")){
   $i=0;
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:25px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];
 $result_array[] = $result[0];
 $php_data_array[] =$result[0];   
 $i++;
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
echo "<td style='font-size:25px;'><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 




$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 $tdef=0;
  echo "<tr align = 'center'> <th width = '120px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>DEFECT</th><td style='  padding-left: 90px;'></td>";
if($stmt = $conn2->query("SELECT  count(defect_id), line_id FROM defect_mats WHERE  division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4' AND process_id != '66'  group by line_id ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
        $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
$tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));
}}}
echo "<td style='font-size:25px;'><b>".number_format($tdef,0,'.',',')."<b></td></tr>";











?>
