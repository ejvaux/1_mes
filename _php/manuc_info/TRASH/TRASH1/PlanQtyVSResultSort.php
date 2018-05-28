<?php


include '1_MES_DB.php';

$sort=$_POST['sortingdate'];

if($sort=="")
{
header("Location:./manuc_info.php");

}
else
{

header("Location:./manuc_info.php?sort=".$sort);

}



