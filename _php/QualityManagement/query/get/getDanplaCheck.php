<?php       

                session_start();
                $User = $_SESSION['text'];
            
                include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
                $danpla = $_POST['jo_barcode'];
                $item = $_POST['item_code'];
                $lot = $_POST['lot_num'];
                $lc_sql = "SELECT LOT_JUDGEMENT,EPSON_QC_APPROVED FROM qmd_lot_create 
                           WHERE LOT_NUMBER = '$lot' AND ITEM_CODE = '$item'";
                $lc_result = $conn->query($lc_sql);
                if ($lc_result->num_rows > 0) 
                {
                    while($lc_row = $lc_result->fetch_assoc()){

                        /* if($lc_row['LOT_JUDGEMENT'] == 'APPROVED' && $lc_row['EPSON_QC_APPROVED'] == 'APPROVED'){ */
                            if($lc_row['LOT_JUDGEMENT'] == 'APPROVED'){
                                $mp_sql = "SELECT DANPLA, WAREHOUSE_RECEIVE FROM mis_product WHERE DANPLA = '$danpla'";
                                $mp_result = $conn->query($mp_sql);

                                if ($mp_result->num_rows > 0){
                                    $x=('false');
                                        while($mp_row = $mp_result->fetch_assoc()){
                                            if($mp_row['WAREHOUSE_RECEIVE'] == 'RECEIVED'){$x = ('true5');}
                                            
                                            else{
                                                $ts_sql = "SELECT DANPLA_SERIAL,INSERT_USER FROM qmd_item_tempstore WHERE DANPLA_SERIAL ='$danpla'";
                                                $ts_result = $conn->query($ts_sql);
                                                if ($ts_result->num_rows > 0){
                                                    while($ts_row = $ts_result->fetch_assoc()){
                                                        $x = ('true1');
                                                    }
                                                }
                                                else{
                                                    $x = ('false');
                                                    }   
                                                
                                            }
                                    }
                                }
                                
                            }
                        /* else if($row1['EPSON_QC_APPROVED'] == 'PENDING'){
                            $x = ('true6');
                        } */
                            elseif($lc_row['LOT_JUDGEMENT'] == 'PENDING'){
                            $x = ('true4');
                            }
                            elseif($lc_row['LOT_JUDGEMENT'] == 'DISAPPROVED'){
                            $x = ('true4'); 
                            }
                    }
                }
              echo json_encode($x,true);
              $conn->close();
        ?>