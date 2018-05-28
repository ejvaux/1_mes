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
</style>

<div class="container-fluid pt-1" style="margin-left:.3%">
    <!-- <div class="row">
        <div class="col-12" style="border-style:solid">
        <div class="form-group">
                <button>Add</button>
                <button>Add</button>
                <button>Add</button>
                <button>Add</button>
                </div>
            </div>
        </div> -->

    <div class="row" >
        <div class="col-12">
        <table class="table table-striped">
            
            <?php       
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                $sql="SELECT * FROM qmd_defect_dl LEFT JOIN qmd_lot_create ON qmd_defect_dl.LOT_NUMBER = qmd_lot_create.LOT_NUMBER
                        WHERE REJECTION_REMARKS = 'DEFECT'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) 
                {
                        echo "<table class='table table-hover table-bordered table-sm tbl2 nowrap text-center' id='CreatedLotTable'><thead>    
                        <th>JOB ORDER</th>
                        <th>LOT NUMBER</th>
                        <th>PROD DATE</th>
                        <th>LOT CREATOR</th>
                        <th>ITEM CODE</th>
                        <th>ITEM NAME</th>
                        <th>DATE JUDGE</th>
                        <th>JUDGE BY</th>
                        <th>DEFECT QTY</th>
                        <th>DEFECT NAME</th>
                        </thead><tbody>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
                        echo " <tbody class='content'>";
                        echo "<td>" . $row['JOB_ORDER_NO'] . "</td>";
                        echo "<td>" . $row['LOT_NUMBER'] . "</td>";
                        echo "<td>" . $row['PROD_DATE'] . "</td>";
                        echo "<td>" . $row['LOT_CREATOR'] . "</td>";
                        echo "<td>" . $row['ITEM_CODE'] . "</td>";
                        echo "<td>" . $row['ITEM_NAME'] . "</td>";
                        echo "<td>" . $row['UPDATE_DATETIME'] . "</td>";
                        echo "<td>" . $row['UPDATE_USER'] . "</td>";
                        echo "<td>" . $row['DEFECT_QTY'] . "</td>";
                        echo "<td>" . $row['DEFECT_NAME'] . "</td>";
                    }
                    echo "</tbody></table>";
                } 
                else {
                    echo "<table class='table table-hover table-bordered table-sm tbl2' id='CreatedLotTable'><thead>    
                    <th>JOB ORDER</th>
                        <th>LOT NUMBER</th>
                        <th>PROD DATE</th>
                        <th>LOT CREATOR</th>
                        <th>ITEM CODE</th>
                        <th>ITEM NAME</th>
                        <th>DATE JUDGE</th>
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