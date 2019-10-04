<?php

$date_array=array();

echo "  <table class='table table-sm table-responsive' >
<tr align = 'center' ><td rowspan='7' width = '100px'><h4 style='margin-top:45%; font-size:auto;'>OVERALL</h4><i>(all shift)</i></td> </tr><tr align = 'center'> <th width = '100px'>WORST RANKING</th>";











$i=1;
if($stmt = $conn2->query("SELECT masterdatabase.dmc_defect_code.DEFECT_NAME FROM masterdatabase.dmc_defect_code JOIN 1_smt.defect_mats ON  masterdatabase.dmc_defect_code.DEFECT_ID=1_smt.defect_mats.defect_id WHERE 1_smt.defect_mats.created_at BETWEEN'$from' AND '$to'  AND 1_smt.defect_mats.process_id='$process_id'   group by 1_smt.defect_mats.defect_id ORDER BY COUNT(1_smt.defect_mats.process_id) DESC LIMIT 0,9 " )){

while ($def_id = $stmt->fetch_row()){

 echo "<td><medium><i>#". $i."</i></medium></td>";
$defectname_array[]=$def_id['0'];
$i++;

}

}
// echo "<td>OTHERS</td>";
$others='OTHERS';
$defectname_array[]=$others;
  echo "<td><i>OTHERS</i></td><td><b>TOTAL<b></td></tr>";







// if($stmt = $conn2->query("SELECT 1_smt.errorlist.error_desc FROM 1_smt.errorlist JOIN 1_smt.defect_mats ON  1_smt.errorlist.id=1_smt.defect_mats.process_id WHERE 1_smt.defect_mats.created_at BETWEEN'$from' AND '$to' and 1_smt.defect_mats.line_id='$line_id'   group by 1_smt.defect_mats.process_id ORDER BY COUNT(1_smt.defect_mats.process_id) DESC LIMIT 0,9 " )){

// while ($def_id = $stmt->fetch_row()){

// echo "<td>". strtoupper($def_id['0'])."</td>";


// }}
// echo "<td>OTHERS</td>";
//  echo "<td><i>OTHERS</i></td><td><b>TOTAL<b></td></tr>";










echo "  
 </tr><tr align = 'center'> <th width = '100px'>DEFECT QTY</th>";
$totaldefect='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'  and process_id='$process_id'     group by defect_id ORDER BY COUNT(defect_id) DESC LIMIT 0,9 " )){

while ($defect = $stmt->fetch_row()){

 echo "<td>".number_format($defect[0],0,'.',',')."</td>";
  $totaldefect+=$defect[0];
$defectqty_array[]=$defect[0];
}}



$finaltotaldefect='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'  and process_id='$process_id'  group by defect_id  ORDER BY COUNT(defect_id) DESC " )){

while ($defect = $stmt->fetch_row()){
  $finaltotaldefect+=$defect[0];

}}
 $totalotherdefectresult= $finaltotaldefect-$totaldefect;


 echo "<td><i>".number_format($totalotherdefectresult,0,'.',',')."</i></td>";
$defectqty_array[]+=$totalotherdefectresult;

 echo "<td>".number_format($finaltotaldefect,0,'.',',')."</td>";





$prodresult='0';
if($stmt = $conn2->query("SELECT count(created_at) FROM pcb WHERE created_at BETWEEN'$from' AND '$to'  and jo_number like '2%' 
   and type = '1' " )){

while ($result = $stmt->fetch_row()){


  $prodresult+=$result[0];

}}


echo "  
 </tr><tr align = 'center'> <th width = '100px'>DEFECT RATE</th>";
$tdqty='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'  and process_id='$process_id'   group by defect_id  ORDER BY COUNT(defect_id) DESC LIMIT 0,9" )){

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

if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'  and process_id='$process_id'   group by defect_id  ORDER BY COUNT(defect_id) DESC LIMIT 0,9" )){

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









$accu_rate=0;
echo "  
 </tr><tr align = 'center'> <th width = '100px'>ACCUMULATIVE RATE</th>";

if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'       group by defect_id ORDER BY COUNT(defect_id) DESC LIMIT 0,9 " )){

while ($def = $stmt->fetch_row()){
  if ($finaltotaldefect<='0') {
    echo "<td> N/A </td>";
  }
  else
  {


$accumulated_rate=$def[0]/$finaltotaldefect*100;
 
 $accu_rate+=$accumulated_rate;
 $accumulated_rate_array[]=$accu_rate;
 echo "<td>".number_format($accu_rate,2,'.',',')."%</td>";

  }

 // $accumulated_rate_array[]=$def[0];
}}




 




























echo "<script>
          var DEFECTNAME = ".json_encode($defectname_array)."
    </script>";
    
    echo "<script>
    var DEFECTQTY = ".json_encode($defectqty_array)."
    </script>";
    
    getColumn();
         

         

         





 ?>