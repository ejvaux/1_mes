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
                <th>INPUT DEFECT</th> 
                <th>INSPECT</th>
                <th>PACKING NUMBER</th>
                <th>PRINT QTY</th>
                </thead><tbody>";
                // output data of each row
                
                while($row = $result->fetch_assoc()) 
                {
                echo " <tbody>";
                /* onKeyDown='if(this.value.length==6 && event.keyCode>47 && event.keyCode<58)return false;' */
                /* onkeydown='a()' */
                echo "<td class='text-center'><input type='number' id='DEFECT_QUANTITY". $row['JO_BARCODE']."' class='hiddenText defectTextBox' min='0' max='" . $row['SUMQ'] . "' value='0' onfocusout='a()' onkeydown='a()'></input></td>"; 
                echo "<td class='text-center'>
                <label class='switch'>
                <input type='checkbox' class='btn btn-danger checkBoxDefect' id='". $row['JO_BARCODE'] ."'><span class='slider'></span>
                </label>
                </td>";
                echo "<td class='text-center'>" . $row['JO_BARCODE'] . "</td>";
                echo "<td class='text-center'>" . $row['SUMQ'] . "</td>";
                
                }
                echo "</tbody></table>";
            } 
            else {
                echo "<table class='table-hover table-bordered table-sm wrap lotTable' id='LotDetails'><thead>   
                <th>INPUT DEFECT</th> 
                <th>INSPECT</th>
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