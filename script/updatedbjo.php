<?php
$servername = "localhost";
$username = "root";     
$password = "";
$dbname = "masterdatabase";

$conn = new mysqli($servername, $username, $password,$dbname);   
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ctr1=0;
    $ctr2 =0;
    while($ctr2<=9)
    {
       /*  $sql="SELECT JOB_ORDER_NO, CONCAT('12000',$ctr1) WHERE JOB_ORDER_NO = CONCAT('1J000',$ctr2) ORDER BY ";
        $result = $conn->query($sql); */
        
    $sql="UPDATE mis_prod_plan_dl SET JOB_ORDER_NO=CONCAT('12000000',$ctr1) WHERE JOB_ORDER_NO = CONCAT('1JO00000',$ctr2)";
    $result = $conn->query($sql);

    $sql2="UPDATE mis_product SET JO_NUM=CONCAT('12000000',$ctr1) WHERE JO_NUM = CONCAT('1JO00000',$ctr2)";
    $result2 = $conn->query($sql2);

    $sql3="UPDATE mis_summarize_results SET JOB_ORDER_NO=CONCAT('12000000',$ctr1) WHERE JOB_ORDER_NO = CONCAT('1JO00000',$ctr2)";
    $result3 = $conn->query($sql3);

    $sql4="UPDATE qmd_lot_create SET JO_NUM=CONCAT('12000000',$ctr1) WHERE JO_NUM = CONCAT('1JO00000',$ctr2)";
    $result4 = $conn->query($sql4);

    echo "\n".$ctr1." success";

    $ctr2+=1;
    $ctr1+=1;
    }
$conn->close();
?>