<?php



include '1_MES_DB.php';

$id=$_GET['id'];

$sql="DELETE from MIS_PROD_PLAN_DL WHERE ID='$id'";

$result=$conn->query($sql);



Header("Location:manuc_info.php?");