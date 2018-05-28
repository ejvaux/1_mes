<?php

include 'datavar.php';

if (isset($_GET['PlanType'])) {
    $drpPlantype = $_GET['PlanType'];
} else {
    $drpPlantype = "";
}
?>

<!DOCTYPE html>
<html>


<head>
  <title></title>
    <link rel="icon" href="favicon.ico"/>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


 <link rel ="stylesheet" href="http://reggie-pc/1_MES/css/manuc_info.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/1_mes/_css/page.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/tabulator/3.5.1/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tabulator/3.5.1/js/tabulator.min.js"></script>
<link href="/1_mes/_php/manuc_info/dist/css/tabulator_simple.min.css" rel="stylesheet">
<script type="text/javascript" src="http://oss.sheetjs.com/js-xlsx/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/1_mes/_includes/logcheck.php";
?>


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


<?php
#this php tag fails
include '1_MES_DB.php';

$sql = "SELECT * from mis_product";
$result = $conn->query($sql);
$rowcount = $result->num_rows;
$currentcount = $rowcount;

$status = true;

$sql = "SELECT * from mis_product";
$result = $conn->query($sql);
$rowcount = $result->num_rows;

//wait for 5 sec for next function call

//you can set $status as FALSE if you want get out of this loop.

//if(somecondition){
//    $status=FALSE:
//}

?>






<div class="container-fluid">


<?php include $_SERVER['DOCUMENT_ROOT'] . "/1_mes/_includes/navbar.php";?>

  <div class="mod_menu" style="position: absolute">


       <nav class="navbar navbar-brdr navbar-expand-lg navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; overflow:hidden;">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->MENU
        </button>
       <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav nav-tabs mr-auto mt-1">
              <li>
                <span id='usr' > <a href="#" class="nav-link" data-toggle="popover1" title="PROD PLAN VS RESULT MENU" >Production Plan Vs Result</a></span>
              </li>
              <li>
                <a class="nav-link" id="menuhover"  href="ProductionSummary.php">Production Summary</a>
              </li>
              <li>
                <a class="nav-link active" id="menuhover"  href="PrintStatus.php">Print Status</a>
              </li>
              <li>
                <a class="nav-link" id="menuhover" href="#">Production Stop</a>
              </li>


            </ul>
             <!-- ICONS ON LEFT -->
              <?php include $_SERVER['DOCUMENT_ROOT'] . "/1_mes/_includes/tab_navbar.php"; ?>
          <!-- ICONS ON LEFT END -->
          </div>


        </nav>

        <nav id="popover-content1" class="nav flex-column" style="display: none;">
          <a href="ProdPlanVsResult.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>INJ</b></a>
          <a href="ProdResult.php" class="nav-link" style="color: black">PROD RESULT - <b>INJ</b></a>
          <a href="ProdPlanVsResultSMT.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>SMT</b></a>
          <a href="ProdResultSMT.php" class="nav-link" style="color: black">PROD RESULT - <b>SMT</b></a>
          <a href="ProdPlanVsResultASSY.php" class="nav-link" style="color: black">PROD PLAN VS RESULT - <b>ASSY</b></a>
          <a href="ProdResultASSY.php" class="nav-link" style="color: black">PROD RESULT - <b>ASSY</b></a>
          <!-- <a href="#" class="nav-link">Invite Members</a>
          <a href="#" class="nav-link">Delete Event</a> -->
        </nav>
  </div>


    <br>
    <div class="mod_options" style="z-index: 1;padding-top: 50px;">

               <div style="width: 100%;text-align: left;">



                     <form action='PrintStatusSort.php' method='POST'>

                                                <div class="row">

                                                          <div class="col-md-1" style="text-align: left">
                                                            <table style="text-align: center;height: 80%;width: 100%">
                                                              <tr>
                                                                <td>
                                                            <b>FILTER BY: </b>
                                                            <?php

$url = $_SERVER['REQUEST_URI'];

$strIndex = strrpos($url, "=");
$str = substr($url, $strIndex + 1);

if (strpos($url, 'sortfrom=') !== false) {

    if ($_GET['sortfrom'] != "") {
        # code...
        echo "<br>" . $_GET['sortfrom'];
    }

}
if (strpos($url, 'sortto=') !== false) {

    if ($_GET['sortto'] != "") {
        # code...
        echo "<br>" . $_GET['sortto'];
    }

}

if (strpos($url, 'search=') !== false) {
    # code...
    if ($_GET['search'] != "") {
        # code...
        echo "<br>words with <br><i>'" . $_GET['search'] . "'</i>";
    }

} else {
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

if (strpos($url, 'search') !== false) {
    $searchtext = $_GET['search'];
} else {
    $searchtext = "";
}

echo " <input type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;' value='" . $searchtext . "'>";

?>



                                                                       </td>
                                                                       <td>&nbsp
                                                                       <button type="submit" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp<i class="fa fa-search"></i>&nbsp</button>
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

if (strpos($url, 'sortfrom') !== false) {
    $sortfrom1 = $_GET['sortfrom'];
} else {
    $sortfrom1 = "";
}

echo "<input type='date' onchange='this.form.submit()' name='sortingdatefrom' class='form-control' style='font-size: 10px' value='" . $sortfrom1 . "'>";
?>

                                                                              </div>
                                                                                <!-- Add clearfix for only the required viewport -->
                                                                              <div class="clearfix visible-xs"></div>
                                                                              <div class="col-xs-6 col-sm-0"> <b> TO: </b></div>
                                                                              <div class="col-xs-6 col-sm-3">
                                                                                      <?php

if (strpos($url, 'sortto') !== false) {
    $sortto1 = $_GET['sortto'];
} else {
    $sortto1 = "";
}

echo "<input type='date' onchange='this.form.submit()' name='sortingdateto' class='form-control' style='font-size: 10px' value='" . $sortto1 . "'>";
?>
                                                                              </div>
                                                                              <div class="col-xs-6 col-sm-0"> <b> DIVISION: </b></div>
                                                                              <div class="col-xs-6 col-sm-1">
                                                                                    <table>
                                                                                    <tr>
                                                                                       <td>
                                                                                            <div class="form-group">

                                                                                              <?php

include '1_MES_DB.php';

$sqlPlanType = " SELECT DIVISION_CODE, DIVISION_NAME from dmc_division_code";

$resultSqlPlanType = $conn->query($sqlPlanType);

echo '<select class="form-control" onchange="this.form.submit()" style="width: 150px;font-size: 10px; height:28px" name="PlanType">';

while ($row = $resultSqlPlanType->fetch_assoc()) {
    # code...
    if ($drpPlantype == $row['DIVISION_CODE']) {
        echo "<option value='" . $row['DIVISION_CODE'] . "' selected='true' >" . $row['DIVISION_NAME'] . "</option>";
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

                                                              <table style="width: 100%">
                                                                <tr>
                                                                  <td style="width: 50%;">  &nbsp  <a href="PrintStatus.php" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp CANCEL FILTER &nbsp</a>
                                                                  </td>
                                                                   <td valign="top">
                                                                   <a href=" CloningResults.php?address=PrintStatus.php" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp SYNC &nbsp</a>
                                                                   </td>
                                                                </tr>
                                                              </table>

                                                           </div>

                                                </div>
                     </form>

                </div>




                  <div style=" display: none">
                    <button type="button" class="btn btn-outline-secondary p-1 my-2 my-sm-0" data-toggle="modal" data-target="#myModal"> Open modal
                    </button>
                  </div>

    </div>

                  <!-- The Modal -->
                  <!-- The Modal -->

</div>

                  <!--
<input type="button" name="button1" id="download-xlsx" value="XLSX">
<input type="button" name="button1" id="download-csv" value="CSV">
<input type="button" name="button1" id="download-pdf" value="PDF">
-->
<div id="example-table"></div>

<script type="text/javascript">

//trigger AJAX load on "Load Data via AJAX" button click


 $("#example-table").tabulator({
    height: "100%", // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    layout:"fitColumns", //fit columns to width of table (optional)
    pagination:"local",
    paginationSize:100,
    movableColumns:true,
   // responsiveLayout:"collapse",
    columns:[ //Define Table Columns
     //{formatter:"responsiveCollapse", width:30, minWidth:30, align:"center", resizable:false, headerSort:false},

        {title:"NO", field:"NO", width:60},
        {title:"JO NO", field:"JO NO"},
        {title:"SERIAL PRINT", field:"SERIAL PRINT"},
        {title:"PROD DATE", field:"PROD DATE", sorter:"date", align:"center"},
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
    //rowClick:function(e, row){ //trigger an alert message when the row is clicked
      //  alert("Row " + row.getData().id + " Clicked!!!!");
    //},
});


var tabledata = <?php echo json_encode($datavar, JSON_PRETTY_PRINT) ?> ;


//load sample data into the table
$("#example-table").tabulator("setData", tabledata);

$("#download-csv").click(function(){
    $("#example-table").tabulator("download", "csv", "data.csv");
});


//trigger download of data.xlsx file
$("#download-xlsx").click(function(){
    $("#example-table").tabulator("download", "xlsx", "data.xlsx", {sheetName:"My Data"});
});

//trigger download of data.pdf file
$("#download-pdf").click(function(){
    $("#example-table").tabulator("download", "pdf", "data.pdf", {
        orientation:"portrait", //set page orientation to portrait
        title:"Example Report", //add title to report
    });
});

</script>





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


<script src="/1_mes/js/jquery.freezeheader.js"></script>

<script>
$(document).ready(function () {
            $("#tbl2").freezeHeader({ 'offset':'125px' });
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

