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
            <li><a id="tb1" class="nav-link tbl" href="#INJECTION.php" onclick="">INJECTION</a></li>
              <li><a id="tb2" class="nav-link tbl" href="SMT.php" onclick="" >SMT</a></li>
              <li><a id="tb3" class="nav-link tbl" href="#DIP.php" onclick="">DIP</a></li>
              <li><a id="tb4" class="nav-link tbl" href="#DIP TEST.php" onclick="">DIP TEST</a></li>
              <li><a id="tb5" class="nav-link tbl" href="#FATP.php" onclick="">FATP</a></li>
                   <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);">
     QUALITY - WORST DEFECT ANALYSIS - SMT
     </a>
      <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown" >                  
         <div class="container dropdown-header text-left">
                    <div class="row">
                      <div class="col" >
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
 <form id="contactForm1" method="POST" action="worstdefectanalysisajax.php" style="margin-left: 4%;margin-right: 8%; position: fixed;
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



  <div class="input-group-append">
    <span class="input-group-text" style="margin-left: 0.2%; "> PROD.LINE </span>
    <select name="Linename" class="form-control" aria-describedby="basic-addon1" style="font-size: 13px; width: 100px;" required>
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
<option value="SMTL10">SMTL10</option>
<option value="SMTL11">SMTL11</option>
<option value="SMTL12">SMTL12</option>
<option value="SMTL13">SMTL13</option>

</select> 


<select id ="chartType" name="chartType" style="height:26px; width:80px; display:none;">
<option value="column"> Bar </option></select>  


    <span class="input-group-text" style="margin-left: 0.2%; "> PROCESS </span>
    <select name="process" class="form-control" aria-describedby="basic-addon1" style="font-size: 13px; width: 150px;" required>
<option value="OVERALL">OVERALL</option>
<option value="AOI">AOI</option>
<option value="FUNCTION TEST">FUNCTION TEST</option>
<option value="FVI">FVI</option>
<option value="FVI2">FVI2</option>
<option value="VI AFTER REFLOW">VI AFTER REFLOW</option>
<option value="VI BEFORE REFLOW">VI BEFORE REFLOW</option>
<option value="FVI2">FVI2</option>
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
    <span class="input-group-text" style="margin-left: 2%;">From</span>
  </div><input class="form-control" type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<div class="input-group-prepend">
    <span class="input-group-text">To</span>
  </div><input class="form-control" type="date" name="to" id="today2" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<button type="submit" name="daily"  class="btn btn-outline-secondary btn-ladda" data-style="expand-left"> 
    <img src="loading1.gif" alt="Loading..."  id="wait" class="wait" style="display: none;width: 155px " /> Show Result</button>


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
<label><b>WORST DEFECT ANALYSIS OF <i>SMT </i></b></label>

 
<div id="chart_div"  class="table table-sm"></div>

<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
















</div>
</div>



















<!-- FOR TABLE DIV -->
<div class="table table-lg table-responsive" >
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


<!--<div class="container-fluid">
<div class="white_bkg">
<div class="row">
<div class="col-md"></div> 
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h5>Line Scan Results</h5></div> 
<div class="card-body">
<form method="get" action="http://172.16.1.13:8000/1_smt/public/lr" class="form_to_submit">
<div class="row form-group">
<div class="col-md-5">
<div class="input-group">
<div class="input-group-prepend">
<div id="" class="input-group-text">Date :</div></div> 
<input type="date" id="date" name="date" value="2019-08-05" class="form-control"></div></div> 
<div class="col-md-4">
<div class="input-group">
<div class="input-group-prepend">
<div id="" class="input-group-text">Line :</div></div> 
<select name="line" id="line" class="form-control">
<option value="1" selected="selected">SMTL1</option>
<option value="2">SMTL2</option> <option value="3">SMTL3</option> 
<option value="6">SMTL6</option> <option value="17">SMTL12</option> 
<option value="18">SMTL13</option> <option value="19">DIPL1</option></select></div></div> 
<div class="col-md">
<button type="submit" id="date-btn" class="btn btn-outline-secondary form-control form_submit_button">GO</button></div></div></form> 
<div class="row"><div class="col-md text-center">
<div id="lr_div"><div class="card">
<div class="card-body"><div class="row">
<div class="col-md"><h5 class="text-center font-weight-bold">SMTL1</h5></div></div> 
<div class="row mb-1"><div class="table-responsive-lg w-100 text-nowrap">
<table id="" class="table">
<thead><tr class="text-center">
<th>SHIFT</th> <th>INPUT</th> 
<th>OUTPUT</th></tr></thead> 
<tbody class="text-center">
<tr>
<th>DAY</th> 
<td>1503</td> 
<td>1349</td></tr> 
<tr><th>NIGHT</th> 
<td>1672</td> 
<td>1587</td></tr> 
<tr><th>TOTALS</th> 
<td>3175</td> 
<td>2936</td></tr></tbody></table></div></div></div></div></div></div></div></div></div></div>
<div class="col-md"></div></div></div></div> -->





