<?php




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

     $php_data_array[$i] =$job_array=$result_array;
    $i++;}
  echo "<td><b>".number_format($tresult,0,'.',',')."<b></td></tr>"; 
  }




 ?>