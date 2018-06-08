<table class="table-wrapper-2 table-bordered table-sm table table-hover table-striped mt-3 ml-5" id='CreatedLotTable' >
          <?php       
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  


                if(!isset($_POST['sql'])){
                  
                $sql = "SELECT * FROM qmd_lot_create ORDER BY PROD_DATE DESC";
                
                }
                else{
                    $sql = $_POST['sql'];
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    echo "<thead>    
          
                    <th>PROD DATE</th>
                    <th>LOT NUMBER</th>
                    <th>QUANTITY</th>
                    <th>LOT CREATOR</th>
                    <th>ITEM CODE</th>
                    <th>ITEM NAME</th>
                    </thead><tbody>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    echo " <tbody>";
              
                
                    echo "<td>" . $row['PROD_DATE'] . "</td>";
                    echo "<td>" . $row['LOT_NUMBER'] . "</td>";
                    echo "<td>" . $row['LOT_QTY'] . "</td>";
                    echo "<td>" . $row['LOT_CREATOR'] . "</td>";
                    echo "<td>" . $row['ITEM_CODE'] . "</td>";
                    echo "<td>" . $row['ITEM_NAME'] . "</td>";
                    }
                    echo "</tbody></table>";
                } 
                else {
                    echo "<thead>    
          
                    <th>PROD DATE</th>
                    <th>LOT NUMBER</th>
                    <th>QUANTITY</th>
                    <th>LOT CREATOR</th>
                    <th>ITEM_CODE</th>
                    <th>ITEM_NAME</th>
                    </thead>
                    <tbody>
                      <td colspan='6' style='text-align:center'><h4>LOT DETAILS</h4></td>
                      </tbody>
                    </table>";
                }
                $conn->close();
          ?>
        </table>