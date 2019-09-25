
<?php

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
        data.addColumn('number', 'PLAN');
        data.addColumn('number', 'RESULT');

        for(i = 0; i < PLAN.length; i++)

    data.addRow([PLAN[i][0], parseInt(PLAN[i][1]), parseInt(RESULT[i]) ]);
  data.addRows(4);
       var options = {
         legend: {position: 'none'},
          title: '',
          vAxis: {minValue: 0, maxValue: 9},
          
        hAxis: {
                    textStyle : {
            fontSize:9 // or the number you want
        },
              title: '',
              format: 'h:mm a',
              viewWindow: {
                min: [0, 10, 0],
                max: [10, 10, 0]
              }},
                       seriesType:'bars',
                                      series: {
    0:{color:'#1e90ff'},
    1:{color:'#FF6347'}}
        };


           
            
      var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
      chart.draw(data, options);

       }
  
//=================================chart and table on another page======================

</script> <?php }?>




























































<?php 
 include('conn2.php');
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      $MACHINE_CODE=$_POST['MACHINE_CODE'];
     // $shift=$_POST['shift'];
      $dateplan_array = Array(); 
      $plan_array = Array();
      $input_array = Array();
      $result_array = Array();// create PHP array
      $date_array=Array();
      $defect_array=array();

if($MACHINE_CODE==='OVERALL')
{
include("ASSYphpfinal/ASSYoverall.php");
}


if ($MACHINE_CODE!='OVERALL') 
{
$MG=$_POST['MACHINE_CODE'];
  include("ASSYphpfinal/PERGROUPALLLINE/PERLINEGROUP.php");
}






?>
