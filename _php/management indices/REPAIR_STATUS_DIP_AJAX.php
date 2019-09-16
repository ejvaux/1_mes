<script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        data.addColumn('number', 'REPAIR');
        data.addColumn('number', 'UNREPAIR');

        for(i = 0; i < REPAIRED.length; i++)

    data.addRow([DATE_[i], parseInt(REPAIRED[i]), parseInt(UNREPAIRED[i]) ]);
  data.addRows(6);
       var options = {
         legend: {position: 'none'},
          vAxis: {minValue: 0, maxValue: 9},
           
      height: 340,  //theme: 'maximized',
    hAxis : { 
        textStyle : {
            fontSize: 9 , bold: true, // or the number you want
        },


              title: '',
              format: 'h:mm a',
              viewWindow: {
                min: [0, 30, 0],
                max: [10, 30, 0]
              }},
         seriesType:'bars',
isStacked: true,
               series: {
    0:{color:'#1e90ff'},
    1:{color:'#FF6347'}}
        };


           
            
      var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
      chart.draw(data, options);

       }
  
//=================================chart and table on another page======================

</script> <?php } ?>






<?php 







include('conn2.php');



      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      $line=$_POST['Linename'];
//      $shift=$_POST['shift'];
      $date_array=array();
      $unrepair_array=array();
      $repair_array=array();
 $repaired_array=array();

$shift='all';
include ("REPAIR_STATUS_DIP/condition.php");






?>


