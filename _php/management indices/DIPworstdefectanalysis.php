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
th,td{
column-width: 200px;
font-size: 17px;

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








 <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     INJECTION
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
                        <a style="color: black" class="linkcollapse" href="ASSY.php" >ASSY</a>                     
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
              <li><a id="tb4" class="nav-link tbl" href="#DIP TEST.php" onclick="">DIP TEST</a></li>
<!-- <li><a id="tb5" class="nav-link tbl" href="FATP.php" onclick="">FATP</a></li>-->
                   <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);">
     QUALITY - WORST DEFECT ANALYSIS - DIP
     </a>
      <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown" >                  
         <div class="container dropdown-header text-left">
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



<div class="container">

    


  <div class="container-fluid mt-5 ml-0 pl-0" id="table_display" style="width: 100%;" >

      <div class="row text-left" >
 <form id="contactForm1" method="POST" action="DIPworstdefectanalysisajax.php" style="margin-left: 4%;margin-right: 8%; position: fixed;
    display: flex;" >

<!--<div class="input-group-append">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">REPAIR STATUS OF</label>
  </div>
  <select class="custom-select" name="statusOf" id="inputGroupSelect01">
        <option value="SMT" hidden="" >SMT</option>
    <option value="SMT">SMT</option>
    <option value="DIP">DIP</option>

  </select>
</div>
-->


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" > PROD.LINE </span></div>
    <select name="Linename" class="form-control" aria-describedby="basic-addon1" style="font-size: 13px; width: 100px;" required>
<option value="OVERALL">OVERALL</option>
<option value="DIPL1">DIPL1</option>
<option value="DIPL2">DIPL2</option>
<option value="DIPL3">DIPL3</option>


</select> 

  <div class="input-group-prepend">
<select id ="chartType" name="chartType" style="height:26px; width:80px; display:none;">
<option value="column"> Bar </option></select>  


    <span class="input-group-text"> PROCESS </span></div>
    <select name="process" class="form-control" aria-describedby="basic-addon1" style="font-size: 13px; width: 140px;" required>
<option value="OVERALL">OVERALL</option>
<!--<option value="AOI">AOI</option> -->
<option value="FUNCTION TEST">FUNCTION TEST</option>
<option value="FVI">FVI</option>
<option value="FVI2">FVI2</option>
<!--<option value="VI AFTER REFLOW">VI AFTER REFLOW</option>
<option value="VI BEFORE REFLOW">VI BEFORE REFLOW</option>
-->
 <!-- 
5=AOI
6=FUNCTION TEST
7=FVI
9=VI AFTER REFLOW
10=VI BEFORE REFLOW
11=X RAY
66=FVI2

 -->
<?php 
//$servername = "172.16.1.13";
//$username = "root1";
//$password = "0000";
//$dbname1 = "masterdatabase";
//$conn1 = new mysqli($servername, $username, $password, $dbname1);
//if($stmt = $conn1->query("SELECT name, id FROM  smt_processes WHERE division_id='2'" )){
//while ($row = $stmt->fetch_row()){
//    echo "<option value='";
//    echo "".$row[1]."'>";
//    echo "".$row[0]."</option>";
//     }}

?>
</select> 
<div class="input-group-prepend">
    <span class="input-group-text" >FROM</span>
  </div><input class="form-control" type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<div class="input-group-prepend">
    <span class="input-group-text">TO</span>
  </div><input class="form-control" type="date" name="to" id="today2" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<button type="submit" name="daily"  class="btn btn-outline-secondary btn-ladda" data-style="expand-left"> 
    <img src="loading1.gif" alt="Loading..."  id="wait" class="wait" style="display: none;margin-left: 62vw; width: 113px; margin-top: -0.3vw; " /> Show Result</button>


<!--<div class="input-group-prepend">
    <span class="input-group-text" style="margin-left: 2%;">From:</span>
  </div><input type="month" name="monthfrom" style=" width:150px" >
<div class="input-group-prepend">
    <span class="input-group-text">To:</span>
  </div><input type="month" name="monthto" style=" width:150px" >
<input class="btn btn-outline-primary" type="submit" value="MONTHLY" name="monthly" width="15px" style=" width:100px">-->
 </form>

</div>
<div class="container-fluid mt-5 ml-0 pl-0" id="table_display" style="width: 100%;" >  
<div align = "center" >
<label><b>WORST DEFECT ANALYSIS OF <i>DIP </i></b></label>

 
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
    ['DATE', 'DEFECT QTY', 'ACCUMULATIVE RATE %'],
    ['Sample',  0,      0],
    ['Sample',  0,      0],
    ['Sample',  0,       0],
    ['Sample',  0,      0]
  ]);

  var options = {
    hAxis: [{ 0: {format: '#,###'}, 1: {format: '#%'}  }],

      title: 'TOP 3 WORST DEFECT - DIP', titleTextStyle: {color: 'red'},

    seriesType:'bars',
                       series: {
    0:{color:'#1e90ff',targetAxisIndex: 0,},
    1:{type: 'line',targetAxisIndex: 1,}},

 };

var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}
$(window).resize(function(){
  drawChart1();
  drawChart2();
});
</script>













</div>
</div>



















<!-- FOR TABLE DIV -->
<div class="table table-lg" >
<div id="show" class="table table-lg"></div>
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
                          $("#show").html(data);
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







