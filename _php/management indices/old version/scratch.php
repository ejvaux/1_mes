

<!DOCTYPE html>

<html>

<head>

  <title></title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

</head>

<body>



 

<table id="calendar" > <tr>
<th>
<input type="radio" id="daily" name="day" value="daily">Daily &nbsp; &nbsp;
<input type="radio" id="monthly" name="day" value="monthly">Monthly &nbsp; &nbsp;&nbsp; &nbsp;
 </th> </tr>
<table id="calendar_tab">  <tr>
<th id="caldaily">
<label>From: </label><input id ="d1" type="date" name="from" value = "" class="datepicker" style="height:25px; width:150px">
<label>To: </label><input id ="d2" type="date" name="to" value ="" class = "datepicker" style="height:25px; width:150px" >
<input type="submit" id ="d" value="Daily" name="daily" style="height:30px; width:50px " >
</th>
<!--$_POST['from']  <?php// echo $to; ?> <?php //echo $from; ?>-->
<th id="calmonthly">
<label>From: </label><input type="month" name="monthfrom" style="height:25px; width:180px" >
<label >To: </label><input type="month" name="monthto" style="height:25px; width:180px" >
<input type="submit" value="Monthly" name="monthly" style="height:30px; width:70px">
</th>

</tr> </table>

<script>
$(document).ready(function(){
  $("#calendar_tab").hide(); });
  
  $(document).ready(function(){
  $("#daily").click(function(){
    $("#calendar_tab").show();
    $("#calmonthly").hide();
    $("#caldaily").show();
  });

  $("#monthly").click(function(){
   $("#calendar_tab").show();
    $("#caldaily").hide();
    $("#calmonthly").show();
  });
});

</script>



<?php

if(isset($_POST['daily'])){
 // include('conn2.php');
  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $begin = new DateTime( $from );
  $end   = new DateTime( $to );

//echo $from."//".$to."/";


}

?>

</body>

</html>