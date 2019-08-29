
<?php

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
        data.addColumn('number', 'PLAN');
        data.addColumn('number', 'RESULT');

        for(i = 0; i < PLAN.length; i++)

    data.addRow([PLAN[i][0], parseInt(PLAN[i][1]), parseInt(RESULT[i]) ]);
  data.addRows(4);
       var options = {
         legend: {position: 'none'},
          title: 'Production Summary',
          vAxis: {minValue: 0, maxValue: 9},
           isStacked: true,
        hAxis: {
              title: '',
              format: 'h:mm a',
              viewWindow: {
                min: [0, 10, 0],
                max: [10, 10, 0]
              }},
        };


           
            
        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);

       }
  
//=================================chart and table on another page======================

</script> <?php }?>




























































<?php 
 include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      $line=$_POST['Linename'];
      $shift=$_POST['shift'];
      $php_data_array = Array(); 
      $job_array = Array();
      $input_array = Array();
      $result_array = Array();// create PHP array
      $date_array=Array();
      $defect_array=array();

if($line==='OVERALL' && $shift==='ALL')
{
include("smtphpfinal/smtoverall.php");
}
if($line==='OVERALL' && $shift==='1')
{
include("smtphpfinal/smtoverallday.php");
}

if($line==='OVERALL' && $shift==='2')
{
include("smtphpfinal/smtoverallnight.php");
}



include ("smtphpfinal/smtline/condition.php");




?>
