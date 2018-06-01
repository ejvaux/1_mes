                    <?php

                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT DEFECT_NAME FROM dmc_defect_code ORDER BY DEFECT_CODE ASC";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo "<option value='";
                                echo $row['DEFECT_NAME'];
                                echo "'>";
                                echo $row['DEFECT_NAME'];
                                echo "</option>";
                            }
                        
                        $conn->close();

                    ?>