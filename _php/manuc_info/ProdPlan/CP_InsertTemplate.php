<?php


include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$tempname=$_POST['tempname'];
$sql="INSERT INTO cp_templatelist(TemplateName) VALUES('$tempname')";

$result=$conn->query($sql);

if($result===TRUE)
{
    $x="true";
}
else
{
    $x="false";
}
echo json_encode($x,true);