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
    
    <script type="text/javascript">
      window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
    </script>



     <style type="text/css">
      .wait {
        margin-top: -4%; margin-left: -16%;
    position: absolute;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 180%;
    background: transparent;
    display: flex;
    justify-content: center;
    align-items: center;
}



.wait.hidden {
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}
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
 <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%); ">
     ASSY
     </a>
      <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">                  
         <div class="container dropdown-header text-left" >
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
                        <a style="color: black" class="linkcollapse" href="INJECTION.php" >INJECTION</a>                     
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="PRINTING.php" >PRINTING</a>                     
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="SAMPLES.php" >SAMPLES</a>                     
                        </h6>
                      </div>                      
                    </div>
                    
         </div>
      </div>
      </li>





















              <li><a id="tb2" class="nav-link tbl" href="SMT.php" onclick="" >SMT</a></li>
              <li><a id="tb3" class="nav-link tbl" href="DIP.php" onclick="">DIP</a></li>
              <li><a id="tb4" class="nav-link tbl" href="USAGE.php" onclick="">USAGE MONITORING</a></li>
             <!-- <li><a id="tb5" class="nav-link tbl" href="FATP.php" onclick="">FATP</a></li>-->
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
                        <a style="color: black" class="linkcollapse" href="REPAIR_STATUS_DIP.php" >REPAIR STATUS - DIP</a>                     
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="worstdefectanalysis.php" >WORST DEFECT ANALYSIS - SMT</a>                     
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="DIPworstdefectanalysis.php" >WORST DEFECT ANALYSIS - DIP</a>                     
                        </h6>
                      </div>                      
                    </div>
         </div>
      </div>
      </li>
 <li><a id="tb7" class="nav-link tbl" href="machine_material.php" onclick="" >MATERIAL SCAN</a></li>
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
 <form id="contactForm1" method="POST" action="ASSYajax.php" style="margin-left: 13%;margin-right: 13%; position: fixed;
    display: flex;" >

 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" >MACHINE LINE</span>
  </div>
    <select name="MACHINE_CODE" id="MACHINE_CODE" class="form-control" aria-describedby="basic-addon1" style="font-size: 12px; width: 100px;"  required>

<option value="OVERALL">OVERALL</option>
<option value="S1">S1</option>
<option value="S2">S2</option>
<option value="S3">S3</option>


</select> 
<select id ="chartType" name="chartType" style="height:26px; width:80px; display:none;">
<option value="column"> Bar </option></select>  
<div class="input-group-prepend">
    <span class="input-group-text">FROM</span>
  </div><input class="form-control" type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<div class="input-group-prepend">
    <span class="input-group-text">TO</span>
  </div><input class="form-control" type="date" name="to" id="today2" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<button type="submit" name="daily"  class="btn btn-outline-secondary btn-ladda" data-style="expand-left"> 
    <img src="loading1.gif" alt="Loading..."  id="wait" class="wait" style="display: none;width: 125px;margin-left: 84%;margin-top: -4px;" /> Show Result</button>


 

           </form>






</div></div>
   
      </div>
    </div>
<div align = "center" style="margin-top: 5%;" >
<label><b>PRODUCTION SUMMARY OF <i>ASSY </i></b></label>


</div>
<!-- FOR GRAPH DIV -->
<div id="chart_div"  class="table table-sm">
  
     <div id="chart_div1" class="chart"></div>
</div>

<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style type="text/css">
    .chart {
  width: 100%; 
  min-height: 300px;
}
.row {
  margin:0 !important;
}
  </style>
<script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart1);
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
    ['DATE', 'PLAN', 'RESULT'],
    ['Sample',  0,      0],
    ['Sample',  0,      0],
    ['Sample',  0,       0],
    ['Sample',  0,      0]
  ]);

  var options = {
    title: 'PLAN VS RESULT - ASSY',
    hAxis: {title: 'DATA PLAN AND RESULT WILL DISPLAYED HERE', titleTextStyle: {color: 'red'}}
 };

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}
$(window).resize(function(){
  drawChart1();
  drawChart2();
});
</script>











<!-- FOR TABLE DIV -->
<div class="table table-lg table-responsive " >
  <div class="container">
<div id="show" class="table table-lg"></div>
</div>
<script type="text/javascript">






    var frm = $('#contactForm1');

    frm.submit(function (e) {

        e.preventDefault();
$('.wait').show();
        $.ajax({
            type: frm.attr('method'),
            
            url: frm.attr('action'),
            data: frm.serialize(),
              
            success: function (data) {
               $('.wait').hide();
                console.log('Submission was successful.');
                console.log(data);
                          $("#show").prepend('<div>'+data+'<button class="remove_field btn btn-sm btn-outline-danger">CLEAR</button></div>');
                              //when user click on remove button "btn btn-outline-danger"
    $("#show").on("click",".remove_field", function(e){ 
        e.preventDefault();
 $(this).parent('div').remove(); //remove inout field

    })
            },
            error: function (data) {
                                      $('.wait').hide();      
                console.log('An error occurred.');
                console.log(data);
                 $("#show").html(data);
            },
            
               
  });
        });


















</script>


 </div>
 <?php include ('footer.php'); ?>