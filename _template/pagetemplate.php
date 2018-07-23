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
    
    <!-- Change Title --> <title>Template</title>

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
              <li><a id="tb1" class="nav-link active tbl" href="#" onclick="">Tab 1</a></li>
              <li><a id="tb2" class="nav-link tbl" href="#" onclick="">Tab 2</a></li>
              <li><a id="tb3" class="nav-link tbl" href="#" onclick="">Tab 3</a></li>
              <li><a id="tb4" class="nav-link tbl" href="#" onclick="">Tab 4</a></li>
              <li><a id="tb5" class="nav-link tbl" href="#" onclick="">Tab 5</a></li>
              <li><a id="tb6" class="nav-link tbl" href="#" onclick="">Tab 6</a></li>
              <li><a id="tb7" class="nav-link tbl" href="#" onclick="">Tab 7</a></li>
              <li><a id="tb8" class="nav-link tbl" href="#" onclick="">Tab 8</a></li>
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
          <img src="/1_MES/_images/under_construction.jpg"></img>
          <h5>Page Template by Edmund Orario Mati Jr</h5>
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
          ajaxStart: function() { /* $body.addClass("loading"); */ $('.mdl').show();  },   
          ajaxStop: function() { /* $body.removeClass("loading"); */$('.mdl').fadeOut(700); }    
      }); 
    
      $(document).ready(function(){
         /* Add JS functions below */

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