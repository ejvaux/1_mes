<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$datavar=[];

                    /* 'sortfrom': strfromobj,3000
                    'sortto': strtoobj,
                    'search': searchobj, */

$sortfrom=$_POST['sortfrom'];     
$sortto=$_POST['sortto'];
$search=$_POST['search'];
$datefrom = date("Y-m-d",strtotime($sortfrom));
$dateto = date("Y-m-d",strtotime($sortto));

$sql="SELECT * FROM mis_product 
WHERE (WAREHOUSE_RECEIVE = 'RECEIVED') ";

    if($sortfrom==""&& $sortto=="")
    {
        if($search!="")
        {   
            $sql.="AND (JO_NUM LIKE '%$search%' OR JO_BARCODE LIKE '%$search%' OR 
             JO_BARCODE LIKE '%$search%' OR PACKING_NUMBER LIKE '%$search%' OR 
             LOT_NUM LIKE '%$search%' OR ITEM_CODE LIKE '%$search%' OR 
             reference_num LIKE '%$search%' OR  danpla_reference LIKE '%$search%' OR 
             ITEM_NAME LIKE '%$search%' OR MACHINE_CODE LIKE '%$search%' OR 
             RECEIVED_BY LIKE '%$search%')";
        }
        else
        {
            $datetoday=date("Y-m-d");
            $sql.="AND (RECEIVED_DATE LIKE '$datetoday%')";
        }
    }
    elseif($sortfrom!="" && $sortto=="")
    {
      

        if($search!="")
        {
            $sql.="AND (JO_NUM LIKE '%$search%' OR JO_BARCODE LIKE '%$search%' OR 
             JO_BARCODE LIKE '%$search%' OR PACKING_NUMBER LIKE '%$search%' OR 
             reference_num LIKE '%$search%' OR  danpla_reference LIKE '%$search%' OR 
             LOT_NUM LIKE '%$search%' OR ITEM_CODE LIKE '%$search%' OR 
             ITEM_NAME LIKE '%$search%' OR MACHINE_CODE LIKE '%$search%' OR 
             RECEIVED_BY LIKE '%$search%') AND (RECEIVED_DATE LIKE '$datefrom%')";
        }
        else
        {
            $sql.="AND (RECEIVED_DATE LIKE '$datefrom%')";
        }
    }
    elseif($sortfrom!="" && $sortto!="")
    {
        if($search!="")
        {
            $sql.="AND (JO_NUM LIKE '%$search%' OR JO_BARCODE LIKE '%$search%' OR 
            JO_BARCODE LIKE '%$search%' OR PACKING_NUMBER LIKE '%$search%' OR 
            reference_num LIKE '%$search%' OR  danpla_reference LIKE '%$search%' OR 
            LOT_NUM LIKE '%$search%' OR ITEM_CODE LIKE '%$search%' OR 
            ITEM_NAME LIKE '%$search%' OR MACHINE_CODE LIKE '%$search%' OR 
            RECEIVED_BY LIKE '%$search%') 
            AND (cast(RECEIVED_DATE as date) BETWEEN '$sortfrom' AND '$sortto')";
            
        }
        else
        {
            $sql.=" AND (cast(RECEIVED_DATE as date) BETWEEN '$sortfrom' AND '$sortto')";
        }
    }



$result=$conn->query($sql);
$ctr = 0;
while($row = $result->fetch_assoc())
{
    $ctr+=1;
    array_push($datavar,["NO"=> $ctr ,"JO_NO"=> $row['JO_NUM'] , "SERIAL_PRINT"=>$row['JO_BARCODE'],
    "PACKING_NUMBER"=>$row['PACKING_NUMBER'],"REF_NUM"=>$row['reference_num'],"DANPLA_REF_NUM"=>$row['danpla_reference'],
    "LOT_NO"=>$row['LOT_NUM'],"ITEM_CODE"=>$row['ITEM_CODE'],"ITEM_NAME"=>$row['ITEM_NAME'],
    "QUANTITY"=>$row['PRINT_QTY'],"MACHINE_CODE"=>$row['MACHINE_CODE'],
    "RECEIVED_TIME"=>$row['RECEIVED_DATE'],"RECEIVED_BY"=>$row['RECEIVED_BY']]);
  
}

echo json_encode($datavar,true);    

/* echo json_encode($fromdate,true);  */   