<?php
      include '1_MES_DB.php';

      $url=$_SERVER['REQUEST_URI'];
$strIndex=strrpos($url, "=");
$str=substr($url, $strIndex+1);

      if(strpos($url, 'sortfrom=')!==false)
    {
        
        $strfrom=$_GET['sortfrom'];
        $strto=$_GET['sortto'];
        $search=$_GET['search'];

                      if ($strto == "" && $strfrom=="") {
                         # code... condition above is whenever both date range are null
                         $sql="SELECT DISTINCT(mis_summarize_results.NO), mis_product.JO_NUM, 
                         mis_product.CUST_CODE,mis_product.CUST_NAME, mis_product.ITEM_CODE, mis_product.ITEM_NAME, 
                         mis_product.TOOL_NUM,mis_summarize_results.PROD_RESULT, mis_product.DATE_,
                         mis_prod_plan_dl.PLAN_QTY as misPlan 
                         FROM `mis_summarize_results`
                           LEFT JOIN mis_product ON mis_summarize_results.JOB_ORDER_NO=mis_product.JO_NUM
                           LEFT JOIN mis_prod_plan_dl on mis_summarize_results.JOB_ORDER_NO = mis_prod_plan_dl.JOB_ORDER_NO 
                             WHERE mis_summarize_results.JOB_ORDER_NO LIKE '%$search%' or mis_product.CUST_CODE LIKE '%$search%' or
                              mis_product.CUST_NAME LIKE '%$search%' or  mis_product.ITEM_CODE LIKE '%$search%' or  
                              mis_product.ITEM_NAME LIKE '%$search%' or mis_product.TOOL_NUM LIKE '%$search%'
                              ORDER BY mis_product.DATE_ DESC";

                          } 

                      elseif ($strto=="" && $strfrom!="") 
                      {
                        # code... condition above is whenver date range from is set and to date is null

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
                            AND (mis_product.DATE_='$strfrom')
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
                                 WHERE mis_product.DATE_='$strfrom'
                                 ORDER BY mis_product.DATE_ DESC";
                                }
                             
                      }

                  else{
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
                           AND (mis_product.DATE_ BETWEEN '$strfrom' AND '$strto')
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
                           WHERE mis_product.DATE_ BETWEEN '$strfrom' AND '$strto'
                           ORDER BY mis_product.DATE_ DESC";
                              }



                      }
        
      

    }

    else
    {
             $sql="SELECT DISTINCT(mis_summarize_results.NO), mis_product.JO_NUM, mis_product.CUST_CODE,
             mis_product.CUST_NAME, mis_product.ITEM_CODE, mis_product.ITEM_NAME, mis_product.TOOL_NUM,mis_summarize_results.PROD_RESULT,
             mis_product.DATE_,mis_prod_plan_dl.PLAN_QTY as misPlan 
             FROM `mis_summarize_results`
             LEFT JOIN mis_product ON mis_summarize_results.JOB_ORDER_NO=mis_product.JO_NUM
             LEFT JOIN mis_prod_plan_dl on mis_summarize_results.JOB_ORDER_NO = mis_prod_plan_dl.JOB_ORDER_NO
             ORDER BY mis_product.DATE_ DESC";
                        
    }






        $result=$conn->query($sql);
        $res=$conn->query($sql);

          if(!$row3=$res->fetch_assoc()){

      #echo "<td colspan='18' style='text-align: center;'><b>FILTER RESULT:</b> '<i>No Records to Display</i>'";
      #echo "<br> <a href='ProdPlanVsResult.php' style='text-decoration: underline; font-weight: bold'>View All Data</a>";
      #echo "</td>";
      $message = "Search Result: No Data to preview. Check your search parameters or set a date range.";
      echo "<script type='text/javascript'>alert('$message');</script>";

    }
    else
    {


        $ctr=0;
        $datavar = array();

        while($row=$result->fetch_assoc())
        {
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
          

              array_push($datavar,array("NO"=> $ctr ,"JO DATE"=>$temp_date, "JO NO"=> $row['JO_NUM'] ,
              "CUSTOMER CODE"=>$row['CUST_CODE'],"CUSTOMER NAME"=>$row['CUST_NAME'],"ITEM CODE"=>$row['ITEM_CODE'],"ITEM NAME"=>$row['ITEM_NAME'],
              "TOOL NO"=>$row['TOOL_NUM'],"PLAN QTY"=>$row['misPlan'],"CURRENT PROD RESULT"=>$row['PROD_RESULT'],"GAP"=>$gap
              ,"ACHIEVE RATE"=>$achievepercent."% ","DEFECT RATE"=>""));


        }

    }


?>