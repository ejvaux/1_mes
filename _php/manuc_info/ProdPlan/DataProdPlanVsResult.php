<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
    $sql="";
    $strfrom=$_POST['sortfrom'];
    $strto=$_POST['sortto'];
    $search=$_POST['search'];
    $department = $_POST['dept'];
    
    
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
        
      

                      if ($strto == "" && $strfrom=="") 
                      {
                         # code... condition above is whenever both date range are null
                  /*        $sql="SELECT * from MIS_PROD_PLAN_DL WHERE JOB_ORDER_NO LIKE '%$str%' or CUSTOMER_CODE LIKE '%$str%' or CUSTOMER_NAME LIKE '%$str%' or ITEM_CODE LIKE '%$str%' or ITEM_NAME LIKE '%$str%' or TOOL_NUMBER LIKE '%$str%' or MACHINE_CODE LIKE '%$str%' or mACHINE_MAKER LIKE '%$str%' or TONNAGE LIKE '%$str%' or MACHINE_GROUP LIKE '%$str%' or PRIORITY LIKE '%$str%' order by DATE_ DESC"; */

                          $sql="SELECT DISTINCT(mis_prod_plan_dl.ID), mis_prod_plan_dl.DATE_,mis_prod_plan_dl.JOB_ORDER_NO, 
                                mis_prod_plan_dl.ITEM_CODE, mis_prod_plan_dl.ITEM_NAME, mis_prod_plan_dl.CUSTOMER_CODE, 
                                mis_prod_plan_dl.CUSTOMER_NAME,mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.MACHINE_CODE, 
                                dmc_item_mold_matching.TOOL_NUMBER,dmc_item_mold_matching.CAVITY, dmc_machine_list.MACHINE_GROUP, 
                                dmc_machine_list.MACHINE_MAKER, dmc_machine_list.TONNAGE,mis_summarize_results.PROD_RESULT 

                                FROM mis_prod_plan_dl
                                 
                                LEFT JOIN dmc_item_mold_matching
                                   ON (mis_prod_plan_dl.ITEM_CODE = dmc_item_mold_matching.ITEM_CODE) 
                                  AND (mis_prod_plan_dl.CUSTOMER_CODE=dmc_item_mold_matching.CUSTOMER_CODE) 
                                LEFT JOIN dmc_machine_list ON mis_prod_plan_dl.MACHINE_CODE = dmc_machine_list.MACHINE_CODE 
                                LEFT JOIN dmc_customer ON mis_prod_plan_dl.CUSTOMER_CODE = dmc_customer.CUSTOMER_CODE
                                LEFT JOIN mis_summarize_results on mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO


                                WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND
                                (mis_prod_plan_dl.JOB_ORDER_NO LIKE '%$search%' or mis_prod_plan_dl.CUSTOMER_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.CUSTOMER_NAME LIKE '%$search%' or mis_prod_plan_dl.ITEM_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.ITEM_NAME LIKE '%$search%' or dmc_item_mold_matching.TOOL_NUMBER LIKE '%$search%' 
                                or mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or dmc_machine_list.MACHINE_MAKER LIKE '%$search%' 
                                or dmc_machine_list.TONNAGE LIKE '%$search%' or dmc_machine_list.MACHINE_GROUP LIKE '%$search%' 
                                or mis_prod_plan_dl.PRIORITY LIKE '%$search%')";

                       } 

                      elseif ($strto=="" && $strfrom!="") 
                      {
                        # code... condition above is whenver 

                              if ($search!="") {

                                # code...
                                 $sql="SELECT DISTINCT(mis_prod_plan_dl.ID), mis_prod_plan_dl.DATE_,mis_prod_plan_dl.JOB_ORDER_NO, 
                                mis_prod_plan_dl.ITEM_CODE, mis_prod_plan_dl.ITEM_NAME, mis_prod_plan_dl.CUSTOMER_CODE, 
                                mis_prod_plan_dl.CUSTOMER_NAME,mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.MACHINE_CODE, 
                                dmc_item_mold_matching.TOOL_NUMBER,dmc_item_mold_matching.CAVITY, dmc_machine_list.MACHINE_GROUP, 
                                dmc_machine_list.MACHINE_MAKER, dmc_machine_list.TONNAGE,mis_summarize_results.PROD_RESULT 

                                FROM mis_prod_plan_dl
                                 
                                LEFT JOIN dmc_item_mold_matching
                                   ON (mis_prod_plan_dl.ITEM_CODE = dmc_item_mold_matching.ITEM_CODE) 
                                  AND (mis_prod_plan_dl.CUSTOMER_CODE=dmc_item_mold_matching.CUSTOMER_CODE) 
                                LEFT JOIN dmc_machine_list ON mis_prod_plan_dl.MACHINE_CODE = dmc_machine_list.MACHINE_CODE 
                                LEFT JOIN dmc_customer ON mis_prod_plan_dl.CUSTOMER_CODE = dmc_customer.CUSTOMER_CODE
                                LEFT JOIN mis_summarize_results on mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO


                                WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND (mis_prod_plan_dl.DATE_ = '$strfrom') AND
                                (mis_prod_plan_dl.JOB_ORDER_NO LIKE '%$search%' or mis_prod_plan_dl.CUSTOMER_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.CUSTOMER_NAME LIKE '%$search%' or mis_prod_plan_dl.ITEM_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.ITEM_NAME LIKE '%$search%' or dmc_item_mold_matching.TOOL_NUMBER LIKE '%$search%' 
                                or mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or dmc_machine_list.MACHINE_MAKER LIKE '%$search%' 
                                or dmc_machine_list.TONNAGE LIKE '%$search%' or dmc_machine_list.MACHINE_GROUP LIKE '%$search%' 
                                or mis_prod_plan_dl.PRIORITY LIKE '%$search%')";

                                


                              }
                              else
                              {

                                 $sql="SELECT DISTINCT(mis_prod_plan_dl.ID), mis_prod_plan_dl.DATE_,mis_prod_plan_dl.JOB_ORDER_NO, 
                                mis_prod_plan_dl.ITEM_CODE, mis_prod_plan_dl.ITEM_NAME, mis_prod_plan_dl.CUSTOMER_CODE, 
                                mis_prod_plan_dl.CUSTOMER_NAME,mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.MACHINE_CODE, 
                                dmc_item_mold_matching.TOOL_NUMBER,dmc_item_mold_matching.CAVITY, dmc_machine_list.MACHINE_GROUP, 
                                dmc_machine_list.MACHINE_MAKER, dmc_machine_list.TONNAGE,mis_summarize_results.PROD_RESULT 

                                FROM mis_prod_plan_dl
                                 
                                LEFT JOIN dmc_item_mold_matching
                                   ON (mis_prod_plan_dl.ITEM_CODE = dmc_item_mold_matching.ITEM_CODE) 
                                  AND (mis_prod_plan_dl.CUSTOMER_CODE=dmc_item_mold_matching.CUSTOMER_CODE) 
                                LEFT JOIN dmc_machine_list ON mis_prod_plan_dl.MACHINE_CODE = dmc_machine_list.MACHINE_CODE 
                                LEFT JOIN dmc_customer ON mis_prod_plan_dl.CUSTOMER_CODE = dmc_customer.CUSTOMER_CODE
                                LEFT JOIN mis_summarize_results on mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO


                                WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND (mis_prod_plan_dl.DATE_ ='$strfrom')";

                                
                              }
                             
                      }

                      elseif($strfrom!="" && $strto!="")
                      {
                                  if ($search!="") {
                                    # code...

                                    $sql="SELECT DISTINCT(mis_prod_plan_dl.ID), mis_prod_plan_dl.DATE_,mis_prod_plan_dl.JOB_ORDER_NO, 
                                    mis_prod_plan_dl.ITEM_CODE, mis_prod_plan_dl.ITEM_NAME, mis_prod_plan_dl.CUSTOMER_CODE, 
                                    mis_prod_plan_dl.CUSTOMER_NAME,mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.MACHINE_CODE, 
                                    dmc_item_mold_matching.TOOL_NUMBER,dmc_item_mold_matching.CAVITY, dmc_machine_list.MACHINE_GROUP, 
                                    dmc_machine_list.MACHINE_MAKER, dmc_machine_list.TONNAGE,mis_summarize_results.PROD_RESULT 

                                    FROM mis_prod_plan_dl
                                     
                                    LEFT JOIN dmc_item_mold_matching
                                       ON (mis_prod_plan_dl.ITEM_CODE = dmc_item_mold_matching.ITEM_CODE) 
                                      AND (mis_prod_plan_dl.CUSTOMER_CODE=dmc_item_mold_matching.CUSTOMER_CODE) 
                                    LEFT JOIN dmc_machine_list ON mis_prod_plan_dl.MACHINE_CODE = dmc_machine_list.MACHINE_CODE 
                                    LEFT JOIN dmc_customer ON mis_prod_plan_dl.CUSTOMER_CODE = dmc_customer.CUSTOMER_CODE
                                    LEFT JOIN mis_summarize_results on mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO


                                    WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum')
                                    AND (mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto') AND
                                    
                                    
                                (mis_prod_plan_dl.JOB_ORDER_NO LIKE '%$search%' or mis_prod_plan_dl.CUSTOMER_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.CUSTOMER_NAME LIKE '%$search%' or mis_prod_plan_dl.ITEM_CODE LIKE '%$search%' 
                                or mis_prod_plan_dl.ITEM_NAME LIKE '%$search%' or dmc_item_mold_matching.TOOL_NUMBER LIKE '%$search%' 
                                or mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or dmc_machine_list.MACHINE_MAKER LIKE '%$search%' 
                                or dmc_machine_list.TONNAGE LIKE '%$search%' or dmc_machine_list.MACHINE_GROUP LIKE '%$search%' 
                                or mis_prod_plan_dl.PRIORITY LIKE '%$search%')";


                                     

                                  }
                                  else
                                  {

                                   $sql="SELECT DISTINCT(mis_prod_plan_dl.ID), mis_prod_plan_dl.DATE_,mis_prod_plan_dl.JOB_ORDER_NO, 
                                    mis_prod_plan_dl.ITEM_CODE, mis_prod_plan_dl.ITEM_NAME, mis_prod_plan_dl.CUSTOMER_CODE, 
                                    mis_prod_plan_dl.CUSTOMER_NAME,mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.MACHINE_CODE, 
                                    dmc_item_mold_matching.TOOL_NUMBER,dmc_item_mold_matching.CAVITY, dmc_machine_list.MACHINE_GROUP, 
                                    dmc_machine_list.MACHINE_MAKER, dmc_machine_list.TONNAGE,mis_summarize_results.PROD_RESULT 

                                    FROM mis_prod_plan_dl
                                     
                                    LEFT JOIN dmc_item_mold_matching
                                       ON (mis_prod_plan_dl.ITEM_CODE = dmc_item_mold_matching.ITEM_CODE) 
                                      AND (mis_prod_plan_dl.CUSTOMER_CODE=dmc_item_mold_matching.CUSTOMER_CODE) 
                                    LEFT JOIN dmc_machine_list ON mis_prod_plan_dl.MACHINE_CODE = dmc_machine_list.MACHINE_CODE 
                                    LEFT JOIN dmc_customer ON mis_prod_plan_dl.CUSTOMER_CODE = dmc_customer.CUSTOMER_CODE
                                    LEFT JOIN mis_summarize_results on mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO


                                     WHERE (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1) = '$deptnum') AND
                                     (mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto')";
                          
                                  }



                      }

/*     }
    else
    {
            $sql="SELECT DISTINCT(mis_prod_plan_dl.ID), mis_prod_plan_dl.DATE_,mis_prod_plan_dl.JOB_ORDER_NO, 
                  mis_prod_plan_dl.ITEM_CODE, mis_prod_plan_dl.ITEM_NAME, mis_prod_plan_dl.CUSTOMER_CODE, 
                  mis_prod_plan_dl.CUSTOMER_NAME,mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.MACHINE_CODE, 
                  dmc_item_mold_matching.TOOL_NUMBER,dmc_item_mold_matching.CAVITY, dmc_machine_list.MACHINE_GROUP, 
                  dmc_machine_list.MACHINE_MAKER, dmc_machine_list.TONNAGE,mis_summarize_results.PROD_RESULT 

                  FROM mis_prod_plan_dl
                   
                  LEFT JOIN dmc_item_mold_matching
                     ON (mis_prod_plan_dl.ITEM_CODE = dmc_item_mold_matching.ITEM_CODE) 
                    AND (mis_prod_plan_dl.CUSTOMER_CODE=dmc_item_mold_matching.CUSTOMER_CODE) 
                  LEFT JOIN dmc_machine_list ON mis_prod_plan_dl.MACHINE_CODE = dmc_machine_list.MACHINE_CODE 
                  LEFT JOIN dmc_customer ON mis_prod_plan_dl.CUSTOMER_CODE = dmc_customer.CUSTOMER_CODE
                  LEFT JOIN mis_summarize_results on mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO


                  WHERE dmc_customer.DIVISION_CODE = 'PTPI001'";

    } */

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
      
     array_push($datavar,["NO"=> $ctr ,"DATE"=>$temp_date, "JO NO"=> $row['JOB_ORDER_NO'] ,
      "CUSTOMER CODE"=>$row['CUSTOMER_CODE'],"CUSTOMER NAME"=>$row['CUSTOMER_NAME'],"ITEM CODE"=>$row['ITEM_CODE'],"ITEM NAME"=>$row['ITEM_NAME'],
      "MACHINE CODE"=>$row['MACHINE_CODE'],"MACHINE MAKER"=>$row['MACHINE_MAKER'],"TONNAGE"=>$row['TONNAGE'],"MACHINE GROUP"=>$row['MACHINE_GROUP']
      ,"TOOL NO"=>$row['TOOL_NUMBER'],"PRIORITY"=>"","CYCLE TIME"=>"","PLAN QTY"=>$row['PLAN_QTY'],"PROD RESULT"=>$row['PROD_RESULT'],"GAP"=>$gap,"ACHIEVE RATE"=>$achievepercent."% ","DEFECT RATE"=>""]);
    
    
      
    
    }
    echo json_encode($datavar,true);    
    ?>
  