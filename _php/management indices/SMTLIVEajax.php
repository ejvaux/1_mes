<?php 
 include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      //$to=date('Y-m-d',strtotime($_POST['to']));
      $line=$_POST['Linename'];$line1=$_POST['Linename1'];$line2=$_POST['Linename2'];
      $shift=$_POST['shift'];
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();// create PHP array
      $date_array=Array();
      $defect_array=array();


      $php_data_arrayy = Array(); 
      $job_arrayy = Array();
      $input_arrayy = Array();
      $result_arrayy = Array();// create PHP array
      $date_arrayy=Array();
      $defect_arrayy=array();


      $php_data_arrayyy = Array(); 
      $job_arrayyy = Array();
      $input_arrayyy = Array();
      $result_arrayyy = Array();// create PHP array
      $date_arrayyy=Array();
      $defect_arrayyy=array();
include ("smtphpfinal/smtline/SMTLIVEcondition.php");


?>
