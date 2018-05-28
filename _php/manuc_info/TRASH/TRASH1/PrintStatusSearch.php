<?php


include '1_MES_DB.php';

$search=$_POST['search'];


if($search=="")
{
header("Location:./PrintStatus.php");

}
else
{

header("Location:./PrintStatus.php?search=".$search);

}



