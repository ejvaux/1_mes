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


<div class="input-group-prepend">
    <span class="input-group-text" style="margin-left: 2%;">DATE</span>
  </div><input class="form-control" type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required><div style="display: none;">
<div class="input-group-prepend">
    <span class="input-group-text">To:</span>
  </div><input class="form-control" type="date" name="to" id="today2" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required></div>
<button type="submit" name="daily"  class="btn btn-outline-secondary btn-ladda" data-style="expand-left"> 
    <img src="loading1.gif" alt="Loading..."  id="wait" class="wait" style="display: none;width: 116px; margin-left: 210px; " /> Show Result</button>


 

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



<center><h4 style="color: transparent;"><i>Alexa♥</i></h4></center>
























 </div>