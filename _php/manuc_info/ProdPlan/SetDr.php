<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$newdr = $_POST['newdr'];
$olddr=$_POST['olddr'];
$grname=$_POST['grname'];
$updatetype=$_POST['updatetype'];
$drdate=date("Y-m-d");

/* $sql2="SELECT dr_date from sap_dr WHERE dr_number='$newdr'";
$result2=$conn->query($sql2);
while($row=$result2->fetch_assoc())
{
    $drdate=$row['dr_date'];

if($updatetype=="dr")
{
    if($grname=="No group name")
    {
        $sql="UPDATE mis_dr_assigned SET dr_number='$newdr', dr_date='$drdate' WHERE dr_number='$olddr' AND group_name IS NULL";
    }
    else
    {
        $sql="UPDATE mis_dr_assigned SET dr_number='$newdr', dr_date='$drdate' WHERE dr_number='$olddr' AND group_name='$grname' ";

    }

}
else
{

    $sql="UPDATE mis_dr_assigned SET dr_number='$newdr', dr_date='$drdate' WHERE group_name='$grname'";
}

$result=$conn->query($sql);


$sql2="UPDATE mis_product SET SHIP_STATUS = 'SHIPPED' WHERE PACKING_NUMBER IN (SELECT packing_number from mis_dr_assigned WHERE dr_number='$newdr')";
$result2=$conn->query($sql2);

} */

if($updatetype=="dr")
{
    if($grname=="No group name")
    {
        $sql="UPDATE mis_dr_assigned SET dr_number='$newdr', dr_date='$drdate' WHERE dr_number='$olddr' AND group_name IS NULL";
    }
    else
    {
        $sql="UPDATE mis_dr_assigned SET dr_number='$newdr', dr_date='$drdate' WHERE dr_number='$olddr' AND group_name='$grname' ";

    }

}
else
{

    $sql="UPDATE mis_dr_assigned SET dr_number='$newdr', dr_date='$drdate' WHERE group_name='$grname'";
}
$result=$conn->query($sql);

/* $sql2="UPDATE mis_product SET SHIP_STATUS = 'SHIPPED' WHERE PACKING_NUMBER IN (SELECT packing_number from mis_dr_assigned WHERE dr_number='$newdr')";
$result2=$conn->query($sql2); */

$sql3="SELECT * FROM mis_dr_assigned WHERE  dr_number='$newdr' LIMIT 100";
$result3 = $conn->query($sql3);
while($row=$result3->fetch_assoc())
{
$sql2="UPDATE mis_product SET SHIP_STATUS = 'SHIPPED' 
WHERE PACKING_NUMBER = '".$row['packing_number']."' LIMIT 1";
$result2=$conn->query($sql2);
}




