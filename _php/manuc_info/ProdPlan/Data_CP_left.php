<?php
require_once $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/phpexcel/Classes/PHPExcel.php";

$datavar=[];
$excelfile=$_POST['xlsx'];
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
    
    $ctr=0;
    for ($row = 2; $row <= $lastRow; $row++)
    {
    $ctr+=1;
    array_push($datavar,["NO"=>$ctr,"ITEMCODE"=> $worksheet->getCell('A'.$row)->getValue() ,"DEMANDS"=>number_format($worksheet->getCell('B'.$row)->getValue())]);
    }
}

    echo json_encode($datavar,true); 