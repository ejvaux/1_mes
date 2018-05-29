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

    <script src="/1_mes/_includes/displaymodal.js"></script>
    <script src="/1_mes/_php/machine_maintenance/table_init_mm.js"></script>
    <!-- Header end -->
    
    <!-- Change Title --> <title>Machine Maintenance</title>

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
            <ul class="navbar-nav nav-tabs mr-auto mt-1" id="tb">           
              <li><a id="tb1" class="nav-link active tbl" href="#" onclick="">Machine PM</a></li>
              <li><a id="tb2" class="nav-link tbl" href="#" onclick="DisplayTableHA('machine_history_table','machine_historysp','Machine History')">Machine History</a></li>              
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

    <!-- Contents - START  =====================================               -->
    
    <div class="container-fluid mt-5 ml-0 pl-0" id="table_display" style="width: 100%;">
      <div class="row text-left">
        <div class="col-11" >
          
        </div>
      </div>
    </div>

    <!-- Contents - END ==============================================          -->

    <div class="mdl" style=" z-index: 5000"><!-- Place at bottom of page --></div>

    <!-- Optional JavaScript -->

    <script>
      $body = $("body");
      
      $('.navbar-nav>li>a').on('click', function(){
          $('.navbar-collapse').collapse('hide');
      });     
      
      $(document).on({
          ajaxStart: function() { $body.addClass("loading");   },   
          ajaxStop: function() { $body.removeClass("loading"); }    
      }); 
    
      $(document).ready(function(){
        /* Add JS functions below */

        checkuserauth();

        $('[data-toggle="tooltip"]').tooltip();
        $body.removeClass("loading");                        
      });

      var header = document.getElementById("tb");
        var btns = header.getElementsByClassName("tbl");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }
    
    </script>
    
  </body>
  
</html>