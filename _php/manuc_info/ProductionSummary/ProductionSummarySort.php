<?php


include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$from=$_POST['sortingdatefrom'];
$to=$_POST['sortingdateto'];
$search=$_POST['search1'];
$sorttype=$_POST['sorttype'];
$chartType=$_POST['chartType'];

$link_sortfrom=$_GET['sortfrom'];
$link_sortto=$_GET['sortto'];
$link_sortfrom=$_GET['search'];



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


if ($sort1=="" && $search=="") {
	# code...


header("Location:./ProductionSummary.php");
}
else
{

header("Location:./ProductionSummary.php?sortfrom=".$datefrom."&sortto=".$dateto."&search=".$search."&sorttype=".$sorttype."&ChartType=".$chartType);

}





