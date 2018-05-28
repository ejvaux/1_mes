<?php
 
#$datavar = array();

#array_push($datavar,array("name"=> "Oli Bob" ,"age"=>"12","col"=> "red" ,"dob"=>"",));
#array_push($datavar,array("name"=> "Mary Mae" ,"age"=>"1","col"=> "blue" ,"dob"=>"14/05/1982",));
#array_push($datavar,array("name"=> "Christine Lobowski" ,"age"=>"42","col"=> "green" ,"dob"=>"22/05/1982",));
#array_push($datavar,array("name"=> "Brendon Philips" ,"age"=>"125","col"=> "orange" ,"dob"=>"04/30/2018",));


        include '1_MES_DB.php';

$url=$_SERVER['REQUEST_URI'];
$strIndex=strrpos($url, "=");
$str=substr($url, $strIndex+1);


if (isset($_GET['PlanType'])) {
  # code...
  $PlanType=$_GET['PlanType'];
}


         if(strpos($url, 'sortfrom=')!==false)
          {
                
                    $strfrom=$_GET['sortfrom'];
                    $strto=$_GET['sortto'];
                    $search=$_GET['search'];

                    if ($strto == "" && $strfrom=="") 
                    {
                                 # code... condition above is whenever both date range are null
                    $sql="SELECT mis_product.*, dmc_item_list.MODEL 
                    FROM `mis_product`
                    LEFT JOIN dmc_item_list on mis_product.ITEM_CODE = dmc_item_list.ITEM_CODE 
                    LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                    LEFT JOIN dmc_customer ON mis_product.CUST_CODE = dmc_customer.CUSTOMER_CODE
                    WHERE (mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or mis_product.PRINT_DATE LIKE '%$search%' 
                    or mis_product.ITEM_CODE LIKE '%$search%' or mis_product.ITEM_NAME LIKE '%$search%' or mis_product.JO_NUM LIKE '%$search%'
                     or mis_product.TOOL_NUM LIKE '%$search%' or dmc_item_list.MODEL LIKE '%$search%') 
                     AND (dmc_customer.DIVISION_CODE = '$PlanType') 
                    ORDER BY mis_product.PRINT_DATE DESC";  
                    } 

                    elseif ($strto=="" && $strfrom!="") 
                    {
                                # code... condition above is whenver 

                                      if ($search!="") 
                                      {
                                        # code...
                                         $sql="SELECT mis_product.*, dmc_item_list.MODEL 
                                         FROM `mis_product`
                                        LEFT JOIN dmc_item_list on mis_product.ITEM_CODE = dmc_item_list.ITEM_CODE 
                                        LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                                        LEFT JOIN dmc_customer ON mis_product.CUST_CODE = dmc_customer.CUSTOMER_CODE
                                        WHERE (mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or mis_product.PRINT_DATE LIKE '%$search%' 
                                        or mis_product.ITEM_CODE LIKE '%$search%' or mis_product.JO_NUM LIKE '%$search%' 
                                        or mis_product.ITEM_NAME LIKE '%$search%' or mis_product.TOOL_NUM LIKE '%$search%' 
                                        or dmc_item_list.MODEL LIKE '%$search%') 
                                        AND (mis_product.DATE_ = '$strfrom') AND (dmc_customer.DIVISION_CODE = '$PlanType')
                                        ORDER BY mis_product.PRINT_DATE DESC";


                                      }

                                      else
                                      {
                                           $sql="SELECT mis_product.*, dmc_item_list.MODEL
                                           FROM `mis_product`
                                           LEFT JOIN dmc_item_list on mis_product.ITEM_CODE = dmc_item_list.ITEM_CODE
                                           LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                                           LEFT JOIN dmc_customer ON mis_product.CUST_CODE = dmc_customer.CUSTOMER_CODE
                                           WHERE mis_product.DATE_ = '$strfrom' AND dmc_customer.DIVISION_CODE = '$PlanType'
                                           ORDER BY mis_product.PRINT_DATE DESC";
                                 
                                      }
                                     
                    }

                    else
                    {
                                      
                           if ($search!="") 
                           {
                                        # code...

                                         $sql="SELECT mis_product.*, dmc_item_list.MODEL
                                         FROM `mis_product`
                                         LEFT JOIN dmc_item_list on mis_product.ITEM_CODE = dmc_item_list.ITEM_CODE
                                         LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                                         LEFT JOIN dmc_customer ON mis_product.CUST_CODE = dmc_customer.CUSTOMER_CODE                                 
                                         WHERE ( mis_prod_plan_dl.MACHINE_CODE LIKE '%$search%' or 
                                         mis_product.PRINT_DATE LIKE '%$search%' or mis_product.ITEM_CODE LIKE '%$search%' 
                                         or mis_product.ITEM_NAME LIKE '%$search%' or mis_product.JO_NUM LIKE '%$search%' 
                                         or mis_product.TOOL_NUM LIKE '%$search%' or dmc_item_list.MODEL LIKE '%$search%') 
                                         AND (mis_product.DATE_ BETWEEN '$strfrom' AND '$strto') 
                                         AND (dmc_customer.DIVISION_CODE = '$PlanType')
                                         ORDER BY mis_product.PRINT_DATE DESC";

                                          

                            }

                            else
                            {
                                         $sql="SELECT mis_product.*, dmc_item_list.MODEL
                                         FROM `mis_product`
                                         LEFT JOIN dmc_item_list on mis_product.ITEM_CODE = dmc_item_list.ITEM_CODE
                                         LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                                         LEFT JOIN dmc_customer ON mis_product.CUST_CODE = dmc_customer.CUSTOMER_CODE
                                        WHERE (dmc_customer.DIVISION_CODE = '$PlanType') 
                                        AND (mis_product.DATE_ BETWEEN '$strfrom' AND '$strto') 
                                        ORDER BY mis_product.PRINT_DATE DESC";
         
                            }



                    }
                
              

          }
          
          else
          {
                            
                                        $sql="SELECT mis_product.*, dmc_item_list.MODEL 
                                        FROM `mis_product`
                                        LEFT JOIN dmc_item_list on mis_product.ITEM_CODE = dmc_item_list.ITEM_CODE
                                        LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                                        LEFT JOIN dmc_customer ON mis_product.CUST_CODE = dmc_customer.CUSTOMER_CODE
                                        WHERE dmc_customer.DIVISION_CODE = 'PTPI001' ORDER BY mis_product.PRINT_DATE DESC";


          }


              $result=$conn->query($sql);
              $result2=$conn->query($sql);
                    	
            if(!$row3=$result2->fetch_assoc())
            {

              #echo "<td colspan='12' style='text-align: center'><b>FILTER RESULT:</b> '<i>No Records to Display</i>'";
              #echo "<br> <a href='PrintStatus.php' style='text-decoration: underline; font-weight: bold'>View All Data</a>";
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
                  $temp_date = date("d M Y H:i:s",strtotime($row['PRINT_DATE']));
               

              		
                  	#echo "<td  style='text-align:center;padding:5px' class='hide-from-printer' ><input type='button' name='view' value='VIEW' id='".$row['NO']."' class='btn btn-outline-info btn-sm view_data' /></td>";
              		#echo "<td style='border: 1px solid #ddd; '>".$ctr."</td>";
                  	#echo "<td style='border: 1px solid #ddd;'>".$row['JO_NUM']."</td>";
              		#echo "<td style='border: 1px solid #ddd;'>".$row['JO_BARCODE']."</td>";
              		#echo "<td style='border: 1px solid #ddd;'>".$temp_date."</td>";
              		#echo "<td style='border: 1px solid #ddd;'>".$row['ITEM_CODE']."</td>";
              		#echo "<td style='border: 1px solid #ddd;'>".$row['ITEM_NAME']."</td>";
                  	#echo "<td style='border: 1px solid #ddd;'>".$row['MODEL']."</td>";
                  

              		#echo "<td style='border: 1px solid #ddd;'>".$row['PRINT_QTY']."</td>";
                  	#echo "<td style='border: 1px solid #ddd;'>".$row['MACHINE_CODE']."</td>";
              		#echo "<td style='border: 1px solid #ddd;'>".$row['TOOL_NUM']."</td>";
              		#echo "<td style='border: 1px solid #ddd;'>".$row['PACKING_NUMBER']."</td>";
              		#echo "<td style='border: 1px solid #ddd;'>".$temp_date."</td>";
              		#echo "<td style='border: 1px solid #ddd;'>".$row['PRINTED_BY'];

              		

					array_push($datavar,array("NO"=> $ctr ,"JO NO"=>$row['JO_NUM'], "SERIAL PRINT"=> $row['JO_BARCODE'] ,
						"PROD DATE"=>$temp_date,"ITEM CODE"=>$row['ITEM_CODE'],"ITEM NAME"=>$row['ITEM_NAME'],"MODEL"=>$row['MODEL'],
						"PRINT QTY"=>$row['PRINT_QTY'],"MACHINE CODE"=>$row['MACHINE_CODE'],"TOOL NO"=>$row['TOOL_NUM'],"PACKING NUMBER"=>$row['PACKING_NUMBER']
						,"PRINT TIME"=>$temp_date,"PRINTED BY"=>$row['PRINTED_BY'] ));

					#array_push($datavar,array("name"=> "Mary Mae" ,"age"=>"1","col"=> "blue" ,"dob"=>"14/05/1982",));
					#array_push($datavar,array("name"=> "Christine Lobowski" ,"age"=>"42","col"=> "green" ,"dob"=>"22/05/1982",));
					#array_push($datavar,array("name"=> "Brendon Philips" ,"age"=>"125","col"=> "orange" ,"dob"=>"04/30/2018",));
					            


                 
              }


            }





?>