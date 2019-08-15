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
			
<form method="POST" onsubmit="setDate()">


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
<label>From: </label><input id ="from" type="date" name="from" value = " <?php $date1;?> " class="datepicker" style="height:25px; width:150px">
<label>To: </label><input id ="d2" type="date" name="to" value ="<?php echo date("Y-m-d");?>" class = "datepicker" style="height:25px; width:150px" >
<input type="submit" id ="daily" value="Search" name="daily" style="height:30px; width:50px " >
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


    </head>

<body>


<div align = "center">
<label size = "20px"><b>PRODUCTION SUMMARY OF <i>SMT </i></b></label>
</div>


<div id="content">
            <form action=""  id="info" method="POST">

 <!-- -----------------------content here--------------------------->              
            <?php include('smt2.php'); ?>

            </form>
</div>


 <!-- Optional JavaScript -->


 <div class="mdl" style=" z-index: 1">

<!-- Place at bottom of page --></div>

</body>
  
	</html>

    <script type="text/javascript">
  var postData = "submit";
  $('#daily').on('click',function(){
      $.ajax({
            type: "post",
            url: "smt2.php",
            data:  $("#info").serialize(),
            contentType: "application/x-www-form-urlencoded",
             success: function(response) { // on success..
            $('#content').html(response); // update the DIV
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        })
    });

    <?php
    if(isset($_POST['daily']))
    {
    $date = date('Y-m-d', strtotime($_POST['to']));
    $date1 = date('Y-m-d', strtotime($_POST['from']));
   //echo "Today is $date";
  }

  if(isset($_POST['Linename'])){


  }
?>

</script>