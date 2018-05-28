<?php

include 'datavarProdplanVsResult.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manufacturing Information</title>
	  <link rel="icon" href="favicon.ico"/>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";?>


<link rel ="stylesheet" href="http://reggie-pc/1_MES/css/manuc_info.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/tabulator/3.5.1/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tabulator/3.5.1/js/tabulator.min.js"></script>
<link href="/1_mes/_php/manuc_info/dist/css/tabulator_simple.min.css" rel="stylesheet">
<script type="text/javascript" src="http://oss.sheetjs.com/js-xlsx/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>


<script>
$(function(){
  
  var onSampleResized = function(e){  
    var table = $(e.currentTarget); //reference to the resized table
  };  

 $("#tbl2").colResizable({
    liveDrag:true,
    gripInnerHtml:"<div class='grip'></div>", 
    draggingClass:"dragging", resizeMode:'overflow'
  });    
  
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
                <span id='usr' > <a href="#" class="nav-link active" data-toggle="popover1" title="PROD PLAN VS RESULT MENU" >Production Plan Vs Result</a></span>  
              </li>
              <li>
                <a class="nav-link" id="menuhover"  href="ProductionSummary.php">Production Summary</a>
              </li>
              <li>
                <a class="nav-link" id="menuhover"  href="PrintStatus.php">Print Status</a>
              </li>
              <li>
                <a class="nav-link" id="menuhover" href="PendingProduction.php">Pending Production</a>
              </li>
              <li>
                <a class="nav-link" id="menuhover" href="#">Production Stop</a>
              </li>
            
    

            </ul>
             <!-- ICONS ON LEFT -->
          <?php
              include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/tab_navbar.php";            
          ?>
          <!-- ICONS ON LEFT END -->
          </div>  


        </nav>

        <nav id="popover-content1" class="nav flex-column" style="display: none;">
          <a href="ProdPlanVsResult.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>INJ</b></a>
          <a href="ProdResult.php" class="nav-link" style="color: black">PROD RESULT - <b>INJ</b></a>
          <a href="ProdPlanVsResultSMT.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>SMT</b></a>
          <a href="ProdResult.phpSMT" class="nav-link" style="color: black">PROD RESULT - <b>SMT</b></a>
          <a href="ProdPlanVsResultASSY.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>ASSY</b></a>
          <a href="ProdResultASSY.php" class="nav-link" style="color: black">PROD RESULT - <b>ASSY</b></a>
          <!-- <a href="#" class="nav-link">Invite Members</a>
          <a href="#" class="nav-link">Delete Event</a> -->
        </nav>
</div>



<div class="mod_options" style="z-index: 0;padding-top: 70px">
                
    <div style="width: 100%;text-align: left;">


 
          <form action='ProdPlanVsResultSort.php' method='POST' id="sortform">
            <div class="row">
                                      
                                      <div class="col-md-1" style="text-align: left; padding-top: 10px">
                                        <table style="text-align: center;width: 100%;">
                                          <tr>
                                            <td>
                                        <b>FILTER BY: </b> 
                                        <?php 

                                          $url=$_SERVER['REQUEST_URI'];

                                            $strIndex=strrpos($url, "=");
                                            $str=substr($url, $strIndex+1);

                                              if(strpos($url, 'sortfrom=')!==false)
                                            {
                                              
                                              if ($_GET['sortfrom']!="") {
                                                # code...
                                                echo "<br>".$_GET['sortfrom'];
                                              }
                                              

                                            }
                                              if(strpos($url, 'sortto=')!==false)
                                            {
                                              
                                              if ($_GET['sortto']!="") {
                                                # code...
                                                echo "<br>".$_GET['sortto'];
                                              }
                                              

                                            }

                                            if (strpos($url,'search=')!==false) {
                                              # code...
                                              if ($_GET['search']!="") {
                                                # code...
                                                echo "<br>words with <br><i>'".$_GET['search']."'</i>";
                                              }
                                            
                                            }

                                            else
                                            {
                                                  echo "<i>NONE</i>";

                                            }




                                        ?></td>
                                          </tr>
                                        </table>
                                      </div>

                          
                                      <div class="col-sm-2" style="padding-top: 10px; text-align: center;">
                                        <div class="form-group">

                                              <table style="width: 100%">
                                                <tr>
                                                  <td><b>SEARCH: &nbsp</b></td>
                                                  <td> 
                                                    
                                                    <?php

                                                    if(strpos($url, 'search')!==false)
                                                    {
                                                      $searchtext=$_GET['search'];
                                                    }
                                                    else
                                                    {
                                                        $searchtext="";
                                                    }

                                                    

                                                    echo " <input type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;' value='".$searchtext."'>";


                                                    ?>
                                                  
                                                    
                                                  
                                                    </td>
                                                    <td>&nbsp
                                                    <button type="submit" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp<i class="fa fa-search"></i>&nbsp</button>  
                                                  </td>

                                                                                          
                                                  
                                                </tr>
                                              </table>
                                                
                                            
                                        </div>

                                      </div>    

                                        <div class="col-sm-6">
                                    
                                            
                                                    <div class="form-group">
                                                      <div class="row" style="padding-top: 10px;">
                                                          <div class="col-xs-6 col-sm-0" style="font-size: 12px; text-align: center">
                                                              <b> &nbsp &nbsp SORT DATE <br>FROM:</b>
                                                          </div>
                                                          <div class="col-xs-6 col-sm-3">

                                                              <?php

                                                              if(strpos($url, 'sortfrom')!==false)
                                                                  {
                                                                    $sortfrom1=$_GET['sortfrom'];
                                                                  }
                                                                  else
                                                                  {
                                                                      $sortfrom1="";
                                                                  }

                                                                    echo "<input type='date' onchange='this.form.submit()' name='sortingdatefrom' class='form-control' style='font-size: 10px' value='".$sortfrom1."'>";
                                                              ?>

                                                          </div>
                                                            <!-- Add clearfix for only the required viewport -->
                                                          <div class="clearfix visible-xs"></div>
                                                          <div class="col-xs-6 col-sm-0"> <b> TO: </b></div>
                                                          <div class="col-xs-6 col-sm-3">
                                                                  <?php

                                                                    if(strpos($url, 'sortto')!==false)
                                                                    {
                                                                      $sortto1=$_GET['sortto'];
                                                                    }
                                                                    else
                                                                    {
                                                                        $sortto1="";
                                                                    }

                                                                    echo "<input type='date' onchange='this.form.submit()' name='sortingdateto' class='form-control' style='font-size: 10px' value='".$sortto1."'>";
                                                                  ?>

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
                                                              <a  class="btn btn-outline-secondary" href="/1_mes/_php/manuc_info/ProdPlanVsResult.php" >&nbsp&nbspCANCEL FILTER&nbsp&nbsp</a>
                                                              <button type="button" class="btn btn-outline-secondary" id="download-xlsx">&nbsp&nbspEXCEL&nbsp&nbsp</button>
                                                              <button type="button" class="btn btn-outline-secondary" id="download-pdf">&nbsp&nbspPDF&nbsp&nbsp</button>
                                                              </div>
                                                              
                                                          </div>
                                                        


                                                      </div>
                                                    </div>

                                      </div> <!-- end div of col -->


                                      <!--  <div class="col-md-3" style="padding-top: 10px; border-style: solid">

                                          

                                        </div> -->

                          </div><!-- end of row-->
          </form>

                 
    </div>


</div>
      
        <!-- The Modal -->
     <!-- The Modal -->

      
  </div>
 <!--
<script>
  function printData()
{
   var divToPrint=document.getElementById("tbl2");
   newWin= window.open("");
   var str = "<html><head>";
  
   str+="</head><body style=\"font-family: calibri\">";
   str+=divToPrint.outerHTML;
   str+="</body></html>";
   newWin.document.write(str);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
</script>
-->
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


var tabledata = <?php echo json_encode($datavar, JSON_PRETTY_PRINT) ?> ;


//load sample data into the table
$("#example-table").tabulator("setData", tabledata);

$("#download-csv").click(function(){
    $("#example-table").tabulator("download", "csv", "ProdplanVsResult.csv");
});


//trigger download of data.xlsx file
$("#download-xlsx").click(function(){
    $("#example-table").tabulator("download", "xlsx", "ProdplanVsResult.xlsx", {sheetName:"ProdPlanVsResult"+<?php echo date("Y-m-d")?>});

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


<script src="/1_mes/js/jquery.freezeheader.js"></script>

<script>  

$(document).ready(function () {
            $("#tbl2").freezeHeader({ 'offset':'125px'});
        });

$(document).ready(function(){
   $('[data-toggle="tooltip"]').tooltip();
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#address').val() == '')  
  {  
   alert("Address is required");  
  }  
  else if($('#designation').val() == '')
  {  
   alert("Designation is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });




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