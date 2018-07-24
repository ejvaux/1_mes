<?php

#include 'datavarProdplanVsResult.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manufacturing Information</title>


<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> -->
 
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header2.php";?>




<script>

$(document).ready(function() {


  //Change in continent dropdown list will trigger this function and
  //generate dropdown options for county dropdown
  $(document).on('change','#CName', function() {
    var CUSTOMER_CODE = $(this).val();
    if(CUSTOMER_CODE != "") {
      $.ajax({
        url:"find.php",
        type:'POST',
        data:{CUSTOMER_CODE:CUSTOMER_CODE},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#CCode").removeAttr('disabled','disabled').html(response);
            } else {
            $("#CCode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          }
        }
      });
    } else {
      $("#CCode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });

  $(document).on('change','#CCode', function() {
    var CUSTOMER_CODE1 = $(this).val();
    if(CUSTOMER_CODE1 != "") {
      $.ajax({
        url:"find.php",
        type:'POST',
        data:{CUSTOMER_CODE1:CUSTOMER_CODE1},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#ICode").removeAttr('disabled','disabled').html(response);
            } else {
            $("#ICode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          }
        }
      });
    } else {
      $("#ICode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });


  //Change in coutry dropdown list will trigger this function and
  //generate dropdown options for state dropdown

$(document).on('change','#ICode', function() {
    var ITEM_CODE = $(this).val();
    if(ITEM_CODE != "") {
      $.ajax({
        url:"find.php",
        type:'POST',
        data:{ITEM_CODE:ITEM_CODE},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#IName").removeAttr('disabled','disabled').html(response);
            } else {
            $("#IName").attr('disabled','disabled').html("<option value=''></option>");
          }
        }
      });
    } else {
      $("#IName").attr('disabled','disabled').html("<option value=''></option>");
    }
  });

});

</script>


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
               <a href="#" onclick="loadtbl2('ProdPlanVsResultINJ','INJ','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>INJ</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdResultINJ','INJ','Result');" style="color: black">PROD RESULT - <b>INJ</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdPlanVsResultSMT','SMT','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>SMT</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdResultSMT','SMT','Result');" style="color: black">PROD RESULT - <b>SMT</b></a>
             </h6>
             </div>                      
           </div>
           
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdPlanVsResultMOLD','MOLD','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>MOLD </b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdResultMOLD','MOLD','Result');" style="color: black">PROD RESULT - <b>MOLD</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdPlanVsResultASSY','ASSY','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>ASSY</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdResultASSY','ASSY','Result');" style="color: black">PROD RESULT - <b>ASSY</b></a>
               </h6>
             </div>                      
           </div>
           
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdPlanVsResultPRINTING','PRINTING','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>PRINTING</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdResultPRINTING','PRINTING','Result');" style="color: black">PROD RESULT - <b>PRINTING</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdPlanVsResultSAMPLES','SAMPLES','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>SAMPLES</b></a>
               </h6>
             </div>                      
           </div>
           <div class="row">
             <div class="col">
               <h6 class="text-left">
               <a href="#" onclick="loadtbl2('ProdResultSAMPLES','SAMPLES','Result');" style="color: black">PROD RESULT - <b>SAMPLES</b></a>
               </h6>
             </div>                      
           </div>

         </div>
         
       </div>
   </li>      
       <li>
         <a class="nav-link tbl" id="menuhover"  href="#" onclick="loadtbl2('ProductionSummary','','production_summary')">Production Summary</a>
       </li>
       <li>
         <a class="nav-link tbl" id="menuhover"  href="#" onclick="loadtbl2('PrintStatus','','print_status')">Print Status</a>
       </li>
       <li>
         <a class="nav-link tbl" id="menuhover" href="#" onclick="loadtbl2('PendingProduction','','pending_production')">Pending Production</a>
       </li>
       <li>
         <a class="nav-link tbl" id="menuhover" href="#" onclick="underConstruct()">Production Stop</a>
       </li>
       <li>
         <a class="nav-link tbl" id="menuhover" href="#" onclick="loadtbl2('ShipmentList1','','shipment_management1')">Shipment List</a>
       </li>
       <li>
         <a class="nav-link tbl" id="menuhover" href="#" onclick="loadtbl2('ShipmentList','','shipment_management')">Group Mngmt</a>
       </li>
       <li>
         <a class="nav-link tbl" id="menuhover" href="#" onclick="loadtbl2('Dr-Assign','','dr_assign')">DR-Assign</a>
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


   <div id="table_display" style="width: 100%;">
        <script>       
          loadtbl2('ProdPlanVsResultINJ','INJ','PlanWithResult');
        </script>
  </div>

     <div id="modal_display1" style="width: 100%;">
        <script>       
          loadmodal1('ShipmentModal');
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