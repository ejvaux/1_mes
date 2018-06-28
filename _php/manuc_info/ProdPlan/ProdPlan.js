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
        $('.sel2').select2({width: '80%'});
        if(param1!="no")
        {
            $("#example-table2").tabulator("destroy");
            $("#example-table3").tabulator("destroy");
            
        }
        var ShipStat = document.getElementById("StatusSort");
        var selectedOption = ShipStat.options[ShipStat.selectedIndex].value;
        //example table
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
               //$("#example-table2").tabulator("setData",val);
            }
 
             });
        //example table 2
        $.ajax({
        method:'POST',
        url:'/1_mes/_php/manuc_info/ProdPlan/DataTempShipmentList.php',
        data:
        {
            
            'ajax':true
        },
        success: function(data) 
        {
            initTbl2("TempGroup");
            var val = JSON.parse(data);
            //alert(data);
            //$("#example-table").tabulator("setData",val);
            $("#example-table2").tabulator("setData",val);
        }

        });     
        
        //example table 3
        var searchobj2 = document.getElementById("search2").value;
            $.ajax({
                method:'POST',
                url:'/1_mes/_php/manuc_info/ProdPlan/DataGroupList.php',
                data:
                {
                    'search': searchobj2,
                    'ajax':true
                },
                success: function(data) 
                {
                    initTbl2("GroupList");
                    var val = JSON.parse(data);
                    //alert(data);
                    //$("#example-table").tabulator("setData",val);
                    $("#example-table3").tabulator("setData",val);
                }
        
                    });     
                    
    
     }

     else if(SectionGroup=="shipment_management1")
     {
        var ShipStat = document.getElementById("StatusSort");
        var selectedOption = ShipStat.options[ShipStat.selectedIndex].value;
        //example table
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
             initTbl2("ShipmentList1");
                var val = JSON.parse(data);
                 
               /* alert(val); */
               $("#example-table").tabulator("setData",val);
               //$("#example-table2").tabulator("setData",val);
            }
 
             });
     }

      else if(SectionGroup=="dr_assign")
     {
      
        var DrDataTypeobj = document.getElementById("DrDataType");
        var selectedOption2 = DrDataTypeobj.options[DrDataTypeobj.selectedIndex].value;
       
        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/ProdPlan/DataDrAssign.php',
            data:
            {
                'sortfrom': strfromobj,
                'sortto': strtoobj,
                'search': searchobj,
                'drdatatype': selectedOption2,
                'ajax':true
  
            },
        
            
            success: function(data) 
            {
                LoadTableOfDrDetails("testing","UnassignedDr","no");
                initTbl2("Dr-Assign");
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
    if(moduleID=="ShipmentList")
    {
        document.getElementById("search2").value="";   
    }
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
           selectable: 1,
           groupBy:"DATE",    columns:[
               {title:"NO", field:"NO", width:60,align:"center"},
               {title:"DATE", field:"DATE"},
               {title:"JO NO", field:"JO NO"},
               {title:"CUSTOMER CODE", field:"CUSTOMER CODE",},
               {title:"CUSTOMER NAME", field:"CUSTOMER NAME"},
               {title:"ITEM CODE", field:"ITEM CODE"},
               {title:"ITEM MODEL", field:"ITEM_MODEL"},
               {title:"ITEM NAME", field:"ITEM NAME"},
               {title:"MACHINE CODE", field:"MACHINE CODE"},
               {title:"MACHINE MAKER", field:"MACHINE MAKER"},
               {title:"TONNAGE", field:"TONNAGE"},
               {title:"MACHINE GROUP", field:"MACHINE GROUP"},
               {title:"TOOL NO", field:"TOOL NO",
               formatter: function(cell, formatterParams) {
                var cellValue = cell.getValue();

                if (cellValue != null) {
                  cell.getRow().getElement().css({
                                     
                  });
                  return cellValue;
                } else {
                  cell.getRow().getElement().css({

                    "background-color": "#db9176",
                    "font-weight":"bold"
                  });
                  return cellValue;
                }
              }
               },
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
       //layout:"fitColumns", //fit columns to width of table (optional)
       pagination:"local",
       paginationSize:100,
       movableColumns:true,
       groupBy:"JO DATE",
       selectable: 1,
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
           {title:"ITEM MODEL", field:"ITEM_MODEL"},
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
       selectable: 1,
       //groupBy:"PROD DATE",
      // responsiveLayout:"collapse",
       columns:[ //Define Table Columns
        //{formatter:"responsiveCollapse", width:30, minWidth:30, align:"center", resizable:false, headerSort:false},
   
           {title:"NO", field:"NO", width:60},
           {title:"JO DATE", field:"JO_DATE", align:"center"},
           {title:"JO NO", field:"JO NO"},
           {title:"SERIAL PRINT", field:"SERIAL PRINT"},
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
       selectable: 1,
       groupBy:"DATE",    
       columns:[
           {title:"NO", field:"NO", width:60,align:"center"},
           {title:"DATE", field:"DATE"},
           {title:"JO NO", field:"JO NO"},
           {title:"CUSTOMER CODE", field:"CUSTOMER CODE"},
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
        height: "60vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    //layout:"fitColumns", //fit columns to width of table (optional)
    selectable: 1,
    pagination:"local",
    paginationSize:50,
    //progressiveRender:"remote",
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
        { title:"CTRLS ",align:"center", align:"center",width:"20px",
         formatter:function(cell, formatterParams){ //plain text value
        
            var shipStat = cell.getRow().getData().SHIPMENT_STATUS;
            if(shipStat=="WAITING FOR SHIPMENT")
            {
                return '<div class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> ADD TO GROUP</div>';
            }
            else if(shipStat=="ALREADY SHIPPED")
            {
                return '<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-undo-alt"></i> UNDO SHIPMENT</button>';

            }
            else
            {
                return '<button type="button" class="btn btn-danger btn-sm" disabled ><strike><i class="fas fa-plus-circle"></i> ADD TO GROUP</strike></button>';
            }


        },
          cellClick:function(e, cell){
             var shipStat = cell.getRow().getData().SHIPMENT_STATUS;
             if(shipStat=="WAITING FOR SHIPMENT")
             {
                ///alert("Printing row data for: " + cell.getRow().getData().PACKING_NUMBER);
                swal({
                    title: 'Are you sure you want to add '+ cell.getRow().getData().PACKING_NUMBER+" to the temporary group table?  ",
                    text: "Note: Revert the created group by editing its packing content in the shipment assigning tab!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Add to group!'
                  }).then((result) => {

                    if (result.value) {

                        $.ajax({
                            method:'POST',
                            url:'/1_mes/_php/manuc_info/Prodplan/AddtotempGroup.php',
                            data:
                            {
                                'packingno': cell.getRow().getData().PACKING_NUMBER,
                                'lotno':cell.getRow().getData().LOT_NUMBER,
                                'jono': cell.getRow().getData().JO_NO,
                                'itemcode':cell.getRow().getData().ITEM_CODE,
                                'machinecode': cell.getRow().getData().MACHINE_CODE,
                                'itemname': cell.getRow().getData().ITEM_NAME,
                                'customercode': cell.getRow().getData().CUSTOMER_CODE,
                                'customername': cell.getRow().getData().CUSTOMER_NAME,
                                
                                'ajax':true
                  
                            },
                        
                            
                            success: function(data) 
                            {
                               
                                showTable("ShipmentList","","shipment_management");
                                loadmodal1('ShipmentModal');
                            swal(
                                'SUCCESS!',
                                cell.getRow().getData().PACKING_NUMBER+' is added to the group table.',
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
                                loadmodal1('ShipmentModal');
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
                    title: 'This data cant be added to group list.',
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
            else if(datacell=="GROUP ASSIGNED")
            {
                return "<span style='color:#bf1df2; font-weight:bold;'>" + datacell + "</span>";
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
        {title:"ITEM CODE", field:"ITEM_CODE"},
        {title:"ITEM NAME", field:"ITEM_NAME"},
        {title:"MACHINE CODE", field:"MACHINE_CODE"},
        {title:"LOT JUDGEMENT", field:"LOT JUDGEMENT"},
        {title:"CUSTOMER CODE", field:"CUSTOMER_CODE"},
        {title:"CUSTOMER NAME", field:"CUSTOMER_NAME"}
            ],
    });

   }
   else if(TabName=="ShipmentList1")
   {
    var screenheight=Number(screen.height-350);
    $("#example-table").tabulator({
    height: "65vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    //layout:"fitColumns", //fit columns to width of table (optional)
    selectable: 1,
    pagination:"local",
    paginationSize:50,
    //ajaxProgressiveLoad: true,
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
            else if(datacell=="GROUP ASSIGNED")
            {
                return "<span style='color:#bf1df2; font-weight:bold;'>" + datacell + "</span>";
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
        {title:"ITEM CODE", field:"ITEM_CODE"},
        {title:"ITEM NAME", field:"ITEM_NAME"},
        {title:"MACHINE CODE", field:"MACHINE_CODE"},
        {title:"LOT JUDGEMENT", field:"LOT JUDGEMENT"},
        {title:"CUSTOMER CODE", field:"CUSTOMER_CODE"},
        {title:"CUSTOMER NAME", field:"CUSTOMER_NAME"}
            ],
    });

   }
   else if(TabName=="TempGroup")
   {
       
    $("#example-table2").tabulator({
    height: "60vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    //layout:"fitColumns", //fit columns to width of table (optional)
    selectable: 1,
    paginationSize:100,
    placeholder:"No Data to Display",
    movableColumns:true,
    columns:[
        {title:"NO", field:"NO", width:60,align:"center"},
        {title:"CTRLS", field:"CTRLS",
        formatter:function(cell, formatterParams)
                { //plain text value

                    return '<button type="button" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> REMOVE </button>';
                },
        cellClick:function(e, cell)
                {
                    //alert("This data is already shipped.");  
                swal({
                    title: 'Are you sure you want to remove this in group creation?',
                    text: "PACKING NUMBER: " +cell.getRow().getData().PACKING_NUMBER,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove this record!'
                  }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method:'POST',
                            url:'/1_mes/_php/manuc_info/Prodplan/DeleteFromTempShip.php',
                            data:
                            {
                                'packingno': cell.getRow().getData().PACKING_NUMBER,
                                'lotno':cell.getRow().getData().LOT_NUMBER,
                                'itemcode': cell.getRow().getData().ITEM_CODE,
                                'ajax':true
                  
                            },
                        
                            
                            success: function(data) 
                            {
                                showTable("ShipmentList","","shipment_management");
                            swal(
                                'SUCCESS!',
                                cell.getRow().getData().PACKING_NUMBER+' Remove from temp group.',
                                'success'
                            )
                             
                            }
                  
                        });
                
                    }
                  })
                } 
        },
        {title:"PACKING_NUMBER", field:"PACKING_NUMBER"},
        {title:"LOT_NUMBER", field:"LOT_NUMBER"},
        {title:"ITEM_CODE", field:"ITEM_CODE"},
        {title:"ITEM_NAME", field:"ITEM_NAME"},
        {title:"CUSTOMER CODE", field:"CUSTOMER_CODE"},
        {title:"CUSTOMER NAME", field:"CUSTOMER_NAME"}
    ]
    });
   }
 
   else if(TabName=="GroupList")
   {
       
    $("#example-table3").tabulator({
    height: "60vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    layout:"fitColumns", //fit columns to width of table (optional)
    selectable: 1,
    paginationSize:100,
    placeholder:"No Data to Display",
    movableColumns:true,
    groupBy: "GROUP_NAME",
    columns:[
        {title:"NO", field:"NO", width:60,align:"center"},
        {title:"CONTROLS", field:"CTRLS",align: "center",
        formatter:function(cell, formatterParams)
                { //plain text value
                return '<button type="button" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> REMOVE </button>';
                },
        cellClick:function(e, cell)
                {
                    //alert("This data is already shipped.");  
                swal({
                    title: 'Are you sure you want to remove this in group '+cell.getRow().getData().GROUP_NAME+"?",
                    text: "PACKING NUMBER: " +cell.getRow().getData().PACKING_NUMBER,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove this record!'
                  }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method:'POST',
                            url:'/1_mes/_php/manuc_info/Prodplan/DeleteFromGroupList.php',
                            data:
                            {
                                'packingno': cell.getRow().getData().PACKING_NUMBER,
                                'lotno':cell.getRow().getData().LOT_NUMBER,
                                'itemcode': cell.getRow().getData().ITEM_CODE,
                                'groupname': cell.getRow().getData().GROUP_NAME,
                                'ajax':true
                  
                            },
                        
                            
                            success: function(data) 
                            {
                                showTable("ShipmentList","","shipment_management");
                            swal(
                                'SUCCESS!',
                                cell.getRow().getData().PACKING_NUMBER+' Remove from temp group.',
                                'success'
                            )
                             
                            }
                  
                        });
                
                    }
                  })
                } 
        },
        {title:"GROUP NAME", field:"GROUP_NAME"},
        {title:"PACKING_NUMBER", field:"PACKING_NUMBER"},
        {title:"LOT_NUMBER", field:"LOT_NUMBER"},
        {title:"JOB ORDER NO", field:"JOB_ORDER_NO"},
        {title:"ITEM_CODE", field:"ITEM_CODE"},
        {title:"ITEM_NAME", field:"ITEM_NAME"},
        {title:"CUSTOMER CODE", field:"CUSTOMER_CODE"},
        {title:"CUSTOMER NAME", field:"CUSTOMER_NAME"}
    ]
    });
   }
   else if(TabName=="Dr-Assign")
   {
       
                    
    var screenheight=Number(screen.height-350);
    $("#example-table").tabulator({
       height: "70vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
       layout:"fitColumns", //fit columns to width of table (optional)
       pagination:"local",
       paginationSize:50,
       //progressiveRender:"remote",
       placeholder:"No Data to Display",
       movableColumns:true,
       groupBy:"DR_DATE", 
       selectable: 1,        
        rowClick:function(e, row){
        //e - the click event object
        //row - row component
        DataToSort=row.getData().DR_NO;
        if(DataToSort=="UNASSIGNED DR")
        {
            LoadTableOfDrDetails(row.getData().GROUP_NAME,"UnassignedDr");
        }
        else
        {
            LoadTableOfDrDetails(row.getData().DR_NO,"assignedDr");
        }
        },
 
       
       columns:[
           {title:"NO", field:"NO", width:60,align:"center"},
           { title:"CTRLS ",align:"center",
           formatter:function(cell, formatterParams)
                {
                    $hasDR = cell.getRow().getData().DR_NO;
                    if($hasDR=="UNASSIGNED DR")
                    {
                        return '<div class="btn btn-success btn-sm"><i class="fas fa-file-medical"></i> ASSIGN DR</div>';
                    }
                    else
                    {
                        return '<div class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> EDIT DR</div>';
                      
                    }

                },
           cellClick:function(e, cell)
               {
                $('.sel2').select2({width: '84%'});
                hasDR = cell.getRow().getData().DR_NO;
                if(hasDR=="UNASSIGNED DR")
                {
                    
                    $('#exampleModal').modal('show');
                    document.getElementById("grouptext").value = cell.getRow().getData().GROUP_NAME;
                    document.getElementById("drtext").value = "";
                    $('#drtextchange').val("--SELECT A DR#--").trigger('change'); 
                   
                }
                else
                {
                    $('#exampleModal').modal('show');
                    document.getElementById("grouptext").value = cell.getRow().getData().GROUP_NAME;
                    document.getElementById("drtext").value = cell.getRow().getData().DR_NO;
                    $('#drtextchange').val(cell.getRow().getData().DR_NO).trigger('change'); 
                    
                    
                }
               }
            },
           /*  {title:"VIEW", field:"VIEW",width:"15px",
                 formatter:function(cell, formatterParams)
                {
                    return '<div class="btn btn-success btn-sm"><i class="fas fa-file-medical"></i> VIEW</div>';
                },
                cellClick:function(e, cell)
                {
                    DataToSort=cell.getRow().getData().DR_NO;
                    if(DataToSort=="UNASSIGNED DR")
                    {
                        LoadTableOfDrDetails(cell.getRow().getData().GROUP_NAME,"UnassignedDr");
                    }
                    else
                    {
                        LoadTableOfDrDetails(cell.getRow().getData().DR_NO,"assignedDr");
                    }
                }
      


           }, */
           {title:"DR DATE", field:"DR_DATE"},
           {title:"DR NO", field:"DR_NO"},
           {title:"GROUP NAME", field:"GROUP_NAME"}
       ],
   });

///example2
   
   }

   else if(TabName=="dr-details")
   {
       
    $("#example-table2").tabulator({
    height: "70vh", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    //layout:"fitColumns", //fit columns to width of table (optional)
    pagination:"local",
    paginationSize:100,
    placeholder:"No Data to Display",
    movableColumns:true,
    selectable: 1,
    groupBy:"DR_DATE",    
    columns:[
        {title:"NO", field:"NO", width:60,align:"center"},
        { title:"CTRLS ",align:"center", align:"center",
        formatter:function(cell, formatterParams)
             {
                 
             return '<div class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> REMOVE</div>';
                                
             },
        cellClick:function(e, cell)
            {
              
                                    ///alert("Printing row data for: " + cell.getRow().getData().PACKING_NUMBER);
                swal({
                    title: 'Are you sure you want to remove '+ cell.getRow().getData().PACKING_NO+" to this group or DR#?  ",
                    text: "All remove items status will be set to 'UNASSIGNED DR' automatically.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes,Remove this item!'
                  }).then((result) => {

                    if (result.value) {

                        $.ajax({
                            method:'POST',
                            url:'/1_mes/_php/manuc_info/Prodplan/RevertMarkAsShipped.php',
                            data:
                            {
                                'packingno': cell.getRow().getData().PACKING_NO,
                                'lotno':cell.getRow().getData().LOT_NUMBER,
/*                                 'jono': cell.getRow().getData().JO_NO,
                                'itemcode':cell.getRow().getData().ITEM_CODE,
                                'machinecode': cell.getRow().getData().MACHINE_CODE,
                                'itemname': cell.getRow().getData().ITEM_NAME,
                                'customercode': cell.getRow().getData().CUSTOMER_CODE,
                                'customername': cell.getRow().getData().CUSTOMER_NAME, */
                                'ajax':true
                  
                            },
                        
                            
                            success: function(data) 
                            {
                               
                                showTable("Dr-Assign","","dr_assign");
                            swal(
                                'SUCCESS!',
                                cell.getRow().getData().PACKING_NUMBER+' removed from the list.',
                                'success'
                            )
                            //alert(data);
                            }
                  
                        });
                


                    }
                 
                })


            }
         },
        {title:"DR DATE", field:"DR_DATE"},
        {title:"DR NO", field:"DR_NO"},
        {title:"GROUP NAME", field:"GROUP_NAME"},
        {title:"PACKING NO", field:"PACKING_NO"},
        {title:"LOT NUMBER", field:"LOT_NUMBER"},
        {title:"JOB ORDER NO", field:"JOB_ORDER_NO"},
        {title:"ITEM CODE", field:"ITEM_CODE"},
        {title:"ITEM NAME", field:"ITEM_NAME"},
        {title:"MACHINE CODE", field:"MACHINE_CODE"},
        {title:"CUSTOMER CODE", field:"CUSTOMER_CODE"},
        {title:"CUSTOMER NAME", field:"CUSTOMER_NAME"}

       
    
  
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

 function CheckCreationType(typename)
 {


    if(typename=="group")
    {
        document.getElementById('grouptext').disabled=false;
        document.getElementById('drtext').disabled=true; 
        document.getElementById("grouptext").focus();
     
    }
    else
    {
        document.getElementById('grouptext').disabled=true; 
        document.getElementById('drtext').disabled=false; 
        document.getElementById("drtext").focus();
    
    }

 }
 
function IncrementGroupName()
{
    $('.sel2').select2({width: '84%'});

    $.ajax({
        method:'POST',
        url:'/1_mes/_php/manuc_info/Prodplan/CheckIncrementGroupName.php',
        data:
        {
            'ajax':true
        },
    
        
        success: function(data) 
        {
            
         document.getElementById('grouptext').value = data;
            
        }

    });



}


function InsertDrGroup()
{
 var grtext =document.getElementById('grouptext').value;
 var ddrtext =document.getElementById('drtext').value;
    if(document.getElementById('radioGroup').checked)
    {

        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/Prodplan/InsertUpdateDr.php',
            data:
            {
                'groupname': grtext,
                'optionType':'group',
                'ajax':true
            },
        
            
            success: function(data) 
            {
             
                    if(data=="nodata")
                    {

                        $('#exampleModal').modal('hide');
                        loadmodal1('ShipmentModal');

                        swal({
                            type: 'error',
                            title: 'No packing number to saved!',
                            text: 'Please add a packing number to the the GROUP DETAIL LIST' 
                       
                        })
                    }   
                    else
                    {
                        document.getElementById('radioGroup').checked = true;
                        CheckCreationType("group");
                        $('#exampleModal').modal('hide');
                        loadmodal1('ShipmentModal');

                        showTable("ShipmentList","","shipment_management");
                        swal({
                           type: 'success',
                           title: 'SUCCESS!',
                           text: 'Record saved successfully!' 
                       })
                       
                       
                    }

                    

            }
    
        });
    

    }
    else
    {
        if(ddrtext=="--SELECT A DR#--" || ddrtext==""|| ddrtext==null)
        {
            swal({
                type: 'error',
                title: 'ERROR!',
                text: 'Please select a DR#!' 
            })
        }
        else
        {

        $.ajax({
            method:'POST',
            url:'/1_mes/_php/manuc_info/Prodplan/InsertUpdateDr.php',
            data:
            {
                'groupname': ddrtext,
                'optionType':'dr',
                'ajax':true
            },
        
            
            success: function(data) 
            {
             //alert(data);
             document.getElementById('radioGroup').checked = true;
             CheckCreationType("group");
             $('#exampleModal').modal('hide');
             swal({
                type: 'success',
                title: 'SUCCESS!',
                text: 'Record saved successfully!' 
            })
            showTable("ShipmentList","","shipment_management");

            }
    
        });

        }
    
    }

}

function setdr()
{

    
    var newdr = document.getElementById("drtextchange").value;
    var olddr = document.getElementById("drtext").value;
    var grname = document.getElementById("grouptext").value;
    var updatetype;

    if(olddr!="")
    {
        updatetype="dr";
    }
    else
    {
        updatetype="group";
    }

    if(newdr=="--SELECT A DR#--"||newdr==null||newdr=="")
    {
        swal(
            'ERROR!',
            'Please select a DR#',
            'error'
        )
       
    }
    else
    {

    swal({
        title: 'Are you sure you want to save all the changes? ',
        text: "Assigning a Dr will automatically set the item's status to SHIPPED",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Save the data!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                method:'POST',
                url:'/1_mes/_php/manuc_info/Prodplan/SetDr.php',
                data:
                {
                    'newdr': newdr,
                    'olddr': olddr,
                    'grname': grname,
                    'updatetype': updatetype,
                    'ajax':true
      
                },
            
                
                success: function(data) 
                {
                    //showTable("Dr-Assign","","dr_assign");
                    loadtbl2('Dr-Assign','','dr_assign')
                    $('#exampleModal').modal('hide');

                swal(
                    'SUCCESS!',
                    'Dr data saved successfully!',
                    'success'
                )
                

                }
      
            });
    
        }
      })
    }
}
 

function LoadTableOfDrDetails(Drno,datasorttype,param1)
{

    if(param1!="no")
    {
        $("#example-table2").tabulator("destroy");
        
    }

    $.ajax({
        method:'POST',
        url:'/1_mes/_php/manuc_info/Prodplan/DataDrDetails.php',
        data:
        {
            'datasorttype': datasorttype,
            'drno': Drno,
            'ajax':true

        },
    
        
        success: function(data) 
        {
            initTbl2("dr-details");
            var val2 = JSON.parse(data);
           /* alert(val); */
           $("#example-table2").tabulator("setData",val2); 
         
        }

    });

}

///modal
function loadmodal1(TableName)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        /* totalQty(); */
        document.getElementById("modal_display1").innerHTML = "";
       document.getElementById("modal_display1").innerHTML = this.responseText;
       var tablename = TableName;
        

        showmodal1(TableName);
        
      }
    };
      xhttp.open("GET", TableName+".php", true);
      xhttp.send();
  }
 
  function showmodal1(TableName)
  {

    $.ajax({
        method:'POST',
        url:'/1_mes/_php/manuc_info/Prodplan/'+TableName+'.php',
        data:
        {
            
            'ajax':true

        },
    
        
        success: function(data) 
        {
            //var val2 = JSON.parse(data);
           /* alert(val); */
         //alert(data);
         CheckCreationType("group");
        }

    });

  }


//modal
