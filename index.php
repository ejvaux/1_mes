<!DOCTYPE html>

<html>
    
    <head>

      <!--  Session Check -->
        
       <?php
        
        session_start();
                
        if(!isset($_SESSION['username'])) {
          $log = "false";
        }
        
        else{                
          $log = "true";
            }
                                
      ?>
           
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/1_MES/favicon.ico"/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/1_mes/node_modules/bootstrap/dist/css/bootstrap.min.css">
        
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="/1_mes/node_modules/fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.min.css">

        <!-- Animate.css -->
        <link rel="stylesheet" type="text/css" href="/1_mes/node_modules/animate.css/animate.min.css">

        <!-- Hover.css -->
        <link rel="stylesheet" type="text/css" href="/1_mes/node_modules/hover.css/css/hover-min.css">
        
        <link rel="stylesheet" href="/1_mes/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/1_mes/_css/page.css">
        
        <script src="/1_mes/node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="/1_mes/node_modules/jquery/dist/jquery.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="/1_mes/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>         

        <!-- Popper JS -->
        <script src="/1_mes/node_modules/popper.js/dist/umd/popper.min.js" ></script>
        <script src="/1_mes/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="/1_mes/node_modules/bootstrap-notify/bootstrap-notify.min.js"></script>

        <!-- Jquery Hotkeys -->
        <!-- Jquery Hotkeys -->
        <script src="/1_mes/node_modules/jquery.hotkeys/jquery.hotkeys.js"></script>

        <script src="/1_mes/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

        <script src="/1_mes/node_modules/jquery-parallax.js/parallax.js"></script>

        <script src="/1_mes/_includes/sessioncheck.js"></script>
        <script src="/1_mes/_includes/clock.js"></script>            

        <style>                           
          
          /* Full-width input fields */
          input[type=text], input[type=password] {
              width: 50%;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              border: 1px solid #ccc;
              box-sizing: border-box;
          }                  

          /* Center the image and position the close button */
          
          .container {
              padding: 16px;
              position: relative;
              text-align: center;
          }

          /* The Modal (background) */
          .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 2; /* Sit on top */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
              padding-top: 60px;
          }

          /* Modal Content/Box */
          .modal-content {
              background-color: #fefefe;
              margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
              border: 1px solid #888;
              width: 400px; /* Could be more or less, depending on screen size */
          }
                   
          /* Add Zoom Animation */
          .animate {
              -webkit-animation: animatezoom 0.6s;
              animation: animatezoom 0.6s
          }

          @-webkit-keyframes animatezoom {
              from {-webkit-transform: scale(0)} 
              to {-webkit-transform: scale(1)}
          }
              
          @keyframes animatezoom {
              from {transform: scale(0)} 
              to {transform: scale(1)}
          }

          /* https://preview.ibb.co/miChnH/DSC_3964.jpg */
          .page-bg {
            background: url('/1_MES/_images/DSC_3967.jpg') no-repeat center center fixed;
            -webkit-filter: blur(2px);
            -moz-filter: blur(2px);
            -o-filter: blur(2px);
            -ms-filter: blur(2px);
            filter: blur(2px);
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background-size: cover;
            /* filter:brightness(110%); */
            padding-top: 75px;
          }

          .tr {
                background: rgba(255, 255, 255, 0.6);
                border-radius: 3px;
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
                border: 7px solid #cecece;
                
          }                    

          a.modlink:visited {
            color: black;
            background-color: transparent;
            text-decoration: none;
          }

          .dropdown-menu {
              width: 400px !important;
          }

          .parallax-container {
            height: 500px;
            width: 100%;
          }
    
        </style>

    </head>
    
    <body>
      <?php
        if(isset($_SESSION['log_alert'])) {
          if($_SESSION['log_alert'] == "login"){
          echo  "<script>$.notify({
              icon: 'fas fa-info-circle',
              title: 'System Notification: ',
              message: 'Login Successful!',
            },{
              type:'info',
              placement:{
                align: 'center'
              },          
              delay: 2000,                        
            });</script>";
            $_SESSION['log_alert'] = "";
          }
          else if($_SESSION['log_alert'] == "logout"){
          echo  "<script>$.notify({
              icon: 'fas fa-info-circle',
              title: 'System Notification: ',
              message: 'Logout Successful!',
            },{
              type:'info',
              placement:{
                align: 'center'
              },           
              delay: 2000,                        
            });</script>";
            $_SESSION['log_alert'] = "";
          }
        }
      ?>

        <!-- <div class="page-bg"></div> -->

        <div style="overflow:hidden;" class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="100" data-image-src='/1_MES/_images/DSC_3967.jpg' data-natural-width="1300" data-natural-height="700">
        
          <div class="row" >
            <div class="col"></div>
            <div class="col-8 p-4">

              <div class="jumbotron tr">
                
                <h3 class="display-4 text-center" style="font-size:8vw;">WELCOME</h3>
                <p class="lead">This may contain News, Bulletin, Announcement. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p class="text-center">It uses utility classes for typography and spacing to space content out within the larger container.</p>
                
              </div>
              
            </div>
            <div class="col"></div>
          </div>
        
        </div>
        
        <div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="100" data-image-src='http://primatechcorporation.com/wp-content/uploads/2015/02/home_parallax1.jpg' data-natural-width="1400" data-natural-height="900"></div>

        <div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="100" data-image-src='http://primatechcorporation.com/wp-content/uploads/2016/08/home_parallax2.jpg' data-natural-width="1400" data-natural-height="900"></div>

        <div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="100" data-image-src='http://primatechcorporation.com/wp-content/uploads/2015/02/home_parallax5-1024x594.jpg' data-natural-width="1400" data-natural-height="900"></div>

        
          <!-- Navbar -->
          <nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-white fixed-top m-0 px-2 pb-1 pt-0">

            <a class="navbar-brand animated flipInX" href="http://primatechcorporation.com/">
              <div class="navbar">            
                <img class="img-fluid animated flipInX" style="width: 146px; height: 28px" src="/1_MES/_images/primatech-logo.png" alt="Primatech Logo"  >                        
              </div>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>                  
            </button>
                          
            <span class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                
              <li class="nav-item">
                <a id="hme" class="nav-link bar hvr-underline-from-center" href="/1_mes/" style='display: <?php if($log=="true"){echo "block";}else{echo "none";} ?>'>Home</a>
              </li>
              
              <li class="nav-item">
                <a id="prtl" class="nav-link bar hvr-underline-from-center" href="/1_MES/_php/portal.php" style='display: <?php if($log=="true"){echo "block";}else{echo "none";} ?>'>Portal</a>
              </li>

              <li class="nav-item dropdown" style="overflow:visible;" >
                <a class="nav-link dropdown-toggle bar hvr-underline-from-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='display: <?php if($log=="true"){echo "block";}else{echo "none";} ?>'>
                  Account
                </a>
                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown" >                  
                  <div class="container dropdown-header text-left">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-center">USER INFO</h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <label><b>Name</b>:</label>
                      </div>
                      <div class="col-sm-4">
                        <span><?php echo $_SESSION['text']; ?></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <label><b>Email:</b></labe>
                      </div>
                      <div class="col-sm-4">
                        <?php

                        if(isset($_SESSION['email'])) {
                          echo $_SESSION['email'];
                        }


                        ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <label><b>Authority:</b></label>
                      </div>
                      <div class="col-sm-4">
                        <?php

                          $auth = $_SESSION['auth'];
                          include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                              $sql = "SELECT USER_AUTHORITY FROM dmc_user_authority WHERE AUTHORITY_CODE = '$auth'";
                              $result = $conn->query($sql);
                              
                                  while($row = $result->fetch_assoc()) {

                                      echo $row['USER_AUTHORITY'];                           
                                      
                                  }
                              
                              $conn->close();

                        ?>
                      </div>
                    </div>                  
                  </div>    
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/1_MES/_php/change_pass.php">Change Password</a>          
                </div>
              </li>
                
            </ul>        
                     
            <span class='navbar-text mr-2' id='usr' style='display: <?php if($log=="true"){echo "block";}else{echo "none";} ?>'>Hi! <b><?php echo $_SESSION['text']; ?></b>.</span>
            <!-- Clock -->            
            <span class="navbar-text mr-2" id="clock"></span>
             
            <button data-toggle="collapse" data-target=".navbar-collapse.show" class="btn btn-outline-secondary p-1 my-2 my-sm-0 hvr-icon-wobble-horizontal" onclick="document.getElementById('id01').style.display='block'" id="lgin" style="display: <?php if($log=="true"){echo "none";}else{echo "block";} ?>" >Login <i class="fas fa-sign-in-alt hvr-icon"></i></button>

            <button class="btn btn-outline-secondary p-1 my-2 my-0 hvr-icon-wobble-horizontal" onclick="" id="lgout" style="display: <?php if($log=="true"){echo "block";}else{echo "none";} ?>"  >Logout <i class="fas fa-sign-out-alt hvr-icon"></i></button> <!-- href='/1_mes/_php/logout.php' -->
            
            </div> 
          </nav>               
          
          <!-- End of Navbar -->

          <nav id="popover-content" class="nav flex-column" style="display: none;">
            <a href="/1_MES/_php/change_pass.php" class="nav-link modlink">Change Password</a>
            <!-- <a href="#" class="nav-link">Invite Members</a>
            <a href="#" class="nav-link">Delete Event</a> -->
          </nav>

      <div class="container-fluid">

          <!-- Jumbotron -->

          <!-- <div class="row">
            <div class="col"></div>
            <div class="col-8 p-4">

              <div class="jumbotron tr">
                
                <h3 class="display-4 text-center" style="font-size:8vw;">WELCOME</h3>
                <p class="lead">This may contain News, Bulletin, Announcement. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p class="text-center">It uses utility classes for typography and spacing to space content out within the larger container.</p>
                
              </div>
              
            </div>
            <div class="col"></div>
          </div> -->

          <!-- End of Jumbotron -->
         
        </div>  

    <!-- The Modal Login -->
        
    <div id="id01" class="modal">
  
        <form id="loginform" class="modal-content animate" method="post" action="/1_mes/_php/checklogin.php">
                          
          <div class="container">

            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

            <h1>Account Login</h1>

            <div class="form-group row">

              <div class="col">
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text mt-2" style="height: 50px;">
                      <i class="fa fa-user"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Username" name="myusername" required autofocus>
                </div>                
                
                
              </div>          
              
            </div>

            <div class="form-group row">

                <div class="col">

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text mt-2" style="height: 50px;">
                        <i class="fa fa-key"></i>
                      </div>
                    </div>
                    <input class="form-control" type="password" placeholder="Enter Password" name="mypassword" required>
                  </div>
  
                  
  
                </div>          
                
            </div>
            
            <div class="row" style="text-align: right">

              <div class="col">&nbsp</div>

              <div class="col">

                <button class="btn btn-info" type="submit" name="btnsub" id="btnsub"><i class="fas fa-sign-in-alt"></i> Login</button>

              </div>              
                                
            </div>            
                        
          </div>      
          
        </form>
    </div>
    <div class="mdl"><!-- Place at bottom of page --></div>
    <!-- Optional JavaScript -->
    <script type="text/javascript">
      $body = $("body");
      
      
      showclock();                 

      // Get the modal - Login
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }

      var timer;

      $(document).ajaxStart(function () {
          timer = setTimeout(function() { $body.addClass("loading"); }, 10);

      }).ajaxStop(function () {
          clearTimeout(timer);
          $body.removeClass("loading");
      })

      $(document).ready(function(){
        $('#bttn').on('click', function(){
            $('.navbar-collapse').collapse('hide');              
        });
        $('[data-toggle="tooltip"]').tooltip(); 
      });

      $(function() {
      $('[data-toggle="popover"]').popover({
            html: true,
            placement: 'bottom',
            trigger: 'focus',
            content: function() {
                return $('#popover-content').html();
            }
        });
      });      

    </script>

      <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
      <script src="/1_mes/_includes/shortcuts.js"></script>
      <script src="/1_mes/_includes/authentication.js"></script>
    </body>
    
</html>    