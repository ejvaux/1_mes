
<?php
$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['to']));
$start=date('Y-m-d',strtotime($_POST['from']));
$end=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to=date($_POST['to']);
$colspan=3;









echo "   <table class='table table-sm table-responsive' >

<tr align = 'center' ><th width = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:11px; height:20px;font-family: Tahoma;'>DATE</th><td style='  padding-left: 100px;'></td>";

    for ($fromstart; $fromstart <=$toend ; $fromstart++) {
      echo "<td  style='font-size:11px; height:20px;border: solid 0.5px black;font-family: Tahoma;'><strong> $start </strong></td>";

  $start=date('Y-m-d',strtotime("$start +1 days"));
$end=date('Y-m-d',strtotime("$end +1 days"));
$colspan++;
}

      echo "<td  width='100px' style='font-size:11px; height:20px;border: solid 0.5px black;font-family: Tahoma;'><b>TOTAL<b></td></tr>";


$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['to']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
$tplan=0;  
?>
<tr>
        <th colspan="<?php echo $colspan; ?>" style="background-color: gray;"><span>SMTL1</span></th>
      </tr>

  <tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:11px; height:20px;font-family: Tahoma;'>PROD PLAN</th><td style='  padding-left: 90px;'></td><?php
    for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'2%' AND MACHINE_CODE LIKE 'SMTL1'   ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:11px; height:20px;border: solid 0.5px black;font-family: Tahoma; background-color:#FFE699;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}
 echo "<td style='font-size:11px; height:20px;border: solid 0.5px black;font-family: Tahoma; background-color:#FFE699;'><b>".number_format(@$tplan,0,'.',',')."<b></td></tr>";



$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;
           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:11px; height:20px;font-family: Tahoma;'>PROD RESULT</th><td style='  padding-left: 90px;'></td>";
      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT sum(type) FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' AND line_id='1'  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:11px; height:20px;border: solid 0.5px black;font-family: Tahoma;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
echo "<td style='font-size:11px; height:20px;border: solid 0.5px black;font-family: Tahoma;'><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 






$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['to']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 $tdef=0;
  echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:11px; height:20px;font-family: Tahoma;'>DEFECT</th><td style='  padding-left: 90px;'></td>";
       for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
if($stmt = $conn2->query("SELECT SUM(division_id) FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'   AND line_id='1' ")){
while ($def = $stmt->fetch_row()){
  $defect=$def[0]/2;
 echo "<td style='font-size:11px; height:20px;border: solid 0.5px black;font-family: Tahoma;'>".number_format($defect,0,'.',',')."</td>";
 $tdef+=$defect;
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}





echo "<td style='font-size:11px; height:20px;border: solid 0.5px black;font-family: Tahoma;'><b>".number_format($tdef,0,'.',',')."<b></td></tr>";
?>

