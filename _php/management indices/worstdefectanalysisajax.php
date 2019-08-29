
<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><?php
function getColumn(){
  ?>


<a href=https://www.plus2net.com/php_tutorial/chart-column-database.php></a>

<script type="text/javascript" >

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
    
      function drawChart() {   

        // Create the data table.
        var data = new google.visualization.DataTable();
      
        data.addColumn('string', '');
        data.addColumn('number', 'DEFECT QTY');

        for(i = 0; i < DEFECTNAME.length; i++)

    data.addRow([DEFECTNAME[i], parseInt(DEFECTQTY[i]) ]);
  data.addRows(6);
       var options = {
         legend: {position: 'none'},
          title: 'Repair Status',
          vAxis: {minValue: 0, maxValue: 9},
           stacked: true,
        hAxis: {
              title: '',
              format: 'h:mm a',
              viewWindow: {
                min: [0, 30, 0],
                max: [10, 30, 0]
              }},
               series: {
    0:{color:'#1e90ff'},
    1:{color:'#FF6347'}}
        };


           
            
        var chart = new google.charts.Bar(document.getElementById('chart_div'));
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