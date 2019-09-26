<?php
$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['from']));
$start=date('Y-m-d',strtotime($_POST['from']));
$end=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to=date($_POST['from']);
$day=date('d',strtotime($_POST['from']));


echo "  <a href='x' class='btn btn-sm btn-outline-info' download='down.xls' id='btnExportSMT".$day."'>
Export 
    </a>
    <div id='dvDataSMT".$day."'> <table class='table table-md table-responsive' >
<tr align = 'center' > <strong>DATE </strong> <medium>$start</medium> <th width = '150px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>SMT LINE</th><td style='  padding-left: 180px;'></td>";
      echo "<td  style='font-size:25px;'><b>SMTL1<b></td>";
      echo "<td  style='font-size:25px;'><b>SMTL12<b></td>";
      echo "<td  style='font-size:25px;'><b>SMTL13<b></td>";
      echo "<td  style='font-size:25px;'><b>SMTL2<b></td>";
      echo "<td  style='font-size:25px;'><b>SMTL3<b></td>";
      echo "<td  style='font-size:25px;'><b>SMTL6<b></td>";
      echo "<td  width='100px' style='font-size:25px;'><b>TOTAL<b></td></tr>";


$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
$tplan=0;  
  echo "<tr align = 'center'> <th width = '120px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>PROD PLAN</th><td style='  padding-left: 90px;'></td>";
    for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'2%' AND MACHINE_CODE LIKE 'SMTL1' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:25px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}

$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'2%' AND MACHINE_CODE LIKE 'SMTL12' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:25px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}


$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'2%' AND MACHINE_CODE LIKE 'SMTL13' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:25px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}

$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'2%' AND MACHINE_CODE LIKE 'SMTL2' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:25px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}



$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'2%' AND MACHINE_CODE LIKE 'SMTL3' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:25px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}

$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'2%' AND MACHINE_CODE LIKE 'SMTL6' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:25px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}






 echo "<td style='font-size:25px;'><b>".number_format(@$tplan,0,'.',',')."<b></td></tr>";



$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;
           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>PROD RESULT</th><td style='  padding-left: 90px;'></td>";
      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' AND line_id='1'  ")){
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


$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' AND line_id='17'  ")){
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



$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' AND line_id='18'  ")){
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


$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' AND line_id='2'  ")){
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

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' AND line_id='3'  ")){
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


$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' AND line_id='6'  ")){
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
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'  AND process_id != '66' AND line_id='1' ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
          $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
 $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}


$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'  AND process_id != '66' AND line_id='17' ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
          $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
 $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}




$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'  AND process_id != '66' AND line_id='18' ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
          $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
 $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}




$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'  AND process_id != '66' AND line_id='2' ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
          $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
 $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}



$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'  AND process_id != '66' AND line_id='3' ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
          $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
 $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}


$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'  AND process_id != '66' AND line_id='6' ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
          $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
 $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}



echo "<td style='font-size:25px;'><b>".number_format($tdef,0,'.',',')."<b></td></tr></table>";
?>
<?php
$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['from']));
$start=date('Y-m-d',strtotime($_POST['from']));
$end=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to=date($_POST['from']);
$day=date('d',strtotime($_POST['from']));

  echo " 
    <table  class='table table-md table-responsive' >
<tr align = 'center' ><th width = '150px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>DIP LINE</th><td style='  padding-left: 180px;'></td>";
    
    echo "<td  style='font-size:25px;'><b>DIPL1<b></td>";
    echo "<td  style='font-size:25px;'><b>DIPL2<b></td>";
    echo "<td  width='100px' style='font-size:25px;'><b>TOTAL<b></td></tr>";








$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
$tplan=0;  
  echo "<tr align = 'center'> <th width = '120px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>PROD PLAN</th><td style='  padding-left: 90px;'></td>";
    for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'8%' AND MACHINE_CODE LIKE 'DIPL1' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:25px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}

$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['from']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'8%' AND MACHINE_CODE LIKE 'DIPL2' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:25px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}
 echo "<td style='font-size:25px;'><b>".number_format(@$tplan,0,'.',',')."<b></td></tr>";




















$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;
           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:25px;'>PROD RESULT</th><td style='  padding-left: 90px;'></td>";
      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '8%' 
     and type = '1' AND line_id='19'  ")){
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


$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '8%' 
     and type = '1' AND line_id='20'  ")){
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
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='18' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'   AND line_id='19' ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
          $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
 $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}


$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='18' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'   AND line_id='20' ")){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
while ($def = $stmt->fetch_row()){
          $defect_array[]=$def[0];
 echo "<td style='font-size:25px;'>".number_format($def[0],0,'.',',')."</td>";
 $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}
echo "<td style='font-size:25px;'><b>".number_format($tdef,0,'.',',')."<b></td></tr></table></div>";











?>

<script type="text/javascript">$('#btnExportSMT'+<?php echo $day;?>+'').click(function (e) {
    $(this).attr({
        'download': "SMT <?php echo $_POST['from']; ?>.xls",
            'href': 'data:application/csv;charset=utf-8,' + encodeURIComponent( $('#dvDataSMT'+<?php echo $day;?>+'').html())
    })
});</script>