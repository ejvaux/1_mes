<!-- InlineCSS -->
  <style>

  .lotTable{
    margin-left:-19%;
    width:150%;
    margin-bottom:5px;
  }
  .defectText{
    width:100%;
    margin-top:2%;
    margin-bottom:2%;
    padding:1%;
  }
  </style>
<!-- JobOrderDataListQuery -->
  <datalist style="width:50px" id="jobOrder">
      <?php

                      include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                          $sql = "SELECT JOB_ORDER_NO FROM mis_prod_plan_dl";
                          $result = $conn->query($sql);
                          while($row = $result->fetch_assoc()) {

                                  echo "<option value='";
                                  echo $row['JOB_ORDER_NO'];
                                  echo "'>";
                                  echo $row['JOB_ORDER_NO'];
                                  echo "</option>";
                          }
                          
                          $conn->close();

                      ?>
      </datalist>

<!-- lotNumDataListQuery -->
<!--   <datalist style="width:50px" id="datalistLotNumber">
  
  </datalist> -->
<!-- InsertDefectModalDetails -->
  <div class="modal fade" id="insertDefect">
    <div class="modal-dialog modal-lg modal-dialog-center">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Insert Reject Item</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <!-- Modal body -->
      <div class="modal-body py-1" id='lotmodal'>
        <form id="modalID">
          <div class="form-group row">
            <div class="col-12">

                <div class="form-group row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Job Order Number:</label></div>
                  <div class="col-4">
                        <input id="JobOrderNo"  list="jobOrder" class="form-control text-center" placeholder="Job Order Number"/>         
                    </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Lot Number:</label></div>
                  <div class="col-4">
                        <select id="datalistLotNumber" class="form-control text-center"  placeholder="Lot Number"/>
                          <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/list/getLotNumbers.php"; ?>
                        </select>
                    </div>    
                  </div>
                  
                <div class="form-group row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Division Code:</label></div>
                  <div class="col-4">
                        <input id="DivCodeID" class="form-control text-center" placeholder="Division Code" readonly/>          
                    </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Division Name:</label></div>
                  <div class="col-4">
                        <input id="DivNameID" class="form-control text-center" placeholder="Division Name" readonly/>    
                    </div>    
                  </div>

                
                <div class="form-group row">
                        <div class="col-2">
                              <label class="col-form-label-sm">Item Code:</label>
                          </div>
                        <div class="col-4">
                              <input id="itemCodeID" class="form-control text-center" placeholder="Item Code" readonly/>         
                          </div>
                        <div class="col-2">
                              <label class="col-form-label-sm">Item Name:</label>
                          </div>
                        <div class="col-4">
                            <input id="itemNameID" class="form-control text-center" placeholder="Item Name" readonly/>    
                          </div>    
                  </div>
                <div class ="form-group row">
                  <div class="col-2">
                      <label class="col-form-label-sm">Lot Quantity:</label>   
                    </div>
                  <div class="col-4">
                        <input id="LotQuantityID" class="form-control text-center" placeholder="Lot Quantity" readonly/>         
                    </div>
                  </div>

                <div class="form-group row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Defect Code:</label>
                    </div>
                  <div class="col-4">
                        <input id="DefectCodeID" class="form-control text-center" placeholder="Defect Code" readonly/>         
                    </div>

                  <div class="col-2">
                      <label class="col-form-label-sm">DEFECT NAME:</label>   
                    </div>
                  <div class="col-4"> 
                      <select id="defectInputID" class="form-control text-center"  placeholder=""/>
                          <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/list/getDefectNames.php"; ?>
                        </select>
                    </div>
                  </div>
                <div class="form-group row">
                    <div class="col-2">
                          <label class="col-form-label-sm">Prod Date:</label>  
                      </div>
                      <div class="col-4">
                            <input id="prodDateID" type="date" class="form-control text-center" placeholder=""/>    
                        </div>
                        <div class="col-2">
                            <label class="col-form-label-sm">Prod Time:</label>  
                        </div>
                        <div class="col-4">
                            <input id="prodTimeID" type="time" class="form-control text-center" placeholder=""/>    
                        </div>
                    </div>


                <div class="form-group row">
                  <div class="col-3">
                        <label class="col-form-label-sm">DEFECT QUANTITY:</label>                  
                    </div>
                  <div class="col-9">
                        <input id="DefQty" type="number" class="form-control form-control-sm" placeholder="INPUT DEFECT QTY"></input>              
                    </div>
                  </div>

                <div class="form-group row">
                  <div class="col-3">
                        <label class="col-form-label-sm">REMARKS:</label>                  
                    </div>
                  <div class="col-9">
                        <textarea id="remarks" type="textarea" class="form-control form-control-sm" name="remarks" placeholder="INPUT REMARKS"></textarea>              
                    </div>
                  </div>

                <div class="form-group row">
                  <div class="col-7">
                                  
                    </div>
                  <div class="col-5" style="text-align:right; padding-top:7px">
                      <button type='button' class='btn btn-danger close' data-dismiss="modal" id='defectConfirm'>CONFIRM DEFECT</button></div>
                    </div>
                  </div>

              </div>
            </div>
            </form>
          </div>


        </div>
      </div>
    </div>
  