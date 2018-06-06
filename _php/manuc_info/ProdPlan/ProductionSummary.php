

    <br>

    <div class="mod_options" style="z-index: 1;padding-top: 50px;">
                    
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
                                                                 
                                                                  <select id='search' name='search1' onchange="showTable('ProductionSummary','','production_summary')"  class='form-control' style='font-size: 10px; height:32px; width: 200px'>
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

                                                                <div class="input-group btn-sm" style="height: 40px;">
                                                                  <div class="input-group-prepend">
                                                                    <div class="input-group-text" id="btnGroupAddon2">SORT FROM:</div>
                                                                  </div>
                                                                  <input type='date' id='sortfrom' name='sortingdatefrom' onchange="showTable('ProductionSummary','','production_summary')" class='form-control' style='font-size: 10px'>
                                                                </div>
                                                                
                                                                <div class="input-group btn-sm" style="height: 40px;">
                                                                  <div class="input-group-prepend">
                                                                    <div class="input-group-text" id="btnGroupAddon2">SORT TO:</div>
                                                                  </div>
                                                                  <input type='date' id='sortto' name='sortingdateto' onchange="showTable('ProductionSummary','','production_summary')" class='form-control' style='font-size: 10px'>
                                                                </div>
                                                                
                                                                <div class="input-group btn-sm" style="height: 40px;">
                                                                
                                                                <button type="button" onclick="cancelfilter('ProductionSummary','','production_summary')" class="btn btn-outline-secondary btn-export6 btn-sm"><i class="fas fa-ban"></i>&nbspCANCEL FILTER</button>    

                                                                     &nbsp&nbsp 
                                                                     <select class="form-control btn-sm" id="sorttype" style="width: 120px;font-size: 10px;height:33px" onchange="showTable('ProductionSummary','','production_summary');filterTableSummary()">
                                                                        <option>DAILY</option>
                                                                        <option>MONTHLY</option>
                                                                      </select>
                                                                      &nbsp
                                                                      <select id="charttype" class="form-control" onchange="showTable('ProductionSummary','','production_summary')" style="width: 120px;font-size: 10px; height:33px" name="chartType">
                                                                          <option value='bar'>BAR CHART</option>
                                                                          <option value='column'>COLUMN CHART</option>
                                                                          <option value='line' >LINE CHART</option>
                                                                          <option value='spline' >SPLINE CHART</option>
                                                                          <option value='stepLine' >STEPLINE CHART</option>
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
<div id="chartContainer" style="height: 100%; width: 95%; margin: 0 auto; clear: both"></div>
</div>

<div id="tablesummary" style="position: relative; top:400px">

</div>
 
 </div>
     








