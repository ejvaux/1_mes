<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$sql="";
$strfrom=$_POST['sortfrom'];
$strto=$_POST['sortto'];
$search=$_POST['search'];


        
if ($strto == "" && $strfrom=="") 
{
   # code... condition above is whenever both date range are null

$sql="SELECT mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT, qmd_lot_create.PROD_DATE FROM mis_product
LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
WHERE mis_product.PACKING_NUMBER LIKE '%$search%' OR mis_product.LOT_NUM LIKE '%$search%' OR mis_product.JO_NUM LIKE '%$search%'
OR mis_product.ITEM_CODE LIKE '%$search%' OR mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%'
OR qmd_lot_create.LOT_JUDGEMENT LIKE '%$search%' ORDER BY qmd_lot_create.PROD_DATE DESC";

 } 

elseif ($strto=="" && $strfrom!="") 
{
  # code... condition above is whenver 

        if ($search!="") {

          # code...

            $sql="SELECT mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
            mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT, qmd_lot_create.PROD_DATE FROM mis_product
            LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
            WHERE (mis_product.PACKING_NUMBER LIKE '%$search%' OR mis_product.LOT_NUM LIKE '%$search%' OR mis_product.JO_NUM LIKE '%$search%'
            OR mis_product.ITEM_CODE LIKE '%$search%' OR mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%'
            OR qmd_lot_create.LOT_JUDGEMENT LIKE '%$search%') AND (DATE(qmd_lot_create.PROD_DATE) = '$strfrom') ORDER BY qmd_lot_create.PROD_DATE DESC";



        }
        else
        {

                    
            $sql="SELECT mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
            mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT, qmd_lot_create.PROD_DATE FROM mis_product
            LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
            WHERE  DATE(qmd_lot_create.PROD_DATE) = '$strfrom' ORDER BY qmd_lot_create.PROD_DATE DESC";


          
        }
       
}

elseif($strfrom!="" && $strto!="")
{
            if ($search!="") {
              # code...

            $sql="SELECT mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
            mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT, qmd_lot_create.PROD_DATE FROM mis_product
            LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
            WHERE (mis_product.PACKING_NUMBER LIKE '%$search%' OR mis_product.LOT_NUM LIKE '%$search%' OR mis_product.JO_NUM LIKE '%$search%'
            OR mis_product.ITEM_CODE LIKE '%$search%' OR mis_product.ITEM_NAME LIKE '%$search%' OR mis_product.MACHINE_CODE LIKE '%$search%'
            OR qmd_lot_create.LOT_JUDGEMENT LIKE '%$search%') AND (qmd_lot_create.PROD_DATE BETWEEN '$strfrom' AND '$strto') ORDER BY qmd_lot_create.PROD_DATE DESC";

                        

            }
            else
            {

            $sql="SELECT mis_product.PACKING_NUMBER, mis_product.LOT_NUM, mis_product.JO_NUM, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
            mis_product.MACHINE_CODE,qmd_lot_create.LOT_JUDGEMENT, qmd_lot_create.PROD_DATE FROM mis_product
            LEFT JOIN qmd_lot_create ON mis_product.LOT_NUM = qmd_lot_create.LOT_NUMBER 
            WHERE (qmd_lot_create.PROD_DATE BETWEEN '$strfrom' AND '$strto') ORDER BY qmd_lot_create.PROD_DATE DESC";

                        
               
    
            }



}

$result = $conn->query($sql);
$datavar=[];
$ctr=0;
while (($row = mysqli_fetch_array($result)))
{
$ctr+=1;
if($row['PROD_DATE']=="")
{
    $temp_date = "NO JUDGEMENT DATE";
}
else
{
    $temp_date = date("d M Y h:i:s A",strtotime($row['PROD_DATE']));
}

if($row['LOT_JUDGEMENT']=="")
{
    $lotjudge = "PENDING";
    $shipStat = "WAITING FOR INSPECTION";
}
else
{
    $lotjudge = $row['LOT_JUDGEMENT'];

    if($lotjudge =="APPROVED")
    {
        $shipStat = "WAITING FOR SHIPMENT";
    }
    elseif ($lotjudge=="DISAPPROVED") {
        # code...
        $shipStat="WAITING FOR REWORKS";
    }
    else
    {
        $shipStat = "WAITING FOR INSPECTION";
    }
}



array_push($datavar,["NO"=> $ctr ,"LOT CREATE DATE"=>$temp_date,"PACKING NUMBER"=> $row['PACKING_NUMBER'], "LOT NUMBER"=> $row['LOT_NUM'],
            "JO NO"=> $row['JO_NUM'],"ITEM CODE"=>$row['ITEM_CODE'],"ITEM NAME"=>$row['ITEM_NAME'],
            "MACHINE CODE"=>$row['MACHINE_CODE'],"LOT JUDGEMENT"=> $lotjudge,"SHIPMENT STATUS"=> $shipStat]);
        
    }
echo json_encode($datavar,true);    




?>