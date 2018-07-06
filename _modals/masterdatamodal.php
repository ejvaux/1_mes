
<!--  _________________________________ INSERT MODALS ________________________________  -->

<div class="modal hide fade in" role="dialog" id="moldlistmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Mold</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="moldlistform" method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">

          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="moldcode" class="col-form-label-sm">MOLD CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="moldcode" type="text" class="form-control form-control-sm" name="moldcode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="toolnumber" class="col-form-label-sm">TOOL NUMBER:</label>                  
                </div>
                <div class="col-7">
                  <input id="toolnumber" type="text" class="form-control form-control-sm" name="toolnumber" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="itemcode" class="col-form-label-sm">ITEM CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="itemcode" class="form-control form-control-sm sel" name="itemcode" placeholder="" onchange="getitemname('itemcode',itemname);">
                    
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT DISTINCT ITEM_CODE FROM dmc_item_list ORDER BY ITEM_CODE ASC";
                      $result = $conn->query($sql);
                          
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['ITEM_CODE'];
                              echo "'>";
                              echo $row['ITEM_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="amcustomercode" class="col-form-label-sm">CUSTOMER CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="amcustomercode" type="text" class="form-control form-control-sm sel" name="customercode" placeholder="" onchange="getcustomername('amcustomercode',amcustomername);" >

                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT CUSTOMER_CODE FROM dmc_customer ORDER BY CUSTOMER_CODE ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['CUSTOMER_CODE'];
                                echo "'>";
                                echo $row['CUSTOMER_CODE'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>

                  </select>
                </div>
              </div>
            </div>                    
          </div>
          
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="itemname" class="col-form-label-sm">ITEM NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="itemname" type="text" class="form-control form-control-sm" name="itemname" placeholder="" rows="2" readonly></textarea>
                </div>
              </div>
            </div>            
            
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="amcustomername" class="col-form-label-sm">CUSTOMER NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="amcustomername" type="text" class="form-control form-control-sm" name="customername" placeholder="" rows="2" readonly></textarea>
                </div>
              </div>
            </div>                    
          </div>

          

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="guaranteeshot" class="col-form-label-sm">GUARANTEE SHOT:</label>                  
                </div>
                <div class="col-7">
                  <input id="guaranteeshot" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="guaranteeshot" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="moldshot" class="col-form-label-sm">MOLD SHOT:</label>                  
                </div>
                <div class="col-7">
                  <input id="moldshot" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="moldshot" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="cavity" class="col-form-label-sm">CAVITY:</label>                  
                </div>
                <div class="col-7">
                  <input id="cavity" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="cavity" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="moldremarks" class="col-form-label-sm">REMARKS:</label>                  
                </div>
                <div class="col-7">
                  <input id="moldremarks" type="text" class="form-control form-control-sm" name="moldremarks" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="assetnumber" class="col-form-label-sm">ASSET NUMBER:</label>                  
                </div>
                <div class="col-7">
                  <input id="assetnumber" type="text" class="form-control form-control-sm" name="assetnumber" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="transferdate" class="col-form-label-sm">TRANSFER DATE:</label>                  
                </div>
                <div class="col-7">
                  <input id="transferdate" type="date" class="form-control form-control-sm" name="transferdate" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="approvaldate" class="col-form-label-sm">APPROVAL DATE:</label>                  
                </div>
                <div class="col-7">
                  <input id="approvaldate" type="date" class="form-control form-control-sm" name="approvaldate" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="drawingrevision" class="col-form-label-sm">DRAWING REVISION:</label>                  
                </div>
                <div class="col-7">
                  <input id="drawingrevision" type="text" class="form-control form-control-sm" name="drawingrevision" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="moldmodel" class="col-form-label-sm">MODEL:</label>                  
                </div>
                <div class="col-7">
                  <input id="moldmodel" type="text" class="form-control form-control-sm" name="moldmodel" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="moldmaker" class="col-form-label-sm">MAKER:</label>                  
                </div>
                <div class="col-7">
                  <input id="moldmaker" type="text" class="form-control form-control-sm" name="moldmaker" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="moldcategory" class="col-form-label-sm">CATEGORY:</label>                  
                </div>
                <div class="col-7">
                  <input id="moldcategory" type="text" class="form-control form-control-sm" name="moldcategory" placeholder="">                  
                </div>
              </div>
            </div>                               
          </div>

          

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="moldlistsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="customermod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="customerform" method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="accustomercode" class="col-form-label-sm">CUSTOMER CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="accustomercode" type="text" class="form-control form-control-sm" name="customercode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="customerinitial" class="col-form-label-sm">CUSTOMER INITIAL:</label>                  
                </div>
                <div class="col-7">
                  <input id="customerinitial" type="text" class="form-control form-control-sm" name="customerinitial" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="cdivisioncode" class="col-form-label-sm">DIVISION CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="cdivisioncode" class="form-control form-control-sm sel" name="divisioncode" placeholder="">
                  
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT DIVISION_CODE FROM dmc_division_code ORDER BY DIVISION_CODE ASC";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['DIVISION_CODE'];
                              echo "'>";
                              echo $row['DIVISION_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="customername" class="col-form-label-sm">CUSTOMER NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="customername" type="text" class="form-control form-control-sm" name="customername" rows="2" placeholder=""></textarea>                 
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="groupcode" class="col-form-label-sm">GROUP CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="groupcode" type="text" class="form-control form-control-sm" name="groupcode" placeholder="">                  
                </div>
              </div>
            </div>                               
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="customersubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="itemmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="itemform" method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="itemcode" class="col-form-label-sm">ITEM CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="itemcode" type="text" class="form-control form-control-sm" name="itemcode" placeholder="" required required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="aicustomercode" class="col-form-label-sm">CUSTOMER CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="aicustomercode" type="text" class="form-control form-control-sm sel" name="customercode" onchange="getcustomername('aicustomercode',aicustomername)" placeholder="">
                    
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT CUSTOMER_CODE FROM dmc_customer ORDER BY CUSTOMER_CODE ASC";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['CUSTOMER_CODE'];
                              echo "'>";
                              echo $row['CUSTOMER_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>

                  </select>
                </div>
              </div>
            </div>                                
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="itemname" class="col-form-label-sm">ITEM NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="itemname" type="text" class="form-control form-control-sm" name="itemname" rows="2" placeholder=""></textarea>                 
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="aicustomername" class="col-form-label-sm">CUSTOMER NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="aicustomername" type="text" class="form-control form-control-sm" name="customername" rows="2" placeholder="" readonly></textarea>                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="barcode" class="col-form-label-sm">BARCODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="barcode" type="text" class="form-control form-control-sm" name="barcode" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="idivisioncode" class="col-form-label-sm">DIVISION CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="idivisioncode" type="text" class="form-control form-control-sm sel" name="divisioncode" placeholder="">
                  
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT DIVISION_CODE FROM dmc_division_code ORDER BY DIVISION_CODE ASC";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['DIVISION_CODE'];
                              echo "'>";
                              echo $row['DIVISION_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>

                  </select>
                </div>
              </div>
            </div>                                
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="model" class="col-form-label-sm">MODEL:</label>                  
                </div>
                <div class="col-7">
                  <input id="model" type="text" class="form-control form-control-sm" name="model" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="itemprintcode" class="col-form-label-sm">ITEM PRINTCODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="itemprintcode" type="text" class="form-control form-control-sm" name="itemprintcode" placeholder="" required>                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="groupcode" class="col-form-label-sm">GROUP CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="groupcode" type="text" class="form-control form-control-sm" name="groupcode" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="description" class="col-form-label-sm">DESCRIPTION:</label>                  
                </div>
                <div class="col-7">
                  <input id="description" type="text" class="form-control form-control-sm" name="description" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="packqty" class="col-form-label-sm">PACK QTY:</label>                  
                </div>
                <div class="col-7">
                  <input id="packqty" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="packqty" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="danplaqty" class="col-form-label-sm">DANPLA QTY:</label>                  
                </div>
                <div class="col-7">
                  <input id="danplaqty" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="danplaqty" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="labeltype" class="col-form-label-sm">LABEL TYPE:</label>                  
                </div>
                <div class="col-7">
                  <input id="labeltype" type="text" class="form-control form-control-sm" name="labeltype" placeholder="">                  
                </div>
              </div>
            </div>                                           
          </div>
  

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="itemsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="machinemod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Machine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="machineform"  method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">

          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="machinecode" class="col-form-label-sm">MACHINE CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="machinecode" type="text" class="form-control form-control-sm" name="machinecode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="machinemaker" class="col-form-label-sm">MACHINE MAKER:</label>                  
                </div>
                <div class="col-7">
                  <input id="machinemaker" type="text" class="form-control form-control-sm" name="machinemaker" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="tonnage" class="col-form-label-sm">TONNAGE:</label>                  
                </div>
                <div class="col-7">
                  <input id="tonnage" type="text" class="form-control form-control-sm" name="tonnage" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="machinegroup" class="col-form-label-sm">MACHINE GROUP:</label>                  
                </div>
                <div class="col-7">
                  <input id="machinegroup" type="text" class="form-control form-control-sm" name="machinegroup" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="assetnumber" class="col-form-label-sm">ASSET NUMBER:</label>                  
                </div>
                <div class="col-7">
                  <input id="assetnumber" type="text" class="form-control form-control-sm" name="assetnumber" placeholder="">                  
                </div>
              </div>
            </div>                                
          </div>
  

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="machinesubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="defectmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Defect</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="defectform"  method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="defectcode" class="col-form-label-sm">DEFECT CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="defectcode" type="text" class="form-control form-control-sm" name="defectcode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="divisioncode" class="col-form-label-sm">DIVISION CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="divisioncode" type="text" class="form-control form-control-sm sel" name="divisioncode" placeholder="">
                  
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT DIVISION_CODE FROM dmc_division_code ORDER BY DIVISION_CODE ASC";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['DIVISION_CODE'];
                              echo "'>";
                              echo $row['DIVISION_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>

                  </select>
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="defectgroup" class="col-form-label-sm">DEFECT GROUP:</label>                  
                </div>
                <div class="col-7">
                  <input id="defectgroup" type="text" class="form-control form-control-sm" name="defectgroup" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="defectname" class="col-form-label-sm">DEFECT NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="defectname" type="text" class="form-control form-control-sm" name="defectname" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="defectsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="userinfomod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="userinfoform"  method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="userid" class="col-form-label-sm">USER ID:</label>                  
                </div>
                <div class="col-7">
                  <input id="userid" type="text" class="form-control form-control-sm" name="userid" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="username" class="col-form-label-sm">USER NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="username" type="text" class="form-control form-control-sm" name="username" placeholder="" required>                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emailaddress" class="col-form-label-sm">EMAIL ADDRESS:</label>                  
                </div>
                <div class="col-7">
                  <input id="emailaddress" type="email" class="form-control form-control-sm" name="emailaddress" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="userauthority" class="col-form-label-sm">USER AUTHORITY:</label>                  
                </div>
                <div class="col-7">
                  <select id="userauthority" type="text" class="form-control form-control-sm sel" name="userauthority" placeholder="" required> 
                    
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT AUTHORITY_CODE FROM dmc_user_authority ORDER BY AUTHORITY_CODE ASC";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['AUTHORITY_CODE'];
                              echo "'>";
                              echo $row['AUTHORITY_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>
                  
                  </select>
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <h5>The Default Password is <span style="color: red;">"abc123"</span></h5>
            </div>                               
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="userinfosubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="userauthmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Authority</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="userauthform"  method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="authoritycode" class="col-form-label-sm">AUTHORITY CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="authoritycode" type="text" class="form-control form-control-sm" name="authoritycode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="userauthority" class="col-form-label-sm">USER AUTHORITY:</label>                  
                </div>
                <div class="col-7">
                  <input id="userauthority" type="text" class="form-control form-control-sm" name="userauthority" placeholder="" required>                  
                </div>
              </div>
            </div>                    
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="userauthsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="divcodemod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Division</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="divcodeform"  method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">
      
          <!-- ____________ FORM __________________ -->
  
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="divisioncode" class="col-form-label-sm">DIVISION CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="divisioncode" type="text" class="form-control form-control-sm" name="divisioncode" placeholder="" required>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="divisionname" class="col-form-label-sm">DIVISION NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="divisionname" type="text" class="form-control form-control-sm" name="divisionname" placeholder="" required>                  
                </div>
              </div>
            </div>                    
          </div>
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="sapcode" class="col-form-label-sm">SAP DIV CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="sapcode" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="sapcode" placeholder="" required>
                </div>
              </div>
            </div>                               
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="divcodesubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="employeemod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="employeeform"  method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">
      
          <!-- ____________ FORM __________________ -->
  
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="employeecode" class="col-form-label-sm">EMPLOYEE CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="employeecode" type="text" class="form-control form-control-sm" name="employeecode" placeholder="" readonly>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="employeename" class="col-form-label-sm">EMPLOYEE NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="employeename" type="text" class="form-control form-control-sm" name="employeename" placeholder="" required>
                </div>
              </div>
            </div>
                                
          </div>
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="employeestatus" class="col-form-label-sm">EMPLOYEE STATUS:</label>                  
                </div>
                <div class="col-7">
                  <select id="employeestatus" type="text" class="form-control form-control-sm" name="employeestatus" placeholder="" required>                  
                
                      <option value="ACTIVE">ACTIVE</option>
                      <option value="RESIGNED">RESIGNED</option>
                      <option value="AWOL">AWOL</option>
                
                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="datehired" class="col-form-label-sm">DATE HIRED:</label>                  
                </div>
                <div class="col-7">
                  <input id="datehired" type="date" class="form-control form-control-sm" name="datehired" placeholder="" required>
                </div>
              </div>
            </div>                               
          </div>
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emdivision" class="col-form-label-sm">DIVISION:</label>                  
                </div>
                <div class="col-7">
                  <select id="emdivision" type="text" class="form-control form-control-sm" name="division" placeholder="">

                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT DIVISION_NAME FROM dmc_division_code ORDER BY DIVISION_NAME ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['DIVISION_NAME'];
                                echo "'>";
                                echo $row['DIVISION_NAME'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>

                  </select>                 
                </div>
              </div>
            </div>                                           
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="employeesubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--  _________________________________ INSERT MODALS ________________________________  -->




<!--  _________________________________ EDIT MODALS ________________________________  -->


<div class="modal hide fade in" role="dialog" id="emoldlistmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Mold</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="emoldlistform"  method="post">
      <input type="hidden" id="idmoldlist" name="idmoldlist">
      <div class="modal-body" style="">

          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emoldcode" class="col-form-label-sm">MOLD CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="emoldcode" type="text" class="form-control form-control-sm" name="emoldcode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="etoolnumber" class="col-form-label-sm">TOOL NUMBER:</label>                  
                </div>
                <div class="col-7">
                  <input id="etoolnumber" type="text" class="form-control form-control-sm" name="etoolnumber" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eitemcode" class="col-form-label-sm">ITEM CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="eitemcode" type="text" class="form-control form-control-sm sel" name="eitemcode" placeholder="" onchange="getitemname('eitemcode',eitemname);">
                  
                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT DISTINCT ITEM_CODE FROM dmc_item_list ORDER BY ITEM_CODE ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['ITEM_CODE'];
                                echo "'>";
                                echo $row['ITEM_CODE'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="ecustomercode" class="col-form-label-sm">CUSTOMER CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="ecustomercode" type="text" class="form-control form-control-sm sel" name="ecustomercode" placeholder="" onchange="getcustomername('ecustomercode',ecustomername)">
                  
                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT CUSTOMER_CODE FROM dmc_customer ORDER BY CUSTOMER_CODE ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['CUSTOMER_CODE'];
                                echo "'>";
                                echo $row['CUSTOMER_CODE'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>

                  </select>
                </div>
              </div>
            </div>                    
          </div>
          
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eitemname" class="col-form-label-sm">ITEM NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="eitemname" type="text" class="form-control form-control-sm" name="eitemname" placeholder="" rows="2" readonly></textarea>                
                </div>
              </div>
            </div>
            
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="ecustomername" class="col-form-label-sm">CUSTOMER NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="ecustomername" type="text" class="form-control form-control-sm" name="ecustomername" placeholder="" rows="2" readonly></textarea>                
                </div>
              </div>
            </div>                    
          </div>          

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eguaranteeshot" class="col-form-label-sm">GUARANTEE SHOT:</label>                  
                </div>
                <div class="col-7">
                  <input id="eguaranteeshot" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="eguaranteeshot" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emoldshot" class="col-form-label-sm">MOLD SHOT:</label>                  
                </div>
                <div class="col-7">
                  <input id="emoldshot" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="emoldshot" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="ecavity" class="col-form-label-sm">CAVITY:</label>                  
                </div>
                <div class="col-7">
                  <input id="ecavity" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="ecavity" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emoldremarks" class="col-form-label-sm">REMARKS:</label>                  
                </div>
                <div class="col-7">
                  <input id="emoldremarks" type="text" class="form-control form-control-sm" name="emoldremarks" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eassetnumber" class="col-form-label-sm">ASSET NUMBER:</label>                  
                </div>
                <div class="col-7">
                  <input id="eassetnumber" type="text" class="form-control form-control-sm" name="eassetnumber" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="etransferdate" class="col-form-label-sm">TRANSFER DATE:</label>                  
                </div>
                <div class="col-7">
                  <input id="etransferdate" type="date" class="form-control form-control-sm" name="etransferdate" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eapprovaldate" class="col-form-label-sm">APPROVAL DATE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eapprovaldate" type="date" class="form-control form-control-sm" name="eapprovaldate" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="edrawingrevision" class="col-form-label-sm">DRAWING REVISION:</label>                  
                </div>
                <div class="col-7">
                  <input id="edrawingrevision" type="text" class="form-control form-control-sm" name="edrawingrevision" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emoldmodel" class="col-form-label-sm">MODEL:</label>                  
                </div>
                <div class="col-7">
                  <input id="emoldmodel" type="text" class="form-control form-control-sm" name="moldmodel" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emoldmaker" class="col-form-label-sm">MAKER:</label>                  
                </div>
                <div class="col-7">
                  <input id="emoldmaker" type="text" class="form-control form-control-sm" name="moldmaker" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emoldcategory" class="col-form-label-sm">CATEGORY:</label>                  
                </div>
                <div class="col-7">
                  <input id="emoldcategory" type="text" class="form-control form-control-sm" name="moldcategory" placeholder="">                  
                </div>
              </div>
            </div>                               
          </div>          

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="emoldlistsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal hide fade in" role="dialog" id="ecustomermod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="ecustomerform"  method="post">
      <input type="hidden" id="idcustomer" name="idcustomer">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eccustomercode" class="col-form-label-sm">CUSTOMER CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eccustomercode" type="text" class="form-control form-control-sm" name="eccustomercode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eccustomerinitial" class="col-form-label-sm">CUSTOMER INITIAL:</label>                  
                </div>
                <div class="col-7">
                  <input id="eccustomerinitial" type="text" class="form-control form-control-sm" name="eccustomerinitial" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="ecdivisioncode" class="col-form-label-sm">DIVISION CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="ecdivisioncode" type="text" class="form-control form-control-sm sel" name="ecdivisioncode" placeholder="">
                  
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT DIVISION_CODE FROM dmc_division_code ORDER BY DIVISION_CODE ASC";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['DIVISION_CODE'];
                              echo "'>";
                              echo $row['DIVISION_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eccustomername" class="col-form-label-sm">CUSTOMER NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="eccustomername" type="text" class="form-control form-control-sm" name="eccustomername" rows="2" placeholder=""></textarea>
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="ecgroupcode" class="col-form-label-sm">GROUP CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="ecgroupcode" type="text" class="form-control form-control-sm" name="ecgroupcode" placeholder="">                  
                </div>
              </div>
            </div>                               
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="ecustomersubmit"> <i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>




<div class="modal hide fade in" role="dialog" id="eitemmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="eitemform"  method="post">
      <input type="hidden" id="iditem" name="iditem">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eiitemcode" class="col-form-label-sm">ITEM CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eiitemcode" type="text" class="form-control form-control-sm" name="eiitemcode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eicustomercode" class="col-form-label-sm">CUSTOMER CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="eicustomercode" type="text" class="form-control form-control-sm sel" name="eicustomercode" onchange="getcustomername('eicustomercode',eicustomername)" placeholder="" >
                    
                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT CUSTOMER_CODE FROM dmc_customer ORDER BY CUSTOMER_CODE ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['CUSTOMER_CODE'];
                                echo "'>";
                                echo $row['CUSTOMER_CODE'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>

                  </select>
                </div>
              </div>
            </div>                                
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eiitemname" class="col-form-label-sm">ITEM NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="eiitemname" type="text" class="form-control form-control-sm" name="eiitemname" rows="2" placeholder=""></textarea>
                </div>
              </div>
            </div>            
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eicustomername" class="col-form-label-sm">CUSTOMER NAME:</label>                  
                </div>
                <div class="col-7">
                  <textarea id="eicustomername" type="text" class="form-control form-control-sm" name="eicustomername" rows="2" placeholder="" readonly></textarea>                 
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eibarcode" class="col-form-label-sm">BARCODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eibarcode" type="text" class="form-control form-control-sm" name="eibarcode" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eidivisioncode" class="col-form-label-sm">DIVISION CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="eidivisioncode" type="text" class="form-control form-control-sm  sel" name="eidivisioncode" placeholder="">
                  
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT DIVISION_CODE FROM dmc_division_code ORDER BY DIVISION_CODE ASC";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['DIVISION_CODE'];
                              echo "'>";
                              echo $row['DIVISION_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>

                  </select>
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eimodel" class="col-form-label-sm">MODEL:</label>                  
                </div>
                <div class="col-7">
                  <input id="eimodel" type="text" class="form-control form-control-sm" name="eimodel" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eiitemprintcode" class="col-form-label-sm">ITEM PRINTCODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eiitemprintcode" type="text" class="form-control form-control-sm" name="eiitemprintcode" placeholder="" required>                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eigroupcode" class="col-form-label-sm">GROUP CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eigroupcode" type="text" class="form-control form-control-sm" name="eigroupcode" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eidescription" class="col-form-label-sm">DESCRIPTION:</label>                  
                </div>
                <div class="col-7">
                  <input id="eidescription" type="text" class="form-control form-control-sm" name="eidescription" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eipackqty" class="col-form-label-sm">PACK QTY:</label>                  
                </div>
                <div class="col-7">
                  <input id="eipackqty" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="eipackqty" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eidanplaqty" class="col-form-label-sm">DANPLA QTY:</label>                  
                </div>
                <div class="col-7">
                  <input id="eidanplaqty" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="eidanplaqty" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eilabeltype" class="col-form-label-sm">LABEL TYPE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eilabeltype" type="text" class="form-control form-control-sm" name="eilabeltype" placeholder="">                  
                </div>
              </div>
            </div>                                
          </div>
  

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="eitemsubmit"> <i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal hide fade in" role="dialog" id="emachinemod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Machine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="emachineform"  method="post">
      <input type="hidden" id="idmachine" name="idmachine">
      <div class="modal-body" style="">

          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emmachinecode" class="col-form-label-sm">MACHINE CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="emmachinecode" type="text" class="form-control form-control-sm" name="emmachinecode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emmachinemaker" class="col-form-label-sm">MACHINE MAKER:</label>                  
                </div>
                <div class="col-7">
                  <input id="emmachinemaker" type="text" class="form-control form-control-sm" name="emmachinemaker" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emtonnage" class="col-form-label-sm">TONNAGE:</label>                  
                </div>
                <div class="col-7">
                  <input id="emtonnage" type="text" class="form-control form-control-sm" name="emtonnage" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emmachinegroup" class="col-form-label-sm">MACHINE GROUP:</label>                  
                </div>
                <div class="col-7">
                  <input id="emmachinegroup" type="text" class="form-control form-control-sm" name="emmachinegroup" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="emassetnumber" class="col-form-label-sm">ASSET NUMBER:</label>                  
                </div>
                <div class="col-7">
                  <input id="emassetnumber" type="text" class="form-control form-control-sm" name="emassetnumber" placeholder="">                  
                </div>
              </div>
            </div>                                
          </div>
  

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="emachinesubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal hide fade in" role="dialog" id="edefectmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Defect Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edefectform"  method="post">
      <input type="hidden" id="iddefect" name="iddefect">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eddefectcode" class="col-form-label-sm">DEFECT CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eddefectcode" type="text" class="form-control form-control-sm" name="eddefectcode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eddivisioncode" class="col-form-label-sm">DIVISION CODE:</label>                  
                </div>
                <div class="col-7">
                  <select id="eddivisioncode" type="text" class="form-control form-control-sm sel" name="eddivisioncode" placeholder="">
                    
                  <?php

                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT DIVISION_CODE FROM dmc_division_code ORDER BY DIVISION_CODE ASC";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo "<option value='";
                              echo $row['DIVISION_CODE'];
                              echo "'>";
                              echo $row['DIVISION_CODE'];
                              echo "</option>";
                          }
                      
                      $conn->close();

                  ?>                 

                  </select>
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eddefectgroup" class="col-form-label-sm">DEFECT GROUP:</label>                  
                </div>
                <div class="col-7">
                  <input id="eddefectgroup" type="text" class="form-control form-control-sm" name="eddefectgroup" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eddefectname" class="col-form-label-sm">DEFECT NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="eddefectname" type="text" class="form-control form-control-sm" name="eddefectname" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="edefectsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal hide fade in" role="dialog" id="euserinfomod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="euserinfoform"  method="post">
      <input type="hidden" id="iduserinfo" name="iduserinfo">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="euuserid" class="col-form-label-sm">USER ID:</label>                  
                </div>
                <div class="col-7">
                  <input id="euuserid" type="text" class="form-control form-control-sm" name="euuserid" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="euusername" class="col-form-label-sm">USER NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="euusername" type="text" class="form-control form-control-sm" name="euusername" placeholder="" required>                  
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="euemailaddress" class="col-form-label-sm">EMAIL ADDRESS:</label>                  
                </div>
                <div class="col-7">
                  <input id="euemailaddress" type="email" class="form-control form-control-sm" name="euemailaddress" placeholder="">                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="euuserauthority" class="col-form-label-sm">USER AUTHORITY:</label>                  
                </div>
                <div class="col-7">
                  <select id="euuserauthority" type="text" class="form-control form-control-sm sel" name="euuserauthority" placeholder="" required>

                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT AUTHORITY_CODE FROM dmc_user_authority ORDER BY AUTHORITY_CODE ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['AUTHORITY_CODE'];
                                echo "'>";
                                echo $row['AUTHORITY_CODE'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>

                  </select>
                </div>
              </div>
            </div>                    
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="euuserpassword" class="col-form-label-sm">USER PASSWORD:</label>                  
                </div>
                <div class="col-7">
                  <select class="form-control form-control-sm sel" name="euuserpassword" placeholder="" id="euuserpassword">                  
                    <option value="exst">Existing</option>
                    <option value="def">Default</option>
                  </select>                 
                </div>
              </div>
            </div>                              
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="euserinfosubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="euserauthmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Authority</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="euserauthform"  method="post">
      <input type="hidden" id="iduserauth" name="iduserauth">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eaauthoritycode" class="col-form-label-sm">AUTHORITY CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eaauthoritycode" type="text" class="form-control form-control-sm" name="eaauthoritycode" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eauserauthority" class="col-form-label-sm">USER AUTHORITY:</label>                  
                </div>
                <div class="col-7">
                  <input id="eauserauthority" type="text" class="form-control form-control-sm" name="eauserauthority" placeholder="" required>                  
                </div>
              </div>
            </div>                    
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="euserauthsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal hide fade in" role="dialog" id="edivcodemod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Division</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edivcodeform"  method="post">
      <input type="hidden" id="iddivcode" name="iddivcode">
      <div class="modal-body" style="">
      
          <!-- ____________ FORM __________________ -->
  
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eddivisioncode1" class="col-form-label-sm">DIVISION CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eddivisioncode1" type="text" class="form-control form-control-sm" name="eddivisioncode1" placeholder="" required>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eddivisionname" class="col-form-label-sm">DIVISION NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="eddivisionname" type="text" class="form-control form-control-sm" name="eddivisionname" placeholder="">                  
                </div>
              </div>
            </div>                    
          </div>
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="edsapcode" class="col-form-label-sm">SAP DIV CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="edsapcode" type="number" min="0" onkeypress="return isNumberNegative(event)" class="form-control form-control-sm" name="edsapcode" placeholder="" required>
                </div>
              </div>
            </div>                               
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="edivcodesubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal hide fade in" role="dialog" id="eemployeemod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="eemployeeform"  method="post">
      <input type="hidden" id="employeeid" name="employeeid">
      <div class="modal-body" style="">
      
          <!-- ____________ FORM __________________ -->
  
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eemployeecode" class="col-form-label-sm">EMPLOYEE CODE:</label>                  
                </div>
                <div class="col-7">
                  <input id="eemployeecode" type="text" class="form-control form-control-sm" name="employeecode" placeholder="" readonly>                  
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eemployeename" class="col-form-label-sm">EMPLOYEE NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="eemployeename" type="text" class="form-control form-control-sm" name="employeename" placeholder="" required>
                </div>
              </div>
            </div>                                
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eemployeestatus" class="col-form-label-sm">EMPLOYEE STATUS:</label>                  
                </div>
                <div class="col-7">
                  <select id="eemployeestatus" type="text" class="form-control form-control-sm" name="employeestatus" placeholder="" required>                  
                
                      <option value="ACTIVE">ACTIVE</option>
                      <option value="RESIGNED">RESIGNED</option>
                      <option value="AWOL">AWOL</option>
                
                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="edatehired" class="col-form-label-sm">DATE HIRED:</label>                  
                </div>
                <div class="col-7">
                  <input id="edatehired" type="date" class="form-control form-control-sm" name="datehired" placeholder="" required>
                </div>
              </div>
            </div>                               
          </div>

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eemdivision" class="col-form-label-sm">DIVISION:</label>                  
                </div>
                <div class="col-7">
                  <select id="eemdivision" type="text" class="form-control form-control-sm" name="division" placeholder="">

                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT DIVISION_NAME FROM dmc_division_code ORDER BY DIVISION_NAME ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['DIVISION_NAME'];
                                echo "'>";
                                echo $row['DIVISION_NAME'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>

                  </select>                  
                </div>
              </div>
            </div>                                           
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="employeesubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--  _________________________________ EDIT MODALS ________________________________  -->
