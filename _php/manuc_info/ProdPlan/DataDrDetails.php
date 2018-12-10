<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$drno=$_POST['drno'];
$datasorttype=$_POST['datasorttype'];
if($datasorttype=="UnassignedDr")
{
    $sql="SELECT dr_date,dr_number,Date_Inserted,group_name,item_code,item_name,SUM(quantity) as qty,lot_number 
    FROM mis_dr_assigned WHERE group_name='$drno' AND dr_number IS NULL
    GROUP BY item_code";
}
else
{
    $sql="SELECT dr_date,dr_number,Date_Inserted,group_name,item_code,item_name,SUM(quantity) as qty,lot_number  
    FROM mis_dr_assigned WHERE dr_number='$drno' 
    GROUP BY item_code";
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
        "QTY"=>$row['qty'],"LOT_NUMBER"=>$row['lot_number']]);
}
echo json_encode($datavar,true);  

?>