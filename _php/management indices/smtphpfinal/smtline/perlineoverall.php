<?php
$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['to']));
$start=date('Y-m-d',strtotime($_POST['from']));
$end=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to=date($_POST['to']);
$Linename=$_POST['Linename'];
$day=date('d',strtotime($_POST['from']));


echo "
    <div id='dvDataSMT'> <table class='table table-sm table-responsive' >
<tr align = 'center' ><strong> $Linename (OVERALL)</strong><th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>DATE</th><td style='  padding-left: 90px;'></td>"; 
      for ($fromstart; $fromstart <=$toend ; $fromstart++) { 
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end' and JOB_ORDER_NO like'2%' and MACHINE_CODE='$line'   ")){
    
  
  while ($date = $stmt->fetch_row()) {
    echo "<td><b>".date('Y-m-d',strtotime($start))."<b></td>";
  $date_array[] = $date;



  $start=date('Y-m-d',strtotime("$start +1 days"));
$end=date('Y-m-d',strtotime("$end +1 days"));

  }}}
     echo "<td width='100px'><b>TOTAL<b></td></tr>";


$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['to']));
$start1=date('Y-m-d',strtotime($_POST['from']));
$end1=date('Y-m-d',strtotime($_POST['from'].'+1 days' ));
$tplan=0;  
 echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>PROD PLAN</th><td style='  padding-left: 90px;'></td>";    for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
    if($stmt = $conn1->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ >='$start1' AND DATE_ADD(DATE_, INTERVAL 1 DAY) <='$end1' and JOB_ORDER_NO like'2%' and MACHINE_CODE like '$line' ")){

  while ($plan = $stmt->fetch_row()){
    $tplan+=$plan[1];
    echo "<td>".number_format($plan[1],0,'.',',')."</td>";
    $job_array[]=$plan[1];
//$php_data_array[] = $row;

      $start1=date('Y-m-d',strtotime("$start1 +1 days"));
$end1=date('Y-m-d',strtotime("$end1 +1 days"));

  }}}
  echo "<td><b>".number_format($tplan,0,'.',',')."<b></td></tr>";




$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;
         echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>PROD RESULT</th><td style='  padding-left: 90px;'></td>";
      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT count(id), Month(created_at),day(created_at),time(created_at), created_at FROM pcb WHERE created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and jo_number like '2%' 
     and type = '1' and PDLINE_NAME like '$line'  ")){

   $i=0;
  while ($result = $stmt->fetch_row()){

 echo "<td>".number_format($result[0],0,'.',',') ."</td>";



 $tresult+=$result[0];
      $result_array[] = $result[0];
$php_data_array[] =$result[0];   $i++;

$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));

}}}


echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 



$fromstart7=date('d',strtotime($_POST['from']));
$toend7=date('d',strtotime($_POST['to']));
$start7=date('Y-m-d H:i:s',strtotime($_POST['from'].' 18:00:00'));
$end7=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
$tgap=0;$i=0; //------------------------------------ 
   echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>GAP</th><td style='  padding-left: 90px;'></td>";
      for ($fromstart7; $fromstart7 <=$toend7 ; $fromstart7++) { 

    @$gap = $job_array[$i] - $result_array[$i];
     echo "<td>".number_format($gap,0,'.',',')."</td>";
     $tgap = $tplan - $tresult;
    $i++;}
     echo "<td><b>".number_format($tgap,0,'.',',')."<b></td></tr>";










$fromstart3=date('d',strtotime($_POST['from']));
$toend3=date('d',strtotime($_POST['to']));
$start3=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end3=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
$trate=0;    $i=0; //------------------------------------ 
   echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>ACHIEVE RATE</th><td style='  padding-left: 90px;'></td>";
      for ($fromstart3; $fromstart3 <=$toend3 ; $fromstart3++) { 
if ($job_array[$i]<='0'||$result_array[$i]<='0') {
  echo "<td>N/A</td>";
}

else{
   // echo $gp[1]."//".$gp[2]."///";
    @$rate1 = $result_array[$i] /  $job_array[$i]*100;
    $trate += $rate1;
  echo "<td>".number_format($rate1,2,'.',',')."%</td>";

   }
 $i++;
}
if ($tplan===0) {

     echo "<td><b>N/A%</b></td></tr>";
}
else{
$w=(($tresult/$tplan)*100);
     echo "<td><b>".number_format($w,2,".",',')."%</b></td></tr>";
}
 //number_format($trate,2,'.',',')."% of ".





$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['to']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
 $tdef=0;
  echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>DEFECT</th><td style='  padding-left: 90px;'></td>";
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='2' AND created_at>='$start4' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end4' and line_id='$line_id'  ")){

while ($def = $stmt->fetch_row()){
    $defect_array[]=$def[0];
 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tdef+=$def[0];

$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}
  echo "<td><b>".number_format($tdef,0,'.',',')."<b></td></tr>";








$fromstart5=date('d',strtotime($_POST['from']));
$toend5=date('d',strtotime($_POST['to']));
$start5=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end5=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
$tinput=0;     
echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>INPUT</th><td style='  padding-left: 90px;'></td>";
 for ($fromstart5; $fromstart5 <=$toend5 ; $fromstart5++) { 
  if($stmt = $conn2->query("SELECT jo_number, COUNT(PROCESS_NAME) FROM pcb 
  WHERE created_at>='$start5' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end5'
   AND jo_number LIKE '2%'  and PDLINE_NAME like '$line' and PROCESS_NAME  like 'SMT.INPUT%' ")){

while ($input = $stmt->fetch_row()){
$input_array[]=$input[1];
$tinput+=$input[1];
echo "<td>". number_format($input[1],0,".",",")."</td>";
$start5=date('Y-m-d H:i:s',strtotime("$start5 +1 days"));
$end5=date('Y-m-d H:i:s',strtotime("$end5 +1 days"));

}}}
echo "<td><b>". number_format($tinput,0,".",",")."<b></td></tr>";





$tyield=0;
echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>YIELD</th><td style='  padding-left: 90px;'></td>";

$fromstart6=date('d',strtotime($_POST['from']));
$toend6=date('d',strtotime($_POST['to']));
$start6=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end6=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
$output1=0; $output2=0; $yield=0;$i=0;
   for ($fromstart6; $fromstart6 <=$toend6 ; $fromstart6++) {
 //  $output[0]= $result_array[$i];
//$output[1]=$input_array[$i];
@$output1= $result_array[$i] + $defect_array[$i];
@$output2=$result_array[$i]/$output1;
$i++;
if ($output1<='0') {
  echo "<td>0.00%</td>";
}
else{

 $yield=$output2*100;
//echo $output[2]."//";
echo "<td>". number_format($yield,2,".",",")." %</td>";
 }


}

if ($tresult===0 || $tinput===0) {
  echo "<td>0.00%</td>";
}
else{
//$tyield=(($tresult/$tinput)*100);
 $tresdef=$tresult+$tdef;
$tyield=(($tresult/$tresdef)*100);
echo "<td><b>". number_format($tyield,2,".",",")."%<b></td></tr>";  
}



 echo "</div>
<a href='x' class='btn btn-sm btn-outline-info' download='down.xls' id='btnExportSMT'>
EXPORT 
    </a>
 <script>
          var PLAN = ".json_encode($date_array)."
    </script>";
    
    echo "<script>
    var RESULT = ".json_encode($php_data_array)."
    </script>";
    
    getColumn();
?>
<script type="text/javascript">$('#btnExportSMT').click(function (e) {
    $(this).attr({
        'download': "<?php echo $_POST['Linename']; ?> (DAY&NIGHT) <?php echo $_POST['from']; ?>.xls",
            'href': 'data:application/csv;charset=utf-8,' + encodeURIComponent( $('#dvDataSMT').html())
    })
});</script>