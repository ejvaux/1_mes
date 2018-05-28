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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<form>
<input type="button" value="Print this page" onClick="window.print()" class="hide-from-printer"> 
</form>

<table class='table table-striped table-hover table-bordered' style="text-align:center">
    <thead style=" color:black;font-size: 12px;">
      <tr>
        <th   style="text-align: center;border: 1px solid #ddd;padding: 15px">NO</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">SERIAL PRINT</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">PROD DATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM CODE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM NAME</th>
        <th  style="text-align: center;border: 1px solid #ddd;">MODEL</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PRINT QTY</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">TOOL NUMBER</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PACKAGING NUMBER</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PRINT TIME</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">PRINTED BY</th>
        <th  style="text-align: center;border: 1px solid #ddd;" class="hide-from-printer" >CONTROLS</th>
      
      </tr>
    </thead>
    <tbody>

      	<?php

        include 'ProdOutput_db.php';

		$url=$_SERVER['REQUEST_URI'];

		$strIndex=strrpos($url, "=");
		$str=substr($url, $strIndex+1);

		if(strpos($url, 'sort=')!==false)
		{
     
      	 
      	$sql="SELECT * from LogTable WHERE date='$str' order by print_date ASC";

		}
    elseif (strpos($url,'search=')!==false) {
      # code...
          $sql="SELECT * from LogTable WHERE date LIKE '%$str%' or item_code LIKE '%$str%' or item_name LIKE '%$str%'
            or tool_num LIKE '%$str%' order by print_date ASC";

    }

		else
		{
		      	$sql="SELECT * from LogTable order by print_date DESC";


		}

$result=sqlsrv_query($conn,$sql);
      	
  



		while($row=sqlsrv_fetch_array($result))
      	{
            $conn2 = mysqli_connect("localhost","root","","masterdatabase");


          if(!$conn2)
          {

          die("Connection failed: ".mysqli_connect_error());

          }

          $current_item_code=$row['item_code'];

          $sql2="SELECT * FROM dmc_item_list WHERE ITEM_CODE='$current_item_code'";
          $res2 = $conn2->query($sql2);



      		echo "<tr >";
      		echo "<td style='border: 1px solid #ddd;'>".$row['Id']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>"."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['print_date']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['item_code']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['item_name']."</td>";
          if(!$row2=$res2->fetch_assoc()){

          echo "<td style='border: 1px solid #ddd;'>"."</td>";
          }
          else
          {

          echo "<td style='border: 1px solid #ddd;'>".$row2['MODEL']."</td>";
          }

      		echo "<td style='border: 1px solid #ddd;'>".$row['print_qty']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['tool_num']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>"."</td>";
      		echo "<td style='border: 1px solid #ddd;'>".$row['print_date']."</td>";
      		echo "<td style='border: 1px solid #ddd;'>"."</td>";
      		echo "<td style='border: 1px solid #ddd;' class='hide-from-printer'><a href='ProductionSummarySelect.php?id=".$row['Id']."'>SELECT</a></td>";

      		echo "</tr>";


      	}


      	?>
     
    </tbody>
 </table>




</body>
</html>