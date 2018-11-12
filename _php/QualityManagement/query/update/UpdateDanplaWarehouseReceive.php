<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

$lot_creator = $_SESSION['text'];
$warehouse = $_POST['warehouse'];
$receive_dateTime =  Date('Y-m-d H:i:s');
include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

$ts_sql1 =   "SELECT DANPLA_SERIAL FROM qmd_item_tempstore 
            WHERE INSERT_USER = '$lot_creator'";
                $ts_result1 = $conn->query($ts_sql1);
                if ($ts_result1->num_rows > 0) 
                {
                    while($ts_row1 = $ts_result1->fetch_assoc()){
                        $danpla = $ts_row1['DANPLA_SERIAL'];

                        $ms_sql = "UPDATE mis_product SET TO_WAREHOUSE = '$warehouse', WAREHOUSE_RECEIVE = 'RECEIVED',	
                                RECEIVED_BY = '$lot_creator', RECEIVED_DATE = '$receive_dateTime' WHERE danpla ='$danpla'";

                        if($conn->query($ms_sql) === TRUE) {
                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";
                                    $ts_row2 = "DELETE FROM qmd_item_tempstore WHERE DANPLA_SERIAL = '$danpla'";
                                    if($conn->query($ts_row2) === TRUE){
                                        
                                        
                                    }
                                    else{
                                        echo "Error updating record: " . $ts_row2 . "<br>" . $conn->error;       
                                        
                                    }
                                    
                        }
                        else{
                            echo "Error updating record: " . $ms_sql . "<br>" . $conn->error;       
                            
                        }





                    }
                    echo "SUCCESS";
                }

    
    $conn->close();   
?>