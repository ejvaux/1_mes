<?php


include '1_MES_DB.php';

$No=$_POST['NO'];
$SerialPrint=$_POST['SerialPrint'];
$ProdDate=$_POST['ProdDate'];
$ItemCode=$_POST['ItemCode'];
$ItemName=$_POST['ItemName'];
$Model=$_POST['Model'];
$PrintQty=$_POST['PrintQty'];
$ToolNumber=$_POST['ToolNumber'];
$PackagingNo=$_POST['PackagingNo'];
$PrintTime=$_POST['PrintTime'];
$PrintedBy=$_POST['PrintedBy'];

$sql="INSERT INTO 1_MES_DB(NO,SERIAL_PRINT,PROD_DATE,ITEM_CODE,ITEM_NAME,MODEL,PRINT_QTY,
	TOOL_NUMBER,PACKAGING_NUMBER,PRINT_TIME,PRINTED_BY) VALUES('$No','$SerialDate','$ProdDate','$ItemCode','$ItemName','$Model',
	'$PrintQty','$ToolNumber','$PackagingNo','$PrintTime','$PrintedBy')";

$result=$conn->query($sql);

