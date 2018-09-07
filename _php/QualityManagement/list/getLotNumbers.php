 <?php            
                    

    $joNumber = $_POST['jobOrder'];
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  
    $sql = "SELECT LOT_NUMBER FROM qmd_lot_create WHERE JO_NUM = '$joNumber'";
    $result = $conn->query($sql);
    echo "<option value=' '>--SELECT HERE--</option>";
    while($row = $result->fetch_assoc()) {  
            echo "<option value='";
            echo $row['LOT_NUMBER'];
            echo "'>";
            echo $row['LOT_NUMBER'];
            echo "</option>";
    }
    
    $conn->close();