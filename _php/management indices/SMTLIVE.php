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
 <div class="loader">
    <img src="loading1.gif" alt="Loading..." height="350" style="width: 800px" /></div>
    
    <script type="text/javascript">
      window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
    </script>



     <style type="text/css">
      .wait {
        margin-top: -4%; margin-left: -16%;
    position: absolute;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 180%;
    background: transparent;
    display: flex;
    justify-content: center;
    align-items: center;
}



.wait.hidden {
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}
      .loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
}



      .loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader > img {
    width: 100px;
}

.loader.hidden {
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }
}
    </style>










    











    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";

                    
        ?>

    <!-- Navbar - END -->

    <!-- Page specific Navbar START-->




<!-- ------------------------selections----------------------- -->


<div class="container-fluid mt-5 ml-0 pl-0" id="table_display" style=" width: 100%;" >

      <div class="row text-left" style="margin-left: 15%; margin-top: -4%;">
 <form id="contactForm1" method="POST" action="SMTLIVEajax.php"  >

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" style="width: 60px; display: none;">SHIFT</span>
  </div>
   <select name= "shift" class="form-control" aria-describedby="basic-addon1"   style="font-size: 12px; width: 70px; display: none;" required>
        <option value="ALL">ALL </option>
      <option value="1"> DAY </option>
  <option value="2"> NIGHT </option>


  </select>
  <div class="input-group-append" >
    <span class="input-group-text" style="margin-left: 0.2%; "> PROD.LINE</span>
    <select name="Linename" class="form-control" aria-describedby="basic-addon1" style="font-size: 12px; width: 100px;" selected='overall' required>

<option value="SMTL1">SMTL01</option>
<option value="SMTL2">SMTL02</option>
<option value="SMTL3">SMTL03</option>
<option value="SMTL6">SMTL06</option>
<option value="SMTL12">SMTL12</option>
<option value="SMTL13">SMTL13</option>

</select> 



    <select name="Linename1" class="form-control" aria-describedby="basic-addon1" style="font-size: 12px; width: 100px;" selected='overall' required>

<option value="SMTL1">SMTL01</option>
<option value="SMTL2">SMTL02</option>
<option value="SMTL3">SMTL03</option>
<option value="SMTL6">SMTL06</option>
<option value="SMTL12">SMTL12</option>
<option value="SMTL13">SMTL13</option>

</select> 





    <select name="Linename2" class="form-control" aria-describedby="basic-addon1" style="font-size: 12px; width: 100px;" selected='overall' required>

<option value="SMTL1">SMTL01</option>
<option value="SMTL2">SMTL02</option>
<option value="SMTL3">SMTL03</option>
<option value="SMTL6">SMTL06</option>
<option value="SMTL12">SMTL12</option>
<option value="SMTL13">SMTL13</option>

</select> 
<select id ="chartType" name="chartType" style="height:26px; width:80px; display:none;">
<option value="column"> Bar </option></select>  
<div class="input-group-prepend">
    <span class="input-group-text" style="margin-left: 2%;">Date</span>
  </div><input class="form-control"  type="date" name="from" id="today" style="font-size: 14px; width:150px" value="<?php echo date('Y-m-d'); ?>" required>
<div class="input-group-prepend" style="display: none;">
    <span class="input-group-text" >To:</span>
  </div><input  class="form-control"  type="date" name="to" id="today2" style="font-size: 14px; width:150px; display: none;" value="<?php echo date('Y-m-d'); ?>" required>
<button type="submit" name="daily"   class="btn btn-outline-secondary btn-ladda" data-style="expand-left"> 
    <img src="loading1.gif" alt="Loading..."  id="wait" class="wait" style="display: none;width: 155px " /> Show Result</button>


 

           </form>






</div>
   
      </div>
    </div>



<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>












<!-- FOR TABLE DIV -->
<div class="table table-lg table-responsive " >
<div id="show" class="table table-lg" ></div>
<div id="show1" class="table table-lg" ></div>
<script type="text/javascript">
    var frm = $('#contactForm1');
    frm.submit(function (e) {
        e.preventDefault();
$('.wait').show();
var i = setInterval(function(){
   //Call ajax here
 $.ajax({
            type: frm.attr('method'),         
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
               $('.wait').hide();
                console.log('Submission was successful.');
                console.log(data);
                          $("#show").html(data);
            },
            error: function (data) {
               $('.wait').hide();      
                console.log('An error occurred.');
                console.log(data);
               $("#show").html(data);}, }); },60000)    });















</script>


<?php

     



?>





























 </div>