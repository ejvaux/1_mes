<!doctype html>
<html lang="en">
   
  <head>
    <!-- Required meta tags -->
    
    <?php
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php"; 
        $auth = $_SESSION['auth'];
        $auth = stripslashes($auth);            
    ?>
    
    <!-- Change Title --> <title>My Account</title>

    <!-- Custom CSS - START -->
    <style>
        body{
            background-image: url('/1_MES/_images/symphony.png'); 
            background-repeat: repeat;
        }

        .tr {
            background: rgba(230, 230, 250, 0.35);
            border-radius: 3px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
            border: 7px solid #cecece;
            margin-top: 90px;
            width: 50%;
        }

        #con {         
                border-image-source: url('/1_MES/_icons/border-img.png');
                border-image-slice: 90 90 90 90; 
                border-image-width: 25px 25px 25px 25px;
                border-image-outset: 20px 20px 20px 20px; 
                border-image-repeat: stretch stretch;
        }

    </style>
    <!-- Custom CSS - END -->

  </head>

  <body>
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
    <!-- Navbar - END -->
   

    <!-- Contents - START  =====================================               -->
    
    <div class="container rounded tr text-center p-0" id="con">                    
                                         
    <form method="post" action="/1_mes/_query/change_password.php">
    <div class="form-group row mt-4">
        <div class="col"></div>
        <label for="currentpw" class="col-4 col-form-label text-left">Current Password</label> 
        <div class="col-4">
        <input id="currentpw" name="currentpw" type="password" required="required" class="form-control here">
        </div>
        <div class="col"></div>
    </div>
    <div class="form-group row">
        <div class="col"></div>
        <label for="newpw" class="col-4 col-form-label text-left">New Password</label> 
        <div class="col-4">
        <input id="newpw" name="newpw" type="password" required="required" class="form-control here">
        </div>
        <div class="col"></div>
    </div>
    <div class="form-group row">
        <div class="col"></div>
        <label for="rtnewpw" class="col-4 col-form-label text-left">Re-type New Password</label> 
        <div class="col-4">
        <input id="rtnewpw" name="rtnewpw" type="password" required="required" class="form-control here">
        </div>
        <div class="col"></div>
    </div> 
    <div class="form-group row">
        <div class="col"></div>
        <div class="col-4">
        <button name="submit" type="submit" class="btn btn-outline-secondary">Submit</button>
        </div>
    </form> 
        <div class="col-4">
        <button class="btn btn-outline-secondary" onclick="window.history.go(-1)">Back</button>
        </div>
        <div class="col"></div>
    </div>
      
                        
    </div> 

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
         /* Add JS functions below */

         $('[data-toggle="tooltip"]').tooltip();
         $body.removeClass("loading");                        
      });
    
    </script>
    
  </body>
  
</html>