<style>
    .tx{
    height:34px;
    width:250px;
    /* margin-left:-90px; */
    padding-top:10px;
    }
    .bt{
    width:75px;
    font-size: 12px;
    padding: 0px;
    }
    .reworkbtn{
    width:50%;
    font-size: 12px;
    padding: 0px;
    }
    .scrapbtn{
    width:50%;
    font-size: 12px;
    padding: 0px;
    }
    .lblqty{
    /* margin-left:-90px; */
    margin-top:8px;
    padding-top:8px;
    padding-bottom:8px;
    padding-left:10px;
    padding-right:10px;
    }
    .txtqty{
    width:90px;
    }
    .element{
        height: 70vh; 
        width:  95vw;
    }
    .fixTable{
  width:1000px;
    }
    .ctrl{
  margin-top:.7%;
  margin-bottom:-1%
    }
  </style>
<!-- style="border-style:solid" -->
<div class="container-fluid pt-1" style="margin-left:.3%">
    <div class="row">
        <div class="col-12">

            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="First group">
                    <button type="button" class="btn btn-export6" data-toggle='modal' data-target='#insertDefect'><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-export6" onclick="notWorking()" data-toggle="tooltip" title="EDIT"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-export6" onclick="notWorking()" data-toggle="tooltip" title="DELETE"><i class="fas fa-trash"></i></button>
                    <button type="button" class="btn btn-export6" onclick="notWorking()" data-toggle="tooltip" title="COPY TO CLIPBOARD"><i class="fas fa-copy"></i></button>
                    <button type="button" class="btn btn-export6" onclick="notWorking()" data-toggle="tooltip" title="EXPORT TO EXCEL"><i class="fas fa-table"></i></button>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddon2">Search</div>
                        </div>
                            <input type="text" id="defectSearchId" onchange="defectSearch()" class="py-1 form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" id="ClearDefectSearch" onclick="ClearDefectSearch()" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>

    <div class="row" >
        <div class="col-12">
            <table class="table table-striped">
                
                <?php       
                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                    if(!isset($_POST['sql'])){
                        $sql="SELECT * FROM qmd_defect_dl LEFT JOIN qmd_lot_create ON qmd_defect_dl.LOT_NUMBER = qmd_lot_create.LOT_NUMBER
                            WHERE REJECTION_REMARKS = 'DEFECT'";
                        }
                        else{
                            $sql = $_POST['sql'];
                        }
                    
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) 
                    {
                            echo "<table class='table table-hover table-bordered table-sm tbl2 nowrap text-center' id='CreatedLotTable'><thead>    
                            <th>JOB ORDER</th>
                            <th>PROD DATE</th>
                            <th>LOT CREATOR</th>
                            <th>ITEM CODE</th>
                            <th>ITEM NAME</th>
                            <th>JUDGE BY</th>
                            <th>DEFECT QTY</th>
                            <th>DEFECT NAME</th>
                            </thead><tbody>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) 
                            {
                            echo " <tbody class='content'>";
                            echo "<td>" . $row['JOB_ORDER_NO'] . "</td>";
                            echo "<td>" . $row['PROD_DATE'] . "</td>";
                            echo "<td>" . $row['LOT_CREATOR'] . "</td>";
                            echo "<td>" . $row['ITEM_CODE'] . "</td>";
                            echo "<td>" . $row['ITEM_NAME'] . "</td>";
                            echo "<td>" . $row['INSERT_USER'] . "</td>";
                            echo "<td class='text-danger'>" . $row['DEFECT_QTY'] . "</td>";
                            echo "<td>" . $row['DEFECT_NAME'] . "</td>";
                        }
                        echo "</tbody></table>";
                    } 
                    else {
                        echo "<table class='table table-hover table-bordered table-sm tbl2' id='CreatedLotTable'><thead>    
                        <th>JOB ORDER</th>
                            <th>PROD DATE</th>
                            <th>LOT CREATOR</th>
                            <th>ITEM CODE</th>
                            <th>ITEM NAME</th>
                            <th>JUDGE BY</th>
                            <th>DEFECT QTY</th>
                            <th>DEFECT NAME</th>
                            </thead>
                        <tbody>
                            <td colspan='11' style='text-align:center'><h4>NO DEFECT DETAILS</h4></td>
                            </tbody>
                        </table>";
                        
                        }
                    $conn->close();
                ?>
            </table>
        </div>
    </div>
    </div>

                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary"><i class="fas fa-plus"></i></button>
                <button type="button" class="btn btn-secondary"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-secondary"><i class="fas fa-trash"></i></button>
                <button type="button" class="btn btn-secondary"><i class="fas fa-copy"></i></button>
                <button type="button" class="btn btn-secondary"><i class="fas fa-table"></i></button>
                </div>
            </div>
        <div class="col">
            </div>
        <div class="col-6">
            <div class="form-group">
            <table style="width:100%">
                <tr>
                <td><input type="text" id="" onchange="" class="py-1 form-control form-control-sm" placeholder="SEARCH ANYTHING HERE ..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING"></td>
                <td><button type="button" class="searchBtn btn btn-outline-secondary" id="" onclick="" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button></td>                                                                    
                </tr>
                </table>
            </div> -->
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/_modal/InsertDefectModal.php"; ?>