var globalsqlstring="global";

function loadtbl2(TableName,deptSec,SectionGroup) 
{
  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        /* totalQty(); */
       document.getElementById("table_display").innerHTML = this.responseText;
       var tablename = TableName;

        showTable(TableName,deptSec,SectionGroup,"no");
        $('[data-toggle="tooltip"]').tooltip();

        

        

      }
    };
      xhttp.open("GET", TableName+".php", true);
      xhttp.send();
}
 

  
function updateTable(TableName,deptSec,SectionGroup)
{
    
    alert(TableName);
    showTable(TableName,deptSec,SectionGroup);
    setTimeout(updateTable,50000);
}




function showTable(moduleID,deptSec,SectionGroup,param1)
{
    //updateTable(moduleID,deptSec,SectionGroup);

    if(param1!="no")
    {
        $("#example-table").tabulator("destroy");
        
    }
    /*  alert(strfromobj+" "+searchobj+" "+strtoobj); */
 
    var strfromobj = document.getElementById("sortfrom").value;
    var searchobj = document.getElementById("search").value;
    var strtoobj = document.getElementById("sortto").value;
    var department= deptSec;
  
    
    if(SectionGroup=="PlanWithResult")
    {
     $.ajax({
           method:'POST',
           url:'/1_mes/_php/manuc_info/Prodplan/DataProdPlanVsResult.php',
           data:
           {
               'sortfrom': strfromobj,
               'sortto': strtoobj,
               'search': searchobj,
               'dept': department,
               'ajax':true
           },
           success: function(data) 
           {
               
            initTbl2("ProdPlanVsResult");
               var val = JSON.parse(data);
              /* alert(val); */
              $("#example-table").tabulator("setData",val);
           }
           

            });
            
     
    }
     else if(SectionGroup=="Result")
     {
        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/Prodplan/DataProdResult.php',
            data:
            {
                'sortfrom': strfromobj,
                'sortto': strtoobj,
                'search': searchobj,
                'dept': department,
                'ajax':true
  
            },
        
            
            success: function(data) 
            {
                initTbl2("ProdResult");
                var val = JSON.parse(data);
               /* alert(val); */
               $("#example-table").tabulator("setData",val); 
             
            }
  
        });


     }   
     else if(SectionGroup=="print_status")
     {
        var plantypeobj = document.getElementById("PlanType");
        var selectedOption = plantypeobj.options[plantypeobj.selectedIndex].value;
        
        
        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/ProdPlan/DataPrintStatus.php',
            data:
            {
                'sortfrom': strfromobj,
                'sortto': strtoobj,
                'search': searchobj,
                'PlanType': selectedOption,
                'ajax':true
  
            },
        
            
            success: function(data) 
            {
                initTbl2("PrintStatus");
                var val = JSON.parse(data);
               /* alert(val); */
               $("#example-table").tabulator("setData",val); 
             
            }
  
            });
     }
     else if(SectionGroup=="pending_production")
     {
        var plantypeobj = document.getElementById("PlanType");
        var selectedOption2 = plantypeobj.options[plantypeobj.selectedIndex].value;
       
        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/ProdPlan/DataPendingProduction.php',
            data:
            {
                'sortfrom': strfromobj,
                'sortto': strtoobj,
                'search': searchobj,
                'planType': selectedOption2,
                'ajax':true
  
            },
        
            
            success: function(data) 
            {
                initTbl2("PendingProduction");
                var val = JSON.parse(data);
               /* alert(val); */
               $("#example-table").tabulator("setData",val); 
             
            }
  
             });
     }
     else if(SectionGroup=="production_summary")
     {
        var sorttypeobj = document.getElementById("sorttype");
        var selectedOption = sorttypeobj.options[sorttypeobj.selectedIndex].value;
        var data21,data22;
        var charttypeobj = document.getElementById("charttype");
        var selectedChartType = charttypeobj.options[charttypeobj.selectedIndex].value;
        var plantypeobj = document.getElementById("PlanType");
        var selectedOption2 = plantypeobj.options[plantypeobj.selectedIndex].value;
       
        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/ProdPlan/graphdata.php',
            data:
            {
                'sortfrom': strfromobj,
                'sortto': strtoobj,
                'search': searchobj,
                'sorttype': selectedOption,
                'PlanType': selectedOption2,
                'ajax':true
            },
        
            
            success: function(data) 
            {
                //initTbl2("PendingProduction");
                
                
                filterTableSummary();
                var val = JSON.parse(data);
                $('.sel2').select2({width: '200px'});
                
               // alert(val.datapoints1);
                //alert(val.datapoints2);
               /* alert(val); */
              // $("#example-table").tabulator("setData",val); 

              
        var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
      exportEnabled: true,
      zoomEnabled:true,
    
      title:{
          text:"PRODUCTION SUMMARY- PROD PLAN VS PROD RESULT"
      },
      legend:{
          cursor: "pointer",
          itemclick: toggleDataSeries
      },
    
            toolTip: {
            shared: true
            },
            data: [{
                type: selectedChartType,
                name: "Production Plan (PCS)",
            legendText: "PRODUCTION PLAN",
                //indexLabel: "{y}",
                //yValueFormatString: "#,##0.## PCS",
                showInLegend: true,
                dataPoints: val.datapoints1
            },{
                type:  selectedChartType,
                name: "Production Result (PCS)",
                legendText: "PRODUCTION RESULT",
                //indexLabel: "{y}",
                //yValueFormatString: "#,##0.## PCS",
                showInLegend: true,
                dataPoints: val.datapoints2
            }]
        });
        chart.render();
        
        function toggleDataSeries(e){
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else{
                e.dataSeries.visible = true;
            }
            chart.render();
        }
        
        
        
                    
                    }
        
        });


     }

     else if(SectionGroup=="shipment_management")
     {
        var ShipStat = document.getElementById("StatusSort");
        var selectedOption = ShipStat.options[ShipStat.selectedIndex].value;
 
      $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/ProdPlan/DataShipmentList.php',
            data:
            {
                'sortfrom': strfromobj,
                'sortto': strtoobj,
                'search': searchobj,
                'ShipStat': selectedOption,
                'ajax':true
            },
            success: function(data) 
            {
             initTbl2("ShipmentList");
                var val = JSON.parse(data);
               /* alert(val); */
               $("#example-table").tabulator("setData",val);
            }
 
             });
    
     }
    
     
}

 function cancelfilter(moduleID,deptSec,SectionGroup)
 {
    document.getElementById("sortfrom").value="";
    document.getElementById("search").value="";
    document.getElementById("sortto").value="";
    showTable(moduleID,deptSec,SectionGroup);
 }


 function initTbl2(TabName)
 {
     if(TabName=="ProdPlanVsResult")
     {
        var screenheight=Number(screen.height-350);
        $("#example-table").tabulator({
           height: "70vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
           //layout:"fitColumns", //fit columns to width of table (optional)
           pagination:"local",
           paginationSize:100,
           placeholder:"No Data to Display or Today's plan is not yet available.",
           movableColumns:true,
           groupBy:"DATE",    columns:[
               {title:"NO", field:"NO", width:60,align:"center"},
               {title:"DATE", field:"DATE"},
               {title:"JO NO", field:"JO NO"},
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
       });


    } //end of if TabName == ProdPlanVsResultINJ
    
   else if(TabName=="ProdResult")
   {
    var screenheight=Number(screen.height-350);
    $("#example-table").tabulator({
       height: "70vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
       layout:"fitColumns", //fit columns to width of table (optional)
       pagination:"local",
       paginationSize:100,
       movableColumns:true,
       groupBy:"JO DATE",
       placeholder:"No Data to Display or Today's plan is not yet available.",
      // responsiveLayout:"collapse",
       columns:[ //Define Table Columns
        //{formatter:"responsiveCollapse", width:30, minWidth:30, align:"center", resizable:false, headerSort:false},
          
           {title:"NO", field:"NO", width:60},
           {title:"JO DATE", field:"JO DATE"},
           {title:"JO NO", field:"JO NO"},
           {title:"CUSTOMER CODE", field:"CUSTOMER CODE"},
           {title:"CUSTOMER NAME", field:"CUSTOMER NAME"},
           {title:"ITEM CODE", field:"ITEM CODE"},
           {title:"ITEM NAME", field:"ITEM NAME"},
           {title:"TOOL NO", field:"TOOL NO"},
           {title:"PLAN QTY", field:"PLAN QTY"},
           {title:"CURRENT PROD RESULT", field:"CURRENT PROD RESULT"},
           {title:"GAP", field:"GAP"},
           {title:"ACHIEVE RATE", field:"ACHIEVE RATE"},
           {title:"DEFECT RATE", field:"DEFECT RATE"}
       ]
     });
   
   }
   else if(TabName=="PrintStatus")
   {
    var screenheight=Number(screen.height-350);
    $("#example-table").tabulator({
       height: "70vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
       //layout:"fitColumns", //fit columns to width of table (optional)
       pagination:"local",
       paginationSize:100,
       placeholder:"No Data to Display",
       movableColumns:true,
       //groupBy:"PROD DATE",
      // responsiveLayout:"collapse",
       columns:[ //Define Table Columns
        //{formatter:"responsiveCollapse", width:30, minWidth:30, align:"center", resizable:false, headerSort:false},
   
           {title:"NO", field:"NO", width:60},
           {title:"JO NO", field:"JO NO"},
           {title:"SERIAL PRINT", field:"SERIAL PRINT"},
           {title:"PROD DATE", field:"PROD DATE", align:"center"},
           {title:"ITEM CODE", field:"ITEM CODE"},
           {title:"ITEM NAME", field:"ITEM NAME"},
           {title:"MODEL", field:"MODEL"},
           {title:"PRINT QTY", field:"PRINT QTY"},
           {title:"MACHINE CODE", field:"MACHINE CODE"},
           {title:"TOOL NO", field:"TOOL NO"},
           {title:"PACKING NUMBER", field:"PACKING NUMBER"},
           {title:"PRINT TIME", field:"PRINT TIME"},
           {title:"PRINTED BY", field:"PRINTED BY"}
       ],
   });
   
   }
   else if(TabName=="PendingProduction")
   {
    var screenheight=Number(screen.height-350);
    $("#example-table").tabulator({
       height: "70vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
       //layout:"fitColumns", //fit columns to width of table (optional)
       pagination:"local",
       paginationSize:100,
       placeholder:"No Data to Display or Today's plan is not yet available.",
       movableColumns:true,
       groupBy:"DATE",    
       columns:[
           {title:"NO", field:"NO", width:60,align:"center"},
           {title:"DATE", field:"DATE"},
           {title:"JO NO", field:"JO NO"},
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
   });
   
   }
   else if(TabName=="ShipmentList")
   {

    var screenheight=Number(screen.height-350);
    $("#example-table").tabulator({
        height: "70vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    //layout:"fitColumns", //fit columns to width of table (optional)
    pagination:"local",
    paginationSize:100,
    placeholder:"No Data to Display",
    movableColumns:true,
    groupBy:"LOT_NUMBER",
    groupHeader:function(value, count, data, group){
        //value - the value all members of this group share
        //count - the number of rows in this group
        //data - an array of all the row data objects in this group
        //group - the group component for the group
        if(count > 1)
        {
            return "LOT NUMBER: "+ value + "<span style='margin-left:10px;'>(" + count + " items) </span>";
        }
        else
        {
            return "LOT NUMBER: "+ value + "<span style='margin-left:10px;'>(" + count + " item) </span>";
        }


    },
    tooltipsHeader:true,
    columns:[
        
        {title:"NO", field:"NO", width:60,align:"center"},
        { title:"MARK ITEM AS ",align:"center", align:"center",
         formatter:function(cell, formatterParams){ //plain text value
        
            var shipStat = cell.getRow().getData().SHIPMENT_STATUS;
            if(shipStat=="WAITING FOR SHIPMENT")
            {
                return '<div class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> MARK AS SHIPPED</div>';
            }
            else if(shipStat=="ALREADY SHIPPED")
            {
                return '<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-undo-alt"></i> UNDO SHIPMENT</button>';

            }
            else
            {
                return '<button type="button" class="btn btn-danger btn-sm" disabled ><strike><i class="fas fa-check-circle"></i> MARK AS SHIPPED</strike></button>';
            }


        },
          cellClick:function(e, cell){
             var shipStat = cell.getRow().getData().SHIPMENT_STATUS;
             if(shipStat=="WAITING FOR SHIPMENT")
             {
                ///alert("Printing row data for: " + cell.getRow().getData().PACKING_NUMBER);
                swal({
                    title: 'Are you sure you want to mark '+ cell.getRow().getData().PACKING_NUMBER+" as shipped? ",
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Mark as shipped!'
                  }).then((result) => {

                    if (result.value) {

                        $.ajax({
                            method:'POST',
                            url:'/1_mes/_php/manuc_info/Prodplan/MarkAsShipped.php',
                            data:
                            {
                                'packingno': cell.getRow().getData().PACKING_NUMBER,
                                'lotno':cell.getRow().getData().LOT_NUMBER,
                                'jono': cell.getRow().getData().JO_NO,
                                'ajax':true
                  
                            },
                        
                            
                            success: function(data) 
                            {
                               
                                showTable("ShipmentList","","shipment_management")
                            swal(
                                'SUCCESS!',
                                cell.getRow().getData().PACKING_NUMBER+' is marked as shipped.',
                                'success'
                            )
                            //alert(data);
                            }
                  
                        });
                


                    }
                 
                })

             }
             else if(shipStat=="ALREADY SHIPPED")
             {
                //alert("This data is already shipped.");  
                swal({
                    title: 'Are you sure you want to undo this shipment?',
                    text: "PACKING NUMBER: " +cell.getRow().getData().PACKING_NUMBER,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, undo this status!'
                  }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method:'POST',
                            url:'/1_mes/_php/manuc_info/Prodplan/RevertMarkAsShipped.php',
                            data:
                            {
                                'packingno': cell.getRow().getData().PACKING_NUMBER,
                                'lotno':cell.getRow().getData().LOT_NUMBER,
                                'ajax':true
                  
                            },
                        
                            
                            success: function(data) 
                            {
                                showTable("ShipmentList","","shipment_management");
                            swal(
                                'SUCCESS!',
                                cell.getRow().getData().PACKING_NUMBER+' Revert status from SHIPPED to APPROVED.',
                                'success'
                            )
                             
                            }
                  
                        });
                
                    }
                  })
                  
              
             }
             else
             {
                //alert("Data cant be marked as shipped due to its lot judgement(LOT JUDGEMENT: " + shipStat+")");
                swal({
                    type: 'error',
                    title: 'This data cant be marked as shipped due to its lot judgement.',
                    text: 'SHIPMENT STATUS: ' + shipStat  
               
                })
                  
             }
       
            }
        },
 
        {title:"SHIPMENT STATUS", field:"SHIPMENT_STATUS",formatter:function(cell, formatterParams){
            //cell - the cell component
            //formatterParams - parameters set for the column
            var datacell = cell.getValue();
            if(datacell=="REJECT/WAITING FOR REWORKS")
            {
                return "<span style='color:red; font-weight:bold;'>" + datacell + "</span>";
            }
            else if(datacell=="WAITING FOR SHIPMENT")
            {
                return "<span style='color:green; font-weight:bold;'>" + datacell + "</span>";
            }
            else if(datacell=="ALREADY SHIPPED")
            {
                return "<span style='color:Blue; font-weight:bold;'>" + datacell + "</span>";
            }
            else
            {
                return "<span style='color:orange; font-weight:bold;'>" + datacell + "</span>";
            }
    
        }},
        
        {title:"LOT CREATE DATE", field:"LOT CREATE DATE"},
        {title:"PACKING NUMBER", field:"PACKING_NUMBER"},
        {title:"LOT NUMBER", field:"LOT_NUMBER"},
        {title:"JO NO", field:"JO_NO"},
        {title:"ITEM CODE", field:"ITEM CODE"},
        {title:"ITEM NAME", field:"ITEM NAME"},
        {title:"MACHINE CODE", field:"MACHINE CODE"},
        {title:"LOT JUDGEMENT", field:"LOT JUDGEMENT"}
            ],
    });
   }
 
   
 
     
 }


 function exportxlsx(moduleID,deptSec,SectionGroup)
 {
    $("#example-table").tabulator("download", "xlsx", moduleID+".xlsx", {sheetName:moduleID});
      
    
 }

 function filterTableSummary()
 {
    var strfromobj = document.getElementById("sortfrom").value;
    var searchobj = document.getElementById("search").value;
    var strtoobj = document.getElementById("sortto").value;
    
    var sorttypeobj = document.getElementById("sorttype");
    var selectedOption = sorttypeobj.options[sorttypeobj.selectedIndex].value;
    var plantypeobj = document.getElementById("PlanType");
    var selectedOption2 = plantypeobj.options[plantypeobj.selectedIndex].value;
   
    if(selectedOption=="DAILY")
    {
        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/ProductionSummary/ProductionSummaryDaily.php',
            data:
            {
                'sortfrom': strfromobj,
                'sortto': strtoobj,
                'search': searchobj,
                'sorttype': selectedOption,
                'PlanType': selectedOption2,
                'ajax':true
            },
        
            
            success: function(data) 
            {

    
                document.getElementById("tablesummary").innerHTML = data;
                var sumDiv = document.getElementById("cont_sum");
                var screenheight=Number(screen.height-250);
                sumDiv.setAttribute("style", "height: 70vh;overflow: auto;");

                
            }
        });
       
    }
    else
    {
        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/ProductionSummary/ProductionSummaryMonthly.php',
            data:
            {
                'sortfrom': strfromobj,
                'sortto': strtoobj,
                'search': searchobj,
                'sorttype': selectedOption,
                'PlanType': selectedOption2,
                'ajax':true
            },
        
            
            success: function(data) 
            {                document.getElementById("tablesummary").innerHTML = data;
            var sumDiv = document.getElementById("cont_sum");
            var screenheight=Number(screen.height-250);
      
            sumDiv.setAttribute("style", "height: 70vh;overflow: auto;");
            }
        });

    }


 }


 function underConstruct()
 {
    swal({
        type: 'error',
        title: 'This section is currently unavailable. ',
        text: 'STATUS: currently creating  ' 
   
    })
   
 }

 
 



 