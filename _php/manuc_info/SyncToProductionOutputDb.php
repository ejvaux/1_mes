<?php

#EDIT THE DATE BEFORE RUNNNING THE QUERY

include 'ProdOutput_db.php';

$conn2 = mysqli_connect("localhost","root","","masterdatabase");
if(!$conn2)
{
die("Connection failed: ".mysqli_connect_error());
}

$sql="SELECT mis_prod_plan_dl.*, dmc_item_mold_matching.MODEL as mod1, dmc_item_mold_matching.TOOL_NUMBER as TN
	  FROM `mis_prod_plan_dl` 
	  LEFT JOIN dmc_item_mold_matching on (mis_prod_plan_dl.ITEM_CODE=dmc_item_mold_matching.ITEM_CODE) 
      AND (mis_prod_plan_dl.MACHINE_CODE=dmc_item_mold_matching.MACHINE_CODE) 
      WHERE mis_prod_plan_dl.PROD_OUTPUT_STATUS = 'UPDATED' OR  mis_prod_plan_dl.PROD_OUTPUT_STATUS IS NULL";
      
      $result=$conn2->query($sql);
      while ($row=$result->fetch_assoc()) {
          $jodate=$row['DATE_'];
          $jono=$row['JOB_ORDER_NO'];
          $customercode=$row['CUSTOMER_CODE'];
          $customername=$row['CUSTOMER_NAME'];
          $itemcode=$row['ITEM_CODE'];
          $itemname=$row['ITEM_NAME'];
          $model=$row['mod1'];
          $planqty=$row['PLAN_QTY'];
          $prodqty=0;
          $remqty=0;
          $machinecode=$row['MACHINE_CODE'];
          $toolnumber=$row['TN'];

          /* $sqlms="INSERT INTO jo_table(JobOrderNo,CUSTOMER_CODE,CUSTOMER_NAME,ItemCode,ItemDescription,Model,PlanQty
          ProductionQty,RemainQty,MachineNo,MoldNo) VALUES ('$jono','$customercode',
          '$customername','$itemcode','$itemname','$model','$planqty','$prodqty','$remqty','$machinecode',
          '$toolnumber') ";
          $resultms=sqlsrv_query($conn,$sqlms); */

          $sqlcheck="SELECT Id from jo_table WHERE Date=? AND JobOrderNo = ?";
          $params = array($jodate,$jono);
          $resultsqlcheck =sqlsrv_query($conn, $sqlcheck, $params);
          $rowcheck = sqlsrv_fetch_array($resultsqlcheck);
          
          if($rowcheck['Id']=="")
          {
            
          $sqlms="INSERT INTO jo_table(Date,JobOrderNo,CUSTOMER_CODE,CUSTOMER_NAME,ItemCode,ItemDescription,Model,PlanQty,ProductionQty,RemainQty,MachineNo,MoldNo) 
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $params = array($jodate,$jono,$customercode,$customername,$itemcode,$itemname,$model,$planqty,$prodqty,$remqty,$machinecode,$toolnumber);
            $stmt = sqlsrv_query($conn, $sqlms, $params);
            #echo "IMPORT SUCCESS <br>";

          }
          else
          {

       

            $sqlms="UPDATE jo_table set CUSTOMER_CODE=?,CUSTOMER_NAME=?,ItemCode=?,ItemDescription=?,Model=?,PlanQty=?,ProductionQty=?,RemainQty=?,MachineNo=?,MoldNo=?) WHERE Id = ?";
            $params = array($customercode,$customername,$itemcode,$itemname,$model,$planqty,$prodqty,$remqty,$machinecode,$toolnumber,$rowcheck['Id']);
            $stmt = sqlsrv_query($conn, $sqlms, $params);
            #echo "UPDATED SUCCESS <br>";
          
          }


         


      
      
      }

?>


  

