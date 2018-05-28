

<div class="mod_options" style="z-index: 0;padding-top: 70px; padding-left: 10px">
                
    <div style="width: 100%;text-align: left;">


 
 
            <div class="row">
                                      <div class="col-sm-2" style="padding-top: 10px; text-align: center;">
                                        <div class="form-group">

                                              <table style="width: 100%">
                                                <tr>
                                                  <td><b>SEARCH: &nbsp</b></td>
                                                  <td> 
                                                    
                                                   

                                                    <input onchange='showTable("ProdPlanVsResultINJ","INJ","PlanWithResult")' id='search' type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>


                                                    
                                                  
                      
                                                    </td>
                                                    <td>&nbsp
                                                    <button type="button" onclick="showTable('ProdPlanVsResultINJ','INJ','PlanWithResult')" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp<i class="fa fa-search"></i>&nbsp</button>  
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

                                                          <input id='sortfrom' onchange='showTable("ProdPlanVsResultINJ","INJ","PlanWithResult")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                                            
                                                          </div>
                                                            <!-- Add clearfix for only the required viewport -->
                                                          <div class="clearfix visible-xs"></div>
                                                          <div class="col-xs-6 col-sm-0"> <b> TO: </b></div>
                                                          <div class="col-xs-6 col-sm-3">
                                                                
                                                                
                                                          <input id='sortto' onchange='showTable("ProdPlanVsResultINJ","INJ","PlanWithResult")' type='date' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                                                 

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
                                                                
                                                              <button type="button" onclick="cancelfilter('ProdPlanVsResultINJ','INJ','PlanWithResult')" class="btn btn-outline-secondary"><i class="fas fa-ban"></i>&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                                              <button type="button" class="btn btn-outline-secondary" onclick="SyncToProdOutputSystem();cancelfilter('ProdPlanVsResultINJ','INJ','PlanWithResult')" ><i class="fas fa-sync-alt"></i>&nbspSYNC&nbsp&nbsp</button>
                                                              <button type="button" class="btn btn-outline-secondary" onclick="exportxlsx('ProdPlanVsResultINJ','INJ','PlanWithResult')"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>
                                                            </div>
                                                              
                                                          </div>
                                                        


                                                      </div>
                                                    </div>

                                      </div> <!-- end div of col -->
                                      <div class="col-sm-3" style="padding-top: 15px; padding-right: 25px; text-align: right;">
                                       <span><h5>Prod Plan Vs Result INJ</h5></span>
                                    </div>
                          </div><!-- end of row-->
         
         

                 
    </div>


</div>
      
  

      
  </div>

 <!--
{      <div id="example-table"></div>
            <script type="text/javascript">
            //trigger AJAX load on "Load Data via AJAX" button click
            var screenheight=Number(screen.height-350);
            $("#example-table").tabulator({
                height: screenheight, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
                //layout:"fitColumns", //fit columns to width of table (optional)
                pagination:"local",
                paginationSize:100,
                movableColumns:true,
                groupBy:"DATE",
                
            // responsiveLayout:"collapse",
                columns:[ //Define Table Columns
                //{formatter:"responsiveCollapse", width:30, minWidth:30, align:"center", resizable:false, headerSort:false},
                
                    {title:"NO", field:"NO", width:60,frozen:true,align:"center"},
                    {title:"DATE", field:"DATE",frozen:true},
                    {title:"JO NO", field:"JO NO",frozen:true},
                    {title:"CUSTOMER CODE", field:"CUSTOMER CODE",},
                    {title:"CUSTOMER NAME", field:"CUSTOMER NAME"},
                    {title:"ITEM CODE", field:"ITEM CODE"},
                    {title:"ITEM NAME", field:"ITEM NAME"},
                    {title:"MACHINE CODE", field:"MACHINE CODE"},
                    {title:"MACHINE MAKER", field:"MACHINE MAKER"},
                    {title:"TONNAGE", field:"TONNAGE"},
                    {title:"MACHINE GROUP", field:"MACHINE GROUP"},
                    {title:"TOOL NO", field:"TOOL NO"},
                    {title:"PRIORITY", field:"PRIORITY"},
                    {title:"CYCLE TIME", field:"CYCLE TIME"},
                    {title:"PLAN QTY", field:"PLAN QTY",align: "center"},
                    {title:"PROD RESULT", field:"PROD RESULT",align: "center"},
                    {title:"GAP", field:"GAP",align: "center"},
                    {title:"ACHIEVE RATE", field:"ACHIEVE RATE", align: "center"},
                    {title:"DEFECT RATE", field:"DEFECT RATE"}
                ],
                //rowClick:function(e, row){ //trigger an alert message when the row is clicked
                //  alert("Row " + row.getData().id + " Clicked!!!!");
                //},
            });


            var tabledata = <?php #echo json_encode($datavar, JSON_PRETTY_PRINT) ?> ;


            //load sample data into the table
            $("#example-table").tabulator("setData", tabledata);

            $("#download-csv").click(function(){
                $("#example-table").tabulator("download", "csv", "ProdplanVsResult.csv");
            });


            //trigger download of data.xlsx file
            $("#download-xlsx").click(function(){
                $("#example-table").tabulator("download", "xlsx", "ProdplanVsResult.xlsx", {sheetName:"ProdPlanVsResult"+<?php #echo date("Y-m-d")?>});

            });

            //trigger download of data.pdf file
            $("#download-pdf").click(function(){
                $("#example-table").tabulator("download", "pdf", "ProdplanVsResult.pdf", {
                    orientation:"landscape", //set page orientation to portrait
                    title:"Production Plan Vs Result", //add title to report
                });
            });

            //trigger download of data.pdf file


            function cancelfilter()
            {
            
            }


            </script> 
}-->


<div id="example-table"></div>