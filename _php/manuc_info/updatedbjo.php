<?php


$conn = mysqli_connect("localhost","root","","masterdatabase");
if(!$conn){die("Connection failed: ".mysqli_connect_error());}

$ctr1=100;
$ctr2 =2138;
while($ctr2<=2825)
{
  /*   $sql="SELECT * FROM mis_prod_plan_dl WHERE JOB_ORDER_NO = CONCAT('1JO00',$ctr2)";
    $result = $conn-> query($sql);
    while($row = $result->fetch_assoc())
    {
        echo "<br>";
        echo $row['JOB_ORDER_NO'];
    }
 */

$sql="UPDATE mis_prod_plan_dl SET JOB_ORDER_NO=CONCAT('100000',$ctr1) WHERE JOB_ORDER_NO = CONCAT('1JO00',$ctr2)";
$result = $conn->query($sql);

$sql2="UPDATE mis_product SET JO_NUM=CONCAT('100000',$ctr1) WHERE JO_NUM = CONCAT('1JO00',$ctr2)";
$result2 = $conn->query($sql2);

$sql3="UPDATE mis_summarize_results SET JOB_ORDER_NO=CONCAT('100000',$ctr1) WHERE JOB_ORDER_NO = CONCAT('1JO00',$ctr2)";
$result3 = $conn->query($sql3);

$sql4="UPDATE qmd_lot_create SET JO_NUM=CONCAT('100000',$ctr1) WHERE JO_NUM = CONCAT('1JO00',$ctr2)";
$result4 = $conn->query($sql4);

echo "<br>".$ctr1." success";

  $ctr2+=1;
  $ctr1+=1;
    
}

