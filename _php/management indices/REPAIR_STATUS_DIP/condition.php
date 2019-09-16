<?php
if($line==='DIPL1' && $shift==='all')
{
$line_id='19';
$line='DIPL1';

include("perlineoverall.php");


}
if($line==='DIPL2' && $shift==='all')
{
$line_id='20';
$line='DIPL2';

include("perlineoverall.php");


}

if($line==='DIPL3' && $shift==='all')
{
$line_id='21';
$line='DIPL3';

include("perlineoverall.php");


}

if($line==='OVERALL' && $shift==='all')
{

include("dipoverall.php");


}


?>