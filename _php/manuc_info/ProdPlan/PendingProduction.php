



<div class="mod_options" style="z-index: 0;padding-top: 70px;padding-left: 15px">
                
    <div style="width: 100%;text-align: left;">


 
          <form action='#' method='POST' id="sortform">
            <div class="row">
            
                                      <div class="col-sm-2" style="padding-top: 10px; text-align: center;">
                                        <div class="form-group">

                                              <table style="width: 100%">
                                                <tr>
                                                  <td><b>SEARCH: &nbsp</b></td>
                                                  <td> 
                                                    
                                                   

                                                    <input onchange='showTable("PendingProduction","","pending_production")' id='search' type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>


                                                    
                                                  
                                                    
                                                  
                                                    </td>
                                                    <td>&nbsp
                                                    <button type="button" onclick='showTable("PendingProduction","","pending_production")' class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp<i class="fa fa-search"></i>&nbsp</button>  
                                                  </td>

                                                                                          
                                                  
                                                </tr>
                                              </table>
                                                
                                            
                                        </div>

                                      </div>    

                                        <div class="col-sm-6">
                                    
                                            
                                                    <div class="form-group">
                                                      <div class="row" style="padding-top: 10px;">
                                                          <div class="col-xs-6 col-sm-0" style="font-size: 12px; text-align: center">
                                                              <b> &nbsp &nbsp SORT DATE <br>FROM:</b>
                                                          </div>
                                                          <div class="col-xs-6 col-sm-3">

                                                          <input id='sortfrom' onchange='showTable("PendingProduction","","pending_production")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                                            
                                                          </div>
                                                            <!-- Add clearfix for only the required viewport -->
                                                          <div class="clearfix visible-xs"></div>
                                                          <div class="col-xs-6 col-sm-0"> <b> TO: </b></div>
                                                          <div class="col-xs-6 col-sm-3">
                                                                
                                                                
                                                          <input id='sortto' onchange='showTable("PendingProduction","","pending_production")' type='date' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                                                 

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
                                                                
                                                              <button type="button" onclick="cancelfilter('PendingProduction','','pending_production')" class="btn btn-outline-secondary"><i class="fas fa-ban"></i>&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                                              <button type="button" class="btn btn-outline-secondary" onclick="SyncToProdOutputSystem();cancelfilter(showTable('PendingProduction','','pending_production'))" ><i class="fas fa-sync-alt"></i>&nbspSYNC&nbsp&nbsp</button>
                                                              <button type="button" class="btn btn-outline-secondary" onclick="exportxlsx('PendingProduction','','pending_production')"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>

                                                              </div>
                                                              
                                                          </div>
                                                        


                                                      </div>
                                                    </div>

                                      </div> <!-- end div of col -->


                                      <!--  <div class="col-md-3" style="padding-top: 10px; border-style: solid">

                                          

                                        </div> -->

                          </div><!-- end of row-->
          </form>

                 
    </div>


</div>
      
  

<div id="example-table"></div>



