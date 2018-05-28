<!DOCTYPE html>
<html>
<head>

	<!--  Session Check -->
        
	<?php
        
        session_start();
                
        if(!isset($_SESSION['myusername'])) {
          $log = "false";
        }
        
        else{
            $myusername = $_SESSION['myusername'];
            $text = ucwords(strtolower($myusername));
            $log = "true";
            }
                                
      ?>

	<title></title>
	  <link rel="icon" href="favicon.ico"/>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel ="stylesheet" href="http://reggie-pc/1_MES/css/manuc_info.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="/1_mes/_css/page.css">

<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	
	
	function getItemCode(strURL) 
	{		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('itemcode1').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}


</script>

</head>

<body>

	<!-- Navbar -->
	<nav class="navbar navbar-brdr navbar-expand-lg navbar-light bg-white fixed-top">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>                  
		</button>

		<a class="navbar-brand" href="http://primatechcorporation.com/">
			<div class="navbar">            
				<img class="img-fluid" src="/1_MES/_images/primatech-logo.png" alt="Primatech Logo"  >                        
			</div>
		</a>
					
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			<a class="nav-link" href="/1_MES/_php/portal.php">Portal <span class="sr-only">(current)</span></a>
			</li>
			<!-- <li class="nav-item">
			<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Dropdown
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Action</a>
				<a class="dropdown-item" href="#">Another action</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Something else here</a>
			</div>
			</li>
			<li class="nav-item">
			<a class="nav-link disabled" href="#">Disabled</a>
			</li> -->
		</ul>        
		</div>          
		<span class='navbar-text mr-2' id='usr' style='display: <?php if($log=="true"){echo "block";}else{echo "none";} ?>'>Hi! <?php echo $text; ?>.</span>
		<!-- Clock -->            
		<span class="navbar-text mr-2" id="clock"></span>
		
		<button class="btn btn-info p-1 my-2 my-sm-0" onclick="document.getElementById('id01').style.display='block'" id="lgin" style="display: <?php if($log=="true"){echo "none";}else{echo "block";} ?>" >Login</button>

		<a class="btn btn-info p-1 my-2 my-sm-0" onclick="return confirm('Are you sure? You want to log-out?');" id="lgout" style="display: <?php if($log=="true"){echo "block";}else{echo "none";} ?>" href='/1_mes/_php/logout.php' >Logout</a>

		<!-- <hr> -->

	</nav>               

	<!-- End of Navbar -->

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
		<div style="width: 100%;text-align: right">

				<div style="float: right;margin-left: 15px;margin-right: 5px;">
				<form action="PlanQtyVSResultSort.php" method="POST">
				SORT BY:<input type="date" name="sortingdate">
				<input type="submit" value="SORT">
				<a href="manuc_info.php">CANCEL SORT</a>
				</form>
				</div>

				<div style="float: right"><button id="myBtn">ADD NEW INFO</button></div>
	
			
		</div>
			
		<br><br>
				<!-- The Modal -->
				<div id="myModal" class="modal">

<form action="PlanQtyVSResult.php" method="POST">

					  <!-- Modal content -->
					  <div class="modal-content" style="margin-top: -50px">
					    <span class="close">&times;</span>
					    <p>

					    <div style="text-align: center;"><h1><b>ADD NEW INFORMATION</b></h1></div>
						    
						    <div class="row">
						 	
						 	<div class="col-sm-6" style="padding-top: 10px">

							 	<table style="width: 100%">
							 		<tr>
							 			<td style="text-align: right;padding-right: 5%"><b>NO:</b></td>
							 			<td><input type="text" name="NO" placeholder="NO"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>DATE:</b></td>
							 			<td><input type="date" name="Date1" placeholder="Date"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>J.O #:</b></td>
							 			<td><input type="text" name="JONo" placeholder="Job Order Number"></td>
							 		</tr>
							 		
							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

									<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>CUSTOMER NAME:</b></td>
							 			<td>
							 				<select name="CustomerName" style="width: 175px" id="CName" onChange="getItemCode('finditemcode.php?customercode='+this.value)">
							 					<option value="0" selected="true">--Select a Customer--</option>

							 					<?php
							 					include '1_MES_DB.php';
							 					$sql="SELECT CUSTOMER_CODE,CUSTOMER_NAME from DMC_customer ORDER BY CUSTOMER_NAME ASC";
							 					$result=$conn->query($sql);

							 					while ($row=$result->fetch_assoc()) {
							 						# code...
							 						echo "<option value='".$row['CUSTOMER_CODE']."'>".$row['CUSTOMER_NAME']."</option>";
							 					}

							 					?>
							 				</select>

							 				

							 			</td>


							 			</td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>ITEM CODE:</b></td>
							 			<td>



											<div id="itemcode1">
											<select name="itemcode2" onChange="getItemName('finditemname.php?itemcode='+this.value)">
												<option>--Select Item Code--</option>
										    </select>
										    </div>
												

							 				</select>
							 			</td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>ITEM NAME:</b></td>
							 			<td>
							 				<div id="itemname1">
							 				<input type="text" name="ItemName" placeholder="Item Name">
							 				</div>
							 			</td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td   style="text-align: right;padding-right: 5%"><b>MACHINE CODE:</b></td>
							 			<td><input type="text" name="MachineCode" placeholder="Machine Code"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td   style="text-align: right;padding-right: 5%"><b>MACHINE MAKER:</b></td>
							 			<td><input type="text" name="MachineMaker" placeholder="Machine Maker"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 	

							 	</table>
						 	</div>
						    

						    <div class="col-sm-6" style=" padding-top: 10px">

									<table style="width: 100%">

									<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>TONNAGE:</b></td>
							 			<td><input type="text" name="Tonnage" placeholder="Tonnage"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>	


							 		<tr>
							 			<td style="text-align: right;padding-right: 5%"><b>MACHINE GROUP:</b></td>
							 			<td><input type="text" name="MachineGroup" placeholder="Machine Group"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>TOOL NUMBER:</b></td>
							 			<td><input type="text" name="ToolNumber" placeholder="Tool Number"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>PRIORITY</b></td>
							 			<td><input type="text" name="Priority" placeholder="Priority"></td>
							 		</tr>
							 		
							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>PLAN QTY:</b></td>
							 			<td><input type="text" name="PlanQty" placeholder="Plan Quantity"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td  style="text-align: right;padding-right: 5%"><b>PROD RESULT:</b></td>
							 			<td><input type="text" name=" ProdResult" placeholder="Production Result"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td   style="text-align: right;padding-right: 5%"><b>ACHIEVE RATE:</b></td>
							 			<td><input type="text" name="AchieveRate" placeholder="Achieve Rate"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>

							 		<tr>
							 			<td   style="text-align: right;padding-right: 5%"><b>DEFECT RATE:</b></td>
							 			<td><input type="text" name="DefectRate" placeholder="Defect Rate"></td>
							 		</tr>

							 		<tr>
							 			<td>&nbsp</td>
							 		</tr>
							 		</table>
							</div>

						<div class="Buttons" style="clear: both; text-align: center;">

							<div class="row">
								
								<div class="col-sm-6" style="padding-top: 10px">
								<button type="submit" class="btn btn-success" id="btnSize" name="SAVE">SAVE</button>
								
								</div>

								<div class="col-sm-6" style="padding-top: 10px">
							    <span class="btn btn-danger" id="btnSize2">CANCEL</span>								
								</div>
						 	
						 	</div> 
						</div>
	

							</div>
		

					    </p>

					  </div>
</form>
				</div>
	
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
	
	<div class="table_content" style="font-size: 10px;overflow-x: auto;">
<table class="table table-hover">
    <thead style="background-color: #517abc; color:black;font-size: 12px;">
      <tr>
        <th   style="text-align: center;border: 1px solid #ddd;padding: 15px">NO</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">DATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">J.O. NO</th>
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


      		echo "<tr >";
      		echo "<td style='border: 1px solid #ddd;'>".$row['NO']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['DATE_']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['JOB_ORDER_NO']."</td>";
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

	</div>







</div>

	<script type="text/javascript">

		function showclock(){

			var date = new Date();

			//  Date
			var mm = date.getMonth();
			var dd = date.getDate();
			var yy = date.getFullYear();
			var d = date.getDay();

			//  Time
			var h = date.getHours();
			var m = date.getMinutes();
			var s = date.getSeconds();

			//  Formatting
			var monthNames = [
			"January", "February", "March",
			"April", "May", "June", "July",
			"August", "September", "October",
			"November", "December"
			];

			var day = [
			"Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"
			];

			var month = monthNames[mm];
			var ddate = dd >= 10 ? dd : "0"+ dd;
			var dy = day[d];
			var hr = h > 12 ?  h - 12 : h;
			var hour = hr < 10 ? "0" + hr : hr;
			var min = m < 10 ? "0"+m : m;
			var sec = s < 10 ? "0"+s : s;
			var mer = h > 12 ? "PM" : "AM";     

			// Clock
			var time = month + " " + ddate + ", " + yy + " | " + dy + " " + hour + ":" + min + ":" + sec + " " + mer;

			document.getElementById("clock").innerText = time;
			document.getElementById("clock").textContent = time;

			setTimeout(showclock,1000);

			}

			showclock();

	</script>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>