

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
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
    <!-- Navbar - END -->

    <!-- Page specific Navbar START-->

    <div style="position: absolute;margin-top: -14px;" id="innernavbar">
      <nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->MENU <i class="fas fa-caret-down"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav nav-tabs mr-auto mt-1" id="tb">           
            <li><a id="tb1" class="nav-link tbl active " href="#" >INJECTION</a></li>
            <li><a id="tb2" class="nav-link tbl " href="chart_handler.php" >SMT</a></li>
            <li><a id="tb3" class="nav-link tbl " href="#" >FATP</a></li>
            <li><a id="tb4" class="nav-link tbl " href="#" onclick="DisplayTable4('machine_list_table','machine_listsp','Machine List')">Machine</a></li>
            <li><a id="tb5" class="nav-link tbl " href="#" onclick="DisplayTable5('defect_code_table','defect_codesp','Defect Code')">Defect Code</a></li>
            <li><a id="tb6" class="nav-link tbl " href="#" onclick="DisplayTable6('user_info_table','user_infosp','User Information')">User Information</a></li>
            <li><a id="tb7" class="nav-link tbl " href="#" onclick="DisplayTable7('user_auth_table','user_authsp','User Authority')">User Authority</a></li>
            <li><a id="tb8" class="nav-link tbl " href="#" onclick="DisplayTable8('division_code_table','division_codesp','Division Code')">Division Code</a></li>
            <li><a id="tb9" class="nav-link tbl " href="#" onclick="DisplayTable9('employee_table','employeesp','Employee List')">Employee</a></li>
            <li><a id="tb9" class="nav-link tbl " href="#" onclick="DisplayTable10('itemmoldmatching_table','itemmoldmatchingsp','Item Mold Matching')">Item Mold</a></li>
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

   
    <!-- Page specific Navbar END -->

    <!-- Contents - START  =====================================               -->









    <!--
   
  
  -->

    <!-- Contents - END ==============================================          -->








    <div class="mdl" style=" z-index: 1"><!-- Place at bottom of page --></div>

    <!-- Optional JavaScript -->


   
    
  </body>
  
</html>