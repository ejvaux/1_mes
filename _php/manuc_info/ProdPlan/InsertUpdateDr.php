<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$optiontype=$_POST['optionType'];
$groupname=$_POST['groupname'];
if($optiontype=="group")
{

    $sql="SELECT * FROM mis_temp_ship_group";
    $result=$conn->query($sql);
    while($row =  $result->fetch_assoc())
    {
        $packingno = $row['packing_number'];
        $lotno=$row['lot_number'];
        $jo=$row['jo_number'];
        $itemcode=$row['item_code'];
        $machinecode=$row['machine_code'];

        $sql2="INSERT INTO mis_dr_assigned(group_name,packing_number,lot_number,jo_number,item_code,machine_code)
        VALUES('$groupname','$packingno','$lotno','$jo','$itemcode','$machinecode')";
        $result2=$conn->query($sql2);

    }

$sql3="DELETE FROM mis_temp_ship_group";
$result3=$conn->query($sql3);

}//end of if optionType==group

else
{

    $sql="SELECT * FROM mis_temp_ship_group";
    $result=$conn->query($sql);
    while($row =  $result->fetch_assoc())
    {
        $packingno = $row['packing_number'];
        $lotno=$row['lot_number'];
        $jo=$row['jo_number'];
        $itemcode=$row['item_code'];
        $machinecode=$row['machine_code'];

        $sql2="INSERT INTO mis_dr_assigned(dr_number,packing_number,lot_number,jo_number,item_code,machine_code)
        VALUES('$groupname','$packingno','$lotno','$jo','$itemcode','$machinecode')";
        $result2=$conn->query($sql2);

    }

$sql3="DELETE FROM mis_temp_ship_group";
$result3=$conn->query($sql3);



}


?>