<?php

////below codes is for summarization of logs table
include '1_MES_DB.php';

$sql4 = "SELECT DISTINCT(JO_NUM) from mis_product";
$res4 = $conn->query($sql4);

while ($row4 = $res4->fetch_assoc()) {
    # code...

    $jonum = $row4['JO_NUM'];
    $sql5 = "SELECT SUM(PRINT_QTY) as prodresult FROM mis_product WHERE JO_NUM='$jonum'";
    $result = $conn->query($sql5);
    $row = $result->fetch_assoc();
    $sum = $row['prodresult'];
    echo "<br>";

    $sql6 = "SELECT * from MIS_SUMMARIZE_RESULTS WHERE JOB_ORDER_NO='$jonum'";
    $result2 = $conn->query($sql6);
    $row2 = $result2->fetch_assoc();
    $summarize_jo_no = $row2['JOB_ORDER_NO'];

    $query;
    if ($summarize_jo_no == "") {
        # code...
        # insertquery

        $sql7 = "insert into mis_summarize_results(JOB_ORDER_NO,PROD_RESULT) values('$jonum','$sum')";
        mysqli_query($conn, $sql7);
        echo "New record created successfully";
    } else {
#code...
        #update query here

        echo "updatequery1";

    }

}
