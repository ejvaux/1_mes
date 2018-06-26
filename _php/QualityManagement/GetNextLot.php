<?php       
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

    $sql = "SELECT * FROM qmd_lot_create WHERE DATE(NOW()) = DATE(PROD_DATE) ORDER BY LOT_NUMBER DESC";
    $result = $conn->query($sql);

            if ($result->num_rows > 0){

                while($row = $result->fetch_assoc()){


                    if($row['JO_NUM'] == $_POST['jo_num']){
                        $lot = $row['LOT_NUMBER'];
                        break;
                        }
                else if($row['JO_NUM'] != $_POST['jo_num'] && $row['MACHINE_CODE'] == $_POST['machine_code']){
                        $lot = $row['LOT_NUMBER'];
                        break;
                        }
                elseif($row['JO_NUM'] != $_POST['jo_num'] && $row['MACHINE_CODE'] != $_POST['machine_code']){
                        $lot = (false); 
                        }
                    } 
                }

            else{
                $lot = (true);
                }
            
    echo json_encode($lot,true);
    $conn->close();
    ?>