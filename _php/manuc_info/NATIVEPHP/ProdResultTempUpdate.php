<?php

include '1_MES_DB.php';
session_start();
$id=$_SESSION["planvsresultid"];
$jo=$_POST["joborder"];

if (isset($_POST['sub'])) {
	# code...

$sql="UPDATE mis_prod_plan_dl SET JOB_ORDER_NO='$jo' WHERE ID='$id'";
$result=$conn->query($sql);

header("Location: ProdPlanVsResult.php");
}
?>