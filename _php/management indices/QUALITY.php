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
              <li><a id="tb3" class="nav-link tbl" href="FATP.php" onclick="">FATP</a></li>
              <li><a id="tb4" class="nav-link tbl" href="DIP.php" onclick="">DIP</a></li>
              <li><a id="tb5" class="nav-link tbl" href="DIP TEST.php" onclick="">DIP TEST</a></li>
              <li><a id="tb6" class="nav-link tbl" href="ASSY.php" onclick="">ASSY</a></li>
              <li><a id="tb7" class="nav-link tbl" href="QUALITY.php" onclick="">QUALITY</a></li>
              <li><a id="tb8" class="nav-link tbl" href="SALES.php" onclick="">SALES</a></li>
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
<div class="container-fluid mt-5 ml-0 pl-0" id="table_display" style="width: 100%;">
      <div class="row text-left">
        <div class="col-11" >
			

	<form method="POST">

		<label>From: </label><input type="date" name="from">
		<label>To: </label><input type="date" name="to">
		<input type="submit" value="Daily" name="daily">


		<select>
    <option value="1">LINE 1</option>
    <option value="2">LINE 2</option>
    <option value="3">LINE 3</option>
		<option value="4">LINE 4</option>
    <option value="5">LINE 5</option>
    <option value="6">LINE 6</option>
		<option value="7">LINE 7</option>
    <option value="8">LINE 8</option>
    <option value="9">LINE 9</option>
		<option value="10">LINE 10</option>
    <option value="11">LINE 11</option>
    <option value="12">LINE 12</option>
		<option value="13">LINE 13</option>
</select>

<!--<label><input type="checkbox" class="agree">Daily/Monthly  </label> -->

<label>From: </label><input type="month" name="monthfrom">
		<label >To: </label><input type="month" name="monthto" >
		<input type="submit" value="Monthly" name="monthly">

<select>
		<option value="14">Column Chart</option>
		<option value="15">Pie Chart</option>
</select>

<br><br>
</form>

</div>
      </div>
    </div>

		<?php 
		// Option Line query
		/*/ you have already opened your db connection
		include('conn1.php');
				$line = $conn1->query("SELECT division_id FROM smt_line_names ORDER BY id");
				//or die("Invalid query: " . mysql_query());
			//	$rowCount = $line->num_rows;
				echo '<label>Select Line:</label>';
				echo '<select>';
				//if ($rowCount > 0){
				echo '<option value=" ">Select</option>';
				while ($lrow = $line->fetch_assoc()) {
					$inc += 1;
				$va = $lrow['value']; 
				echo "<option value='$inc'>$va</option>";
				}//}
				echo '</select>'; */

	?>

<!-- ---------------------DISPLAY CHART HERE ------------------------------- --> 

<div align = "center">
<label><b>PRODUCTION SUMMARY OF <i>QUALITY </i></b></label></div>

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

<!-- ----------------SUM OF PROD RESULT daily------------------------------------- --> 
<?php 
$total = 0;
$itotal = 0;
$row = 0;
	if (isset($_POST['daily'])){
		include('conn.php');
		$from=date('Y-m-d',strtotime($_POST['from']));
		$to=date('Y-m-d',strtotime($_POST['to']));
	
		$begin = new DateTime( $from );
		$end   = new DateTime( $to );
		$php_data_array = Array(); // create PHP array

// over all total of date range,, CASE STATEMENT
if($stmt = $conn->query("SELECT DATE_, SUM(PLAN_QTY), SUM(PROD_RESULT) FROM mis_prod_plan_dl Where DATE_ between '$from' and '$to' and JOB_ORDER_NO like '1%' group by DATE_ ")){


//$php_data_array = Array(); // create PHP array

echo "<table border = '2' align = 'center' ><tr align = 'center'> <th width = '100px'>DATE</th><th width = '100px'>PROD PLAN</th><th width = '150px'>PROD RESULT</th><th width = '100px'>GAP</th><th width = '150px'>ACHIEVE RATE %</th><th WIDTH = '100px'>DEFECT</th><th width = '100px'>YIELD %</th></tr>";


while ($row = $stmt->fetch_row()) {
	$gap = 0; $rate = 0;
	$gap = $row[1] - $row[2];
//	$rate = $row[1] / $row[2];
	 echo "<tr align = 'center'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$gap</td></tr>";
	 //echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$gap</td><td>$rate</td></tr>";
	 
 $php_data_array[] = $row; // Adding to array

 $total+= $row[1];
 $itotal+=$row[2];
}
 echo "<table border = '1' align = 'center'><tr align = 'center' ><th><table border = '1' align = 'center' width = '800px'>OVERALL TOTAL</th></tr><tr align = 'center'><th width = '100px'>PLAN</th><td>$total</td><th width = '100px'>RESULT</th><td>$itotal</td></tr>"."</br>";
}

 
//else{ 
//echo $conn->error;
//}

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
	}


	// ----------------------------- sum of prod result monthly-------------------------

	if (isset($_POST['monthly'])){
		include('conn.php');
		$mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
		$mto=date('Y-m-d',strtotime($_POST['monthto']));
	
		$begin = new DateTime( $mfrom );
		$end   = new DateTime( $mto );
		$php_data_array = Array(); // create PHP array

// over all total of date range,, CASE STATEMENT
if($stmt = $conn->query("SELECT MONTH(DATE_), SUM(PLAN_QTY), SUM(PROD_RESULT) FROM mis_prod_plan_dl Where DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like '1%' group by MONTH(DATE_)")){


//$php_data_array = Array(); // create PHP array

echo "<table border = '2' align = 'center' ><tr align = 'center'> <th width = '100px'>DATE</th><th width = '100px'>PROD PLAN</th><th width = '150px'>PROD RESULT</th><th width = '100px'>GAP</th><th width = '150px'>ACHIEVE RATE %</th><th WIDTH = '100px'>DEFECT</th><th width = '100px'>YIELD %</th></tr>";


while ($row = $stmt->fetch_row()) {
	$gap = 0; $rate = 0;
	$gap = $row[1] - $row[2];
//	$rate = $row[1] / $row[2];
	 echo "<tr align = 'center'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$gap</td></tr>";
	 //echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$gap</td><td>$rate</td></tr>";
	 
 $php_data_array[] = $row; // Adding to array

 $total+= $row[1];
 $itotal+=$row[2];
}
 echo "<table border = '1' align = 'center'><tr align = 'center' ><th><table border = '1' align = 'center' width = '800px'>OVERALL TOTAL</th></tr><tr align = 'center'><th width = '200px'>PLAN</th><td>$total</td><th width = '200px'>RESULT</th><td>$itotal</td></tr>"."</br>";
}
 
//else{ 
//echo $conn->error;
//}

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
	}
	
?>


 <!-- Optional JavaScript -->


<div class="mdl" style=" z-index: 1"><!-- Place at bottom of page --></div>

</body>
  
	</html>