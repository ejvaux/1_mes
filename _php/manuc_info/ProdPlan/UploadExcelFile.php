<?php

require_once $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/phpexcel/Classes/PHPExcel.php";
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

        //$tmpfname = "test.xlsx";
        $excelfile=$_FILES['file_upload']['name'];
		$temp=$_FILES['file_upload']['tmp_name'];
		$type=$_FILES['file_upload']['type'];
		move_uploaded_file($temp, $_SERVER['DOCUMENT_ROOT']."/1_mes/uploaded/".$excelfile);
		echo "<script>window.close();</script>";

       /*  $url = $_SERVER['DOCUMENT_ROOT']."/1_mes/uploaded/".$excelfile;
        $filecontent = file_get_contents($url);
		$tmpfname = tempnam(sys_get_temp_dir(),"tmpxls");
		file_put_contents($tmpfname,$filecontent);

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		echo "<table border = '1'>";
		for ($row = 1; $row <= $lastRow; $row++)
		{
			 echo "<tr><td>";
			 echo $worksheet->getCell('A'.$row)->getValue();
			 echo "</td><td>";
			 echo $worksheet->getCell('B'.$row)->getValue();
			 echo "</td><tr>";
		}
		echo "</table>";	 */
?>