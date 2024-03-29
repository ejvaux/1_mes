<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";
        if($auth == 'SQ') {          
            echo "<script type='text/javascript'>window.location.href='/1_smt/public/qc';</script>";        
        } 
    ?>

    <!-- Custom JS -->
    <script src="/1_mes/_php/QualityManagement/QualityTable.js"></script>   
    <script src="https://cdn.datatables.net/rowgroup/1.0.3/js/dataTables.rowGroup.min.js"></script>
    <!-- Change Title --> <title>Quality Management</title>
    <!-- Custom CSS - START -->
    <style>
      .table-wrapper-1 {
            display: block;
            max-width: 100vw;
            max-height: 69vh;
            overflow-y: auto;
            overflow-x: auto;
            -ms-overflow-style: -ms-autohiding-scrollbar;
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
    <script>
    var username = '<?php echo $_SESSION["text"];?>';
    NProgress.configure({  showSpinner: false });    
    NProgress.start();          
    NProgress.inc();
    </script>
    <!-- Page specific Navbar START-->

      <div style="position: absolute;margin-top: -14px;" id="innernavbar">
        <nav class="navbar navbar-brdr navbar-expand-lg navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
          <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->MENU
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav nav-tabs mr-auto mt-1" id="tb">           
              <li><a class="nav-link tbl active" id='tb1' href="#" onclick="loadDoc('LotCreate','<?php echo $_SESSION["text"];?>')">Lot Create</a></li>
              <li><a class="nav-link tbl" id='tb2' href="#" onclick="loadDoc('LotJudgement');">Lot Judgement</a></li>
              <li><a class="nav-link tbl" id='tb3' href="#" onclick="loadDoc('LotRecovery')">Lot Reject Recovery</a></li>
              <li><a class="nav-link tbl" id='tb4' href="#" onclick="DisplayTableDefect('DefectTable','DefectTableSP','Defective_List')">Defect Management</a></li>
              <?php
                 $_ENV['APP_URL'];
                if($auth == 'A') {          
                  echo '<li><a class="nav-link tbl" href="'. $_ENV['APP_URL2'] .'1_smt/public/qc">SMT QC</a></li>';
                }
              ?>
              <!-- <li><a class="nav-link tbl" href="http://172.16.4.32/1_smt/public/qc">SMT QC</a></li> -->
              <!--<li><a class="nav-link tbl" id='tb6' href="#" onclick="loadDoc('ItemReceiving','<?php echo $_SESSION["text"];?>')">Item Receiving</a></li>
              <li><a class="nav-link tbl" id='tb5' href="#" onclick="notWorking()">Initial Sample List</a></li>
              <li><a class="nav-link" href="#" onclick="">Tab 6</a></li>
              <li><a class="nav-link" href="#" onclick="">Tab 7</a></li>
              <li><a class="nav-link" href="#" onclick="">Tab 8</a></li> -->
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
      <script>       
        loadDoc('LotCreate', '<?php echo $_SESSION["text"];?>')
        /* loadDoc('LotJudgement'); */
        </script>
      </div>
    </div>
  </div>
  <div id="forModal"></div>

    <!-- Contents - END ==============================================          -->

    <div class="mdl" style='z-index: 1'><!-- Place at bottom of page --></div>

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

        /* var timer;

        $(document).ajaxStart(function () {
            timer = setTimeout(function() { $body.addClass("loading"); }, 1000);

        }).ajaxStop(function () {
            clearTimeout(timer);
            $body.removeClass("loading");
        })   */     

        $(document).ready(function () {
          /* totalQty(); */
          

          var header = document.getElementById("tb");
          var btns = header.getElementsByClassName("tbl");
          for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
              var current = document.getElementsByClassName("active");
              current[0].className = current[0].className.replace(" active", "");
              this.className += " active";
            });
          }
          $body.removeClass("loading");
        });

      </script>
      <script>
        NProgress.done();            
      </script>
    </body>
  </html>
