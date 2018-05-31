<table class="table table-striped">
          <?php       
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                if(!isset($_POST['sql'])){
                  
                $sql = "SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ='PENDING' ORDER BY PROD_DATE DESC";
                
                }
                else{
                    $sql = $_POST['sql'];
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    echo "<table class='table table-hover table-bordered table-sm fixtable nowrap' id='CreatedLotTable'><thead>    
                    
                    <th>INSPECT</th>
                    <th>JUDGEMENT</th>
                    <th>JUDGE DATE</th>
                    <th>LOT NUMBER</th>
                    <th>LOT QTY</th>
                    <th>LOT CREATOR</th>
                    <th>ITEM CODE</th>
                    <th>ITEM NAME</th>
                    <th>JUDGE BY</th>
                    <th>DEFECT QTY</th>
                    <th>REMARKS</th>
                    </thead><tbody>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    $decide = $row['LOT_JUDGEMENT'];
               

                      

                    echo " <tbody class='content'>";
                    if($decide == 'PENDING'){
                          $sqlQuery = "SELECT REWORK_ID FROM qmd_lot_rework WHERE LOT_NUMBER = '". $row['LOT_NUMBER'] ."' ORDER BY REWORK_ID DESC LIMIT 1";
                          $res123 = $conn->query($sqlQuery);
                          $row2 = $res123->fetch_assoc();
                          $reworkID = $row2['REWORK_ID'];
                          echo "<td class='text-center'>
                          <button type='button' class='btn btn-success bt lotApprove' id='". $row['LOT_NUMBER'] . "'>APPROVE</button>
                          <button type='button' class='btn btn-danger bt lotDisapprove' id='". $row['LOT_NUMBER'] . "' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>";
                          if($reworkID > 0){
                            echo "<td class='text-primary font-weight-bold'>".$row['LOT_JUDGEMENT']."-REWORK(".$reworkID.")</td>";
                          }
                          else{
                            echo "<td class='text-primary font-weight-bold'>" . $row['LOT_JUDGEMENT'] . "</td>";
                          }
                          
                          
                        }
                    else if($decide == 'APPROVED' ){
                          $sqlQuery = "SELECT DEF_QUANTITY FROM qmd_defect_dl WHERE LOT_NUMBER = '". $row['LOT_NUMBER'] ."'";
                          $res12 = $conn->query($sqlQuery);
                          $row1 = $res12->fetch_assoc();
                          $ex = $row1['DEF_QUANTITY'];
                          if($ex !=0){
                          echo "<td class='text-success font-weight-bold text-center' colspan='2'>" . $row['LOT_JUDGEMENT'] . " AFTER SCRAPPING</td>";  
                          /* <button type='button' class='btn btn-info bt lotPending' disabled id='". $row['LOT_NUMBER'] . "'>PENDING</button>
                          <button type='button' class='btn btn-danger bt lotDisapprove' disabled id='". $row['LOT_NUMBER'] . "' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>"; */
                          }
                          else{
                            echo "<td class='text-center'>
                          <button type='button' class='btn btn-info bt lotPending' enabled='true' id='". $row['LOT_NUMBER'] . "'>PENDING</button>
                          <button type='button' class='btn btn-danger bt lotDisapprove' enabled='true' id='". $row['LOT_NUMBER'] . "' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>";
                          echo "<td class='text-success font-weight-bold'>" . $row['LOT_JUDGEMENT'] . "</td>";  
                        }
                          
                        }
                    else if($decide == 'DISAPPROVED'){
                      $lotqty = $row['LOT_QTY'];
                      $defqty = $row['DEFECT_QTY'];
                      if($lotqty == $defqty){
                         echo "<td class='text-danger bg-warning font-weight-bold text-center' colspan='2'>" . $row['LOT_JUDGEMENT'] . "</td>";
                      }
                      else{
                         echo "<td class='text-danger font-weight-bold text-center' colspan='2'>" . $row['LOT_JUDGEMENT'] . "/WAITING FOR RECOVERY</td>";
                      }
                        }
                    else{
                          echo "<td class='text-light bg-success font-weight-bold text-center' colspan='2'>" . $row['LOT_JUDGEMENT'] . "</td>";
                    }
                     /* echo "<td>" . $row['LOT_ID'] . "</td>";
                    echo "<td>" . $row['LOT_JUDGEMENT'] . "</td>"; */
                    echo "<td>" . $row['PROD_DATE'] . "</td>";
                    echo "<td>" . $row['LOT_NUMBER'] . "</td>";
                    echo "<td>" . $row['LOT_QTY'] . "</td>";
                    echo "<td>" . $row['LOT_CREATOR'] . "</td>";
                    echo "<td>" . $row['ITEM_CODE'] . "</td>";
                    echo "<td>" . $row['ITEM_NAME'] . "</td>";
                    echo "<td>" . $row['JUDGE_BY'] . "</td>";
                    echo "<td class='text-danger font-weight-bold'>" . $row['DEFECT_QTY'] . "</td>";
                    echo "<td>" . $row['REMARKS'] . "</td>";
                    }
                    echo "</tbody></table>";
                } 
                else {
                      echo "<table class='table table-hover table-bordered table-sm fixtable nowrap' id='CreatedLotTable'><thead>    
                  
                    <th>INSPECT</th>
                    <th>JUDGEMENT</th>
                    <th>JUDGE DATE</th>
                    <th>LOT NUMBER</th>
                    <th>LOT QTY</th>
                    <th>LOT CREATOR</th>
                    <th>ITEM CODE</th>
                    <th>ITEM NAME</th>
                    <th>JUDGE BY</th>
                    <th>DEFECT QTY</th>
                    <th>REMARKS</th>
                    </thead>
                    <tbody>
                      <td colspan='11' style='text-align:center'><h4>NO LOT DETAIL AVAILABLE</h4></td>
                      </tbody>
                    </table>";
                  }
                $conn->close();
          ?>
        </table>