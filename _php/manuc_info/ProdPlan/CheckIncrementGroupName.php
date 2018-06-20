<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$sql = "SELECT dr_assigned_id FROM mis_dr_assigned ORDER BY dr_assigned_id DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row=$result->fetch_assoc()) 
    {
        if ($row['dr_assigned_id']!="") 
        {
            $incre = $row['dr_assigned_id']+1;
            echo "GRN".$incre;
        } else {
            echo "GRN1";
        }
    }
}
else
{
    echo "GRN1";
}
?>