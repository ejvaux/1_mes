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
<!-- ______________________________________________JobOrderDataListQuery________________________________________________ -->
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
<!-- ______________________________________________InsertDefectModalDetails_____________________________________________ -->
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

                <div class="row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Job Order Number:</label>
                  </div>
                  <div class="col-4">
                        <input id="JobOrderNo"  required="true" list="jobOrder" class="form-control text-center" placeholder="Job Order Number"/>         
                  </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Lot Number:</label>
                  </div>
                  <div class="col-4">
                        <select id="datalistLotNumber" class="form-control text-center"  placeholder="Lot Number"/>
                          <option>--SELECT HERE--</option>
                          <?php /* include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/list/getLotNumbers.php"; */ ?>
                        </select>
                  </div>    
                </div> <!-- end row 1 -->
                
<!--                 <div class="row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Job Order Number:</label>
                  </div>
                  <div class="col-4">
                        <input id="JobOrderNo"  required="true" list="jobOrder" class="form-control text-center" placeholder="Job Order Number"/>         
                  </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Lot Number:</label>
                  </div>
                  <div class="col-4">
                        <select id="datalistLotNumber" class="form-control text-center"  placeholder="Lot Number"/>
                          
                        </select>
                  </div>    
                </div> -->
                
                <div class="row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Division Code:</label>
                  </div>
                  <div class="col-4">
                        <input id="DivCodeID" class="form-control text-center" placeholder="Division Code" readonly/>          
                  </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Division Name:</label>
                  </div>
                  <div class="col-4">
                        <input id="DivNameID" class="form-control text-center" placeholder="Division Name" readonly/>    
                  </div>    
                </div> <!-- end row 2  -->

                <div class="row">
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
                </div> <!-- end row 3 -->

                <div class ="row">
                  <div class="col-2">
                      <label class="col-form-label-sm">Lot Quantity:</label>   
                  </div>
                  <div class="col-4">
                        <input id="LotQuantityID" class="form-control text-center" placeholder="Lot Quantity" readonly/>         
                  </div>
                </div> <!-- end row 4 -->

                <div class="row">
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
                </div> <!-- end row 5 -->

                <div class="row">
                  <div class="col-2">
                    <label class="col-form-label-sm">Prod Date:</label>  
                  </div>
                  <div class="col-4">
                    <input id="prodDateID" required="true" type="date" class="form-control text-center" placeholder=""/>    
                  </div>
                  <div class="col-2">
                    <label class="col-form-label-sm">Prod Time:</label>  
                  </div>
                  <div class="col-4">
                    <input id="prodTimeID" required="true" type="time" class="form-control text-center" placeholder=""/>    
                  </div>
                </div> <!-- end row 6 -->

                <div class="row">
                  <div class="col-3">
                        <label class="col-form-label-sm">DEFECT QUANTITY:</label>                  
                  </div>
                  <div class="col-9">
                        <input id="DefQty" type="number" required="true" class="form-control form-control-sm" placeholder="INPUT DEFECT QTY"></input>              
                  </div>
                </div> <!-- end row 7 -->

                <div class="row">
                  <div class="col-3">
                    <label class="col-form-label-sm">REMARKS:</label>                  
                  </div>
                  <div class="col-9">
                        <textarea id="remarks" type="textarea" class="form-control form-control-sm" name="remarks" placeholder="INPUT REMARKS"></textarea>              
                  </div>
                </div> <!-- end row 8 -->

                <div class="row">
                  <div class="col-7">
                                  
                  </div>
                  <div class="col-5" style="text-align:right; padding-top:7px">
                    <button type='button' class='btn btn-danger close' data-dismiss="modal" id='defectConfirm'>CONFIRM DEFECT</button></div>
                  </div>
                </div> <!-- end row 9 -->

            </div>
          </div>
        </form>
      </div>
      <!-- close modal body -->

      </div>
    </div>
  </div>
  <!-- ________________________________________________END_InsertDefectModalDetailsT__________________________________________ -->
  <datalist style="width:50px" id="lotNumber">
      <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/list/getLotNumbers.php"; ?>
      </datalist>
  <!-- _____________________________________________________EDIT_DEFECT_MODAL_________________________________________________ -->
    <div class="modal fade" id="editDefect">
    <div class="modal-dialog modal-lg modal-dialog-center">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Reject Item</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <!-- Modal body -->
      <div class="modal-body py-1" id='lotmodal'>
        <form id="editModalID">
          <div class="form-group row">
            <div class="col-12">

                <div class="form-group row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Job Order Number:</label></div>
                  <div class="col-4">
                        <input id="eJobOrderNo"  required="true" list="jobOrder" class="form-control text-center" placeholder="Job Order Number"/>         
                    </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Lot Number:</label></div>
                  <div class="col-4">
                        <input id="edatalistLotNumber" required="true" list="lotNumber" class="form-control text-center"  placeholder="Lot Number"/>
                    </div>    
                  </div>
                  
                <div class="form-group row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Division Code:</label></div>
                  <div class="col-4">
                        <input id="eDivCodeID" class="form-control text-center" placeholder="Division Code" readonly/>          
                    </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Division Name:</label></div>
                  <div class="col-4">
                        <input id="eDivNameID" class="form-control text-center" placeholder="Division Name" readonly/>    
                    </div>    
                  </div>

                
                <div class="form-group row">
                        <div class="col-2">
                              <label class="col-form-label-sm">Item Code:</label>
                          </div>
                        <div class="col-4">
                              <input id="eitemCodeID" class="form-control text-center" placeholder="Item Code" readonly/>         
                          </div>
                        <div class="col-2">
                              <label class="col-form-label-sm">Item Name:</label>
                          </div>
                        <div class="col-4">
                            <input id="eitemNameID" class="form-control text-center" placeholder="Item Name" readonly/>    
                          </div>    
                  </div>
                <div class ="form-group row">
                  <div class="col-2">
                      <label class="col-form-label-sm">Lot Quantity:</label>   
                    </div>
                  <div class="col-4">
                        <input id="eLotQuantityID" class="form-control text-center" placeholder="Lot Quantity" readonly/>         
                    </div>
                  </div>

                <div class="form-group row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Defect Code:</label>
                    </div>
                  <div class="col-4">
                        <input id="eDefectCodeID" class="form-control text-center" placeholder="Defect Code" readonly/>         
                    </div>

                  <div class="col-2">
                      <label class="col-form-label-sm">DEFECT NAME:</label>   
                    </div>
                  <div class="col-4"> 
                      <select id="edefectInputID" class="form-control text-center"  placeholder=""/>
                          <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/list/getDefectNames.php"; ?>
                        </select>
                    </div>
                  </div>
                <div class="form-group row">
                    <div class="col-2">
                          <label class="col-form-label-sm">Prod Date:</label>  
                      </div>
                      <div class="col-4">
                            <input id="eprodDateID" required="true" type="date" class="form-control text-center" placeholder=""/>    
                        </div>
                        <div class="col-2">
                            <label class="col-form-label-sm">Prod Time:</label>  
                        </div>
                        <div class="col-4">
                            <input id="eprodTimeID" required="true" type="time" class="form-control text-center" placeholder=""/>    
                        </div>
                    </div>


                <div class="form-group row">
                  <div class="col-3">
                        <label class="col-form-label-sm">DEFECT QUANTITY:</label>                  
                    </div>
                  <div class="col-9">
                        <input id="eDefQty" type="number" required="true" class="form-control text-center" placeholder="INPUT DEFECT QTY"></input>              
                    </div>
                  </div>

                <div class="form-group row">
                  <div class="col-3">
                        <label class="col-form-label-sm">REMARKS:</label>                  
                    </div>
                  <div class="col-9">
                        <textarea id="eremarks" type="textarea" class="form-control form-control-sm" name="remarks" placeholder="INPUT REMARKS"></textarea>              
                    </div>
                  </div>

                <div class="form-group row">
                  <div class="col-2">
                         <label class="col-form-label-sm">DEFECT ID:</label>  
                    </div>
                  <div class="col-2">
                      <input id="defectID" type="text" required="true" class="form-control text-center" placeholder="" readonly/>   
                    </div>
                  <div class="col"></div>
                  <div class="col-5" style="text-align:right; padding-top:7px">
                      <button type='button' class='btn btn-danger close' data-dismiss="modal" id='updateDefect'>UPDATE DEFECT</button></div>
                    </div>
                  </div>

              </div>
            </div>
            </form>
          </div>


        </div>
      </div>
    </div>