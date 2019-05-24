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

		<label>From: </label><input type="date" name="from">
		<label>To: </label><input type="date" name="to" >
		<input type="submit" value="Daily" name="daily" > 

<!--<label><input type="checkbox" class="agree">Daily/Monthly  </label> -->

    <label>From: </label><input type="month" name="monthfrom" >
		<label >To: </label><input type="month" name="monthto" >
		<input type="submit" value="Monthly" name="monthly" >

<!--
<select>
		<option value="14">Column Chart</option>
		<option value="15">Pie Chart</option>
</select> --> 




<br>
</form>
</div>
      </div>
    </div>
    <br>


<!-- --------------------- line query ------------------------------- --> 

<div align = "center">
<label><b>PRODUCTION SUMMARY OF <i>DIP </i></b></label>

<?php 
/*
include('conn1.php');
    $line = $conn1->query("SELECT id, name FROM smt_line_names where name like 'SMTL%' order by id");
    //or die("Invalid query: " . mysql_query());
  //	$rowCount = $line->num_rows;
    echo '<label>Select Line: </label>';
    echo '<select name="linename">';
    //if ($rowCount > 0){
    echo '<option value=" ">Overall</option>';
    while ($lrow = $line->fetch_assoc()) {
  
    echo "<option value='".$lrow['id']."'>";
    echo $lrow['name']."</option>"; 
    } //}
    echo '</select>';//<input type="submit" name="submit" value="submit">'; */
?>


<!-- ---------------------DISPLAY CHART HERE ------------------------------- --> 
</div>
<br>
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
		include('conn1.php');
		$from=date('Y-m-d',strtotime($_POST['from']));
		$to=date('Y-m-d',strtotime($_POST['to']));
	
		$begin = new DateTime( $from );
		$end   = new DateTime( $to );
    $php_data_array = Array(); 
    $job_array = Array();// create PHP array

if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'7%' group by mis_prod_plan_dl.DATE_")){
 echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
while ($row = $stmt->fetch_row()) {
  echo "<td><b>$row[0]<b></td>";
 //$php_data_array[] = $row;
}
  echo "</tr>";}

  if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
  and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'7%' group by mis_prod_plan_dl.DATE_")){
echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
while ($row = $stmt->fetch_row()){
  echo "<td>$row[1]</td>";
 //$php_data_array[] = $row;
}
 echo "</tr>";}

 if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'7%' group by mis_prod_plan_dl.DATE_")){
 echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
while ($row = $stmt->fetch_row()){
   echo "<td>$row[2]</td>";
   $php_data_array[] = $row;}
echo "</tr>";
}
 
if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'7%' group by mis_prod_plan_dl.DATE_")){
 echo "<tr align = 'center'> <th width = '100px'>GAP</th>";
while ($row = $stmt->fetch_row()){
  $gap = $row[1] - $row[2];
   echo "<td>$gap</td>";}
echo "</tr>";
}


if($stmt = $conn1->query("SELECT mis_prod_plan_dl.DATE_, SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
and mis_prod_plan_dl.DATE_ between '$from' and '$to' and mis_prod_plan_dl.JOB_ORDER_NO like'7%' group by mis_prod_plan_dl.DATE_")){
 echo "<tr align = 'center'> <th width = '100px'>ACHIEVE RATE %</th>";
while ($row = $stmt->fetch_row()){
  $rate = ($row[2] / $row[1])*100;
   echo "<td>$rate %</td>";}
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

?>
	<!------------------------------- sum of prod result monthly------------------------- --> 

<?php
	if (isset($_POST['monthly'])){
		include('conn1.php');
		$mfrom=date('Y-m-d',strtotime($_POST['monthfrom']));
		$mto=date('Y-m-d',strtotime($_POST['monthto']));
	
		$begin = new DateTime( $mfrom );
		$end   = new DateTime( $mto );
		$php_data_array = Array(); // create PHP array


    if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'7%' group by MONTH(mis_prod_plan_dl.DATE_)")){
     echo "<table border = '2' ><tr align = 'center'> <th width = '100px'>DATE</th>"; 
    while ($row = $stmt->fetch_row()) {
      echo "<td>$row[0]</td>";
     //$php_data_array[] = $row;
    }
      echo "</tr>";}
    
      if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
      and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'7%' group by MONTH(mis_prod_plan_dl.DATE_)")){
    echo "<tr align = 'center'> <th width = '100px'>PROD PLAN</th>";
    while ($row = $stmt->fetch_row()){
      echo "<td>$row[1]</td>";
     //$php_data_array[] = $row;
    }
     echo "</tr>";}
    
     if($stmt = $conn1->query("SELECT MONTH(mis_prod_plan_dl.DATE_), SUM(mis_prod_plan_dl.PLAN_QTY), SUM(mis_summarize_results.PROD_RESULT) FROM mis_prod_plan_dl, mis_summarize_results WHERE mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
    and mis_prod_plan_dl.DATE_ between '$mfrom' and '$mto' and mis_prod_plan_dl.JOB_ORDER_NO like'7%' group by MONTH(mis_prod_plan_dl.DATE_)")){
     echo "<tr align = 'center'> <th width = '100px'>PROD RESULT</th>";
    while ($row = $stmt->fetch_row()){
       echo "<td>$row[2]</td>";
       $php_data_array[] = $row;}
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
	
?>

 <!-- Optional JavaScript -->


<div class="mdl" style=" z-index: 1"><!-- Place at bottom of page --></div>

</body>
  
	</html>