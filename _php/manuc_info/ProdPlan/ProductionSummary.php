

    <br>

    <div class="mod_options" style="z-index: 1;padding-top: 50px;">
                    
          <div style="width: 100%;text-align: left;">


           
              <form action='ProductionSummarySort.php' method='POST' id='sortingform'>
                                          <div class="row">
                                                    
                                        
                                                    <div class="col-sm-2" style="padding-top: 10px; text-align: center;">
                                                      <div class="form-group">

                                                            <table style="width: 100%">
                                                              <tr>
                                                                <td><b>SEARCH: &nbsp</b></td>
                                                                <td> 
                                                                 <select id='search' name='search1' onchange="showTable('ProductionSummary','','production_summary')"  class='form-control' style='font-size: 10px; height:30px'>
                                                                  <option value=''>--SELECT ITEM--</option>";
                                                               
                                                                  <?php
                                                                  
                                                                  include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

                                                              

                                                                  $sql="SELECT DISTINCT(ITEM_NAME) FROM dmc_item_list ORDER BY ITEM_NAME ASC";
                                                                  $result=$conn->query($sql);


                                                                 

                                                                  

                                                                  while ( $row=$result->fetch_assoc()) 
                                                                  {
                                                                    # code.
                                                                    
                                                                             echo " <option value='".$row['ITEM_NAME']."'>".$row['ITEM_NAME']."</option>"; 
                                                                         
                                                                     
                                                                  }
                                                                    
                                                                        
                                                                  echo "</select>";


                                                                  ?>
                                                               
                                                                  
                                                                
                                                                 </td>
                                                               

                                                                                                       
                                                                
                                                              </tr>
                                                            </table>
                                                              
                                                          
                                                      </div>
                                                    </div>    

                                                     <div class="col-md-6">
                                                  
                                                          
                                                                  <div class="form-group">
                                                                    <div class="row" style="padding-top: 10px;">
                                                                      <div class="col-xs-6 col-sm-0" style="font-size: 12px; text-align: center">
                                                                       <b> &nbsp &nbsp SORT DATE <br>FROM:</b>
                                                                      </div>
                                                                      <div class="col-xs-6 col-sm-3">

                                                                     
                                                                        <input type='date' id='sortfrom' name='sortingdatefrom' onchange="showTable('ProductionSummary','','production_summary')" class='form-control' style='font-size: 10px'>
                                                                     
                                                                      </div>
                                                                      <!-- Add clearfix for only the required viewport -->
                                                                      <div class="clearfix visible-xs"></div>
                                                                      <div class="col-xs-6 col-sm-0"> <b> TO: </b></div>
                                                                      <div class="col-xs-6 col-sm-3">
                                                                        <input type='date' id='sortto' name='sortingdateto' onchange="showTable('ProductionSummary','','production_summary')" class='form-control' style='font-size: 10px'>
                                                                        
                                                                      </div>

                                                                      <div class="col-xs-6 col-sm-3" style="text-align: center;">
                                                                        <table style="width: 100%">
                                                                          <tr>
                                                                        
                                                                        <td style="width: 50%;">
                                                                        <button type="button" style=" height:35px;" onclick="cancelfilter('ProductionSummary','','production_summary')" class="btn btn-outline-secondary"><i class="fas fa-ban"></i>&nbspCANCEL FILTER</button>  
                                                                       </td>
                                                                          </tr>
                                                                        </table>
                                                                      
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                    </div> <!-- end div of col $drpsortgraphtype -->

                                                     <div class="col-md-3" style="padding-top: 10px;">

                                                          <div class="form-group" style="display:inline-block;"> 
                                                          <select class="form-control" id="sorttype" style="width: 120px;font-size: 10px; height:30px" onchange="showTable('ProductionSummary','','production_summary');filterTableSummary()">
                                                            <option>DAILY</option>
                                                            <option>MONTHLY</option>

                                                          </select>
                                                          </div>
                                                          &nbsp&nbsp&nbsp
                                            

                                                          <div class="form-group" style="display:inline-block;"> 
                                                           
                                                            <select id="charttype" class="form-control" onchange="showTable('ProductionSummary','','production_summary')" style="width: 120px;font-size: 10px; height:30px" name="chartType">
                                                              <option value='bar'>BAR CHART</option>
                                                              <option value='column'>COLUMN CHART</option>
                                                              <option value='line' >LINE CHART</option>
                                                              <option value='spline' >SPLINE CHART</option>
                                                              <option value='stepLine' >STEPLINE CHART</option>
                                                            </select>
                                                          </div>
                                                    </div><!-- end div of col -->

                                          </div><!-- end div of row -->
              </form>
                               
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
     








