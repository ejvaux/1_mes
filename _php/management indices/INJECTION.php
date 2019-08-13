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


<!-- ------------------------selections----------------------- -->


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

  <label> PROD LINE: </label>
	<select name="Linename">
		<option value="overall">OVERALL</option>
		<option value="l1">Line 1</option>
		<option value="l2">Line 2</option>
		<option value="l3">Line 3</option>
		<option value="l4">Line 4</option>
		<option value="l5">Line 5</option>
	
	</select> 

  
    <label>From: </label><input type="month" name="monthfrom" style="height:25px; width:180px" >
		<label >To: </label><input type="month" name="monthto" style="height:25px; width:180px" >
		<input type="submit" value="Monthly" name="monthly" width="15px" style="height:30px; width:70px">
    
</div>
<select id ="chartType" name="chartType" style="height:30px; width:80px">
<option value="column">Column</option>
<option value="pie">Pie </option>
</select>
</form>
      </div>
    </div>
    <br>



<div align = "center">
<label><b>PRODUCTION SUMMARY OF <i>INJECTION </i></b></label>
</div>

 <!-----------------------DISPLAY column CHART HERE -----------------------------> 

<?php
function getColumn(){
  ?>
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
<?php }
//--------------------------------------pie chart
function getPie(){
?>
 
<div id="chart_div" style="float:left;">
        <canvas id="chart-area"  >
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
                       height:400};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }


</script> 

<div id="chart_div1"  style="float:right;">
        <canvas id="chart-area-km"  >
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
                       height:400};

        // Instantiate and draw the chart
        var chart1 = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart1.draw(data1, options1);
      }


</script> 
</div>

    
<!-- ----------------SUM OF PROD RESULT daily------------------------------------- --> 
<?php 
}
/*
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
        break; 
        
        case "l2":
        break;
        
        case "l3":
        break;*/


$row = 0;
	if (isset($_POST['daily'])){
		include('conn1.php');
		$from=date('Y-m-d',strtotime($_POST['from']));
		$to=date('Y-m-d',strtotime($_POST['to']));
	
		$begin = new DateTime( $from );
		$end   = new DateTime( $to );
    $php_data_array = Array(); 
    $job_array = Array();
    $in = Array();// create PHP array

if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by mis_prod_plan_dl.DATE_")){
 echo "<table border = '3' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
while ($row = $stmt->fetch_row()) {
  echo "<td width='80px'><b>$row[0]<b></td>";
 //$php_data_array[] = $row;
} 
  echo "<td><b>TOTAL<b></td></tr>";}

$tplan=0;
  if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
while ($row = $stmt->fetch_row()){
  $tplan+=$row[1];
  echo "<td>$row[1]</td>";
 //$php_data_array[] = $row;
}
 echo "<td><b>$tplan<b></td></tr>";}

$tresult=0;
 if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by mis_prod_plan_dl.DATE_")){
 echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
while ($row = $stmt->fetch_row()){
  $tresult+=$row[2];
   echo "<td>$row[2]</td>";
   $php_data_array[] = $row;
 } 
echo "<td><b>$tresult<b></td></tr>";}

 $tgap=0;
if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by mis_prod_plan_dl.DATE_")){
 echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
while ($row = $stmt->fetch_row()){
  $gap = $row[1] - $row[2];
   echo "<td>$gap</td>";}  $tgap=$tplan-$tresult;
echo "<td><b>$tgap<b></td></tr>";}

$trate=0; $i=0;
if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT), FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by mis_prod_plan_dl.DATE_")){
 echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
  $rate = ($row[2] / $row[1])*100;
  $trate+=$rate;
  echo "<td>". round($rate,3) ."%</td>";
  $i++;}
echo "<td><b>". round($trate,3) ."%<b></td></tr>";
}

$tdef=0;
include('conn2.php');
  if($stmt = $conn2->query("SELECT COUNT(created_at), updated_at FROM defect_mats WHERE created_at BETWEEN '$from%' and '$to%' group by DATE(updated_at)")){
   echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
  while ($def = $stmt->fetch_row()){
     echo "<td>$def[0]</td>";
      $tdef+=$def[0];}
  echo "<td><b>$tdef<b></td></tr>";
  }

include('conn2.php');
$tinput=0;
if($stmt = $conn1->query("SELECT created_at, COUNT(PROCESS_NAME) FROM pcb WHERE created_at between '$from' and '$to' and jo_number like'1%'")){
 echo "<tr align = 'center'> <th width = '100px'>INPUT</th>";
while ($input = $stmt->fetch_row()){
   echo "<td>$input[1]</td>";
   $input_array[]=$input[1];
$tinput+=$input[1];}
echo "<td><b>$tinput<b></td></tr>";}

$yield=0;
$tyield=0;
include('conn2.php');
if($stmt = $conn1->query("SELECT created_at, COUNT(PROCESS_NAME) FROM pcb WHERE created_at between '$from' and '$to' and jo_number like'1%' and PROCESS_NAME  like 'SMT.INPUT%'")){
 echo "<tr align = 'center'> <th width = '100px'>YIELD %</th>";
while ($output = $stmt->fetch_row()){
$yield=($output[1]/$in[$i])*100;
   echo "<td>". round($yield,3)." %</td>";
   $tyield+=$yield;
   $i++;
   }echo "<td><b>". round($tyield,3) ."%<b></td></tr>";}      
     //else{ 
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

  


?>
	<!------------------------------- sum of prod result monthly------------------------- --> 

<?php
/*
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
        break;*/

	if (isset($_POST['monthly'])){
		include('conn1.php');
		$mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
		$mto=date('Y-m-d',strtotime($_POST['monthto']));
	
		$begin = new DateTime( $mfrom );
		$end   = new DateTime( $mto );
		$php_data_array = Array(); // create PHP array


    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by MONTH(mis_prod_plan_dl.DATE_)")){
     echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($row = $stmt->fetch_row()) {
      echo "<td>$row[0]</td>";
     //$php_data_array[] = $row;
    }
      echo "<td><b>TOTAL<b></td></tr>";}
    $tplan=0;
      if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by MONTH(mis_prod_plan_dl.DATE_)")){
    echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
    while ($row = $stmt->fetch_row()){
      echo "<td>$row[1]</td>";
      $tplan+=$row[1];
     //$php_data_array[] = $row;
    }
     echo "<td><b>$tplan<b></td></tr>";}
    $tresult=0;
     if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by MONTH(mis_prod_plan_dl.DATE_)")){
     echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    while ($row = $stmt->fetch_row()){
       echo "<td>$row[2]</td>";
       $php_data_array[] = $row;
      $tresult+=$row[2];}
    echo "<td><b>$tresult<b></td></tr>";
    } 
$tgap=0;
    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by MONTH(mis_prod_plan_dl.DATE_)")){
     echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
    while ($row = $stmt->fetch_row()){
      $gap = $row[1] - $row[2];
      echo "<td>$gap</td>";
      $tgap+=$gap;}
      echo "<td><b>$tgap<b></td></tr>";
    } 


    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'1%' group by MONTH(mis_prod_plan_dl.DATE_)")){
    echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE</th>";
    while ($row = $stmt->fetch_row()){
      $rate = ($row[2] / $row[1])*100;
      echo "<td>$rate %</td>";}
    echo "</tr>";
    } 


    if($stmt = $conn1->query("SELECT PROD_DATE, JOB_ORDER_NO, SUM(DEF_QUANTITY) FROM qmd_defect_dl WHERE PROD_DATE between '$mfrom' and '$mto' 
and JOB_ORDER_NO like'1%' group by PROD_DATE")){
 echo "<tr align = 'center'> <th width = '100px'>DEFECT</th>";
while ($def = $stmt->fetch_row()){
   echo "<td>$def[2]</td>";}
echo "</tr>";
}

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
	
?>

 <!-- Optional JavaScript -->


<div class="mdl" style=" z-index: 1"><!-- Place at bottom of page --></div>

</body>
  
	</html>