<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <!-- Header start -->
    <?php
      include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php";
      $auth = $_SESSION['auth'];
      $auth = stripslashes($auth);             
    ?>
    <!-- Header end -->
    
    <!-- Change Title --> <title>Management Indices</title>

    <!-- Custom CSS - START -->
    <style>
      
    </style>
    <!-- Custom CSS - END -->

  </head>

    <body>
      <div class="loader">
  <img src="loading1.gif" alt="Loading..." height="350" style="width: 800px" /></div>
    <style type="text/css">
      .loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
}
th,td{

  border-style: groove;
}
.loader > img {
    width: 100px;
}

.loader.hidden {
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }
}
    </style>
    <script type="text/javascript">
      window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
    </script>
    
    <!-- Navbar - START -->
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
        ?>
    <!-- Navbar - END -->

    <!-- Page specific Navbar START-->
      <div class="mod_menu" style="position: absolute;padding-left: -15px;padding-top: -22px; margin-top: -14px;" >

 
<nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-light m-0 px-2 pb-1 pt-0" style="position:fixed;width: 100%; z-index:2; ">
 <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <!-- <span class="navbar-toggler-icon"></span> -->MENU
 </button>
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav nav-tabs mr-auto mt-1">           
            <li><a id="tb1" class="nav-link tbl" href="#INJECTION.php" onclick="">INJECTION</a></li>
              <li><a id="tb2" class="nav-link tbl" href="SMT.php" onclick="" >SMT</a></li>
              <li><a id="tb3" class="nav-link tbl" href="#DIP.php" onclick="">DIP</a></li>
              <li><a id="tb4" class="nav-link tbl" href="#DIP TEST.php" onclick="">DIP TEST</a></li>
              <li><a id="tb5" class="nav-link tbl" href="#FATP.php" onclick="">FATP</a></li>
                   <li class="nav-item dropdown" style="overflow:visible;">
     <a class="nav-link tbl dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);">
     QUALITY - WORST DEFECT ANALYSIS - SMT
     </a>
      <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown" >                  
         <div class="container dropdown-header text-left">
                    <div class="row">
                      <div class="col" >
                        <h6 class="text-left">
                        <a style="color: black" class="linkcollapse" href="#" ></a>                      
                        </h6>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="QUALITY.php" >REPAIR STATUS - SMT</a>                     
                        </h6>
                      </div>                      
                    </div>
                            <div class="row">
                      <div class="col">
                        <h6 class="text-left">
                        <!-- underConstruct() loadtbl2('ViewReceived','','view_received') -->
                        <a style="color: black" class="linkcollapse" href="worstdefectanalysis.php" >WORST DEFECT ANALYSIS - SMT</a>                     
                        </h6>
                      </div>                      
                    </div>

         </div>
      </div>
      </li>
              <li><a id="tb7" class="nav-link tbl" href="#SALES.php" onclick="">SALES</a></li>
            </ul> 


            <!-- ICONS ON LEFT -->
            <?php
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/tab_navbar.php";            
            ?>
            <!-- ICONS ON LEFT END -->

          </div>  
        </nav>
      </div>

    <!-- Page specific Navbar END -->



<!-- ------------------------selections----------------------- -->



<div class="container">
<div class="container-fluid mt-5 ml-0 pl-0" id="table_display" style="width: 100%;" >  
<div align = "center" >
<label><b>WORST DEFECT ANALYSIS OF <i>SMT </i></b></label>

 







<?php
if (isset($_GET['name'])) {
    $from=date('Y-m-d H:i:s', strtotime($_GET['from'].' 06:00:00'));
    $to=date('Y-m-d H:i:s', strtotime($_GET['to'].' 05:59:59'));
        $line_id=$_GET['line_id'];
            $process_id=$_GET['process_id'];
 //            echo "<br>";
 //             echo $process_id."<br>";
 //             echo $line_id."<br>";
 //             echo $from."<br>";
 //            echo $to."<br>";
 //             echo $defect_name."<br>";
 //             echo $defect_id;
}









$servername = "172.16.1.13";
$username = "root1";
$password = "0000";
$dbname1 = "masterdatabase";
$dbname2 = "1_smt";

// Create connection

$connect = new mysqli($servername, $username, $password, $dbname2);


// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $masterdatabase->connect_error);
} 
else { echo "<br>";}  








if($stmt = $connect->query("
  SELECT 
  masterdatabase.dmc_defect_code.DEFECT_NAME, 1_smt.pcb.serial_number, 1_smt.pcb.PDLINE_NAME, masterdatabase.smt_processes.name, 1_smt.defect_mats.created_at
  FROM 
  1_smt.defect_mats 
  INNER JOIN 
  masterdatabase.dmc_defect_code ON  masterdatabase.dmc_defect_code.DEFECT_ID=1_smt.defect_mats.defect_id
  INNER JOIN 
  1_smt.pcb ON 1_smt.pcb.id=1_smt.defect_mats.pcb_id
  INNER JOIN
  masterdatabase.smt_processes ON masterdatabase.smt_processes.id=1_smt.defect_mats.process_id
  WHERE 

  1_smt.defect_mats.created_at BETWEEN '$from' AND '$to' 
  AND 1_smt.defect_mats.line_id='$line_id' 
  AND 1_smt.defect_mats.process_id='$process_id'   
  AND 1_smt.defect_mats.defect_id='$defect_id' 
  ORDER BY 1_smt.defect_mats.created_at
  ASC  " )){






//if($stmt = $conn2->query("SELECT masterdatabase.dmc_defect_code.DEFECT_NAME, masterdatabase.dmc_defect_code.DEFECT_ID FROM 1_smt.,masterdatabase.dmc_defect_code JOIN 1_smt.defect_mats ON  masterdatabase.dmc_defect_code.DEFECT_ID=1_smt.defect_mats.defect_id WHERE 1_smt.defect_mats.created_at BETWEEN'$from' AND '$to' AND 1_smt.defect_mats.line_id='$line_id' AND 1_smt.defect_mats.process_id='$process_id'   and 1_smt.defect_mats.defect_id='$defect_id' ORDER BY COUNT(1_smt.defect_mats.process_id) DESC LIMIT 0,9 " )){
$i='1';
?>
<style type="text/css">
  .tableFix { /* Scrollable parent element */
  position: relative;
  overflow: auto;
  height: 450px;
}

.tableFix table{
  width: 100%;
  border-collapse: collapse;
}

.tableFix th,
.tableFix td{
  padding: 8px;
  text-align: left;
}

.tableFix thead th {
  position: sticky;  /* Edge, Chrome, FF */
  top: 0px;
  background: #fff;  /* Some background is needed */
}
</style>
<div class="tableFix">
<table class="table table-striped" style=" text-align:center;">
  <thead>
    <tr>
      <th scope="col">NO.</th>
      <th scope="col">SERIAL NUMBER</th>
      <th scope="col">PROD. LINE</th>
      <th scope="col">DEFECT</th>
            <th scope="col">PROCESS</th>
                  <th scope="col">DEFECT DATE/TIME</th>
    </tr>
  </thead>
  <tbody>
<?php
while ($def_id = $stmt->fetch_row()){

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //echo "<td><medium><button style='color:darkblue; border-style:none; background-color:transparent;' data-toggle='modal' data-target='#".$def_id['1']."' ><i>". strtoupper($def_id['0'])."</button></i></medium></td>";



echo "<tr style='font-size:20px;'>

      <td>".$i."</td>
      <td>".$def_id[1]."</td>
      <td>".$def_id[2]."</td>
      <td>".$def_id[0]."</td>
      <td>".$def_id[3]."</td>
      <td>".$def_id[4]."</td>

    </tr>";




$i++;
$defectname_array[]=$def_id['0'];
}}










?>



    

</tbody></table>


</div>
</div>
</div>
</div>

