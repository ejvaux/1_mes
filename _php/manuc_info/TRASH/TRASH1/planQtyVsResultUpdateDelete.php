<?php

include '1_MES_DB.php';

$id=$_GET['id'];
$No=$_POST['NO'];
$Date=$_POST['Date1'];
$Jo=$_POST['JONo'];
$ItemCode=$_POST['ICode'];
$ItemName=$_POST['IName'];
$MachineCode=$_POST['MachineCode'];
$MachineMaker=$_POST['MachineMaker'];
$Tonnage=$_POST['Tonnage'];
$MachineGroup=$_POST['MachineGroup'];
$ToolNumber=$_POST['ToolNumber'];
$Priority=$_POST['Priority'];
$PlanQty=$_POST['PlanQty'];
$ProdResult=$_POST['ProdResult'];
$AchieveRate=$_POST['AchieveRate'];
$DefectRate=$_POST['DefectRate'];
$CustomerName=$_POST['CName'];
$CustomerCode=$_POST['CCode'];


 if (isset($_POST['UPDATE1']))
 	 {
        # Save-button was clicked
        
        $sql="UPDATE MIS_PROD_PLAN_DL SET NO='$No', DATE_='$Date', JOB_ORDER_NO='$Jo',ITEM_CODE='$ItemCode',ITEM_NAME='$ItemName',MACHINE_CODE='$MachineCode',MACHINE_MAKER='$MachineMaker',TONNAGE='$Tonnage',MACHINE_GROUP='$MachineGroup',TOOL_NUMBER='$ToolNumber',PRIORITY='$Priority',PLAN_QTY='$PlanQty',PROD_RESULT='$ProdResult',ACHIEVE_RATE='$AchieveRate',DEFECT_RATE='$DefectRate', CUSTOMER_NAME='$CustomerName', CUSTOMER_CODE='$CustomerCode' WHERE ID='$id'";

        $result=$conn->query($sql);

   echo "<script>

    var txt;
    var r = confirm('Data saved successfully!');
    if (r == true) {
        window.location = 'manuc_info.php';
    }
    else
    {
 window.location = 'manuc_info.php';

    }
</script>";

     
  


    }

elseif (isset($_POST['DELETE1'])) {
        # Delete-button was clicked

	$sql="DELETE FROM MIS_PROD_PLAN_DL WHERE ID='$id'";

	$result=$conn->query($sql);
     echo "<script>

    var txt;
    var r = confirm('Data deleted successfully!');
    if (r == true) {
        window.location = 'manuc_info.php';
    }
    else
    {
 window.location = 'manuc_info.php';
        
    }
</script>";



    }

