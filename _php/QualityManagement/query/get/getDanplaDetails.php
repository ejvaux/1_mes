<?php
            
    /* $serverName="DATASRV2\PTPISQLSVR";
    $connectionInfo=array('Database'=>'ProdOutput_db', "UID"=>"e.rubio", "PWD"=>"prima");

    $conn = sqlsrv_connect($serverName,$connectionInfo);


    $mcode = $_POST['jo_barcode'];
    $sql = "SELECT jo_barcode,jo_num,item_code,item_name,print_qty,machine_num,lot_num FROM DanplaLogTable WHERE jo_barcode = '$mcode'";
    $result=sqlsrv_query($conn,$sql);
    
    $row=sqlsrv_fetch_array($result);
    echo json_encode($row,true);     */
    
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

    $bcode = $_POST['jo_barcode'];
    $sql = "SELECT `PACKING_NUMBER`,`ITEM_CODE`,`ITEM_NAME`, SUM(PRINT_QTY) AS SUM_QTY,`JO_NUM`,`MACHINE_CODE`,`LOT_NUM` 
            FROM `mis_product`
            WHERE `PACKING_NUMBER` = '$bcode'
            GROUP BY `PACKING_NUMBER`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row,true);
    $conn->close();

    ?>

