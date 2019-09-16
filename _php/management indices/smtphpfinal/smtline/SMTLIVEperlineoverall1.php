
  <style type="text/css">
    th,td{font-size: 60px; width : 270px;}
  </style>
<?php
$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['from']));
$start=date('Y-m-d',strtotime($_POST['from']));
$end=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to=date($_POST['from']);
  echo "  <table  class='table table-bordered table-sm' >
<tr align = 'center' ><th>LINE NO.</th> <th width = '100px' >PLAN</th><th width = '100px'>TARGET</th><th width = '100px' >RESULT</th><th width = '100px'>GAP</th><th width = '100px'>DEFECT</th></tr>"; 
      for ($fromstart; $fromstart <=$toend ; $fromstart++) { 
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end' and JOB_ORDER_NO like'2%' and MACHINE_CODE='$line1'  ")){
    
  
  while ($date = $stmt->fetch_row()) {
       echo "<tr align = 'center' ><td>".$line1."</td>";
  //  echo "<td>".date('Y-m-d',strtotime($start))."</td>";
echo "<td>".number_format($date[1],0,'.',',')."</td>";
echo "<td>".number_format($date[1],0,'.',',')."</td>";
$job_arrayy[]=$date[1];


  $start=date('Y-m-d',strtotime("$start +1 days"));
$end=date('Y-m-d',strtotime("$end +1 days"));

  }}}
$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['from']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;
      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' and PDLINE_NAME like '$line1' ")){
   $i=0;
  while ($result = $stmt->fetch_row()){
 echo "<td>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];
      $result_arrayy[] = $result[0];
$php_data_arrayy[] =$result[0];   $i++;

$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}


$fromstart7=date('d',strtotime($_POST['from']));
$toend7=date('d',strtotime($_POST['from']));
$start7=date('Y-m-d H:i:s',strtotime($_POST['from'].' 18:00:00'));
$end7=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
$tgap=0;$i=0; //------------------------------------ 
      for ($fromstart7; $fromstart7 <=$toend7 ; $fromstart7++) { 
  if($stmt = $conn2->query("SELECT  COUNT(RESULT) FROM pcb WHERE created_at>='$start7' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end7' and jo_number 
  like '2%'     and type = '1' and PDLINE_NAME like '$line1' ")){
  while ($gp = $stmt->fetch_row()){
    $job_arrayy[$i];
    $gp[0]=$result_arrayy[$i];
    //echo $gp[1]."//".$gp[2]."///";
    $gap = $job_arrayy[$i] - $gp[0];
     echo "<td>".number_format($gap,0,'.',',')."</td>";
      
     $start7=date('Y-m-d H:i:s',strtotime("$start7 +1 days"));
$end7=date('Y-m-d H:i:s',strtotime("$end7 +1 days"));
    $i++;}}}




$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['from']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 $tdef=0;
 
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4' and line_id='$line_id1'  ")){

while ($def = $stmt->fetch_row()){
    $defect_arrayy[]=$def[0];
 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tdef+=$def[0];

$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}



?>