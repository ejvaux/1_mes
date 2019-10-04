
	<?php



$dayarray=Array();
$r=date('d',strtotime('2019-08-12'));  //array-1
$anr=date('d',strtotime('2019-08-16')); //array-2

for($r; $r<=$anr; $r++){
$dayarray[]=$r;

}

   echo implode(' ', $dayarray ) ;




$test=date('Y-m-d',strtotime($dayarray . ' + 1 day'));

echo $test;









      $tresult=0;
   if($stmt = $conn2->query("SELECT COUNT(RESULT) FROM pcb 
   where cast(created_at + 0.25 as date) BETWEEN  '$from' and '$to' and jo_number like '2%' 
   and  shift = '$shift'  and type = '1' and PDLINE_NAME like '$line' group by cast(created_at + 0.25 as date) ")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
   $i=0;
  while ($result = $stmt->fetch_row()){
     echo "<td>".number_format($result[0],0,'.',',') ."</td>";
      $result_array[] = $result[0];
     $tresult+=$result[0];

     $php_data_array[] =$result;
    $i++;}
  echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 
  }




      $tresult=0;
   if($stmt = $conn2->query("SELECT COUNT(RESULT) FROM pcb 
   where cast(created_at + 0.25 as date) BETWEEN  '$from 18%>=06%' and '$to 18%>=06%' and jo_number like '2%' 
   and  shift = '$shift'  and type = '1' and PDLINE_NAME like '$line' group by cast(created_at + 0.25 as date) ")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
   $i=0;
  while ($result = $stmt->fetch_row()){
     echo "<td>".number_format($result[0],0,'.',',') ."</td>";
      $result_array[] = $result[0];
     $tresult+=$result[0];

     $php_data_array[] =$result;
    $i++;}
  echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 
  }


$in2 = Pcb::select('id')
                ->whereDate('created_at', $date=2019-08-01)
                ->whereTime('created_at', '>=', '18:00:00')
                ->where('line_id',$lid)
                ->where('shift',2)
                ->where('type',0)->count() +
                Pcb::select('id')
                ->whereDate('created_at', $date2=2019-08-02)
                ->whereTime('created_at', '<', '06:00:00')
                ->where('line_id',$lid)
                ->where('shift',2)
                ->where('type',0)->count();







 



	?>

