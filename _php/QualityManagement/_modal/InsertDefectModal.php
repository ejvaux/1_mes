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
  <datalist style="width:50px" id="datalistLotNumber">
    
    <?php               
                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
                        $sql = "SELECT LOT_NUMBER FROM qmd_lot_create";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                          if(!isset($row)){
                            echo "option value=''></option>";
                          }
                          else{
                                echo "<option value='";
                                echo $row['LOT_NUMBER'];
                                echo "'>";
                                echo $row['LOT_NUMBER'];
                                echo "</option>";
                              }
                        }
                        
                        $conn->close();

                    ?>
    </datalist>
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
                
                <div class="row">
                  <div class="col-2">
                        <label class="col-form-label-sm">Job Order Number:</label></div>
                  <div class="col-4">
                        <input onkeypress="selectedJO()" list="jobOrder" class="form-control text-center" id="JobOrderNo" placeholder="Job Order Number"/>         
                    </div>
                  <div class="col-2">
                        <label class="col-form-label-sm">Lot Number:</label></div>
                  <div class="col-4">
                        <input list="datalistLotNumber" class="form-control text-center" id="LotNo" placeholder="Lot Number"/>    
                        
                    </div>    
                  </div>
                
              <div class="row">
                  <div class="col-5">
                        <label class="col-form-label-sm">DEFECT QUANTITY:</label>                  
                    </div>
                  <div class="col-7">
                        <input id="defect_QTY" type="number" class="form-control form-control-sm" onkeyup='a()' onfocusout='a()' placeholder="INPUT DEFECT QTY"></input>              
                    </div>
                  </div>


                <!-- <div class="row">
                  <div class="col-3">
                    <label class="col-form-label-sm">ITEM SERIAL LIST:</label>                  
                    </div>
                
                  <div class="col-7" id="tblModal">
                    
                    <?php /* include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/_modal/TableDefectModal.php"; */ ?>

                    </div>
                  </div> -->

                <div class ="row">
                  <div class="col-5">
                      <label class="col-form-label-sm">DEFECT NAME:</label>   
                    </div>
                  <div class="col-7">
                        <select id="defectInputID" type="text" class="form-control form-control-sm " name="defectInput" placeholder="">
                    
                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT DEFECT_NAME FROM dmc_defect_code ORDER BY DEFECT_CODE ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['DEFECT_NAME'];
                                echo "'>";
                                echo $row['DEFECT_NAME'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>

                    </select>      
                    </div>
                  </div>

                <div class="row">
                  <div class="col-5">
                        <label class="col-form-label-sm">REMARKS:</label>                  
                    </div>
                  <div class="col-7">
                        <textarea id="remarks" type="textarea" class="form-control form-control-sm" name="remarks" placeholder="INPUT REMARKS"></textarea>              
                    </div>
                  </div>

                <div class="row">
                  <div class="col-7">
                                  
                    </div>
                  <div class="col-5" style="text-align:right; padding-top:7px">
                      <button type='button' class='btn btn-danger close' data-dismiss="modal" id='ConfirmDefect'>CONFIRM DEFECT</button></div>
                    </div>
                  </div>

              </div>
            </div>
            </form>
          </div>


        </div>
      </div>
    </div>
  