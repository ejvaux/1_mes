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
              <li><a id="tb3" class="nav-link tbl" href="#" onclick="">FATP</a></li>
              <li><a id="tb4" class="nav-link tbl" href="DIP.php" onclick="">DIP</a></li>
              <li><a id="tb5" class="nav-link tbl" href="#" onclick="">DIP TEST</a></li>
              <li><a id="tb6" class="nav-link tbl" href="#" onclick="">ASSY</a></li>
              <li><a id="tb7" class="nav-link tbl" href="#" onclick="">QUALITY</a></li>
              <li><a id="tb8" class="nav-link tbl" href="#" onclick="">SALES</a></li>
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
<label>To: </label><input type="date" name="to" >


	<label for='Linename'>Select:</label>
	<select name="Linename">
		<option value="">Prod Line</option>
		<option value="l1">Line 1</option>
		<option value="l2">Line 2</option>
		<option value="l3">Line 3</option>
		<option value="l4">Line 4</option>
		<option value="l5">Line 5</option>
		<option value="l6">Line 6</option>
	</select> 
	<input type="submit" name="daily" value="Daily" />

<!--<label><input type="checkbox" class="agree">Daily/Monthly  </label> -->

<label>From: </label><input type="month" name="monthfrom">
		<label >To: </label><input type="month" name="monthto">
		<input type="submit" value="Monthly" name="monthly">



<br><br>
</form>

</div>
      </div>
    </div>


<!-- ---------------------DISPLAY CHART HERE ------------------------------- --> 

<div align = "center">
<label><b>PRODUCTION SUMMARY OF <i>INJECTION </i></b></label></div>

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
function daymonth(){
$total = 0;
$itotal = 0;
$row = 0;
	if (isset($_POST['daily'])){
		include('conn1.php');
		$from=date('Y-m-d',strtotime($_POST['from']));
		$to=date('Y-m-d',strtotime($_POST['to']));
	
		$begin = new DateTime( $from );
		$end   = new DateTime( $to );
		$php_data_array = Array(); // create PHP array

// over all total of date range,, CASE STATEMENT
if($stmt = $conn1->query("SELECT DATE_, SUM(PLAN_QTY), SUM(PROD_RESULT) FROM mis_prod_plan_dl Where DATE_ between '$from' and '$to' and JOB_ORDER_NO like '1%' group by DATE_ ")){


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
		include('conn1.php');
		$mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
		$mto=date('Y-m-d',strtotime($_POST['monthto']));
	
		$begin = new DateTime( $mfrom );
		$end   = new DateTime( $mto );
		$php_data_array = Array(); // create PHP array

// over all total of date range,, CASE STATEMENT
if($stmt = $conn1->query("SELECT MONTH(DATE_), SUM(PLAN_QTY), SUM(PROD_RESULT) FROM mis_prod_plan_dl Where DATE_ between '$mfrom' and '$mto' and JOB_ORDER_NO like '1%' group by MONTH(DATE_)")){


//$php_data_array = Array(); // create PHP array

echo "<table border = '2' align = 'center' ><tr> <th width = '100px'>DATE</th><th width = '100px'>PROD PLAN</th><th width = '150px'>PROD RESULT</th><th width = '100px'>GAP</th><th width = '150px'>ACHIEVE RATE %</th><th WIDTH = '100px'>DEFECT</th><th width = '100px'>YIELD %</th></tr>";


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
  
}
?>

<?php
//------------------------------------- line query
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
			// note that both methods can't be demonstrated at the same time
			// comment out the method you don't want to demonstrate

			// method 1: switch
		//	$redir = "US.html";
			switch($varLine)
			{
				case "l1": 
	
          daymonth();
				
				break; //line1

				case "l2":
				
      //	$redir = "UK.html"; 
      break;

				case "l3": 
          //$redir = "France.html"; 
          break;

				case "l4":
           //$redir = "Mexico.html"; 
           break;

				case "l5":
           //$redir = "Russia.html"; 
           break;

				case "l6":
        // $redir = "Japan.html"; 
        break;

				default: echo("Error!"); exit(); break;
			}
	
			exit();
		}
	}
?>

 <!-- Optional JavaScript -->


<div class="mdl" style=" z-index: 1"><!-- Place at bottom of page --></div>

</body>
  
	</html>