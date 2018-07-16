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
    
    <!-- Change Title --> <title>Admin | MES - Primatech</title>

    <!-- Custom CSS - START -->
    <style>
        html,body {
            height: 98%;
        }        
    </style>
    <!-- Custom CSS - END -->
    <script src="/1_mes/_includes/displaymodal.js"></script>
    <script src="../mis_admin/admintables.js"></script>
    <script src="../mis_admin/adminFunctions.js"></script>
  </head>

  <body>
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
    <!-- Navbar - END -->    

    <!-- Contents - START  =====================================               -->
    
    <div class="container mt-2 " style='height:100vh'>
      <div class="row" style='height:80vh'>
        <div class="col-md-2 border">            
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="DisplayTable_brep('bugreport_table','bugreportsp','Bug Reports')">Bug Reports</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="#" id="anncmnt">Announcement</a>
                </li>                           
            </ul>                
        </div>
        <div class="col-md-10">            
            <div class='row '>
                <div class='col' id="table_display"></div>
            </div>            
        </div>
      </div>
    </div>

    <!-- Contents - END ==============================================          -->
    <div id="mod"></div>
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
         /* Add JS functions below */
         
         loadmodal('adminmodal');

        var dtdt =moment(Date()).format('YYYY-MM-DD');
        var dtdt2 = dtdt +" 23:59:59";
        DisplayTable_brep('bugreport_table','bugreportsp','Bug Reports',dtdt,dtdt2);

         $('[data-toggle="tooltip"]').tooltip();
         $body.removeClass("loading");                        
      });      
    
    </script>
    
  </body>
  
</html>