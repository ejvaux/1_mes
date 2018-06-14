<!-- <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
         ['2004/05',  165,      938,         522,             998,           450,      614.6],
         ['2005/06',  135,      1120,        599,             1268,          288,      682],
         ['2006/07',  157,      1167,        587,             807,           397,      623],
         ['2007/08',  139,      1110,        615,             968,           215,      609.4],
         ['2008/09',  136,      691,         629,             1026,          366,      569.6]
      ]);

    var options = {
      title : 'Monthly Coffee Production by Country',
      vAxis: {title: 'Cups'},
      hAxis: {title: 'Month'},
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html> -->

<!-- 
$datenow = date("Y-m-d");
$dateminus= date('Y-m-d', strtotime('-2 day',strtotime($datenow)));
echo $datenow;
echo "<br>";
echo $dateminus;
 -->

 <?php


/* require_once  $_SERVER['DOCUMENT_ROOT'].'/1_mes/_includes/phpexcel/Classes/PHPExcel.php';
$excel = new PHPExcel();
$filename="ProductionSummary~".date("Y")."".date("F")."".date("d").".xlsx";
$excel  ->setActiveSheetIndex(0)
        ->setCellValue('A1','Hello')
        ->setCellValue('B1','World');
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        
        ob_clean();
        flush(); 
        $objWriter->save('php://output');

        exit; */

echo date("Y-m-d");

?>




