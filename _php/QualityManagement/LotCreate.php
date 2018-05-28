
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
    width:  95vw; 
}
.lotList{
  width:100%;
}
</style>

<div class="container-fluid pt-1 element">
  <div class="row">
    <div class="col-7" >
      <table>
      <tr>
      <td><input type="textarea" class="tx py-1 form-control form-control-sm" id="Barcode_text" placeholder="SCAN DANPLA SERIAL NUMBER"></td>
      <td><button style='margin-left:-23%' type="button" class="btn btn-outline-secondary py-1 bt" id="AddBtn" onclick="AddBtnClick()">ADD</button></td>
      <td><button style='margin-left:-11%' type="button" class="btn btn-outline-secondary py-1 bt" id="LotCreateBtn" onclick="generateLot()">LOT CREATE</button></td>
      </tr>
      </table>
      </div>
    
    <div class="col-3" ></div>
    <div class="col-2" ></div>
    
    </div>


<div class="row">

  <div class="col-m-4 pt-3">
    <?php       
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

            $sql = "SELECT * FROM qmd_danpla_tempstore ORDER BY TEMP_ID DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                echo "<table class='tbl1 table-hover table-bordered table-sm' id='LotCreationTable'><thead>    
                
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
                echo "<table class='tbl1 table-hover table-bordered table-sm' id='LotCreationTable'><thead>    
                
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
  
 <table>
  <tr>
  <td><h6><span class="badge badge-secondary lblqty">QUANTITY:</span></h6></td>
  <td></td>
  <td><input type="textarea" class="py-1 txtqty form-control form-control-sm" id="Quantity_text" readonly></td>
  </tr>
  </table>

  </div>
    <div class="col"></div>
    <div class="col-m-4">
      <table class="table table-striped lotList" >
        <?php       
              include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

              $sql = "SELECT * FROM qmd_lot_create ORDER BY PROD_DATE DESC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) 
              {
                  echo "<table class='table table-hover table-bordered table-sm' id='CreatedLotTable'><thead>    
         
                  <th>PROD DATE</th>
                  <th>LOT NUMBER</th>
                  <th>LOT QUANTITY</th>
                  <th>LOT CREATOR</th>
                  <th>ITEM_CODE</th>
                  <th>ITEM_NAME</th>
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
                   echo "<table class='table table-hover table-bordered table-sm tbl2' id='CreatedLotTable'><thead>    
        
                  <th>PROD DATE</th>
                  <th>LOT NUMBER</th>
                  <th>LOT QUANTITY</th>
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
    </div>
    
  </div>

</div>
