<?php

#(localdb)\MSSQLLocalDB
$serverName="SAPSERVER";
$connectionInfo=array('Database'=>'PTPI_GOLIVE', "UID"=>"user1", "PWD"=>"P@sswordAdmin");

$SAPconn = sqlsrv_connect($serverName,$connectionInfo);


#$dsn = "sqlsrv:Server=DATASRV2\PTPISQLSVR;Database=ProdOutput_db";
#$conn = new PDO($dsn, "e.rubio", "prima");
#$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

if($SAPconn)
{
echo "Connection Successfully</br>";
}
else
{
	echo "Connection failure</br>";
}



