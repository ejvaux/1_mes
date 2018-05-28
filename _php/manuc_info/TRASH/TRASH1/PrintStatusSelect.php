<html>

<head>
<!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel ="stylesheet" href="../css/manuc_info.css">
-->
	<link rel="stylesheet" type="text/css" href="manuc_info.css">
	<script type="text/javascript" src="Files/bootstrap.min.js"></script>
	<script type="text/javascript" src="Files/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Files/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="manuc_info.css">

</head>


<body>

<div class="container-fluid">

<div class="headertag">
    	<table style="text-align: center;">
    		
    		<tr>
    			<td><img src="http://reggie-pc/1_MES/_images/Info-icon.png" class="rounded" alt="Manufacturing Information" width="50" height="50"></td>
    			
    			<td><h1>Manufacturing Information</h1></td>
    		
    		</tr>

    	</table>
	</div>


	<div class="mod_menu">
		
		<div class="topnav" id="myTopnav">
		  <a href="./manuc_info.php" class="active">PRODUCTION PLAN VS RESULT</a>
		  <a href="ProductionSummary.php">PRODUCTION SUMMARY</a>
		  <a href="#contact">PRINT STATUS</a>
		  <a href="#about">PRODUCTION STOP</a>
		  <a href="ProductionSummary.php">CANCEL SELECTION</a>
		  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
		</div>

		<script>
		function myFunction() {
		    var x = document.getElementById("myTopnav");
		    
		    if (x.className === "topnav") 
		    {
		        x.className += " responsive";
		    }
		     else
		    {
		        x.className = "topnav";
		    }
								}
		</script>
	</div>


	<div id="sel1">
<div style="margin-bottom: 5px"><h1 style="text-align:center;">MANAGE INFORMATION</h1></div>

<?php

include '1_MES_DB.php';
$url=$_SERVER['REQUEST_URI'];

$strIndex=strrpos($url, "=");
$str=substr($url, $strIndex+1);
	

$sql = "SELECT * from 1_MES_DB WHERE ID='$str'";

$result=$conn->query($sql);

while ($row=$result->fetch_assoc()) {
	# code...



		echo "<div class='row'>";
		echo "<div class='col-sm-6' style='padding-top: 10px'>";
		echo "<table style='width: 100%'>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>NO:</b></td>";
		echo "<td><input type='text' name='NO' placeholder='NO' value='".$row['NO']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>DATE:</b></td>";
		echo "<td><input type='date' name='Date1' placeholder='Date' value='".$row['DATE_']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>J.O #:</b></td>";
		echo "<td><input type='text' name='JONo' placeholder='Job Order Number' value='".$row['JOB_ORDER_NO']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>ITEM CODE:</b></td>";
		echo "<td><input type='text' name='ItemCode' placeholder='Item Code' value='".$row['ITEM_CODE']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>ITEM NAME:</b></td>";
		echo "<td><input type='text' name='ItemName' placeholder='Item Name' value='".$row['ITEM_NAME']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>MACHINE CODE:</b></td>";
		echo "<td><input type='text' name='MachineCode' placeholder='Machine Code' value='".$row['MACHINE_CODE']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>MACHINE MAKER:</b></td>";
		echo "<td><input type='text' name='Machine Maker' placeholder='Machine Maker' value='".$row['MACHINE_MAKER']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>TONNAGE:</b></td>";
		echo "<td><input type='text' name='Tonnage' placeholder='Tonnage' value='".$row['TONNAGE']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "</table>";
		echo "</div>";
		echo "<div class='col-sm-6' style='padding-top: 10px'>";
		echo "<table style='width:100%'>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>MACHINE GROUP:</b></td>";
		echo "<td><input type='text' name='MachineGroup' placeholder='Machine Group' value='".$row['MACHINE_GROUP']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>TOOL NUMBER:</b></td>";
		echo "<td><input type='text' name='ToolNumber' placeholder='Tool Number' value='".$row['TOOL_NUMBER']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>PRIORITY:</b></td>";
		echo "<td><input type='text' name='Priority' placeholder='Priority' value='".$row['PRIORITY']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>PlAN QTY:</b></td>";
		echo "<td><input type='text' name='PlanQty' placeholder='Plan Quantity' value='".$row['PLAN_QTY']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>PROD RESULT:</b></td>";
		echo "<td><input type='text' name='ProdResult' placeholder='Production Result' value='".$row['PROD_RESULT']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>ACHIEVE RATE:</b></td>";
		echo "<td><input type='text' name='AchieveRate' placeholder='Achieve Rate' value='".$row['ACHIEVE_RATE']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<td style='text-align: right;padding-right: 5%'><b>DEFECT RATE:</b></td>";
		echo "<td><input type='text' name='DefectRate' placeholder='Defect Rate' value='".$row['DEFECT_RATE']."''></td>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "</div>";

		echo "<div class='Buttons' style='clear: both; text-align: center;'>";

		echo "<div class='row'>";
								
		echo "<div class='col-sm-6' style='padding-top: 10px'>";

		echo "<a href='planQtyVsResultUpdateDelete.php?id=".$str."&action=UPDATE' class='btn btn-success' id='btnSize'>UPDATE</a>";
								
		echo "</div>";

		echo "<div class='col-sm-6' style='padding-top: 10px'>";
		echo "<a href='planQtyVsResultUpdateDelete.php?id=".$str."&action=DELETE' class='btn btn-danger' id='btnSize'>DELETE</a>";
		echo "</div>";				 	
		echo "</div>"; 
		echo "</div>";


}


?>
		
<!-- End Div of Row -->


			



	</div>



</div>

</body>