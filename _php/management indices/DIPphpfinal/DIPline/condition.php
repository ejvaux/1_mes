<?php
if($line==='DIPL1' && $shift==='ALL')
{
$line_id='19';
$line='DIPL1';

include("perlineoverall.php");


}
if($line==='DIPL2' && $shift==='ALL')
{
$line_id='20';
$line='DIPL2';

include("perlineoverall.php");


}

// if($line==='DIPL3' && $shift==='ALL')
// {
// $line_id='21';
// $line='DIPL3';

// include("perlineoverall.php");


// }
























//////SMT PER LINE DAY SHIFT [1]


if($line==='DIPL1' && $shift==='1')
{
$line_id='19';
$line='DIPL1';
$shift='1';
include("perlineday.php");


}
if($line==='DIPL2' && $shift==='1')
{
$line_id='20';
$line='DIPL2';
$shift='1';
include("perlineday.php");


}

// if($line==='DIPL3' && $shift==='1')
// {
// $line_id='21';
// $line='DIPL3';$shift='1';

// include("perlineday.php");


// }





















//////SMT PER LINE DAY SHIFT [2]


if($line==='DIPL1' && $shift==='2')
{
$line_id='19';
$line='DIPL1';
$shift='2';
include("perlinenight.php");


}
if($line==='DIPL2' && $shift==='2')
{
$line_id='20';
$line='DIPL2';
$shift='2';
include("perlinenight.php");


}

// if($line==='DIPL3' && $shift==='2')
// {
// $line_id='3';
// $line='DIPL3';
// $shift='2';

// include("perlinenight.php");


// }




?>