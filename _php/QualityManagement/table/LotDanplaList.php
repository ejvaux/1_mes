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
            if ($result->num_rows > 0) 
            {
                echo "<table class='table-hover table-bordered table-sm wrap lotTable' id='LotDetails'><thead>    
                <th>PACKING NUMBER</th>
                <th>PRINT QTY</th>
                </thead><tbody>";
                // output data of each row
                
                while($row = $result->fetch_assoc()) 
                {
                echo " <tbody>";
                echo "<td class='text-center'>" . $row['PACKING_NUMBER'] . "</td>";
                echo "<td class='text-center'>" . $row['SUMQ'] . "</td>";
                
                }
                echo "</tbody></table>";
            } 
            else {
                echo "<table class='table-hover table-bordered table-sm wrap lotTable' id='LotDetails'><thead>   
                <th>PACKING NUMBER</th>
                <th>PRINT QTY</th>
                </thead>
                <tbody>
                    <td colspan='3' style='text-align:center'><h4>DANPLA</h4></td>
                </tbody>
                </table>";
            }
            $conn->close();
    ?>