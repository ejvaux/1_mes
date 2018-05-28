<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel ="stylesheet" href="http://reggie-pc/1_MES/css/manuc_info.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/1_mes/_css/page.css">

<?php
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/logcheck.php";    
    ?>


<script>

$(document).ready(function() {


	//Change in continent dropdown list will trigger this function and
	//generate dropdown options for county dropdown
	$(document).on('change','#CName', function() {
		var CUSTOMER_CODE = $(this).val();
		if(CUSTOMER_CODE != "") {
			$.ajax({
				url:"find.php",
				type:'POST',
				data:{CUSTOMER_CODE:CUSTOMER_CODE},
				success:function(response) {
					//var resp = $.trim(response);
					if(response != '') {
						$("#CCode").removeAttr('disabled','disabled').html(response);
						} else {
						$("#CCode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
					}
				}
			});
		} else {
			$("#CCode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
	});

	$(document).on('change','#CCode', function() {
		var CUSTOMER_CODE1 = $(this).val();
		if(CUSTOMER_CODE1 != "") {
			$.ajax({
				url:"find.php",
				type:'POST',
				data:{CUSTOMER_CODE1:CUSTOMER_CODE1},
				success:function(response) {
					//var resp = $.trim(response);
					if(response != '') {
						$("#ICode").removeAttr('disabled','disabled').html(response);
						} else {
						$("#ICode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
					}
				}
			});
		} else {
			$("#ICode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
	});


	//Change in coutry dropdown list will trigger this function and
	//generate dropdown options for state dropdown

$(document).on('change','#ICode', function() {
		var ITEM_CODE = $(this).val();
		if(ITEM_CODE != "") {
			$.ajax({
				url:"find.php",
				type:'POST',
				data:{ITEM_CODE:ITEM_CODE},
				success:function(response) {
					//var resp = $.trim(response);
					if(response != '') {
						$("#IName").removeAttr('disabled','disabled').html(response);
						} else {
						$("#IName").attr('disabled','disabled').html("<option value=''></option>");
					}
				}
			});
		} else {
			$("#IName").attr('disabled','disabled').html("<option value=''></option>");
		}
	});




});

</script>


</head>


<body>
  <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
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
		  <a href="javascript: history.go(-1)">CANCEL SELECTION</a>
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

<br>

	<div class="sel1">
<div style="margin-bottom: 5px"><h1 style="text-align:center;">MANAGE INFORMATION</h1></div>

<script type="text/javascript">
<!--
var frm = document.getElementById('frm');
function onSubmit(){
    return true;
}

function updatemsg(){
    alert('Are you sure you wawnt to UPDATE this data? ');
    frm.submit();
}

function deletemsg(){
    alert('Are you sure you want to DELETE this data?');
	frm.submit();
}
 //-->
 </script>

<?php

include '1_MES_DB.php';
$url=$_SERVER['REQUEST_URI'];

$strIndex=strrpos($url, "=");
$str=substr($url, $strIndex+1);
	

$sql = "SELECT * from MIS_PROD_PLAN_DL WHERE ID='$str'";

$result=$conn->query($sql);


while ($row=$result->fetch_assoc()) {
	# code...


		echo "<form action='planQtyVsResultUpdateDelete.php?id=".$str."' method='POST' id='frm' onsubmit='return onSubmit();'>";
		echo "<div class='row'>";
		echo "<div class='col-sm-6' style='padding-top: 10px'>";
		echo "<table style='width: 100%'>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>NO:</b></td>";
		echo "<td><input type='text' name='NO' placeholder='NO' value='".$row['NO']."'class='form-control' style='font-size: 10px'></td>";
		echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>DATE:</b></td>";
		echo "<td><input type='date' name='Date1' placeholder='Date' value='".$row['DATE_']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>J.O #:</b></td>";
		echo "<td><input type='text' name='JONo' placeholder='Job Order Number' value='".$row['JOB_ORDER_NO']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>CUSTOMER NAME:</b></td>";
		echo "<td><select name='CName' id='CName'  class='form-control' style='font-size: 10px;' >";
		echo "<option value='".$row['CUSTOMER_NAME']."'>".$row['CUSTOMER_NAME']."</option>";
			

			$conn2 = mysqli_connect("localhost","root","","masterdatabase");


			if(!$conn2)
			{

			die("Connection failed: ".mysqli_connect_error());

			}
			$sql2 = "select distinct(CUSTOMER_NAME) from `dmc_customer`";
			$res2 = mysqli_query($conn2, $sql2);
			if(mysqli_num_rows($res2) > 0) {
				while($row2 = mysqli_fetch_object($res2)) {
					echo "<option value='".$row2->CUSTOMER_NAME."'>".$row2->CUSTOMER_NAME."</option>";
				}
			}
													
		echo "</select>";											
		echo "</td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>CUSTOMER CODE:</b></td>";
		echo "<td><select name='CCode' id='CCode'  class='form-control' style='font-size: 10px;' >";
		echo "<option value='".$row['CUSTOMER_CODE']."''>".$row['CUSTOMER_CODE']."</option>";
		echo "</select>";
		echo "</td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>ITEM CODE:</b></td>";
	echo "<td><select name='ICode' id='ICode'  class='form-control' style='font-size: 10px;' >";
		echo "<option value='".$row['ITEM_CODE']."'>".$row['ITEM_CODE']."</option>";
		echo "</select>";
		echo "</td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>ITEM NAME:</b></td>";
	echo "<td><select name='IName' id='IName'  class='form-control' style='font-size: 10px;' >";
		echo "<option value='".$row['ITEM_NAME']."'>".$row['ITEM_NAME']."</option>";
		echo "</select>";
		echo "</td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>MACHINE CODE:</b></td>";
		echo "<td><input type='text' name='MachineCode' placeholder='Machine Code' value='".$row['MACHINE_CODE']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
	
			
		echo "</table>";
		echo "</div>";

		echo "<div class='col-sm-6' style='padding-top: 10px;'>";
		echo "<table style='width:95%;'>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>MACHINE MAKER:</b></td>";
		echo "<td><input type='text' name='MachineMaker' placeholder='Machine Maker' value='".$row['MACHINE_MAKER']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>TONNAGE:</b></td>";
		echo "<td><input type='text' name='Tonnage' placeholder='Tonnage' value='".$row['TONNAGE']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>MACHINE GROUP:</b></td>";
		echo "<td><input type='text' name='MachineGroup' placeholder='Machine Group' value='".$row['MACHINE_GROUP']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>TOOL NUMBER:</b></td>";
		echo "<td><input type='text' name='ToolNumber' placeholder='Tool Number' value='".$row['TOOL_NUMBER']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>PRIORITY:</b></td>";
		echo "<td><input type='text' name='Priority' placeholder='Priority' value='".$row['PRIORITY']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>PLAN QTY:</b></td>";
		echo "<td><input type='text' name='PlanQty' placeholder='Plan Quantity' value='".$row['PLAN_QTY']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>PROD RESULT:</b></td>";
		echo "<td><input type='text' name='ProdResult' placeholder='Production Result' value='".$row['PROD_RESULT']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>ACHIEVE RATE:</b></td>";
		echo "<td><input type='text' name='AchieveRate' placeholder='Achieve Rate' value='".$row['ACHIEVE_RATE']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "<tr>";
		echo "<div class='form-group'>";
		echo "<td style='text-align: right;padding-right: 5%'><b>DEFECT RATE:</b></td>";
		echo "<td><input type='text' name='DefectRate' placeholder='Defect Rate' value='".$row['DEFECT_RATE']."'class='form-control' style='font-size: 10px'></td>";
				echo "</div>";
		echo "</tr><tr><td>&nbsp</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "</div>";

		echo "<div class='Buttons' style='clear: both; text-align: center; padding-bottom: 2%'>";

		echo "<div class='row'>";
								
		echo "<div class='col-sm-6' style='padding-top: 10px'>";

		echo "<input type='submit' name='UPDATE1' class='btn btn-success' id='btnSize' value='UPDATE' onclick='updatemsg();' >";
								
		echo "</div>";

		echo "<div class='col-sm-6' style='padding-top: 10px'>";
		echo "<input type='submit' name='DELETE1' class='btn btn-danger' id='btnSize' value='DELETE' onclick='deletemsg();'>";
		echo "</div>";				 	
		echo "</div>"; 
		echo "</div>";
echo "</form>";

}


?>
		
<!-- End Div of Row -->


			



	</div>





</div>






</body>