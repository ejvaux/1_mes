<?php
    session_start();
    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    include_once $_SERVER['DOCUMENT_ROOT']."/1_mes/database/db.class.php"; 
 
    $db = new DBQUERY;
    $action = $_POST['action'];
    $col = "MOLD_REPAIR_ID";
    $tb = 'mmc_mold_repair';
    $user = $_SESSION['text'];
    $datetime = date('Y-m-d H:i:s');
    $date = date('Y-m-d');

    $form_data = array(
        'MOLD_CODE' => (isset($_POST['moldcode']))?$_POST['moldcode']:'',
        'TOOL_NUMBER' => (isset($_POST['toolnumber']))?$_POST['toolnumber']:'',
        'ITEM_NAME' => (isset($_POST['itemname']))?$_POST['itemname']:'',
        'ITEM_CODE' => (isset($_POST['itemcode']))?$_POST['itemcode']:'',
        'CUSTOMER_NAME' => (isset($_POST['customername']))?$_POST['customername']:'',
        'MACHINE_CODE' => (isset($_POST['machinecode']))?$_POST['machinecode']:'',
        'DATE_REQUIRED' => (isset($_POST['daterequired']))?$_POST['daterequired']:'',
        'TIME_REQUIRED' => (isset($_POST['timerequired']))?$_POST['timerequired']:'',
        'DEFECT_NAME' => (isset($_POST['defectname']))?$_POST['defectname']:'',
        'MOLD_STATUS' => (isset($_POST['moldstatus']))?$_POST['moldstatus']:''     
    );
    
    $form_data2 = array(        
        'MRI001' => (isset($_POST['MRI001']))?$_POST['MRI001'] :'',
        'MRI002' => (isset($_POST['MRI002']))?$_POST['MRI002'] :'',
        'MRI003' => (isset($_POST['MRI003']))?$_POST['MRI003'] :'',
        'MRI004' => (isset($_POST['MRI004']))?$_POST['MRI004'] :'',
        'MRI005' => (isset($_POST['MRI005']))?$_POST['MRI005'] :'',
        'MRI006' => (isset($_POST['MRI006']))?$_POST['MRI006'] :'',
        'MRI007' => (isset($_POST['MRI007']))?$_POST['MRI007'] :'',
        'MRI008' => (isset($_POST['MRI008']))?$_POST['MRI008'] :'',

        'MRI009' => (isset($_POST['MRI009']))?'YES':'NO',
        'MRI010' => (isset($_POST['MRI010']))?'YES':'NO',
        'MRI011' => (isset($_POST['MRI011']))?'YES':'NO',
        'MRI012' => (isset($_POST['MRI012']))?'YES':'NO',
        'MRI013' => (isset($_POST['MRI013']))?'YES':'NO',
        'MRI014' => (isset($_POST['MRI014']))?'YES':'NO',
        'MRI015' => (isset($_POST['MRI015']))?'YES':'NO',
        'MRI016' => (isset($_POST['MRI016']))?'YES':'NO',
        'MRI017' => (isset($_POST['MRI017']))?'YES':'NO',
        'MRI018' => (isset($_POST['MRI018']))?'YES':'NO',
        'MRI019' => (isset($_POST['MRI019']))?'YES':'NO',
        'MRI020' => (isset($_POST['MRI020']))?'YES':'NO',
        'ACTION_TAKEN' =>(isset( $_POST['actiontaken']))? $_POST['actiontaken'] :'', 
    );
    
    function select(){
        echo $GLOBALS['db']->get_rows($GLOBALS['tb'],$GLOBALS['col'],$_POST['id']);
        /* echo json_encode($row,true); */
    }

    function insert(){
        
        global $form_data;
        $form_data['REQUEST_DATE'] = $GLOBALS['date'];
        $form_data['USER_REQUEST'] = $GLOBALS['user'];
        $form_data['INSERT_DATETIME'] = $GLOBALS['datetime'];
        $form_data['MOLD_REPAIR_CONTROL_NO'] = $_POST['repaircontrol'];

        echo $GLOBALS['db']->insert_row($GLOBALS['tb'],$form_data);
    }

    function update_a(){

        global $form_data;
        $form_data['USER_UPDATE'] = $GLOBALS['user'];
        $form_data['UPDATE_DATETIME'] = $GLOBALS['datetime'];
    
        echo $GLOBALS['db']->update_row($GLOBALS['tb'],$form_data,$GLOBALS['col'],$_POST['id']);
    }

    function update_chk(){        

        global $form_data2;
        $form_data2['CHECKER'] = $GLOBALS['user'];
        $form_data2['CHECK_DATETIME'] = $GLOBALS['datetime'];
        $form_data2['MOLD_STATUS'] = "ON-GOING";
    
        echo $GLOBALS['db']->update_row($GLOBALS['tb'],$form_data2,$GLOBALS['col'],$_POST['id']);
    }

    function update_aprv(){        

        global $form_data2;
        $form_data2['APPROVER'] = $GLOBALS['user'];
        $form_data2['APPROVE_DATETIME'] = $GLOBALS['datetime'];
        $form_data2['MOLD_STATUS'] = "FOR MOLD TRIAL";
    
        echo $GLOBALS['db']->update_row($GLOBALS['tb'],$form_data2,$GLOBALS['col'],$_POST['id']);
    }

    function update_qc(){        

        $form_data3 = array(
            'MOLD_STATUS' => "QC APPROVED",
            'QC_APPROVER' => $GLOBALS['user'],
            'QC_APPROVE_DATETIME' => $GLOBALS['datetime']   
        );        
    
        echo $GLOBALS['db']->update_row($GLOBALS['tb'],$form_data3,$GLOBALS['col'],$_POST['id']);
    }

    function del(){
        echo $GLOBALS['db']->delete_row($GLOBALS['tb'],$GLOBALS['col'],$_POST['id']);
    }
    
    switch($action){
        case "select":
            select();
            break;
        case "insert":
            insert();
            break;
        case "update_qc":
            update_qc();
            break;
        case "update_a":
            update_a();
            break;
        case "update_chk":
            update_chk();
            break;
        case "update_aprv":
            update_aprv();
            break;
        case "delete":
            del();
            break;
    }

    
    
?>