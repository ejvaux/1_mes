



<div class="mod_options" style="z-index: 0;padding-top: 70px;padding-left: 15px">
                
    <div style="width: 100%;text-align: left;">

 
            <div class="row">
            
                                      <div class="col">
                                        <div class="form-group">

                                              <div class="row">
                                                  <div class="col-12">                                                          
                                                    <div class="btn-toolbar mb-1" role="toolbar" aria-label="Toolbar with button groups">
                                                  
                                                        <div class="input-group btn-sm" style="height: 40px;">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text" id="btnGroupAddon2">SEARCH:</div>
                                                            </div>
                                                            <input onchange='showTable("PendingProduction","","pending_production")' id='search' type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>
                                                          <div class="input-group-append" id="btnGroupAddon3">
                                                            <button type="button" onclick='showTable("PendingProduction","","pending_production")' class="btn btn-outline-secondary btn-export6 btn-sm" style="z-index:0">&nbsp<i class="fa fa-search"></i>&nbsp</button>    
                                                          </div>
                                                        </div>

                                                        <div class="input-group btn-sm" style="height: 40px;">
                                                          <div class="input-group-prepend">
                                                            <div class="input-group-text" id="btnGroupAddon2">SORT FROM:</div>
                                                          </div>
                                                          <input id='sortfrom' onchange='showTable("PendingProduction","","pending_production")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                                        </div>
                                                        
                                                        <div class="input-group btn-sm" style="height: 40px;">
                                                          <div class="input-group-prepend">
                                                            <div class="input-group-text" id="btnGroupAddon2">SORT TO:</div>
                                                          </div>
                                                          <input id='sortto' onchange='showTable("PendingProduction","","pending_production")' type='date' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                                        </div>
                                                        
                                                        <div class="input-group btn-sm" style="height: 40px;">
                                                            <div class="btn-group btn-group-sm">  
                                                              <button type="button" onclick="cancelfilter('PendingProduction','','pending_production')" class="btn btn-outline-secondary btn-export6"><i class="fas fa-ban"></i>&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                                              <button type="button" class="btn btn-outline-secondary btn-export6" onclick="SyncToProdOutputSystem();syncdatareload('PendingProduction','','pending_production')" ><i class="fas fa-sync-alt"></i>&nbspSYNC&nbsp&nbsp</button>
                                                              <button type="button" class="btn btn-outline-secondary btn-export6" onclick="exportxlsx('PendingProduction','','pending_production')"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>
                                                            </div>

                                                             &nbsp&nbsp
                                                              <?php

                                                                  include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
                                                                  $sqlPlanType = " SELECT SAP_DIVISION_CODE, DIVISION_NAME from dmc_division_code";
                                                                  $resultSqlPlanType = $conn->query($sqlPlanType);
                                                              ?>
                                                                  <select id="PlanType" class="form-control" onchange="showTable('PendingProduction','','pending_production')" style="width: 150px;font-size: 10px; height:33px" name="PlanType">';
                                                              <?php
                                                                  while ($row = $resultSqlPlanType->fetch_assoc()) {
                                                                      # code...
                                                                          echo "<option value='" . $row['SAP_DIVISION_CODE'] . "' >" . $row['DIVISION_NAME'] . "</option>";
                                                                      
                                                                  }

                                                              ?>
                                                                  </select>
                                                            
                                                       
                                                        </div>
                                                      

                                                    </div>
                                                  </div>
                                                </div>
                                            


                                            
                                        </div> <!-- end div of form-group -->
                                      </div> <!-- end div of col -->




                          </div><!-- end of row-->
      
      

                 
    </div>


</div>
      
  

<div id="example-table"></div>


