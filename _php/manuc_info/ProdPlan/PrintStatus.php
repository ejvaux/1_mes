
<div class="mod_options" style="z-index: 1;padding-top: 70px;padding-left :15px">

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
                                    <input type='text' id='search' onchange='showTable("PrintStatus","","print_status")' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>
                                    <div class="input-group-append" id="btnGroupAddon3">
                                    <button type="button" onclick='showTable("PrintStatus","","print_status")' class="btn btn-outline-secondary btn-export6 btn-sm" style="z-index:0">&nbsp<i class="fa fa-search"></i>&nbsp</button>    </div>
                                </div>

                                <div class="input-group btn-sm" style="height: 40px;">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon2">SORT FROM:</div>
                                    </div>
                                    <input type='date' id='sortfrom' onchange='showTable("PrintStatus","","print_status")' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                </div>
                                
                                <div class="input-group btn-sm" style="height: 40px;">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon2">SORT TO:</div>
                                    </div>
                                    <input type='date' id='sortto' onchange='showTable("PrintStatus","","print_status")' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                </div>
                                
                                <div class="input-group btn-sm" style="height: 40px;">
                                    <div class="btn-group btn-group-sm">  
                                    <button type="button" onclick="cancelfilter('PrintStatus','','print_status')" class="btn btn-outline-secondary btn-export6"><i class="fas fa-ban"></i>&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                    <button type="button" class="btn btn-outline-secondary btn-export6" onclick="SyncToProdOutputSystem();syncdatareload('PrintStatus','','print_status')" ><i class="fas fa-sync-alt"></i>&nbspSYNC&nbsp&nbsp</button>
                                    <button type="button" class="btn btn-outline-secondary btn-export6" onclick="exportxlsx('PrintStatus','','print_status')"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>
                                </div>
                                &nbsp&nbsp
                                <?php

                                    include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
                                    $sqlPlanType = " SELECT SAP_DIVISION_CODE, DIVISION_NAME from dmc_division_code";
                                    $resultSqlPlanType = $conn->query($sqlPlanType);
                                    ?>
                                    <select id="PlanType" class="form-control" onchange="showTable('PrintStatus','','print_status')" style="width: 150px;font-size: 10px; height:33px" name="PlanType">';
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



                    </div> <!-- end div of col -->



          </div> <!-- end div of row -->



    </div>



</div>
      
  



 <!--
   {
            <div id="example-table"></div>
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




