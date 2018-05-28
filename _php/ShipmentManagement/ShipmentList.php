<div class="mod_menu" style="position: absolute;padding-left: 20px;padding-top: 12px">

 
       <nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2;">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->MENU
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav nav-tabs mr-auto mt-1">                
          <li class="nav-item dropdown" style="overflow:visible;">
            <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Production Plan Vs Result
            </a>
              <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">                  
                <div class="container dropdown-header text-left">
                  
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResult.php" style="color: black">PROD PLAN VS RESULT - <b>INJ</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="/1_mes/_php/manuc_info/ProdPlan/ProdResult.php" style="color: black">PROD RESULT - <b>INJ</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResultSMT.php" style="color: black">PROD PLAN VS RESULT - <b>SMT</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="/1_mes/_php/manuc_info/ProdPlan/ProdResultSMT.php" style="color: black">PROD RESULT - <b>SMT</b></a>
                    </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResultASSY.php" style="color: black">PROD PLAN VS RESULT - <b>ASSY</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="/1_mes/_php/manuc_info/ProdPlan/ProdResultASSY.php" style="color: black">PROD RESULT - <b>ASSY</b></a>
                      </h6>
                    </div>                      
                  </div>

                </div>
                
              </div>
          </li>      
              <li>
                <a class="nav-link tbl" id="menuhover"  href="/1_mes/_php/manuc_info//ProductionSummary/ProductionSummary.php">Production Summary</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover"  href="/1_mes/_php/manuc_info/PrintStatus/PrintStatus.php">Print Status</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover" href="/1_mes/_php/manuc_info/PendingProduction/PendingProduction.php">Pending Production</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover" href="#">Production Stop</a>
              </li>

            <li>
                <a class="nav-link tbl active" id="menuhover"  href="#" onclick="loadtbl('ShipmentList')">Shipment List</a>
              </li>
            
    

            </ul>
             <!-- ICONS ON LEFT -->
          <?php
              include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/tab_navbar.php";            
          ?>
          <!-- ICONS ON LEFT END -->
          </div>  


        </nav>
        

        
</div>

<div class="mod_options" style="z-index: 0;padding-top: 70px; padding-left: 10px" >
                
                <div style="width: 100%;text-align: left;">
                  <div class="row">
                  
                      <div class="col-sm-2" style="padding-top: 10px; text-align: center;">
                        <div class="form-group">
            
                              <table style="width: 100%">
                                <tr>
                                  <td><b>SEARCH: &nbsp</b></td>
                                  <td> 
                                    
                                    <input onchange='showUser("ShipmentList")' id='search' type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>
            
                                    </td>
                                    <td>&nbsp
                                    <button type="button" onclick="showUser('ShipmentList')" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp<i class="fa fa-search"></i>&nbsp</button>  
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
            
                                        <input id='sortfrom' onchange='showUser("ShipmentList")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                          
                                        </div>
                                          <!-- Add clearfix for only the required viewport -->
                                        <div class="clearfix visible-xs"></div>
                                        <div class="col-xs-6 col-sm-0"> <b> TO: </b></div>
                                        <div class="col-xs-6 col-sm-3">
                                              
                                              
                                        <input id='sortto' onchange='showUser("ShipmentList")' type='date' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                                
            
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
                                              
                                            <button type="button" onclick="cancelfilter('ShipmentList')" class="btn btn-outline-secondary">&nbsp&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                            <button type="button" class="btn btn-outline-secondary" onclick="exportExcel()">&nbsp&nbspEXCEL&nbsp&nbsp</button>
                                            <button type="button" class="btn btn-outline-secondary" id="download-pdf">&nbsp&nbspPDF&nbsp&nbsp</button>
                                            </div>
                                            
                                        </div>
                                      
            
            
                                    </div>
                                  </div>
            
                      </div> <!-- end div of col -->
                                            <!--  <div class="col-md-3" style="padding-top: 10px; border-style: solid">
                                              </div> -->
                    </div><!-- end of row-->
            
                </div>
            
            
            </div>
            
            




  <!-- div of container-fluid in the Shipment (main Page) -->





<div id="example-table"></div>


