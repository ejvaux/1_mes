<table class=' text-center mt-3 table-wrapper-1 table table-striped table-hover table-bordered table-sm nowrap' id='lot_judgement'>
          <?php       
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
                session_start();
                $userAuth = $_SESSION['auth'];
                if(!isset($_POST['sql'])){
                
                  /* SELECT SUM(mis_product.PRINT_QTY) as LOTQTY, qmd_lot_create.*
                        FROM qmd_lot_create 
                        LEFT JOIN mis_product ON qmd_lot_create.LOT_NUMBER = mis_product.LOT_NUM
                        WHERE qmd_lot_create.LOT_JUDGEMENT ='PENDING' GROUP BY qmd_lot_create.LOT_NUMBER 
                        ORDER BY qmd_lot_create.PROD_DATE DESC LIMIT 100 */

                $sql = "SELECT * FROM qmd_lot_create 
                        WHERE LOT_JUDGEMENT ='PENDING' ORDER BY PROD_DATE DESC LIMIT 100";
                
                }
                else{
                    $sql = $_POST['sql'];
                }

                $result = $conn->query($sql);
                if (!empty($result)) 
                /* if ($result->num_rows > 0 || $result->num_rows <> '' || $result->num_rows <> null)  */
                {
                     if($userAuth == 'CQ' || $userAuth =='C' || $userAuth =='A' || $userAuth == 'CG'){
                    echo "<thead>    
                    
                    <th>INSPECT</th>
                    <th>JUDGEMENT</th>
                    <th>LOT CREATED</th>
                    <th style='width:30%'>LOT NUMBER</th>
                    <th>LOT QTY</th>
                    <th>LOT CREATOR</th>
                    <th>ITEM CODE</th>
                    <th style='width:30%'>ITEM NAME</th>
                    <th>JUDGE BY</th>
                    <th>DEFECT QTY</th>
                    <th>REMARKS</th>
                    </thead>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    $decide = $row['LOT_JUDGEMENT'];
                    $epsonjudge = $row['EPSON_QC_APPROVED'];
                    
                      


                    echo " <tbody class='content'>";
                    if($decide == 'PENDING'){
                        if($userAuth == 'CQ' || $userAuth =='C' || $userAuth =='A'){//authority allowed

                            if($epsonjudge == 'PENDING'){

                              echo "<td class='text-center'>
                                <button type='button' class='btn btn-outline-primary bt epsonApprove' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."'>APPROVE</button>
                                <button type='button' class='btn btn-outline-danger bt lotDisapprove' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>";
                              $sqlQuery = "SELECT REWORK_ID FROM qmd_lot_rework WHERE LOT_NUMBER = '". $row['LOT_NUMBER'] ."' ORDER BY REWORK_ID DESC LIMIT 1";
                                $res123 = $conn->query($sqlQuery);
                                $row2 = $res123->fetch_assoc();
                                $reworkID = $row2['REWORK_ID'];

                                if($reworkID > 0){
                                  echo "<td class='text-success font-weight-bold'>WAITING-REWORK(".$reworkID."):BQICS APPROVAL</td>";
                                  }
                                else{
                                  echo "<td class='text-success font-weight-bold'>WAITING:BQICS APPROVAL</td>";
                                  }
                              }
                            else{
                              echo "<td class='text-center'>
                                <button type='button' class='btn btn-success bt lotApprove' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."'>APPROVE</button>
                                <button type='button' class='btn btn-danger bt lotDisapprove' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>";
                              $sqlQuery = "SELECT REWORK_ID FROM qmd_lot_rework WHERE LOT_NUMBER = '". $row['LOT_NUMBER'] ."' ORDER BY REWORK_ID DESC LIMIT 1";
                                $res123 = $conn->query($sqlQuery);
                                $row2 = $res123->fetch_assoc();
                                $reworkID = $row2['REWORK_ID'];
                                 if($reworkID > 0){
                                  echo "<td class='text-primary font-weight-bold'>WAITING-REWORK(".$reworkID.")</td>";
                                }
                                else{
                                  echo "<td class='text-primary font-weight-bold'>WAITING</td>";
                                }
                              }
                          } //authority allowed
                        else{ //authority not allowed
                          if($epsonjudge == 'PENDING'){
                              echo "<td class='text-center'>
                                <button type='button' disabled class='btn btn-outline-secondary bt epsonApprove' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."'>APPROVE</button>
                                <button type='button' disabled class='btn btn-outline-secondary bt lotDisapprove' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>";
                              $sqlQuery = "SELECT REWORK_ID FROM qmd_lot_rework WHERE LOT_NUMBER = '". $row['LOT_NUMBER'] ."' AND ITEM_CODE = '".$row['ITEM_CODE']."' ORDER BY REWORK_ID DESC LIMIT 1";
                                $res123 = $conn->query($sqlQuery);
                                $row2 = $res123->fetch_assoc();
                                $reworkID = $row2['REWORK_ID'];
                                if($reworkID > 0){
                                    echo "<td class='text-success font-weight-bold'>WAITING-REWORK(".$reworkID."):EPSON APPROVAL</td>";
                                    }
                                  else{
                                    echo "<td class='text-success font-weight-bold'>WAITING:EPSON APPROVAL</td>";
                                    }
                              /*echo "<td class='text-center'>
                              <button type='button' disabled class='btn btn-success bt epsonApprove' id='". $row['LOT_NUMBER'] . "'>APPROVE</button>
                              <button type='button' disabled class='btn btn-danger bt lotDisapprove' id='". $row['LOT_NUMBER'] . "' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>";
                              echo "<td class='text-success font-weight-bold'>WAITING:EPSON APPROVAL</td>";   */
                            }
                          else{
                            echo "<td class='text-center'>
                              <button type='button' class='btn btn-success bt lotApprove' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."'>APPROVE</button>
                              <button type='button' class='btn btn-danger bt lotDisapprove' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>";
                            $sqlQuery = "SELECT REWORK_ID FROM qmd_lot_rework WHERE LOT_NUMBER = '". $row['LOT_NUMBER'] ."' AND ITEM_CODE = '".$row['ITEM_CODE']."' ORDER BY REWORK_ID DESC LIMIT 1";
                              $res123 = $conn->query($sqlQuery);
                              $row2 = $res123->fetch_assoc();
                              $reworkID = $row2['REWORK_ID'];
                                if($reworkID > 0){
                                  echo "<td class='text-primary font-weight-bold'>WAITING-REWORK(".$reworkID.")</td>";
                                  }
                                else{
                                  echo "<td class='text-primary font-weight-bold'>WAITING</td>";
                                  }
                            }
                        } // authority not allowed
                     
                      } //decide: pending
                    else if($decide == 'APPROVED' ){
                          if($row['WAREHOUSE_RECEIVE'] == 'RECEIVED'){
                            echo "<td class='text-info font-weight-bold text-center' colspan='2'>" . $row['LOT_JUDGEMENT'] . "/TRANSFERRED IN NEXT WAREHOUSE</td>";
                          }
                          else{
                            echo "<td class='text-center'>
                          <button type='button' class='btn btn-info bt lotPending' enabled='true' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."'>PENDING</button>
                          <button type='button' class='btn btn-danger bt lotDisapprove' enabled='true' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."' data-toggle='modal' data-target='#myModal'>DISAPPROVE</button></td>";
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
                    echo "<td class='text-left'><button type='button' class='btn btn-outline-secondary bt lotDanpla' id='". $row['LOT_NUMBER'] .'@'. $row['ITEM_CODE'] ."' data-toggle='modal' data-target='#myModalDanpla'>VIEW</button>          <strong>". $row['LOT_NUMBER'] . "</strong></td>";
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
                else { //if auth is not qc
                  echo "<thead>    
                    <th>JUDGEMENT</th>
                    <th>LOT CREATED</th>
                    <th style='width:30%'>LOT NUMBER</th>
                    <th>LOT QTY</th>
                    <th>LOT CREATOR</th>
                    <th>ITEM CODE</th>
                    <th style='width:30%'>ITEM NAME</th>
                    <th>JUDGE BY</th>
                    <th>DEFECT QTY</th>
                    <th>REMARKS</th>
                    </thead>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    echo " <tbody class='content'>";
                    echo "<td>" . $row['LOT_JUDGEMENT'] . "</td>";
                    echo "<td>" . $row['PROD_DATE'] . "</td>";
                    echo "<td class='text-left'><button type='button' class='btn btn-outline-secondary bt lotDanpla' id='". $row['LOT_NUMBER'] . "' data-toggle='modal' data-target='#myModalDanpla'>VIEW</button>          <strong>". $row['LOT_NUMBER'] . "</strong></td>";
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
              }

                else {
                      echo "<thead>    
                  
                    <th style='width:10%'>INSPECT</th>
                    <th style='width:10%'>JUDGEMENT</th>
                    <th style='width:10%'>JUDGE DATE</th>
                    <th style='width:10%'>LOT NUMBER</th>
                    <th style='width:10%'>LOT QTY</th>
                    <th style='width:10%'>LOT CREATOR</th>
                    <th>ITEM CODE</th>
                    <th style='width:10%'>ITEM NAME</th>
                    <th style='width:10%'>JUDGE BY</th>
                    <th>DEFECT QTY</th>
                    <th style='width:10%'>REMARKS</th>
                    </thead>
                    <tbody>
                      <td colspan='11' style='text-align:center'><h4>NO LOT DETAIL AVAILABLE</h4></td>
                      </tbody>
                    </table>";
                  }
                $conn->close();
          ?>