<?php
  echo "  <table class='table table-sm table-responsive' >
<tr align = 'center' ><strong>OVERALL </strong> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>DATE</th><td style='  padding-left:90px;'></td>";
 
if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO LIKE '1%'  group by mis_prod_plan_dl.DATE_")){

while ($row = $stmt->fetch_row()) {
  echo "<td><b>$row[0]</b></td>";
$date_array[]=$row;
} 
  echo "<td><b>TOTAL</b></td></tr>";}


$tplan=0;
  if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO LIKE '1%'  group by mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center' > <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>PROD PLAN</th><td style='  padding-left:90px;'></td>";
while ($row = $stmt->fetch_row()){
  $tplan+=$row[1];
echo "<td>".number_format($row[1], 0, '.', ', ')."</td>";

}
 echo "<td><b>".number_format($tplan, 0, '.', ', ')."<b></td></tr>";}




$tresult=0;
 if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO LIKE '1%'  group by mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center' > <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>PROD RESULT</th><td style='  padding-left:90px;'></td>";
while ($row = $stmt->fetch_row()){
  $tresult+=$row[2];
echo "<td>".number_format($row[2], 0, '.', ', ')."</td>";
   $php_data_array[] = $row[2];
 } 
 echo "<td><b>".number_format($tresult, 0, '.', ', ')."<b></td></tr>";}





$tgap=0;
if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO LIKE '1%'  group by mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center' > <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>GAP</th><td style='  padding-left:90px;'></td>";
while ($row = $stmt->fetch_row()){
  $gap = $row[1] - $row[2];
   echo "<td>".number_format($gap, 0, '.', ', ')."</td>";}  $tgap=$tplan-$tresult;
 echo "<td><b>".number_format($tgap, 0, '.', ', ')."<b></td></tr>";}





 $i=0;

if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO LIKE '1%'  group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center' > <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>ACHIEVE RATE %</th><td style='  padding-left:90px;'></td>";

while ($row = $stmt->fetch_row()){
 $number = ($row[2] / $row[1])*100;
      $rate = number_format($number, 2, '.', ',');

  echo "<td>".number_format($rate, 2, '.', ',')."%</td>";
  $i++;}

@$trate=($tresult/$tplan) *100;
echo "<td><b>".number_format($trate, 2, '.', ',')."%<b></td></tr>";
}




  echo "<tr align = 'center' > <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>INPUT</th><td style='  padding-left:90px;'></td>";

$tinput=0;
if($stmt = $conn1->query("SELECT SUM(mis_product.ACTUAL_QTY) FROM mis_product, mis_prod_plan_dl WHERE mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO AND mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO LIKE '1%'  group by mis_prod_plan_dl.DATE_")){

while ($input = $stmt->fetch_row()){
   echo "<td>".number_format($input[0], 0, '.', ', ')."</td>";
   $input_array[]=$input[0];
$tinput+=$input[0];}
echo "<td><b>".number_format($tinput, 0, '.', ', ')."<b></td></tr>";}


 echo "<tr align = 'center' > <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>YIELD</th><td style='  padding-left:90px;'></td>";

$tyield=0;$i=0;
if($stmt = $conn1->query("SELECT SUM(mis_product.ACTUAL_QTY) FROM mis_product, mis_prod_plan_dl WHERE mis_product.JO_NUM =  mis_prod_plan_dl.JOB_ORDER_NO   AND mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO LIKE '1%'  group by mis_prod_plan_dl.DATE_")){

while ($row = $stmt->fetch_row()){

$yield=($php_data_array[$i]/$row[0])*100;

echo "<td>".number_format($yield, 2, '.', ',')."%</td>";
$i++;
}}
@$tyield=($tresult/$tinput)*100;
echo "<td><b>".number_format($tyield, 2, '.', ',')."%<b></td></tr>";



 echo "<script>
          var PLAN = ".json_encode(@$date_array)."
    </script>";
    
    echo "<script>
    var RESULT = ".json_encode(@$php_data_array)."
    </script>";
    
    getColumn();
?>


