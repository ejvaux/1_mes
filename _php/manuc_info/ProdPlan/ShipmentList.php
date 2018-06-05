

<div class="mod_options" style="z-index: 0;padding-top: 70px; padding-left: 10px" >
                
                <div style="width: 100%;text-align: left;">
                  <div class="row">
                  
                      <div class="col-sm-2" style="padding-top: 10px; text-align: center;">
                        <div class="form-group">
            
                              <table style="width: 100%">
                                <tr>
                                  <td><b>SEARCH: &nbsp</b></td>
                                  <td> 
                                    
                                    <input onkeypress='showTable("ShipmentList","","shipment_management")' id='search' type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>
            
                                    </td>
                                    <td>&nbsp
                                    <button type="button" onclick='showTable("ShipmentList","","shipment_management")' class="btn btn-outline-secondary btn-export6 p-0 my-2 my-sm-0">&nbsp<i class="fa fa-search"></i>&nbsp</button>  
                                  </td>
            
                                                                          
                                  
                                </tr>
                              </table>
                                
                            
                        </div>
            
                      </div>    
            
                      <div class="col-sm-7">
                  
                          
                                  <div class="form-group">
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-xs-6 col-sm-0" style="font-size: 12px; text-align: center">
                                            <b> &nbsp &nbsp SORT DATE <br>FROM:</b>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
            
                                        <input id='sortfrom' onchange='showTable("ShipmentList","","shipment_management")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                          
                                        </div>
                                          <!-- Add clearfix for only the required viewport -->
                                        <div class="clearfix visible-xs"></div>
                                        <div class="col-xs-6 col-sm-0"> <b> TO: </b></div>
                                        <div class="col-xs-6 col-sm-3">
                                              
                                              
                                        <input id='sortto' onchange='showTable("ShipmentList","","shipment_management")' type='date' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                                
            
                                        </div>
                                        
                                        <div class="col-xs-6 col-sm-3">
                                          <!--    <table style="width: 100%">
                                              <tr>
                                                <td style="width: 50%;">  &nbsp  <a href="ProdPlanVsResult.php" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp CANCEL FILTER &nbsp</a>
                                                </td>
                                                <td valign="top">
                                                <a href=" CloningResults.php?address=ProdResult.php" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp SYNC &nbsp</a>
                                                </td>   
                                              </tr>
                                            </table>   --> 
            
                                              <div class="btn-group btn-group-sm">
                                              
                                            <button type="button" onclick="cancelfilter('ShipmentList','','shipment_management')" class="btn btn-outline-secondary btn-export6"><i class="fas fa-ban"></i>&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                            <button type="button" class="btn btn-outline-secondary btn-export6" onclick="SyncToProdOutputSystem();cancelfilter('ShipmentList','','shipment_management')" ><i class="fas fa-sync-alt"></i>&nbspSYNC&nbsp&nbsp</button>
                                            <button type="button" class="btn btn-outline-secondary btn-export6" onclick="exportxlsx('ShipmentList','','shipment_management')"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>
                                                             
                                            </div>
                                            
                                        </div>
                                      
            
            
                                    </div>
                                  </div>
            
                      </div> <!-- end div of col -->
                                            <!--  <div class="col-md-3" style="padding-top: 10px; border-style: solid">
                           
                                             </div> -->
                    <div class="col-sm-2"  style="padding-top: 10px; text-align: center; padding-left: 30px">
                      <div class="form-group">
                      <select id="StatusSort" class='form-control ' style="font-size: 10px; height: 30px" onchange='showTable("ShipmentList","","shipment_management")'>
                        <option value=''>ALL DATA</option>
                        <option value='SHIPPED'>SHIPPED</option>
                        <option value='APPROVED'>APPROVED</option>
                        <option value='DISAPPROVED'>DISAPPROVED</option>
                        <option value='PENDING'>PENDING</option>
                    </select>
                      </div>

                    </div>
                    
                    </div><!-- end of row-->
            
                </div>
            
            
            </div>
            
            




  <!-- div of container-fluid in the Shipment (main Page) -->





<div id="example-table"></div>


