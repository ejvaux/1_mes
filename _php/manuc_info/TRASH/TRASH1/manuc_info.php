<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="icon" href="favicon.ico"/>

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

	<div class="mod_options">
								

		<br>
		<div style="width: 100%;text-align: right;">
	<div class="form-group">
			
				<div style="float: right;">
				<form action="PlanQtyVSResultSort.php" method="POST">
					<table>
						<tr>
							<td><b>SORT BY:</b></td>
							<td><input type="date" name="sortingdate" class="form-control"></td>
							<td><input type="submit" value="SORT" class="btn btn-primary" style="background-color: #517abc"></td>
							<td><a href="manuc_info.php" class="btn btn-primary" style="background-color: #517abc" >CANCEL SORT</a></td>
						</tr>
					</table>


				
			
				</div>	
				</form>
				
				  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="background-color: #517abc">
				    ADD NEW INFO
				  </button>
				  &nbsp &nbsp
	</div>

		</div>
			
		<br>
				<!-- The Modal -->


					  <!-- Modal content -->
					   <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg" style="margin-top: -5%">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="height: 30%;text-align: center">
          <h4 class="modal-title">ADD NEW INFORMATION</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  <form action="PlanQtyVSResult.php" method="POST">
		        <!-- Modal body -->
        <div class="modal-body" style="font-size: 10px">
       	    
						    <div class="row">
						 	
						 	<div class="col-sm-6" style="padding-top: 10px">

							 	<table style="width: 100%">
							 		<tr>	
							 			<div class="form-group">
							 			<td style="text-align: right;padding-right: 5%"><b>NO:</b></td>
							 			<td>
							 				<input type="text" name="NO"  placeholder="NO" class="form-control" style="font-size: 10px">
							 			</td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>DATE:</b></td>
							 			<td><input type="date" name="Date1" placeholder="Date" class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>J.O #:</b></td>
							 			<td><input type="text" name="JONo" placeholder="Job Order Number"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>
							 		
							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

									<tr>
										<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>CUSTOMER NAME:</b></td>
							 			<td>
							 				<select name="CName" id="CName"  class="form-control" style="font-size: 10px;" >
					
											<option value=''>------- Select --------</option>

							 						<?php 

							 						include '1_MES_DB.php';

														$sql = "select distinct(CUSTOMER_NAME) from `dmc_customer` order by CUSTOMER_NAME";
														$res = mysqli_query($conn, $sql);
														if(mysqli_num_rows($res) > 0) {
															while($row = mysqli_fetch_object($res)) {
																echo "<option value='".$row->CUSTOMER_NAME."'>".$row->CUSTOMER_NAME."</option>";
															}
														}
													
													?>

							 				</select>

							 				

							 			</td>
							 			</div>


							 			</td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

									<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>CUSTOMER CODE:</b></td>
							 			<td>
											<select name="CCode" id="CCode"  class="form-control" style="font-size: 10px">
												<option value=''>------- Select --------</option>
										    </select>
										   
												

							 			</td>
							 		</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>
							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>ITEM CODE:</b></td>
							 			<td>
											<select name="ICode" id="ICode"  class="form-control" style="font-size: 10px">
												<option value=''>------- Select --------</option>
										    </select>
										   
												

							 			</td>
							 		</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>ITEM NAME:</b></td>
							 			<td>
							 			<select name="IName" id="IName"  class="form-control" style="font-size: 10px">
												<option value=''></option>
										    </select>	
										   
										   
							 			</td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td   style="text-align: right;padding-right: 5%"><b>MACHINE CODE:</b></td>
							 			<td><input type="text" name="MachineCode" placeholder="Machine Code"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 	

							 	

							 	</table>
						 	</div>
						    

						    <div class="col-sm-6" style=" padding-top: 10px">

									<table style="width: 100%">
									<tr>
							 			<div class="form-group">
							 			<td   style="text-align: right;padding-right: 5%"><b>MACHINE MAKER:</b></td>
							 			<td><input type="text" name="MachineMaker" placeholder="Machine Maker"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

									<tr>
										<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>TONNAGE:</b></td>
							 			<td><input type="text" name="Tonnage" placeholder="Tonnage"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>	


							 		<tr>
							 			<div class="form-group">
							 			<td style="text-align: right;padding-right: 5%"><b>MACHINE GROUP:</b></td>
							 			<td><input type="text" name="MachineGroup" placeholder="Machine Group"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>TOOL NUMBER:</b></td>
							 			<td><input type="text" name="ToolNumber" placeholder="Tool Number"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>PRIORITY</b></td>
							 			<td><input type="text" name="Priority" placeholder="Priority"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>
							 		
							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>PLAN QTY:</b></td>
							 			<td><input type="text" name="PlanQty" placeholder="Plan Quantity"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>PROD RESULT:</b></td>
							 			<td><input type="text" name=" ProdResult" placeholder="Production Result"  class="form-control" style="font-size: 10px">
							 			</td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td   style="text-align: right;padding-right: 5%"><b>ACHIEVE RATE:</b></td>
							 			<td><input type="text" name="AchieveRate" placeholder="Achieve Rate"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<div class="form-group">
							 			<td  style="text-align: right;padding-right: 5%"><b>DEFECT RATE:</b></td>
							 			<td><input type="text" name="DefectRate" placeholder="Defect Rate"  class="form-control" style="font-size: 10px"></td>
							 			</div>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>
							 		</table>
							</div>

					
	

	</div>




		
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
	<div class="Buttons" style="clear: both; text-align: center;width: 100%">

							<div class="row">
								
								<div class="col-sm-6" >
								<button type="submit" class="btn btn-success" id="btnSize3" name="SAVE" style="width: 150px">SAVE</button>
								</div>

									<div class="col-sm-6">
							  <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnSize3" style="width: 150px">CLOSE</button>
      								</div>

						 	
						 	</div> 

	</div>
		 </div>
        </form>
      </div>
    </div>
  </div>
  

				<!--End of Modal -->
	
				<script>
				// Get the modal
				var modal = document.getElementById('myModal');

				// Get the button that opens the modal
				var btn = document.getElementById("myBtn");
				var btn2 = document.getElementById("btnSize2");
				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks the button, open the modal 
				btn.onclick = function() {
				    modal.style.display = "block";
				}

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				    modal.style.display = "none";
				}

				btn2.onclick = function() {
				    modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				    if (event.target == modal) {
				        modal.style.display = "none";
				    }
				}
				</script>
	
	</div>
	<!-- table content style= overflow-x: auto; -->
	
	<div class="table_content" style="font-size: 10px;overflow-x: auto; overflow-y: visible;">
<table class="table table-hover">
    <thead style="background-color: #517abc; color:black;font-size: 12px;">
      <tr>
        <th   style="text-align: center;border: 1px solid #ddd;padding: 15px">NO</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px;">DATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">J.O. NO</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">CUSTOMER CODE</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">CUSTOMER NAME</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM CODE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM NAME</th>
        <th  style="text-align: center;border: 1px solid #ddd;">MACHINE CODE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">MACHINE MAKER</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">TONNAGE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">MACHINE GROUP</th>
        <th  style="text-align: center;border: 1px solid #ddd;">TOOL NUMBER</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">PRIORITY</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 10px">PLAN QTY</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PROD RESULT</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ACHIEVE RATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">DEFECT RATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">CONTROLS</th>
      
      </tr>
    </thead>
    <tbody>

      	<?php
      	include '1_MES_DB.php';

		$url=$_SERVER['REQUEST_URI'];

		$strIndex=strrpos($url, "=");
		$str=substr($url, $strIndex+1);

		if(strpos($url, 'sort=')!==false)
		{
      	
      	$sql="SELECT * from MIS_PROD_PLAN_DL WHERE DATE_='$str' order by DATE_ DESC";

		}

		else
		{
		      	$sql="SELECT * from MIS_PROD_PLAN_DL order by DATE_ DESC";

		}




      	$result=$conn->query($sql);

		while($row=$result->fetch_assoc())
      	{
      		$temp_date = date("d M Y",strtotime($row['DATE_']));

      		echo "<tr class='clickable-row' data-href='PlanVsResultSelect.php?id=".$row['ID']."'>";
      		

      		echo "<td style='border: 1px solid #ddd;'>".$row['NO']."</td>";
      		echo "<td style='border: 1px solid #ddd; font-size: 10px'>".$temp_date."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['JOB_ORDER_NO']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['CUSTOMER_CODE']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['CUSTOMER_NAME']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['ITEM_CODE']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['ITEM_NAME']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['MACHINE_CODE']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['MACHINE_MAKER']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['TONNAGE']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['MACHINE_GROUP']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['TOOL_NUMBER']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['PRIORITY']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['PLAN_QTY']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['PROD_RESULT']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['ACHIEVE_RATE']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['DEFECT_RATE']."</td>";
      		echo "<td style='border: 1px solid #ddd; text-align: center'><a href='PlanVsResultSelect.php?id=".$row['ID']."' style='font-size:12px;font-weight:bold;text-decoration: underline'>SELECT</a></td>";

      		echo "</tr>";


      	}


      	?>
      
    </tbody>
 </table>


<script>
	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
	</div>







</div>



<!-- jQuery first, then Popper.js, then Bootstrap JS -->


</body>
</html>