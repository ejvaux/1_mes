
<style>
.tbl1{
  width:450px;
  /* margin-left:-90px; */
}
.tx{
  height:34px;
  width:250px;
  margin-left:-6%;
  padding-top:10px;
}
.bt{
  
  width:100%;
  padding-top:10px;
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
    width:  96vw; 
}
.tablesss{
  margin-left:1vw;
}
.table-wrapper-2 {
    display: block;
    max-width: 93.6%;
    max-height: 430px;
    overflow-y: auto;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}

</style>

<div class="container-fluid pt-1">
  <div class="row">
            <div class="col-12">
              <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="input-group">  
                  <input type="textarea" class="form-control form-control-sm" id="Barcode_text" placeholder="SCAN DANPLA SERIAL NUMBER">
                    <div class="input-group-append">
                      <button type="button" class="btn btn-outline-secondary py-1" id="AddBtn" onclick="AddBtnClick()">ADD</button>
                      <button type="button" class="btn btn-outline-secondary py-1" id="LotCreateBtn" onclick="generateLot()">LOT CREATE</button></td>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Search</div>
                    </div>
                    <input type="text" id="SearchCreate" onchange="SearchLotCreate()" class="py-1 form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
                    <div class="input-group-append">
                      <button style="z-index:0" type="button" class="btn btn-outline-secondary" id="ClearSearch" onclick="ClearSearchLotCreate()" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button>
                    </div>
                  </div>
                </div>
              </div>
    </div>
<div class="row">
    <div class="col-5.5 tablesss">
      <table class="table-wrapper-1 table-bordered table-sm table table-hover table-striped mt-3" id='LotCreationTable' >
                <?php       
                        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT * FROM qmd_danpla_tempstore ORDER BY TEMP_ID DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) 
                        {
                            echo "<thead>    
                            
                            <th>DANPLA SERIES</th>
                            <th>JOBORDER NO</th>
                            <th>ITEM CODE</th>
                            <th>QUANTITY</th>
                            <th>MACHINE CODE</th>
                            </thead><tbody>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) 
                            {
                            echo " <tbody>";
                        
                            echo "<td>" . $row['DANPLA_SERIAL'] . "</td>";
                            echo "<td>" . $row['JO_NUM'] . "</td>";
                            echo "<td>" . $row['ITEM_CODE'] . "</td>";
                            echo "<td>" . $row['QUANTITY'] . "</td>";
                            echo "<td>" . $row['MACHINE_CODE'] . "</td>";
                            }
                            echo "</tbody></table>";
                        } 
                        else {
                            echo "<thead>    
                            
                            <th>DANPLA SERIES</th>
                            <th>JOBORDER NO</th>
                            <th>ITEM CODE</th>
                            <th>QUANTITY</th>
                            <th>MACHINE CODE</th>
                            </thead>
                            <tbody>
                                <td colspan='5' style='text-align:center'><h4>INSERT DANPLA DETAILS</h4></td>
                              </tbody>
                            </table>";
                        }
                        $conn->close();
                  ?>
                </table>
      </div>
    
    <div class="col-6.5" >
      <div id="createdLotTable">
    <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/createdLot_table.php"; ?>
        </div>
      </div>
    </div>
</div>
