<?php

$date_array=array();

echo "  <table class='table table-sm table-responsive' >
<tr align = 'center'> <th width = '100px'>WORST RANKING</th>";











$i=1;
if($stmt = $conn2->query("SELECT masterdatabase.dmc_defect_code.DEFECT_NAME FROM masterdatabase.dmc_defect_code JOIN 1_smt.defect_mats ON  masterdatabase.dmc_defect_code.DEFECT_ID=1_smt.defect_mats.defect_id WHERE 1_smt.defect_mats.created_at BETWEEN'$from' AND '$to'     group by 1_smt.defect_mats.defect_id ORDER BY COUNT(1_smt.defect_mats.process_id) DESC LIMIT 0,9 " )){

while ($def_id = $stmt->fetch_row()){

 echo "<td><medium><i>#". $i."</i></medium></td>";
$defectname_array[]=$def_id['0'];
$i++;
}}
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
$tdqty='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'       group by defect_id ORDER BY COUNT(defect_id) DESC LIMIT 0,9 " )){

while ($def = $stmt->fetch_row()){

 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tdqty+=$def[0];
  $defectqty_array[]=$def[0];
}}




$tdqtywithother='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'    group by defect_id  ORDER BY COUNT(defect_id) DESC " )){

while ($def = $stmt->fetch_row()){
  $tdqtywithother+=$def[0];

}}
 $tdqtywithotherresult= $tdqtywithother-$tdqty;
$tdqty+=$tdqtywithotherresult;

 echo "<td><i>".number_format($tdqtywithotherresult,0,'.',',')."</i></td>";
$defectqty_array[]+=$tdqtywithotherresult;


 echo "<td>".number_format($tdqty,0,'.',',')."</td>";











//defect/defect+result * 100;
$prodresult='0';
if($stmt = $conn2->query("SELECT count(created_at) FROM pcb WHERE created_at>='$from' AND created_at <='$to'  and jo_number like '2%' 
   and type = '1' group by created_at" )){

while ($def = $stmt->fetch_row()){


  $prodresult+=$def[0];

}}


echo "  
 </tr><tr align = 'center'> <th width = '100px'>DEFECT RATE</th>";
$tdqty='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'     group by defect_id  ORDER BY COUNT(defect_id) DESC LIMIT 0,9" )){

while ($def = $stmt->fetch_row()){

//$def[0]<=is_bool('0') ||
  if( $prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{
  $rate1=$def[0]+$prodresult;
$rate11=$def[0]/$rate1;
$rate=$rate11*100;

//PER RATE RESULT
//PER RATE RESULT
//PER RATE RESULT
//PER RATE RESULT
//PER RATE RESULT
//PER RATE RESULT
//PER RATE RESULT
 echo "<td>".number_format($rate,2,'.',',')."%</td>";
  $tdqty+=$def[0];
}


}
//$tdqtywithotherresult<=is_bool('0') ||
  if( $prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{
$rate11=$tdqtywithotherresult+$prodresult;
  $rate111=$tdqtywithotherresult/$rate11;
$rate1=$rate111*100;
//OTHERS RATE RESULT
//OTHERS RATE RESULT
//OTHERS RATE RESULT
//OTHERS RATE RESULT
//OTHERS RATE RESULT
//OTHERS RATE RESULT
 echo "<td>".number_format($rate1,2,'.',',')."%</td>";
   $totalperandothersqty=$tdqtywithotherresult+$tdqty;
    $rate4=$totalperandothersqty+$prodresult;
    $rate5=$totalperandothersqty/$rate4;
    $rate2=$rate5*100;
$rate3=$rate2;
//TOTAL RATE RESULT
//TOTAL RATE RESULT
//TOTAL RATE RESULT
//TOTAL RATE RESULT
//TOTAL RATE RESULT
 echo "<td>".number_format($rate3,2,'.',',')."%</td>";
 }
}




















echo "  
 </tr><tr align = 'center'> <th width = '100px'>DPM</th>";
$tdqty='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'     group by defect_id  ORDER BY COUNT(defect_id) DESC LIMIT 0,9" )){

while ($def = $stmt->fetch_row()){
  //$def[0]<=is_bool('0')||
if($prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{

$rate22=$def[0]+$prodresult;
  $rate2=$def[0]/$rate22;
$rate=$rate2*1000000;
//PER DPM RESULT
//PER DPM RESULT
//PER DPM RESULT
//PER DPM RESULT
//PER DPM RESULT
//PER DPM RESULT

 echo "<td>".number_format($rate,0,'.',',')."</td>";
  $tdqty+=$def[0];
}


}

//$tdqtywithotherresult<=is_bool('0') ||
if( $prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{
        $rate11=$tdqtywithotherresult+$prodresult;
        $rate111=$tdqtywithotherresult/$rate11;
$rate1=$rate111*1000000;
//OTHERS DPM RESULT
//OTHERS DPM RESULT
//OTHERS DPM RESULT
//OTHERS DPM RESULT
//OTHERS DPM RESULT
//OTHERS DPM RESULT
//OTHERS DPM RESULT
 echo "<td>".number_format($rate1,0,'.',',')."</td>";
}




//$tdqty<=is_bool('0')||
if($prodresult<=is_bool('0')){
echo "<td>N/A</td>";
}

else{

    $totalperandothersqty=$tdqtywithotherresult+$tdqty;
    $rate4=$totalperandothersqty+$prodresult;
    $rate5=$totalperandothersqty/$rate4;
    $rate2=$rate5*1000000;
$rate3=$rate2;
//TOTAL DPM RESULT
//TOTAL DPM RESULT
//TOTAL DPM RESULT
//TOTAL DPM RESULT
//TOTAL DPM RESULT
//TOTAL DPM RESULT
//TOTAL DPM RESULT
 echo "<td>".number_format($rate3,0,'.',',')."</td>";
}
}







 $accu_rate=0;
echo "  
 </tr><tr align = 'center'> <th width = '100px'>ACCUMULATIVE RATE</th>";

if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'       group by defect_id ORDER BY COUNT(defect_id) DESC LIMIT 0,9 " )){

while ($def = $stmt->fetch_row()){
  if ($tdqtywithother<='0') {
    echo "<td> N/A </td>";
  }
  else
  {
$accumulated_rate=$def[0]/$tdqtywithother*100;
 
 $accu_rate+=$accumulated_rate;
 $accumulated_rate_array[]=$accu_rate;
 echo "<td>".number_format($accu_rate,2,'.',',')."%</td>";

  }

 // $accumulated_rate_array[]=$def[0];
}}





if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to'    group by defect_id  ORDER BY COUNT(defect_id) DESC " )){

while ($def = $stmt->fetch_row()){


}}
if ($tdqtywithother==='0') {
  echo '<td><i>0</i></td>';

}
else{
 $tdqtywithotherresult= $tdqtywithother-$tdqty;

$tdqty+=$tdqtywithotherresult;
$accumulated_rate_others=$tdqtywithotherresult/$tdqtywithother*100;

 $accu_rate+=number_format($accumulated_rate_others,2,'.',',');
$accumulated_rate_array[]+=$accu_rate;
 echo "<td><i>".number_format($accu_rate,2,'.',',')."%</i></td>";


$tdqty_accumulated_rate=$tdqtywithother/$tdqtywithother*100;
 echo "<td>-</td>";
}






















 
echo "<script>
          var DEFECTNAME = ".json_encode($defectname_array)."
    </script>";
    
    echo "<script>
    var DEFECTQTY = ".json_encode($defectqty_array)."
    </script>";

        echo "<script>
    var ACCUMULATIVE = ".json_encode($accumulated_rate_array)."
    </script>";
    
    getColumn();
         
 

         





 ?>