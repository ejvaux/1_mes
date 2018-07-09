<?php



include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

if(isset($_POST['sortfrom']))
{
	$strfrom = $_POST['sortfrom'];
	$strto = $_POST['sortto'];
	$sorttype = $_POST['sorttype'];
	$search = $_POST['search'];
	$PlanType=$_POST['PlanType'];

	if ($sorttype=="DAILY") 
	{
		# daily...


		if ($strfrom=="" && $strto=="") 
		{
			# search only

			/* 			 $sqlitem="SELECT * FROM (SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, 
			 mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
			 FROM mis_product 
			 LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
			 WHERE mis_product.ITEM_NAME = '$search' AND 
			 ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
			  GROUP BY `ITEM_NAME`,DISP_DATE_) as A
			 UNION ALL 
			 SELECT * FROM (
			 SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
			 FROM mis_prod_plan_dl
			 WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (ITEM_NAME = '$search') AND 
			 (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')) as B
			 ORDER BY DISP_DATE_ ASC"; */

			 $sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
			 mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
			 FROM mis_prod_plan_dl
			 LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM
			 WHERE  (mis_prod_plan_dl.ITEM_NAME = '$search') AND                  
			 ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
			 GROUP BY `ITEM_NAME`, DISP_DATE_";


                       $between="YES";
                    $currentdate=date("Y-m-d",strtotime($strfrom));
                       $datenow="";
		}
		elseif ($strfrom!="" && $strto=="") 
		{
			# from without to

			if ($search!="") 
			{
				# from without to with search
				  /* $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, 
				  mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
				  FROM mis_product 
				  LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
				  WHERE mis_product.ITEM_NAME = '$search' AND 
				  ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				  AND mis_prod_plan_dl.DATE_='$strfrom' 
				  GROUP BY `ITEM_NAME`, DISP_DATE_ 
				  ORDER BY DISP_DATE_ ASC"; */

				  $sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
				  mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
				  FROM mis_prod_plan_dl
				  LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM
				  WHERE (mis_product.ITEM_NAME = '$search' OR mis_prod_plan_dl.ITEM_NAME='$search') AND  
				  (mis_prod_plan_dl.DATE_='$strfrom' OR mis_prod_plan_dl.DATE_= '$strfrom') AND                 
				  ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				  GROUP BY ITEM_NAME";


                          
                                 $datenow=$strfrom;
                                 $between="NO";
                                    $currentdate=date("Y-m-d",strtotime($strfrom));
			}
			else
			{
				#from without to and search
/* 				 $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME,
				  mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
				 FROM mis_product 
				 LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
				 WHERE mis_prod_plan_dl.DATE_='$strfrom' AND 
				 ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				  GROUP BY `ITEM_NAME`, DISP_DATE_"; */


/* 				  $sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
				mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
				FROM mis_prod_plan_dl
				LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM
				WHERE (mis_prod_plan_dl.DATE_='$strfrom' OR mis_prod_plan_dl.DATE_= '$strfrom') AND                 
				((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				GROUP BY `ITEM_NAME`, DISP_DATE_"; */
								  $sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
								  mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
								  FROM mis_prod_plan_dl
								  LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM
								  WHERE  
								  (mis_prod_plan_dl.DATE_='$strfrom' OR mis_prod_plan_dl.DATE_= '$strfrom') AND                 
								  ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
								  GROUP BY ITEM_NAME";

				$datenow=$strfrom;
                $between="DATEONLY";
                $currentdate=date("Y-m-d",strtotime($strfrom));
			}
		}
		else
		{
			#date range. both dates have value

			if ($search!="")
			{
				# daterange with search
		/* 		 $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME,
				  mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
				 FROM mis_product 
				 LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
				 WHERE (mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto') AND (mis_product.ITEM_NAME='$search') AND
				  ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				 GROUP BY `ITEM_NAME`, DISP_DATE_ ORDER BY DISP_DATE_ ASC";
 */
/* 
				$sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
				mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
				FROM mis_prod_plan_dl
				LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM
				WHERE mis_product.ITEM_NAME = '$search' AND 
				((mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto') OR (mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto')) 
				AND                 
				((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				GROUP BY `ITEM_NAME`, DISP_DATE_"; */

				/* $sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
				mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
				FROM mis_prod_plan_dl
				LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM
				WHERE (mis_product.ITEM_NAME = '$search' OR mis_prod_plan_dl.ITEM_NAME='$search') AND  
				((mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto')) 
			 AND ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				GROUP BY ITEM_NAME, DISP_DATE_";
 */
					$sqlitem="SELECT COALESCE(SUM(mis_summarize_results.PROD_RESULT),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
					SUM(mis_prod_plan_dl.PLAN_QTY) as PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
					FROM mis_prod_plan_dl
					LEFT JOIN mis_summarize_results ON mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO
					WHERE 
					((mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto')) AND (mis_prod_plan_dl.ITEM_NAME = '$search')
					AND                 
					((SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
					GROUP BY DISP_DATE_ ORDER BY DISP_DATE_ ASC";



                  $between="YES";
                  $currentdate=date("Y-m-d",strtotime($strfrom));

			}
			else
			{

/* 			  $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, 
			  mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
			  FROM mis_product 
			  LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
			  WHERE mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto' AND
			   ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
			  GROUP BY `ITEM_NAME`, DISP_DATE_ ORDER BY DISP_DATE_ ASC";
 */

				$sqlitem="SELECT COALESCE(SUM(mis_summarize_results.PROD_RESULT),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
				SUM(mis_prod_plan_dl.PLAN_QTY) as PLAN_QTY,mis_prod_plan_dl.DATE_ as DISP_DATE_
				FROM mis_prod_plan_dl
				LEFT JOIN mis_summarize_results ON mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO
				WHERE 
				((mis_prod_plan_dl.DATE_ BETWEEN '$strfrom' AND '$strto'))
				AND                 
				((SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				GROUP BY DISP_DATE_ ORDER BY DISP_DATE_ ASC";

				





                  $between="YES";
                  $currentdate=date("Y-m-d",strtotime($strfrom));

			}
		}


									
								$dataPoints1 = array();
								$dataPoints2 = array();
								$resultsqlitem=$conn->query($sqlitem) or die($conn->error);


								if($between=="NO")
								{




									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										# code...

										$sqlresultsum="SELECT SUM(PRINT_QTY) as prodresult2, DATE_ FROM mis_product 
										WHERE  ITEM_NAME ='".$row['ITEM_NAME']."' AND DATE_='".$row['DISP_DATE_']."' 
										AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')";

										$resultres=$conn->query($sqlresultsum);

											while ($row2=$resultres->fetch_assoc()) 
											{
												# code...
												$sqlplansum="SELECT SUM(PLAN_QTY) as planqty2, DATE_ FROM mis_prod_plan_dl WHERE 
												ITEM_NAME='".$row['ITEM_NAME']."'AND DATE_='".$row['DISP_DATE_']."'
												AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
												$resultplan=$conn->query($sqlplansum);

												while ($row3=$resultplan->fetch_assoc()) 
												{
													# code...
													$res=$row2['prodresult2'];
													$dateres= "".$row['DISP_DATE_'];
													$plan=$row3['planqty2'];
													$dateplan= "".$row['DISP_DATE_'];

													array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
													array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));
										                               
								         			
												}

											}

									}
									

								}
								elseif ($between=="DATEONLY") 
								{
									# code...
									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										# code...

										$sqlresultsum="SELECT SUM(PRINT_QTY) as prodresult2, DATE_,ITEM_NAME FROM mis_product WHERE  
										
										ITEM_NAME ='".$row['ITEM_NAME']."' AND DATE_='".$row['DISP_DATE_']."' AND 
										(SUBSTRING(JO_NUM,1,1)='$PlanType')";

										$resultres=$conn->query($sqlresultsum);

											while ($row2=$resultres->fetch_assoc()) 
											{
												# code...
												$sqlplansum="SELECT SUM(PLAN_QTY) as planqty2, DATE_, ITEM_NAME FROM mis_prod_plan_dl WHERE
												 ITEM_NAME='".$row['ITEM_NAME']."'AND DATE_='".$row['DISP_DATE_']."' 
												 AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
												$resultplan=$conn->query($sqlplansum);

												while ($row3=$resultplan->fetch_assoc()) 
												{
													# code...
													$res=$row2['prodresult2'];
													$dateres= "".$row['DISP_DATE_']." ".$row['ITEM_NAME'];
													$plan=$row3['planqty2'];
													$dateplan= "".$row['DISP_DATE_']." ".$row['ITEM_NAME'];

													array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
													array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));
										                               
								         			
												}

											}

									}
									
								}
								elseif ($between=="YES-Search")
								{
									# code...


									$plan = 0;
									$res = 0;
									$param = date('d', strtotime($strfrom));
									$dateplan = date('Y-F-d', strtotime($strfrom));
									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										
										$temp=$row['DISP_DATE_'];
										$day1=date('d', strtotime($temp));
										$year1=date('Y', strtotime($temp));
				
										$plan=$row['PLAN_QTY'];
										$res=$row['sumresult'];
								
										$dateplan = date('Y-F-d', strtotime($temp));
										array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
										array_push($dataPoints2,array("label"=>"".$dateplan,"y"=>"".$res));

									}







									/* 	while ($row=$resultsqlitem->fetch_assoc()) 
									{
										# code...

										$sqlresultsum="SELECT SUM(PRINT_QTY) as prodresult2, DATE_ FROM mis_product 
										WHERE ITEM_NAME='".$row['ITEM_NAME']."' AND DATE_='".$row['DISP_DATE_']."'
										AND (SUBSTRING(JO_NUM,1,1)='$PlanType')";
										$currentdate=$row['DISP_DATE_'];


										$resultres=$conn->query($sqlresultsum);

											while ($row2=$resultres->fetch_assoc()) 
											{
												# code...
												$sqlplansum="SELECT SUM(PLAN_QTY) as planqty2, DATE_ FROM mis_prod_plan_dl 
												WHERE ITEM_NAME='".$row['ITEM_NAME']."' AND DATE_='".$row['DISP_DATE_']."'
												AND (SUBSTRING(OJB_ORDER_NO,1,1)='$PlanType')";
												$resultplan=$conn->query($sqlplansum);

												while ($row3=$resultplan->fetch_assoc()) 
												{
													# code...


													$res=$row2['prodresult2'];
													$dateres= "".$row['DISP_DATE_'];
													$plan=$row3['planqty2'];
													$dateplan= "".$row['DISP_DATE_'];

													$currentdate=$row['DISP_DATE_'];

														if ($row['DISP_DATE_']>=$currentdate) 
														{

															 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;

														
															  $currentdate=$row3['DATE_'];

                                                              if (isset($prevdate)) 
                                                              {
                                                                	# code...
	                                                                if ($prevdate==$currentdate) 
	                                                                {
	                                                                  # code... do nothing
	                                                                }
	                                                                else
	                                                                {
	                                                                  $prevdate=$currentdate;
	                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
																 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));

	                                                                }


                                                              }
                                                              else
                                                              {
                                                                  $prevdate = $currentdate;
                                                                
                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
															 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));


                                                              }

										                               
								         				}

								         				else
								         				{
								         					 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;

								                           
								                               
								         				}
												}

											}

									} */


								}
								else
								{

									
									$plan = 0;
									$res = 0;
									$param = date('d', strtotime($strfrom));
									$dateplan = date('Y-F-d', strtotime($strfrom));
									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										
										$temp=$row['DISP_DATE_'];
										$day1=date('d', strtotime($temp));
										$year1=date('Y', strtotime($temp));
				
										$plan=$row['PLAN_QTY'];
										$res=$row['sumresult'];
								
										$dateplan = date('Y-F-d', strtotime($temp));
										array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
										array_push($dataPoints2,array("label"=>"".$dateplan,"y"=>"".$res));

									}
									




									/* 	while ($row=$resultsqlitem->fetch_assoc()) 
									{
										# code...

										$sqlresultsum="SELECT SUM(PRINT_QTY) as prodresult2, DATE_ FROM mis_product WHERE
										 DATE_='".$row['DISP_DATE_']."' AND (SUBSTRING(JO_NUM,1,1)='$PlanType')";


										$resultres=$conn->query($sqlresultsum);

											while ($row2=$resultres->fetch_assoc()) 
											{
												# code...
												$sqlplansum="SELECT SUM(PLAN_QTY) as planqty2, DATE_ FROM mis_prod_plan_dl 
												WHERE DATE_='".$row['DISP_DATE_']."' AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
												$resultplan=$conn->query($sqlplansum);

												while ($row3=$resultplan->fetch_assoc()) 
												{
													# code...


													$res=$row2['prodresult2'];
													$dateres= "".$row['DISP_DATE_'];
													$plan=$row3['planqty2'];
													$dateplan= "".$row['DISP_DATE_'];
													

														$currentdate=$row['DISP_DATE_'];

														if ($row['DISP_DATE_']>=$currentdate) 
														{

															 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;

														
															  $currentdate=$row['DISP_DATE_'];

                                                              if (isset($prevdate)) 
                                                              {
                                                                	# code...
	                                                                if ($prevdate==$currentdate) 
	                                                                {
	                                                                  # code... do nothing
	                                                                }
	                                                                else
	                                                                {
	                                                                  $prevdate=$currentdate;
	                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
																 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));

	                                                                }


                                                              }
                                                              else
                                                              {
                                                                  $prevdate = $currentdate;
                                                                
                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
															 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));


                                                              }

										                               
								         				}

								         				else
								         				{
								         					 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;

								                           
								                               
								         				}
												}

											}

										} */

								}

								$response = array_merge($dataPoints1,$dataPoints2);
								echo json_encode(array('datapoints1'=>$dataPoints1,'datapoints2'=>$dataPoints2),JSON_NUMERIC_CHECK);
								#echo json_encode($response,JSON_NUMERIC_CHECK);
								

	}










	else
	{
		#monthly

				if ($strfrom=="" && $strto=="") 
		{
			# search only
		/* 	 $sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME, 
			 SUM(mis_prod_plan_dl.PLAN_QTY) as PLAN_QTY, mis_prod_plan_dl.DATE_ 
			 FROM mis_prod_plan_dl 
			 LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM 
			 WHERE mis_prod_plan_dl.ITEM_NAME = '$search' AND 
			 ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
			 GROUP BY `ITEM_NAME`"; */

			 $sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME,
			  SUM(mis_prod_plan_dl.PLAN_QTY),mis_prod_plan_dl.DATE_ 
			  FROM mis_prod_plan_dl 
			  LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM 
			  WHERE mis_prod_plan_dl.ITEM_NAME = '$search' AND 
			  ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
			   GROUP BY ITEM_NAME,DATE_ ORDER BY DATE_ ASC";

			
                       $between="NO";
                    $currentdate=date("Y-m-d",strtotime("2018-05-01"));
                       $datenow="";
		}
		elseif ($strfrom!="" && $strto=="") 
		{
			# from without to

			if ($search!="") 
			{
				# from without to with search
				 $month1=date('m', strtotime($strfrom));
                                   $year1=date('Y', strtotime($strfrom));
                                   $month2=date('m', strtotime($strto));
                                   $year2=date('Y', strtotime($strto));
                                   $date1=date('Y-m-d', strtotime($year1."-".$month1."01"));
                                   $date2=date('Y-m-d', strtotime($year2."-".$month2."01"));
		/* 		  $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ 
				  FROM mis_product LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
				  WHERE (mis_product.ITEM_NAME = '$search') AND (MONTH(mis_prod_plan_dl.DATE_)='$month1' AND YEAR(mis_prod_plan_dl.DATE_)='$year1')
				  AND ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				  GROUP BY `ITEM_NAME`"; */
				  
			/* 	  $sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0)as sumresult, mis_prod_plan_dl.ITEM_NAME, 
				  SUM(mis_prod_plan_dl.PLAN_QTY),mis_prod_plan_dl.DATE_ 
				  FROM mis_prod_plan_dl
				  LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM 
				  WHERE (mis_prod_plan_dl.ITEM_NAME = '$search') AND 
				  (MONTH(mis_prod_plan_dl.DATE_)='$month1' AND YEAR(mis_prod_plan_dl.DATE_)='$year1') AND
				   ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType')) 
				   GROUP BY `ITEM_NAME"; */

					$sqlitem="SELECT COALESCE(SUM(mis_summarize_results.PROD_RESULT),0) as sumresult,mis_prod_plan_dl.ITEM_NAME,
					SUM(mis_prod_plan_dl.PLAN_QTY) as PLAN_QTY, mis_prod_plan_dl.DATE_ 
					FROM mis_prod_plan_dl
					LEFT JOIN mis_summarize_results ON mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO
					WHERE (mis_prod_plan_dl.ITEM_NAME = '$search') AND
					(MONTH(mis_prod_plan_dl.DATE_)='$month1' AND YEAR(mis_prod_plan_dl.DATE_)='$year1') AND 
					((SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
					GROUP BY mis_prod_plan_dl.ITEM_NAME
					ORDER BY ITEM_NAME ASC";
				  
                                 $datenow=$strfrom;
                                 $between="DATEONLY";
                                 $currentdate=date("Y-m-d",strtotime($strfrom));
			}
			else
			{
				#from without to and search
				$month1=date('m', strtotime($strfrom));
                $year1=date('Y', strtotime($strfrom));
                $month2=date('m', strtotime($strto));
                $year2=date('Y', strtotime($strto));
                $date1=date('Y-m-d', strtotime($year1."-".$month1."01"));
                $date2=date('Y-m-d', strtotime($year2."-".$month2."01"));
				/*  $sqlitem="SELECT SUM(mis_summarize_results.PROD_RESULT)as sumresult, mis_prod_plan_dl.ITEM_NAME, 
				 SUM(mis_prod_plan_dl.PLAN_QTY) as PLAN_QTY,mis_prod_plan_dl.DATE_ 
				 FROM mis_prod_plan_dl 
				 LEFT JOIN mis_summarize_results ON mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO 
				 WHERE MONTH(mis_prod_plan_dl.DATE_)='$month1' AND YEAR(mis_prod_plan_dl.DATE_)='$year1' AND 
				  (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType')
				 GROUP BY `ITEM_NAME`"; */

				$sqlitem="SELECT COALESCE(SUM(mis_summarize_results.PROD_RESULT),0) as sumresult,mis_prod_plan_dl.ITEM_NAME,
				SUM(mis_prod_plan_dl.PLAN_QTY) as PLAN_QTY, mis_prod_plan_dl.DATE_ 
				FROM mis_prod_plan_dl
				LEFT JOIN mis_summarize_results ON mis_prod_plan_dl.JOB_ORDER_NO = mis_summarize_results.JOB_ORDER_NO
				WHERE 
				(MONTH(mis_prod_plan_dl.DATE_)='$month1' AND YEAR(mis_prod_plan_dl.DATE_)='$year1') AND 
				((SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				GROUP BY mis_prod_plan_dl.ITEM_NAME
				ORDER BY ITEM_NAME ASC";

				$datenow=$strfrom;
                $between="DATEONLY";
                $currentdate=date("Y-m-d",strtotime($strfrom));
			}
		}
		else
		{
			#date range. both dates have value

			if ($search!="")
			{
				# daterange with search
				 				   $month1=date('m', strtotime($strfrom));
                                   $year1=date('Y', strtotime($strfrom));
                                   $month2=date('m', strtotime($strto));
                                   $year2=date('Y', strtotime($strto));
                                   $date1=date('Y-m-d', strtotime($year1."-".$month1."01"));
                                   $date2=date('Y-m-d', strtotime($year2."-".$month2."01"));
				 $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ 
				 FROM mis_product 
				 LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
				 WHERE (MONTH(mis_prod_plan_dl.DATE_) BETWEEN '$month1' AND '$month2') AND 
				 (YEAR(mis_prod_plan_dl.DATE_)='$year1' OR YEAR(mis_prod_plan_dl.DATE_)='$year2' ) AND (mis_product.ITEM_NAME='$search') AND 
				 ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')  OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
				 GROUP BY `ITEM_NAME`, DATE_ ORDER BY DATE_ ASC";

                  $between="YES-Search";
                  $currentdate=date("Y-m-d",strtotime($strfrom));

			}
			else
			{
				  	  $month1=date('m', strtotime($strfrom));
                      $year1=date('Y', strtotime($strfrom));
                      $month2=date('m', strtotime($strto));
                      $year2=date('Y', strtotime($strto));
                      $date1=date('Y-m-d', strtotime($year1."-".$month1."01"));
                      $date2=date('Y-m-d', strtotime($year2."-".$month2."01"));



                      $sqlitem="SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_prod_plan_dl.DATE_ 
                      FROM mis_product 
                      LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                      WHERE 
                      (MONTH(mis_prod_plan_dl.DATE_) BETWEEN '$month1' AND '$month2') AND 
					  (YEAR(mis_prod_plan_dl.DATE_)='$year1' OR YEAR(mis_prod_plan_dl.DATE_)='$year2' )
					  AND ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
                      GROUP BY `ITEM_NAME`,DATE_ ORDER BY DATE_ ASC";
                                                          
                      $datenow=$strfrom." to ".$strto;
                      $between="YES";
                      $currentdate=date("Y-m-d",strtotime($strfrom));
			}
		}


									
								$dataPoints1 = array();
								$dataPoints2 = array();
								$resultsqlitem=$conn->query($sqlitem);


								if($between=="NO")
								{ 
								

									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										# code...
										$temp=$row['DATE_'];
                                                 

                                        $month1=date('m', strtotime($temp));
                                        $year1=date('Y', strtotime($temp));

										$sqlresultsum="SELECT COALESCE(SUM(PRINT_QTY),0) as prodresult2, DATE_ FROM mis_product WHERE ITEM_NAME='".$row['ITEM_NAME']."' AND (MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."')";

										$resultres=$conn->query($sqlresultsum);

										while ($row2=$resultres->fetch_assoc()) 
										{
											# code...
											$sqlplansum="SELECT SUM(PLAN_QTY) as planqty2, DATE_, ITEM_NAME FROM mis_prod_plan_dl WHERE ITEM_NAME='".$row['ITEM_NAME']."' AND  (MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."')";
											$resultplan=$conn->query($sqlplansum);

											while ($row3=$resultplan->fetch_assoc()) 
												{
													# code...

													$res=$row2['prodresult2'];
													$dateres= "".$row['DATE_'];
													$plan=$row3['planqty2'];
													$dateplan= "".$row['DATE_'];
													$year11 = date('Y',strtotime($dateplan));
													$year22 = date('Y',strtotime($dateres));

 													$dateres=date('F', strtotime($dateres));
                                        			$dateplan=date('F', strtotime($dateplan));
                                        			$dateres=$dateres." ".$year22;
                                        			$dateplan=$dateplan." ".$year11;
 
													

														$currentdate=date('m', strtotime($row['DATE_']));

														if (date('m', strtotime($row['DATE_']))>=$currentdate) 
														{

															 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;

														
															$currentdate=date('m', strtotime($row['DATE_']));

                                                              if (isset($prevdate)) 
                                                              {
                                                                	# code...
	                                                                if ($prevdate==$currentdate) 
	                                                                {
	                                                                  # code... do nothing


	                                                                }
	                                                                else
	                                                                {
	                                                                  $prevdate=$currentdate;
	                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
																 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));

	                                                                }


                                                              }
                                                              else
                                                              {
                                                                  $prevdate = $currentdate;
                                                                
                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
															 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));


                                                              }

										                               
								         				}

								         				else
								         				{
								         					 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;


								                           
								                               
								         				}
												}
										}

									}
									

								}
								elseif ($between=="DATEONLY") 
								{
									
									$plan = 0;
									$res = 0;
									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										$param = date('m', strtotime($strfrom));
										$temp=$row['DATE_'];
										$month1=date('m', strtotime($temp));
										$year1=date('Y', strtotime($temp));
										$dateplan = date('F', strtotime($strfrom))." ".$year1;

									if($month1==$param)
									{
										$plan+=$row['PLAN_QTY'];
										$res+=$row['sumresult'];
									}	


									}
									array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
									array_push($dataPoints2,array("label"=>"".$dateplan,"y"=>"".$res));









							/* 		# code...
									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										# code...
										$temp=$row['DATE_'];
                                                 

                                                    $month1=date('m', strtotime($temp));
                                                    $year1=date('Y', strtotime($temp));
 
										$sqlresultsum="SELECT SUM(PRINT_QTY) as prodresult2, DATE_,ITEM_NAME 
														FROM mis_product 
														WHERE  (MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."')"; 
									 	$sqlresultsum="SELECT SUM(mis_product.PRINT_QTY)as prodresult2, mis_prod_plan_dl.DATE_,
															mis_prod_plan_dl.ITEM_NAME
														 from mis_product
														 LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
														WHERE MONTH(mis_prod_plan_dl.DATE_)='".$month1."' AND 
														YEAR(mis_prod_plan_dl.DATE_)='".$year1."' 
														AND (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='".$PlanType."')";		

										$resultres=$conn->query($sqlresultsum);

											while ($row2=$resultres->fetch_assoc()) 
											{
												# code...
												$sqlplansum="SELECT SUM(PLAN_QTY) as planqty2, DATE_, ITEM_NAME FROM mis_prod_plan_dl WHERE  (MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."')";
												$resultplan=$conn->query($sqlplansum);

												while ($row3=$resultplan->fetch_assoc()) 
												{
													# code...

													$res=$row2['prodresult2'];
													$dateres= "".$row['DATE_'];
													$plan=$row3['planqty2'];
													$dateplan= "".$row['DATE_'];
													$year11 = date('Y',strtotime($dateplan));
													$year22 = date('Y',strtotime($dateres));

 													$dateres=date('F', strtotime($dateres));
                                        			$dateplan=date('F', strtotime($dateplan));
                                        			$dateres=$dateres." ".$year22;
                                        			$dateplan=$dateplan." ".$year11;
 
													

														$currentdate=date('m', strtotime($row['DATE_']));

														if (date('m', strtotime($row['DATE_']))>=$currentdate) 
														{

															 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;

														
															$currentdate=date('m', strtotime($row['DATE_']));

                                                              if (isset($prevdate)) 
                                                              {
                                                                	# code...
	                                                                if ($prevdate==$currentdate) 
	                                                                {
	                                                                  # code... do nothing


	                                                                }
	                                                                else
	                                                                {
	                                                                  $prevdate=$currentdate;
	                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
																 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));

	                                                                }


                                                              }
                                                              else
                                                              {
                                                                  $prevdate = $currentdate;
                                                                
                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
															 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));


                                                              }

										                               
								         				}

								         				else
								         				{
								         					 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;


								                           
								                               
								         				}
												}

											}

									} */
									///end if between == date only
								}
								elseif ($between=="YES-Search")
								{
									 
									# code...
									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										# code...
										$temp=$row['DATE_'];
                                                 

                                                    $month1=date('m', strtotime($temp));
                                                    $year1=date('Y', strtotime($temp));

										$sqlresultsum="SELECT SUM(PRINT_QTY) as prodresult2, DATE_ FROM mis_product WHERE (ITEM_NAME='".$row['ITEM_NAME']."') AND (MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."')";
										$currentdate=$row['DATE_'];


										$resultres=$conn->query($sqlresultsum);

											while ($row2=$resultres->fetch_assoc()) 
											{
												# code...
												$sqlplansum="SELECT SUM(PLAN_QTY) as planqty2, DATE_ FROM mis_prod_plan_dl WHERE (ITEM_NAME='".$row['ITEM_NAME']."') AND (MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."')";
												$resultplan=$conn->query($sqlplansum);

												while ($row3=$resultplan->fetch_assoc()) 
												{
													# code...

													$res=$row2['prodresult2'];
													$dateres= "".$row['DATE_'];
													$plan=$row3['planqty2'];
													$dateplan= "".$row['DATE_'];
													$year11 = date('Y',strtotime($dateplan));
													$year22 = date('Y',strtotime($dateres));

 													$dateres=date('F', strtotime($dateres));
                                        			$dateplan=date('F', strtotime($dateplan));
                                        			$dateres=$dateres." ".$year22;
                                        			$dateplan=$dateplan." ".$year11;
 
													

														$currentdate=date('F', strtotime($row['DATE_']));

														if (date('F', strtotime($row['DATE_']))>=$currentdate) 
														{

															 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;

														
															$currentdate=date('F', strtotime($row['DATE_']));

                                                              if (isset($prevdate)) 
                                                              {
                                                                	# code...
	                                                                if ($prevdate==$currentdate) 
	                                                                {
	                                                                  # code... do nothing


	                                                                }
	                                                                else
	                                                                {
	                                                                  $prevdate=$currentdate;
	                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
																 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));

	                                                                }


                                                              }
                                                              else
                                                              {
                                                                  $prevdate = $currentdate;
                                                                
                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
															 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));


                                                              }

										                               
								         				}

								         				else
								         				{
								         					 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;


								                           
								                               
								         				}
												}

											}

									}


								}
								else
								{
									

									while ($row=$resultsqlitem->fetch_assoc()) 
									{
										# code...

										$temp=$row['DATE_'];
                                        $month1=date('m', strtotime($temp));
                                        $year1=date('Y', strtotime($temp));

										$sqlresultsum="SELECT SUM(PRINT_QTY) as prodresult2, DATE_ FROM mis_product WHERE MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."'";


										$resultres=$conn->query($sqlresultsum);

											while ($row2=$resultres->fetch_assoc()) 
											{
												# code...
												$sqlplansum="SELECT SUM(PLAN_QTY) as planqty2, DATE_ FROM mis_prod_plan_dl WHERE MONTH(DATE_) ='".$month1."' AND YEAR(DATE_)='".$year1."'";
												$resultplan=$conn->query($sqlplansum);

												while ($row3=$resultplan->fetch_assoc()) 
												{
													# code...

													$res=$row2['prodresult2'];
													$dateres= "".$row['DATE_'];
													$plan=$row3['planqty2'];
													$dateplan= "".$row['DATE_'];
													$year11 = date('Y',strtotime($dateplan));
													$year22 = date('Y',strtotime($dateres));

 													$dateres=date('F', strtotime($dateres));
                                        			$dateplan=date('F', strtotime($dateplan));
                                        			$dateres=$dateres." ".$year22;
                                        			$dateplan=$dateplan." ".$year11;
 
													

														$currentdate=date('F', strtotime($row['DATE_']));

														if (date('F', strtotime($row['DATE_']))>=$currentdate) 
														{

															 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;

														
															$currentdate=date('F', strtotime($row['DATE_']));

                                                              if (isset($prevdate)) 
                                                              {
                                                                	# code...
	                                                                if ($prevdate==$currentdate) 
	                                                                {
	                                                                  # code... do nothing


	                                                                }
	                                                                else
	                                                                {
	                                                                  $prevdate=$currentdate;
	                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
																 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));

	                                                                }


                                                              }
                                                              else
                                                              {
                                                                  $prevdate = $currentdate;
                                                                
                                                             	  array_push($dataPoints1,array("label"=> "".$dateplan ,"y"=>"".$plan));
															 	  array_push($dataPoints2,array("label"=>"".$dateres,"y"=>"".$res));


                                                              }

										                               
								         				}

								         				else
								         				{
								         					 #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
								                             #$currentdate=$hold;


								                           
								                               
								         				}
												}

											}

									}

								}


								$response = array_merge($dataPoints1,$dataPoints2);
								echo json_encode(array('datapoints1'=>$dataPoints1,'datapoints2'=>$dataPoints2),JSON_NUMERIC_CHECK);
								#echo json_encode($response,JSON_NUMERIC_CHECK);



	}









}#end of if from date is set
else
{

	
	$dataPoints1 = array();
	$dataPoints2 = array();


}







?>