<?php

#EDIT THE DATE BEFORE RUNNNING THE QUERY

include 'ProdOutput_db.php';

$conn2 = mysqli_connect("localhost","root","","masterdatabase");
if(!$conn2)
{
die("Connection failed: ".mysqli_connect_error());
}
$datenow = date("Y-m-d");
$dateminus= date('Y-m-d', strtotime('-1 day',strtotime($datenow)));
$ctr=0;
$sql="SELECT mis_prod_plan_dl.*, dmc_item_mold_matching.MODEL as mod1, dmc_item_mold_matching.TOOL_NUMBER as TN
	  FROM `mis_prod_plan_dl` 
	  LEFT JOIN dmc_item_mold_matching on (mis_prod_plan_dl.ITEM_CODE=dmc_item_mold_matching.ITEM_CODE) 
      AND (mis_prod_plan_dl.MACHINE_CODE=dmc_item_mold_matching.MACHINE_CODE) 
      WHERE mis_prod_plan_dl.PROD_OUTPUT_STATUS = 'UPDATED' OR  mis_prod_plan_dl.PROD_OUTPUT_STATUS IS NULL 
      AND mis_prod_plan_dl.DATE_>='$dateminus'";
      
      $result=$conn2->query($sql);
      while ($row=$result->fetch_assoc()) {
          $jodate=$row['DATE_'];
          $jono=$row['JOB_ORDER_NO'];
          $customercode=$row['CUSTOMER_CODE'];
          $customername=$row['CUSTOMER_NAME'];
          $itemcode=$row['ITEM_CODE'];
          $itemname=$row['ITEM_NAME'];
          $planqty=$row['PLAN_QTY'];
          $model=$row['mod1'];
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

            $idd=$rowcheck['Id'];

            $sqlms="UPDATE jo_table SET CUSTOMER_CODE='$customercode',CUSTOMER_NAME='$customername',
            ItemCode='$itemcode',ItemDescription='$itemname',Model='$model',PlanQty=$planqty
           ,MachineNo='$machinecode',MoldNo='$toolnumber', Date='$jodate' WHERE Id = $idd";
/*             $params = array($customercode,$customername,$itemcode,$itemname,$model,$planqty,$prodqty,$remqty,$machinecode,$toolnumber,$idd);
 */

 $ctr=$ctr+1;
echo $ctr."- UPDATED SUCCESS - ";
echo $rowcheck['Id']." - ";
          
          

                          /* 
                          $tsql = "UPDATE jo_table   
                          SET PlanQty = '$planqty'   
                          WHERE Id =  $idd";   */
                
                
                /* Execute the query. */  
               
                if (sqlsrv_query($conn, $sqlms)) {  
                    echo "Statement executed. <br>";  
                } else {  
                    echo "Error in statement execution.\n";  
                    die(print_r(sqlsrv_errors(), true));  
                }  
                
 


            
          }


         


      
      
      }

?>


  

