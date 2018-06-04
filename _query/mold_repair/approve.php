<?php
    
    session_start();

    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }

    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";

    if(isset($_POST['MRI001'])){$MRI001 = $_POST['MRI001']; }else{$MRI001 = '';};
    if(isset($_POST['MRI002'])){$MRI002 = $_POST['MRI002']; }else{$MRI002 = '';};
    if(isset($_POST['MRI003'])){$MRI003 = $_POST['MRI003']; }else{$MRI003 = '';};
    if(isset($_POST['MRI004'])){$MRI004 = $_POST['MRI004']; }else{$MRI004 = '';};
    if(isset($_POST['MRI005'])){$MRI005 = $_POST['MRI005']; }else{$MRI005 = '';};
    if(isset($_POST['MRI006'])){$MRI006 = $_POST['MRI006']; }else{$MRI006 = '';};
    if(isset($_POST['MRI007'])){$MRI007 = $_POST['MRI007']; }else{$MRI007 = '';};
    if(isset($_POST['MRI008'])){$MRI008 = $_POST['MRI008']; }else{$MRI008 = '';};

    if(isset($_POST['MRI009'])){$MRI009 = 'YES'; }else{$MRI009 = 'NO';};
    if(isset($_POST['MRI010'])){$MRI010 = 'YES'; }else{$MRI010 = 'NO';};
    if(isset($_POST['MRI011'])){$MRI011 = 'YES'; }else{$MRI011 = 'NO';};
    if(isset($_POST['MRI012'])){$MRI012 = 'YES'; }else{$MRI012 = 'NO';};
    if(isset($_POST['MRI013'])){$MRI013 = 'YES'; }else{$MRI013 = 'NO';};
    if(isset($_POST['MRI014'])){$MRI014 = 'YES'; }else{$MRI014 = 'NO';};
    if(isset($_POST['MRI015'])){$MRI015 = 'YES'; }else{$MRI015 = 'NO';};
    if(isset($_POST['MRI016'])){$MRI016 = 'YES'; }else{$MRI016 = 'NO';};
    if(isset($_POST['MRI017'])){$MRI017 = 'YES'; }else{$MRI017 = 'NO';};
    if(isset($_POST['MRI018'])){$MRI018 = 'YES'; }else{$MRI018 = 'NO';};
    if(isset($_POST['MRI019'])){$MRI019 = 'YES'; }else{$MRI019 = 'NO';};
    if(isset($_POST['MRI020'])){$MRI020 = 'YES'; }else{$MRI020 = 'NO';};

    $checker = $_SESSION['text'];
    $actiontaken = $_POST['actiontaken'];
    $date = date('Y-m-d H:i:s');
    $approvedatetime = date('Y-m-d H:i:s');
    $approver = $_SESSION['text'];
    $moldstatus = "FOR MOLD TRIAL";
    $repaircontrol = $_POST['repaircontrol'];
  
    $sql = "UPDATE mmc_mold_repair SET        
        
        MOLD_STATUS = '$moldstatus',
        APPROVER = '$approver',
        APPROVE_DATETIME = '$approvedatetime',
        CHECKER = '$checker',
        CHECK_DATETIME = '$date',
        ACTION_TAKEN = '$actiontaken',
        MRI001 = '$MRI001',
        MRI002 = '$MRI002',
        MRI003 = '$MRI003',
        MRI004 = '$MRI004',
        MRI005 = '$MRI005',
        MRI006 = '$MRI006',
        MRI007 = '$MRI007',
        MRI008 = '$MRI008',
        MRI009 = '$MRI009',
        MRI010 = '$MRI010',
        MRI011 = '$MRI011',
        MRI012 = '$MRI012',
        MRI013 = '$MRI013',
        MRI014 = '$MRI014',
        MRI015 = '$MRI015',
        MRI016 = '$MRI016',
        MRI017 = '$MRI017',
        MRI018 = '$MRI018',
        MRI019 = '$MRI019',
        MRI020 = '$MRI020'
        

    WHERE MOLD_REPAIR_CONTROL_NO = $repaircontrol";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error saving checklist: " . $conn->error;        
    }

    $conn->close();
?>