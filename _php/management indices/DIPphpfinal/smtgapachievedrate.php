<?php
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




?>