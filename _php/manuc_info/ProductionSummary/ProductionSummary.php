
<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/ProductionSummary/graphdata.php';

if(isset($_GET['sorttype']))
{
  $drpsortgraphtype=$_GET['sorttype'];
}
else
{
   $drpsortgraphtype="";
}


if(isset($_GET['search']))
{
  $drpsearchgraphtype=$_GET['search'];
}
else
{
   $drpsearchgraphtype="";
}

if(isset($_GET['ChartType']))
{
  $drpgraphtype=$_GET['ChartType'];
}
else
{
   $drpgraphtype="column";
}



?>

<!DOCTYPE html>
<html>


<head>
	<title>Manufacturing information</title>


<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> -->

<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header2.php";?>

<script>


window.onload = function() {


var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
	
  
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
		type:  <?php echo json_encode($drpgraphtype) ?>,
		name: "Production Plan (PCS)",
    legendText: "PRODUCTION PLAN",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.## PCS",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type:  <?php echo json_encode($drpgraphtype) ?>,
		name: "Production Result (PCS)",
        legendText: "PRODUCTION RESULT",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.## PCS",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
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



}


</script>



</head>

<body style="margin-top: -24px;">


  <?php
#this php tag fails

 include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';


  $sql = "SELECT * from mis_product";
  $result=$conn->query($sql);
  $rowcount=$result->num_rows;
  $currentcount=$rowcount;

  $status=TRUE;

  $sql = "SELECT * from mis_product";
  $result=$conn->query($sql);
  $rowcount=$result->num_rows;

    //wait for 5 sec for next function call


   //you can set $status as FALSE if you want get out of this loop.

   //if(somecondition){
   //    $status=FALSE:
   //}

?>






<div class="container-fluid">


   <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php"; ?>


   
    <div class="mod_menu" style="position: absolute">

 
       <nav class="navbar navbar-brdr navbar-expand-lg navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->MENU
        </button>
       <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav nav-tabs mr-auto mt-1">                
              <li>
                <span id='usr' > <a href="#" class="nav-link tbl" data-toggle="popover1" title="PROD PLAN VS RESULT MENU" >Production Plan Vs Result</a></span>  
              </li>
              <li>
                <a class="nav-link tbl active" id="menuhover"  href="ProductionSummary.php">Production Summary</a>
              </li>
              <li>
                <a class="nav-link tbl" id="menuhover"  href="/1_mes/_php/manuc_info/PrintStatus/PrintStatus.php">Print Status</a>
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

        <nav id="popover-content1" class="nav flex-column" style="display: none;">
          <a href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResult.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>INJ</b></a>
          <a href="/1_mes/_php/manuc_info/ProdPlan/ProdResult.php" class="nav-link" style="color: black">PROD RESULT - <b>INJ</b></a>
          <a href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResultSMT.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>SMT</b></a>
          <a href="/1_mes/_php/manuc_info/ProdPlan/ProdResultSMT.php" class="nav-link" style="color: black">PROD RESULT - <b>SMT</b></a>
          <a href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResultASSY.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>ASSY</b></a>
          <a href="/1_mes/_php/manuc_info/ProdPlan/ProdResultASSY.php" class="nav-link" style="color: black">PROD RESULT - <b>ASSY</b></a>
          <!-- <a href="#" class="nav-link">Invite Members</a>
          <a href="#" class="nav-link">Delete Event</a> -->
        </nav>
    </div>


    <br>

    <div class="mod_options" style="z-index: 1;padding-top: 50px;">
                    
          <div style="width: 100%;text-align: left;">


           
              <form action='ProductionSummarySort.php' method='POST' id='sortingform'>
                                          <div class="row">
                                                    
                                                    <div class="col-md-1" style="text-align: left">
                                                      <table style="text-align: center;height: 80%;width: 100%">
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
                                                              #echo "<br>words with <br><i>'".$_GET['search']."'</i>";
                                                           }
                                                          
                                                          }

                                                          else
                                                          {
                                                                echo "<i>NONE</i>";

                                                          }




                                                      ?>

                                                    </td>
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
                                                                  
                                                                  include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

                                                                  if(strpos($url, 'search')!==false)
                                                                  {
                                                                    $searchtext=$_GET['search'];
                                                                  }
                                                                  else
                                                                  {
                                                                     $searchtext="";
                                                                  }


                                                                  $sql="SELECT DISTINCT(ITEM_NAME) FROM dmc_item_list ORDER BY ITEM_NAME ASC";
                                                                  $result=$conn->query($sql);


                                                                 

                                                                  echo " <select name='search1' onchange='this.form.submit()'  class='form-control' style='font-size: 10px; height:30px' value='".$searchtext."'>";
                                                                  echo "<option value=''>--SELECT ITEM--</option>";
                                                                  

                                                                  while ( $row=$result->fetch_assoc()) 
                                                                  {
                                                                    # code...
                                                                         if ($drpsearchgraphtype == $row['ITEM_NAME'] ) 
                                                                          {
                                                                             echo " <option value='".$row['ITEM_NAME']."' selected='true' >".$row['ITEM_NAME']."</option>"; 
                                                                          }
                                                                          else
                                                                          {
                                                                             echo " <option value='".$row['ITEM_NAME']."' >".$row['ITEM_NAME']."</option>"; 
                                                                          }
                                                                     
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

                                                                        <?php

                                                                        if(strpos($url, 'sortfrom')!==false)
                                                                            {
                                                                              $sortfrom1=$_GET['sortfrom'];
                                                                            }
                                                                            else
                                                                            {
                                                                               $sortfrom1="";
                                                                            }

                                                                            echo "<input type='date' name='sortingdatefrom' onchange='this.form.submit()' class='form-control' style='font-size: 10px' value='".$sortfrom1."'>";
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

                                                                               echo "<input type='date' name='sortingdateto' onchange='this.form.submit()' class='form-control' style='font-size: 10px' value='".$sortto1."'>";
                                                                        ?>
                                                                      </div>

                                                                      <div class="col-xs-6 col-sm-3" style="text-align: center;">
                                                                        <table style="width: 100%">
                                                                          <tr>
                                                                        
                                                                        <td style="width: 50%;">  &nbsp  <a href="ProductionSummary.php" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp CANCEL FILTER &nbsp</a></td>
                                                                          </tr>
                                                                        </table>
                                                                      
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                    </div> <!-- end div of col $drpsortgraphtype -->

                                                     <div class="col-md-3" style="padding-top: 10px;">

                                                          <div class="form-group" style="display:inline-block;"> 
                                                          <select class="form-control" name="sorttype" style="width: 120px;font-size: 10px; height:30px" onchange="this.form.submit()">
                                                            <option <?php if ($drpsortgraphtype == "DAILY" ) echo 'selected="true"'; ?>>DAILY</option>
                                                            <option <?php if ($drpsortgraphtype == "MONTHLY" ) echo 'selected="true"'; ?> >MONTHLY</option>

                                                          </select>
                                                          </div>
                                                          &nbsp&nbsp&nbsp
                                            

                                                          <div class="form-group" style="display:inline-block;"> 
                                                           
                                                            <select class="form-control" onchange="this.form.submit()" style="width: 120px;font-size: 10px; height:30px" name="chartType">
                                                              <option value='bar' <?php if ($drpgraphtype == "bar" ) echo 'selected="true"'; ?>>BAR CHART</option>
                                                              <option value='column' <?php if ($drpgraphtype == "column" ) echo 'selected="true"'; ?>>COLUMN CHART</option>
                                                              <option value='line' <?php if ($drpgraphtype == "line" ) echo 'selected="true"'; ?>>LINE CHART</option>
                                                              <option value='spline' <?php if ($drpgraphtype == "spline" ) echo 'selected="true"'; ?>>SPLINE CHART</option>
                                                              <option value='stepLine' <?php if ($drpgraphtype == "stepLine" ) echo 'selected="true"'; ?>>STEPLINE CHART</option>
                                                            </select>
                                                          </div>
                                                    </div><!-- end div of col -->

                                          </div><!-- end div of row -->
              </form>
                               
          </div>   
    </div>
          
<!-- end of mod_options -->

</div>



<div id="chartContainer" style="height: 370px; width: 95%; margin: 0 auto"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<br>

<div id="employee_table" style="width: 100%">

<table class='table-hover table-bordered nowrap' style="background-color: white;overflow: auto; width: 80%; text-align: center;margin: 0 auto" id="tbl2">
    <thead style=" color:black;font-size: 14px;">
      <tr>
        <th  style="text-align: center;border: 1px solid #ddd;">DATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM NAME</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PROD PLAN</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PROD RESULT</th>
        <th  style="text-align: center;border: 1px solid #ddd;">GAP</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ACHIEVEMENT RATE</th>
      </tr>
    </thead>
    <tbody>

      	<?php

                  
                  include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

          		$url=$_SERVER['REQUEST_URI'];

          		$strIndex=strrpos($url, "=");
          		$str=substr($url, $strIndex+1);

      if (isset($_GET['sorttype'])) 
      {
        # code...
        $sortingtype=$_GET['sorttype'];
      }
      else
      {
         $sortingtype="DAILY";
      }


              if ($sortingtype=="DAILY") {
                # code...

                include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/ProductionSummary/ProductionSummaryDaily.php';

              }

              else
              {
               #$currentdate=date("m",strtotime($strfrom));
               #$year=date("Y",strtotime($strfrom));
               #$reset=date("Y-m-d",strtotime($year."-".$currentdate."-31"));
                #echo $reset;



                
                include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/ProductionSummary/ProductionSummaryMonthly.php';
            
              }


          ?>


     
    </tbody>

</table>
<br><br>
</div>	



<div id="dataModal" class="modal fade">
 <div class="modal-dialog" STYLE="margin-top:-5%;">
  <div class="modal-content">
   <div class="modal-header">
        <h4 class="modal-title">INFORMATION</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">

    <button type="button" class="btn btn-outline-secondary p-1 my-2 my-sm-0" data-dismiss="modal" style="width: 80px">CLOSE</button>
   </div>
  </div>
 </div>
</div>



<script>  


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
   url:"/1_mes/_php/manuc_info/PrintStatusTableModalSelect.php",
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





</body>