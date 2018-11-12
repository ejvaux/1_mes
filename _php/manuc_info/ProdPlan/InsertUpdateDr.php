<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['text'];
$optiontype=$_POST['optionType'];
$groupname=$_POST['groupname'];

$sql4="SELECT ship_group_id FROM mis_temp_ship_group WHERE user_insert = '$user' ORDER BY ship_group_id DESC LIMIT 1";
$result4=$conn->query($sql4);
if($result4->num_rows > 0)
{

if($optiontype=="group")
{

    $sql="SELECT * FROM mis_temp_ship_group WHERE user_insert = '$user'";
    $result=$conn->query($sql);
    while($row =  $result->fetch_assoc())
    {
        $packingno = $row['packing_number'];
        $lotno=$row['lot_number'];
        $jo=$row['jo_number'];
        $itemcode=$row['item_code'];
        $machinecode=$row['machine_code'];
        $itemname=$row['item_name'];
        $customercode=$row['customer_code'];
        $customername=$row['customer_name'];
        $qty = $row['quantity'];
        $refno = $row['danpla_reference'];
        $datenow=date("Y-m-d");

        $sql2="INSERT INTO mis_dr_assigned(group_name,packing_number,lot_number,jo_number,item_code,machine_code,item_name,customer_code,customer_name,Date_Inserted,quantity,danpla_reference,user_ins)
        VALUES('$groupname','$packingno','$lotno','$jo','$itemcode','$machinecode','$itemname','$customercode','$customername','$datenow','$qty','$refno','$user')";
        $result2=$conn->query($sql2);

    }

$sql3="DELETE FROM mis_temp_ship_group WHERE user_insert = '$user'";
$result3=$conn->query($sql3);

}//end of if optionType==group

else
{

    $sql="SELECT * FROM mis_temp_ship_group WHERE user_insert = '$user'";
    $result=$conn->query($sql);
    while($row =  $result->fetch_assoc())
    {
        $packingno = $row['packing_number'];
        $lotno=$row['lot_number'];
        $jo=$row['jo_number'];
        $itemcode=$row['item_code'];
        $machinecode=$row['machine_code'];
        $itemname=$row['item_name'];
        $datenow=date("Y-m-d");
        $customercode=$row['customer_code'];
        $customername=$row['customer_name'];
        $qty = $row['quantity'];
        $refno = $row['danpla_reference'];
        $sql2="INSERT INTO mis_dr_assigned(dr_number,packing_number,lot_number,jo_number,item_code,machine_code,item_name,dr_date,customer_code,customer_name,Date_Inserted,quantity,danpla_reference,user_ins)
        VALUES('$groupname','$packingno','$lotno','$jo','$itemcode','$machinecode','$itemname','$datenow','$customercode','$customername','$datenow','$qty','$refno','$user')";
        $result2=$conn->query($sql2);

        $sql4="UPDATE mis_product SET SHIP_STATUS = 'SHIPPED' WHERE PACKING_NUMBER IN (SELECT packing_number from mis_dr_assigned WHERE dr_number='$groupname')";
        $result4=$conn->query($sql4);




    }

$sql3="DELETE FROM mis_temp_ship_group WHERE user_insert = '$user'";
$result3=$conn->query($sql3);



}

}
else
{
    echo "nodata";
}




?>