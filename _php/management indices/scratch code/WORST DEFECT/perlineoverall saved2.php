<?php
$date_array=array();

echo "  <table class='table table-sm table-responsive' >
<tr align = 'center' ><td rowspan='7' width = '100px'><h4 style='margin-top:45%; font-size:auto;'>$line</h4><i>(all shift)</i></td> </tr><tr align = 'center'> <th width = '100px'>WORST RANKING</th>";
$i=1;
if($stmt = $conn2->query("SELECT masterdatabase.dmc_defect_code.DEFECT_NAME, masterdatabase.dmc_defect_code.DEFECT_ID, count(1_smt.defect_mats.process_id) FROM masterdatabase.dmc_defect_code JOIN 1_smt.defect_mats ON  masterdatabase.dmc_defect_code.DEFECT_ID=1_smt.defect_mats.defect_id WHERE 1_smt.defect_mats.created_at BETWEEN'$from' AND '$to' AND 1_smt.defect_mats.line_id='$line_id' AND 1_smt.defect_mats.process_id='$process_id'   group by 1_smt.defect_mats.defect_id ORDER BY COUNT(1_smt.defect_mats.process_id) DESC LIMIT 0,9 " )){

while ($worstranking = $stmt->fetch_row()){
  echo "<td><medium><a style='color:darkblue;' href='./worstdefectphp/selectview/defect_info_view.php?name=".$worstranking[0]."&id=".$worstranking[1]."&from=".$f."&to=".$t."&line_id=".$line_id."&process_id=".$process_id. "' target='_blank'><i>#". $i."</a></i></medium></td>";
$defectname_array[]=$worstranking['0'];

$i++;

}

$others='OTHERS';
$defectname_array[]=$others;
  echo "<td><i>OTHERS</i></td><td><b>TOTAL<b></td></tr>";

}






echo "  
 </tr><tr align = 'center'> <th width = '100px'>DEFECT QTY</th>";
$totaldefect='0';
if($stmt = $conn2->query("
  SELECT
    count(defect_id), date(created_at) 
  FROM defect_mats 
  WHERE created_at BETWEEN '$from' AND  '$to' 
  AND line_id='$line_id' 
  AND process_id='$process_id'     
  GROUP BY defect_id ORDER BY COUNT(defect_id) DESC LIMIT 0,9 " )){

while ($defect = $stmt->fetch_row()){

 echo "<td>".number_format($defect[0],0,'.',',')."</td>";
  $totaldefect+=$defect[0];
$defectqty_array[]=$defect[0];
}}



$finaltotaldefect='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to' and line_id='$line_id' and process_id='$process_id'  group by defect_id  ORDER BY COUNT(defect_id) DESC " )){

while ($defect = $stmt->fetch_row()){
  $finaltotaldefect+=$defect[0];

}}
 $totalotherdefectresult= $finaltotaldefect-$totaldefect;


 echo "<td><i>".number_format($totalotherdefectresult,0,'.',',')."</i></td>";
$defectqty_array[]+=$totalotherdefectresult;

 echo "<td>".number_format($finaltotaldefect,0,'.',',')."</td>";





$prodresult='0';
if($stmt = $conn2->query("SELECT count(created_at) FROM pcb WHERE created_at>='$from' AND created_at <='$to' and line_id='$line_id' and jo_number like '2%' 
   and type = '1' and PDLINE_NAME like '$line'" )){

while ($result = $stmt->fetch_row()){


  $prodresult+=$result[0];

}}






echo "  
 </tr><tr align = 'center'> <th width = '100px'>DEFECT RATE</th>";

if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to' and line_id='$line_id' and process_id='$process_id'   group by defect_id  ORDER BY COUNT(defect_id) DESC LIMIT 0,9" )){

while ($defectrate = $stmt->fetch_row()){

//$def[0]<=is_bool('0') ||
  if( $prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{
  $defectplusprodresult=$defectrate[0]+$prodresult;
$defectdividedbydefectplusprodresult=$defectrate[0]/$defectplusprodresult;
$defectdividedbydefectplusprodresulttimes100=$defectdividedbydefectplusprodresult*100;
 //PER RATE RESULT
 echo "<td>".number_format($defectdividedbydefectplusprodresulttimes100,2,'.',',')."%</td>";
 //PER RATE RESULT
}}
//$tdqtywithotherresult<=is_bool('0') ||
  if( $prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}
else{
$othersdefectplusprodresult= $totalotherdefectresult+$prodresult;
  $othersdefectdividedbyothersdefectplusprodresult= $totalotherdefectresult/$othersdefectplusprodresult;
$othersdefectdividedbyothersdefectplusprodresulttimes100=$othersdefectdividedbyothersdefectplusprodresult*100;
//OTHERS RATE RESULT
 echo "<td>".number_format($othersdefectdividedbyothersdefectplusprodresulttimes100,2,'.',',')."%</td>";
//OTHERS RATE RESULT

    $finaldefectplusprodresult=$finaltotaldefect+$prodresult;
    $finaltotaldefectdividedbyfinaldefectplusprodresult=$finaltotaldefect/$finaldefectplusprodresult;
    $finaltotaldefectdividedbyfinaldefectplusprodresulttimes100=$finaltotaldefectdividedbyfinaldefectplusprodresult*100;
//TOTAL RATE RESULT
 echo "<td>".number_format($finaltotaldefectdividedbyfinaldefectplusprodresulttimes100,2,'.',',')."%</td>";
 //TOTAL RATE RESULT
 }}






echo "  
 </tr><tr align = 'center'> <th width = '100px'>DPM</th>";
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to' and line_id='$line_id' and process_id='$process_id'   group by defect_id  ORDER BY COUNT(defect_id) DESC LIMIT 0,9" )){

while ($defectdpm = $stmt->fetch_row()){
  //$def[0]<=is_bool('0')||
if($prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{
$defectdpmplusprodresult=$defectdpm[0]+$prodresult;
  $defectdpmdividedbydefectdpmplusprodresult=$defectdpm[0]/$defectdpmplusprodresult;
$defectdpmdividedbydefectdpmplusprodresulttime1000000=$defectdpmdividedbydefectdpmplusprodresult*1000000;
//PER DPM RESULT
 echo "<td>".number_format($defectdpmdividedbydefectdpmplusprodresulttime1000000,0,'.',',')."</td>";
//PER DPM RESULT                               
}


}
//$tdqtywithotherresult<=is_bool('0') ||
if( $prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{
        $otherdefectplusprodresult=$totalotherdefectresult+$prodresult;
        $otherdefectdividedbyotherdefectplusprodresult=$totalotherdefectresult/$otherdefectplusprodresult;
$otherdefectdividedbyotherdefectplusprodresulttimes1000000=$otherdefectdividedbyotherdefectplusprodresult*1000000;
//OTHERS DPM RESULT
 echo "<td>".number_format($otherdefectdividedbyotherdefectplusprodresulttimes1000000,0,'.',',')."</td>";
//OTHERS DPM RESULT
}





//$tdqty<=is_bool('0')||
if($prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{

    $finaltotaldefectplusprodresult=$finaltotaldefect+$prodresult;
    $finaltotaldefectdividedbyfinaltotaldefectplusprodresult=$finaltotaldefect/$finaltotaldefectplusprodresult;
    $finaltotaldefectdividedbyfinaltotaldefectplusprodresulttimes1000000=$finaltotaldefectdividedbyfinaltotaldefectplusprodresult*1000000;
//TOTAL DPM RESULT
 echo "<td>".number_format($finaltotaldefectdividedbyfinaltotaldefectplusprodresulttimes1000000,0,'.',',')."</td>";
 //TOTAL DPM RESULT
}
}





echo "  
 </tr><tr align = 'center'> <th width = '100px'>ACCUMULATIVE RATE</th>";

//AUGUST 30, 2019 FRIDAY... CONTINUE ON SEPTEMBER 2, 2019 MONDAY...
//AUGUST 30, 2019 FRIDAY... CONTINUE ON SEPTEMBER 2, 2019 MONDAY...
//AUGUST 30, 2019 FRIDAY... CONTINUE ON SEPTEMBER 2, 2019 MONDAY...
//AUGUST 30, 2019 FRIDAY... CONTINUE ON SEPTEMBER 2, 2019 MONDAY...
//AUGUST 30, 2019 FRIDAY... CONTINUE ON SEPTEMBER 2, 2019 MONDAY...
//AUGUST 30, 2019 FRIDAY... CONTINUE ON SEPTEMBER 2, 2019 MONDAY...







echo "<script>
          var DEFECTNAME = ".json_encode($defectname_array)."
    </script>";
    
    echo "<script>
    var DEFECTQTY = ".json_encode($defectqty_array)."
    </script>";
    
    getColumn();
         











?>