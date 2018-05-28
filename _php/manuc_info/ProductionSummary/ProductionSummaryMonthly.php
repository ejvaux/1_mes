<?php
 
 include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

echo '
<br>
<table class="table-hover table-bordered nowrap" style="background-color: white;overflow: auto; width: 80%; text-align: center;margin: 0 auto" id="tbl2">
    <thead style=" color:black;font-size: 14px;">
      <tr>
        <th  style="text-align: center;border: 1px solid #ddd;">DATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM NAME</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PROD PLAN</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PROD RESULT</th>
        <th  style="text-align: center;border: 1px solid #ddd;">GAP</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ACHIEVEMENT RATE</th>
      </tr>
    </thead>
    <tbody>';

    $strfrom = $_POST['sortfrom'];
    $strto = $_POST['sortto'];
    $search = $_POST['search'];
if ($strfrom!="") {

  

                                                      if ($strto == "" && $strfrom=="") 
                                                      {
                                                         #code... condition above is whenever both date range are null
                                                                $sqlprodresult="SELECT PRINT_QTY from mis_product WHERE ITEM_NAME = '$search'";
                                                                $sqlprodplan="SELECT PLAN_QTY from mis_prod_plan_dl WHERE ITEM_NAME = '$search'";
                                                                /* $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
                                                                FROM mis_product 
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE mis_product.ITEM_NAME = '$search' 
                                                                GROUP BY `ITEM_NAME`, DATE_"; */

                                                                $sqlitem="SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME,
                                                                 mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
                                                                FROM mis_product
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE mis_product.ITEM_NAME = '$search' 
                                                                GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_
                                                                UNION ALL
                                                                SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
                                                                FROM mis_prod_plan_dl
                                                                WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (ITEM_NAME = '$search')
                                                                ORDER BY `PLAN_QTY` ASC";

                                                                $between="NO";
                                                          
                                                                $datenow="";
                                                      } 

                                                      elseif ($strto=="" && $strfrom!="") 
                                                      {
                                                        # code... condition above is whenver from is set

                                                              if ($search!="") 
                                                              {
                                                                # code... if from and search is set
                                                                $month1=date('m', strtotime($strfrom));
                                                                $year1=date('Y', strtotime($strfrom));
                                                                $month2=date('m', strtotime($strto));
                                                                $year2=date('Y', strtotime($strto));
                                                                $date1=date('Y-m-d', strtotime($year1."-".$month1."01"));
                                                                $date2=date('Y-m-d', strtotime($year2."-".$month2."01"));

                                                                $sqlprodresult="SELECT PRINT_QTY from mis_product WHERE (ITEM_NAME = '$search') 
                                                                AND  (MONTH(DATE_)='$month1' AND YEAR(DATE_)='$year1')";
                                                                $sqlprodplan="SELECT PLAN_QTY from mis_prod_plan_dl WHERE (ITEM_NAME = '$search') 
                                                                AND (MONTH(DATE_)='$month1' AND YEAR(DATE_)='$year1')";
                                                                /* $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
                                                                FROM mis_product 
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE (MONTH(mis_product.DATE_)='$month1' AND YEAR(mis_product.DATE_)='$year1')
                                                                 AND (mis_product.ITEM_NAME = '$search') 
                                                                 GROUP BY `ITEM_NAME`"; */

                                                                 
                                                                $sqlitem="SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME,
                                                                 mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
                                                                FROM mis_product
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE (MONTH(mis_product.DATE_)='$month1' AND YEAR(mis_product.DATE_)='$year1') 
                                                                AND (mis_product.ITEM_NAME = '$search')
                                                                GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_
                                                                UNION ALL
                                                                SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
                                                                FROM mis_prod_plan_dl
                                                                WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) 
                                                                AND (MONTH(DATE_)='$month1' AND YEAR(DATE_)='$year1')
                                                                AND (ITEM_NAME = '$search')
                                                                ORDER BY `PLAN_QTY` ASC";
                                                          
                                                                 $datenow=$strfrom;
                                                                 $between="NO";
                                                         
                                                              }

                                                              else
                                                              {
                                                                #if date from only is set
                                                                $month1=date('m', strtotime($strfrom));
                                                                $year1=date('Y', strtotime($strfrom));
                                                                $month2=date('m', strtotime($strto));
                                                                $year2=date('Y', strtotime($strto));
                                                                $date1=date('Y-m-d', strtotime($year1."-".$month1."01"));
                                                                $date2=date('Y-m-d', strtotime($year2."-".$month2."01"));

                                                                $sqlprodresult="SELECT PRINT_QTY from mis_product WHERE MONTH(DATE_)='$month1' AND YEAR(DATE_)='$year1'";
                                                                $sqlprodplan="SELECT PLAN_QTY from mis_prod_plan_dl WHERE  MONTH(DATE_)='$month1' AND YEAR(DATE_)='$year1'";
                                                                /* $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
                                                                FROM mis_product 
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE MONTH(mis_product.DATE_)='$month1' AND YEAR(mis_product.DATE_)='$year1' 
                                                                GROUP BY `ITEM_NAME`"; */

                                                                $sqlitem="SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME, 
                                                                mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
                                                                FROM mis_product
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE (MONTH(mis_product.DATE_)='$month1' AND YEAR(mis_product.DATE_)='$year1') 
                                                                GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_
                                                                UNION ALL
                                                                SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
                                                                FROM mis_prod_plan_dl
                                                                WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (MONTH(DATE_)='$month1' AND YEAR(DATE_)='$year1')";


                                                                $sqltotalgraph="SELECT mis_product.PRINT_QTY, mis_prod_plan_dl.PLAN_QTY from mis_product
                                                                LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                                                                WHERE mis_product.DATE_ = '$strfrom'";
                                                          
                                                                $datenow=$strfrom;
                                                                $between="NO";
                                                          
                                                              }
                                                             
                                                      }

                                                  else{
                                                    #if both date range are NOT null
                                                              if ($search!="") 
                                                              {
                                                                # code... whenever date range are NOT null and Search is NOT null


                                                                $month1=date('m', strtotime($strfrom));
                                                                $year1=date('Y', strtotime($strfrom));
                                                                $month2=date('m', strtotime($strto));
                                                                $year2=date('Y', strtotime($strto));
                                                                $date1=date('Y-m-d', strtotime($year1."-".$month1."01"));
                                                                $date2=date('Y-m-d', strtotime($year2."-".$month2."01"));

                                                                $sqlprodresult="SELECT PRINT_QTY from mis_product WHERE (DATE_ BETWEEN '$strfrom' AND '$strto') AND (ITEM_NAME = '$search')";
                                                                $sqlprodplan="SELECT PLAN_QTY from mis_prod_plan_dl WHERE (DATE_ BETWEEN '$strfrom' AND '$strto') AND (ITEM_NAME = '$search')";
                                                                /* $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
                                                                FROM mis_product 
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE (MONTH(mis_product.DATE_) BETWEEN '$month1' AND '$month2') 
                                                                AND (YEAR(mis_product.DATE_)='$year1' OR YEAR(mis_product.DATE_)='$year2' ) 
                                                                AND (mis_product.ITEM_NAME = '$search') 
                                                                GROUP BY `ITEM_NAME`,DATE_  ORDER BY DATE_ ASC"; */

                                                                $sqlitem="SELECT * FROM (SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME,
                                                                 mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
                                                                FROM mis_product
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE (MONTH(mis_product.DATE_) BETWEEN '$month1' AND '$month2') 
                                                                AND (YEAR(mis_product.DATE_)='$year1' OR YEAR(mis_product.DATE_)='$year2' ) 
                                                                AND (mis_product.ITEM_NAME = '$search') 
                                                                GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_) as A
                                                                UNION ALL
                                                                SELECT * FROM (
                                                                SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
                                                                FROM mis_prod_plan_dl
                                                                WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) 
                                                                AND  (MONTH(DATE_) BETWEEN '$month1' AND '$month2') 
                                                                AND (YEAR(DATE_)='$year1' OR YEAR(DATE_)='$year2' ) 
                                                                AND (ITEM_NAME = '$search') ) as B
                                                                ORDER BY DISP_DATE_ ASC";


                                                          
                                                                $datenow=$strfrom." to ".$strto;
                                                                $between="YES-SEARCH";
                                                                $currentdate=date("Y-m-d",strtotime($strfrom));
                                                          

                                                              }
                                                              else
                                                              {
                                                                #if both date range are not null while search is NULL


                                                                $month1=date('m', strtotime($strfrom));
                                                                $year1=date('Y', strtotime($strfrom));
                                                                $month2=date('m', strtotime($strto));
                                                                $year2=date('Y', strtotime($strto));
                                                                $date1=date('Y-m-d', strtotime($year1."-".$month1."01"));
                                                                $date2=date('Y-m-d', strtotime($year2."-".$month2."01"));


                                                                $sqlprodresult="SELECT PRINT_QTY 
                                                                from mis_product 
                                                                WHERE (MONTH(DATE_) BETWEEN '$month1' AND '$month2') 
                                                                AND (YEAR(DATE_)='$year1' OR YEAR(DATE_)='$year2' )";

                                                                $sqlprodplan="SELECT PLAN_QTY from mis_prod_plan_dl 
                                                                WHERE 
                                                                (MONTH(DATE_) BETWEEN '$month1' AND '$month2') 
                                                                AND (YEAR(DATE_)='$year1' OR YEAR(DATE_)='$year2' )";

                                                               /*  $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
                                                                FROM mis_product 
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE (MONTH(mis_product.DATE_) BETWEEN '$month1' AND '$month2') 
                                                                AND (YEAR(mis_product.DATE_)='$year1' 
                                                                OR YEAR(mis_product.DATE_)='$year2' )
                                                                GROUP BY `ITEM_NAME`,DATE_ ORDER BY DATE_ ASC"; */

                                                                $sqlitem="SELECT * FROM (SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME,
                                                                 mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
                                                                FROM mis_product
                                                                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                                                                WHERE (MONTH(mis_product.DATE_) BETWEEN '$month1' AND '$month2') 
                                                                AND (YEAR(mis_product.DATE_)='$year1' 
                                                                OR YEAR(mis_product.DATE_)='$year2' )
                                                                GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_) as A 
                                                                UNION ALL
                                                                SELECT * FROM (
                                                                SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
                                                                FROM mis_prod_plan_dl
                                                                WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) 
                                                                AND (MONTH(DATE_) BETWEEN '$month1' AND '$month2') 
                                                                AND (YEAR(DATE_)='$year1' 
                                                                OR YEAR(DATE_)='$year2' )
                                                                AND (YEAR(DATE_)='$year1' OR YEAR(DATE_)='$year2' ) ) as B
                                                                ORDER BY DISP_DATE_ ASC";
                                                          
                                                                $datenow=$strfrom." to ".$strto;
                                                                $between="YES";
                                                                $currentdate=date("Y-m-d",strtotime($strfrom));
                                                                
                                                   
                                                              }



                                                      }
                                        
                                      

                                    }
                                 else
                                    {

                                                #if date range and search is null

                                                          $sqlprodresult="SELECT PRINT_QTY from mis_product";
                                                          $sqlprodplan="SELECT PLAN_QTY from mis_prod_plan_dl";
                                                          $sqlitem="SELECT SUM(`mis_product.PRINT_QTY`)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY
                                                          LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO FROM mis_product GROUP BY `ITEM_NAME` ";

                                                          $datenow="NONE";
                                                          $between="NO";
                                                          

                                    }

                                                $conn2 = mysqli_connect("localhost","root","","masterdatabase");

                                                $result=$conn->query($sqlprodresult);
                                                $result2=$conn->query($sqlprodplan);

                                                      	
                                                $prodresult1=0;
                                                		while($row2=$result->fetch_assoc())
                                                      	{
                                                           $prodresult1=$prodresult1+$row2['PRINT_QTY'];     
                                                      	}
                                                $prodplan1=0;
                                                    while($row2=$result2->fetch_assoc())
                                                        {
                                                           $prodplan1=$prodplan1+$row2['PLAN_QTY'];     
                                                        }     

                                                 if ($prodplan1<$prodresult1) 
                                                        {
                                                          # code...
                                                            $gap="+";
                                                            $gap.=$prodresult1-$prodplan1;
                                                            
                                                        }
                                                 else
                                                        {
                                                              $gap="-";
                                                     
                                                              $gap.=$prodplan1-$prodresult1;

                                                        }

                                                 if ($prodplan1>0) 
                                                        {

                                                          $achieveresult=(($prodresult1/$prodplan1)*100);

                                                          $achievepercent=round($achieveresult,2);
                                                            # code...

                                                        }
                                                  else
                                                        {
                                                         $achievepercent= 0;

                                                        }

                                    if ($datenow=="NONE") 
                                          {
                                            # code...
                                            echo "<tr>";
                                            echo "<td style='border: 1px solid #ddd; height: 100px; font-size: 2em' colspan='6'>'PLEASE SELECT A DATE OR AN ITEM TO DISPLAY'</td>";
                                            echo "</tr>";
                                          }
                                    else
                                          {
                                            $temp1=date("F Y",strtotime($strfrom));
                                            if ($_POST['sortto']!="") 
                                            {
                                              # code...

                                            $temp2=date("F Y",strtotime($strto));
                                            $temp2= strtoupper($temp2);
                                            $temp2=" TO ".$temp2;
                                            }

                                            else
                                            {
                                              $temp2="";
                                            }

                                            $temp1= strtoupper($temp1);

                                            echo "<tr style='font-size: 2em'>";
                                            echo "<td style='border: 1px solid #ddd; height: 100px;' colspan='2'> <b>TOTAL SUMMARY FROM ".$temp1.$temp2."</b></td>";
                                            #echo "<td style='border: 1px solid #ddd;'>-</td>";
                                            echo "<td style='border: 1px solid #ddd;'><b>".$prodplan1."</b></td>";
                                            echo "<td style='border: 1px solid #ddd;'><b>".$prodresult1."<b></td>";
                                            echo "<td style='border: 1px solid #ddd;'><b>".$gap."<b></td>";
                                            echo "<td style='border: 1px solid #ddd;'><b>".$achievepercent."% <b></td>";
                                            echo "</tr>";

                                            $result3=$conn->query($sqlitem);
                                            
                                            while($row3=$result3->fetch_assoc())
                                            {


                                                  if ($row3['PLAN_QTY']<$row3['sumresult']) 
                                                  {
                                                  # code...
                                                    $gap="+";
                                                    $gap.=$row3['sumresult']-$row3['PLAN_QTY'];
                                                    
                                                  }
                                                
                                                  elseif ($row3['PLAN_QTY']==$row3['sumresult']) 
                                                  {
                                                    # code...
                                                    $gap="";
                                                    $gap.=$row3['PLAN_QTY']-$row3['sumresult'];
                                              
                                                  }
                                                  else
                                                  {
                                                    $gap="-";
                                                    $gap.=$row3['PLAN_QTY']-$row3['sumresult'];

                                                  }

                                                  if ($row3['PLAN_QTY']>0) 
                                                  {
                                                      $achieveresult=(($row3['sumresult']/$row3['PLAN_QTY'])*100);

                                                      $achievepercent=round($achieveresult,2);
                                                        # code...

                                                  }
                                                  else
                                                  {
                                                    $achievepercent= 0;
                                                  }


                                                  if ($between=="YES") 
                                                  {
                                                    # code...

                                                    $temp=$row3['DISP_DATE_'];
                                                 

                                                    $month1=date('m', strtotime($temp));
                                                    $year1=date('Y', strtotime($temp));
                                                   
                                                 
                                                    $sqlresultbetween="SELECT SUM(PRINT_QTY) as prodresult2, DATE_ FROM mis_product WHERE MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."' ORDER BY DATE_ ASC";
                                                        
                                                      $resultbet = $conn->query($sqlresultbetween);
                                                      while ($row=$resultbet->fetch_assoc()) 
                                                      {
                                                          # code...
                                                  
                                                          $sqlplanbetween="SELECT SUM(PLAN_QTY) as planqty2 FROM mis_prod_plan_dl mis_product WHERE MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."' ORDER BY DATE_ ASC";


                                                          $planbet=$conn2->query($sqlplanbetween);

                                                          while ($row2=$planbet->fetch_assoc()) 
                                                          {
                                                             # code...
                                                             
                                                             $row3Month = date("m",strtotime($row3['DISP_DATE_']));
                                                             $currentMonth = date("m",strtotime($currentdate));
                                                   
                                                               if ($row3Month>=$currentMonth) 
                                                               {
                                                                      # code...
                                                                    $currentdate=$row3['DISP_DATE_'];

                                                                    if (isset($prevdate)) 
                                                                    {
                                                                      # code...
                                                                      if ($prevdate==$currentMonth) 
                                                                      {
                                                                        # code... do nothing
                                                                      }
                                                                      else
                                                                      {
                                                                        $prevdate=$currentMonth;
                                                                        DisplaySummaryMonth($row2['planqty2'],$row['prodresult2'],$row3['DISP_DATE_']);
                                                                        }


                                                                    }
                                                                    else
                                                                    {
                                                                        $prevdate = $currentMonth;
                                                                      
                                                                          DisplaySummaryMonth($row2['planqty2'],$row['prodresult2'],$row3['DISP_DATE_']);

                                                                    }
                                                                      # code...
                                                                     

                                                               }        
                                                               else
                                                               {
                                                                 #echo $currentdate;
                                                                 #$hold=date('Y-m-d', strtotime($currentdate.'+1 month'));
                                                                 #$currentdate=$hold;

                                                               } 

                                                          }

                                                      }  

                                                  }
                                                   elseif ($between=="YES-SEARCH") 
                                                  {
                                                    # code...

                                                    $temp=$row3['DISP_DATE_'];
                                                 

                                                    $month1=date('m', strtotime($temp));
                                                    $year1=date('Y', strtotime($temp));
                                                    
                                                    

         
                                                 
                                                    $sqlresultbetween="SELECT SUM(PRINT_QTY) as prodresult2, DATE_ FROM mis_product 
                                                    WHERE (ITEM_NAME='".$row3['ITEM_NAME']."') AND (MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."')";
                                                        
                                                      $resultbet = $conn->query($sqlresultbetween);
                                                      while ($row=$resultbet->fetch_assoc()) 
                                                      {
                                                          # code...
                                                  
                                                          $sqlplanbetween="SELECT SUM(PLAN_QTY) as planqty2 FROM mis_prod_plan_dl mis_product 
                                                          WHERE (ITEM_NAME='".$row3['ITEM_NAME']."') AND (MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."')";


                                                          $planbet=$conn2->query($sqlplanbetween);
                                                          while ($row2=$planbet->fetch_assoc()) 
                                                          {
                                                             # code...
                                                             
                                                             $row3Month = date("m",strtotime($row3['DISP_DATE_']));
                                                             $currentMonth = date("m",strtotime($currentdate));
                                                   
                                                               if ($row3Month>=$currentMonth) 
                                                               {
                                                                      # code...
                                                                    $currentdate=$row3['DISP_DATE_'];

                                                                    if (isset($prevdate)) 
                                                                    {
                                                                      # code...
                                                                      if ($prevdate==$currentMonth) 
                                                                      {
                                                                        # code... do nothing
                                                                      }
                                                                      else
                                                                      {
                                                                        $prevdate=$currentMonth;
                                                                        DisplaySummaryMonth($row2['planqty2'],$row['prodresult2'],$row3['DISP_DATE_']);
                                                                        }


                                                                    }
                                                                    else
                                                                    {
                                                                        $prevdate = $currentMonth;
                                                                      
                                                                          DisplaySummaryMonth($row2['planqty2'],$row['prodresult2'],$row3['DISP_DATE_']);

                                                                    }
                                                                      # code...
                                                                     

                                                               }        
                                                               else
                                                               {
                                                                 #echo $currentdate;
                                                                 #$hold=date('Y-m-d', strtotime($currentdate.'+1 month'));
                                                                 #$currentdate=$hold;

                                                               } 

                                                          }

                                                      }  

                                                  }
                                                  else if($between=="NO")
                                                  {

                                                  }

                                                      echo "<tr style='font-size:1.2em'>";
                                                      echo "<td style='border: 1px solid #ddd;'>".$row3['DISP_DATE_']."</td>";
                                                      echo "<td style='border: 1px solid #ddd;'>".$row3['ITEM_NAME']. "</td>";
                                                      echo "<td style='border: 1px solid #ddd;'>".$row3['PLAN_QTY']."</td>";
                                                      echo "<td style='border: 1px solid #ddd;'>".$row3['sumresult']."</td>";
                                                      echo "<td style='border: 1px solid #ddd;'>".$gap."</td>";
                                                      echo "<td style='border: 1px solid #ddd;'>".$achievepercent."% </td>";
                                                      echo "</tr>";
                                                 

                                            }

                                          }



  function DisplaySummaryMonth($funcPlan,$funcResult,$funcDate)
  {
  

     if ($funcPlan<$funcResult) 
     {
         # code...
         $gapperday="+";
         $gapperday.=$funcResult-$funcPlan;
                                                                    
     }
     elseif ($funcPlan==$funcResult) 
     {
         # code...
         $gapperday="";
         $gapperday.=$funcPlan-$funcResult;
     }
     else
     {
         $gapperday="-";
         $gapperday.=$funcPlan-$funcResult;

     }

     if ($funcPlan>0) 
     {
        $achieveresultperday=(($funcResult/$funcPlan)*100);
         $achievepercentperday=round($achieveresultperday,2);
         # code...

    }
     else
     {
       $achievepercentperday= 0;
     }

        $tempMonth=date("F",strtotime($funcDate));
        $tempYear=date("Y",strtotime($funcDate));

        echo "<tr style='font-size:1.2em'>";
        echo "<td colspan='2'> <b>Total Prod Plan Vs Result of : ".$tempMonth." ".$tempYear."</b></td>";
                                                                  
        echo "<td><b>".$funcPlan."</b></td>";
        echo "<td><b>".$funcResult."</b></td>";
        echo "<td><b>".$gapperday."</b></td>";
        echo "<td><b>".$achievepercentperday."% </b></td>";
        echo "</tr>";

     


  }                                        

  echo '</tbody></table><br><br>';

?>