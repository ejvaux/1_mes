

<div class="mod_options" style="z-index: 0;padding-top: 70px; padding-left: 10px" >
                
                
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
                                          <input onchange='showTable("ShipmentList1","","shipment_management1")' id='search' type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>
                                          <div class="input-group-append" id="btnGroupAddon3">
                                          <button type="button" onclick='showTable("ShipmentList1","","shipment_management1")' class="btn btn-outline-secondary btn-export6 btn-sm" style="z-index:0">&nbsp<i class="fa fa-search"></i>&nbsp</button>    </div>
                                      </div>

                                      <div class="input-group btn-sm" style="height: 40px;">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text" id="btnGroupAddon2">SORT FROM:</div>
                                        </div>
                                        <input id='sortfrom' onchange='showTable("ShipmentList1","","shipment_management1")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                     </div>
                                      
                                      <div class="input-group btn-sm" style="height: 40px;">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text" id="btnGroupAddon2">SORT TO:</div>
                                        </div>
                                        <input id='sortto' onchange='showTable("ShipmentList1","","shipment_management1")' type='date' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                    </div>
                                      
                                      <div class="input-group btn-sm" style="height: 40px;">
                                          <div class="btn-group btn-group-sm">  
                                          <button type="button" onclick="cancelfilter('ShipmentList1','','shipment_management1')" class="btn btn-outline-secondary btn-export6"><i class="fas fa-ban"></i>&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                            <button type="button" class="btn btn-outline-secondary btn-export6" onclick="SyncToProdOutputSystem();syncdatareload('ShipmentList1','','shipment_management1')" ><i class="fas fa-sync-alt"></i>&nbspSYNC&nbsp&nbsp</button>
                                          <button type="button" class="btn btn-outline-secondary btn-export6" onclick="exportxlsx('ShipmentList1','','shipment_management1')"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>
                                      </div>
                                      &nbsp                      
                                      <select id="StatusSort" class='form-control ' style="font-size: 10px; height: 33px" onchange='showTable("ShipmentList1","","shipment_management1")'>
                                          <option value=''>ALL DATA</option>
                                          <option value='SHIPPED'>SHIPPED</option>
                                          <option value='APPROVED'>APPROVED</option>
                                          <option value='DISAPPROVED'>DISAPPROVED</option>
                                          <option value='PENDING'>PENDING</option>
                                      </select>
                                      </div>
                                    

                                  </div>
                                </div>
                          </div>
                          
                              
      
      
                    </div><!-- end of form group -->

                  </div><!-- end div of col -->
                  
                  </div><!-- end of row-->
          
           
           
          
          
</div>
          
          




<!-- div of container-fluid in the Shipment (main Page) -->


<div class="shiplist p-2">

<div id="example-table" style="margin-top: 13px"></div>
</div>

