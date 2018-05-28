<?php
session_start();


$sql=$_SESSION['sqlstatement'];




$conn = mysqli_connect("localhost","root","","masterdatabase");


if(!$conn)
{

die("Connection failed: ".mysqli_connect_error());

}


$query=$sql;

$result=$conn->query($query);

$output='
<table>
<tr>
<th>JO DATE</th>
<th>JOB ORDER NO</th>
<th>CUSTOMER CODE</th>
<th>CUSTOEMR NAME</th>
<th>ITEM CODE</th>
<th>ITEM NAME</th>
<th>MACHINE CODE</th>
<th>MACHINE MAKER</th>
<th>TONNAGE</th>
<th>MACHINE GROUP</th>
<th>TOOL NUMBER</th>
<th>PRIORITY</th>
<th>CYCLE TIME</th>
<th>PLAN QTY</th>
<th>PROD RESULT</th>
<th>GAP</th>
<th>ACHIEVEMENT RATE</th>
<th>DEFECT RATE</th>

</tr>
';

$gap=0;
$temp_date=0;

$achievepercent=0;
while($row=$result->fetch_assoc())
{
$output.='
          <tr>
           <td style="border: 1px solid #ddd;">'.$temp_date.'</td>
          <td style="border: 1px solid #ddd;">'.$row['JOB_ORDER_NO'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['CUSTOMER_CODE'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['CUSTOMER_NAME'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['ITEM_CODE'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['ITEM_NAME'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['MACHINE_CODE'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['MACHINE_MAKER'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['TONNAGE'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['MACHINE_GROUP'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['TOOL_NUMBER'].'</td>
          <td style="border: 1px solid #ddd;">'.'</td>
          <td style="border: 1px solid #ddd;">'.'</td>
          <td style="border: 1px solid #ddd;">'.$row['PLAN_QTY'].'</td>
          <td style="border: 1px solid #ddd;">'.$row['PROD_RESULT'].'</td>
          <td style="border: 1px solid #ddd;">'.$gap.'</td>
          <td style="border: 1px solid #ddd;">'.$achievepercent.'% </td>
          <td style="border: 1px solid #ddd;">
          </td>
          </tr>


';
}

$output.='</table>';
$filename = "myfile.xls";
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$filename);
  echo $output;

?>