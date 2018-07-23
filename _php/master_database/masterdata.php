<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <!-- Header start -->
    <?php           
      include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";
      if(!($auth == 'A' || $auth == 'B')) {          
        echo "<script type='text/javascript'>alert('Access Denied!');window.location.href='/1_mes/_php/portal.php';</script>";        
      }
    ?>
    <!-- Header end -->
    
    <!-- Change Title --> <title>Master Database</title>

    <!-- Custom JS -->
    <script src="/1_mes/_includes/master.js"></script>
    <script src="/1_mes/_includes/displaymodal.js"></script>

    <script>
      var usrname = "<?php
      if(isset($_SESSION['username'])){
        echo $_SESSION['username'];
      }        
       ?>";
      /* var timer;

      $(document).ajaxStart(function () {
          timer = setTimeout(function() { $body.addClass("loading"); }, 500);

      }).ajaxStop(function () {
          clearTimeout(timer);
          $body.removeClass("loading");
      }) */
    
    </script>
    
    <!-- Custom CSS - START -->
    <style>
    

    </style>
    <!-- Custom CSS - END -->

  </head>

  <body>
  <script>
    NProgress.configure({  showSpinner: false });    
    NProgress.start();          
    NProgress.inc();
  </script>
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
    <!-- Navbar - END -->

    <!-- Contents - START  -->

    <div style="position: absolute;margin-top: -14px;" id="innernavbar">
      <nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->MENU <i class="fas fa-caret-down"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav nav-tabs mr-auto mt-1" id="tb">           
            <li><a id="tb1" class="nav-link tbl active " href="#" onclick="DisplayTable1('mold_table','moldsp','Mold List')">Mold Management</a></li>
            <li><a id="tb2" class="nav-link tbl " href="#" onclick="DisplayTable2('customer_table','customersp','Customer List')">Customer</a></li>
            <li><a id="tb3" class="nav-link tbl " href="#" onclick="DisplayTable3('item_list_table','item_listsp','Item List')">Item</a></li>
            <li><a id="tb4" class="nav-link tbl " href="#" onclick="DisplayTable4('machine_list_table','machine_listsp','Machine List')">Machine</a></li>
            <li><a id="tb5" class="nav-link tbl " href="#" onclick="DisplayTable5('defect_code_table','defect_codesp','Defect Code')">Defect Code</a></li>
            <li><a id="tb6" class="nav-link tbl " href="#" onclick="DisplayTable6('user_info_table','user_infosp','User Information')">User Information</a></li>
            <li><a id="tb7" class="nav-link tbl " href="#" onclick="DisplayTable7('user_auth_table','user_authsp','User Authority')">User Authority</a></li>
            <li><a id="tb8" class="nav-link tbl " href="#" onclick="DisplayTable8('division_code_table','division_codesp','Division Code')">Division Code</a></li>
            <li><a id="tb9" class="nav-link tbl " href="#" onclick="DisplayTable9('employee_table','employeesp','Employee List')">Employee</a></li>
          </ul>
                    
          <!-- ICONS ON LEFT -->
          <?php
              include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/tab_navbar.php";            
          ?>
          <!-- ICONS ON LEFT END -->

        </div>  
      </nav>
    </div>    

    <div class="container-fluid mt-5 mx-0 px-0" id="table_display" style="width: 100%;">
      <div class="row text-left">
        <div class="col-sm-12 py-0 mr-0" >
        </div>
      </div>
    </div>

    <div id="mod">
    </div>

    <div class="mdl" ><!-- Place at bottom of page --></div>
    
    <!-- Contents - END-->
    
    <!-- Optional JavaScript -->   
    
    <script>
      $body = $("body");
       

      $(document).ready(function(){
         DisplayTable1('mold_table','moldsp','Mold Management');
         loadmodal('masterdatamodal');       
         $body.removeClass("loading");         
         NProgress.done();
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
         /* ----------- */
      });
      
      $('.navbar-nav>li>a').on('click', function(){
          $('.navbar-collapse').collapse('hide');
          
      });
               
      $(document).on({
          ajaxStart: function() { /* $body.addClass("loading"); */ $('.mdl').show();  },   
          ajaxStop: function() { /* $body.removeClass("loading"); */$('.mdl').fadeOut(700); }    
      });      
            
    </script>
    <script src="/1_mes/_php/master_database/functions_master.js"></script>
  </body>
</html>