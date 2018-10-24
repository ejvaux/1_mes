<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$status = "";
$ref_num = $_POST['ref_num'];
$searchtype = $_POST['searchtype'];

if($searchtype == "danpla")
{
    $sql="SELECT SHIP_STATUS FROM mis_product WHERE danpla_reference LIKE'%$ref_num%' or packing_number LIKE '%$ref_num%' LIMIT 50";

    $result = $conn->query($sql);

    if($result->num_rows > 0 )
    {
        while($rows = $result->fetch_assoc())
        {
            if($rows['SHIP_STATUS']=="APPROVED")
            {
               // $status = "exist";
               $status=checkInGroup($ref_num);
             
            }
           else if($rows['SHIP_STATUS']=="SHIPPED")
            {
                $status="shipped";
            }
            else 
            {
                $status="pending";
            }
           
        }
        
    }
    else
    {
        $status = "do not exist";
    }

}

else
{
/* scan polybag here */
}

function checkInGroup($ref)
{
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$res = "";
$sql2="SELECT mis_temp_ship_group.ship_group_id FROM mis_temp_ship_group 
LEFT JOIN mis_product ON mis_temp_ship_group.packing_number = mis_product.packing_number
WHERE mis_product.danpla_reference = '$ref' or mis_product.packing_number = '$ref' LIMIT 1";

$result2 = $conn->query($sql2);

    if($result2->num_rows>0)
    {
        $res="already group";
    }
    else{
        $res = "exist";
    }

    return $res;
}


echo json_encode($status, true);



