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
 $query = "SELECT DISTINCT(mis_summarize_results.JOB_ORDER_NO), mis_product.CUST_CODE,mis_product.CUST_NAME, mis_product.ITEM_CODE, mis_product.ITEM_NAME, mis_product.TOOL_NUM,mis_summarize_results.PROD_RESULT FROM `mis_summarize_results`
                           INNER JOIN mis_product ON mis_summarize_results.JOB_ORDER_NO=mis_product.JO_NUM
                           LEFT JOIN mis_prod_plan_dl on mis_summarize_results.JOB_ORDER_NO = mis_prod_plan_dl.JOB_ORDER_NO WHERE mis_summarize_results.NO = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>J.O NO:</label></td>  
            <td width="70%">'.$row["JOB_ORDER_NO"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>CUSTOMER CODE:</label></td>  
            <td width="70%">'.$row["CUST_CODE"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label> CUSTOMER NAME:</label></td>  
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
            <td width="30%"><label>TOOL NO:</label></td>  
            <td width="70%">'.$row["TOOL_NUM"].'</td>  
        </tr>
         <tr>  
            <td width="30%"><label>PROD RESULT:</label></td>  
            <td width="70%">'.$row["PROD_RESULT"].'</td>  
        </tr>                         
     ';
    }
    $output .= '</table></div>';
    echo $output;
}

?>