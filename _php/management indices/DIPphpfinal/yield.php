<?php 
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
?>


