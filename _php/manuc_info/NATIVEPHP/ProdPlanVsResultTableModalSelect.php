<?php  
//select.php  

$connect = mysqli_connect("localhost","root","","masterdatabase");


if(!$connect)
{

die("Connection failed: ".mysqli_connect_error());

}

session_start();

$_SESSION["planvsresultid"] =$_POST["employee_id"];

if(isset($_POST["employee_id"]))
{
 $output = '';
 $query = "SELECT * FROM mis_prod_plan_dl WHERE ID = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
 <form action="ProdResulltTempUpdate.php" action="POST">
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>DATE:</label></td>  
            <td width="70%">'.$row["DATE_"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>J.O NO:</label></td>  
            <td width="70%"><input type="text" name="joborder" value="'.$row["JOB_ORDER_NO"].'"></td>  
        </tr>
        <tr>  
            <td width="30%"><label> CUSTOMER CODE:</label></td>  
            <td width="70%">'.$row["CUSTOMER_CODE"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>CUSTOMER NAME:</label></td>  
            <td width="70%">'.$row["CUSTOMER_NAME"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>ITEM CODE:</label></td>  
            <td width="70%">'.$row["ITEM_CODE"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>ITEM NAME:</label></td>  
            <td width="70%">'.$row["ITEM_NAME"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>MACHINE CODE:</label></td>  
            <td width="70%">'.$row["MACHINE_CODE"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>PLAN QTY:</label></td>  
            <td width="70%">'.$row["PLAN_QTY"].'</td>  
        </tr>
         <tr>  
            <td width="30%"><label>PROD RESULT:</label></td>  
            <td width="70%">'.$row["PROD_RESULT"].'</td>  
        </tr>                         
     ';
    }
    $output .= '</table>
    <div style="text-align: center">
     <input type="submit" name="sub" class="btn btn-outline-secondary p-1 my-2 my-sm-0" style="width: 80px" value="SAVE">
      <button type="button" class="btn btn-outline-secondary p-1 my-2 my-sm-0" data-dismiss="modal" style="width: 80px">CLOSE</button>
    </div>
    </div></form>';
    echo $output;
}

?>