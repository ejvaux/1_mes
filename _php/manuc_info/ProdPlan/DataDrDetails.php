<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$drno=$_POST['drno'];
$datasorttype=$_POST['datasorttype'];
if($datasorttype=="UnassignedDr")
{
    $sql="SELECT * FROM mis_dr_assigned WHERE group_name='$drno'";
}
else
{
    $sql="SELECT * FROM mis_dr_assigned WHERE dr_number='$drno'";
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
        "GROUP_NAME"=>$tempgr,"PACKING_NO"=>$row['packing_number'],"LOT_NUMBER"=>$row['lot_number'],
        "JOB_ORDER_NO"=>$row['jo_number'],"ITEM_CODE"=>$row['item_code'],"ITEM_NAME"=>$row['item_name'],
        "MACHINE_CODE"=>$row['machine_code'],"CUSTOMER_CODE"=>$row['customer_code'],"CUSTOMER_NAME"=>$row['customer_name']]);
  
  

}
echo json_encode($datavar,true);  

?>