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

        if(isset($_SESSION['auth'])) {
          $auth = $_SESSION['auth'];
          $auth = stripslashes($auth);
        }

        require $_SERVER['DOCUMENT_ROOT']. '/1_mes/vendor/autoload.php';

        $dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT'].'\1_mes');
        $dotenv->load();
                                
      ?>
           
        <title>Home | MES - Primatech</title>
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

        <!-- IZITOAST Notification -->
        <link rel="stylesheet" href="/1_mes/node_modules/izitoast/dist/css/iziToast.min.css">

        <!-- Nprogress -->
        <link rel='stylesheet' href='/1_mes/node_modules/nprogress/nprogress.css'/>
        
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

        <!-- IZITOAST Notification -->
        <script src="/1_mes/node_modules/izitoast/dist/js/iziToast.min.js" type="text/javascript"></script>

        <!-- Jquery Hotkeys -->
        <script src="/1_mes/node_modules/jquery.hotkeys/jquery.hotkeys.js"></script>
        
        <!-- Nprogress -->
        <script src='/1_mes/node_modules/nprogress/nprogress.js'></script>

        <script src="/1_mes/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

        <script src="/1_mes/node_modules/jquery-parallax.js/parallax.js"></script>

        
        <script src="/1_mes/_includes/clock.js"></script>                 

        <style>

          body{
            padding-top: 63px;
          }
          .notifi{
            width: 500px;
          }                            
          
          /* Full-width input fields */
          /* input[type=text], input[type=password] {
              width: 50%;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              border: 1px solid #ccc;
              box-sizing: border-box;
          }   */                

          /* Center the image and position the close button */
          
          /* .container {
              padding: 16px;
              position: relative;
              text-align: center;
          } */

          /* The Modal (background) */
          

          /* Modal Content/Box */          
                   
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
            height: 800px;
            width: 100%;
          }

          .mdl {
            display:    none;
            position:   fixed;
            z-index:    gray;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255) 
                        /* url('http://i.stack.imgur.com/FhHRx.gif') */
                        url('/1_MES/_icons/103.gif')
                        50% 50%                     
                        no-repeat;
            /* background-size: 50px 50px; */
          }
    
        </style>       

    </head>
    
    <body>    
    <script>      
      $body = $("body");
      $body.addClass("loading");
      var app_key = "<?php echo getenv('PUSHER_APP_KEY') ?>";
      var app_cluster = "<?php echo getenv('PUSHER_APP_CLUSTER') ?>";
    </script>
    
    <div class="mdl" style="z-index:5000"><!-- Place at bottom of page --></div>

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
        
          <!-- Navbar -->
          <nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-white fixed-top m-0 px-2 pb-1 pt-0">

            <a class="navbar-brand animated flipInX" href="http://172.16.1.13:8000">
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
                <a id="hme" class="nav-link bar hvr-underline-from-center" href="/1_mes/" style="display: none">Home</a>
              </li>
              
              <li class="nav-item">
                <a id="prtl" class="nav-link bar hvr-underline-from-center" href="/1_MES/_php/portal.php" style="display: none">Portal</a>
              </li>

              <li class="nav-item">
                <a class="nav-link bar hvr-underline-from-center" id="acct_btn" href="#" style="display: none">
                  Account
                </a>
              </li>

              <li class="nav-item">
                <a id="adm" class="nav-link bar hvr-underline-from-center" style="display:none" href="/1_MES/mis_admin/">Admin</a>
              </li>           
                
            </ul>        
                     
            <span class='navbar-text mr-2' id='usr' style="display: none">Hi! <b><?php 
            
            if(isset($_SESSION['text'])){
              echo $_SESSION['text'];
            }
               ?></b>.</span>
            <!-- Clock -->            
            <span class="navbar-text mr-2" id="clockdate" style="display:block"></span>            
            <span class="navbar-text mr-2" id="clocktime" style="display:block"></span>
            <!-- <span class="navbar-text mr-2" id="con" style="display:block;color:orange;" title='Database Connection'><i class="fas fa-plug"></i></span> -->
            <span class="navbar-text mr-2" id="" style="display:block">
            <a data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-link p-1 ml-sm-0 mr-1 hvr-icon-wobble-horizontal" href='#' onclick="" id="b_report" style="display:block;" title="Report Bug"><small class='text-muted'><i class="fas fa-bug"></i></small></a>
            </span>  
             
            <button data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item btn btn-outline-secondary p-1 ml-sm-0 mr-1 hvr-icon-wobble-horizontal" onclick="document.getElementById('id01').style.display='block'" id="lgin" style="display:block;">Login <i class="fas fa-sign-in-alt hvr-icon"></i></button>
            
            <button data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item btn btn-outline-secondary p-1 my-2 my-sm-0 hvr-icon-wobble-horizontal" onclick="" id="reg" style="display:block;">Register <i class="fas fa-user hvr-icon"></i></i></button>

            <button class="nav-item btn btn-outline-secondary p-1 my-2 my-0 hvr-icon-wobble-horizontal" onclick="" id="lgout" style="display: none">Logout <i class="fas fa-sign-out-alt hvr-icon"></i></button> <!-- href='/1_mes/_php/logout.php' -->
            
            </div> 
          </nav>

          <script>
          var auth = '<?php
           if(isset($auth)){
            echo $auth; 
           }           
           ?>';
            if(<?php echo $log;?>){
              $('#hme').show();
              $('#prtl').show();
              $('#acct_btn').show();
              $('#usr').show();
              $('#lgout').show();
              $('#lgin').hide();
              $('#reg').hide();
              if(auth == 'A'){
                $('#adm').show();
              }
            }
            else{
              $('#hme').hide();
              $('#prtl').hide();
              $('#acct_btn').hide();
              $('#usr').hide();
              $('#lgout').hide();
              $('#lgin').show();
              $('#reg').show();
              
            }
          </script>
          
          <!-- End of Navbar -->

      <div  class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="0" data-image-src='/1_MES/_images/DSC_3967.jpg' data-natural-width="800" data-natural-height="400"></div>

      <div class="container">

        <!-- <div class="row">
            <div class="col"></div>
            <div class="col-xs-5 text-center">
              <image src="/1_mes/_images/primatech-logo3.png" width="400" height="238" ></image>
            </div>
            <div class="col"></div>
        </div> -->

        <div class="row">
            
            <div class="col"></div>
            <div class="col-md-5 text-center">

              <div class="card-deck mb-3 text-center">
                
              </div>
            </div>
            <div class="col"></div>
        </div>

              

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
        
    <div id="id01" class="modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form id="loginform" class="modal-content animate" method="post" action="/1_mes/_php/checklogin.php">
          <div class="modal-header">
            <i class="fas fa-user-lock"></i><h5 class="modal-title">Account Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              </button>
            <i class="fas fa-user-lock"></i>
          </div>
          <div class="modal-body">              
          <div class="container">          
            <div class="form-group row">
              <div class="col">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text ">
                      <i class="fa fa-user"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Enter Username" name="myusername" required autofocus>
                </div>         
              </div>                        
            </div>
            <div class="form-group row">
                <div class="col">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text ">
                        <i class="fa fa-key"></i>
                      </div>
                    </div>
                    <input class="form-control form-control-lg" type="password" placeholder="Enter Password" name="mypassword" required>
                  </div>
                </div>                        
            </div>
            </div>
            <div class="modal-footer">                                             
                <button class="btn btn-info" type="submit" name="btnsub" id="btnsub"><i class="fas fa-sign-in-alt"></i> Login</button>                         
            </div>                                 
          </div>              
        </form>
        </div>
    </div>    
    
    <div class="modal hide fade in" data-keyboard="false"  role="dialog" id="acct">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">USER INFO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">                  
            <div class="container-fluid">

              <div class="row">
                <div class="col-sm-3">
                  <label><b>Name</b>:</label>
                </div>
                <div class="col-sm-9">
                  <span><?php echo $_SESSION['text']; ?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <label><b>Email:</b></labe>
                </div>
                <div class="col-sm-9">
                  <span>
                  <?php
                    if(isset($_SESSION['email'])) {
                    echo $_SESSION['email'];
                  }
                  ?>
                  </span>
                </div>                      
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <label><b>Authority:</b></label>
                </div>
                <div class="col-sm-9">
                <span>
                <?php

                  try{
                    $auth = $_SESSION['auth'];
                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
  
                        $sql = "SELECT USER_AUTHORITY FROM dmc_user_authority WHERE AUTHORITY_CODE = '$auth'";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {
  
                                echo $row['USER_AUTHORITY'];                           
                                
                            }
                        
                        $conn->close();
                  }
                  catch(Exception $e){
                    echo $e->getMessage();
                  }                  

                ?>
                </span>
                </div>
              </div>

            </div>     
          </div>
          <div class="modal-footer">
            <a class="btn btn-info" href="/1_MES/_php/change_pass.php">Change Password</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>

    <!-- register modal -->
    <div class="modal fade in" tabindex="-1" role="dialog" id='regist' data-backdrop="false">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Register Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="registerform"  method="post">
          <div class="modal-body">

            <div class="form-group row">
              <div class="col-4">
                <label for="" class="col-form-label-sm">COMPLETE NAME: <small>(Input Letters Only)</small></label>                    
              </div>
              <div class="col-8">
                <input id="username" type="text" class="form-control form-control-lg" name="username" pattern="^[a-zA-Z\s]*$" placeholder="" required>                
              </div>                                
            </div>

            <div class="form-group row">
              <div class="col-4">
                <label for="" class="col-form-label-sm">USER ID:</label>                    
              </div>
              <div class="col-8">
                <input id="userid" type="text" class="form-control form-control-lg" name="userid" placeholder="" required>                
              </div>                                
            </div>

            <div class="form-group row">
              <div class="col-4">
                <label for="" class="col-form-label-sm">EMAIL:</label>                    
              </div>
              <div class="col-8">
                <input id="useremail" type="email" class="form-control form-control-lg" name="emailaddress" placeholder="">                
              </div>                                
            </div>

            <div class="form-group row">
              <div class="col-4">
                <label for="" class="col-form-label-sm">PASSWORD:</label>                    
              </div>
              <div class="col-8">
                <input id="userpw" type="password" class="form-control form-control-lg" name="userpassword" placeholder="" required>                
              </div>                                
            </div>

            <div class="form-group row">
              <div class="col-4">
                <label for="" class="col-form-label-sm">CONFIRM PASSWORD:</label>                    
              </div>
              <div class="col-8">
                <input id="userpwcon" type="password" class="form-control form-control-lg" name="userpwcon" placeholder="" required>                
              </div>                                
            </div>

          </div>
                   
          <div class="modal-footer">            
            <button type="submit" class="btn btn-primary" name="submit">Register</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          </form> 
        </div>
      </div>
    </div> <!-- End register modal -->


    <!-- Bug Report Modal -->

    <div class="modal fade in" tabindex="-1" role="dialog" id='bugreportmod' data-backdrop="false">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Bug Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id='bugreportform'>
          <div class="modal-body">
            <div class='container-fluid'>
                  <div class='row'>
                    <div class='col'>
                      <h5>Name: <small><?php
                      if(isset($_SESSION['text'])){
                        echo $_SESSION['text'];
                      }                       
                        ?></small></h5>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col'>
                      <h5>Message:</h5>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col'>
                      <textarea name='r_message' id='r_message' rows="4" cols="50" maxlength="1000" placeholder="Enter message here......"></textarea>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col mt-0 pt-0'>
                      <small class='text-muted' id='char_length'>1000 character/s left.</small>
                    </div>
                  </div>
            </div>
            
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-primary">Send Report</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
      </div>
    </div> <!-- END Bug Report Modal -->

    <!-- Optional JavaScript -->
    <script type="text/javascript">    
      
      showclock();                 

      // Get the modal - Login
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }

      $(document).on({  
          ajaxStart: function() { /* $body.addClass("loading"); */ $('.mdl').show();  },   
          ajaxStop: function() { /* $body.removeClass("loading"); */$('.mdl').fadeOut(700); }     
      });

      /* var timer;

      $(document).ajaxStart(function () {
          timer = setTimeout(function() { $body.addClass("loading"); }, 10);

      }).ajaxStop(function () {
          clearTimeout(timer);
          $body.removeClass("loading");
      }) */

      $(document).ready(function(){        

        $('#acct_btn').on('click', function(){
          $('#acct').modal('show');             
        });

        $('#reg').on('click', function(){
          $('#regist').modal('show');
        });

        $('#bttn').on('click', function(){
          $('.navbar-collapse').collapse('hide');              
        });

        $('#b_report').on('click', function(){
          $('#bugreportmod').modal('show');             
        });

        $('[data-toggle="tooltip"]').tooltip();        

        $('#r_message').on('keyup', function(){
          $('#char_length').html(1000 - $('#r_message').val().length + ' character/s left.');
        });

        $('#bugreportmod').on('submit','#bugreportform', function (e) {
          e.preventDefault();
          e.stopImmediatePropagation();
          /* alert($('#r_message').val()); */
          var formdata =  $('#bugreportform').serializeArray();
          formdata.push({name: 'action', value: 'insert'});
          $.ajax({
            type: 'POST',
            url: '/1_mes/database/table_handler/admin/bugreportsHandler.php',
            global:false,
            data: $.param(formdata),
            success: function (data) {      
              if(data==true){
                
                $('#bugreportform').trigger('reset');
                $('#bugreportmod').modal('hide');          
                
                iziToast.show({
                  title: 'SENT:',
                  message: 'Thank you for your feedback. Have a nice day!',
                  position: 'topCenter',
                  titleSize: '20px',
                  messageSize: '18px',
                  transitionIn: 'fadeInDown',
                  transitionOut:	'fadeOutUp',
                  timeout: 5000,
                  pauseOnHover: false
                });
              }
              else{
                alert(data);          
              }
            }
          });
        });
         
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

      $('#regist').on('submit','#registerform', function (e) { 
        e.preventDefault();
        e.stopImmediatePropagation();       

        if($('#userpw').val() == $('#userpwcon').val()){
          
          var formdata =  $('#registerform').serializeArray();
          formdata.push({name: 'action', value: 'insert'});
          $.ajax({
            type: 'POST',
            url: '/1_mes/database/table_handler/master/userinfoHandler.php',
            data: $.param(formdata),
            success: function (data) {      
              if(data==true){
                
                $('#registerform').trigger('reset');
                $('#regist').modal('hide');          
                
                swal(
                  'Registered!',
                  'Please wait for the system administrator to provide user authentication to your account to access services.',
                  'success'
                )
              }
              else{
                alert(data);          
              }
            }
          });
          
        }
        else{
          $.notify({
            icon: 'fas fa-exclamation-triangle',
            title: 'System Notification: ',
            message: "Typed passwords are not identical. Please re-type passwords.",
          },{
            type:'danger',
            placement:{
              align: 'center'
            },           
            delay: 3000,                        
          });
        }
        /* var formdata =  $('#registerform').serializeArray();
        formdata.push({name: 'action', value: 'insert'});
        $.ajax({
          type: 'POST',
          url: '/1_mes/database/table_handler/master/userinfoHandler.php',
          data: $.param(formdata),
          success: function (data) {         
            if(data==true){
              
              $('#registerform').trigger('reset');
              $('#regist').modal('hide');          
              
              swal(
                'Success!',
                'Please wait for the system administrator to provide user authentication to your account.',
                'success'
              )
            }
            else{
              alert(data);          
            }
          }
        });  */
        
      });

    </script>

      <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
      <script src="/1_mes/_includes/shortcuts.js"></script>
      <script src="/1_mes/_includes/authentication.js"></script>
      <script>
        $('.mdl').fadeOut(1000);
      </script>
    <script src="https://js.pusher.com/4.3/pusher.min.js"></script> 
    <script src="/1_mes/_includes/sessioncheck.js"></script>    
    <script src="/1_mes/_includes/notif/rtnotif.js"></script>
    </body>
    
</html>    