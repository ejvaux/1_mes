
<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><?php
function getColumn(){
  ?>


<a href=https://www.plus2net.com/php_tutorial/chart-column-database.php></a>

<script type="text/javascript" >

      // Load the Visualization API and the corechart package.
      google.load('visualization', '1', {'packages':['corechart']});
       google.setOnLoadCallback(drawChart);
    
      function drawChart() {   

        // Create the data table.
        var data = new google.visualization.DataTable();
      
        data.addColumn('string', '');
        data.addColumn('number', 'DEFECT QTY');
        data.addColumn('number', 'ACCUMULATIVE RATE %');
        for(i = 0; i < DEFECTNAME.length; i++)

    data.addRow([DEFECTNAME[i], parseInt(DEFECTQTY[i]),parseFloat(ACCUMULATIVE[i].toFixed(2)) ]);
  data.addRows(2);
  var options = {
    vAxes: [{ 0: {format: '#,###'}, 1: {format: '#%'} }],
        title: '',
        seriesType:'bars',
                       series: {
    0:{color:'#1e90ff',targetAxisIndex: 0,},
    1:{type: 'line',targetAxisIndex: 1,}}
//        width: 800,
//        height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }


           
            
       
  
//=================================chart and table on another page======================

</script> <?php }?>




































<?php 

include('conn2.php');
 $from=date('Y-m-d H-i-s',strtotime($_POST['from'].'06:00:00'));
      $toresult=date('Y-m-d',strtotime($_POST['to']));
      $to=date('Y-m-d H-i-s',strtotime($_POST['to'].'+1 days'.'05:59:59'));
      $line=$_POST['Linename'];
//      $shift=$_POST['shift'];
$defectqty_array=array();
$defectname_array=array();
$accumulated_rate_array=array();
$result_array=array();
$shift='all';

 $f=date('Y-m-d',strtotime($_POST['from']));
 $t=date('Y-m-d',strtotime($_POST['to'].'+1 day'));


$process_id=$_POST['process'];
if ($process_id==='AOI') {
  $process_id='5';   
include ("worstdefectphp/condition.php");

}
if ($process_id==='FUNCTION TEST') {
  $process_id='6';  
include ("worstdefectphp/condition.php");

}
if ($process_id==='FVI') {
  $process_id='7'; 
include ("worstdefectphp/condition.php");

}
if ($process_id==='VI AFTER REFLOW') {
  $process_id='9'; 
include ("worstdefectphp/condition.php");

}
if ($process_id==='VI BEFORE REFLOW') {
  $process_id='10'; 
include ("worstdefectphp/condition.php");

}
if ($process_id==='X RAY') {
  $process_id='11'; 
include ("worstdefectphp/condition.php");

}
if ($process_id==='FVI2') {
  $process_id='66'; 
include ("worstdefectphp/condition.php");

}
if ($process_id==='OVERALL') {
include ("worstdefectphp/processcondition.php");

}











           





?>