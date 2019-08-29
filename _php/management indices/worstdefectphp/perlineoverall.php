<?php

$date_array=array();

echo "  <table class='table table-sm table-responsive' >
<tr align = 'center' ><td rowspan='7' width = '100px'><h4 style='margin-top:45%; font-size:auto;'>$line</h4><i>(all shift)</i></td> </tr><tr align = 'center'> <th width = '100px'>WORST RANKING</th>";








////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//COMMENT 1_SMT CONNECT TO MASTERDATABASE
$i=1;
if($stmt = $conn2->query("SELECT masterdatabase.dmc_defect_code.DEFECT_NAME, masterdatabase.dmc_defect_code.DEFECT_ID, count(1_smt.defect_mats.process_id) FROM masterdatabase.dmc_defect_code JOIN 1_smt.defect_mats ON  masterdatabase.dmc_defect_code.DEFECT_ID=1_smt.defect_mats.defect_id WHERE 1_smt.defect_mats.created_at BETWEEN'$from' AND '$to' AND 1_smt.defect_mats.line_id='$line_id' AND 1_smt.defect_mats.process_id='$process_id'   group by 1_smt.defect_mats.defect_id ORDER BY COUNT(1_smt.defect_mats.process_id) DESC LIMIT 0,9 " )){

while ($def_id = $stmt->fetch_row()){

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //echo "<td><medium><button style='color:darkblue; border-style:none; background-color:transparent;' data-toggle='modal' data-target='#".$def_id['1']."' ><i>". strtoupper($def_id['0'])."</button></i></medium></td>";
  echo "<td><medium><a style='color:darkblue;' href='./worstdefectphp/selectview/defect_info_view.php?name=".$def_id[0]."&id=".$def_id[1]."&from=".$f."&to=".$t."&line_id=".$line_id."&process_id=".$process_id. "' target='_blank'><i>#". $i."</a></i></medium></td>";
$defectname_array[]=$def_id['0'];

$i++;
?>






<!-- Modal -->
<!--
<div id="<?php echo $def_id['1']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">


      <?php 
       // include 'modalview.php';



          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

-->






<?php




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////















}

$others='OTHERS';
$defectname_array[]=$others;
  echo "<td><i>OTHERS</i></td><td><b>TOTAL<b></td></tr>";

}
// echo "<td>OTHERS</td>";






// if($stmt = $conn2->query("SELECT 1_smt.errorlist.error_desc FROM 1_smt.errorlist JOIN 1_smt.defect_mats ON  1_smt.errorlist.id=1_smt.defect_mats.process_id WHERE 1_smt.defect_mats.created_at BETWEEN'$from' AND '$to' and 1_smt.defect_mats.line_id='$line_id'   group by 1_smt.defect_mats.process_id ORDER BY COUNT(1_smt.defect_mats.process_id) DESC LIMIT 0,9 " )){

// while ($def_id = $stmt->fetch_row()){

// echo "<td>". strtoupper($def_id['0'])."</td>";


// }}
// echo "<td>OTHERS</td>";
//  echo "<td><i>OTHERS</i></td><td><b>TOTAL<b></td></tr>";










echo "  
 </tr><tr align = 'center'> <th width = '100px'>DEFECT QTY</th>";
$tdqty='0';
if($stmt = $conn2->query("
  SELECT
    count(defect_id), date(created_at) 
  FROM defect_mats 
  WHERE created_at BETWEEN '$from' AND  '$to' 
  AND line_id='$line_id' 
  AND process_id='$process_id'     
  GROUP BY defect_id ORDER BY COUNT(defect_id) DESC LIMIT 0,9 " )){

while ($def = $stmt->fetch_row()){

 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tdqty+=$def[0];
$defectqty_array[]=$def[0];
}}




$tdqtywithother='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to' and line_id='$line_id' and process_id='$process_id'  group by defect_id  ORDER BY COUNT(defect_id) DESC " )){

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
if($stmt = $conn2->query("SELECT count(created_at) FROM pcb WHERE created_at>='$from' AND created_at <='$to' and line_id='$line_id' and jo_number like '2%' 
   and type = '1' and PDLINE_NAME like '$line'" )){

while ($def = $stmt->fetch_row()){


  $prodresult+=$def[0];

}}


echo "  
 </tr><tr align = 'center'> <th width = '100px'>DEFECT RATE</th>";
$tdqty='0';
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to' and line_id='$line_id' and process_id='$process_id'   group by defect_id  ORDER BY COUNT(defect_id) DESC LIMIT 0,9" )){

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
if($stmt = $conn2->query("SELECT  count(defect_id), date(created_at) FROM defect_mats WHERE created_at>='$from' AND created_at <='$to' and line_id='$line_id' and process_id='$process_id'   group by defect_id  ORDER BY COUNT(defect_id) DESC LIMIT 0,9" )){

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



 
echo "<script>
          var DEFECTNAME = ".json_encode($defectname_array)."
    </script>";
    
    echo "<script>
    var DEFECTQTY = ".json_encode($defectqty_array)."
    </script>";
    
    getColumn();
         





 ?>