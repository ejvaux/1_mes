<?php

include '1_MES_DB.php';


$No=$_POST['NO'];
$Date=$_POST['Date1'];
$Jo=$_POST['JONo'];
$ItemCode=$_POST['ICode'];
$ItemName=$_POST['IName'];
$MachineCode=$_POST['MachineCode'];
$MachineMaker=$_POST['MachineMaker'];
$Tonnage=$_POST['Tonnage'];
$MachineGroup=$_POST['MachineGroup'];
$ToolNumber=$_POST['ToolNumber'];
$Priority=$_POST['Priority'];
$PlanQty=$_POST['PlanQty'];
$ProdResult=$_POST['ProdResult'];
$AchieveRate=$_POST['AchieveRate'];
$DefectRate=$_POST['DefectRate'];
$CustomerName=$_POST['CName'];
$CustomerCode=$_POST['CCode'];


if (isset($_POST['SAVE']))
 	 {
$sql="INSERT INTO MIS_PROD_PLAN_DL(NO,DATE_,JOB_ORDER_NO,ITEM_CODE,ITEM_NAME,MACHINE_CODE,MACHINE_MAKER,TONNAGE,MACHINE_GROUP,
	TOOL_NUMBER,PRIORITY,PLAN_QTY,PROD_RESULT,ACHIEVE_RATE,DEFECT_RATE,CUSTOMER_NAME,CUSTOMER_CODE) VALUES('$No','$Date','$Jo','$ItemCode','$ItemName','$MachineCode',
	'$MachineMaker','$Tonnage','$MachineGroup','$ToolNumber',
	'$Priority','$PlanQty','$ProdResult','$AchieveRate','$DefectRate','$CustomerName','$CustomerCode')";

$result=$conn->query($sql);

header("Location: manuc_info.php");

 	 }













