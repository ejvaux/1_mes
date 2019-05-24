<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <!-- Header start -->
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";
      $auth = $_SESSION['auth'];
      $auth = stripslashes($auth);             
    ?>
    <!-- Header end -->
    
    <!-- Change Title --> <title>Management Indices</title>

    <!-- Custom CSS - START -->
    <style>
      
    </style>
    <!-- Custom CSS - END -->

  </head>

	<body>
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
    <!-- Navbar - END -->

    <!-- Page specific Navbar START-->

      <div style="position: absolute;margin-top: -14px;" id="innernavbar">
        <nav class="navbar navbar-brdr navbar-expand-lg navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
          <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->MENU
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav nav-tabs mr-auto mt-1">           
            <li><a id="tb1" class="nav-link tbl" href="INJECTION.php" onclick="">INJECTION</a></li>
              <li><a id="tb2" class="nav-link tbl" href="SMT.php" onclick="">SMT</a></li>
              <li><a id="tb3" class="nav-link tbl" href="DIP.php" onclick="">DIP</a></li>
              <li><a id="tb4" class="nav-link tbl" href="DIP TEST.php" onclick="">DIP TEST</a></li>
              <li><a id="tb5" class="nav-link tbl" href="FATP.php" onclick="">FATP</a></li>
              <li><a id="tb6" class="nav-link tbl" href="QUALITY.php" onclick="">QUALITY</a></li>
              <li><a id="tb7" class="nav-link tbl" href="SALES.php" onclick="">SALES</a></li>
            </ul>

            <!-- ICONS ON LEFT -->
            <?php
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/tab_navbar.php";            
            ?>
            <!-- ICONS ON LEFT END -->

          </div>  
        </nav>
      </div>

    <!-- Page specific Navbar END -->


<!-- ------------------------selections query----------------------- -->

<div class="container-fluid mt-5 ml-0 pl-0" id="table_display" style="width: 100%;" >
      <div class="row text-left">
        <div class="col-11" >
			

<form method="POST" >

<label>From: </label><input type="date" name="from" style="height:25px; width:150px">
<label>To: </label><input type="date" name="to" style="height:25px; width:150px" >
<input type="submit" value="Daily" name="daily" style="height:30px; width:50px" > 

<label> SHIFT: </label>
<select name= "shift">
<option value="all"> ALL </option>
<option value="6ap"> 6AP </option>
<option value="6pa"> 6PA </option>
</select>

<label for='Linename'> PROD LINE: </label>
<select name="Linename">
<option value="overall">OVERALL</option>
<option value="l1">Line 1</option>
<option value="l2">Line 2</option>
<option value="l3">Line 3</option>
<option value="l4">Line 4</option>
<option value="l5">Line 5</option>
<option value="l6">Line 6</option>
<option value="l7">Line 7</option>
<option value="l8">Line 8</option>
<option value="l9">Line 9</option>
<option value="l10">Line 10</option>
<option value="l11">Line 11</option>
<option value="l12">Line 12</option>
<option value="l13">Line 13</option>
</select> 

 
<label>From: </label><input type="month" name="monthfrom" style="height:25px; width:180px" >
<label >To: </label><input type="month" name="monthto" style="height:25px; width:180px" >
<input type="submit" value="Monthly" name="monthly" style="height:30px; width:70px">
 
</form>

</div>

<select style="height:30px; width:80px">
<option value="14">Column</option>
<option value="15">Pie </option>
</select>
      </div>
    </div>
    <br>


<div align = "center">
<label><b>PRODUCTION SUMMARY OF <i>SMT </i></b></label>
 
<!-- ---------------------DISPLAY CHART HERE ------------------------------- --> 


<div id="chart_div" >

</div>
</div>

<a href=https://www.plus2net.com/php_tutorial/chart-column-database.php></a>

<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" >

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {   

        // Create the data table.
        var data = new google.visualization.DataTable();
			
        data.addColumn('string', 'DATE');
        data.addColumn('number', 'PLAN');
				data.addColumn('number', 'RESULT');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1]), parseInt(my_2d[i][2]) ]);
       var options = {
          title: 'Production Summary',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
       }
	
</script>


</div>

<!-- --------------------case switch prod line---------------------- --> 

<?php 
if(isset($_POST['daily'])) 
	{
		$varLine = $_POST['Linename'];
		$errorMessage = "";
		
		if(empty($varLine)) 
		{
			$errorMessage = "<li>Please select a Prod line!</li>";
		}
		
		if($errorMessage != "") 
		{
			echo("<p>There was an error with your selections:</p>\n");
			echo("<ul>" . $errorMessage . "</ul>\n");
		} 
		else 
		{
			
			switch($varLine)
			{
        case "l1": 
        // smt daily prod line 1---------------------------------------
        $total = 0;
        $itotal = 0;
        $row = 0;
          if (isset($_POST['daily'])){
            include('conn1.php');
            $from=date('Y-m-d',strtotime($_POST['from']));
            $to=date('Y-m-d',strtotime($_POST['to']));
          
            $begin = new DateTime( $from );
            $end   = new DateTime( $to );
            $php_data_array = Array(); 
            $job_array = Array();// create PHP array
          
        if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
          echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
           while ($row = $stmt->fetch_row()) {
           echo "<td><b>$row[0]<b></td>";
          //$php_data_array[] = $row;
           }
            echo "<td><b>TOTAL<b></td></tr>";}
            $tplan=0;
           if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
           echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
           while ($row = $stmt->fetch_row()){
           echo "<td>$row[1]</td>";
           $tplan+=$row[1];
          $php_data_array[] = $row;
           }echo "<td><b>$tplan<b></td></tr>";}
           
           $tresult=0;
          if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
           and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL1' group by mis_prod_plan_dl.DATE_")){
          echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
           while ($row = $stmt->fetch_row()){
            echo "<td>$row[2]</td>";
            $tresult+=$row[2];
            $php_data_array[] = $row;}
           echo "<td><b>$tresult<b></td></tr>";
           }
          
           $tgap=0;
           if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
           and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and  mis_prod_plan_dl.MACHINE_CODE like 'SMTL1' group by mis_prod_plan_dl.DATE_")){
          echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
           while ($row = $stmt->fetch_row()){
           $gap = $row[1] - $row[2];
            echo "<td>$gap</td>";
            $tgap=+$gap;}
            echo "<td><b>$tgap<b></td></tr>";
           }
           
           
           if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
           and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL1' group by mis_prod_plan_dl.DATE_")){
          echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
           while ($row = $stmt->fetch_row()){
           $rate = ($row[2] / $row[1])*100;
            echo "<td>$rate %</td>";}
           echo "</tr>";
           }
           
           if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$from' and '$to' 
           and JOB_ORDER_NO like'2%' group by PROD_DATE")){
          echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
           while ($row = $stmt->fetch_row()){
            echo "<td>$row[2]</td>";}
           echo "</tr>";
           }
           
           //else{ 
           //echo $conn->error;
           //}
           // Transfor PHP array to JavaScript two dimensional array 
           echo "<script>
               var my_2d = ".json_encode($php_data_array)."
           </script>";
             }


				break; 

        case "l2":
        

// smt daily prod line 2---------------------------------------
$total = 0;
$itotal = 0;
$row = 0;
  if (isset($_POST['daily'])){
    include('conn1.php');
    $from=date('Y-m-d',strtotime($_POST['from']));
    $to=date('Y-m-d',strtotime($_POST['to']));
  
    $begin = new DateTime( $from );
    $end   = new DateTime( $to );
    $php_data_array = Array(); 
    $job_array = Array();// create PHP array
  
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by DATE_")){
  echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
   echo "<td><b>$row[0]<b></td>";
  //$php_data_array[] = $row;
   }
    echo "<td><b>TOTAL<b></td></tr>";}
    $tplan=0;
   if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($row = $stmt->fetch_row()){
   echo "<td>$row[1]</td>";
   $tplan+=$row[1];
  $php_data_array[] = $row;
   }echo "<td><b>$tplan<b></td></tr>";}
   
   $tresult=0;
  if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL2' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
   while ($row = $stmt->fetch_row()){
    echo "<td>$row[2]</td>";
    $tresult+=$row[2];
    $php_data_array[] = $row;}
   echo "<td><b>$tresult<b></td></tr>";
   }
  
   $tgap=0;
   if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and  mis_prod_plan_dl.MACHINE_CODE like 'SMTL2' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
   while ($row = $stmt->fetch_row()){
   $gap = $row[1] - $row[2];
    echo "<td>$gap</td>";
    $tgap=+$gap;}
    echo "<td><b>$tgap<b></td></tr>";
   }
   
   
   if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL2' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
   $rate = ($row[2] / $row[1])*100;
    echo "<td>$rate %</td>";}
   echo "</tr>";
   }
   
   if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$from' and '$to' 
   and JOB_ORDER_NO like'2%' group by PROD_DATE")){
  echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($row = $stmt->fetch_row()){
    echo "<td>$row[2]</td>";}
   echo "</tr>";
   }
   
   //else{ 
   //echo $conn->error;
   //}
   // Transfor PHP array to JavaScript two dimensional array 
   echo "<script>
       var my_2d = ".json_encode($php_data_array)."
   </script>";
     }
				 break;


        case "l3": 
        

        // smt daily prod line 3---------------------------------------
$total = 0;
$itotal = 0;
$row = 0;
  if (isset($_POST['daily'])){
    include('conn1.php');
    $from=date('Y-m-d',strtotime($_POST['from']));
    $to=date('Y-m-d',strtotime($_POST['to']));
  
    $begin = new DateTime( $from );
    $end   = new DateTime( $to );
    $php_data_array = Array(); 
    $job_array = Array();// create PHP array
  
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by DATE_")){
  echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
   echo "<td><b>$row[0]<b></td>";
  //$php_data_array[] = $row;
   }
    echo "<td><b>TOTAL<b></td></tr>";}
    $tplan=0;
   if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($row = $stmt->fetch_row()){
   echo "<td>$row[1]</td>";
   $tplan+=$row[1];
  $php_data_array[] = $row;
   }echo "<td><b>$tplan<b></td></tr>";}
   
   $tresult=0;
  if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL3' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
   while ($row = $stmt->fetch_row()){
    echo "<td>$row[2]</td>";
    $tresult+=$row[2];
    $php_data_array[] = $row;}
   echo "<td><b>$tresult<b></td></tr>";
   }
  
   $tgap=0;
   if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and  mis_prod_plan_dl.MACHINE_CODE like 'SMTL3' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
   while ($row = $stmt->fetch_row()){
   $gap = $row[1] - $row[2];
    echo "<td>$gap</td>";
    $tgap=+$gap;}
    echo "<td><b>$tgap<b></td></tr>";
   }
   
   
   if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL3' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
   $rate = ($row[2] / $row[1])*100;
    echo "<td>$rate %</td>";}
   echo "</tr>";
   }
   
   if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$from' and '$to' 
   and JOB_ORDER_NO like'2%' group by PROD_DATE")){
  echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($row = $stmt->fetch_row()){
    echo "<td>$row[2]</td>";}
   echo "</tr>";
   }
   
   //else{ 
   //echo $conn->error;
   //}
   // Transfor PHP array to JavaScript two dimensional array 
   echo "<script>
       var my_2d = ".json_encode($php_data_array)."
   </script>";
     }

				  break;


				case "l4":
				   break;


				case "l5":
				    break;


				case "l6":
				 break;


         case "l7": 

         break; 
 

         case "l8":
         
           break;
 

         case "l9": 
           break;
 

         case "l10":
            break;
 

         case "l11":
             break;
 

         case "l12":


         // smt daily prod line 12---------------------------------------
        $total = 0;
        $itotal = 0;
        $row = 0;
          if (isset($_POST['daily'])){
            include('conn1.php');
            $from=date('Y-m-d',strtotime($_POST['from']));
            $to=date('Y-m-d',strtotime($_POST['to']));
          
            $begin = new DateTime( $from );
            $end   = new DateTime( $to );
            $php_data_array = Array(); 
            $job_array = Array();// create PHP array
          
        if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by DATE_")){
          echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
           while ($row = $stmt->fetch_row()) {
           echo "<td><b>$row[0]<b></td>";
          //$php_data_array[] = $row;
           }
            echo "<td><b>TOTAL<b></td></tr>";}
            $tplan=0;
           if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by DATE_")){
           echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
           while ($row = $stmt->fetch_row()){
           echo "<td>$row[1]</td>";
           $tplan+=$row[1];
          $php_data_array[] = $row;
           }echo "<td><b>$tplan<b></td></tr>";}
           
           $tresult=0;
          if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
           and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL12' group by mis_prod_plan_dl.DATE_")){
          echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
           while ($row = $stmt->fetch_row()){
            echo "<td>$row[2]</td>";
            $tresult+=$row[2];
            $php_data_array[] = $row;}
           echo "<td><b>$tresult<b></td></tr>";
           }
          
           $tgap=0;
           if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
           and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and  mis_prod_plan_dl.MACHINE_CODE like 'SMTL12' group by mis_prod_plan_dl.DATE_")){
          echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
           while ($row = $stmt->fetch_row()){
           $gap = $row[1] - $row[2];
            echo "<td>$gap</td>";
            $tgap=+$gap;}
            echo "<td><b>$tgap<b></td></tr>";
           }
           
           
           if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
           and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL12' group by mis_prod_plan_dl.DATE_")){
          echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
           while ($row = $stmt->fetch_row()){
           $rate = ($row[2] / $row[1])*100;
            echo "<td>$rate %</td>";}
           echo "</tr>";
           }
           
           if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$from' and '$to' 
           and JOB_ORDER_NO like'2%' group by PROD_DATE")){
          echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
           while ($row = $stmt->fetch_row()){
            echo "<td>$row[2]</td>";}
           echo "</tr>";
           }
           
           //else{ 
           //echo $conn->error;
           //}
           // Transfor PHP array to JavaScript two dimensional array 
           echo "<script>
               var my_2d = ".json_encode($php_data_array)."
           </script>";
             }


    

          break;

          case "l13":

// smt daily prod line 13---------------------------------------
$total = 0;
$itotal = 0;
$row = 0;
  if (isset($_POST['daily'])){
    include('conn1.php');
    $from=date('Y-m-d',strtotime($_POST['from']));
    $to=date('Y-m-d',strtotime($_POST['to']));
  
    $begin = new DateTime( $from );
    $end   = new DateTime( $to );
    $php_data_array = Array(); 
    $job_array = Array();// create PHP array
  
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by DATE_")){
  echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
   echo "<td><b>$row[0]<b></td>";
  //$php_data_array[] = $row;
   }
    echo "<td><b>TOTAL<b></td></tr>";}
    $tplan=0;
   if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($row = $stmt->fetch_row()){
   echo "<td>$row[1]</td>";
   $tplan+=$row[1];
  $php_data_array[] = $row;
   }echo "<td><b>$tplan<b></td></tr>";}
   
   $tresult=0;
  if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL13' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
   while ($row = $stmt->fetch_row()){
    echo "<td>$row[2]</td>";
    $tresult+=$row[2];
    $php_data_array[] = $row;}
   echo "<td><b>$tresult<b></td></tr>";
   }
  
   $tgap=0;
   if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and  mis_prod_plan_dl.MACHINE_CODE like 'SMTL13' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
   while ($row = $stmt->fetch_row()){
   $gap = $row[1] - $row[2];
    echo "<td>$gap</td>";
    $tgap=+$gap;}
    echo "<td><b>$tgap<b></td></tr>";
   }
   
   
   if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
   and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL13' group by mis_prod_plan_dl.DATE_")){
  echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
   $rate = ($row[2] / $row[1])*100;
    echo "<td>$rate %</td>";}
   echo "</tr>";
   }
   
   if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$from' and '$to' 
   and JOB_ORDER_NO like'2%' group by PROD_DATE")){
  echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($row = $stmt->fetch_row()){
    echo "<td>$row[2]</td>";}
   echo "</tr>";
   }
   
   //else{ 
   //echo $conn->error;
   //}
   // Transfor PHP array to JavaScript two dimensional array 
   echo "<script>
       var my_2d = ".json_encode($php_data_array)."
   </script>";
     }
          break;

      case "overall":



      // ----------------SUM OF PROD RESULT daily overall------------------------------------- --> 
    
      $total = 0;
      $itotal = 0;
      $row = 0;
        if (isset($_POST['daily'])){
          include('conn1.php');
          $from=date('Y-m-d',strtotime($_POST['from']));
          $to=date('Y-m-d',strtotime($_POST['to']));
        
          $begin = new DateTime( $from );
          $end   = new DateTime( $to );
          $php_data_array = Array(); 
          $job_array = Array();// create PHP array
      
      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
       echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
        echo "<td><b>$row[0]<b></td>";
       //$php_data_array[] = $row;
      }
         echo "<td><b>TOTAL<b></td></tr>";}
         $tplan=0;
        if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
      echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
      while ($row = $stmt->fetch_row()){
        echo "<td>$row[1]</td>";
        $tplan+=$row[1];
       $php_data_array[] = $row;
      }echo "<td><b>$tplan<b></td></tr>";}
      
      $tresult=0;
       if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' group by mis_prod_plan_dl.DATE_")){
       echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
      while ($row = $stmt->fetch_row()){
         echo "<td>$row[2]</td>";
         $tresult+=$row[2];
         $php_data_array[] = $row;}
      echo "<td><b>$tresult<b></td></tr>";
      }
       
      $tgap=0;
      if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' group by mis_prod_plan_dl.DATE_")){
       echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
      while ($row = $stmt->fetch_row()){
        $gap = $row[1] - $row[2];
         echo "<td>$gap</td>";
         $tgap=+$gap;}
         echo "<td><b>$tgap<b></td></tr>";
      }
      
      
      if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' group by mis_prod_plan_dl.DATE_")){
       echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
      while ($row = $stmt->fetch_row()){
        $rate = ($row[2] / $row[1])*100;
         echo "<td>$rate %</td>";}
      echo "</tr>";
      }
      
      if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$from' and '$to' 
      and JOB_ORDER_NO like'2%' group by PROD_DATE")){
       echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
      while ($row = $stmt->fetch_row()){
         echo "<td>$row[2]</td>";}
      echo "</tr>";
      }
      
      //else{ 
      //echo $conn->error;
      //}
      // Transfor PHP array to JavaScript two dimensional array 
      echo "<script>
              var my_2d = ".json_encode($php_data_array)."
      </script>";
        }
      
    
       
       break;

				default: echo("Error!"); exit(); break;
			}
	
			exit();
		}
	}


?>

<?php
	if(isset($_POST['monthly'])) 
	{
		$varLine = $_POST['Linename'];
		$errorMessage = "";
		
		if(empty($varLine)) 
		{
			$errorMessage = "<li>Please select a Prod line!</li>";
		}
		
		if($errorMessage != "") 
		{
			echo("<p>There was an error with your selections:</p>\n");
			echo("<ul>" . $errorMessage . "</ul>\n");
		} 
		else 
		{
			
			switch($varLine)
			{
        case "l1":      
     //------------------------------- sum of prod result monthly line 1------------------------- -->       
     if (isset($_POST['monthly'])){
      include('conn1.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); // create PHP array
  
  
      if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL1' group by MONTH(mis_prod_plan_dl.DATE_)")){
       echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
        echo "<td>$row[0]</td>";
       //$php_data_array[] = $row;
      }echo "<td><b>TOTAL<b></td></tr>";}
  
      $tplan=0;
        if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
        and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL1' group by MONTH(mis_prod_plan_dl.DATE_)")){
      echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
      while ($row = $stmt->fetch_row()){
        echo "<td>$row[1]</td>";
        $tplan+=$row[1];
       //$php_data_array[] = $row;
      }echo "<td><b>$tplan<b></td></tr>";}
  
      $tresult=0;
       if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL1' group by MONTH(mis_prod_plan_dl.DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
      while ($row = $stmt->fetch_row()){
         echo "<td>$row[2]</td>";
         $php_data_array[] = $row;
        $tresult+=$row[2];
      }echo "<td><b>$tresult<b></td></tr>";} 
  
      $tgap=0;
      if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL1' group by MONTH(mis_prod_plan_dl.DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
      while ($row = $stmt->fetch_row()){
        $gap = $row[1] - $row[2];
        echo "<td>$gap</td>";
        $tgap+=$gap;}
        echo "<td><b>$tgap<b></td></tr>";
      } 
  
  
      if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL1' group by MONTH(mis_prod_plan_dl.DATE_)")){
      echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
      while ($row = $stmt->fetch_row()){
        $rate = ($row[2] / $row[1])*100;
        echo "<td>$rate %</td>";}
      echo "</tr>";
      } 
  
  
      if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$mfrom' and '$mto' 
  and JOB_ORDER_NO like'2%' group by PROD_DATE")){
   echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
  while ($def = $stmt->fetch_row()){
     echo "<td>$def[2]</td>";}
  echo "</tr>";
  }
  //else{ 
  //echo $conn->error;
  //}
  
  // Transfer PHP array to JavaScript two dimensional array 
  echo "<script>
          var my_2d = ".json_encode($php_data_array)."
  </script>";
    }
        break; 


        case "l2":
        
        
//------------------------------- sum of prod result monthly line 2------------------------- --> 


if (isset($_POST['monthly'])){
  include('conn1.php');
  $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
  $mto=date('Y-m-d',strtotime($_POST['monthto']));

  $begin = new DateTime( $mfrom );
  $end   = new DateTime( $mto );
  $php_data_array = Array(); // create PHP array


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL2' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
    echo "<td>$row[0]</td>";
   //$php_data_array[] = $row;
  }echo "<td><b>TOTAL<b></td></tr>";}

  $tplan=0;
    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL2' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
  while ($row = $stmt->fetch_row()){
    echo "<td>$row[1]</td>";
    $tplan+=$row[1];
   //$php_data_array[] = $row;
  }echo "<td><b>$tplan<b></td></tr>";}

  $tresult=0;
   if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL2' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
  while ($row = $stmt->fetch_row()){
     echo "<td>$row[2]</td>";
     $php_data_array[] = $row;
    $tresult+=$row[2];
  }echo "<td><b>$tresult<b></td></tr>";} 

  $tgap=0;
  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL2' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
  while ($row = $stmt->fetch_row()){
    $gap = $row[1] - $row[2];
    echo "<td>$gap</td>";
    $tgap+=$gap;}
    echo "<td><b>$tgap<b></td></tr>";
  } 


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL2' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
  while ($row = $stmt->fetch_row()){
    $rate = ($row[2] / $row[1])*100;
    echo "<td>$rate %</td>";}
  echo "</tr>";
  } 


  if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$mfrom' and '$mto' 
and JOB_ORDER_NO like'2%' group by PROD_DATE")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[2]</td>";}
echo "</tr>";
}
//else{ 
//echo $conn->error;
//}

// Transfer PHP array to JavaScript two dimensional array 
echo "<script>
      var my_2d = ".json_encode($php_data_array)."
</script>";
}				
				  break;

        case "l3": 
        
//------------------------------- sum of prod result monthly line 3------------------------- --> 


if (isset($_POST['monthly'])){
  include('conn1.php');
  $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
  $mto=date('Y-m-d',strtotime($_POST['monthto']));

  $begin = new DateTime( $mfrom );
  $end   = new DateTime( $mto );
  $php_data_array = Array(); // create PHP array


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL3' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
    echo "<td>$row[0]</td>";
   //$php_data_array[] = $row;
  }echo "<td><b>TOTAL<b></td></tr>";}

  $tplan=0;
    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL3' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
  while ($row = $stmt->fetch_row()){
    echo "<td>$row[1]</td>";
    $tplan+=$row[1];
   //$php_data_array[] = $row;
  }echo "<td><b>$tplan<b></td></tr>";}

  $tresult=0;
   if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL3' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
  while ($row = $stmt->fetch_row()){
     echo "<td>$row[2]</td>";
     $php_data_array[] = $row;
    $tresult+=$row[2];
  }echo "<td><b>$tresult<b></td></tr>";} 

  $tgap=0;
  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL3' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
  while ($row = $stmt->fetch_row()){
    $gap = $row[1] - $row[2];
    echo "<td>$gap</td>";
    $tgap+=$gap;}
    echo "<td><b>$tgap<b></td></tr>";
  } 


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL3' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
  while ($row = $stmt->fetch_row()){
    $rate = ($row[2] / $row[1])*100;
    echo "<td>$rate %</td>";}
  echo "</tr>";
  } 


  if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$mfrom' and '$mto' 
and JOB_ORDER_NO like'2%' group by PROD_DATE")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[2]</td>";}
echo "</tr>";
}
//else{ 
//echo $conn->error;
//}

// Transfer PHP array to JavaScript two dimensional array 
echo "<script>
      var my_2d = ".json_encode($php_data_array)."
</script>";
}

				  break;

				case "l4":
				   break;

				case "l5":
            break;
            
            case "l6": 

            break; 
    
            case "l7":
            
              break;
    
            case "l8": 
              break;
    
            case "l9":
               break;
    
            case "l10":
                break;

                case "l11": 
              break;
    
            case "l12":
 //------------------------------- sum of prod result monthly line 12------------------------- --> 
      
      
 if (isset($_POST['monthly'])){
  include('conn1.php');
  $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
  $mto=date('Y-m-d',strtotime($_POST['monthto']));

  $begin = new DateTime( $mfrom );
  $end   = new DateTime( $mto );
  $php_data_array = Array(); // create PHP array


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL12' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
    echo "<td>$row[0]</td>";
   //$php_data_array[] = $row;
  }echo "<td><b>TOTAL<b></td></tr>";}

  $tplan=0;
    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL12' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
  while ($row = $stmt->fetch_row()){
    echo "<td>$row[1]</td>";
    $tplan+=$row[1];
   //$php_data_array[] = $row;
  }echo "<td><b>$tplan<b></td></tr>";}

  $tresult=0;
   if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL12' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
  while ($row = $stmt->fetch_row()){
     echo "<td>$row[2]</td>";
     $php_data_array[] = $row;
    $tresult+=$row[2];
  }echo "<td><b>$tresult<b></td></tr>";} 

  $tgap=0;
  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL12' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
  while ($row = $stmt->fetch_row()){
    $gap = $row[1] - $row[2];
    echo "<td>$gap</td>";
    $tgap+=$gap;}
    echo "<td><b>$tgap<b></td></tr>";
  } 


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL12' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
  while ($row = $stmt->fetch_row()){
    $rate = ($row[2] / $row[1])*100;
    echo "<td>$rate %</td>";}
  echo "</tr>";
  } 


  if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$mfrom' and '$mto' 
and JOB_ORDER_NO like'2%' group by PROD_DATE")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[2]</td>";}
echo "</tr>";
}
//else{ 
//echo $conn->error;
//}

// Transfer PHP array to JavaScript two dimensional array 
echo "<script>
      var my_2d = ".json_encode($php_data_array)."
</script>";
}


               break;
    
            case "l13":

//------------------------------- sum of prod result monthly line 13------------------------- --> 

if (isset($_POST['monthly'])){
  include('conn1.php');
  $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
  $mto=date('Y-m-d',strtotime($_POST['monthto']));

  $begin = new DateTime( $mfrom );
  $end   = new DateTime( $mto );
  $php_data_array = Array(); // create PHP array


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL13' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
    echo "<td>$row[0]</td>";
   //$php_data_array[] = $row;
  }echo "<td><b>TOTAL<b></td></tr>";}

  $tplan=0;
    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL13' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
  while ($row = $stmt->fetch_row()){
    echo "<td>$row[1]</td>";
    $tplan+=$row[1];
   //$php_data_array[] = $row;
  }echo "<td><b>$tplan<b></td></tr>";}

  $tresult=0;
   if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL13' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
  while ($row = $stmt->fetch_row()){
     echo "<td>$row[2]</td>";
     $php_data_array[] = $row;
    $tresult+=$row[2];
  }echo "<td><b>$tresult<b></td></tr>";} 

  $tgap=0;
  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL13' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
  while ($row = $stmt->fetch_row()){
    $gap = $row[1] - $row[2];
    echo "<td>$gap</td>";
    $tgap+=$gap;}
    echo "<td><b>$tgap<b></td></tr>";
  } 


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' and mis_prod_plan_dl.MACHINE_CODE like 'SMTL13' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
  while ($row = $stmt->fetch_row()){
    $rate = ($row[2] / $row[1])*100;
    echo "<td>$rate %</td>";}
  echo "</tr>";
  } 


  if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$mfrom' and '$mto' 
and JOB_ORDER_NO like'2%' group by PROD_DATE")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[2]</td>";}
echo "</tr>";
}
//else{ 
//echo $conn->error;
//}

// Transfer PHP array to JavaScript two dimensional array 
echo "<script>
      var my_2d = ".json_encode($php_data_array)."
</script>";
}

                break;

        case "overall":
        
 //------------------------------- sum of prod result monthly------------------------- -->       
 if (isset($_POST['monthly'])){
  include('conn1.php');
  $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
  $mto=date('Y-m-d',strtotime($_POST['monthto']));

  $begin = new DateTime( $mfrom );
  $end   = new DateTime( $mto );
  $php_data_array = Array(); // create PHP array


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
    echo "<td>$row[0]</td>";
   //$php_data_array[] = $row;
  }echo "<td><b>TOTAL<b></td></tr>";}

  $tplan=0;
    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
  while ($row = $stmt->fetch_row()){
    echo "<td>$row[1]</td>";
    $tplan+=$row[1];
   //$php_data_array[] = $row;
  }echo "<td><b>$tplan<b></td></tr>";}

  $tresult=0;
   if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
  while ($row = $stmt->fetch_row()){
     echo "<td>$row[2]</td>";
     $php_data_array[] = $row;
    $tresult+=$row[2];
  }echo "<td><b>$tresult<b></td></tr>";} 

  $tgap=0;
  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' group by MONTH(mis_prod_plan_dl.DATE_)")){
   echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
  while ($row = $stmt->fetch_row()){
    $gap = $row[1] - $row[2];
    echo "<td>$gap</td>";
    $tgap+=$gap;}
    echo "<td><b>$tgap<b></td></tr>";
  } 


  if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'2%' group by MONTH(mis_prod_plan_dl.DATE_)")){
  echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
  while ($row = $stmt->fetch_row()){
    $rate = ($row[2] / $row[1])*100;
    echo "<td>$rate %</td>";}
  echo "</tr>";
  } 


  if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$mfrom' and '$mto' 
and JOB_ORDER_NO like'2%' group by PROD_DATE")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[2]</td>";}
echo "</tr>";
}
//else{ 
//echo $conn->error;
//}

// Transfer PHP array to JavaScript two dimensional array 
echo "<script>
      var my_2d = ".json_encode($php_data_array)."
</script>";
}


      break;

				default: echo("Error!"); exit(); break;
			}
	
			exit();
		}
	}


?>

 <!-- Optional JavaScript -->


<div class="mdl" style=" z-index: 1">

<!-- Place at bottom of page --></div>

</body>
  
	</html>