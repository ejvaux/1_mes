
<style>
.tx{
  height:34px;
  width:380px;
  /* margin-left:-1%; */
  /* margin-top:5%; */
  /* padding-top:10px; */
}
/* .filterT{
  margin-left:-5%;
  height:34px;
  width:200px;
} */
.bt{
  width:75px;
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
.element{
    height: 60%; 
    width:  95%;
}
.searchBtn{
margin-left:-70%;
}
.ctrl{
  margin-top:.7%;
  margin-bottom:-1%
}

</style>

<!-- <select name="value" id="filterText" onchange="filterText()" style="margin-left:15px;margin-top:8px"> -->

<div class="container-fluid pt-1" style="margin-left:.3%">
  <!-- <div class="row" style="margin-left:.1%">
    <div class="col-m-6">
      <table>
          <tr>
          <td><select name="value" class ="filterT form-control form-control-sm" id="filterText" onchange="filterJudgement()">
                  <option value = "ALL">FILTER TABLE</option>
                  <option value = "PENDING">PENDING</option>
                  <option value = "APPROVED">APPROVED</option>
                  <option value = "DISAPPROVED">DISAPPROVED</option>
                </select></td>
          <td><input type="text" onchange="searchLot()" class="tx py-1 form-control form-control-sm" id="searchText" placeholder="SEARCH HERE AND PRESS ENTER." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING"></td>
          <td><button style="padding-top:-30%;padding-bottom:-30%" type="button" class="btn btn-outline-secondary" id="ClearSearch" onclick="ClearSearchLot()" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button></td>
          </tr>
        </table>
      </div>
    </div> -->


  <div class="row">
            <div class="col-12">
              <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Filter</div>
                    </div>
                      <select name="value" class ="filterT form-control" id="filterText" onchange="filterJudgement()">
                          <option value = "ALL">FILTER TABLE</option>
                          <option value = "PENDING">PENDING</option>
                          <option value = "APPROVED">APPROVED</option>
                          <option value = "DISAPPROVED">DISAPPROVED</option>
                        </select>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Search</div>
                    </div>
                    <input type="text" id="searchText" onchange="searchLot()" class="py-1 form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
                    <div class="input-group-append">
                      <button type="button" class="btn btn-outline-secondary" id="ClearSearch" onclick="ClearSearchLot()  " data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button>
                    </div>
                  </div>
                </div>
              </div>
    


    </div>
  
  <div class="row">
    <div class="col-12">
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
      </div>
    <div class="col">
        </div>
    </div>
  </div>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/_modal/DefectModal.php"; ?>
