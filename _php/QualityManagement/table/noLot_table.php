

<div class="p-2">
    <table class='table-wrapper-LotCreate-3 table-bordered table-sm table table-hover mt-1 text-center' id="pendingLot">
        <?php       
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  


                if(!isset($_POST['sql'])){
                  
                $sql = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC";
                
                }
                else{
                    $sql = $_POST['sql'];
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    echo "<thead>    
          
                    <th style='width:15%'>PACKING NUMBER</th>
                    <th style='width:15%'>JOB ORDER NO</th>
                    <th style='width:20%'>PRINT DATE</th>
                    <th style='width:20%'>ITEM CODE</th>
                    <th style='width:20%'>ITEM NAME</th>
                    <th>PRINT QTY</th>
                    <th>PRINTED BY</th>
                    </thead><tbody>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    echo " <tbody>";
              
                
                    echo "<td>" . $row['PACKING_NUMBER'] . "</td>";
                    echo "<td>" . $row['JO_NUM'] . "</td>";
                    echo "<td>" . $row['PRINT_DATE'] . "</td>";
                    echo "<td>" . $row['ITEM_CODE'] . "</td>";
                    echo "<td>" . $row['ITEM_NAME'] . "</td>";
                    echo "<td>" . $row['SUMQTY'] . "</td>";
                    echo "<td>" . $row['PRINTED_BY'] . "</td>";
                    }
                    echo "</tbody></table>";
                } 
                else {
                    /* echo "Error: " . $sql . "<br>" . $conn->error; */
                    echo "<thead>    
          
                    <th>PACKING NUMBER</th>
                    <th>PRINT DATE</th>
                    <th>ITEM CODE</th>
                    <th>ITEM NAME</th>
                    <th>PRINT QTY</th>
                    <th>PRINTED BY</th>
                    </thead>
                    <tbody>
                      <td colspan='6' style='text-align:center'><h4>LOT DETAILS</h4></td>
                      </tbody>
                    </table>";
                }
                $conn->close();
            ?>
        </table>
    </div>

      