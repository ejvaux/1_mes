<?php

    $output= '<br><table class="table-hover table-bordered nowrap example-table" style="background-color: white;overflow: auto; width: 80%; text-align: center;margin: 0 auto" id="example-table">';

    if(!isset($_SESSION))
        {
        session_start();
        }

    $userAuth = $_SESSION['auth'];

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
    $sql = $_GET['sql'];
    $result = $conn->query($sql);
    $ctr = 0;
    if (!empty($result)) 
        {
            $output .= "<thead style='color:black;font-size: 14px;'>    
                          <th style='text-align: center;border: 1px solid #ddd;'>NO</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>JUDGEMENT</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>LOT CREATED</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>LOT NUMBER</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>LOT QTY</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>LOT CREATOR</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>ITEM CODE</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>ITEM NAME</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>JUDGE BY</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>DEFECT QTY</th>
                          <th style='text-align: center;border: 1px solid #ddd;'>REMARKS</th>
                        </thead>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    $ctr += 1;
                    $output .= " <tbody class='content'><tr>";
                    $output .= "<td>" . $ctr . "</td>";
                    $output .= "<td>" . $row['LOT_JUDGEMENT'] . "</td>";
                    $output .= "<td>" . $row['PROD_DATE'] . "</td>";
                    $output .= "<td>" . $row['LOT_NUMBER'] . "</td>";
                    $output .= "<td>" . $row['LOT_QTY'] . "</td>";
                    $output .= "<td>" . $row['LOT_CREATOR'] . "</td>";
                    $output .= "<td>" . $row['ITEM_CODE'] . "</td>";
                    $output .= "<td>" . $row['ITEM_NAME'] . "</td>";
                    $output .= "<td>" . $row['JUDGE_BY'] . "</td>";
                    $output .= "<td>" . $row['DEFECT_QTY'] . "</td>";
                    $output .= "<td>" . $row['REMARKS'] . "</td></tr></tbody>";
                    }
                    $output .= "</table>";
        }

    $filename = "QC-JudgementResult".date("Ymd").".xls";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename='.$filename);
    echo $output;
    ?>