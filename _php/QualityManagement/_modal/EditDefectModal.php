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
  <div class="modal fade" id="editDefect">
    <div class="modal-dialog modal-lg modal-dialog-center">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Reject Item</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
      <div class="modal-body py-1" id='elotmodal'>
        <form id="emodalID">
          <div class="form-group row">
            <div class="col-12">

                <div class="row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Job Order Number:</label>
                  </div>
                  <div class="col-4">
                        <input id="eJobOrderNo"  list="ejobOrder" class="form-control text-center" placeholder="Job Order Number" required/>         
                  </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Lot Number:</label>
                  </div>
                  <div class="col-4">
                        <select id="edatalistLotNumber" class="form-control text-center"  placeholder="Lot Number"/>
                          <option>--SELECT HERE--</option>
                          
                        </select>
                  </div>    
                </div> <!-- end row 1 -->
                
                <div class="row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Division Code:</label>
                  </div>
                  <div class="col-4">
                        <input id="eDivCodeID" class="form-control text-center" placeholder="Division Code" readonly/>          
                  </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Division Name:</label>
                  </div>
                  <div class="col-4">
                        <input id="eDivNameID" class="form-control text-center" placeholder="Division Name" readonly/>    
                  </div>    
                </div> <!-- end row 2  -->

                <div class="row">
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
                </div> <!-- end row 3 -->

                <div class ="row">
                  <div class="col-2">
                      <label class="col-form-label-sm">Lot Quantity:</label>   
                  </div>
                  <div class="col-4">
                        <input id="eLotQuantityID" class="form-control text-center" placeholder="Lot Quantity" readonly/>         
                  </div>
                </div> <!-- end row 4 -->

                <div class="row">
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
                    <select id="edefectInputID" class="form-control text-center"  placeholder="" required/>
                      <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/list/getDefectNames.php"; ?>
                    </select>
                  </div>
                </div> <!-- end row 5 -->

                <div class="row">
                  <div class="col-2">
                    <label class="col-form-label-sm">Prod Date:</label>  
                  </div>
                  <div class="col-4">
                    <input id="eprodDateID" type="date" class="form-control text-center" placeholder="" required/>    
                  </div>
                  <div class="col-2">
                    <label class="col-form-label-sm">Prod Time:</label>  
                  </div>
                  <div class="col-4">
                    <input id="eprodTimeID" type="time" class="form-control text-center" placeholder="" required/>    
                  </div>
                </div> <!-- end row 6 -->

                <div class="row">
                  <div class="col-3">
                        <label class="col-form-label-sm">DEFECT QUANTITY:</label>                  
                  </div>
                  <div class="col-9">
                        <input id="eDefQty" type="number" class="form-control form-control-sm" placeholder="INPUT DEFECT QTY" required></input>              
                  </div>
                </div> <!-- end row 7 -->

                <div class="row">
                  <div class="col-3">
                    <label class="col-form-label-sm">REMARKS:</label>                  
                  </div>
                  <div class="col-9">
                        <textarea id="eremarks" type="textarea" class="form-control form-control-sm" name="remarks" placeholder="INPUT REMARKS"></textarea>              
                  </div>
                </div> <!-- end row 8 -->

                <div class="form-group row">
                  <div class="col-2">
                         <label class="col-form-label-sm">DEFECT ID:</label>  
                    </div>
                  <div class="col-2">
                      <input id="defectID" type="text" class="form-control text-center" placeholder="" readonly/>   
                    </div>
                  <div class="col"></div>
                  <div class="col-5" style="text-align:right; padding-top:7px">
                      <button type='submit' class='btn btn-danger close' id='updateDefect'>UPDATE DEFECT</button></div>
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