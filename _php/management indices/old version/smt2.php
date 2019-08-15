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

   
    
<script>


$(document).ready(function(){
  $("#caldaily").show();
  $("#calmonthly").hide();  });
  
  $(document).ready(function(){
  $("#daily").click(function(){
   // $("#calendar_tab").show();
    $("#calmonthly").hide();
    $("#caldaily").show();
  });

  $("#monthly").click(function(){
  // $("#calendar_tab").show();
    $("#caldaily").hide();
    $("#calmonthly").show();
  });
});

</script>
<!-- ------------------------selections query----------------------- -->

<div class="container-fluid mt-5 ml-0 pl-0" id="table_display" style="width: 100%;" >
      <div class="row text-left">
        <div class="col-11" >
      
<form method="POST" >


<table id="calendar" > <tr>
<th>&nbsp;
<input type="radio" id="daily" name="day" value="daily">Daily &nbsp; &nbsp;
<input type="radio" id="monthly" name="day" value="monthly">Monthly &nbsp; &nbsp;&nbsp; &nbsp;
 </th> 

 <td>
<label> SHIFT: </label>
<select name= "shift">
<option value="all"> ALL </option>
<option value="6ap"> 1 </option>
<option value="6pa"> 2 </option>
</select>&nbsp; &nbsp;&nbsp; &nbsp;
</td>
<td>
<label for='Linename'>LINE: </label>
<select id ="mySelect" name="Linename" onchange="myFunction()">
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
</td>

<td id="caldaily">&nbsp; &nbsp;&nbsp; &nbsp;
<label>From: </label><input id ="d1" type="date" name="from" value = "" class="datepicker" style="height:25px; width:150px">
<label>To: </label><input id ="d2" type="date" name="to" value ="" class = "datepicker" style="height:25px; width:150px" >
<input type="submit" id ="d" value="Search" name="daily" style="height:30px; width:50px " >
</td>

<td id="calmonthly">
<label>From: </label><input type="month" name="monthfrom" value="yyyy-mm"  style="height:25px; width:180px" >
<label >To: </label><input type="month" name="monthto" value="yyyy-mm" style="height:25px; width:180px" >
<input type="submit" value="Search" name="monthly" style="height:30px; width:50px">
</td>

</tr> </table>


</div>
<!--
<select id="chartType" name="chartType" style="height:30px; width:80px">
<option value="column">Column</option>
<option value="pie">Pie </option>
</select> -->

</form>
      </div>
    </div>
    <br>


<div align = "center">
<label size = "20px"><b>PRODUCTION SUMMARY OF <i>SMT </i></b></label>
</div>
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
	
//=================================chart and table on another page======================

</script>


</div>


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
    
    include "smtphp/smtl1.php";}
    
      
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
    
    include "smtphp/smtl2.php";}
      
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
    
    
      include "smtphp/smtl3.php";}
    
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
    
    include "smtphp/smtl4.php";
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
    
    include "smtphp/smtl5.php";
    
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
    

    include "smtphp/smtl6.php";
    
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
    
    
      include "smtphp/smtl7.php";
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
    
    include "smtphp/smtl8.php";
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
    
    include "smtphp/smtl9.php";
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
    
    
      include "smtphp/smtl10.php";
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
    
    
      include "smtphp/smtl11.php";
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
    
    
      include "smtphp/smtl12.php";
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
    
    
      include "smtphp/smtl13.php";

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
    
    
     include "smtphp/smtl14.php";
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
    
    
      include "smtmpm/smtl1.php";
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
    
    include "smtmpm/smtl2.php";
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
    
    
    include "smtmpm/smtl3.php";
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
    
    
    include "smtmpm/smtl4.php";
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
    
    
     include "smtmpm/smtl5.php";
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
    
    
include "smtmpm/smtl6.php";
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
    
    include "smtmpm/smtl7.php";

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
    
    
  include 'smtmpm/smtl8.php';
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
    
    
     include 'smtmpm/smtl9.php';
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
    
    
     include 'smtmpm/smtl10.php';
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
    
    
     include 'smtmpm/smtl11.php';

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
    
    
     include 'smtmpm/smtl12.php';
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
    
    
      include 'smtmpm/smtl13.php';

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
    
    
     include 'smtmpm/smtl14.php';
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
    
     include 'smtall/smt1.php';

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
    
      include 'smtall/smtl2.php';
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
        
include 'smtall/smtl3.php';
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
    
    include 'smtall/smtl4.php';
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
        
          include 'smtall/smtl5.php';

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
    
   include "smtall/smtl6.php";
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
        
         include 'smtall/smtl7.php';
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
        
        include 'smtall/smtl8.php';

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
    
include 'smtall/smtl9.php';
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
    
  include 'smtall/smtl10.php';
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
    
   include 'smtall/smtl11.php';
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
        
   include 'smtall/smtl12.php';
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
    
    include 'smtall/smtl13.php';
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
      
    include 'smtall/smtl14.php';
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
// smt line 1 daily shift 6Ap---------------------------------------------------------
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

//echo $from."/".$to."/";
include 'smtdam/smtl1.php';

}
             break;
//if daily

case "l2":
// smt line 2 daily shift 6Ap---------------------------------------------------------
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


 include 'smtdam/smtl2.php';}
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


include 'smtdam/smtl3.php';}

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


 include 'smtdam/smtl4.php';}
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


  include 'smtdam/smtl5.php';


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

  include 'smtdam/smtl6.php';


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


 include 'smtdam/smtl7.php';}
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

include 'smtdam/smtl8.php';}
  
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

include 'smtdam/smtl9.php';}
  
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


include 'smtdam/smtl10.php';}
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


  include 'smtdam/smtl11.php';
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


  include 'smtdam/smtl12.php';}

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


 include 'smtdam/smtl13.php';}
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


  include 'smtdam/smtl14.php';}
break;


  } //case line
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


 include 'smtdpm/smtl1.php';}
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


  include 'smtdpm/smtl2.php';}
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


  include 'smtdpm/smtl3.php';}
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


 include 'smtdpm/smtl4.php';}
break;

case "l5": //========================================================================================

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


 include 'smtdpm/smtl5.php';}
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


 include 'smtdpm/smtl6.php';}
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


 
include 'smtdpm/smtl7.php';}

break;

case "l8":

// smt line 8 daily shift 6pA---------------------------------------------------------
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


 include 'smtdpm/smtl8.php';}
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


  include 'smtdpm/smtl9.php';}
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

include 'smtdpm/smtl10.php';}
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


 include 'smtdpm/smtl11.php';}
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


  include 'smtdpm/smtl12.php';}

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


  include 'smstdpm/smtl13.php';}
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


  include 'smtdpm/smtl14.php';}

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

  include 'smtdall/smtl1.php';}
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

  include 'smtdall/smtl2.php';}
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

include 'smtdall/smtl3.php';}
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

  include 'smtdall/smtl4.php';}
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

    include 'smtdall/smtl5.php';}
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

  include 'smtdall/smtl6.php';}
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

    include 'smtdall/smtl7.php';}

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

     include 'smtdall/smtl8.php';}
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

  include 'smtdall/smtl9.php';}
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

include 'smtdall/smtl10.php';}
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
include 'smtdall/smtl11.php';
/*
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
}*/


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

include 'smtdall/smtl12.php';
/*
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
}*/


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

include 'smtdall/smtl13.php';
/*
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
} */


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
     // echo $from."/".$to."/";
include 'smtdall/smtl14.php';
/*
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
} */


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