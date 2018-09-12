<?php
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/phpexcel/Classes/PHPExcel.php";
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

$excelfile=$_POST['xlsx'];
$tempname=$_POST['tempname'];
$month = $_POST['selMonth'];

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
        $sd = $worksheet->getCell('B'.$row)->getValue();

        $sql = "SELECT ct_cycletime,ct_machine FROM cp_cycletime WHERE ct_ItemCode LIKE '$itemcode%'";
        $result = $conn->query($sql);
        $rowcount=$result->num_rows;
        $conn->close();
        if($rowcount>0)
        {
            include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
            $sqlCheckallocate = "SELECT cp_allocateid FROM cp_allocated WHERE itemcode = '$itemcode' AND templatename = '$tempname' ";
            $result2 = $conn->query($sqlCheckallocate);
            $rowcountcheck = $result2->num_rows;
            if($rowcountcheck>0)
            {

            }
            else
            {   
                while($row2=$result->fetch_assoc())
                {
                    
                    $datares = InsertIntoAllocate($row2['ct_machine'],$row2['ct_cycletime'],$itemcode,$sd);
                    //array_push($datavar,["NO"=>$row2['ct_machine'], "ct"=>$row2['ct_cycletime']]);
                    break;
                    
                }
                echo json_encode($datares,true);  
            }//end of rowcountcheck


        }//if ($rowcount >=0) ->kung may nakasave sa cycle table nung item.
        else
        {

        }// else of if ($rowcount >=0)
        
  
    }//end braces of for($row=2;$row<=$lastrow;$row++)      
}//end braces of if excelfile==""


function InsertIntoAllocate($machine,$cycletime,$itemcode,$demands)
{   $tempname=$_POST['tempname'];
    $month = $_POST['selMonth'];
    //$datavar=[];
    list ($itemcode1, $itemname1, $ccode,$cname) = getitemdetails($itemcode);
    $cavity = GetMoldList($itemcode1);
    $machinecapacity = getMachineCap($cycletime,$cavity);
    $runqty = getRunQty($demands,$machinecapacity);
    include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
       
    $noofdays = date("t");
    for($x = 1;$x<=$noofdays;$x++)
    {   
        $year = date("Y");
        $date = $year."-".$month."-".$x;
        $assdate = date('Y-m-d', strtotime($date));

        $sql7 = "INSERT INTO cp_allocated(itemcode,itemname,customercode,customername,machinecode,cavity,run_qty,cycle_time,
    machine_capacity,templatename,date_assigned) VALUES('$itemcode1','$itemname1','$ccode','$cname','$machine','$cavity','$runqty','$cycletime','$machinecapacity','$tempname','$assdate')";
   
        if ($conn->query($sql7)=== TRUE)
        {   
        //array_push($datavar,["NO"=>  $itemcode1." ".$cycletime." ".$cavity." ".round($machinecapacity)." ".$runqty]);
        $datavar = true;
        }
        else
        {
        //array_push($datavar,["NO"=>  $conn->error]);
        $datavar=false;
        }
    } //end of for loop
       

    //$datavar =  $itemcode1." ".$ccode." ".$cavity." ".$machinecapacity." ".$runqty;
    /* array_push($datavar,["NO"=>  date("t")]);
    */
  return $datavar;
}    

function getitemdetails($itemcode)
{
    include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
    $sql = "SELECT ITEM_CODE,ITEM_NAME,CUSTOMER_CODE,CUSTOMER_NAME FROM dmc_item_list WHERE ITEM_CODE LIKE '$itemcode%' ORDER BY ITEM_CODE ASC LIMIT 1";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
    {
        return array($row['ITEM_CODE'],$row['ITEM_NAME'],$row['CUSTOMER_CODE'],$row['CUSTOMER_NAME']);
    }
    $conn->close();
}

function GetMoldList($itemcode1)
{
    
    include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
    $sql="SELECT CAVITY from dmc_mold_list WHERE ITEM_CODE = '$itemcode1'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
    {
        return $row['CAVITY'];
    }
    $conn->close();

}

function getMachineCap($ct,$cavity)
{
    $machcap = ((((3600/$ct)*$cavity)*24)*0.95);
    return $machcap;
}

function getRunQty($sd,$machinecapacity)
{
    $runqty = (($sd/26)/$machinecapacity);
    return ceil($runqty);
}