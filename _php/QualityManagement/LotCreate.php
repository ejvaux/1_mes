
<style>
.tablesss{
  margin-left:1vw;
}
.table-wrapper-LotCreate {
  display: block;
  max-width: 40vw;
  max-height: 65vh;
  overflow-y: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}
.table-wrapper-LotCreate-2 {
  display: block;
  min-width: 52.5vw;
  max-height: 65vh;
  overflow-y: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
  white-space:nowrap;
  
}
/* #createdLotTable thead{
position: fixed;
}
#createdLotTable tbody{
position: inline-block;
} */
</style>

<div class="container-fluid pt-1">
  <div class="row">
            <div class="col-12">
              <div class="d-flex btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="mr-auto p-2 input-group">  
                  <input type="textarea" class="form-control form-control-sm" id="Barcode_text" placeholder="SCAN DANPLA SERIAL NUMBER">
                    <div class="input-group-append">
                      <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="AddBtn" onclick="AddBtnClick()">ADD</button>
                      <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="LotCreateBtn" onclick="generateLot()">LOT CREATE</button></td>
                    </div>
                </div>
                <div class="p-2 input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">FROM</div>
                  </div>
                    <input id="lotDate1" type="date" class="py-1 form-control" onchange="SearchLotCreate()">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">TO</div>
                  </div>
                    <input id="lotDate2" type="date" class="py-1 form-control" onchange="SearchLotCreate()">
                </div>


                <div class="p-2 input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Search</div>
                    </div>
                    <input type="text" id="SearchCreate" onkeypress="SearchLotCreate()" class="py-1 form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
                    <div class="input-group-append">
                      <button style="z-index:0" type="button" class="btn btn-outline-secondary" id="ClearSearch" onclick="ClearSearchLotCreate()" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button>
                    </div>
                  </div>
                </div>
              </div>
    </div>
<div class="row">
  <div class="d-flex col-12 justify-content-between">
      <table class="table-wrapper-LotCreate table-bordered table-sm table table-hover mt-3" id='LotCreationTable' >
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

    

        <div id="createdLotTable">
          <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/createdLot_table.php"; ?>
          </div>
    </div>
  </div>
</div>
