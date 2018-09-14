<?php


$conn = mysqli_connect("localhost","root","","masterdatabase");
if(!$conn)
{

die("Connection failed: ".mysqli_connect_error());

}
