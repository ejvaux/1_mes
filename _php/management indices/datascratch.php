<!DOCTYPE HTML> 
<html>
<head>
	<title>PHP form select box example</title>
<!-- define some style elements-->
<style>
label,a 
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px; 
}

</style>	
</head>

<body>
<select id="chartType" name="chart Type" style="height:30px; width:80px">
<option value="column">Column</option>
<option value="pie">Pie </option>
</select>



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
	//query of line 1 ----------------------------------------------------------
$row = 0;
	if (isset($_POST['daily'])){
		include('conn1.php');
		$from=date('Y-m-d',strtotime($_POST['from']));
		$to=date('Y-m-d',strtotime($_POST['to']));
	
		$begin = new DateTime( $from );
		$end   = new DateTime( $to );
    $php_data_array = Array(); 
    $job_array = Array();// create PHP array
	
if($stmt = $conn1->query("SELECT DATE_ FROM mis_prod_plan_dl WHERE DATE_ between '$from' and '$to' and JOB_ORDER_NO like'2%' and MACHINE_CODE like 'SMTL1' group by DATE_")){
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
				
				  break;

				case "l3": 
				  break;

				case "l4":
				   break;

				case "l5":
				    break;

				case "l6":
				 break;

				default: echo("Error!"); exit(); break;
			}
	
			exit();
		}
	}


?>

<form method="post">

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
</form>





</body>
</html>