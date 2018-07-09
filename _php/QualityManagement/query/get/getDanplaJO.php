<?php       
              include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
              
              $sql = "SELECT * FROM qmd_danpla_tempstore";
              $result = $conn->query($sql);
              if ($result->num_rows > 0)
              {
                $x=(false);
                  while($row = $result->fetch_assoc()) 
                  {
                    if($row['DANPLA_SERIAL'] == $_POST['jo_barcode']){
                        $x = ('true1');
                    }
                    else if ($row['JO_NUM'] != $_POST['jo_num']){
                        $x = ('true2');/*  */
                    }
                  }
                }
                else{
                    $x=(false);
                     }   
                echo json_encode($x,true);
              $conn->close();
        ?>