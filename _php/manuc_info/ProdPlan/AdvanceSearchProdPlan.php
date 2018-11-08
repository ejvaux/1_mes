   
      <?php  include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php'; ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> ADVANCED SEARCH  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loadmodal3('AdvanceSearchProdPlan');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">  
        
                <div class="card">
                        <div class="card-header">Input Search Parameters</div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                            DATE FROM:   <input id='ads_sortfrom' onchange='showTable("ShipmentList","","shipment_management")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px' required>
                                    </div>

                                    <div class="col-md-6">
                                            DATE TO:  <input id='ads_sortto' onchange='showTable("ShipmentList","","shipment_management")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                <div class="col-md-6">
                                           CUSTOMER CODE:   
                                       <select class='select3' id = "ads_custcode"
                                        onchange='ads_func("ads_custcode","ads_custname")'>
                                                   <option value=''>--SELECT CUST CODE--</option>
                                                   <?php
                                                   

                                                        $sql="SELECT CUSTOMER_CODE,CUSTOMER_NAME FROM dmc_customer ORDER BY CUSTOMER_CODE ASC";

                                                        $result = $conn->query($sql);
                                                        while($row=$result->fetch_assoc())
                                                        {
                                                         
                                                          echo '<option value="'.$row['CUSTOMER_NAME'].'">'.$row['CUSTOMER_CODE'].'</option>';
                                                        }
                                                   ?>
               
                                           </select>
                                    </div>

                                    <div class="col-md-6">
                                            CUSTOMER NAME:   
                                           <select class="select4" id="ads_custname"
                                        onchange='ads_func("ads_custname","ads_custcode")'>
                                                   <option value=''>--SELECT CUST NAME--</option>
                                                   <?php
                                                        $sql="SELECT CUSTOMER_CODE,CUSTOMER_NAME FROM dmc_customer ORDER BY CUSTOMER_NAME ASC";

                                                        $result = $conn->query($sql);
                                                        while($row=$result->fetch_assoc())
                                                        {
                                                          echo '<option value="'.$row['CUSTOMER_NAME'].'">'.$row['CUSTOMER_NAME'].'</option>';
                                                        }
                                                   ?>
                                           </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                           ITEM CODE:   
                                           <select class="select5" id="ads_itemcode"
                                           onchange='ads_func("ads_itemcode","ads_itemname")'>
                                                   <option value=''>--SELECT ITEM CODE--</option>
                                                   <?php
                                                        $sql="SELECT ITEM_CODE,ITEM_NAME FROM dmc_item_list ORDER BY ITEM_CODE ASC";

                                                        $result = $conn->query($sql);
                                                        while($row=$result->fetch_assoc())
                                                        {
                                                          echo '<option value="'.$row['ITEM_NAME'].'">'.$row['ITEM_CODE'].'</option>';
                                                        }
                                                   ?>

                                           </select>
                                    </div>

                                    <div class="col-md-6">
                                            ITEM NAME:   
                                           <select class="select6"  id="ads_itemname"
                                           onchange='ads_func("ads_itemname","ads_itemcode")'>
                                                   <option value=''>--SELECT ITEM NAME--</option>
                                                   <?php
                                                        $sql="SELECT ITEM_CODE,ITEM_NAME FROM dmc_item_list ORDER BY ITEM_CODE ASC";

                                                        $result = $conn->query($sql);
                                                        while($row=$result->fetch_assoc())
                                                        {
                                                          echo '<option value="'.$row['ITEM_NAME'].'">'.$row['ITEM_NAME'].'</option>';
                                                        }
                                                   ?>
                                           </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                           MACHINE CODE:   
                                           <select class="select7" id="ads_mccode">
                                                   <option value=''>--SELECT MC CODE--</option>
                                                   <?php
                                                        $sql="SELECT MACHINE_CODE FROM dmc_machine_list ORDER BY MACHINE_CODE ASC";

                                                        $result = $conn->query($sql);
                                                        while($row=$result->fetch_assoc())
                                                        {
                                                          echo '<option value="'.$row['MACHINE_CODE'].'">'.$row['MACHINE_CODE'].'</option>';
                                                        }
                                                   ?>

                                           </select>
                                    </div>

                                    <div class="col-md-6">
                                            JOB ORDER #:   
                                           <input id='ads_jo_no'  type='text' name='jono' class='form-control' 
                                           style='font-size: 12px; height: 40px' placeholder="Input Job Order #">
                                      
                                    </div>
                                </div>
                                
                                
                        </div>   
                </div>

      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="ads_gosearch()">SEARCH</button>
        <button id="btnclose" type="button" class="btn btn-secondary" data-dismiss="modal" 
        onclick="loadmodal3('AdvanceSearchProdPlan');" >Close</button>
      </div>
    

    </div>
  </div>
</div>


