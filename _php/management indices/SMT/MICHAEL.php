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
.wait1 {
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


.wait.hidden{
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}
.wait1.hidden{
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
 <form id="contactForm2" method="POST" action="DIPajax.php" style="margin-left: 60%;margin-right: 14%; position: fixed;
    display: flex;" >


<div class="input-group-prepend">
    <span class="input-group-text" style="margin-left: 2%;">DIP</span>
  </div><input class="form-control" type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required><div style="display: none;">
<div class="input-group-prepend">
    <span class="input-group-text">To:</span>
  </div><input class="form-control" type="date" name="to" id="today2" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required></div>
<button type="submit" name="daily"  class="btn btn-outline-secondary btn-ladda" data-style="expand-left"> 
    <img src="loading1.gif" alt="Loading..."  id="wait1" class="wait1" style="display: none;width: 116px; margin-left: 197px; " /> Show Result</button>


 

           </form>


 <form id="contactForm1" method="POST" action="SMTajax.php" style="margin-left: 14%;margin-right: 14%; position: fixed;
    display: flex;" >


<div class="input-group-prepend">
    <span class="input-group-text" style="margin-left: 2%;">SMT</span>
  </div><input class="form-control" type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required><div style="display: none;">
<div class="input-group-prepend">
    <span class="input-group-text">To:</span>
  </div><input class="form-control" type="date" name="to" id="today2" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required></div>
<button type="submit" name="daily"  class="btn btn-outline-secondary btn-ladda" data-style="expand-left"> 
    <img src="loading1.gif" alt="Loading..."  id="wait" class="wait" style="display: none;width: 116px; margin-left: 204px; " /> Show Result</button>


 

           </form>




</div>







      </div>
    </div>
<div align = "center" style="margin-top: 5%;" >
<label><b>PRODUCTION SUMMARY OF <i>SMT & DIP  </i></b></label>


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
   $("#show").prepend('<div>'+data+' <button class="remove_field btn btn-sm btn-outline-danger">CLEAR</button></div>');
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











<script type="text/javascript">
    var frm1 = $('#contactForm2');

    frm1.submit(function (e) {

        e.preventDefault();
$('.wait1').show();
        $.ajax({
            type: frm1.attr('method'),
            
            url: frm1.attr('action'),
            data: frm1.serialize(),
              
            success: function (data) {
               $('.wait1').hide();
                console.log('Submission was successful.');
                console.log(data);
   $("#show").prepend('<div>'+data+' <button class="remove_field btn btn-sm btn-outline-danger">Remove</button></div>');
                              //when user click on remove button "btn btn-outline-danger"
    $("#show").on("click",".remove_field", function(e){ 
        e.preventDefault();
 $(this).parent('div').remove(); //remove inout field

    })
            },
            error: function (data) {
                                      $('.wait1').hide();      
                console.log('An error occurred.');
                console.log(data);
                 $("#show").html(data);
            },
            
               
  });
        });
</script>


























 </div>