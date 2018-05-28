<div class="mod_menu" style="position: absolute;padding-left: 15px;padding-top: 12px;">

 
       <nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; ">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->MENU
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav nav-tabs mr-auto mt-1">                
          <li class="nav-item dropdown" style="overflow:visible;">
            <a class="nav-link tbl dropdown-toggle bar active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Production Plan Vs Result
            </a>
              <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">                  
                <div class="container dropdown-header text-left">
                  
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdPlanVsResultINJ','INJ','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>INJ</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdResultINJ','INJ','Result');" style="color: black">PROD RESULT - <b>INJ</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdPlanVsResultSMT','SMT','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>SMT</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdResultSMT','SMT','Result');" style="color: black">PROD RESULT - <b>SMT</b></a>
                    </h6>
                    </div>                      
                  </div>
                  
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdPlanVsResultMOLD','MOLD','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>MOLD </b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdResultMOLD','MOLD','Result');" style="color: black">PROD RESULT - <b>MOLD</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdPlanVsResultASSY','ASSY','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>ASSY</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdResultASSY','ASSY','Result');" style="color: black">PROD RESULT - <b>ASSY</b></a>
                      </h6>
                    </div>                      
                  </div>
                  
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdPlanVsResultPRINTING','PRINTING','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>PRINTING</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdResultPRINTING','PRINTING','Result');" style="color: black">PROD RESULT - <b>PRINTING</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdPlanVsResultSAMPLES','SAMPLES','PlanWithResult');" style="color: black">PROD PLAN VS RESULT - <b>SAMPLES</b></a>
                      </h6>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col">
                      <h6 class="text-left">
                      <a href="#" onclick="loadtbl2('ProdResultSAMPLES','SAMPLES','Result');" style="color: black">PROD RESULT - <b>SAMPLES</b></a>
                      </h6>
                    </div>                      
                  </div>

                </div>
                
              </div>
          </li>      
              <li>
                <a class="nav-link tbl" id="menuhover"  href="#" onclick="loadtbl2('ProductionSummary','','production_summary')">Production Summary</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover"  href="#" onclick="loadtbl2('PrintStatus','','print_status')">Print Status</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover" href="#" onclick="loadtbl2('PendingProduction','','pending_production')">Pending Production</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover" href="#">Production Stop</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover" href="#" onclick="loadtbl2('ShipmentList','','shipment_management')">Shipment List</a>
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
