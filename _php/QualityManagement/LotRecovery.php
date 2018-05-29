<style>
    .tx{
    height:34px;
    width:250px;
    /* margin-left:-90px; */
    padding-top:10px;
    }
    .bt{
    width:75px;
    font-size: 12px;
    padding: 0px;
    }
    .reworkbtn{
    width:50%;
    font-size: 12px;
    padding: 0px;
    }
    .scrapbtn{
    width:50%;
    font-size: 12px;
    padding: 0px;
    }
    .lblqty{
    /* margin-left:-90px; */
    margin-top:8px;
    padding-top:8px;
    padding-bottom:8px;
    padding-left:10px;
    padding-right:10px;
    }
    .txtqty{
    width:90px;
    }
    .element{
        height: 70vh; 
        width:  95vw;
    }
    .fixTable{
  width:1000px;
    }
    .ctrl{
  margin-top:.7%;
  margin-bottom:-1%
    }
  </style>
<div class="container-fluid pt-1" style="margin-left:.3%">
  <div class="row">
        <!-- <div class="col"></div> -->
        <div class="col-12">
        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="First group">
                    
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddon2">Search</div>
                        </div>
                            <input type="text" id="RecoverySearch" onchange="RecoverySearchLot()" class="form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
                            <div class="input-group-append">
                                <button type="button" class=" btn btn-outline-secondary" id="RecoveryClearSearch" onclick="RecoveryClearSearchLot()" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>

  <div class="row" >
    <div class="col-12">
      <table class="table table-striped">
        
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
                  echo "<table class='table table-hover table-bordered table-sm tbl2 nowrap text-center' id='CreatedLotTable'><thead>    
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
                   echo "<table class='table table-hover table-bordered table-sm tbl2' id='CreatedLotTable'><thead>    
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
      </table>
    </div>
  </div>
</div>
