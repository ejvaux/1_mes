

    <br>

    <div class="mod_options" style="z-index: 1;padding-top: 50px;">
                    
          <div style="width: 100%;text-align: left;">


           

                             <div class="row">
                                                    
                                        
                                                    <div class="col">
                                                      <div class="form-group">

                                                        <div class="row">
                                                          <div class="col-12">                                                          
                                                            <div class="btn-toolbar mb-1" role="toolbar" aria-label="Toolbar with button groups">
                                                          
                                                                <div class="input-group btn-sm" style="height: 43px;">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text" id="btnGroupAddon2">SEARCH:</div>
                                                                    </div>
                                                                 
                                                                  <select class="sel2 form-control mydrp" id='search' name='search1'
                                                                  onchange="showTable('ProductionSummary','','production_summary','no')" >
                                                                      <option value=''>--SELECT ITEM--</option>";
                                                               
                                                                        <?php
                                                                        
                                                                        include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

                                                                        $sql="SELECT DISTINCT(ITEM_NAME) FROM dmc_item_list ORDER BY ITEM_NAME ASC";
                                                                        $result=$conn->query($sql);

                                                                        while ( $row=$result->fetch_assoc()) 
                                                                        {
                                                                                  echo " <option value='".$row['ITEM_NAME']."'>".$row['ITEM_NAME']."</option>"; 
                                                                          
                                                                        }
                                                                        
                                                                        ?>

                                                                  </select>
                                                                </div>

                                                                <div class="input-group btn-sm" style="height: 43px;">
                                                                  <div class="input-group-prepend">
                                                                    <div class="input-group-text" id="btnGroupAddon2">SORT FROM:</div>
                                                                  </div>
                                                                  <input type='date' id='sortfrom' name='sortingdatefrom' 
                                                                  onchange="showTable('ProductionSummary','','production_summary','no')" class='form-control' style='font-size: 10px'>
                                                                </div>
                                                                
                                                                <div class="input-group btn-sm" style="height: 43px;">
                                                                  <div class="input-group-prepend">
                                                                    <div class="input-group-text" id="btnGroupAddon2">SORT TO:</div>
                                                                  </div>
                                                                  <input type='date' id='sortto' name='sortingdateto' onchange="showTable('ProductionSummary','','production_summary','no')" class='form-control' style='font-size: 10px'>
                                                                </div>
                                                                
                                                                <div class="input-group btn-sm" style="height: 43px;">

                                                                 <div class="btn-group btn-group-sm">
                                                                <button type="button" onclick="loadtbl2('ProductionSummary','','production_summary')" class="btn btn-outline-secondary btn-export6 btn-sm"><i class="fas fa-ban"></i>&nbspCANCEL FILTER</button>    
                                                               <button type="button" onclick="prodexport()" class="btn btn-outline-secondary btn-export6 btn-sm"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>    
                                                                </div>

                                                                     &nbsp&nbsp 
                                                                     <select class="form-control btn-sm" id="sorttype" style="width: 80px;font-size: 10px;height:36px" onchange="showTable('ProductionSummary','','production_summary','no');filterTableSummary()">
                                                                        <option>DAILY</option>
                                                                        <option>MONTHLY</option>
                                                                      </select>
                                                                      &nbsp
                                                                      <select id="charttype" class="form-control" onchange="showTable('ProductionSummary','','production_summary','no')" style="width: 100px;font-size: 10px; height:36px" name="chartType">
                                                                          <option value='bar'>BAR CHART</option>
                                                                          <option value='column'>COLUMN CHART</option>
                                                                          <option value='line' >LINE CHART</option>
                                                                          <option value='spline' >SPLINE CHART</option>
                                                                          <option value='stepLine' >STEPLINE CHART</option>
                                                                      </select>
                                                                      &nbsp
                                                                      <?php

                                                                          include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
                                                                          $sqlPlanType = " SELECT SAP_DIVISION_CODE, DIVISION_NAME from dmc_division_code";
                                                                          $resultSqlPlanType = $conn->query($sqlPlanType);
                                                                      ?>
                                                                          <select id="PlanType" class="form-control" onchange="showTable('ProductionSummary','','production_summary','no')" style="width: 100px;font-size: 10px; height:36px" name="PlanType">';
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
                                                  


                                                   
                                                   
                                                      </div> <!-- end div of form group -->
                                                    </div><!-- end div of col -->

                              </div><!-- end div of row -->
             
             
                               
          </div>   
    </div>
          
<!-- end of mod_options -->


<div id="cont_sum">
<div id="chart_cont">
<div id="chartContainer" style="height: 100%; width: 95%; margin: 0 auto; clear: both">
</div>
</div>

<div id="tablesummary" style="position: relative; top:400px">

</div>
 
 </div>

 
     








