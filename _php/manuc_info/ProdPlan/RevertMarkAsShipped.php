<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$remtype = $_POST['rem_type'];

if($remtype=='WITHPACKINGNO')
{
    $packingNo = $_POST['packingno'];
    $lotnumber = $_POST['lotno'];
    
    $sql = "UPDATE mis_product SET SHIP_STATUS='APPROVED' WHERE PACKING_NUMBER='$packingNo'";
    $result = $conn->query($sql);
    
    /* $sql2= "UPDATE qmd_lot_create SET LOT_JUDGEMENT='APPROVED' WHERE LOT_NUMBER='$lotnumber'";
    $result2 = $conn->query($sql2); */
    
    $sql3= "DELETE FROM mis_dr_assigned WHERE lot_number='$lotnumber' AND packing_number='$packingNo'";
    $result3 = $conn->query($sql3);
    
    //echo $packingNo." ".$lotnumber;
}
else
{
    $itemcode = $_POST['itemcode'];
    $drno = $_POST['drno'];
    $grno = $_POST['grno'];
    
   
        if($drno!="UNASSIGNED DR")
        {
            $sql = "UPDATE mis_product SET SHIP_STATUS='APPROVED' WHERE PACKING_NUMBER IN 
            (SELECT packing_number FROM mis_dr_assigned WHERE item_code = '$itemcode' AND dr_number = '$drno') LIMIT 50";
            $result = $conn->query($sql);

            $sql3= "DELETE FROM mis_dr_assigned WHERE item_code = '$itemcode' AND dr_number = '$drno'";
            $result3 = $conn->query($sql3);
        }
        else
        {
            $sql = "UPDATE mis_product SET SHIP_STATUS='APPROVED' WHERE PACKING_NUMBER IN 
            (SELECT packing_number FROM mis_dr_assigned WHERE item_code = '$itemcode' AND group_name = '$grno') LIMIT 50";
            $result = $conn->query($sql);

            $sql3= "DELETE FROM mis_dr_assigned WHERE item_code = '$itemcode' AND group_name = '$grno'";
            $result3 = $conn->query($sql3);
        }
 



}



?>