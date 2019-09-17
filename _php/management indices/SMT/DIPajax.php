<?php 
 include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();
      $date_array=Array();
      $defect_array=array();


include("dipoverall.php");



?>
