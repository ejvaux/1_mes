<?php


include '1_MES_DB.php';
$from=$_POST['sortingdatefrom'];
$to=$_POST['sortingdateto'];
$search=$_POST['search1'];
$PlanType=$_POST['PlanType'];

$link_sortfrom=$_GET['sortfrom'];
$link_sortto=$_GET['sortto'];



if ($from!="") 
{	# code...
	$sort1=date_create($from);
	$datefrom=date_format($sort1,"Y-m-d");
}
else
{
	$datefrom=$link_sortfrom;
}

if ($to!="") 
{	# code...
	$sort2=date_create($to);
	$dateto=date_format($sort2,"Y-m-d");
}
else
{
	$dateto=$link_sortto;
}





header("Location:./PrintStatus.php?sortfrom=".$datefrom."&sortto=".$dateto."&search=".$search."&PlanType=".$PlanType);







