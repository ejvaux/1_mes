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
<div class="loader">
    <img src="loading1.gif" alt="Loading..." height="350" style="width: 800px" /></div>
    <style type="text/css">
      .loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader > img {
    width: 100px;
}

.loader.hidden {
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }
}
    </style>
    <script type="text/javascript">
      window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
    </script>
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";

                    
        ?>

    <!-- Navbar - END -->

    <!-- Page specific Navbar START-->

      <div class="mod_menu" style="position: absolute;padding-left: -15px;padding-top: -22px; margin-top: -14px;" >

 
<nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; ">
 <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <!-- <span class="navbar-toggler-icon"></span> -->MENU
 </button>
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav nav-tabs mr-auto mt-1">           
            <li><a id="tb1" class="nav-link tbl" href="#INJECTION.php" onclick="">INJECTION</a></li>
              <li><a id="tb2" class="nav-link tbl" href="SMT.php" onclick="" style="color: white; background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);">SMT</a></li>
              <li><a id="tb3" class="nav-link tbl" href="#DIP.php" onclick="">DIP</a></li>
              <li><a id="tb4" class="nav-link tbl" href="#DIP TEST.php" onclick="">DIP TEST</a></li>
              <li><a id="tb5" class="nav-link tbl" href="#FATP.php" onclick="">FATP</a></li>
                   <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     QUALITY
     </a>
      <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">                  
         <div class="container dropdown-header text-left">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse" href="#" ></a>                      
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="QUALITY.php" >REPAIR STATUS - SMT</a>                     
                        </h6>
                      </div>                      
                    </div>
                            <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="#" >WORST DEFECT ANALYSIS - SMT</a>                     
                        </h6>
                      </div>                      
                    </div>

         </div>
      </div>
      </li>
              <li><a id="tb7" class="nav-link tbl" href="#SALES.php" onclick="">SALES</a></li>
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
 <form method="POST" style="margin-left: 14%;margin-right: 14%; display: inline-flex;" >

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" style="width: 60px;">SHIFT</span>
  </div>
   <select name= "shift" class="form-control" aria-describedby="basic-addon1"   style="font-size: 12px; width: 70px;">
<option style="display:none;" value="<?php if(isset($_POST['shift'])){echo $_POST['shift'];} ?>"><?php if(isset($_POST['shift'])){echo $_POST['shift'];}?> </option>
        <option value="ALL">ALL </option>
      <option value="1"> 1 </option>
  <option value="2"> 2 </option>


  </select>
  <div class="input-group-append">
    <span class="input-group-text" style="margin-left: 0.2%; "> PROD.LINE</span>
    <select name="Linename" class="form-control" aria-describedby="basic-addon1" style="font-size: 12px; width: 100px;" selected='overall'>
<option style="display:none;" value="<?php if(isset($_POST['Linename'])){echo $_POST['Linename'];} ?>"><?php if(isset($_POST['Linename'])){echo $_POST['Linename'];}?> </option>
<option value="OVERALL">OVERALL</option>
<option value="SMTL1">SMTL1</option>
<option value="SMTL2">SMTL2</option>
<option value="SMTL3">SMTL3</option>
<option value="SMTL4">SMTL4</option>
<option value="SMTL5">SMTL5</option>
<option value="SMTL6">SMTL6</option>
<option value="SMTL7">SMTL7</option>
<option value="SMTL8">SMTL8</option>
<option value="SMTL9">SMTL9</option>
<option value="SMTL0">SMTL10</option>
<option value="SMTL11">SMTL11</option>
<option value="SMTL12">SMTL12</option>
<option value="SMTL13">SMTL13</option>

</select> 
<select id ="chartType" name="chartType" style="height:26px; width:80px; display:none;">
<option value="column"> Bar </option></select>  
<div class="input-group-prepend">
    <span class="input-group-text" style="margin-left: 2%;">From:</span>
  </div><input class="form-control" type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php if(isset($_POST['from'])){echo $_POST['from'];} ?>">
<div class="input-group-prepend">
    <span class="input-group-text">To:</span>
  </div><input class="form-control" type="date" name="to" id="today2" style="font-size: 14px; width:150px" value="<?php if(isset($_POST['to'])){echo $_POST['to'];} ?>" >
 <input class="btn btn-outline-primary" type="submit" value="DAILY" name="daily" width="15px" 
 style=" width:100px; ">




<!--<div class="input-group-prepend">
    <span class="input-group-text" style="margin-left: 2%;">From:</span>
  </div><input type="month" name="monthfrom" style=" width:150px" >
<div class="input-group-prepend">
    <span class="input-group-text">To:</span>
  </div><input type="month" name="monthto" style=" width:150px" >
<input class="btn btn-outline-primary" type="submit" value="MONTHLY" name="monthly" width="15px" style=" width:100px">-->
           </form>


<!--


 <div class="col-11" >
            

    <form method="POST" >


<div class="modal" id="mymodal" style="width:1000px; ">
   <div class="modal-dialog" >
  <div class="modal-content" style="width:1000px; ">
  <div class="modal-header">
    <h2 class="modal-title">DAILY SUMMARY MODE</h2>
  </div>
  <div class="modal-body" style="margin-left:10%;margin-right:10%; ">

       

      
      
 <label> SHIFT: </label>
  <select name= "shift">
  <option value="all"> ALL </option>
  <option value="6ap"> Day </option>
  <option value="6pa"> Night </option>
  </select>

  <label>PROD. LINE:</label>
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
    <select id ="chartType" name="chartType" style="height:26px; width:80px; display:none;">
<option value="column"> Bar </option></select>
<br>
<style type="text/css">
input[type=date],input[type=month],input[type=submit], select {
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
text-decoration: none; color: black;border-style: groove; border-radius: 5px;
}

input[type=submit]:hover{ border-style: double;color: white; background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%); font-size: 16.5px;  }

</style>


        <label>From: </label><input type="date" name="from" id="today" style="height:25px; width:150px">
        <label>To: </label><input type="date" name="to" id="today2" style="height:25px; width:150px" >
        <input type="submit" value="DAILY" name="daily" class="btn btn-primary" style=" width:100px" > 
         <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>








</div></div></div></div>
</form>
    <form method="POST" >
<div class="modal" id="mymodal1" style="width:1000px; ">
   <div class="modal-dialog" >
  <div class="modal-content" style="width:1000px; ">
  <div class="modal-header">
    <h2 class="modal-title">MONTHLY SUMMARY MODE</h2>
  </div>
  <div class="modal-body" style="margin-left:10%; margin-right:10%;  ">

      
 <label> SHIFT: </label>
  <select name= "shift">
  <option value="all"> ALL </option>
  <option value="6ap"> Day </option>
  <option value="6pa"> Night </option>
  </select>

  <label>SMT PROD. LINE:</label>
    <select name="Linename">
<option value="overall" >OVERALL</option>
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
   
    <select id ="chartType" name="chartType" style="height:26px; width:80px; display:none;">
<option value="column"> Bar </option></select>
  <br>
    <label>From: </label><input type="month" name="monthfrom" style="height:25px; width:180px" >
        <label >To: </label><input type="month" name="monthto" style="height:25px; width:180px" >
        <input class="btn btn-primary" type="submit" value="MONTHLY" name="monthly" width="15px" style=" width:100px">
                <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>








</div>
</div>
</div>
</div>

    </form>
</div>
<style type="text/css">
  #daily{text-decoration: none; color: black;border-style: ridge; border-color: darkgray; border-radius: 5px; margin-left: 10px;  font-size: 16.5px;  }
  #daily:hover{border-style: double;color: white; background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%); font-size: 16.5px;}
</style>
  <div class="input-group-prepend">
    <span class="input-group-text">Summarize Mode :</span>
  </div><a id="daily" href="#" data-toggle="modal" data-target="#mymodal" class="btn btn-primary"> <strong> Daily </strong> </a><a href="#" data-toggle="modal" data-target="#mymodal1" id="daily" class="btn btn-primary"><strong> Monthly</strong>  </a></div> -->






</div>
   
      </div>
    </div>
<div align = "center" >
<label><b>PRODUCTION SUMMARY OF <i>SMT </i></b></label>


</div>
<!-- FOR GRAPH DIV -->

<?php

function getColumn(){
  ?>
 
<div id="chart_div"  class="table table-sm"></div>


<a href=https://www.plus2net.com/php_tutorial/chart-column-database.php></a>

<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" >

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
    
      function drawChart() {   

        // Create the data table.
        var data = new google.visualization.DataTable();
      
        data.addColumn('string', '');
        data.addColumn('number', 'PLAN');
        data.addColumn('number', 'RESULT');

        for(i = 0; i < PLAN.length; i++)

    data.addRow([PLAN[i][0], parseInt(PLAN[i][1]), parseInt(RESULT[i]) ]);
  data.addRows(4);
       var options = {
         legend: {position: 'none'},
          title: 'Production Summary',
          vAxis: {minValue: 0, maxValue: 9},
           isStacked: true,
        hAxis: {
              title: '',
              format: 'h:mm a',
              viewWindow: {
                min: [0, 10, 0],
                max: [10, 10, 0]
              }},
        };


           
            
        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);

       }
  
//=================================chart and table on another page======================

</script> <?php }?>











<!-- FOR TABLE DIV -->
<div class="table table-lg table-responsive" >



<?php
if (isset($_POST['daily'])){
      include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      $line=$_POST['Linename'];
      $shift=$_POST['shift'];
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();// create PHP array
      $date_array=Array();
      $defect_array=array();

if($line==='OVERALL' && $shift==='ALL')
{
include("smtphpfinal/smtoverall.php");
}
if($line==='OVERALL' && $shift==='1')
{
include("smtphpfinal/smtoverallday.php");
}

if($line==='OVERALL' && $shift==='2')
{
include("smtphpfinal/smtoverallnight.php");
}



include ("smtphpfinal/smtline/condition.php");


//include "smtphp/date.php";       // INPUT DATE_=== OUTPUT [DATE] | [YYYY-MM-DD] | [TOTAL]
#include "smtphp/prodplan.php";   // OUTPUT [PRODPLAN] | PLAN int
#include "smtphp/prodresult.php"; // OUTPUT [PRODRESULT] | RESULT int
#include "smtphp/gap.php";        // OUTPUT [GAP] | GapRESULTtoPLAN int
#include "smtphp/rate.php";       // OUTPUT [RATE] | rate %%
#include "smtphp/def.php";        // OUTPUT [DEFECT] | smt_defect int
#include('smtphp/input.php');      // OUTPUT [INPUT] | prod_input int
#include('smtphp/yield.php');      // OUTPUT [YIELD] | prod_result/prod_input %%

}






?>

<script type="text/javascript">
function printpage()
  {
  window.print()
  }
</script>






























 </div>