<?php
/* $servername = "172.16.1.13";
$username = "mis-programmer";     
$password = "Prima-abc123";
$dbname = "masterdatabase"; */

$servername = "localhost";
$username = "root";     
$password = "";
$dbname = "masterdatabase";

$lot_creator = 'Eugene Rubio';
$totalNAJO = 0;
$totalProductSucceed = 0;
$totalProductFail = 0;
$totalLotSucceed = 0;
$totalLotFail = 0;
// Create connection
//$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection


for($x = 100000000; $x <= 100002432; $x++){
    $jo[] = $x;
}
foreach($jo as $joborder){
    $totalJO = 0;
    $totalPerJO = 0;
    
    
    $warehouse = '0';
    $prod_date =  Date('Y-m-d H:i:s');
    $conn = new mysqli($servername, $username, $password,$dbname);   
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT mis_prod_plan_dl.DATE_ AS DATELANG,
    mis_product.MACHINE_CODE AS MACH,
    COUNT(mis_product.PACKING_NUMBER) as PACK_ID,
    mis_product.PACKING_NUMBER as PACKING,
    SUM(mis_product.PRINT_QTY) AS SUMQ,
    mis_prod_plan_dl.TO_WAREHOUSE as WAREHOUSE,
    mis_product.ITEM_NAME AS NAME_ITEM,
    mis_product.ITEM_CODE AS CODE_ITEM
    FROM mis_product 
    LEFT JOIN mis_prod_plan_dl
    on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
    LEFT JOIN qmd_lot_create
    on mis_product.JO_NUM = qmd_lot_create.JO_NUM
    WHERE mis_product.JO_NUM = '$joborder' AND mis_product.LOT_NUM = '' /* AND mis_prod_plan_dl.DATE_ = '2018-07-26'  */
    GROUP BY mis_product.PACKING_NUMBER";

    if($result = $conn->query($sql)){
        if ($result->num_rows > 0)
                {
                    echo "\n\t----------------------------------------------------\n\n";
                    
                    $totalNAJO = $totalNAJO + 1;

                    while($row = $result->fetch_assoc()) 
                    {
                    $packing_number = $row['PACKING'];
                    echo "\t$packing_number\t";
                    echo $row['SUMQ']."\t";
                    echo $row['PACK_ID']." POLYBAG(s)\t";

                    $totalJO = $totalJO + $row['PACK_ID'];
                    $totalPerJO = $totalPerJO + $row['SUMQ'];
                    
                    $machine = $row['MACH'];
                    $warehouse = 'FG01';
                    $item_name = $row['NAME_ITEM'];
                    $item_code = $row['CODE_ITEM'];
                    $source = $row['DATELANG'];
                    $plan_date = new DateTime($source);
                    $code = $plan_date->format('ymd');
                    $lot = "$code".""."01".""."$machine".""."01"; 

                    

                    //$sql3 = "UPDATE mis_product SET SHIP_STATUS='APPROVED' WHERE PACKING_NUMBER = '$packing_number' AND LOT_NUM = '$lot'";
                    /* $sql3 = "UPDATE mis_product SET LOT_NUM = '$lot',SHIP_STATUS='APPROVED' WHERE PACKING_NUMBER = '$packing_number'";
                    if($result1 = $conn->query($sql3)){
                        echo "SUCCESS_1\t";
                        $totalProductSucceed = $totalProductSucceed + 1;
                    }
                    else{
                        echo "FAILED TO UPDATE PRODUCTS!!!\t";
                        $totalProductFail = $totalProductFail + 1;
                    }
                        echo "$lot\t\n"; */

                    } /* end while */

                    $sql4 = "UPDATE qmd_lot_create SET LOT_JUDGEMENT ='APPROVED', JUDGE_BY = '$lot_creator', JUDGEMENT_DATE = '$prod_date', WAREHOUSE_RECEIVE = 'RECEIVED' WHERE LOT_NUMBER = '$lot'";
                    if($result2 = $conn->query($sql4)){
                        echo "\tSUCCESS_2\t";
                        $totalLotSucceed = $totalLotSucceed + 1;
                    }
                    else{
                        echo "\tFAILED TO UPDATE LOT CREATE!!!\t";
                        $totalLotFail = $totalLotFail + 1;
                    }
                        echo "$lot\t\n";
                  echo "\n\t$joborder\t\t$totalPerJO\t$totalJO\t$machine\t$lot\t$warehouse\t$item_code\t$item_name\t$prod_date\t\n";

                  /* $sql2 = "INSERT INTO qmd_lot_create
                            (   
                                PROD_DATE,
                                LOT_NUMBER,
                                JO_NUM,
                                LOT_QTY,
                                LOT_CREATOR,
                                ITEM_CODE,
                                ITEM_NAME,
                                MACHINE_CODE,
                                TO_WAREHOUSE
                            )
                                VALUES (?,?,?,?,?,?,?,?,?)";    
                                $stmt = $conn->prepare($sql2);
                                $stmt->bind_param(
                                    'sssisssss',
                                    $prod_date,
                                    $lot,
                                    $joborder,
                                    $totalPerJO,
                                    $lot_creator,
                                    $item_code,
                                    $item_name,
                                    $machine,
                                    $warehouse
                                    );
                                if ($stmt->execute() === TRUE) {
                                    echo "\nRecord saved successfully\n"; }
                                    else{
                                        echo "\nDID NOT SAVE!!!\n";
                                    }
                                $stmt->close(); */
  
                }
                else{
                        /* echo "\t No Results found.\n"; */
                    }
                    
            }
            
        else{
                echo $conn->error;
            }
              
    $conn->close();
    
}
echo "\n\nTOTAL JO:$totalNAJO\n";
echo "\n\nTOTAL PRODUCTS SUCCEED:$totalProductSucceed";
echo "\n\nTOTAL PRODUCTS FAIL:$totalProductFail";
echo "\n\nTOTAL SUCCEED:$totalLotSucceed";
echo "\n\nTOTAL FAIL:$totalLotFail";
?>