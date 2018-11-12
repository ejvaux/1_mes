<table class=' table-bordered table-sm table table-hover table-striped mt-1' id='ItemReceivedTable'>
          <?php       
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
                session_start();
                $userAuth = $_SESSION['auth'];
                $user = $_SESSION['text'];
                $sql = "SELECT 
                            TEMP_ID,
                            DANPLA_SERIAL,
                            LOT_NUM,
                            ITEM_CODE,
                            ITEM_NAME,
                            QUANTITY,
                            INSERT_USER
                        FROM qmd_item_tempstore
                        WHERE INSERT_USER = '$user' ORDER BY TEMP_ID DESC";

                $result = $conn->query($sql);
                if (!empty($result)) 
                {
                   echo "<thead>    
                        <th>NO</th>
                        <th>DANPLA SERIAL</th>
                        <th>LOT NUMBER</th>
                        <th>ITEM CODE</th>
                        <th>ITEM NAME</th>
                        <th>QUANTITY</th>
                        <th>INSERT USER</th>
                    </thead>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    echo " <tbody class='content'>";
                    echo "<td>" . $row['TEMP_ID'] . "</td>";
                    echo "<td>" . $row['DANPLA_SERIAL'] . "</td>";
                    echo "<td>" . $row['LOT_NUM'] . "</td>";
                    echo "<td>" . $row['ITEM_CODE'] . "</td>";
                    echo "<td>" . $row['ITEM_NAME'] . "</td>";
                    echo "<td>" . $row['QUANTITY'] . "</td>";
                    echo "<td>" . $row['INSERT_USER'] . "</td>";
                    }
                    echo "</tbody></table>";
                     
              }

                else {
                      echo "<thead>    
                        <th>NO</th>
                        <th>DANPLA SERIAL</th>
                        <th>LOT NUMBER</th>
                        <th>ITEM CODE</th>
                        <th>ITEM NAME</th>
                        <th>QUANTITY</th>
                        <th>INSERT USER</th>
                    </thead>
                    <tbody>

                      <td rowspan= '10' colspan='7' style='text-align:center'><h4>NO DATA AVAILABLE</h4></td>
                      </tbody>
                    </table>";
                  }
                $conn->close();
          ?>