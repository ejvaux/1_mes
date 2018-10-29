<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$status = "";
$ref_num = $_POST['ref_num'];
$searchtype = $_POST['searchtype'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if($searchtype == "danpla")
{
    $sql="SELECT SHIP_STATUS FROM mis_product WHERE danpla_reference ='$ref_num' or packing_number ='$ref_num' LIMIT 50";

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

    $sql="SELECT ID from mis_product WHERE jo_barcode ='$ref_num' OR reference_num ='$ref_num' LIMIT 1";
    $result = $conn->query($sql);
        if($result->num_rows > 0 )
        {
            while($row=$result->fetch_assoc())
            {
                $prodid = $row['ID'];
                $status=checkInMisPolybag($prodid);
            }
        }
        else
        {
            $status="do not exist";
        }

   
    
}


function checkInMisPolybag($prodid)
{ 
    $user = $_SESSION['text'];
    include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
    $sql2="SELECT id FROM mis_polybag WHERE mis_product_id='$prodid'";
    $result3=$conn->query($sql2);

        if($result3->num_rows > 0)
        {
            //exists
            $polyres="polyexists";
        }
        else
        {
            //not exists
            $sql4="INSERT INTO mis_polybag(mis_product_id,scan_by) VALUES('$prodid','$user')";
            $result4 = $conn->query($sql4);
            $polyres = "polygood";
        }
return $polyres;


}




function checkInGroup($ref)
{
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$res = "";
$sql2="SELECT mis_temp_ship_group.ship_group_id FROM mis_temp_ship_group 
LEFT JOIN mis_product ON mis_temp_ship_group.packing_number = mis_product.packing_number
WHERE (mis_product.danpla_reference = '$ref' or mis_product.packing_number = '$ref') LIMIT 1";

$result2 = $conn->query($sql2);

    if($result2->num_rows>0)
    {
        $res="already group";
    }
    else{
        $sql3 = "SELECT dr_assigned_id  FROM mis_dr_assigned WHERE packing_number = '$ref' OR danpla_reference='$ref'";
        $result3 = $conn->query($sql3);

        if($result3->num_rows>0)
        {
            $res="already group";   
        }
        else
        {
            $res = "exist";
        }
      
    }

    return $res;
}


echo json_encode($status, true);



