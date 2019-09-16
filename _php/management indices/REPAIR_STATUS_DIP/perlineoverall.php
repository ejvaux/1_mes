<?php
$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

$fromstart1=date('d',strtotime($_POST['from']));
$toend1=date('d',strtotime($_POST['to']));
$start1=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end1=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['to']));
$start=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

$fromstart4=date('d',strtotime($_POST['from']));
$toend4=date('d',strtotime($_POST['to']));
$start4=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end4=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

$fromstart5=date('d',strtotime($_POST['from']));
$toend5=date('d',strtotime($_POST['to']));
$start5=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end5=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));


$date_array=array();

 echo "  <table class='table table-sm table-responsive' >
<tr align = 'center' > <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>DATE</th><td style='  margin-left: 90px;'></td>"; 

if($stmt = $conn2->query("SELECT created_at  FROM defect_mats WHERE date(created_at) BETWEEN '$from' AND '$to' GROUP BY date(created_at) ")){


while ($def = $stmt->fetch_row()){
   for ($fromstart4; $fromstart4 <=$toend4 ; $fromstart4++) { 
$date_array[]=date('Y-m-d',strtotime($start4));
 echo "<td><strong>".date('Y-m-d',strtotime($start4))."</strong></td>";
$start4=date('Y-m-d H:i:s',strtotime("$start4 +1 days"));
$end4=date('Y-m-d H:i:s',strtotime("$end4 +1 days"));

}}}
     echo "<td width='100px'><b>TOTAL<b></td></tr>";










 echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>REPAIR PLAN</th><td style='  padding-left: 90px;'></td>";
//echo "  <tr align = 'center'> <th width = '100px'>REPAIR PLAN</th>";
$repairplan=200;
$trp=0; $i=1;
if($stmt = $conn2->query("SELECT created_at  FROM defect_mats WHERE date(created_at) BETWEEN '$from' AND '$to' GROUP BY date(created_at) ")){


while ($def = $stmt->fetch_row()){
   for ($fromstart5; $fromstart5 <=$toend5 ; $fromstart5++) { 

 echo "<td>".$repairplan."</td>";
 $trp=$repairplan*$i;
$start5=date('Y-m-d H:i:s',strtotime("$start5 +1 days"));
$end5=date('Y-m-d H:i:s',strtotime("$end5 +1 days"));
$i++;
}}}
     echo "<td width='100px'><b> $trp<b></td></tr>";















 echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>DEFECT QTY</th><td style='  padding-left: 90px;'></td>";

 $tdef=0;//echo "<tr align = 'center'> <th width = '100px'>DEFECT QTY</th>";
   for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE division_id='18' AND created_at>='$start2' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end2' and line_id='$line_id'  ")){

while ($def = $stmt->fetch_row()){
 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tdef+=$def[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
$defect_array[]=$def[0];
}}}
  echo "<td><b>".number_format($tdef,0,'.',',')."<b></td></tr>";



 echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>REPAIRED</th><td style='  padding-left: 90px;'></td>";

 $trep=0;//echo "<tr align = 'center'> <th width = '100px'>REPAIRED</th>";
   for ($fromstart1; $fromstart1 <=$toend1 ; $fromstart1++) { 
if($stmt = $conn2->query("SELECT date(created_at),COUNT(repaired_at) FROM defect_mats WHERE division_id='18' AND created_at>='$start1' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end1' and repair='1' and line_id='$line_id'  ")){

while ($def = $stmt->fetch_row()){
 echo "<td>".number_format($def[1],0,'.',',')."</td>";
 $repaired_array[]=$def[1];
 $repair_array[]=$def[1];
  $trep+=$def[1];
$start1=date('Y-m-d H:i:s',strtotime("$start1 +1 days"));
$end1=date('Y-m-d H:i:s',strtotime("$end1 +1 days"));

}}}
  echo "<td><b>".number_format( $trep,0,'.',',')."<b></td></tr>";


 echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>UNREPAIRED</th><td style='  padding-left: 90px;'></td>";

 $tunrep=0;//echo "<tr align = 'center'> <th width = '100px'>UNREPAIRED</th>";
   for ($fromstart; $fromstart <=$toend ; $fromstart++) { 
if($stmt = $conn2->query("SELECT COUNT(repair), updated_at FROM defect_mats WHERE division_id='18' AND created_at>='$start' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end' and repair='0' and line_id='$line_id'  ")){

while ($def = $stmt->fetch_row()){
 echo "<td>".number_format($def[0],0,'.',',')."</td>";
  $tunrep+=$def[0];
$start=date('Y-m-d H:i:s',strtotime("$start +1 days"));
$end=date('Y-m-d H:i:s',strtotime("$end +1 days"));
$unrepair_array[]=$def[0];
}}}
  echo "<td><b>".number_format($tunrep,0,'.',',')."<b></td></tr>";


$fromstart3=date('d',strtotime($_POST['from']));
$toend3=date('d',strtotime($_POST['to']));
$start3=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end3=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));

  echo "<tr align = 'center'> <th width = '100px' style='position: absolute;
    display: flex;  background: #fff;'>REPAIR RATE %</th><td style='  padding-left: 90px;'></td>";

 $tdef=0;//echo "<tr align = 'center'> <th width = '100px'>REPAIR RATE %</th>";

 $i=0;
   for ($fromstart3; $fromstart3 <=$toend3 ; $fromstart3++) { 
if($stmt = $conn2->query("SELECT COUNT(created_at),count(repair) updated_at FROM defect_mats WHERE division_id='18' AND created_at>='$start3' AND DATE_ADD(created_at, INTERVAL 0 DAY) <='$end3' and line_id='$line_id'   ")){

while ($def = $stmt->fetch_row()){
if ($def[0]==='0') {
  echo "<td>0.00%</td>";
}
else{
 // $rate=$repair_array[$i]/$def[0]*100;
  $rate=$repair_array[$i]/200*100;
 echo "<td>".number_format($rate,2,'.',',')."%</td>";
  $tdef+=$def[0];
 }

$start3=date('Y-m-d H:i:s',strtotime("$start3 +1 days"));
$end3=date('Y-m-d H:i:s',strtotime("$end3 +1 days"));
$i++;
}}} 

if ($trep===0 || $tdef===0) {
  echo "<td>0.00%</td>";
}
else{
 //$trate=$trep/$tdef*100; 
  $trate=$trep/$trp*100;
  echo "<td><b>".number_format($trate,2,'.',',')."%<b></td></tr>";
}



 
echo "<script>
          var DATE_ = ".json_encode( $date_array)."
    </script>";
 echo "<script>
          var REPAIRED = ".json_encode( $repaired_array)."
    </script>";
    
    echo "<script>
    var UNREPAIRED = ".json_encode($unrepair_array)."
    </script>";
    
    getColumn();



 ?>

 