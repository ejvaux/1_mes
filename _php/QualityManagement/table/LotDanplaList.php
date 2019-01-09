<style>
.hiddenText{
    display: none;
}
.showText{
    
    width:80%;
    display:  inline-block;
}

</style>
<?php       
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  



            $sql1 = $_POST['sql1'];
            $result = $conn->query($sql1);
            /* if (!empty($result)) */
            if ($result->num_rows > 0)
            {
                echo "<table class='text-center table-hover table-bordered table-sm wrap lotTable' id='LotDetails'><thead>    
                <th>NO</th>
                <th>REFERENCE NUMBER</th>
                <th>PACKING NUMBER</th>
                <th>PRINT QTY</th>
                </thead><tbody>";
                // output data of each row
                $ctr = 0;
                while($row = $result->fetch_assoc()) 
                {
                $ctr += 1;
                echo " <tbody>";
                echo "<td>". $ctr . "</td>";
                if($row['danpla_reference'] == "")
                {
                    echo "<td> N/A </td>";
                }
                else
                {
                    echo "<td>" . $row['danpla_reference'] . "</td>";
                }
                echo "<td>" . $row['PACKING_NUMBER'] . "</td>";
                echo "<td>" . $row['SUMQ'] . "</td>";
                
                }
                echo "</tbody></table>";
            } 
            else {
                echo "<table class='text-center table-hover table-bordered table-sm wrap lotTable' id='LotDetails'><thead>   
                <th>REFERENCE NUMBER</th>
                <th>PACKING NUMBER</th>
                <th>PRINT QTY</th>
                </thead>
                <tbody>
                    <td colspan='3' style='text-align:center'><p>Please sync data from ProOut Barcode System</p></td>
                </tbody>
                </table>";
            }
            $conn->close();
    ?>