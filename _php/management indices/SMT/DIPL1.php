<?php
$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['to']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
$tplan=0;  
 ?>
<tr>
        <th colspan="<?php echo $colspan; ?>" style='border-style: none; background-color: gray;'><span>DIPL1</span></th>
      </tr>

  <tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>PROD PLAN</th><td style='  padding-left: 90px;'></td><?php
    for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'8%' AND MACHINE_CODE LIKE 'DIPL1' ")){while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
 echo "<td style='font-size:12px; height:20px;'>".number_format(@$plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}
 echo "<td style='font-size:12px; height:20px;'><b>".number_format(@$tplan,0,'.',',')."<b></td></tr>";



$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;
           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>PROD RESULT</th><td style='  padding-left: 90px;'></td>";
      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT SUM(type) FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '8%' 
     and type = '1' AND line_id='19'  ")){
   $i=0;
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];
 $result_array[] = $result[0];
 $php_data_array[] =$result[0];   
 $i++;
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 

















$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['to']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 $tdef=0;
  echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>DEFECT</th><td style='  padding-left: 90px;'></td>";
       for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
if($stmt = $conn2->query("SELECT SUM(division_id) FROM defect_mats WHERE division_id='18' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4'   AND line_id='19' ")){
while ($def = $stmt->fetch_row()){
          $defect_array[]=@$def[0]/18;
 echo "<td style='font-size:12px; height:20px;'>".number_format(@$def[0]/18,0,'.',',')."</td>";
 $tdef+=@$def[0]/18;
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}





echo "<td style='font-size:12px; height:20px;'><b>".number_format($tdef,0,'.',',')."<b></td></tr>";
?>