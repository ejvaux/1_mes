<?php       
              include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
              $danpla = $_POST['jo_barcode'];
              $sql1 = "SELECT LOT_JUDGEMENT,WAREHOUSE_RECEIVE FROM qmd_lot_create 
                      WHERE LOT_NUMBER = (SELECT LOT_NUM FROM mis_product WHERE PACKING_NUMBER = '$danpla' GROUP BY PACKING_NUMBER)";
              $result1 = $conn->query($sql1);
              if ($result1->num_rows > 0) 
              {
                  while($row1 = $result1->fetch_assoc()){
                        if($row1['LOT_JUDGEMENT'] == 'APPROVED' && $row1['WAREHOUSE_RECEIVE'] != 'RECEIVED'){
                            
                            $sql = "SELECT DANPLA_SERIAL,JO_NUM,LOT_NUM FROM qmd_item_tempstore";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0){
                                $x=('false');
                                    while($row = $result->fetch_assoc()){

                                        if($row['DANPLA_SERIAL'] == $_POST['jo_barcode']){
                                            $x = ('true1');
                                        }
                                        else if ($row['JO_NUM'] != $_POST['jo_num']){
                                            $x = ('true2');/*  */
                                        }
                                        else if ($row['LOT_NUM'] != $_POST['lot_num']){
                                            $x = ('true3');/*  */
                                        }
                                    }
                                }
                            else{
                                $x=('false');
                                }   
                            }

                        else if($row1['WAREHOUSE_RECEIVE'] == 'RECEIVED'){
                            $x = ('true5');
                        }
                        else{
                        $x = ('true4');
                        }
                    }
                }
              echo json_encode($x,true);
              $conn->close();
        ?>