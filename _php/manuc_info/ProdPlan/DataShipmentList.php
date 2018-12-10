<?php
//Delete duplicates
//DELETE n1 FROM qmd_lot_create n1, qmd_lot_create n2 WHERE n1.LOT_ID > n2.LOT_ID AND n1.LOT_NUMBER = n2.LOT_NUMBER
//UPDATE`mis_product`
//SET SHIP_STATUS = 'SHIPPED'
//WHERE (`ITEM_CODE` LIKE 'PMXF0019ZA-B') AND (CAST(PRINT_DATE as DATE) BETWEEN '2018-10-01' AND '2018-10-28') AND SHIP_STATUS = 'APPROVED'

/* SELECT mis_product.* FROM mis_product 
LEFT JOIN qmd_lot_create 
ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER AND mis_product.ITEM_CODE = qmd_lot_create.ITEM_CODE 
WHERE (mis_product.SHIP_STATUS IS NULL or mis_product.SHIP_STATUS = "") AND 
(qmd_lot_create.LOT_JUDGEMENT = 'APPROVED') AND (mis_product.DATE_ BETWEEN '2018-10-01' AND '2018-11-19') */

/* UPDATE mis_product 
LEFT JOIN qmd_lot_create on mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER AND mis_product.ITEM_CODE = qmd_lot_create.ITEM_CODE
SET mis_product.SHIP_STATUS = 'APPROVED'
WHERE (mis_product.SHIP_STATUS IS NULL or mis_product.SHIP_STATUS = "")
AND (qmd_lot_create.LOT_JUDGEMENT = 'APPROVED') AND (mis_product.DATE_ BETWEEN '2018-10-01' AND '2018-11-19') */

/* UPDATE mis_product
LEFT JOIN qmd_lot_create on mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
SET mis_product.WAREHOUSE_RECEIVE = 'RECEIVED',mis_product.TO_WAREHOUSE = 'FG01',mis_product.QC_SAP_TRANSFER_STATUS = 'TRANSFERED'
WHERE (mis_product.WAREHOUSE_RECEIVE = 'NOT YET') AND (qmd_lot_create.WAREHOUSE_RECEIVE = 'RECEIVED')
AND (mis_product.DATE_ BETWEEN '2018-10-01' AND '2018-11-14') */

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$sql="";
$strfrom=$_POST['sortfrom'];
$strto=$_POST['sortto'];
$search=$_POST['search'];

$shipstat = $_POST['ShipStat'];

if($shipstat!="")
{
    $shipstat = $_POST['ShipStat'];
}
else
{
    $shipstat = "ALL DATA";
}

        
if ($strto == "" && $strfrom=="") {
    # code... condition above is whenever both date range are null are date
if ($search!="") {
    $sql="SELECT mis_product.danpla_reference,mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT,mis_product.SHIP_STATUS, qmd_lot_create.PROD_DATE, mis_product.CUST_CODE,mis_product.CUST_NAME, SUM(mis_product.PRINT_QTY) as Out_Qty,
mis_product.danpla_reference,mis_product.WAREHOUSE_RECEIVE FROM mis_product
LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
WHERE (mis_product.PACKING_NUMBER LIKE '%$search%' OR mis_product.LOT_NUM LIKE '%$search%' OR mis_product.JO_NUM LIKE '%$search%'
OR mis_product.ITEM_CODE LIKE '%$search%' OR  mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%'
OR mis_product.SHIP_STATUS LIKE '%$search%' or mis_product.danpla_reference LIKE '$search') ";

    if ($shipstat!="ALL DATA") {
        if ($shipstat == "PENDING") {
            $sql.=" AND ((qmd_lot_create.LOT_JUDGEMENT IS NULL ) OR (qmd_lot_create.LOT_JUDGEMENT = '$shipstat')) ";
        } else  {
            $sql.=" AND (qmd_lot_create.LOT_JUDGEMENT = '$shipstat') ";
        }
    }
}
     else{                                
        $datetoday=date("Y-m-d");
        $sql="SELECT mis_product.danpla_reference,mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT,mis_product.SHIP_STATUS, qmd_lot_create.PROD_DATE, mis_product.CUST_CODE,mis_product.CUST_NAME, SUM(mis_product.PRINT_QTY) as Out_Qty,
mis_product.danpla_reference,mis_product.WAREHOUSE_RECEIVE FROM mis_product
LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
WHERE  (qmd_lot_create.PROD_DATE LIKE '$datetoday%')";

        if ($shipstat!="ALL DATA") {
            if ($shipstat == "PENDING") {
                $sql.=" AND ((qmd_lot_create.LOT_JUDGEMENT IS NULL ) OR (qmd_lot_create.LOT_JUDGEMENT = '$shipstat')) ";
            } else {
                $sql.=" AND (qmd_lot_create.LOT_JUDGEMENT = '$shipstat') ";
            }
        }
    }

$sql.=" GROUP BY mis_product.PACKING_NUMBER ORDER BY qmd_lot_create.PROD_DATE DESC";

} elseif ($strto=="" && $strfrom!="") {
    # code... condition above is whenver

    if ($search!="") {

          # code...

        $sql="SELECT mis_product.danpla_reference,mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
            mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT,mis_product.SHIP_STATUS, qmd_lot_create.PROD_DATE, mis_product.CUST_CODE,mis_product.CUST_NAME, SUM(mis_product.PRINT_QTY) as Out_Qty,
            mis_product.danpla_reference,mis_product.WAREHOUSE_RECEIVE FROM mis_product
            LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
            WHERE (mis_product.PACKING_NUMBER LIKE '%$search%' OR mis_product.LOT_NUM LIKE '%$search%' OR mis_product.JO_NUM LIKE '%$search%'
            OR mis_product.ITEM_CODE LIKE '%$search%' OR mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%'
            OR mis_product.SHIP_STATUS LIKE '%$search%'  or mis_product.danpla_reference LIKE '$search')
             AND (qmd_lot_create.PROD_DATE LIKE= '$strfrom%') ";
            if($shipstat!="ALL DATA")
            {
                if($shipstat == "PENDING")
                {
                    $sql.=" AND ((qmd_lot_create.LOT_JUDGEMENT IS NULL ) OR (qmd_lot_create.LOT_JUDGEMENT = '$shipstat')) ";
                }
                else
                {
                    $sql.=" AND (qmd_lot_create.LOT_JUDGEMENT = '$shipstat') ";
                }
            }
            $sql.=" GROUP BY mis_product.PACKING_NUMBER ORDER BY qmd_lot_create.PROD_DATE DESC LIMIT 1000";
    }
    else {
        $sql="SELECT mis_product.danpla_reference,mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
            mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT,mis_product.SHIP_STATUS, qmd_lot_create.PROD_DATE, mis_product.CUST_CODE,mis_product.CUST_NAME, SUM(mis_product.PRINT_QTY) as Out_Qty,
            mis_product.danpla_reference,mis_product.WAREHOUSE_RECEIVE FROM mis_product
            LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER AND mis_product.ITEM_CODE = qmd_lot_create.ITEM_CODE
            WHERE  (qmd_lot_create.PROD_DATE LIKE '$strfrom%') ";
            
            if($shipstat!="ALL DATA")
            {
                if($shipstat == "PENDING")
                {
                    $sql.=" AND ((qmd_lot_create.LOT_JUDGEMENT IS NULL ) OR (qmd_lot_create.LOT_JUDGEMENT = '$shipstat')) ";
                }
                else
                {
                    $sql.=" AND (qmd_lot_create.LOT_JUDGEMENT = '$shipstat') ";
                }           
             }

            $sql.=" GROUP BY mis_product.PACKING_NUMBER ORDER BY qmd_lot_create.PROD_DATE DESC LIMIT 1000";
    }
} elseif ($strfrom!="" && $strto!="") {
    if ($search!="") {
        # code...

        $sql="SELECT mis_product.danpla_reference,mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
            mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT,mis_product.SHIP_STATUS, qmd_lot_create.PROD_DATE, mis_product.CUST_CODE,mis_product.CUST_NAME, SUM(mis_product.PRINT_QTY) as Out_Qty,
            mis_product.danpla_reference,mis_product.WAREHOUSE_RECEIVE FROM mis_product
            LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
            WHERE (mis_product.PACKING_NUMBER LIKE '%$search%' OR mis_product.LOT_NUM LIKE '%$search%' OR mis_product.JO_NUM LIKE '%$search%'
            OR mis_product.ITEM_CODE LIKE '%$search%' OR mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%'
            OR mis_product.SHIP_STATUS LIKE '%$search%'  or mis_product.danpla_reference LIKE '$search') AND (qmd_lot_create.PROD_DATE BETWEEN '$strfrom' AND '$strto') ";

            if($shipstat!="ALL DATA")
            {
                if($shipstat == "PENDING")
                {
                    $sql.=" AND ((qmd_lot_create.LOT_JUDGEMENT IS NULL ) OR (qmd_lot_create.LOT_JUDGEMENT = '$shipstat')) ";
                }
                else
                {   
                    $sql.=" AND (qmd_lot_create.LOT_JUDGEMENT = '$shipstat') ";
                }
            }
            $sql.=" GROUP BY mis_product.PACKING_NUMBER ORDER BY qmd_lot_create.PROD_DATE DESC";
    } else {
        $sql="SELECT mis_product.danpla_reference,mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
            mis_product.MACHINE_CODE, qmd_lot_create.LOT_JUDGEMENT,mis_product.SHIP_STATUS, qmd_lot_create.PROD_DATE, mis_product.CUST_CODE,mis_product.CUST_NAME, SUM(mis_product.PRINT_QTY) as Out_Qty,
            mis_product.danpla_reference,mis_product.WAREHOUSE_RECEIVE FROM mis_product
            LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
            WHERE (qmd_lot_create.PROD_DATE BETWEEN '$strfrom' AND '$strto') ";
                       if($shipstat!="ALL DATA")
                       {
                        if($shipstat == "PENDING")
                        {
                            $sql.=" AND ((qmd_lot_create.LOT_JUDGEMENT IS NULL ) OR (qmd_lot_create.LOT_JUDGEMENT = '$shipstat')) ";
                        }
                        else
                        {
                            $sql.=" AND (qmd_lot_create.LOT_JUDGEMENT = '$shipstat') ";
                        }
                       }
                       $sql.=" GROUP BY mis_product.PACKING_NUMBER ORDER BY qmd_lot_create.PROD_DATE DESC";
    }
}

$result = $conn->query($sql);
$datavar=[];
$ctr=0;
while (($row = mysqli_fetch_array($result))) {
    $ctr+=1;
    if ($row['PROD_DATE']=="") {
        $temp_date = "NO JUDGEMENT DATE";
    } else {
        $temp_date = date("d M Y h:i:s A", strtotime($row['PROD_DATE']));
    }

    if ($row['LOT_JUDGEMENT']!="APPROVED") 
    {
        $lotjudge = "PENDING";
        $shipStat = "WAITING FOR INSPECTION";
    }
     else
    {
        $lotjudge = $row['LOT_JUDGEMENT'];

        if ($lotjudge =="APPROVED") 
        {
            
        $packno = $row['PACKING_NUMBER'];
        $lotnumber = $row['LOT_NUM'];
        
        
        
        $sql2="SELECT ship_group_id FROM mis_temp_ship_group WHERE packing_number = '$packno' AND lot_number='$lotnumber'";
        $result2 = $conn->query($sql2);
            
          
                if ($result2->num_rows > 0) {
                    $shipStat = "ALREADY IN THE GROUP";
                }
                else
                {
                    if($row['WAREHOUSE_RECEIVE']=="RECEIVED")
                    {
                        if($row['SHIP_STATUS']=="SHIPPED")
                        {
                            $shipStat="ALREADY SHIPPED";
                        }
                        else{
                            $shipStat = "WAITING FOR SHIPMENT";
                        }
                       
                    }
                    else
                    {
                        $shipStat = "NOT RECEIVED";
                    }
                   
                }
                
                $sql4 ="SELECT dr_assigned_id FROM mis_dr_assigned WHERE packing_number = '$packno' AND lot_number='$lotnumber'";
                $result4=$conn->query($sql4); 
                
                while($row4=$result4->fetch_assoc())
                {
                    if($row4['dr_assigned_id']!="")
                    {
                        $shipStat = "GROUP ASSIGNED";              
                    }
                }

                $sql5 ="SELECT dr_assigned_id FROM mis_dr_assigned WHERE packing_number = '$packno' AND lot_number='$lotnumber' AND dr_number !=''";
                $result5=$conn->query($sql5); 
                
                while($row5=$result5->fetch_assoc())
                {
                    if($row5['dr_assigned_id']!="")
                    {
                        $shipStat = "ALREADY SHIPPED";
                        $sql6 = "UPDATE mis_product SET SHIP_STATUS='SHIPPED' 
                        WHERE PACKING_NUMBER='$packno'";
                        $result6 = $conn->query($sql6);              
                    }
                }

        
        } elseif ($lotjudge=="DISAPPROVED") {
            # code...
            $shipStat="REJECT/WAITING FOR REWORKS";
        } 
        else if($lotjudge=="SHIPPED")
        {
            $shipStat="ALREADY SHIPPED";
        }
        else 
        {
            $shipStat = "WAITING FOR INSPECTION";
        }
    }

    array_push($datavar, ["NO"=> $ctr ,"LOT CREATE DATE"=>$temp_date,"PACKING_NUMBER"=> $row['PACKING_NUMBER'], "LOT_NUMBER"=> $row['LOT_NUM'],
            "JO_NO"=> $row['JO_NUM'],"ITEM_CODE"=>$row['ITEM_CODE'],"ITEM_NAME"=>$row['ITEM_NAME'],
            "MACHINE_CODE"=>$row['MACHINE_CODE'],"LOT JUDGEMENT"=> $lotjudge,"SHIPMENT_STATUS"=> $shipStat,
            "CUSTOMER_CODE"=>$row['CUST_CODE'],"CUSTOMER_NAME"=>$row['CUST_NAME'],"DANPLA_REF_NUM"=>$row['danpla_reference'], "QTY"=>$row['Out_Qty']
            ,"REFERENCE_NUMBER" => $row['danpla_reference']]);
}
echo json_encode($datavar, true);