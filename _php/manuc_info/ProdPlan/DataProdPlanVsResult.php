<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
    $sql="";
    $strfrom=$_POST['sortfrom'];
    $strto=$_POST['sortto'];
    $search=$_POST['search'];
    $department = $_POST['dept'];
    $ads = $_POST['ads'];
    //$ads= "";
    
    
    if($department=="INJ")
    {
      $deptnum=1;
    }
    elseif($department=="SMT")
    {
      $deptnum=2;
    }
    elseif($department=="MOLD")
    {
      $deptnum=3;
    }
    elseif($department=="ASSY")
    {
      $deptnum=4;
    }
    elseif($department=="PRINTING")
    {
      $deptnum=5;
    }
    elseif($department=="SAMPLES")
    {
      $deptnum=6;
    }
  /*   if(strpos($url, 'sortfrom=')!==false)
    { */
      $sql="SELECT DISTINCT(mis_prod_plan_dl.ID), mis_prod_plan_dl.DATE_,mis_prod_plan_dl.JOB_ORDER_NO, 
      mis_prod_plan_dl.ITEM_CODE, mis_prod_plan_dl.ITEM_NAME, mis_prod_plan_dl.CUSTOMER_CODE, 
      mis_prod_plan_dl.CUSTOMER_NAME,mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.MACHINE_CODE, 
      dmc_item_mold_matching.TOOL_NUMBER,dmc_item_mold_matching.CAVITY, dmc_machine_list.MACHINE_GROUP, 
      dmc_machine_list.MACHINE_MAKER, dmc_machine_list.TONNAGE,mis_summarize_results.PROD_RESULT,
      dmc_item_list.ITEM_PRINTCODE,mis_prod_plan_dl.SALES_ORDER

      FROM mis_prod_plan_dl
       
      LEFT JOIN dmc_item_mold_matching
         ON (mis_prod_plan_dl.ITEM_CODE = dmc_item_mold_matching.ITEM_CODE) 
        /* AND (mis_prod_plan_dl.CUSTOMER_CODE=dmc_item_mold_matching.CUSTOMER_CODE)  */
        AND (mis_prod_plan_dl.MACHINE_CODE=dmc_item_mold_matching.MACHINE_CODE) 
      LEFT JOIN dmc_machine_list ON mis_prod_plan_dl.MACHINE_CODE = dmc_machine_list.MACHINE_CODE 
      LEFT JOIN dmc_customer ON mis_prod_plan_dl.CUSTOMER_CODE = dmc_customer.CUSTOMER_CODE
      LEFT JOIN mis_summarize_results on mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO
      LEFT JOIN dmc_item_list on mis_prod_plan_dl.ITEM_CODE = dmc_item_list.ITEM_CODE ";
      

      if($ads!="ads")
      {
                      if ($strto == "" && $strfrom=="") 
                      {
                         # code... condition above is whenever both date range are null

                              if ($search!="")
                              {


                              $sql.=" WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND
                                (mis_prod_plan_dl.JOB_ORDER_NO LIKE '%$search%' or mis_prod_plan_dl.CUSTOMER_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.CUSTOMER_NAME LIKE '%$search%' or mis_prod_plan_dl.ITEM_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.ITEM_NAME LIKE '%$search%' or dmc_item_mold_matching.TOOL_NUMBER LIKE '%$search%' 
                                or mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or dmc_machine_list.MACHINE_MAKER LIKE '%$search%' 
                                or dmc_machine_list.TONNAGE LIKE '%$search%' or dmc_machine_list.MACHINE_GROUP LIKE '%$search%' 
                                or mis_prod_plan_dl.PRIORITY LIKE '%$search%') ORDER BY mis_prod_plan_dl.DATE_ DESC LIMIT 1000";

                              }

                              else
                              {
                                $datetoday=date("Y-m-d");
                                $sql.=" WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND
                                (mis_prod_plan_dl.DATE_='2019-11-11')
                                
                                ORDER BY mis_prod_plan_dl.DATE_ DESC LIMIT 300";

                              }

                          

                       } 

                      elseif ($strto=="" && $strfrom!="") 
                      {
                        # code... condition above is whenver 

                              if ($search!="") {

                                # code...
                                $sql.="  WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND (mis_prod_plan_dl.DATE_ = '$strfrom') AND
                                (mis_prod_plan_dl.JOB_ORDER_NO LIKE '%$search%' or mis_prod_plan_dl.CUSTOMER_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.CUSTOMER_NAME LIKE '%$search%' or mis_prod_plan_dl.ITEM_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.ITEM_NAME LIKE '%$search%' or dmc_item_mold_matching.TOOL_NUMBER LIKE '%$search%' 
                                or mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or dmc_machine_list.MACHINE_MAKER LIKE '%$search%' 
                                or dmc_machine_list.TONNAGE LIKE '%$search%' or dmc_machine_list.MACHINE_GROUP LIKE '%$search%' 
                                or mis_prod_plan_dl.PRIORITY LIKE '%$search%')  ORDER BY mis_prod_plan_dl.DATE_ DESC LIMIT 500";

                                


                              }
                              else
                              {

                                $sql.=" WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND (mis_prod_plan_dl.DATE_ ='$strfrom') 
                                ORDER BY mis_prod_plan_dl.DATE_ DESC LIMIT 1000";

                                
                              }
                             
                      }

                      elseif($strfrom!="" && $strto!="")
                      {
                                  if ($search!="") {
                                    # code...

                                $sql.=" WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum')
                                AND (mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto') AND    
                                (mis_prod_plan_dl.JOB_ORDER_NO LIKE '%$search%' or mis_prod_plan_dl.CUSTOMER_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.CUSTOMER_NAME LIKE '%$search%' or mis_prod_plan_dl.ITEM_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.ITEM_NAME LIKE '%$search%' or dmc_item_mold_matching.TOOL_NUMBER LIKE '%$search%' 
                                or mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or dmc_machine_list.MACHINE_MAKER LIKE '%$search%' 
                                or dmc_machine_list.TONNAGE LIKE '%$search%' or dmc_machine_list.MACHINE_GROUP LIKE '%$search%' 
                                or mis_prod_plan_dl.PRIORITY LIKE '%$search%')  ORDER BY mis_prod_plan_dl.DATE_ DESC";

                                  }
                                  else
                                  {

                                    $sql.=" WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND
                                     (mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto')  ORDER BY mis_prod_plan_dl.DATE_ DESC";
                          
                                  }



                      }
        
      }
      else
      {
        $ads_sortfrom = $_POST['ads_sortfrom'];
        $ads_sortto= $_POST['ads_sortto'];
        $ads_custcode= $_POST['ads_custcode'];
        $ads_custname= $_POST['ads_custname'];
        $ads_itemcode= $_POST['ads_itemcode'];
        $ads_itemname= $_POST['ads_itemname'];
        $ads_mccode= $_POST['ads_mccode'];
        $ads_jo_no= $_POST['ads_jo_no'];

        if ($strto == "" && $strfrom=="") 
        {
        }
        elseif ($strto=="" && $strfrom!="") 
        {
        }
        elseif($strfrom!="" && $strto!="")
        {
        }

      }
              
    
    
    
    $result = $conn->query($sql);
    $datavar=[];
    $ctr=0;
    while (($row = mysqli_fetch_array($result)))
     {
      # code...
      $temp_date = date("d M Y",strtotime($row['DATE_']));
      $ctr+=1;
      if ($row['PLAN_QTY']>0) 
      {
              $achieveresult=(($row['PROD_RESULT']/$row['PLAN_QTY'])*100);
              $achievepercent=round($achieveresult,2);
                # code...
              if ($achievepercent>0) 
              {
                # code...
                $achievepercent=number_format((float)$achievepercent, 2, '.', '');
              }
            
      }
      else
      {
         $achievepercent= 0;
      }
    
      if ($row['PLAN_QTY']<$row['PROD_RESULT']) 
      {
        # code...
          $gap="+";
          $gap.=$row['PROD_RESULT']-$row['PLAN_QTY'];
          
      }
      elseif ($row['PLAN_QTY']==$row['PROD_RESULT']) 
      {
        # code...
        $gap="";
        $gap.=$row['PLAN_QTY']-$row['PROD_RESULT'];
  
      }
      else
      {
         $gap="-";
         $gap.=$row['PLAN_QTY']-$row['PROD_RESULT'];

      }
      
      $jonumber=$row['JOB_ORDER_NO'];
      $itemcode=$row['ITEM_CODE'];

      $sqldef = "SELECT SUM(DEF_QUANTITY) as TOTAL_DEFECT FROM qmd_defect_dl
       WHERE JOB_ORDER_NO='$jonumber' AND ITEM_CODE='$itemcode'";
       $resultdef=$conn->query($sqldef);
       
       while($rowDef=$resultdef->fetch_assoc()){
        $defectpercentage="0%";
        if($rowDef['TOTAL_DEFECT']!=NULL)
        {
          $defectpercentage = (($rowDef['TOTAL_DEFECT']/$row['PLAN_QTY'])*100);
          $defectpercentage=round($defectpercentage,2);
          $defectpercentage=$defectpercentage."%";
          #$defectpercentage="asd%"
        }
        else
        {
          $defectpercentage="0%";
        }
       }





     array_push($datavar,["NO"=> $ctr ,"DATE"=>$temp_date, "JO NO"=> $row['JOB_ORDER_NO'] ,
      "CUSTOMER CODE"=>$row['CUSTOMER_CODE'],"CUSTOMER NAME"=>$row['CUSTOMER_NAME'],"ITEM CODE"=>$row['ITEM_CODE'],"ITEM NAME"=>$row['ITEM_NAME'],
      "MACHINE CODE"=>$row['MACHINE_CODE'],"MACHINE MAKER"=>$row['MACHINE_MAKER'],"TONNAGE"=>$row['TONNAGE'],"MACHINE GROUP"=>$row['MACHINE_GROUP']
      ,"TOOL NO"=>$row['TOOL_NUMBER'],"PRIORITY"=>"","CYCLE TIME"=>"","PLAN QTY"=>$row['PLAN_QTY'],"PROD RESULT"=>$row['PROD_RESULT'],
      "GAP"=>$gap,"ACHIEVE RATE"=>$achievepercent."% ","DEFECT RATE"=>$defectpercentage,"ITEM_MODEL"=>$row['ITEM_PRINTCODE'],"SO_NO"=>$row['SALES_ORDER']]);
    
    
      
    
    }
    echo json_encode($datavar,true);    
    ?>
  