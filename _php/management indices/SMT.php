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








      
              <li><a id="tb2" class="nav-link tbl" href="SMT.php" onclick="" style="color: white; background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);">SMT</a></li>
              <li><a id="tb3" class="nav-link tbl" href="DIP.php" onclick="">DIP</a></li>
              <li><a id="tb4" class="nav-link tbl" href="#DIP TEST.php" onclick="">DIP TEST</a></li>
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
 <form id="contactForm1" method="POST" action="SMTajax.php" style="margin-left: 14%;margin-right: 14%; position: fixed;
    display: flex;" >

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" style="width: 60px;">SHIFT</span>
  </div>
   <select name= "shift" class="form-control" aria-describedby="basic-addon1"   style="font-size: 12px; width: 70px;" required>
        <option value="ALL">ALL </option>
      <option value="1"> 1 </option>
  <option value="2"> 2 </option>


  </select>

  <div class="input-group-append" style="">
    <span class="input-group-text" style="margin-left: 0.2%; "> PROD.LINE</span>  </div>
    <select name="Linename" class="form-control" aria-describedby="basic-addon1" style="font-size: 12px; width: 100px;" selected='overall' required>
<option value="OVERALL">OVERALL</option>
<option value="SMTL1">SMTL1</option>
<option value="SMTL2">SMTL2</option>
<option value="SMTL3">SMTL3</option>
<option value="SMTL6">SMTL6</option>
<option value="SMTL12">SMTL12</option>
<option value="SMTL13">SMTL13</option>

</select> 
 
<div class="input-group-prepend">
  <select id ="chartType" name="chartType" style="height:26px; width:80px; display:none;">
<option value="column"> Bar </option></select> 
    <span class="input-group-text">FROM</span>
  </div><input class="form-control" type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<div class="input-group-prepend">
    <span class="input-group-text">TO</span>
  </div><input class="form-control" type="date" name="to" id="today2" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<button type="submit" name="daily"  class="btn btn-outline-secondary btn-ladda" data-style="expand-left"> 
    <img src="loading1.gif" alt="Loading..."  id="wait" class="wait" style="margin-left: 730px;margin-top:-3px;  display: none;width: 155px " /> Show Result</button>


 

           </form>






</div>
   
      </div>
    </div>
<div align = "center" style="margin-top: 5%;" >
<label><b>PRODUCTION SUMMARY OF <i>SMT  </i></b></label>


</div>
<!-- FOR GRAPH DIV -->
<div id="chart_div"  class="table table-sm"></div>

<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>












<!-- FOR TABLE DIV -->
<div class="table table-lg table-responsive " >
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

