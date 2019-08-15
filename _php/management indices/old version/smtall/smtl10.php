<?php

    if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by MONTH(DATE_)")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by MONTH(DATE_)")){
      echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
      while ($plan = $stmt->fetch_row()){
      $tplan+=$plan[1];
      echo "<td>$plan[1]</td>";
      $job_array[]=$plan[1];
      //$php_data_array[] = $row;
      }
      echo "<td><b>$tplan<b></td></tr>";}
      //------------------------------------
      $tresult=0;
      if($stmt = $conn1->query("SELECT MONTH(masterdatabase.mis_prod_plan_dl.DATE_), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
      on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$mfrom' and '$mto' and 1_smt.pcb.jo_number like '2%' 
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
      echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
      $i=0;
      while ($row = $stmt->fetch_row()){
       echo "<td>$row[2]</td>";
       $result_array[] = $row[2];
       $tresult+=$row[2];
       $row[1]=$job_array[$i];
       $php_data_array[] = $row;
      $i++;}
      echo "<td><b>$tresult<b></td></tr>"; 
      }
      
      $tgap=0; //------------------------------------ 
      if($stmt = $conn1->query("SELECT MONTH(masterdatabase.mis_prod_plan_dl.DATE_), PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
      WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$mfrom' and '$mto' and 1_smt.pcb.jo_number 
      like '2%' and PDLINE_NAME like 'SMTL10' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
      echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
      $i=0;
      while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2]=$result_array[$i];
      $gap = $gp[1] - $gp[2];
       echo "<td>$gap</td>";
       $tgap = $tplan - $tresult;
      $i++;}
       echo "<td><b>$tgap<b></td></tr>";
      }
    
    $i=0; $trate=0;
    if($stmt = $conn1->query("SELECT MONTH(masterdatabase.mis_prod_plan_dl.DATE_), SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$mfrom' and '$mto' and 1_smt.pcb.jo_number 
    like '2%' and PDLINE_NAME like 'SMTL10' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
    while ($row = $stmt->fetch_row()){
    $row[1]=$job_array[$i];
    //$row[2]=$result_array[$i];
    //echo $row[2]."//".$row[1]."///";
    $rate = ($row[2] / $row[1])*100;
    $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
    echo "<td><b>". round($trate,3) ."%<b></td></tr>";
    }
    $tdef=0;
    if($stmt = $conn2->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom%' and '$mto%' group by MONTH(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
    while ($def = $stmt->fetch_row()){
     echo "<td>$def[0]</td>";
      $tdef+=$def[0];}
    echo "<td><b>$tdef<b></td></tr>";
    }
    
    include('conn2.php');
    $tinput=0;
    if($stmt = $conn1->query("SELECT MONTH(masterdatabase.mis_prod_plan_dl.DATE_), 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto'
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
    echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
    while ($input = $stmt->fetch_row()){
    echo "<td>$input[2]</td>";
    $input_array[]=$input[2];
    $tinput+=$input[2];}
    echo "<td><b>$tinput<b></td></tr>";}
    
    $yield;
    $tyield=0;
    include('conn2.php');
    if($stmt = $conn1->query("SELECT MONTH(masterdatabase.mis_prod_plan_dl.DATE_), 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' 
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
    echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
    $i=0;
    while ($output = $stmt->fetch_row()){
      $yield=($output[2]/$input_array[$i])*100;
    //echo $output[2]."//";
    echo "<td>". round($yield,3)." %</td>";
    $tyield+=$yield;
    $i++;
    }echo "<td><b>". round($tyield,3) ."%<b></td></tr>";}      
    //else{ 
    //echo $conn->error;
    //}
    // Transfor PHP array to JavaScript two dimensional array 
    echo "<script>
          var my_2d = ".json_encode($php_data_array)."
    </script>";
    
    echo "<script>
    var my_3d = ".json_encode($php_data_array)."
    </script>";
    
    
    getColumn();
    
    
    }
?>