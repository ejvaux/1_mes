<table class="table table-striped">
                
                <?php       
                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                    if(!isset($_POST['sql'])){
                        $sql="SELECT * FROM qmd_defect_dl WHERE REJECTION_REMARKS = 'DEFECT'";
                        }
                        else{
                            $sql = $_POST['sql'];
                        }
                    
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) 
                    {
                            echo "<table class='table table-hover table-bordered table-sm tbl2 nowrap text-center' id='defectTable'><thead>    
                            <th>DEFECT ID</th>
                            <th>JOB ORDER</th>
                            <th>PROD DATE</th>
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
                            echo "<td>" . $row['LOT_DEFECT_ID'] . "</td>";
                            echo "<td>" . $row['JOB_ORDER_NO'] . "</td>";
                            echo "<td>" . $row['PROD_DATE'] . "</td>";
                            echo "<td>" . $row['ITEM_CODE'] . "</td>";
                            echo "<td>" . $row['ITEM_NAME'] . "</td>";
                            echo "<td>" . $row['INSERT_USER'] . "</td>";
                            echo "<td class='text-danger'>" . $row['DEF_QUANTITY'] . "</td>";
                            echo "<td>" . $row['DEFECT_NAME'] . "</td>";
                        }
                        echo "</tbody></table>";
                    } 
                    else {
                        echo "<table class='table table-hover table-bordered table-sm tbl2' id='defectTable'><thead>    
                            <th>DEFECT ID</th>
                            <th>JOB ORDER</th>
                            <th>PROD DATE</th>
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