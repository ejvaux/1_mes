<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$datavar=[];

                    /* 'sortfrom': strfromobj,
                    'sortto': strtoobj,
                    'search': searchobj, */

$sortfrom=$_POST['sortfrom'];     
$sortto=$_POST['sortto'];
$search=$_POST['search'];
$datefrom = date("Y-m-d",strtotime($sortfrom));
$dateto = date("Y-m-d",strtotime($sortto));

$sql="SELECT mis_product.*,qmd_lot_create.RECEIVED_BY,qmd_lot_create.RECEIVED_DATE,mis_product.PRINT_QTY  FROM mis_product 
LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER
WHERE (qmd_lot_create.WAREHOUSE_RECEIVE = 'RECEIVED') ";

    if($sortfrom==""&& $sortto=="")
    {
        if($search!="")
        {   
            $sql.="AND (mis_product.JO_NUM LIKE '%$search%' OR mis_product.JO_BARCODE LIKE '%$search%' OR 
             mis_product.JO_BARCODE LIKE '%$search%' OR mis_product.PACKING_NUMBER LIKE '%$search%' OR 
             mis_product.reference_num LIKE '%$search%' OR  mis_product.danpla_reference LIKE '%$search%' OR 
             mis_product.LOT_NUM LIKE '%$search%' OR mis_product.ITEM_CODE LIKE '%$search%' OR 
             mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%' OR 
             qmd_lot_create.RECEIVED_BY LIKE '%$search%')";
        }
        else
        {
            $datetoday=date("Y-m-d");
           
            $sql.="AND (qmd_lot_create.RECEIVED_DATE LIKE '$datetoday%')";
        }
    }
    elseif($sortfrom!="" && $sortto=="")
    {
      

        if($search!="")
        {
            $sql.="AND (mis_product.JO_NUM LIKE '%$search%' OR mis_product.JO_BARCODE LIKE '%$search%' OR 
             mis_product.JO_BARCODE LIKE '%$search%' OR mis_product.PACKING_NUMBER LIKE '%$search%' OR 
             mis_product.reference_num LIKE '%$search%' OR  mis_product.danpla_reference LIKE '%$search%' OR 
             mis_product.LOT_NUM LIKE '%$search%' OR mis_product.ITEM_CODE LIKE '%$search%' OR 
             mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%' OR 
             qmd_lot_create.RECEIVED_BY LIKE '%$search%') AND (qmd_lot_create.RECEIVED_DATE LIKE '$datefrom%')";
        }
        else
        {
            $sql.="AND (qmd_lot_create.RECEIVED_DATE LIKE '$datefrom%')";
        }
    }
    elseif($sortfrom!="" && $sortto!="")
    {
        if($search!="")
        {
            $sql.="AND (mis_product.JO_NUM LIKE '%$search%' OR mis_product.JO_BARCODE LIKE '%$search%' OR 
            mis_product.JO_BARCODE LIKE '%$search%' OR mis_product.PACKING_NUMBER LIKE '%$search%' OR 
            mis_product.reference_num LIKE '%$search%' OR  mis_product.danpla_reference LIKE '%$search%' OR 
            mis_product.LOT_NUM LIKE '%$search%' OR mis_product.ITEM_CODE LIKE '%$search%' OR 
            mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%' OR 
            qmd_lot_create.RECEIVED_BY LIKE '%$search%') 
            AND (cast(qmd_lot_create.RECEIVED_DATE as date) BETWEEN '$datefrom' AND '$dateto')";

        }
        else
        {
            $sql.=" AND (cast(qmd_lot_create.RECEIVED_DATE as date) BETWEEN '$datefrom' AND '$dateto')";
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
    "QUANTITY"=>$row['PRINT_QTY'],"MACHINE_CODE"=>$row['MACHINE_CODE']
    ,"RECEIVED_TIME"=>$row['RECEIVED_DATE'],"RECEIVED_BY"=>$row['RECEIVED_BY']]);
  
}

echo json_encode($datavar,true);    

/* echo json_encode($fromdate,true);  */   