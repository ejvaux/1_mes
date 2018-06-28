<?php
include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
    $sql="";
    $strfrom=$_POST['sortfrom'];
    $strto=$_POST['sortto'];
    $search=$_POST['search'];
    $drdatatype=$_POST['drdatatype'];
    

  /*   if(strpos($url, 'sortfrom=')!==false)
    { */
        
                      if ($strto == "" && $strfrom=="") 
                      {
                         # code... condition above is whenever both date range are null
                  /*        $sql="SELECT * from MIS_PROD_PLAN_DL WHERE JOB_ORDER_NO LIKE '%$str%' or CUSTOMER_CODE LIKE '%$str%' or CUSTOMER_NAME LIKE '%$str%' or ITEM_CODE LIKE '%$str%' or ITEM_NAME LIKE '%$str%' or TOOL_NUMBER LIKE '%$str%' or MACHINE_CODE LIKE '%$str%' or mACHINE_MAKER LIKE '%$str%' or TONNAGE LIKE '%$str%' or MACHINE_GROUP LIKE '%$str%' or PRIORITY LIKE '%$str%' order by DATE_ DESC"; */
                            if($search!="")
                            {
                                $sql="SELECT * FROM mis_dr_assigned WHERE (dr_number LIKE '%$search%' OR group_name LIKE '%$search%')";
                                if($drdatatype=="UNASSIGNED DR")
                                {
                                    $sql.=" AND (dr_number IS NULL OR dr_number ='') ";
                                }
                                else if ($drdatatype=="ASSIGNED DR")
                                {
                                    $sql.=" AND (group_name IS NULL OR group_name ='') ";      
                                }
                                $sql.="GROUP BY dr_number, group_name";

                                
                            }
                            else
                            {
                             $sql="SELECT * FROM mis_dr_assigned ";
                                    if($drdatatype=="UNASSIGNED DR")
                                    {
                                        $sql.=" WHERE dr_number IS NULL OR dr_number =''";
                                    }
                                    else if ($drdatatype=="ASSIGNED DR")
                                    {
                                        $sql.=" WHERE group_name IS NULL OR group_name ='' ";      
                                    }
                             $sql.="GROUP BY dr_number, group_name";

                            }
                  
                      } 

                      elseif ($strto=="" && $strfrom!="") 
                      {
                        # code... condition above is whenver 

                        if ($search!="") 
                        {

                            # code...
                            $sql="SELECT * FROM mis_dr_assigned WHERE (dr_number LIKE '%$search%' OR group_name LIKE '%$search%')
                            AND (dr_date = '$strfrom')";
                            if($drdatatype=="UNASSIGNED DR")
                            {
                                $sql.=" AND (dr_number IS NULL OR dr_number ='') ";
                            }
                            else if ($drdatatype=="ASSIGNED DR")
                            {
                                $sql.=" AND (group_name IS NULL OR group_name ='') ";      
                            }
                            $sql.="GROUP BY dr_number, group_name";
                            
                        }
                        else
                        {
                            $sql="SELECT * FROM mis_dr_assigned WHERE (dr_date='$strfrom')";
                            if($drdatatype=="UNASSIGNED DR")
                            {
                                $sql.=" AND (dr_number IS NULL OR dr_number ='') ";
                            }
                            else if ($drdatatype=="ASSIGNED DR")
                            {
                                $sql.=" AND (group_name IS NULL OR group_name ='') ";      
                            }
                            $sql.="GROUP BY dr_number, group_name";
                            
                        }
                             
                      }

                      elseif($strfrom!="" && $strto!="")
                      {
                        if ($search!="") 
                        {
                            # code...

                            $sql="SELECT * FROM mis_dr_assigned WHERE (dr_number LIKE '%$search%' OR group_name LIKE '%$search%')
                            AND (dr_date BETWEEN '$strfrom' AND '$strto')";
                            if($drdatatype=="UNASSIGNED DR")
                            {
                                $sql.=" AND (dr_number IS NULL OR dr_number ='') ";
                            }
                            else if ($drdatatype=="ASSIGNED DR")
                            {
                                $sql.=" AND (group_name IS NULL OR group_name ='') ";      
                            }
                            $sql.="GROUP BY dr_number, group_name";
                        
                        }
                        else
                        {

                            $sql="SELECT * FROM mis_dr_assigned WHERE (dr_date BETWEEN '$strfrom' AND '$strto')";
                            if($drdatatype=="UNASSIGNED DR")
                            {
                                $sql.=" AND (dr_number IS NULL OR dr_number ='') ";
                            }
                            else if ($drdatatype=="ASSIGNED DR")
                            {
                                $sql.=" AND (group_name IS NULL OR group_name ='') ";      
                            }
                            $sql.="GROUP BY dr_number, group_name";
                        
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
    
          $ctr+=1;
          if($row['dr_date']=="")
          {
              $tempdate="No Dr Date";
              $tempdr = "UNASSIGNED DR";
          
          }
          else
          {
              $tempdate = $row['dr_date'];
              $tempdr = $row['dr_number'];
          }
          if($row['group_name']=="")
          {
              $tempgr="No group name";
          
          }
          else
          {
              $tempgr = $row['group_name'];
          }
          
            array_push($datavar,["NO"=> $ctr ,"DR_DATE"=>$tempdate, "DR_NO"=> $tempdr,
            "GROUP_NAME"=>$tempgr]);
      
      
    
    }
    echo json_encode($datavar,true);    
    ?>
  