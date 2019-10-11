<?php 
 include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));


      $code1_array = Array();
      $code11_array = Array();
      $code111_array = Array();
      


include("smt.php");



?>
