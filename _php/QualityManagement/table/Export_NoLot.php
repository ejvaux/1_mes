<?php       
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                //if(!isset($_POST['sql'])){
                    
                
                //$sql = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC";
                
                //}
                //else{
                    $sql = $_POST['sql'];
                //}
                $result = $conn->query($sql);

                if ($result->num_rows > 0)

                {
                    $output= "<table class='table-wrapper-LotCreate-3 table-bordered table-sm table table-hover mt-1 text-center' id='pendingLot'>
                    <tr>
                    <td style='width:15%'>PACKING NUMBER</td>
                    <td style='width:15%'>PRODUCTION ORDER NUMBER</td>
                    <td style='width:20%'>PRODUCTION DATE</td>
                    <td style='width:20%'>ITEM CODE</td>
                    <td style='width:20%'>ITEM NAME</td>
                    <td>PRINT QUANTITY</td>
                    <td>PRINTED BY</td>
                    </tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    $output.= "<tr><td>" . $row['PACKING_NUMBER'] . "</td>";
                    $output.= "<td>" . $row['JO_NUM'] . "</td>";
                    $output.= "<td>" . $row['PRINT_DATE'] . "</td>";
                    $output.= "<td>" . $row['ITEM_CODE'] . "</td>";
                    $output.= "<td>" . $row['ITEM_NAME'] . "</td>";
                    $output.= "<td>" . $row['SUMQTY'] . "</td>";
                    $output.= "<td>" . $row['PRINTED_BY'] . "</td></tr>";
                    }
                    $output.= "</table>";
                } 
                else {
                    /* $output.= "Error: " . $sql . "<br>" . $conn->error; */
                    $output= "No Data available.";
                }
                $conn->close();

$filename = "Pending_Danpla_List".date("Ymd").".xls";
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$filename);
  echo $output;
        ?>