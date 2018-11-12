<?php

#include 'datavarProdplanVsResult.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manufacturing Information</title>


<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <meta charset="utf-8"> ok if that's what you want. Sorry for troubling you. thanks
  <meta name="viewport" content="width=device-width, initial-scale=1"> -->
 
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header2.php";?>






</head>

<body style="margin-top: -24px; overflow-x: hidden; overflow-y: visible">
<script>
  NProgress.configure({  showSpinner: false });    
  NProgress.start();          
  NProgress.inc();
</script>


   <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>

   <div class="mod_menu" style="position: absolute;padding-left: 15px;padding-top: 12px;" >

 
<nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; ">
 <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <!-- <span class="navbar-toggler-icon"></span> -->MENU
 </button>
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
   <ul class="navbar-nav nav-tabs mr-auto mt-1" id="tb">                
   <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     ProdPlan Vs Result
     </a>
       <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">                  
         <div class="container dropdown-header text-left">
           
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdPlanVsResultINJ','INJ','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>INJ</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdResultINJ','INJ','Result');" style="color: black">PROD RESULT - <b>INJ</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdPlanVsResultSMT','SMT','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>SMT</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdResultSMT','SMT','Result');" style="color: black">PROD RESULT - <b>SMT</b></a>
             </h6>
             </div>                      
           </div>
           
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdPlanVsResultMOLD','MOLD','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>MOLD </b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdResultMOLD','MOLD','Result');" style="color: black">PROD RESULT - <b>MOLD</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdPlanVsResultASSY','ASSY','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>ASSY</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdResultASSY','ASSY','Result');" style="color: black">PROD RESULT - <b>ASSY</b></a>
               </h6>
             </div>                      
           </div>
           
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdPlanVsResultPRINTING','PRINTING','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>PRINTING</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdResultPRINTING','PRINTING','Result');" style="color: black">PROD RESULT - <b>PRINTING</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdPlanVsResultSAMPLES','SAMPLES','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>SAMPLES</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" class="linkcollapse" onclick="loadtbl2('ProdResultSAMPLES','SAMPLES','Result');" style="color: black">PROD RESULT - <b>SAMPLES</b></a>
               </h6>
             </div>                      
           </div>

         </div>
         
       </div>
   </li>      
   <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Production
     </a>
      <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">                  
         <div class="container dropdown-header text-left">
                  <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse"  href="#" onclick="loadtbl2('ProductionSummary','','production_summary')">PRODUCTION SUMMARY</a>
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse"  href="#" onclick="loadtbl2('PrintStatus','','print_status')">PRINT STATUS</a>                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse" href="#" onclick="loadtbl2('PendingProduction','','pending_production')">PENDING PRODUCTION</a>                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse" href="#" onclick="underConstruct()">PROD STOP</a>                        
                        </h6>
                      </div>                      
                    </div>
         </div>
      </div>
    </li>

     <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Shipment
     </a>
      <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">                  
         <div class="container dropdown-header text-left">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse" href="#" onclick="loadtbl2('ShipmentList1','','shipment_management1')">SHIPMENT LIST</a>                      
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse" href="#" onclick="loadtbl2('ShipmentList','','shipment_management')">GROUP MANAGEMENT</a>                     
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse" href="#" onclick="loadtbl2('Dr-Assign','','dr_assign')">DR-ASSIGN</a>                     
                        </h6>
                      </div>                      
                    </div>

         </div>
      </div>
      </li>
      <!-- loadtbl2('CreatePlan','','create_plan')    underConstruct() -->
       
       <li>
         <a class="nav-link tbl" id="menuhover" href="#" onclick="underConstruct() ">Create Plan</a>
       </li>

     <!--  <li><a class="nav-link tbl" id='tb6' href="#" onclick="loadDoc('ItemReceiving','<?php echo $_SESSION['text'];?>')">Item Receiving</a></li> -->
     
      <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Item Receiving
     </a>
      <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">                  
         <div class="container dropdown-header text-left">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse" href="#" onclick="loadDoc('ItemReceiving','<?php echo $_SESSION['text'];?>')">SCAN RECEIVED</a>                      
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="#" onclick="loadtbl2('ViewReceived','','view_received')">RECEIVED LIST</a>                     
                        </h6>
                      </div>                      
                    </div>
                    

         </div>
      </div>
      </li>
     </ul>
      <!-- ICONS ON LEFT -->
   <?php
       include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/tab_navbar.php";            
   ?>
   <!-- ICONS ON LEFT END -->
   </div>  


 </nav>



 
</div>


   <div id="table_display"  style="width: 100%;">
        <script>       
          loadtbl2('ProdPlanVsResultINJ','INJ','PlanWithResult');
        </script>
  </div>

  <div id="modal_display1" style="width: 100%;">
        <script>       
          loadmodal1('ShipmentModal');
        </script>
  </div>

   <div id="modal_display2" style="width: 100%;">
        <script>       
          loadmodal2('scanmodal');
        </script>
  </div>

  




    <!-- Contents - END ==============================================          -->

    <div class="mdl" style='z-index: 1'><!-- Place at bottom of page --></div>

<!-- Optional JavaScript -->




	<script>
var header = document.getElementById("tb");
        var btns = header.getElementsByClassName("tbl");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }

         $('.linkcollapse').on('click', function(){
            $('.navbar-collapse').collapse('hide');
        });

      $body = $("body");
      $(document).on({
          ajaxStart: function() { /* $body.addClass("loading"); */ $('.mdl').show();  },   
          ajaxStop: function() { /* $body.removeClass("loading"); */$('.mdl').fadeOut(700); }     
      });    
  </script>
  
  

<script>        
NProgress.done();                  
</script>
 
</body>