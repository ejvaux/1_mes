<?php
//my sql php
$conn = mysqli_connect("localhost","root","","masterdatabase");
if(!$conn){die("Connection failed: ".mysqli_connect_error());}


///mssql barcodetag printing connection
$serverName="DATASRV2\PTPISQLSVR";
$connectionInfo=array('Database'=>'ProdOutput_db', "UID"=>"e.rubio", "PWD"=>"prima");


$conn2 = sqlsrv_connect($serverName,$connectionInfo);

if(!$conn2){echo "Connection failure</br>";}



$sql="SELECT * from LogTable";


$result=sqlsrv_query($conn2,$sql);

while($row=sqlsrv_fetch_array($result))
{

$temp_jo_barcode=$row['jo_barcode'];
$classify = substr($temp_jo_barcode, -5,-4); 
#echo $classify."<br>";
$packingNo;
if ($classify=="P") {
	# code...
	$packingNo = $row['danpla'];

}
elseif ($classify=="T") {
	# code...
	$packingNo = $row['jo_barcode'];
}


	$no=$row['Id'];
	$sql2="SELECT * from mis_product WHERE NO='$no'";
	$res2 = $conn->query($sql2);

//below codes is for avoid inserting of already saved data
	   if(!$row2=$res2->fetch_assoc())
	   {
	   ///no data fetch
	   	$no2 = $row['Id'];
	   	$jo_barcode=$row['jo_barcode'];
	   	$jo_no=$row['jo_num'];
	   	$print_date=$row['print_date'];
	   	$itemcode=$row['item_code'];
	   	$itemname=$row['item_name'];
	   	$custname=$row['customer_name'];
	   	$custcode=$row['customer_code'];
	   	//change the cust_code after eugne fix the column names
	   	$printqty=$row['print_qty'];
	   	$danpla=$row['danpla'];
	   	$actualqty=$row['actual_qty'];
	   	$toolnum=$row['tool_num'];
		$printedby=$row['printed_by'];
		$lotnum=$row['lot_num'];
		$machinecode=$row['machine_num'];


	   		$date1=date("Y-m-d",strtotime($row['date']));
	   	$sql3="INSERT INTO mis_product(NO, JO_BARCODE,JO_NUM,PRINT_DATE,ITEM_CODE,ITEM_NAME,CUST_NAME,PRINT_QTY,DANPLA,ACTUAL_QTY,TOOL_NUM,PACKING_NUMBER,PRINTED_BY,CUST_CODE,DATE_,LOT_NUM,MACHINE_CODE)
	   	VALUES('$no2','$jo_barcode','$jo_no','$print_date','$itemcode','$itemname','$custname','$printqty','$danpla','$actualqty','$toolnum','$packingNo','$printedby','$custcode', '$date1','$lotnum','$machinecode')";

	   	$res3 = $conn->query($sql3);

	   	echo "DATA SYNCED<br>";
	   
	   }
	   else
	   {
	   //data exists

	   }

}





#below code is for summarizing the log table
$sql4 ="SELECT DISTINCT(JO_NUM) from mis_product";
$res4 = $conn->query($sql4);

while ($row4=$res4->fetch_assoc()) {
	# code...

$jonum=$row4['JO_NUM'];
$sql5="SELECT SUM(PRINT_QTY) as prodresult FROM mis_product WHERE JO_NUM='$jonum'";
$result = $conn->query($sql5);
$row=$result->fetch_assoc(); 
$sum = $row['prodresult'];
#echo "<br>";



$sql6="SELECT * from MIS_SUMMARIZE_RESULTS WHERE JOB_ORDER_NO='$jonum'";
$result2=$conn->query($sql6);
$row2=$result2->fetch_assoc();
$summarize_jo_no=$row2['JOB_ORDER_NO'];

$query;
  if($summarize_jo_no==""){
	# code...
	# insertquery


	$sql7="INSERT INTO mis_summarize_results(JOB_ORDER_NO,PROD_RESULT) values('$jonum','$sum')";
	mysqli_query($conn, $sql7);
 #  echo "New record created successfully";
}
	
else{
#code...
#update query here

$sql7="update mis_summarize_results set JOB_ORDER_NO='$jonum',PROD_RESULT='$sum' WHERE JOB_ORDER_NO = '$summarize_jo_no'";
	mysqli_query($conn, $sql7);

#echo "updatequery1";	

}






}


$address=$_GET['address'];
header("Location: ".$address);




?>