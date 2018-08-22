<?php
require_once $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/phpexcel/Classes/PHPExcel.php";
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
$datavar=[];
$excelfile=$_POST['xlsx'];
$tempname=$_POST['tempname'];
if($excelfile!="")
{
    $url = $_SERVER['DOCUMENT_ROOT']."/1_mes/uploaded/".$excelfile;
    $filecontent = file_get_contents($url);
    $tmpfname = tempnam(sys_get_temp_dir(),"tmpxls");
    file_put_contents($tmpfname,$filecontent);

    $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
    $excelObj = $excelReader->load($tmpfname);
    $worksheet = $excelObj->getSheet(0); 
    $lastRow = $worksheet->getHighestRow();
    

    for ($row = 2; $row <= $lastRow; $row++)
    {
   
        //$worksheet->getCell('A'.$row)->getValue()
        $itemcode = $worksheet->getCell('A'.$row)->getValue();

        $sql = "SELECT ct_cycletime,ct_machine FROM cp_cycletime WHERE ct_ItemCode LIKE '$itemcode%'";
        $result = $conn->query($sql);
        $rowcount=$result->num_rows;
        if($rowcount>=0)
        {
            
        }//if ($rowcount >=0) ->kung may nakasave sa cycle table nung item.
        else
        {

        }// else of if ($rowcount >=0)
        
  
    }//end braces of for($row=2;$row<=$lastrow;$row++)
}//end braces of if excelfile==""

    //echo json_encode($datavar,true); 