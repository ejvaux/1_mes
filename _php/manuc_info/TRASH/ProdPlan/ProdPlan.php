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
 <script src="http://reggie-pc/1_MES/js/colResizable-1.6.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
        include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/logcheck.php";    
    ?>


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
   
<div class="mod_menu">

        <nav class="navbar navbar-brdr navbar-expand-lg navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index: 2;height: 54px">
              <!--
                      <img src="http://reggie-pc/1_MES/_images/Info-icon.png" class="rounded" alt="Manufacturing Information" width="40" height="40" style="margin-right: 1%">
                    
                       <a class="navbar-brand" href="#" style="font-size:1em">Manufacturing Information</a>
                  -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item dropdown" id="menuhover" style="position: fixed">
                  <a class="nav-link dropdown-toggle active" href="ProdPlanVsResult.php" id="navbardrop" data-toggle="dropdown">
                  Production Plan Vs Result
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="ProdPlanVsResult.php">Prod Plan Vs Result</a>
                    <a class="dropdown-item" href="#">Prod Plan</a>
                    <a class="dropdown-item" href="ProdResult.php">Prod Result</a>
                  </div>
              </li>
              <li class="nav-item nav-link">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              </li>
              <li class="nav-item">
                <a class="nav-link" id="menuhover" href="ProductionSummary.php">Production Summary</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="menuhover"  href="PrintStatus.php">Print Status</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="menuhover"  href="#">Production Stop</a>
              </li>    

            </ul>
          </div>  

          <?php
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/tab_navbar.php";            
            ?>
        </nav>
</div>



<div class="mod_options" style="z-index: 0;padding-top: 55px;">
                
    <div style="width: 100%;text-align: left;">


 
 <form action='ProdPlanSort.php' method='POST'>
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

                                            if(strpos($url, 'sort=')!==false)
                                            {
                                             
                                               echo "<br>".$str;

                                            }
                                            elseif (strpos($url,'search=')!==false) {
                                              # code...
                                             echo "<br>words with <i>'".$str."'</i>";
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

                                                              echo "<input type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px' value='".$sortfrom1."'>";
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

                                                echo "<input type='date' name='sortingdateto' class='form-control' style='font-size: 10px' value='".$sortto1."'>";
                                                          ?>
                                                        </div>

                                                        <div class="col-xs-6 col-sm-3" style="text-align: center;">
                                                          <table style="width: 100%">
                                                            <tr>
                                                          <td style="width: 50%;"> &nbsp <input type="submit" value="&nbsp SORT &nbsp" class="btn btn-outline-secondary p-0 my-2 my-sm-0"></td>
                                                          <td style="width: 50%;">  &nbsp  <a href="ProdPlanVsResult.php" class="btn btn-outline-secondary p-0 my-2 my-sm-0">&nbsp CANCEL FILTER &nbsp</a></td>
                                                            </tr>
                                                          </table>
                                                        
                                                        </div>
                                                      </div>
                                                    </div>

                                               
                                              
                                           
                                      </div> <!-- end div of col -->

                            </div>
</form>
                 
      </div>


       

        <div style=" display: none">  <button type="button" class="btn btn-outline-secondary p-1 my-2 my-sm-0" data-toggle="modal" data-target="#myModal"> Open modal
</button></div>
    
</div>
      
        <!-- The Modal -->
     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD NEW INFORMATION</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->



      </div>
    </div>
  </div>
  
  
        <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
  
  </div>




<div id="employee_table" style="width: 100%">

<table class='table-hover table-bordered nowrap' style="background-color: white;overflow: auto;" id="tbl2">
     <thead style=" color:black;font-size: 12px;">
      <tr>
       <th style="border: 1px solid #ddd; height: 40px;width:100px">CTRLS</th>
        <th   style="border: 1px solid #ddd;width: 40px">&nbsp&nbspNO&nbsp&nbsp</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px;">J.O. DATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">J.O. NO</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">CUSTOMER CODE</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">CUSTOMER NAME</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM CODE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM NAME</th>
        <th  style="text-align: center;border: 1px solid #ddd;">MACHINE CODE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">MACHINE MAKER</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">TONNAGE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">MACHINE GROUP</th>
        <th  style="text-align: center;border: 1px solid #ddd;">TOOL NUMBER</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">PRIORITY</th>
         <th  style="text-align: center;border: 1px solid #ddd;padding: 15px">CYCLE TIME</th>
        <th  style="text-align: center;border: 1px solid #ddd;padding: 10px">PLAN QTY</th>

      </tr>
    </thead>
     <tbody>

        <?php

    include '1_MES_DB.php';

    #$url=$_SERVER['REQUEST_URI'];

    #$strIndex=stripos($url, "=");
    #$str=substr($url, $strIndex+1);
  

    if(strpos($url, 'sortfrom=')!==false)
    {
        
        $strfrom=$_GET['sortfrom'];
        $strto=$_GET['sortto'];
        $search=$_GET['search'];

                      if ($strto == "" && $strfrom=="") {
                         # code... condition above is whenever both date range are null
                         $sql="SELECT * from MIS_PROD_PLAN_DL WHERE JOB_ORDER_NO LIKE '%$str%' or CUSTOMER_CODE LIKE '%$str%' or CUSTOMER_NAME LIKE '%$str%' or ITEM_CODE LIKE '%$str%' or ITEM_NAME LIKE '%$str%' or TOOL_NUMBER LIKE '%$str%' or MACHINE_CODE LIKE '%$str%' or mACHINE_MAKER LIKE '%$str%' or TONNAGE LIKE '%$str%' or MACHINE_GROUP LIKE '%$str%' or PRIORITY LIKE '%$str%' order by DATE_ DESC";
                       } 

                      elseif ($strto=="" && $strfrom!="") 
                      {
                        # code... condition above is whenver 

                              if ($search!="") {
                                # code...
                                   $sql="SELECT * from MIS_PROD_PLAN_DL WHERE (DATE_ ='$strfrom') AND (JOB_ORDER_NO LIKE '%$str%' or CUSTOMER_CODE LIKE '%$str%' or CUSTOMER_NAME LIKE '%$str%' or ITEM_CODE LIKE '%$str%' or ITEM_NAME LIKE '%$str%' or TOOL_NUMBER LIKE '%$str%' or MACHINE_CODE LIKE '%$str%' or mACHINE_MAKER LIKE '%$str%' or TONNAGE LIKE '%$str%' or MACHINE_GROUP LIKE '%$str%' or PRIORITY LIKE '%$str%') order by DATE_ DESC";

                              }
                              else
                              {
                                 $sql="SELECT * from MIS_PROD_PLAN_DL WHERE DATE_ ='$strfrom' order by DATE_ DESC";  
                              }
                             
                      }

                  else{
                              if ($search!="") {
                                # code...
                                   $sql="SELECT * from MIS_PROD_PLAN_DL WHERE ( DATE_ BETWEEN '$strfrom' AND '$strto') AND (JOB_ORDER_NO LIKE '%$str%' or CUSTOMER_CODE LIKE '%$str%' or CUSTOMER_NAME LIKE '%$str%' or ITEM_CODE LIKE '%$str%' or ITEM_NAME LIKE '%$str%' or TOOL_NUMBER LIKE '%$str%' or MACHINE_CODE LIKE '%$str%' or mACHINE_MAKER LIKE '%$str%' or TONNAGE LIKE '%$str%' or MACHINE_GROUP LIKE '%$str%' or PRIORITY LIKE '%$str%') order by DATE_ DESC";

                              }
                              else
                              {
                              $sql="SELECT * from MIS_PROD_PLAN_DL WHERE DATE_ BETWEEN '$strfrom' AND '$strto' order by DATE_ DESC";   
                              }



                      }
        
      

    }

    else
    {
            $sql="SELECT * from MIS_PROD_PLAN_DL order by DATE_ DESC";

    }




        $result=$conn->query($sql);
        $res=$conn->query($sql);

          if(!$row3=$res->fetch_assoc()){

      echo "<td colspan='18' style='text-align: center;'><b>FILTER RESULT:</b> '<i>No Records to Display</i>'";
      echo "<br> <a href='ProdPlanVsResult.php' style='text-decoration: underline; font-weight: bold'>View All Data</a>";
      echo "</td>";

    }
    else
    {


    $ctr=0;

    while($row=$result->fetch_assoc())
        {
          $temp_date = date("d M Y",strtotime($row['DATE_']));
          $ctr+=1;

          echo "<tr>";
          echo "<td style='text-align:center;padding:5px' class='hide-from-printer' >&nbsp&nbsp<input type='button' name='view' value='VIEW' id='".$row['ID']."' class='btn btn-outline-info btn-sm view_data' />&nbsp&nbsp</td>";
          echo "<td style='border: 1px solid #ddd;padding:'>&nbsp".$ctr."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$temp_date."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['JOB_ORDER_NO']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['CUSTOMER_CODE']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['CUSTOMER_NAME']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['ITEM_CODE']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['ITEM_NAME']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['MACHINE_CODE']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['MACHINE_MAKER']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['TONNAGE']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['MACHINE_GROUP']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['TOOL_NUMBER']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['PRIORITY']."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp"."</td>";
          echo "<td style='border: 1px solid #ddd;'>&nbsp".$row['PLAN_QTY'];

          




          echo "</td>";
          echo "</tr>";


        }

}

        ?>
      
    </tbody>
 </table>

	

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
   url:"/1_mes/_php/manuc_info/ProdPlanTableModalSelect.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>



</div>

</body>