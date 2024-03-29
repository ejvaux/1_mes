<?php
    session_start();
    if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    }
    include_once $_SERVER['DOCUMENT_ROOT']."/1_mes/database/db.class.php"; 
 
    $db = new DBQUERY;
    $action = (isset($_POST['action']))?$_POST['action']:$_GET['action'];
    $col = "NO";
    $tb = 'dmc_item_mold_matching';
    $user = $_SESSION['text'];
    $datetime = date('Y-m-d H:i:s');

    $form_data = array(
        'ITEM_CODE'=>(isset($_POST['ITEM_CODE']))?$_POST['ITEM_CODE']:'',
        'BARCODE'=>(isset($_POST['BARCODE']))?$_POST['BARCODE']:'',
        'ITEM_NAME'=>(isset($_POST['ITEM_NAME']))?$_POST['ITEM_NAME']:'',
        'MODEL'=>(isset($_POST['MODEL']))?$_POST['MODEL']:'',
        'ITEM_PRINTCODE'=>(isset($_POST['ITEM_PRINTCODE']))?$_POST['ITEM_PRINTCODE']:'',
        'TOOL_NUMBER'=>(isset($_POST['TOOL_NUMBER']))?$_POST['TOOL_NUMBER']:'',
        'MACHINE_CODE'=>(isset($_POST['MACHINE_CODE']))?$_POST['MACHINE_CODE']:'',
        'CUSTOMER_CODE'=>(isset($_POST['CUSTOMER_CODE']))?$_POST['CUSTOMER_CODE']:'',
        'CUSTOMER_NAME'=>(isset($_POST['CUSTOMER_NAME']))?$_POST['CUSTOMER_NAME']:''
    );

    function select(){
        $id = (isset($_POST['id']))?$_POST['id']:$_GET['id'];
        $row = $GLOBALS['db']->get_rows($GLOBALS['tb'],$GLOBALS['col'],$id);
        echo $row;
    }

    function select2(){
        $id = $_POST['id'];
        $row = $GLOBALS['db']->get_rows($GLOBALS['tb'],$_POST['column'],$id);
        echo $row;
    }

    function select3(){
        $filter = $_GET['filter'];
        $row = $GLOBALS['db']->get_rows2($GLOBALS['tb'],$filter);
        echo $row;
    }

    function selectall(){
        $row = $GLOBALS['db']->get_rows($GLOBALS['tb']);
        echo $row;
    }

    function insert(){
        
        global $form_data;
        $form_data['INSERT_USER'] = $GLOBALS['user'];
        $form_data['INSERT_DATETIME'] = $GLOBALS['datetime'];

        echo $GLOBALS['db']->insert_row($GLOBALS['tb'],$form_data);
    }

    function update(){

        global $form_data;
        $form_data['UPDATE_USER'] = $GLOBALS['user'];
        $form_data['UPDATE_DATETIME'] = $GLOBALS['datetime'];
    
        echo $GLOBALS['db']->update_row($GLOBALS['tb'],$form_data,$GLOBALS['col'],$_POST['id']);
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
        case "update":
            update();
            break;
        case "delete":
            del();
            break;
        case "select2":
            select2();
            break;
        case "select3":
            select3();
            break;
        case "selectall":
            selectall();
            break;
    }