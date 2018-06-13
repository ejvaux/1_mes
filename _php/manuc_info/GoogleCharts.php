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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.2.5/css/tableexport.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdn.rawgit.com/eligrey/FileSaver.js/e9d941381475b5df8b7d7691013401e171014e89/FileSaver.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.5/js/tableexport.min.js"></script>

<style>

table ,tr td{
    border:1px solid red
}
tbody {
    display:block;
    height:450px;
    overflow:auto;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;/* even columns width , fix width of table too*/
}
thead {
    width: calc( 100% - 1em )/* scrollbar is average 1em/16px width, remove it from thead width */
}
.btn-toolbar {
     margin-left: 0px;
}
</style>


</head>
<body>
<div class="tbl_container1">
		<table id="listing" class="table table-bordered table table-hover" cellspacing="0" width="100%">
			<colgroup><col><col><col></colgroup>
			<thead>
				<tr>
					<tr>
						<th>Name</th>
						<th >Salary</th>
						<th>Age</th>
					</tr>
				</tr>
			</thead>
			<tbody id="emp_body">
			</tbody>
		</table>
	</div>

</body>
</html>


<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
		url: "http://dummy.restapiexample.com/api/v1/employees",
		async: true,
		dataType: 'json',
		success: function (data) {
			var tr;
			for (var i = 0; i < data.length; i++) {
				tr = $('<tr/>');
				tr.append("<td>" + data[i].employee_name + "</td>");
				tr.append("<td>" + data[i].employee_salary + "</td>");
				tr.append("<td>" + data[i].employee_age + "</td>");
				$('#emp_body').append(tr);
			}
			ExportTable();
		}
	});
});

$(document).ready(function(){
	function ExportTable(){
				$("table").tableExport({
				headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
				footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
				formats: ["xls", "csv", "txt"],    // (String[]), filetypes for the export
				fileName: "id",                    // (id, String), filename for the downloaded file
				bootstrap: true,                   // (Boolean), style buttons using bootstrap
				position: "well" ,                // (top, bottom), position of the caption element relative to table
				ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file
				ignoreCols: null,                 // (Number, Number[]), column indices to exclude from the exported file
				ignoreCSS: ".tableexport-ignore"   // (selector, selector[]), selector(s) to exclude from the exported file
			});
			}
});
 </script>



