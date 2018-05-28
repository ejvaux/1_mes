<?php

#include 'datavarProdplanVsResult.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manufacturing Information</title>
  


<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> -->
 
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header2.php";?>
<script src="/1_mes/_php/manuc_info/AutoSync.js"></script>

<script>
$(function(){
  
  var onSampleResized = function(e){  
    var table = $(e.currentTarget); //reference to the resized table
  };  


  
});
</script>


<script>

$(document).ready(function() {


  //Change in continent dropdown list will trigger this function and
  //generate dropdown options for county dropdown
  $(document).on('change','#CName', function() {
    var CUSTOMER_CODE = $(this).val();
    if(CUSTOMER_CODE != "") {
      $.ajax({
        url:"find.php",
        type:'POST',
        data:{CUSTOMER_CODE:CUSTOMER_CODE},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#CCode").removeAttr('disabled','disabled').html(response);
            } else {
            $("#CCode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          }
        }
      });
    } else {
      $("#CCode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });

  $(document).on('change','#CCode', function() {
    var CUSTOMER_CODE1 = $(this).val();
    if(CUSTOMER_CODE1 != "") {
      $.ajax({
        url:"find.php",
        type:'POST',
        data:{CUSTOMER_CODE1:CUSTOMER_CODE1},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#ICode").removeAttr('disabled','disabled').html(response);
            } else {
            $("#ICode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          }
        }
      });
    } else {
      $("#ICode").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });


  //Change in coutry dropdown list will trigger this function and
  //generate dropdown options for state dropdown

$(document).on('change','#ICode', function() {
    var ITEM_CODE = $(this).val();
    if(ITEM_CODE != "") {
      $.ajax({
        url:"find.php",
        type:'POST',
        data:{ITEM_CODE:ITEM_CODE},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#IName").removeAttr('disabled','disabled').html(response);
            } else {
            $("#IName").attr('disabled','disabled').html("<option value=''></option>");
          }
        }
      });
    } else {
      $("#IName").attr('disabled','disabled').html("<option value=''></option>");
    }
  });

});

</script>


</head>

<body style="margin-top: -24px;">

<div class="container-fluid">


   <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
   
<div class="mod_menu" style="position: absolute">

 
       <nav class="navbar navbar-brdr navbar-expand-lg navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->MENU
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav nav-tabs mr-auto mt-1">                
              <li>
                <span id='usr' > <a href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResult.php" class="nav-link tbl" >Production Plan Vs Result</a></span>  
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover"  href="/1_mes/_php/manuc_info/ProductionSummary/ProductionSummary.php">Production Summary</a>
              </li>
              <li>
                <a class="nav-link  tbl active" id="menuhover"  href="/1_mes/_php/manuc_info/PrintStatus/PrintStatus.php">Print Status</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover" href="/1_mes/_php/manuc_info/PendingProduction/PendingProduction.php">Pending Production</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover" href="#">Production Stop</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover" href="/1_mes/_php/ShipmentManagement/Shipment.php">Shipment List</a>
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



  <div class="mod_options" style="z-index: 1;padding-top: 70px;">

<div style="width: 100%;text-align: left;">

      <form action='PrintStatusSort.php' method='POST'>

          <div class="row">

                    


                    <div class="col-sm-2" style="padding-top: 10px; text-align: center;">
                      <div class="form-group">

                            <table style="width: 100%">
                              <tr>
                                <td><b>SEARCH: &nbsp</b></td>
                                <td>

                                    

                                          <input type='text' id='search' onchange='showUser()' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>

                                    



                                  </td>
                                  <td>&nbsp
                                  <button type="button" onclick="showUser()" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp<i class="fa fa-search"></i>&nbsp</button>
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

                                          

                                            <input type='date' id='sortfrom' onchange='showUser()' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                              

                                        </div>
                                          <!-- Add clearfix for only the required viewport -->
                                        <div class="clearfix visible-xs"></div>
                                        <div class="col-xs-6 col-sm-0"> <b> TO: </b></div>
                                        <div class="col-xs-6 col-sm-3">
                                              
                                                 <input type='date' id='sortto' onchange='showUser()' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                                 
                                        </div>
                                        <div class="col-xs-6 col-sm-0"> <b> DIVISION: </b></div>
                                        <div class="col-xs-6 col-sm-1">
                                              <table>
                                              <tr>
                                                  <td>
                                                      <div class="form-group">

                                                        <?php

                                                          include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
                                                          $sqlPlanType = " SELECT DIVISION_CODE, DIVISION_NAME from dmc_division_code";
                                                          $resultSqlPlanType = $conn->query($sqlPlanType);
                                                          echo '<select id="PlanType" class="form-control" onchange="showUser()" style="width: 150px;font-size: 10px; height:28px" name="PlanType">';
                                                          while ($row = $resultSqlPlanType->fetch_assoc()) {
                                                              # code...
                                                              if ($drpPlantype == $row['DIVISION_CODE']) {
                                                                  echo "<option value='" . $row['DIVISION_CODE'] . "' >" . $row['DIVISION_NAME'] . "</option>";
                                                              } else {
                                                                  echo "<option value='" . $row['DIVISION_CODE'] . "' >" . $row['DIVISION_NAME'] . "</option>";

                                                              }
                                                          }

                                                          echo '</select>';

                                                          ?>
                                                      </div>
                                                  </td>


                                              </tr>
                                              </table>
                                        </div>



                                    </div>
                                  </div>

                    </div> <!-- end div of col -->

                      <div class="col-md-3" style="padding-top: 10px;">

                     <!--    <table style="width: 100%">
                          <tr>
                            <td style="width: 50%;">  &nbsp  <a href="PrintStatus.php" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp CANCEL FILTER &nbsp</a>
                            </td>
                              <td valign="top">
                              <a href=" CloningResults.php?address=PrintStatus.php" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp SYNC &nbsp</a>
                              </td>
                          </tr>
                        </table> -->

                            <div class="btn-group btn-group-sm">                                 
                                <button type="button" onclick="cancelfilter()" class="btn btn-outline-secondary">&nbsp&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                <a href="/1_mes/_php/manuc_info/CloningResults.php?address=PrintStatus/PrintStatus.php" class="btn btn-outline-secondary">&nbsp&nbspSYNC&nbsp&nbsp</a>
                                <button type="button" class="btn btn-outline-secondary" id="download-xlsx">&nbsp&nbspEXCEL&nbsp&nbsp</button>
                            </div>

                      </div>

          </div>
      </form>

</div>

      <!--     <div style=" display: none">
            <button type="button" class="btn btn-outline-secondary p-1 my-2 my-sm-0" data-toggle="modal" data-target="#myModal"> Open modal
            </button>
          </div> -->

</div>
      
  

      
  </div>

 <!-- <div id="example-table"></div>
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


</script> -->


<div id="example-table"></div>

<script>

showUser();



function showUser(){

   /*  alert(strfromobj+" "+searchobj+" "+strtoobj); */

    var strfromobj = document.getElementById("sortfrom").value;
    var searchobj = document.getElementById("search").value;
    var strtoobj = document.getElementById("sortto").value;

    var plantypeobj = document.getElementById("PlanType");
    var selectedOption = plantypeobj.options[plantypeobj.selectedIndex].value;
    
    
    $.ajax({
          method:'POST',
          url:'/1_mes/_php/manuc_info/PrintStatus/DataPrintStatus.php',
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
              var val = JSON.parse(data);
             /* alert(val); */
             $("#example-table").tabulator("setData",val); 
           
          }

});
 
}


function cancelfilter(){
  
   document.getElementById("sortfrom").value="";
    document.getElementById("search").value="";
    document.getElementById("sortto").value="";
    showUser();
}

var screenheight=Number(screen.height-350);
 $("#example-table").tabulator({
    height: screenheight, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    //layout:"fitColumns", //fit columns to width of table (optional)
    pagination:"local",
    paginationSize:100,
    placeholder:"No Data to Display",
    movableColumns:true,
    groupBy:"JO NO",
   // responsiveLayout:"collapse",
    columns:[ //Define Table Columns
     //{formatter:"responsiveCollapse", width:30, minWidth:30, align:"center", resizable:false, headerSort:false},

        {title:"NO", field:"NO", width:60, frozen: true},
        {title:"JO NO", field:"JO NO", frozen: true},
        {title:"SERIAL PRINT", field:"SERIAL PRINT", frozen: true},
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

/* $("#ajax-trigger").click(function(){
    $("#example-table").tabulator("setData", "/1_mes/_php/manuc_info/Prodplan/DataProdPlanVsResult.php");
}); */


//trigger download of data.xlsx file
$("#download-xlsx").click(function(){
    $("#example-table").tabulator("download", "xlsx", "PrintStatus.xlsx", {sheetName:"PrrintStatus"});

});
</script>


	
<form action="ProdResultTempUpdate.php" method="POST">

<div id="dataModal" class="modal fade">
 <div class="modal-dialog" STYLE="margin-top:-5%;">
  <div class="modal-content">
   <div class="modal-header">
        <h4 class="modal-title">INFORMATION</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
 <!--
   <div class="modal-footer">
    <button type="button" name="sub" class="btn btn-outline-secondary p-1 my-2 my-sm-0" style="width: 80px">SAVE</button>
    <button type="button" class="btn btn-outline-secondary p-1 my-2 my-sm-0" data-dismiss="modal" style="width: 80px">CLOSE</button>
   </div>
  --> 
  </div>
 </div>
</div>
</form>



<script>  



$(document).ready(function(){

 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"/1_mes/_php/manuc_info/ProdPlanVsResultTableModalSelect.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });

});  


$(function() {
        $('[data-toggle="popover1"]').popover({
              html: true,
              placement: 'bottom',
              trigger: 'focus',
              content: function() {
                  return $('#popover-content1').html();
              }
        });
      });    

 </script>


</div>
 
</body>