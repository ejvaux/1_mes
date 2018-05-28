function loadtbl(TableName) {
  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        /* totalQty(); */
       document.getElementById("table_display").innerHTML = this.responseText;
       
        showUser(TableName,"no");
       
      $('[data-toggle="tooltip"]').tooltip();

        

      }
    };
      xhttp.open("GET", TableName+".php", true);
      xhttp.send();
      
    }

function showUser(moduleID,param1)
{

    if(param1!="no")
    {
        $("#example-table").tabulator("destroy");
        
    }
    /*  alert(strfromobj+" "+searchobj+" "+strtoobj); */
 
    var strfromobj = document.getElementById("sortfrom").value;
    var searchobj = document.getElementById("search").value;
    var strtoobj = document.getElementById("sortto").value;

    if(moduleID=="ShipmentList")
    {
     
     $.ajax({
           method:'POST',
           url:'/1_mes/_php/ShipmentManagement/DataShipmentList.php',
           data:
           {
               'sortfrom': strfromobj,
               'sortto': strtoobj,
               'search': searchobj,
               'ajax':true
           },
           success: function(data) 
           {
            initTbl("ShipmentList");
               var val = JSON.parse(data);
              /* alert(val); */
              $("#example-table").tabulator("setData",val);
           }

            });
   
    }
          
  
}

 function cancelfilter(moduleID)
 {
    document.getElementById("sortfrom").value="";
    document.getElementById("search").value="";
    document.getElementById("sortto").value="";
    showUser(moduleID);
 }

 
 
function exportExcel()
{
    $("#example-table").tabulator("download", "xlsx", "ProdplanVsResult.xlsx", {sheetName:"ProdPlanVsResult"});
}


function initTbl(TabName)
{
    if(TabName=="ShipmentList")
    {
        var screenheight=Number(screen.height-350);
        $("#example-table").tabulator({
            height: screenheight, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
        //layout:"fitColumns", //fit columns to width of table (optional)
        pagination:"local",
        paginationSize:100,
        placeholder:"No Data to Display",
        movableColumns:true,
        groupBy:"LOT NUMBER",
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
            
            {title:"NO", field:"NO", width:60,frozen:true,align:"center"},
            {title:"LOT CREATE DATE", field:"LOT CREATE DATE"},
            {title:"PACKING NUMBER", field:"PACKING NUMBER"},
            {title:"LOT NUMBER", field:"LOT NUMBER"},
            {title:"JO NO", field:"JO NO"},
            {title:"ITEM CODE", field:"ITEM CODE"},
            {title:"ITEM NAME", field:"ITEM NAME"},
            {title:"MACHINE CODE", field:"MACHINE CODE"},
            {title:"LOT JUDGEMENT", field:"LOT JUDGEMENT"},
            {title:"SHIPMENT STATUS", field:"SHIPMENT STATUS",formatter:function(cell, formatterParams){
                //cell - the cell component
                //formatterParams - parameters set for the column
                var datacell = cell.getValue();
                if(datacell=="WAITING FOR REWORKS")
                {
                    return "<span style='color:red; font-weight:bold;'>" + datacell + "</span>";
                }
                else if(datacell=="WAITING FOR SHIPMENT")
                {
                    return "<span style='color:green; font-weight:bold;'>" + datacell + "</span>";
                }
                else
                {
                    return "<span style='color:orange; font-weight:bold;'>" + datacell + "</span>";
                }
        
            }}
                ],
        });
    }

    
}



