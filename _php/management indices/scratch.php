	
	
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

echo "<table border = '2' align = 'center' ><tr align = 'center'> <th width = '100px'>DATE</th><th width = '100px'>PROD PLAN</th><th width = '150px'>PROD RESULT</th><th width = '100px'>GAP</th><th width = '150px'>ACHIEVE RATE %</th><th WIDTH = '100px'>DEFECT</th><th WIDTH = '100px'>INPUT</th><th width = '100px'>YIELD %</th></tr>";


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
 echo "<table border = '1' align = 'center'><tr align = 'center' ><th><table border = '1' align = 'center' width = '898px'>OVERALL TOTAL</th></tr><tr align = 'center'><th width = '100px'>PLAN</th><td>$total</td><th width = '100px'>RESULT</th><td>$itotal</td></tr>"."</br>";
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