<?php
$d1=strtotime($_POST['from']);
$time1=strtotime("06:00am");
$shift1start=date("Y-m-d", $d1) . " ".date("H:i:s", $time1);
echo $shift1start."<br>";

$d2=strtotime($_POST['to']);
$time2=strtotime("6:00pm");
$shift1end=date("Y-m-d", $d2) . " ".date("H:i:s", $time2);


echo $shift1end."<br><br>";


$dfrom=strtotime($_POST['from']);
echo date("Y-m-d h:i:sa", $dfrom) . "<br>";

$dto=strtotime($_POST['to']);
echo date("Y-m-d h:i:sa", $dto) . "<br>";



?>