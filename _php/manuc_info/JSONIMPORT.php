<?php


$conn = mysqli_connect("localhost","root","","jsonextract");


if(!$conn)
{

die("Connection failed: ".mysqli_connect_error());

}


/* $data = file_get_contents('http://172.16.1.13:8000/1_mes/_php/manuc_info/data.csv'); */
$data = file_get_contents('\\\\reggie-pc\xampp\SHARE\PTPI_ProductionOrder20180601.csv');
#C:\Users\jeff\Desktop\SAP FOLDER C:\Users\jeff\Documents\DEBUG-INV
$obj = json_decode($data);


/* foreach($obj as $item) {
   echo $item->JO_DATE."<br>".$item->JOB_ORDER_NO."<br>".$item->ITEM_CODE."<br>";
    } */

    /* 
   .$item->ITEM_NAME."<br>".$item->PROD_QTY."<br><br><br>";
  */


  $row = 1;
  $header = true;
  if (($handle = fopen("PTPI_ProductionOrder20180601.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

/*         FOR REMOVING HEADER */
        if($header)
        {
          $header=false;
          continue;
        }


          $num = count($data);
         /* echo "<p> $num fields in line $row: <br /></p>\n";*/  
          $row++;
          for ($c=0; $c < $num; $c++) {
              echo $data[$c] . "<br />\n";
          }
      }
      fclose($handle);
  }

