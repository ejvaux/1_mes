<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

    $strfrom = $_GET['sortfrom'];
    $strto = $_GET['sortto'];
    $search = $_GET['search']; 
    $PlanType=$_GET['PlanType'];


if(isset($strfrom))
{
    
if ($strto == "" && $strfrom == "") 
{
        #code... condition above is whenever both date range are null
       
$sqlitem="SELECT mis_prod_plan_dl.DATE_ as DISP_DATE_ ,mis_prod_plan_dl.ITEM_NAME, 
            mis_prod_plan_dl.PLAN_QTY,
            COALESCE(SUM(mis_product.PRINT_QTY),0) as sumresult
            FROM mis_prod_plan_dl 
            LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM 
            WHERE ((mis_prod_plan_dl.ITEM_NAME = '$search') OR (mis_product.ITEM_NAME = '$search')) AND 
            ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType')) 
             GROUP BY JOB_ORDER_NO
            ORDER BY DISP_DATE_ ASC";


}

elseif ($strto == "" && $strfrom != "") 
{
        # code... condition above is whenver from is set

        if ($search != "") 
        {
            # code... if from and search is set
       
            
            $sqlitem="SELECT  mis_product.DATE_ as DISP_DATE_,mis_product.ITEM_NAME, 
            mis_prod_plan_dl.PLAN_QTY,COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult
            FROM mis_product
            LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE mis_product.ITEM_NAME = '$search' AND mis_product.DATE_='$strfrom' AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
            GROUP BY mis_product.`ITEM_NAME`
            UNION ALL
            SELECT DATE_,ITEM_NAME,PLAN_QTY,PROD_RESULT
            FROM mis_prod_plan_dl
            WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (ITEM_NAME = '$search') 
            AND (DATE_='$strfrom')  AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')
            ORDER BY `PLAN_QTY` ASC";

        }
         else 
         {
            #if date from only is set


            $sqlitem="SELECT mis_prod_plan_dl.DATE_ as DISP_DATE_ ,mis_prod_plan_dl.ITEM_NAME, 
                        mis_prod_plan_dl.PLAN_QTY, COALESCE(sum(mis_product.PRINT_QTY),0) as sumresult
                        FROM mis_prod_plan_dl 
                        LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM 
                        WHERE
                        ((mis_prod_plan_dl.DATE_='$strfrom') OR (mis_product.DATE_='$strfrom')) AND
                        ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType')) 
                        GROUP BY DISP_DATE_, ITEM_NAME 
                        ORDER BY `ITEM_NAME` ASC";

        }

} 
else 
{
        #if both date range are NOT null
        if ($search != "") 
        {

            
            $sqlitem="SELECT * FROM 
            (SELECT  mis_prod_plan_dl.DATE_ as DISP_DATE_,mis_product.ITEM_NAME, 
            mis_prod_plan_dl.PLAN_QTY,SUM(mis_product.PRINT_QTY)as sumresult
            FROM mis_product
            LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE (mis_product.DATE_ BETWEEN '$strfrom' AND '$strto') AND (mis_product.ITEM_NAME = '$search')
            AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
            GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_
            ) as A
            UNION ALL
            SELECT * FROM (
            SELECT DATE_,ITEM_NAME,PLAN_QTY,PROD_RESULT
            FROM mis_prod_plan_dl
            WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (DATE_ BETWEEN '$strfrom' AND '$strto') 
            AND (ITEM_NAME = '$search') AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType') ) as B
            ORDER BY DISP_DATE_ ASC";

    }
    else 
    {
            #if both date range are not null while search is NULL
    
    
            $sqlitem="SELECT * FROM (
                SELECT  mis_prod_plan_dl.DATE_ as DISP_DATE_,mis_product.ITEM_NAME, 
            mis_prod_plan_dl.PLAN_QTY,SUM(mis_product.PRINT_QTY)as sumresult
            FROM mis_product
            LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE mis_product.DATE_ BETWEEN '$strfrom' AND '$strto' AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
            GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_) as A
            UNION ALL
            SELECT * FROM (
            SELECT DATE_,ITEM_NAME,PLAN_QTY,PROD_RESULT
            FROM mis_prod_plan_dl
            WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (DATE_ BETWEEN '$strfrom' AND '$strto')
            AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType') ) as B
            ORDER BY `DISP_DATE_` ASC";


    }

}

}
#above braces is from if strfrom is set 
else 
{

    #if date range and search is null
    $sqlitem = "SELECT mis_prod_plan_dl.DATE_ as DISP_DATE_,mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,SUM(`mis_product.PRINT_QTY`)as sumresult
                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                FROM mis_product 
                WHERE (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
                GROUP BY `ITEM_NAME` ";

}



$result3 = $conn->query($sqlitem);
$output="asd";

while ($row = $result3->fetch_assoc()) {
$output.=$row['DISP_DATE_']."-".$row['ITEM_NAME'];
}

require_once  $_SERVER['DOCUMENT_ROOT'].'/1_mes/_includes/phpexcel/Classes/PHPExcel.php';
$excel = new PHPExcel();
$filename="ProductionSummary~".date("Y")."".date("F")."".date("d").".xlsx";
$excel  ->setActiveSheetIndex(0)
        ->setCellValue('A1','Hello')
        ->setCellValue('B1','World');
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        
        ob_clean();
        flush(); 
        $objWriter->save('php://output');

        exit;

    


echo json_encode($output);



?>