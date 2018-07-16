<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <!-- Header start -->
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php"; 
                 
    ?>  
  <script src="/1_mes/_includes/displaymodal.js"></script>
    <script src="/1_mes/_php/mold_maintenance/table_init.js"></script>
    

    <!-- Header end -->

    <!-- Change Title --> <title>Mold Maintenance</title>

    <!-- Custom CSS - START -->
    <style>
      
    </style>
    <!-- Custom CSS - END -->

    <script>
      $(document).ready(function(){           
                                
      });        
    
    </script>              
    

  </head>

  <body>
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
    <!-- Navbar - END -->

    <!-- Page specific Navbar START-->

      <div style="position: absolute;margin-top: -14px;" id="innernavbar">
        <nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
          <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->MENU
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav nav-tabs mr-auto mt-1" id="tb">           
              
              <li><a id="tb1" class="nav-link tbl active" href="#" onclick="">Mold  Repair</a></li>
              <li><a id="tb2" class="nav-link tbl" href="#" onclick="">Mold  History</a></li>
              <li><a id="tb3" class="nav-link tbl" href="#" onclick="">Mold  Fabrication</a></li>
              <li><a id="tb4" class="nav-link tbl" href="#" onclick="">Operator List</a></li>
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
      <div class="row">
        <div class="col" id="#example-table">
        </div>
      </div>
    </div>

    <div id="mod"></div>

    <!-- Contents - END ==============================================          -->

    <div class="mdl"><!-- Place at bottom of page --></div>

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
        
        if(val=="DC" || val=="A" || val=="DA"){
          $('#tb3').show();
          $('#tb4').show();
        }
        else{
          $('#tb3').hide();
          $('#tb4').hide();
        }        
        var dtdt =moment(Date()).format('YYYY-MM-DD');
        checkuserauth(dtdt,dtdt); 

         /* Add JS functions below */
         
         loadmodal('moldrepairmodal');
         $('[data-toggle="tooltip"]').tooltip();
         $body.removeClass("loading");
                          
      });
      // Add active class to the current button (highlight it)
      var header = document.getElementById("tb");
        var btns = header.getElementsByClassName("tbl");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }
           
        $('#tb1').click(function(){
          var dtdt =moment(Date()).format('YYYY-MM-DD');
          checkuserauth(dtdt,dtdt);
        });
        
        $('#tb2').click(function(){
          var dtdt =moment(Date()).format('YYYY-MM-DD');
          var dtdt2 = dtdt +" 23:59:59";
          checkuserauthH(dtdt,dtdt2);
        });

        $('#tb3').click(function(){
          var dtdt =moment(Date()).format('YYYY-MM-DD');
          var dtdt2 = dtdt +" 23:59:59";
          checkuserauthF(dtdt,dtdt2);
        });

        $('#tb4').click(function(){
          checkuserauthO();
        });    
                
    </script>
    <script src="/1_mes/_php/mold_maintenance/functions.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    
  </body>
  
</html>