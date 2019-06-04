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
<option value="l1">SMTL1</option>
<option value="l2">SMTL2</option>
<option value="l3">SMTL3</option>
<option value="l4">SMTL4</option>
<option value="l5">SMTL5</option>
<option value="l6">SMTL6</option>
<option value="l7">SMTL7</option>
<option value="l8">SMTL8</option>
<option value="l9">SMTL9</option>
<option value="l10">SMTL10</option>
<option value="l11">SMTL11</option>
<option value="l12">SMTL12</option>
<option value="l13">SMTL13</option>
</select> 

 
<label>From: </label><input type="month" name="monthfrom" style="height:25px; width:180px" >
<label >To: </label><input type="month" name="monthto" style="height:25px; width:180px" >
<input type="submit" value="Monthly" name="monthly" style="height:30px; width:70px">
 


</div>

<select id="chartType" name="chartType" style="height:30px; width:80px">
<option value="column">Column</option>
<option value="pie">Pie </option>
</select>
</form>
      </div>
    </div>
    <br>


<div align = "center">
<label size = "20px"><b>PRODUCTION SUMMARY OF <i>SMT </i></b></label>
</div>
<!-- ---------------------DISPLAY CHART HERE ------------------------------- --> 
<?php
function getColumn(){
  ?>

<div id="chart_div" >
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



<?php }
//--------------------------------------pie chart--------------------------------
function getPie(){
?>
 
<div id="chart_div" style="float:left;">
        <canvas id="chart-area" width="400" height="450" >
    </canvas></div>
    
<a href=https://www.plus2net.com/php_tutorial/chart-database.php></a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'language');
        data.addColumn('number', 'Nos');
		for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1]) ]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:' PLAN',
                       width:600,
                       height:500};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }


</script> 

<div id="chart_div1"  style="float:right;">
        <canvas id="chart-area-km" width="400" height="450" >
    </canvas></div>

<a href=https://www.plus2net.com/php_tutorial/chart-database.php></a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_chart);
      // Callback that draws the pie chart
      function draw_chart() {
        // Create the data table .
        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'language');
        data1.addColumn('number', 'Nos');
		for(i = 0; i < my_3d.length; i++)
    data1.addRow([my_3d[i][0], parseInt(my_3d[i][2]) ]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options1 = {title:' RESULT',
                       width:600,
                       height:500};

        // Instantiate and draw the chart
        var chart1 = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart1.draw(data1, options1);
      }


</script> 
</div>


<!-- ----------------------------------case switch prod line---------------------------------- --> 

<?php 
}

if(isset($_POST['daily'])) 
	{
   getshift();  

  }
?>

<?php
	if(isset($_POST['monthly'])) 
	{
    //getmonth();
    $varshift = $_POST['shift'];

    switch ($varshift){
    
    case "6ap":
    /////////////////////////////////////////////////////////////////////////////////////////
    
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
    // smt line 1 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL1'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
                 break;
    //if daily
    
    case "l2":
    // smt line 2 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL2'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l3":
    
    // smt line 3 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL3'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    
    break;
    
    case "l4":
    
    // smt line 4 daily shift 6Ap---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL4'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l5":
    
    // smt line 5 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL5'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l6":
    
    // smt line 6 daily shift 6Ap---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL6'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l7":
    
    // smt line 7 daily shift 6Ap---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL7'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l8":
    
    // smt line 8 daily shift 6Ap---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL8'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l9":
    
    // smt line 9 daily shift 6Ap---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL9'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l10":
    
    // smt line 10 daily shift 6ap---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL10'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l11":
    
    // smt line 11 daily shift 6ap---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL11'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l12":
    
    // smt line 12 daily shift 6Ap---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL12'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    
    break;
    
    case "l13":
    
    // smt line 13 daily shift 6AP---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL13'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "overall":
    
    // smt line overall daily shift 6AP---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%'  group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%'  group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at), jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' ")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 6:%' and '$mto 18:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 6:%' and '$mto 18:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' ")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    
      }//case line
    }//else
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    break;
    
    case"6pa":
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    
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
    // smt line 1 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL1'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
                 break;
    //if daily
    
    case "l2":
    // smt line 2 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL2'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l3":
    
    // smt line 3 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL3'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    
    break;
    
    case "l4":
    
    // smt line 4 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL4'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l5":
    
    // smt line 5 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL5'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l6":
    
    // smt line 6 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL6'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l7":
    
    // smt line 7 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL7'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l8":
    
    // smt line 8 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL8'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l9":
    
    // smt line 9 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL9'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l10":
    
    // smt line 10 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL10'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l11":
    
    // smt line 11 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL11'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "l12":
    
    // smt line 12 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL12'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    
    break;
    
    case "l13":
    
    // smt line 13 daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL13'")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13'")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13'")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    break;
    
    case "overall":
    
    // smt line overall daily shift 6PA---------------------------------------------------------
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_hour_array = Array();// create PHP array
    
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
       while ($row = $stmt->fetch_row()) {
         echo "<td><b>$row[0]<b></td>";
         $date_hour_array[] = $row[0];
       }
          echo "<td width='100px'><b>TOTAL<b></td></tr>";}
    
    
          $tplan=0;
         if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%'  group by MONTH(DATE_)")){
       echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
       while ($plan = $stmt->fetch_row()){
         $tplan+=$plan[1];
         echo "<td>$plan[1]</td>";
         $job_array[]=$plan[1];
         
       }
       echo "<td><b>$tplan<b></td></tr>";}
    
       //------------------------------------
    
       $i=0;
       if($stmt = $conn2->query("SELECT MONTH(created_at, jo_number), COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' ")){
        // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($res = $stmt->fetch_row()) {
         //echo $hour[0].":".$hour[1]."///-";
        $result_array[] = $res[2];
        } }
    
    
       $tresult=0;
        if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
        on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' and 1_smt.pcb.jo_number like '2%' 
        and PROCESS_NAME like 'SMT.INPUT%' ")){
        echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
        $i=0;
       while ($row = $stmt->fetch_row()){
         $row[2] = $result_array[$i];
          echo "<td>$row[2]</td>";
          $tresult+=$row[2];
          $row[0]=$date_hour_array[$i];
          $row[1]=$job_array[$i];
          $php_data_array[] = $row;
         $i++;
        //echo ;
        }
       echo "<td><b>$tresult<b></td></tr>"; 
       }
    
       $tgap=0; //------------------------------------ -----------------------------------------
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' ")){
        echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
        $i=0;
       while ($gp = $stmt->fetch_row()){
        $gp[1]=$job_array[$i];
        $gp[2] = $result_array[$i]; //-----------------------
         $gap = $gp[1] - $gp[2];
          echo "<td>$gap</td>";
          $tgap = $tplan - $tresult;
         $i++;}
          echo "<td><b>$tgap<b></td></tr>";
       }
       
       $i=0; $trate=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  ")){
        echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
       while ($row = $stmt->fetch_row()){
         $row[1] = $job_array[$i];
         //$row[2] = $result_array[$i];
         $rate = ($row[2] / $row[1])*100;
         $trate += $rate;
         echo "<td>". round($rate,3) ."%</td>";
        $i++;}
      echo "<td><b>". round($trate,3) ."%<b></td></tr>";
       }
    
       $tdef=0;
       if($stmt = $conn1->query("SELECT COUNT(created_at), MONTH(updated_at) FROM defect_mats WHERE created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' group by MONTH(updated_at)")){
        echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
       while ($def = $stmt->fetch_row()){
          echo "<td>$def[0]</td>";
           $tdef+=$def[0];}
       echo "<td><b>$tdef<b></td></tr>";
       }
       
       include('conn2.php');
       $tinput=0;
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%' 
       and 1_smt.pcb.jo_number like '2%' ")){
       echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
       while ($input = $stmt->fetch_row()){
       echo "<td>$input[2]</td>";
       $input_array[]=$input[2];
       $tinput+=$input[2];} 
       echo "<td><b>$tinput<b></tr>";}
       
       $yield;
       $tyield=0;
       include('conn2.php');
       if($stmt = $conn1->query("SELECT MONTH(1_smt.pcb.created_at), masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
       WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$mfrom 19:%' and '$mto 05:%'
       and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' ")){
       echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
       $i=0;
       while ($output = $stmt->fetch_row()){
        $yield=($output[2]/$input_array[$i])*100;
       //echo $output[2].",,";
       echo "<td>". round($yield,3)." %</td>";
       echo "<td>$yield %</td>";
       $tyield+=$yield;
       $i++;
       }echo "<td><b>". round($tyield,3) ."%</tr>";}      
          
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
    
    
    
    $varchart = $_POST['chartType'];
    
        
        switch($varchart)
        {
          case "column":
          
          getColumn();
          break;
    
          case "pie":
    
          getpie();
          break;
          default: echo("Error!"); exit(); break;
    }
    
    
            }
    
    break;
    
    
      }//case line
    }//else
    //////////////////////////////////////
    break;
    
    
    
    
    case"all": 
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
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
        
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by MONTH(DATE_)")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by MONTH(DATE_)")){
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
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      like '2%' and PDLINE_NAME like 'SMTL1' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    like '2%' and PDLINE_NAME like 'SMTL1' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
                  break;
    
        case "l2":
        
    
    // smt daily prod line 2---------------------------------------
    
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by MONTH(DATE_)")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by MONTH(DATE_)")){
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
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      like '2%' and PDLINE_NAME like 'SMTL2' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    like '2%' and PDLINE_NAME like 'SMTL2' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
    
    
    
          break;
    
    
        case "l3": 
        
    
        // smt daily prod line 3---------------------------------------
    
        if (isset($_POST['monthly'])){
          include('conn2.php');
          $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
          $mto=date('Y-m-d',strtotime($_POST['monthto']));
        
          $begin = new DateTime( $mfrom );
          $end   = new DateTime( $mto );
          $php_data_array = Array(); 
          $job_array = Array();
          $input_array = Array();// create PHP array
        
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by MONTH(DATE_)")){
          echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
          while ($row = $stmt->fetch_row()) {
          echo "<td><b>$row[0]<b></td>";
          //$php_data_array[] = $row;
          }
           echo "<td width='100px'><b>TOTAL<b></td></tr>";}
           $tplan=0;
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by MONTH(DATE_)")){
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
          and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
          like '2%' and PDLINE_NAME like 'SMTL3' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        like '2%' and PDLINE_NAME like 'SMTL3' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        
        
        
        $varchart = $_POST['chartType'];
        
        
        switch($varchart)
        {
        case "column":
        
        getColumn();
        break;
        
        case "pie":
        
        getpie();
        break;
        default: echo("Error!"); exit(); break;
        }
        
        
        }
          break;
    
    
        case "l4":
        
    // smt daily prod line 4---------------------------------------
    
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by MONTH(DATE_)")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by MONTH(DATE_)")){
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
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      like '2%' and PDLINE_NAME like 'SMTL4' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    like '2%' and PDLINE_NAME like 'SMTL4' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
            break;
    
    
        case "l5":
        
        // smt daily prod line 5---------------------------------------
    
        if (isset($_POST['monthly'])){
          include('conn2.php');
          $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
          $mto=date('Y-m-d',strtotime($_POST['monthto']));
        
          $begin = new DateTime( $mfrom );
          $end   = new DateTime( $mto );
          $php_data_array = Array(); 
          $job_array = Array();
          $input_array = Array();// create PHP array
        
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by MONTH(DATE_)")){
          echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
          while ($row = $stmt->fetch_row()) {
          echo "<td><b>$row[0]<b></td>";
          //$php_data_array[] = $row;
          }
           echo "<td width='100px'><b>TOTAL<b></td></tr>";}
           $tplan=0;
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by MONTH(DATE_)")){
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
          and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
          like '2%' and PDLINE_NAME like 'SMTL5' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        like '2%' and PDLINE_NAME like 'SMTL5' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        
        
        
        $varchart = $_POST['chartType'];
        
        
        switch($varchart)
        {
        case "column":
        
        getColumn();
        break;
        
        case "pie":
        
        getpie();
        break;
        default: echo("Error!"); exit(); break;
        }
        
        
        }
            break;
    
    
        case "l6":
        
    // smt daily prod line 6---------------------------------------
    
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by MONTH(DATE_)")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by MONTH(DATE_)")){
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
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      like '2%' and PDLINE_NAME like 'SMTL6' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    like '2%' and PDLINE_NAME like 'SMTL6' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
          break;
    
    
         case "l7": 
    
         // smt daily prod line 7---------------------------------------
    
         if (isset($_POST['monthly'])){
          include('conn2.php');
          $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
          $mto=date('Y-m-d',strtotime($_POST['monthto']));
        
          $begin = new DateTime( $mfrom );
          $end   = new DateTime( $mto );
          $php_data_array = Array(); 
          $job_array = Array();
          $input_array = Array();// create PHP array
        
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by MONTH(DATE_)")){
          echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
          while ($row = $stmt->fetch_row()) {
          echo "<td><b>$row[0]<b></td>";
          //$php_data_array[] = $row;
          }
           echo "<td width='100px'><b>TOTAL<b></td></tr>";}
           $tplan=0;
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by MONTH(DATE_)")){
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
          and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
          like '2%' and PDLINE_NAME like 'SMTL7' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        like '2%' and PDLINE_NAME like 'SMTL7' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        
        
        
        $varchart = $_POST['chartType'];
        
        
        switch($varchart)
        {
        case "column":
        
        getColumn();
        break;
        
        case "pie":
        
        getpie();
        break;
        default: echo("Error!"); exit(); break;
        }
        
        
        }
    
            break;
    
    
         case "l8":
    
         // smt daily prod line 8---------------------------------------
    
         if (isset($_POST['monthly'])){
          include('conn2.php');
          $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
          $mto=date('Y-m-d',strtotime($_POST['monthto']));
        
          $begin = new DateTime( $mfrom );
          $end   = new DateTime( $mto );
          $php_data_array = Array(); 
          $job_array = Array();
          $input_array = Array();// create PHP array
        
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by MONTH(DATE_)")){
          echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
          while ($row = $stmt->fetch_row()) {
          echo "<td><b>$row[0]<b></td>";
          //$php_data_array[] = $row;
          }
           echo "<td width='100px'><b>TOTAL<b></td></tr>";}
           $tplan=0;
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by MONTH(DATE_)")){
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
          and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
          like '2%' and PDLINE_NAME like 'SMTL8' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        like '2%' and PDLINE_NAME like 'SMTL8' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        
        
        
        $varchart = $_POST['chartType'];
        
        
        switch($varchart)
        {
        case "column":
        
        getColumn();
        break;
        
        case "pie":
        
        getpie();
        break;
        default: echo("Error!"); exit(); break;
        }
        
        
        }
            break;
    
    
         case "l9": 
    
    // smt daily prod line 9---------------------------------------
    
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by MONTH(DATE_)")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by MONTH(DATE_)")){
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
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      like '2%' and PDLINE_NAME like 'SMTL9' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    like '2%' and PDLINE_NAME like 'SMTL9' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
          break;
    
    
         case "l10":
    
    // smt daily prod line 10---------------------------------------
    
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array
    
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
          break;
    
    
         case "l11":
    
    // smt daily prod line 11---------------------------------------
    
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by MONTH(DATE_)")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by MONTH(DATE_)")){
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
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      like '2%' and PDLINE_NAME like 'SMTL11' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    like '2%' and PDLINE_NAME like 'SMTL11' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
          break;
    
    
         case "l12":
    
    
         // smt daily prod line 12---------------------------------------
        
         if (isset($_POST['monthly'])){
          include('conn2.php');
          $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
          $mto=date('Y-m-d',strtotime($_POST['monthto']));
        
          $begin = new DateTime( $mfrom );
          $end   = new DateTime( $mto );
          $php_data_array = Array(); 
          $job_array = Array();
          $input_array = Array();// create PHP array
        
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by MONTH(DATE_)")){
          echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
          while ($row = $stmt->fetch_row()) {
          echo "<td><b>$row[0]<b></td>";
          //$php_data_array[] = $row;
          }
           echo "<td width='100px'><b>TOTAL<b></td></tr>";}
           $tplan=0;
          if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by MONTH(DATE_)")){
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
          and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
          like '2%' and PDLINE_NAME like 'SMTL12' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        like '2%' and PDLINE_NAME like 'SMTL12' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        
        
        
        $varchart = $_POST['chartType'];
        
        
        switch($varchart)
        {
        case "column":
        
        getColumn();
        break;
        
        case "pie":
        
        getpie();
        break;
        default: echo("Error!"); exit(); break;
        }
        
        
        }
          break;
    
          case "l13":
    
    // smt daily prod line 13---------------------------------------
    
    if (isset($_POST['monthly'])){
      include('conn2.php');
      $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
      $mto=date('Y-m-d',strtotime($_POST['monthto']));
    
      $begin = new DateTime( $mfrom );
      $end   = new DateTime( $mto );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array
    
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by MONTH(DATE_)")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by MONTH(DATE_)")){
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
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      like '2%' and PDLINE_NAME like 'SMTL13' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    like '2%' and PDLINE_NAME like 'SMTL13' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
          break;
    
      case "overall":
    
      // ----------------SUM OF PROD RESULT daily overall------------------------------------- --> 
    
      if (isset($_POST['monthly'])){
        include('conn2.php');
        $mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
        $mto=date('Y-m-d',strtotime($_POST['monthto']));
      
        $begin = new DateTime( $mfrom );
        $end   = new DateTime( $mto );
        $php_data_array = Array(); 
        $job_array = Array();
        $input_array = Array();// create PHP array
      
        if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' group by MONTH(DATE_)")){
        echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
        while ($row = $stmt->fetch_row()) {
        echo "<td><b>$row[0]<b></td>";
        //$php_data_array[] = $row;
        }
         echo "<td width='100px'><b>TOTAL<b></td></tr>";}
         $tplan=0;
        if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like'2%' group by MONTH(DATE_)")){
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
        and PROCESS_NAME like 'SMT.INPUT%' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
        like '2%'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      like '2%'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      and 1_smt.pcb.jo_number like '2%'  group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' group by MONTH(masterdatabase.mis_prod_plan_dl.DATE_)")){
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
      
      
      
      $varchart = $_POST['chartType'];
      
      
      switch($varchart)
      {
      case "column":
      
      getColumn();
      break;
      
      case "pie":
      
      getpie();
      break;
      default: echo("Error!"); exit(); break;
      }
      
      
      }
       
       break;
    
        default: echo("Error!"); exit(); break;
      }
      
    
      exit();
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////
    break;
    
    default: echo("Error!"); 
    exit();
    break;
          }
    
	}


?>


<?php
//------------------------shift switch case here--------------------------
function getshift(){
 $varshift = $_POST['shift'];

switch ($varshift){

case "6ap":
/////////////////////////////////////////////////////////////////////////////////////////

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
// smt line 1 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL1'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
             break;
//if daily

case "l2":
// smt line 2 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL2'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BBETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l3":

// smt line 3 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL3'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}        
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }

break;

case "l4":

// smt line 4 daily shift 6Ap---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL4'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}       
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l5":

// smt line 5 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL5'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l6":

// smt line 6 daily shift 6Ap---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL6'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l7":

// smt line 7 daily shift 6Ap---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL7'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}       
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l8":

// smt line 8 daily shift 6Ap---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL8'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}        
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l9":

// smt line 9 daily shift 6Ap---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL9'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}       
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l10":

// smt line 10 daily shift 6ap---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL10'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}       
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l11":

// smt line 11 daily shift 6ap---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL11'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}     
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l12":

// smt line 12 daily shift 6Ap---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL12'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}     
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }

break;

case "l13":

// smt line 13 daily shift 6AP---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL13'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}         
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "overall":

// smt line overall daily shift 6AP---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


   if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%'  group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%'  group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' ")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%' and 1_smt.pcb.jo_number like '2%' and PROCESS_NAME like 'SMT.INPUT%' ")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 6:%' and '$to 18:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%' ")){
     
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 6:%' and '$to 18:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
   $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;


  }//case line
}//else
//////////////////////////////////////////////////////////////////////////////////////////////////////
break;

case"6pa":
////////////////////////////////////////////////////////////////////////////////////////////////////

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
// smt line 1 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL1'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
             break;
//if daily

case "l2":
// smt line 2 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL2'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l3":

// smt line 3 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL3'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}        
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }

break;

case "l4":

// smt line 4 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL4'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}       
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l5":

// smt line 5 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL5'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l6":

// smt line 6 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL6'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l7":

// smt line 7 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL7'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}       
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l8":

// smt line 8 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL8'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}        
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l9":

// smt line 9 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL9'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}       
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l10":

// smt line 10 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL10'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}       
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l11":

// smt line 11 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL11'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}     
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "l12":

// smt line 12 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL12'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}     
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }

break;

case "l13":

// smt line 13 daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' and PDLINE_NAME like 'SMTL13'")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' 
    and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13'")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13' ")){
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
    $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}         
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}


        }
break;

case "overall":

// smt line overall daily shift 6PA---------------------------------------------------------
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();
  $date_hour_array = Array();// create PHP array


   if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%'  group by DATE_")){
    echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
   while ($row = $stmt->fetch_row()) {
     echo "<td><b>$row[0]<b></td>";
     $date_hour_array[] = $row[0];
   }
      echo "<td width='100px'><b>TOTAL<b></td></tr>";}


      $tplan=0;
     if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%'  group by DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
   while ($plan = $stmt->fetch_row()){
     $tplan+=$plan[1];
     echo "<td>$plan[1]</td>";
     $job_array[]=$plan[1];
     
   }
   echo "<td><b>$tplan<b></td></tr>";}

   //------------------------------------

   $i=0;
   if($stmt = $conn2->query("SELECT created_at, jo_number, COUNT(RESULT) FROM pcb WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' and PROCESS_NAME like 'SMT.INPUT%' and jo_number like '2%' ")){
    // echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($res = $stmt->fetch_row()) {
     //echo $hour[0].":".$hour[1]."///-";
    $result_array[] = $res[2];
    } }


   $tresult=0;
    if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
    on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' and 1_smt.pcb.jo_number like '2%' and PROCESS_NAME like 'SMT.INPUT%' ")){
    echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    $i=0;
   while ($row = $stmt->fetch_row()){
     $row[2] = $result_array[$i];
      echo "<td>$row[2]</td>";
      $tresult+=$row[2];
      $row[0]=$date_hour_array[$i];
      $row[1]=$job_array[$i];
      $php_data_array[] = $row;
     $i++;
    //echo ;
    }
   echo "<td><b>$tresult<b></td></tr>"; 
   }

   $tgap=0; //------------------------------------ -----------------------------------------
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%'  ")){
    echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    $i=0;
   while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2] = $result_array[$i]; //-----------------------
     $gap = $gp[1] - $gp[2];
      echo "<td>$gap</td>";
      $tgap = $tplan - $tresult;
     $i++;}
      echo "<td><b>$tgap<b></td></tr>";
   }
   
   $i=0; $trate=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%' ")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
   while ($row = $stmt->fetch_row()){
     $row[1] = $job_array[$i];
     //$row[2] = $result_array[$i];
     $rate = ($row[2] / $row[1])*100;
     $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
   }

   $tdef=0;
   if($stmt = $conn1->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from 19:%' and '$to 05:%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
   while ($def = $stmt->fetch_row()){
      echo "<td>$def[0]</td>";
       $tdef+=$def[0];}
   echo "<td><b>$tdef<b></td></tr>";
   }
   
   include('conn2.php');
   $tinput=0;
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%' 
   and 1_smt.pcb.jo_number like '2%' ")){
     
   echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
   while ($input = $stmt->fetch_row()){
   echo "<td>$input[2]</td>";
   $input_array[]=$input[2];
   $tinput+=$input[2];} 
   echo "<td><b>$tinput<b></tr>";}
   
   $yield;
   $tyield=0;
   include('conn2.php');
   if($stmt = $conn1->query("SELECT 1_smt.pcb.created_at, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
   WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and 1_smt.pcb.created_at BETWEEN '$from 19:%' and '$to 05:%'
   and 1_smt.pcb.jo_number like '2%'  and PROCESS_NAME like 'SMT.INPUT%'")){
   echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
   $i=0;
   while ($output = $stmt->fetch_row()){
   $yield=($output[2]/$input_array[$i])*100;
   //echo $output[2].",,";
   echo "<td>". round($yield,3)." %</td>";
   echo "<td>$yield %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%</tr>";}      
      
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



$varchart = $_POST['chartType'];

    
    switch($varchart)
    {
      case "column":
      
      getColumn();
      break;

      case "pie":

      getpie();
      break;
      default: echo("Error!"); exit(); break;
}

        }

break;


  }//case line
}//else
//////////////////////////////////////
break;




case"all": 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
    
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();// create PHP array

  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
  echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
  echo "<td><b>$row[0]<b></td>";
  //$php_data_array[] = $row;
  }
   echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   $tplan=0;
  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
  on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%' and PDLINE_NAME like 'SMTL1' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL1' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL1'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL1' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
              break;

    case "l2":
    

// smt daily prod line 2---------------------------------------

if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();// create PHP array

  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by DATE_")){
  echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
  echo "<td><b>$row[0]<b></td>";
  //$php_data_array[] = $row;
  }
   echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   $tplan=0;
  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL2' group by DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
  on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%' and PDLINE_NAME like 'SMTL2' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL2' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
$row[1]=$job_array[$i];
//echo $row[2]."//".$row[1]."///";
$rate = ($row[2] / $row[1])*100;
$trate += $rate;
 echo "<td>". round($rate,3) ."%</td>";
$i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}
$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL2'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL2' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
      break;


    case "l3": 
    

    // smt daily prod line 3---------------------------------------

    if (isset($_POST['daily'])){
      include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
    
      $begin = new DateTime( $from );
      $end   = new DateTime( $to );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array

      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by DATE_")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL3' group by DATE_")){
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
      if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
      on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
      if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
      WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
      like '2%' and PDLINE_NAME like 'SMTL3' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
    like '2%' and PDLINE_NAME like 'SMTL3' group by masterdatabase.mis_prod_plan_dl.DATE_")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
    while ($row = $stmt->fetch_row()){
    $row[1]=$job_array[$i];
    //echo $row[2]."//".$row[1]."///";
    $rate = ($row[2] / $row[1])*100;
    $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
    echo "<td><b>". round($trate,3) ."%<b></td></tr>";
    }
    $tdef=0;
    if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
    while ($def = $stmt->fetch_row()){
     echo "<td>$def[0]</td>";
      $tdef+=$def[0];}
    echo "<td><b>$tdef<b></td></tr>";
    }
    
    include('conn2.php');
    $tinput=0;
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL3'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
    echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
    while ($input = $stmt->fetch_row()){
    echo "<td>$input[2]</td>";
    $input_array[]=$input[2];
    $tinput+=$input[2];}
    echo "<td><b>$tinput<b></td></tr>";}
    
    $yield;
    $tyield=0;
    include('conn2.php');
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL3' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
      break;


    case "l4":
    
// smt daily prod line 4---------------------------------------

if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();// create PHP array

  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by DATE_")){
  echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
  echo "<td><b>$row[0]<b></td>";
  //$php_data_array[] = $row;
  }
   echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   $tplan=0;
  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL4' group by DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
  on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%' and PDLINE_NAME like 'SMTL4' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL4' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
$row[1]=$job_array[$i];
//echo $row[2]."//".$row[1]."///";
$rate = ($row[2] / $row[1])*100;
$trate += $rate;
 echo "<td>". round($rate,3) ."%</td>";
$i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}
$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL4'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL4' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
        break;


    case "l5":
    
    // smt daily prod line 5---------------------------------------

    if (isset($_POST['daily'])){
      include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
    
      $begin = new DateTime( $from );
      $end   = new DateTime( $to );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array

      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by DATE_")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL5' group by DATE_")){
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
      if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
      on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
      if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
      WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
      like '2%' and PDLINE_NAME like 'SMTL5' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
    like '2%' and PDLINE_NAME like 'SMTL5' group by masterdatabase.mis_prod_plan_dl.DATE_")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
    while ($row = $stmt->fetch_row()){
    $row[1]=$job_array[$i];
    //echo $row[2]."//".$row[1]."///";
    $rate = ($row[2] / $row[1])*100;
    $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
    echo "<td><b>". round($trate,3) ."%<b></td></tr>";
    }
    $tdef=0;
    if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
    while ($def = $stmt->fetch_row()){
     echo "<td>$def[0]</td>";
      $tdef+=$def[0];}
    echo "<td><b>$tdef<b></td></tr>";
    }
    
    include('conn2.php');
    $tinput=0;
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL5'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
    echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
    while ($input = $stmt->fetch_row()){
    echo "<td>$input[2]</td>";
    $input_array[]=$input[2];
    $tinput+=$input[2];}
    echo "<td><b>$tinput<b></td></tr>";}
    
    $yield;
    $tyield=0;
    include('conn2.php');
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL5' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
        break;


    case "l6":
    
// smt daily prod line 6---------------------------------------

if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();// create PHP array

  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by DATE_")){
  echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
  echo "<td><b>$row[0]<b></td>";
  //$php_data_array[] = $row;
  }
   echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   $tplan=0;
  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL6' group by DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
  on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%' and PDLINE_NAME like 'SMTL6' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL6' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
$row[1]=$job_array[$i];
//echo $row[2]."//".$row[1]."///";
$rate = ($row[2] / $row[1])*100;
$trate += $rate;
 echo "<td>". round($rate,3) ."%</td>";
$i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}
$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL6'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL6' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
      break;


     case "l7": 

     // smt daily prod line 7---------------------------------------

     if (isset($_POST['daily'])){
      include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
    
      $begin = new DateTime( $from );
      $end   = new DateTime( $to );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array

      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by DATE_")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL7' group by DATE_")){
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
      if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
      on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
      if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
      WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
      like '2%' and PDLINE_NAME like 'SMTL7' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
    like '2%' and PDLINE_NAME like 'SMTL7' group by masterdatabase.mis_prod_plan_dl.DATE_")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
    while ($row = $stmt->fetch_row()){
    $row[1]=$job_array[$i];
    //echo $row[2]."//".$row[1]."///";
    $rate = ($row[2] / $row[1])*100;
    $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
    echo "<td><b>". round($trate,3) ."%<b></td></tr>";
    }
    $tdef=0;
    if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
    while ($def = $stmt->fetch_row()){
     echo "<td>$def[0]</td>";
      $tdef+=$def[0];}
    echo "<td><b>$tdef<b></td></tr>";
    }
    
    include('conn2.php');
    $tinput=0;
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL7'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
    echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
    while ($input = $stmt->fetch_row()){
    echo "<td>$input[2]</td>";
    $input_array[]=$input[2];
    $tinput+=$input[2];}
    echo "<td><b>$tinput<b></td></tr>";}
    
    $yield;
    $tyield=0;
    include('conn2.php');
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL7' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }

        break;


     case "l8":

     // smt daily prod line 8---------------------------------------

     if (isset($_POST['daily'])){
      include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
    
      $begin = new DateTime( $from );
      $end   = new DateTime( $to );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();// create PHP array

      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by DATE_")){
      echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
      while ($row = $stmt->fetch_row()) {
      echo "<td><b>$row[0]<b></td>";
      //$php_data_array[] = $row;
      }
       echo "<td width='100px'><b>TOTAL<b></td></tr>";}
       $tplan=0;
      if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL8' group by DATE_")){
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
      if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
      on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
      and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
      if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
      WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
      like '2%' and PDLINE_NAME like 'SMTL8' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
    like '2%' and PDLINE_NAME like 'SMTL8' group by masterdatabase.mis_prod_plan_dl.DATE_")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
    while ($row = $stmt->fetch_row()){
    $row[1]=$job_array[$i];
    //echo $row[2]."//".$row[1]."///";
    $rate = ($row[2] / $row[1])*100;
    $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
    echo "<td><b>". round($trate,3) ."%<b></td></tr>";
    }
    $tdef=0;
    if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
    echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
    while ($def = $stmt->fetch_row()){
     echo "<td>$def[0]</td>";
      $tdef+=$def[0];}
    echo "<td><b>$tdef<b></td></tr>";
    }
    
    include('conn2.php');
    $tinput=0;
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
    and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL8'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
    echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
    while ($input = $stmt->fetch_row()){
    echo "<td>$input[2]</td>";
    $input_array[]=$input[2];
    $tinput+=$input[2];}
    echo "<td><b>$tinput<b></td></tr>";}
    
    $yield;
    $tyield=0;
    include('conn2.php');
    if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
    WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
    and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL8' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
    
    
    
    $varchart = $_POST['chartType'];
    
    
    switch($varchart)
    {
    case "column":
    
    getColumn();
    break;
    
    case "pie":
    
    getpie();
    break;
    default: echo("Error!"); exit(); break;
    }
    
    
    }
        break;


     case "l9": 

// smt daily prod line 9---------------------------------------

if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();// create PHP array

  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by DATE_")){
  echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
  echo "<td><b>$row[0]<b></td>";
  //$php_data_array[] = $row;
  }
   echo "<td width='100px'><b>TOTAL<b></td></tr>";}
   $tplan=0;
  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL9' group by DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
  on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
  and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%' and PDLINE_NAME like 'SMTL9' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL9' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
$row[1]=$job_array[$i];
//echo $row[2]."//".$row[1]."///";
$rate = ($row[2] / $row[1])*100;
$trate += $rate;
 echo "<td>". round($rate,3) ."%</td>";
$i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}
$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL9'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL9' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
      break;


     case "l10":

// smt daily prod line 10---------------------------------------

if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();// create PHP array

if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by DATE_")){
echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
while ($row = $stmt->fetch_row()) {
echo "<td><b>$row[0]<b></td>";
//$php_data_array[] = $row;
}
 echo "<td width='100px'><b>TOTAL<b></td></tr>";}
 $tplan=0;
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL10' group by DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL10' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL10' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
$row[1]=$job_array[$i];
//echo $row[2]."//".$row[1]."///";
$rate = ($row[2] / $row[1])*100;
$trate += $rate;
 echo "<td>". round($rate,3) ."%</td>";
$i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}
$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL10'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL10' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
      break;


     case "l11":

// smt daily prod line 11---------------------------------------

if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();// create PHP array

if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by DATE_")){
echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
while ($row = $stmt->fetch_row()) {
echo "<td><b>$row[0]<b></td>";
//$php_data_array[] = $row;
}
 echo "<td width='100px'><b>TOTAL<b></td></tr>";}
 $tplan=0;
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL11' group by DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL11' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL11' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
$row[1]=$job_array[$i];
//echo $row[2]."//".$row[1]."///";
$rate = ($row[2] / $row[1])*100;
$trate += $rate;
 echo "<td>". round($rate,3) ."%</td>";
$i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}
$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL11'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL11' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
      break;


     case "l12":


     // smt daily prod line 12---------------------------------------
    
if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();// create PHP array

if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by DATE_")){
echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
while ($row = $stmt->fetch_row()) {
echo "<td><b>$row[0]<b></td>";
//$php_data_array[] = $row;
}
 echo "<td width='100px'><b>TOTAL<b></td></tr>";}
 $tplan=0;
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL12' group by DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL12' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL12' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
$row[1]=$job_array[$i];
//echo $row[2]."//".$row[1]."///";
$rate = ($row[2] / $row[1])*100;
$trate += $rate;
 echo "<td>". round($rate,3) ."%</td>";
$i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}
$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL12'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL12' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
      break;

      case "l13":

// smt daily prod line 13---------------------------------------


if (isset($_POST['daily'])){
  include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );
  $php_data_array = Array(); 
  $job_array = Array();
  $input_array = Array();
  $result_array = Array();// create PHP array

if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by DATE_")){
echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
while ($row = $stmt->fetch_row()) {
echo "<td><b>$row[0]<b></td>";
//$php_data_array[] = $row;
}
 echo "<td width='100px'><b>TOTAL<b></td></tr>";}
 $tplan=0;
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL13' group by DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
and PROCESS_NAME like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL13' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
like '2%' and PDLINE_NAME like 'SMTL13' group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
$row[1]=$job_array[$i];
//echo $row[2]."//".$row[1]."///";
$rate = ($row[2] / $row[1])*100;
$trate += $rate;
 echo "<td>". round($rate,3) ."%</td>";
$i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}
$tdef=0;
if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
 echo "<td>$def[0]</td>";
  $tdef+=$def[0];}
echo "<td><b>$tdef<b></td></tr>";
}

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
and 1_smt.pcb.jo_number like '2%' and PDLINE_NAME like 'SMTL13'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' and PDLINE_NAME like 'SMTL13' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
case "column":

getColumn();
break;

case "pie":

getpie();
break;
default: echo("Error!"); exit(); break;
}


}
      break;

  case "overall":

  // ----------------SUM OF PROD RESULT daily overall------------------------------------- --> 

  
    if (isset($_POST['daily'])){
      include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
    
      $begin = new DateTime( $from );
      $end   = new DateTime( $to );
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();// create PHP array
  
  if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
   echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
  while ($row = $stmt->fetch_row()) {
    echo "<td><b>$row[0]<b></td>";
   //$php_data_array[] = $row;
  }
     echo "<td width='100px'><b>TOTAL<b></td></tr>";}
     $tplan=0;
    if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY) FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' group by DATE_")){
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
   if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl left join 1_smt.pcb 
   on masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number where masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number like '2%' 
   and PROCESS_NAME like 'SMT.INPUT%' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, masterdatabase.mis_prod_plan_dl.PLAN_QTY, COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%' group by masterdatabase.mis_prod_plan_dl.DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
   $i=0;
  while ($gp = $stmt->fetch_row()){
    $gp[1]=$job_array[$i];
    $gp[2]=$result_array[$i];
    //echo $gp[1]."//".$gp[2]."///";
    $gap = $gp[1] - $gp[2];
     echo "<td>$gap</td>";
     $tgap = $tplan - $tresult;
    $i++;}
     echo "<td><b>$tgap<b></td></tr>";
  }
  
  $i=0; $trate=0;
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, SUM(PLAN_QTY), COUNT(1_smt.pcb.RESULT) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ BETWEEN '$from' and '$to' and 1_smt.pcb.jo_number 
  like '2%' group by masterdatabase.mis_prod_plan_dl.DATE_")){
   echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
  while ($row = $stmt->fetch_row()){
    $row[1]=$job_array[$i];
    //echo $row[2]."//".$row[1]."///";
    $rate = ($row[2] / $row[1])*100;
    $trate += $rate;
     echo "<td>". round($rate,3) ."%</td>";
    $i++;}
  echo "<td><b>". round($trate,3) ."%<b></td></tr>";
  }

  $tdef=0;
  if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
   echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
  while ($def = $stmt->fetch_row()){
     echo "<td>$def[0]</td>";
      $tdef+=$def[0];}
  echo "<td><b>$tdef<b></td></tr>";
  }

include('conn2.php');
$tinput=0;
  if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb 
  WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to'
   and 1_smt.pcb.jo_number like '2%'  group by masterdatabase.mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
echo "<td>$input[2]</td>";
$input_array[]=$input[2];
$tinput+=$input[2];}
echo "<td><b>$tinput<b></td></tr>";}

$yield;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT masterdatabase.mis_prod_plan_dl.DATE_, 1_smt.pcb.jo_number, COUNT(1_smt.pcb.PROCESS_NAME) FROM masterdatabase.mis_prod_plan_dl, 1_smt.pcb
 WHERE masterdatabase.mis_prod_plan_dl.JOB_ORDER_NO = 1_smt.pcb.jo_number and masterdatabase.mis_prod_plan_dl.DATE_ between '$from' and '$to' 
 and 1_smt.pcb.jo_number like '2%' and 1_smt.pcb.PROCESS_NAME  like 'SMT.INPUT%' group by masterdatabase.mis_prod_plan_dl.DATE_")){
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



$varchart = $_POST['chartType'];


switch($varchart)
{
  case "column":
  
  getColumn();
  break;

  case "pie":

  getpie();
  break;
  default: echo("Error!"); exit(); break;
}


    }
   
   break;

    default: echo("Error!"); exit(); break;
  }
  

  exit();
}

//////////////////////////////////////////////////////////////////////////////////////////////
break;

default: echo("Error!"); 
exit();
break;
      }
    }
//---------------------




?>

 <!-- Optional JavaScript -->


<div class="mdl" style=" z-index: 1">

<!-- Place at bottom of page --></div>

</body>
  
	</html>