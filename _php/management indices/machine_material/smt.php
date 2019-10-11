<?php
$fromstart=date('d',strtotime($_POST['from']));
$toend=date('d',strtotime($_POST['to']));
$start=date('Y-m-d',strtotime($_POST['from']));
$end=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to=date($_POST['to']);
$colspan=3;





echo "<a href='x' class='btn btn-sm btn-outline-info' download='down.xls' id='btnExportSMT'>
Export 
    </a>
    <div id='dvDataSMT'>";



echo "   <table class='table table-sm table-responsive' >

<tr align = 'center' ><th width = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>DATE</th><td style='  padding-left: 100px;'></td>";

    for ($fromstart; $fromstart <=$toend ; $fromstart++) {
      echo "<td  style='font-size:12px; height:20px;'><strong> $start </strong></td>";

  $start=date('Y-m-d',strtotime("$start +1 days"));
$end=date('Y-m-d',strtotime("$end +1 days"));
$colspan++;
}

/*      echo "<td  width='100px' style='font-size:12px; height:20px;'><b>TOTAL<b></td>";*/
?>
</tr>
        <th colspan="<?php echo $colspan; ?>" style="background-color: gray;"><span>SMTL1</span></th>


<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>CM602-01</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'CM602-01'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

 $code1_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>
</tr>





<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>CM402-01</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'CM402-01'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

  $code11_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>
</tr>









	<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>DT401-01</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'DT401-01'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];
 $code111_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>


</tr>
 

	        

<?php 

$i=0; 

/*echo "<tr align = 'center' ><td colspan=".$colspan."  style='  padding-left: 100px;  border-top:6;'></td>";
*/

$fromstart11=date('d',strtotime($_POST['from']));
$toend11=date('d',strtotime($_POST['to']));
$start11=date('Y-m-d',strtotime($_POST['from']));
$end11=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to11=date($_POST['to']);
 for ($fromstart11; $fromstart11 <=$toend11 ; $fromstart11++) {


 	 @$Ttl=$code1_array[$i]+$code11_array[$i]+$code111_array[$i];


     /* echo "<td  style='font-size:12px; height:20px;'><strong>". $Ttl ."</strong></td>";*/

$i++;
  $start11=date('Y-m-d',strtotime("$start11 +1 days"));
$end11=date('Y-m-d',strtotime("$end11 +1 days"));

}

     
?>


      
      </tr>
















 <th colspan="<?php echo $colspan; ?>" style="background-color: gray;"><span>SMTL2</span></th>


<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>CM602-02</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'CM602-02'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

 $code1_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>

</tr>




<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>CM402-02</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'CM402-02'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

  $code11_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>
</tr>









	<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>DT401-02</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'DT401-02'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];
 $code111_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>
</tr>


	        

<?php 

$i=0; 



$fromstart11=date('d',strtotime($_POST['from']));
$toend11=date('d',strtotime($_POST['to']));
$start11=date('Y-m-d',strtotime($_POST['from']));
$end11=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to11=date($_POST['to']);
 for ($fromstart11; $fromstart11 <=$toend11 ; $fromstart11++) {


 	 @$Ttl=$code1_array[$i]+$code11_array[$i]+$code111_array[$i];


     /* echo "<td  style='font-size:12px; height:20px;'><strong>". $Ttl ."</strong></td>";*/

$i++;
  $start11=date('Y-m-d',strtotime("$start11 +1 days"));
$end11=date('Y-m-d',strtotime("$end11 +1 days"));

}

     
?>

</tr>


<?php 

$i=0; 


$fromstart11=date('d',strtotime($_POST['from']));
$toend11=date('d',strtotime($_POST['to']));
$start11=date('Y-m-d',strtotime($_POST['from']));
$end11=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to11=date($_POST['to']);
 for ($fromstart11; $fromstart11 <=$toend11 ; $fromstart11++) {


 	 @$Ttl=$code1_array[$i]+$code11_array[$i]+$code111_array[$i];


     /* echo "<td  style='font-size:12px; height:20px;'><strong>". $Ttl ."</strong></td>";*/

$i++;
  $start11=date('Y-m-d',strtotime("$start11 +1 days"));
$end11=date('Y-m-d',strtotime("$end11 +1 days"));

}

     
?>


      
      </tr>
















 <th colspan="<?php echo $colspan; ?>" style="background-color: gray;"><span>SMTL3</span></th>


<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>CM602-03</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'CM602-03'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

 $code1_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>

</tr>






<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>CM402-03</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'CM402-03'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

  $code11_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>
</tr>









	<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>DT401-03</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'DT401-03'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];
 $code111_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>
</tr>


	        

<?php 

$i=0; 



$fromstart11=date('d',strtotime($_POST['from']));
$toend11=date('d',strtotime($_POST['to']));
$start11=date('Y-m-d',strtotime($_POST['from']));
$end11=date('Y-m-d',strtotime($_POST['from'].'+1 days'));
$to11=date($_POST['to']);
 for ($fromstart11; $fromstart11 <=$toend11 ; $fromstart11++) {


 	 @$Ttl=$code1_array[$i]+$code11_array[$i]+$code111_array[$i];


     /* echo "<td  style='font-size:12px; height:20px;'><strong>". $Ttl ."</strong></td>";*/

$i++;
  $start11=date('Y-m-d',strtotime("$start11 +1 days"));
$end11=date('Y-m-d',strtotime("$end11 +1 days"));

}

     
?>






</tr>
























 <th colspan="<?php echo $colspan; ?>" style="background-color: gray;"><span>SMTL6</span></th>


<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>CM602-05</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'CM602-05'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

 $code1_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>

</tr>





<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>CM402-04</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'CM402-04'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

  $code11_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>
</tr>





























 <th colspan="<?php echo $colspan; ?>" style="background-color: gray;"><span>SMTL12</span></th>


<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>NPMD3-01</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'NPMD3-01'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

 $code1_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>

</tr>






<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>NPMTT2-01</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'NPMTT2-01'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

  $code11_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>














</tr>








 <th colspan="<?php echo $colspan; ?>" style="background-color: gray;"><span>SMTL13</span></th>


<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>NPMD3-02</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'NPMD3-02'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

 $code1_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>

</tr>





<?php

$fromstart2=date('d',strtotime($_POST['from']));
$toend2=date('d',strtotime($_POST['to']));
$start2=date('Y-m-d H:i:s',strtotime($_POST['from'].' 06:00:00'));
$end2=date('Y-m-d H:i:s',strtotime($_POST['from'].'+1 days'.' 05:59:59' ));
  $tresult=0;


           echo "<tr align = 'center'> <th w2dth = '100px' style='position: absolute;
    display: flex;  background: #fff; font-size:12px; height:20px;'>NPMTT2-02</th><td style='  padding-left: 90px;'></td>";

      for ($fromstart2; $fromstart2 <=$toend2 ; $fromstart2++) { 
   if($stmt = $conn2->query("SELECT COUNT(a.created_at) FROM mat_load_history as a 
LEFT JOIN masterdatabase.smt_machines as b on a.machine_id = b.id
WHERE a.created_at >='$start2' AND  DATE_ADD(a.created_at, INTERVAL 0 DAY)<='$end2'AND b.code = 'NPMTT2-02'
  ")){
  while ($result = $stmt->fetch_row()){
 echo "<td style='font-size:12px; height:20px;'>".number_format($result[0],0,'.',',') ."</td>";
 $tresult+=$result[0];

  $code11_array[]=$result[0];
$start2=date('Y-m-d H:i:s',strtotime("$start2 +1 days"));
$end2=date('Y-m-d H:i:s',strtotime("$end2 +1 days"));
}}}
/*echo "<td style='font-size:12px; height:20px;'><b>".number_format($tresult,0,'.',',')."<b></td>"; */
?>
</tr>















</table>
<script type="text/javascript">$('#btnExportSMT').click(function (e) {
    $(this).attr({
        'download': "SMTL SCANNED MATERIAL <?php echo $_POST['from']; ?> upto <?php echo $_POST['to']; ?>.xls",
            'href': 'data:application/csv;charset=utf-8,' + encodeURIComponent( $('#dvDataSMT').html())
    })
});</script>