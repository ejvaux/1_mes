<?php
$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;
      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1'  GROUP BY PDLINE_NAME ASC ")){
   $i=0;
  while ($result = $stmt->fetch_row()){
 $tresult+=$result[0];
 $result_array[] = $result[0];
$php_data_array[] =$result[0];   $i++;
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}




$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 $tdef=0;
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE  division_id='2'  AND created_at>='$start4'  AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'  AND process_id != '66' GROUP BY line_id ASC  ")){
while ($def = $stmt->fetch_row()){
        $defect_array[]=$def[0];
  $tdef+=$def[0];
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));
}}}












$i=0;
$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['from']));
$start=date('Y-m-d',strtotime($_POST['from']));
$end=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to=date($_POST['from']);
  echo "  <table class='table table-bordered table-sm table-responsive'  >
<tr align = 'right' style='font-size:25px;' > <th width = '150px'>DATE</th><th width = '150px'>LINE</th><th width = '150px'>PLAN</th><th width = '150px'>RESULT</th><th width = '150px'>DEFECT</th></tr>";
      for ($fromstart; $fromstart <=$toend ; $fromstart++) { 
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY),MACHINE_CODE FROM mis_prod_plan_dl WHERE DATE_ >='$start' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMT%' GROUP BY MACHINE_CODE ASC ")){
  while ($date = $stmt->fetch_row()) {
    echo "<tr  align = 'right' style='font-size:20px;'><td><b>".$date[0]."<b></td>";
  echo "<td><b>".$date[2]."<b></td>";
      echo "<td><b>".$date[1]."<b></td>";
      echo "<td><b>". $result_array[$i]."<b></td>";
             echo "<td><b>".$defect_array[$i]."<b></td>";
  $date_array[] = $date;
  $start=date('Y-m-d',strtotime("$start +1 days"));
$end=date('Y-m-d',strtotime("$end +1 days"));
$i++;
  }}} 
















 echo "</tr>";






?>
