<?php

#(localdb)\MSSQLLocalDB
$serverName="DATASRV2\PTPISQLSVR";
$connectionInfo=array('Database'=>'ProdOutput_db', "UID"=>"e.rubio", "PWD"=>"prima");

$conn = sqlsrv_connect($serverName,$connectionInfo);


#$dsn = "sqlsrv:Server=DATASRV2\PTPISQLSVR;Database=ProdOutput_db";
#$conn = new PDO($dsn, "e.rubio", "prima");
#$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

if($conn)
{

}
else
{
	echo "Connection failure</br>";
}



