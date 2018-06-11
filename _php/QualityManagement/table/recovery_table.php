<?php       
              include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

              if(!isset($_POST['sql'])){
                  
                $sql = "SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY";
                
                }
                else{
                    $sql = $_POST['sql'];
                }

              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) 
              {
                  echo "<table class='table-bordered table-sm table table-hover table-striped mt-3 fixtable' id='RecoveryTable'><thead>    
                  <th>REJECTION TYPE</th>
                  <th>JUDGEMENT</th>
                  <th>PROD DATE</th>
                  <th>LOT NUMBER</th>
                  <th>LOT QTY</th>
                  <th>DEFECT QTY</th>
                  <th>LOT CREATOR</th>
                  <th>ITEM CODE</th>
                  <th>ITEM NAME</th>
                  <th>JUDGE BY</th>
                  <th>REMARKS</th>
                  </thead><tbody>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
                  echo " <tbody class='content'>";
                  echo "<td class='text-center'><button type='button' class='btn btn-success reworkbtn' id='". $row['LOT_NUMBER'] . "'>REWORK</button>
                                                <button type='button' class='btn btn-danger scrapbtn' id='". $row['LOT_NUMBER'] . "'>SCRAP</button></td>";
                  echo "<td class='text-danger font-weight-bold'>" . $row['LOT_JUDGEMENT'] . "</td>";
                echo "<td>" . $row['PROD_DATE'] . "</td>";
                  echo "<td>" . $row['LOT_NUMBER'] . "</td>";
                  echo "<td>" . $row['LOT_QTY'] . "</td>";
                  echo "<td class='text-danger'>" . $row['DEFECT_QTY'] . "</td>";
                  echo "<td>" . $row['LOT_CREATOR'] . "</td>";
                  echo "<td>" . $row['ITEM_CODE'] . "</td>";
                  echo "<td>" . $row['ITEM_NAME'] . "</td>";
                  echo "<td>" . $row['JUDGE_BY'] . "</td>";
                  echo "<td>" . $row['REMARKS'] . "</td>";
                  }
                  echo "</tbody></table>";
              } 
              else {
                   echo "<table class='mt-3 table table-striped table-hover table-bordered table-sm tbl2' id='CreatedLotTable'><thead>    
                  <th>REJECTION TYPE</th>
                  <th>LOT JUDGEMENT</th>
                  <th>PROD DATE</th>
                  <th>LOT NUMBER</th>
                  <th>APPROVED QUANTITY</th>
                  <th>LOT CREATOR</th>
                  <th>ITEM CODE</th>
                  <th>ITEM NAME</th>
                  <th>JUDGE BY</th>
                  <th>REMARKS</th>
                  </thead>
                  <tbody>
                    <td colspan='11' style='text-align:center'><h4>NO LOT TO BE RECOVERED</h4></td>
                    </tbody>
                  </table>";
                    
                }
              $conn->close();
        ?>