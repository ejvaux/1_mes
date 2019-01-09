<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$drno=$_POST['drno'];
$datasorttype=$_POST['datasorttype'];
if($datasorttype=="UnassignedDr")
{
    $sql="SELECT mis_dr_assigned.dr_date,mis_dr_assigned.dr_number,mis_dr_assigned.Date_Inserted,mis_dr_assigned.group_name,
    mis_dr_assigned.item_code,mis_dr_assigned.item_name,SUM(mis_dr_assigned.quantity) as qty,mis_dr_assigned.lot_number,
    dmc_item_list.ITEM_PRINTCODE 
    FROM mis_dr_assigned
    LEFT JOIN dmc_item_list ON mis_dr_assigned.item_code = dmc_item_list.ITEM_CODE
    WHERE mis_dr_assigned.group_name='$drno' AND mis_dr_assigned.dr_number IS NULL
    GROUP BY mis_dr_assigned.item_code";
}
else
{
    $sql="SELECT mis_dr_assigned.dr_date,mis_dr_assigned.dr_number,mis_dr_assigned.Date_Inserted,
    mis_dr_assigned.group_name,mis_dr_assigned.item_code,mis_dr_assigned.item_name,
    SUM(mis_dr_assigned.quantity) as qty,mis_dr_assigned.lot_number, 
    dmc_item_list.ITEM_PRINTCODE 
    FROM mis_dr_assigned
    LEFT JOIN dmc_item_list ON mis_dr_assigned.item_code = dmc_item_list.ITEM_CODE
    WHERE mis_dr_assigned.dr_number='$drno' 
    GROUP BY mis_dr_assigned.item_code";
}

$result = $conn->query($sql);
$datavar=[];
$ctr=0;
while (($row = mysqli_fetch_array($result)))
 {
  # code...

      $ctr+=1;
      if($row['dr_date']=="")
      {
          $tempdate="No Dr Date";
          $tempdr = "UNASSIGNED DR";
      }
      else
      {
          $tempdate = $row['dr_date'];
          $tempdr = $row['dr_number'];
      }
      if($row['group_name']=="")
      {
          $tempgr="No group name";
      }
      else
      {
          $tempgr = $row['group_name'];
      }
        array_push($datavar,["NO"=> $ctr ,"DR_DATE"=>$tempdate, "DR_NO"=> $tempdr,
        "GROUP_DATE"=>$row['Date_Inserted'], "GROUP_NAME"=>$tempgr,
        "ITEM_CODE"=>$row['item_code'],"ITEM_NAME"=>$row['item_name'],
        "QTY"=>$row['qty'],"LOT_NUMBER"=>$row['lot_number'],"FOREIGN_NAME"=>$row['ITEM_PRINTCODE']]);
}
echo json_encode($datavar,true);  
