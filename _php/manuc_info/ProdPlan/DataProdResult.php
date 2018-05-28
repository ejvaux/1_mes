<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
    $sql="";
    $strfrom=$_POST['sortfrom'];
    $strto=$_POST['sortto'];
    $search=$_POST['search'];
    $department=$_POST['dept'];
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

                  $sql="SELECT DISTINCT(mis_summarize_results.NO), mis_product.JO_NUM, 
                  mis_product.CUST_CODE,mis_product.CUST_NAME, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
                  mis_product.TOOL_NUM,mis_summarize_results.PROD_RESULT, mis_product.DATE_,
                  mis_prod_plan_dl.PLAN_QTY as misPlan 
                  FROM `mis_summarize_results`
                    LEFT JOIN mis_product ON mis_summarize_results.JOB_ORDER_NO=mis_product.JO_NUM
                    LEFT JOIN mis_prod_plan_dl on mis_summarize_results.JOB_ORDER_NO = mis_prod_plan_dl.JOB_ORDER_NO
                      WHERE (mis_summarize_results.JOB_ORDER_NO LIKE '%$search%' or mis_product.CUST_CODE LIKE '%$search%' or
                       mis_product.CUST_NAME LIKE '%$search%' or  mis_product.ITEM_CODE LIKE '%$search%' or  
                       mis_product.ITEM_NAME LIKE '%$search%' or mis_product.TOOL_NUM LIKE '%$search%') AND (SUBSTRING(mis_product.JO_NUM,1,1) = '$deptnum')
                       ORDER BY mis_product.DATE_ DESC";
     } 

                      elseif ($strto=="" && $strfrom!="") 
                      {
                        # code... condition above is whenver 

                        if ($search!="") {
                            # code...

                             $sql="SELECT DISTINCT(mis_summarize_results.NO), mis_product.JO_NUM, mis_product.CUST_CODE,
                             mis_product.CUST_NAME, mis_product.ITEM_CODE, mis_product.ITEM_NAME, mis_product.TOOL_NUM,
                             mis_summarize_results.PROD_RESULT,mis_product.DATE_,mis_prod_plan_dl.PLAN_QTY as misPlan 
                             FROM `mis_summarize_results`
                       LEFT JOIN mis_product ON mis_summarize_results.JOB_ORDER_NO=mis_product.JO_NUM
                       LEFT JOIN mis_prod_plan_dl on mis_summarize_results.JOB_ORDER_NO = mis_prod_plan_dl.JOB_ORDER_NO 
                       WHERE (mis_summarize_results.JOB_ORDER_NO LIKE '%$search%' or mis_product.CUST_CODE LIKE '%$search%' or
                          mis_product.CUST_NAME LIKE '%$search%' or  mis_product.ITEM_CODE LIKE '%$search%' or  
                          mis_product.ITEM_NAME LIKE '%$search%' or mis_product.TOOL_NUM LIKE '%$search%') 
                        AND (mis_product.DATE_='$strfrom') AND (SUBSTRING(mis_product.JO_NUM,1,1) = '$deptnum')
                        ORDER BY mis_product.DATE_ DESC";
                          }

                          else
                          {
                             $sql="SELECT DISTINCT(mis_summarize_results.NO), mis_product.JO_NUM, mis_product.CUST_CODE,
                             mis_product.CUST_NAME, mis_product.ITEM_CODE, mis_product.ITEM_NAME, mis_product.TOOL_NUM,
                             mis_summarize_results.PROD_RESULT,mis_product.DATE_,mis_prod_plan_dl.PLAN_QTY as misPlan 
                             FROM `mis_summarize_results` 
                             LEFT JOIN mis_product ON mis_summarize_results.JOB_ORDER_NO=mis_product.JO_NUM 
                             LEFT JOIN mis_prod_plan_dl on mis_summarize_results.JOB_ORDER_NO = mis_prod_plan_dl.JOB_ORDER_NO 
                             WHERE (mis_product.DATE_='$strfrom') AND (SUBSTRING(mis_product.JO_NUM,1,1) = '$deptnum')
                             ORDER BY mis_product.DATE_ DESC";
                            }
                             
                      }

                      elseif($strfrom!="" && $strto!="")
                      {
                        if ($search!="") {
                            # code...

                            $sql="SELECT DISTINCT(mis_summarize_results.NO), mis_product.JO_NUM, 
                            mis_product.CUST_CODE,mis_product.CUST_NAME, mis_product.ITEM_CODE, 
                            mis_product.ITEM_NAME, mis_product.TOOL_NUM,mis_summarize_results.PROD_RESULT,
                            mis_product.DATE_,mis_prod_plan_dl.PLAN_QTY as misPlan 
                            FROM `mis_summarize_results`
                       LEFT JOIN mis_product ON mis_summarize_results.JOB_ORDER_NO=mis_product.JO_NUM
                       LEFT JOIN mis_prod_plan_dl on mis_summarize_results.JOB_ORDER_NO = mis_prod_plan_dl.JOB_ORDER_NO 
                       WHERE (mis_summarize_results.JOB_ORDER_NO LIKE '%$search%' or mis_product.CUST_CODE LIKE '%$search%' or
                          mis_product.CUST_NAME LIKE '%$search%' or  mis_product.ITEM_CODE LIKE '%$search%' or  
                          mis_product.ITEM_NAME LIKE '%$search%' or mis_product.TOOL_NUM LIKE '%$search%') 
                       AND (mis_product.DATE_ BETWEEN '$strfrom' AND '$strto') AND (SUBSTRING(mis_product.JO_NUM,1,1) = '$deptnum')
                       ORDER BY mis_product.DATE_ DESC";
         
                          }
                          else
                          {
                         $sql="SELECT DISTINCT(mis_summarize_results.NO),mis_product.JO_NUM, mis_product.CUST_CODE,
                         mis_product.CUST_NAME, mis_product.ITEM_CODE, mis_product.ITEM_NAME, mis_product.TOOL_NUM,
                         mis_summarize_results.PROD_RESULT,mis_product.DATE_,mis_prod_plan_dl.PLAN_QTY as misPlan 
                         FROM `mis_summarize_results`
                      LEFT JOIN mis_product ON mis_summarize_results.JOB_ORDER_NO=mis_product.JO_NUM
                       LEFT JOIN mis_prod_plan_dl on mis_summarize_results.JOB_ORDER_NO = mis_prod_plan_dl.JOB_ORDER_NO 
                       WHERE (mis_product.DATE_ BETWEEN '$strfrom' AND '$strto') AND (SUBSTRING(mis_product.JO_NUM,1,1) = '$deptnum')
                       ORDER BY mis_product.DATE_ DESC";
                          }



                      }

/*     }
    else
    {
            $sql="SELECT DISTINCT(mis_prod_plan_dl.ID), mis_prod_plan_dl.DATE_,mis_product.JO_NUM, 
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
                  LEFT JOIN mis_summarize_results on mis_product.JO_NUM = mis_summarize_results.JOB_ORDER_NO


                  WHERE dmc_customer.DIVISION_CODE = 'PTPI001'";

    } */

    $result = $conn->query($sql);
    $datavar=[];
    $ctr=0;
    while (($row = mysqli_fetch_array($result)))
     {
      # code...
     
      $ctr+=1;
      if ($row['misPlan']>0) 
      {
              $achieveresult=(($row['PROD_RESULT']/$row['misPlan'])*100);

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
      if ($row['misPlan']<$row['PROD_RESULT']) {
        # code...
          $gap="+";
          $gap.=$row['PROD_RESULT']-$row['misPlan'];
          
      }
      else
      {
        $gap="-";
    $gap.=$row['misPlan']-$row['PROD_RESULT'];

      }

      $temp_date = date("d M Y",strtotime($row['DATE_']));
          
  
      
      array_push($datavar,["NO"=> $ctr ,"JO DATE"=>$temp_date, "JO NO"=> $row['JO_NUM'] ,
              "CUSTOMER CODE"=>$row['CUST_CODE'],"CUSTOMER NAME"=>$row['CUST_NAME'],"ITEM CODE"=>$row['ITEM_CODE'],"ITEM NAME"=>$row['ITEM_NAME'],
              "TOOL NO"=>$row['TOOL_NUM'],"PLAN QTY"=>$row['misPlan'],"CURRENT PROD RESULT"=>$row['PROD_RESULT'],"GAP"=>$gap
              ,"ACHIEVE RATE"=>$achievepercent."% ","DEFECT RATE"=>""]);

      
    
    }
    echo json_encode($datavar,true);    
    ?>
  