<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    $moldfabricationid = $_POST['moldfabricationid'];    
    $updateuser = $_SESSION['text'];
    $updatedatetime = date('Y-m-d H:i:s');

    function chk($val){
        if(isset($val)){
            return $val; 
        }
        else{
            return ;
        }
    }

    $eleadtime_1 = $_POST['leadtime_1']; if(isset($_POST['operator_1'])){$eoperator_1 = $_POST['operator_1']; }else{$eoperator_1 = '';}
    $eleadtime_2 = $_POST['leadtime_2']; if(isset($_POST['operator_2'])){$eoperator_2 = $_POST['operator_2']; }else{$eoperator_2 = '';}
    $eleadtime_3 = $_POST['leadtime_3']; if(isset($_POST['operator_3'])){$eoperator_3 = $_POST['operator_3']; }else{$eoperator_3 = '';}
    $eleadtime_4 = $_POST['leadtime_4']; if(isset($_POST['operator_4'])){$eoperator_4 = $_POST['operator_4']; }else{$eoperator_4 = '';}
    $eleadtime_5 = $_POST['leadtime_5']; if(isset($_POST['operator_5'])){$eoperator_5 = $_POST['operator_5']; }else{$eoperator_5 = '';}
    $eleadtime_6 = $_POST['leadtime_6']; if(isset($_POST['operator_6'])){$eoperator_6 = $_POST['operator_6']; }else{$eoperator_6 = '';}
    $eleadtime_7 = $_POST['leadtime_7']; if(isset($_POST['operator_7'])){$eoperator_7 = $_POST['operator_7']; }else{$eoperator_7 = '';}
    $eleadtime_8 = $_POST['leadtime_8']; if(isset($_POST['operator_8'])){$eoperator_8 = $_POST['operator_8']; }else{$eoperator_8 = '';}
    $eleadtime_9 = $_POST['leadtime_9']; if(isset($_POST['operator_9'])){$eoperator_9 = $_POST['operator_9']; }else{$eoperator_9 = '';}
    $eleadtime_10 = $_POST['leadtime_10']; if(isset($_POST['operator_10'])){$eoperator_10 = $_POST['operator_10']; }else{$eoperator_10 = '';}
    $eleadtime_11 = $_POST['leadtime_11']; if(isset($_POST['operator_11'])){$eoperator_11 = $_POST['operator_11']; }else{$eoperator_11 = '';}
    $eleadtime_12 = $_POST['leadtime_12']; if(isset($_POST['operator_12'])){$eoperator_12 = $_POST['operator_12']; }else{$eoperator_12 = '';}
    $eleadtime_13 = $_POST['leadtime_13']; if(isset($_POST['operator_13'])){$eoperator_13 = $_POST['operator_13']; }else{$eoperator_13 = '';}
    $eleadtime_14 = $_POST['leadtime_14']; if(isset($_POST['operator_14'])){$eoperator_14 = $_POST['operator_14']; }else{$eoperator_14 = '';}
    $eleadtime_15 = $_POST['leadtime_15']; if(isset($_POST['operator_15'])){$eoperator_15 = $_POST['operator_15']; }else{$eoperator_15 = '';}
    $eleadtime_16 = $_POST['leadtime_16']; if(isset($_POST['operator_16'])){$eoperator_16 = $_POST['operator_16']; }else{$eoperator_16 = '';}
    $eleadtime_17 = $_POST['leadtime_17']; if(isset($_POST['operator_17'])){$eoperator_17 = $_POST['operator_17']; }else{$eoperator_17 = '';}

    $col1 = "DESIGN-1";
    $col2 = "DESIGN-2";
    $col3 = "DESIGN-3";
    $col4 = "RADIAL-1";
    $col5 = "LATHER-1";
    $col6 = "BANDSAW";
    $col7 = "ML";
    $col8 = "GS-1";
    $col9 = "GS-2";
    $col10 = "HSM";
    $col11 = "HSM-1";
    $col12 = "HSM-2";
    $col13 = "WEDM";
    $col14 = "M-EDM";
    $col15 = "EDM";
    $col16 = "ASSEMBLE-1";
    $col17 = "POLISHING-1";

    $ocol1 = $col1 . "_OPERATOR";
    $ocol2 = $col2 . "_OPERATOR";
    $ocol3 = $col3 . "_OPERATOR";
    $ocol4 = $col4 . "_OPERATOR";
    $ocol5 = $col5 . "_OPERATOR";
    $ocol6 = $col6 . "_OPERATOR";
    $ocol7 = $col7 . "_OPERATOR";
    $ocol8 = $col8 . "_OPERATOR";
    $ocol9 = $col9 . "_OPERATOR";
    $ocol10 = $col10 . "_OPERATOR";
    $ocol11 = $col11 . "_OPERATOR";
    $ocol12 = $col12 . "_OPERATOR";
    $ocol13 = $col13 . "_OPERATOR";
    $ocol14 = $col14 . "_OPERATOR";
    $ocol15 = $col15 . "_OPERATOR";
    $ocol16 = $col16 . "_OPERATOR";
    $ocol17 = $col17 . "_OPERATOR";
  
    $sql = "UPDATE  mmc_mold_fabrication SET
                
        UPDATE_USER = '$updateuser',
        UPDATE_DATETIME = '$updatedatetime',
        `$col1` = '$eleadtime_1',        `$ocol1` = '$eoperator_1',
        `$col2` = '$eleadtime_2',        `$ocol2` = '$eoperator_2',
        `$col3` = '$eleadtime_3',        `$ocol3` = '$eoperator_3',
        `$col4` = '$eleadtime_4',        `$ocol4` = '$eoperator_4',
        `$col5` = '$eleadtime_5',        `$ocol5` = '$eoperator_5',
        `$col6` = '$eleadtime_6',        `$ocol6` = '$eoperator_6',
        `$col7` = '$eleadtime_7',        `$ocol7` = '$eoperator_7',
        `$col8` = '$eleadtime_8',        `$ocol8` = '$eoperator_8',
        `$col9` = '$eleadtime_9',        `$ocol9` = '$eoperator_9',
        `$col10` = '$eleadtime_10',      `$ocol10` = '$eoperator_10',
        `$col11` = '$eleadtime_11',      `$ocol11` = '$eoperator_11',
        `$col12` = '$eleadtime_12',      `$ocol12` = '$eoperator_12',
        `$col13` = '$eleadtime_13',      `$ocol13` = '$eoperator_13',
        `$col14` = '$eleadtime_14',      `$ocol14` = '$eoperator_14',
        `$col15` = '$eleadtime_15',      `$ocol15` = '$eoperator_15',
        `$col16` = '$eleadtime_16',      `$ocol16` = '$eoperator_16',
        `$col17` = '$eleadtime_17',      `$ocol17` = '$eoperator_17'
        
    WHERE MOLD_FABRICATION_ID = $moldfabricationid";   

    if ($conn->query($sql) === TRUE) {        
        echo "success";

    } 
    else {        
        echo "Error updating record: " . $conn->error;        
    }
    
    $conn->close();
?>