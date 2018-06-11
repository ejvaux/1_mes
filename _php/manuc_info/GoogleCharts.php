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

<html xmlns:x="urn:schemas-microsoft-com:office:excel">
<head>
</head>
<body>
<table border='1px' id="myTable">
 <tr>
    <td><b>Hello World</b></td>
 </tr>
</table>
<a href="#" id="test" onClick="fnExcelReport();">download</download>

</body>
</html>


 <script>
function fnExcelReport() {
 var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
 tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';
 tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';
 tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
 tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';
 tab_text = tab_text + "<table border='1px'>";
 
//get table HTML code
 tab_text = tab_text + $('#myTable').html();
 tab_text = tab_text + '</table></body></html>';


var data_type = 'data:application/vnd.ms-excel';
 
 var ua = window.navigator.userAgent;
 var msie = ua.indexOf("MSIE ");
 //For IE
 if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
      if (window.navigator.msSaveBlob) {
      var blob = new Blob([tab_text], {type: "application/csv;charset=utf-8;"});
      navigator.msSaveBlob(blob, 'Test file.xls');
      }
 } 
//for Chrome and Firefox 
else {
 $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
 $('#test').attr('download', 'Test file.xls');
}

}


 </script>



