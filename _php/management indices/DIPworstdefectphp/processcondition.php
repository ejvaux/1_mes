<?php
if($line==='DIPL1' && $shift==='all')
{
$line_id='19';
$line='DIPL1';

include("processperlineoverall.php");


}
if($line==='DIPL2' && $shift==='all')
{
$line_id='20';
$line='DIPL2';

include("processperlineoverall.php");


}

if($line==='DIPL3' && $shift==='all')
{
$line_id='21';
$line='DIPL3';

include("processperlineoverall.php");


}

if($line==='OVERALL' && $shift==='all')
{

include("processoverall.php");


}




?>