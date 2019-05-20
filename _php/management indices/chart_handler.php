

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <!-- Header start -->
    <?php           
      include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";
      if(!($auth == 'A' || $auth == 'B')) {          
        echo "<script type='text/javascript'>alert('Access Denied!');window.location.href='/1_mes/_php/portal.php';</script>";        
      }
    ?>
    <!-- Header end -->
    
    <!-- Change Title --> <title>Management Indices</title>

    <!-- Custom JS -->
    <script src="/1_mes/_includes/master.js"></script>
    <script src="/1_mes/_includes/displaymodal.js"></script>

    <script>
      var usrname = "<?php
      if(isset($_SESSION['username'])){
        echo $_SESSION['username'];
      }        
       ?>";
     
    
    </script>
    
    <!-- Custom CSS - START -->
    <style>
    

    </style>
    <!-- Custom CSS - END -->

  </head>

  <body>
  <script>
    NProgress.configure({  showSpinner: false });    
    NProgress.start();          
    NProgress.inc();
  </script>
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
    <!-- Navbar - END -->

    <!-- Contents - START  -->

    <div style="position: absolute;margin-top: -14px;" id="innernavbar">
      <nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span> <i class="fas fa-caret-down"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav nav-tabs mr-auto mt-1" id="tb">           
            <li><a id="tb1" class="nav-link tbl active " href="#" >INJECTION</a></li>
            <li><a id="tb2" class="nav-link tbl " href="chart_handler.php">SMT</a></li>
            <li><a id="tb3" class="nav-link tbl " href="#" >FATP</a></li> 
            
            <!--
            <li><a id="tb4" class="nav-link tbl " href="#" onclick="DisplayTable4('machine_list_table','machine_listsp','Machine List')">Machine</a></li>
            <li><a id="tb5" class="nav-link tbl " href="#" onclick="DisplayTable5('defect_code_table','defect_codesp','Defect Code')">Defect Code</a></li>
            <li><a id="tb6" class="nav-link tbl " href="#" onclick="DisplayTable6('user_info_table','user_infosp','User Information')">User Information</a></li>
            --> 
          </ul>
                    
          <!-- ICONS ON LEFT -->
          <?php
              include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/tab_navbar.php";            
          ?>
          <!-- ICONS ON LEFT END -->

        </div>  
      </nav>
    </div>    




    <div class="container-fluid mt-5 mx-0 px-0" id="table_display" style="width: 100%;">
      <div class="row text-left">
        <div class="col-sm-12 py-0 mr-0" >





        <div>
	<form method="POST">
		<label>From: </label><input type="date" name="from">
		<label>To: </label><input type="date" name="to">
		<input type="submit" value="Generate" name="submit">

	
<select>
    <option value="1">LINE 1</option>
    <option value="2">LINE 2</option>
    <option value="3">LINE 3</option>
		<option value="1">LINE 4</option>
    <option value="2">LINE 5</option>
    <option value="3">LINE 6</option>
		<option value="1">LINE 7</option>
    <option value="2">LINE 8</option>
    <option value="3">LINE 9</option>
		<option value="1">LINE 10</option>
    <option value="2">LINE 11</option>
    <option value="3">LINE 12</option>
		<option value="3">LINE 13</option>
		<option value="3">OVERALL</option>
</select> 

	</form>
</div>



<div> <!--
	<table border="1">
		<thead>
			<th>DATE</th>
			<th>PROD PLAN</th>
			<th>TOTAL PLAN</th>
			
		</thead>
		<tbody>
		<?php
		$total = 0; 
		$itotal = 0;
		$orow = 0;
	

			if (isset($_POST['submit'])){
				include('conn.php');
				$from=date('Y-m-d',strtotime($_POST['from']));
				$to=date('Y-m-d',strtotime($_POST['to']));
			
				$begin = new DateTime( $from );
				$end   = new DateTime( $to );
				
				for($i = $begin; $i <= $end; $i->modify('+1 day')){
				//	echo $i->format("Y-m-d").";  "; //date intervals
			
				} 
				$iquery = $conn->query("SELECT COUNT(DATE_), SUM(PLAN_QTY) from mis_prod_plan_dl where DATE_ between '$from' and  '$to' "); //put intervals
				while ($irow = $iquery->fetch_array()){ 
				echo $irow['SUM(PLAN_QTY)']. " - ";
				echo $irow['COUNT(DATE_)']; }

		//	}
				
				$oquery=$conn->query("SELECT DATE_, PLAN_QTY from mis_prod_plan_dl where DATE_ between '$from' and '$to' order by DATE_");

				while($orow = $oquery->fetch_array()){
					
					$total += $orow["PLAN_QTY"];
				//	echo "</br>"."total each day: ". $total;

					
					
					?>
					<tr>
					<td><?php echo $orow['DATE_']; ?></td>
					<td><?php echo $orow['PLAN_QTY']; ?></td>
				</tr>
				
					<?php 
						
				}   }   

			 echo "</br>"."the total is:  ".$total;
		?>
		</tbody>
	</table>
</div>


<!-- ----------------SUM OF PROD RESULT ------------------------------------- --> 


<?php 
$row = 0;
	if (isset($_POST['submit'])){
		include('conn.php');
		$from=date('Y-m-d',strtotime($_POST['from']));
		$to=date('Y-m-d',strtotime($_POST['to']));
	
		$begin = new DateTime( $from );
		$end   = new DateTime( $to );

// over all total of date range,, CASE STATEMENT
if($stmt = $conn->query("SELECT DATE_, SUM(PLAN_QTY), SUM(PROD_RESULT) FROM mis_prod_plan_dl Where DATE_ between '$from' and '$to' group by DATE_ ")){



$php_data_array = Array(); // create PHP array

echo "<table border = '2' ><tr> <th width = '100px'>DATE</th><th width = '100px'>PROD PLAN</th><th width = '150px'>PROD RESULT</th><th width = '100px'>GAP</th><th width = '150px'>ACHIEVE RATE %</th><th WIDTH = '100px'>DEFECT</th><th width = '100px'>YIELD %</th></tr>";


while ($row = $stmt->fetch_row()) {
	$gap = 0; $rate = 0;
	$gap = $row[1] - $row[2];
//	$rate = $row[1] / $row[2];
	 echo "<tr align = 'center'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$gap</td></tr>";
	 //echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$gap</td><td>$rate</td></tr>";
	 
 $php_data_array[] = $row; // Adding to array

 }
 $total+= $row['PLAN_QTY'];
 $itotal+=$row['PROD_RESULT'];
 echo "OVERALL: ". $total. "  - -  ".$itotal."</br> </br>";
}

//echo "<tr><th>OVERALL</th><td> $total</td><td>$itotal</td></tr> </table>"."</br> </br>";

//$php_data_array[] = $total;
 
//else{ 
//echo $conn->error;
//}

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
	}

	
?>

<!-- ---------------------DISPLAY CHART HERE ------------------------------- --> 
<div id="chart_div" >
</div>

<br><br>
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
        data.addColumn('number', 'Plan');
				data.addColumn('number', 'Result');
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
      </div>
    </div>

    <div id="mod">
    </div> 


<div class="mdl" style='z-index: 1'><!-- Place at bottom of page --></div>
 


<body>

</html>