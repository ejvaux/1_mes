<?php


include '1_MES_DB.php';

$search=$_POST['search'];


if($search=="")
{
header("Location:./ProdPlanVsResult.php");

}
else
{

header("Location:./ProdPlanVsResult.php?search=".$search);

}



