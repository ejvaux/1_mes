<?php  
//select.php  

$connect = mysqli_connect("localhost","root","","masterdatabase");


if(!$connect)
{

die("Connection failed: ".mysqli_connect_error());

}



if(isset($_POST["employee_id"]))
{
 $output = '';
 $query = "SELECT mis_product.*, dmc_item_list.MODEL FROM `mis_product` LEFT JOIN dmc_item_list on mis_product.ITEM_CODE = dmc_item_list.ITEM_CODE WHERE mis_product.NO = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>SERIAL_PRINT</label></td>  
            <td width="70%">'.$row["JO_BARCODE"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>PROD DATE:</label></td>  
            <td width="70%">'.$row["PRINT_DATE"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label> CUSTOMER CODE:</label></td>  
            <td width="70%">'.$row["CUST_CODE"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>CUSTOMER NAME:</label></td>  
            <td width="70%">'.$row["CUST_NAME"].'</td>  
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
            <td width="30%"><label>PRINT QTY:</label></td>  
            <td width="70%">'.$row["PRINT_QTY"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>PACKING NO:</label></td>  
            <td width="70%">'.$row["PACKING_NUMBER"].'</td>  
        </tr>
         <tr>  
            <td width="30%"><label>PRINTED BY:</label></td>  
            <td width="70%">'.$row["PRINTED_BY"].'</td>  
        </tr>                         
     ';
    }
    $output .= '</table></div>';
    echo $output;
}

?>