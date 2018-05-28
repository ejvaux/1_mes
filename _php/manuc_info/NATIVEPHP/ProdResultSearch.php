<?php


include '1_MES_DB.php';

$search=$_POST['search'];


if($search=="")
{
header("Location:./ProdResult.php");

}
else
{

header("Location:./ProdResult.php?search=".$search);

}



