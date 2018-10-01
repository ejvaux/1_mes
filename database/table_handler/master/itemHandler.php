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
    $col = "ITEM_ID";
    $tb = 'dmc_item_list';
    $user = $_SESSION['text'];
    $datetime = date('Y-m-d H:i:s');
    $filter = (isset($_POST['filter']))?$_POST['filter']:'';
    $searchcol = (isset($_POST['searchcol']))?$_POST['searchcol']:'';

    $form_data = array(            
        'ITEM_CODE'=>(isset($_POST['itemcode']))?$_POST['itemcode']:'',
        'DIVISION_CODE'=>(isset($_POST['divisioncode']))?$_POST['divisioncode']:'',
        'CUSTOMER_CODE'=>(isset($_POST['customercode']))?$_POST['customercode']:'',
        'CUSTOMER_NAME'=>(isset($_POST['customername']))?$_POST['customername']:'',
        'BARCODE'=>(isset($_POST['barcode']))?$_POST['barcode']:'',
        'ITEM_NAME'=>(isset($_POST['itemname']))?$_POST['itemname']:'',
        'MODEL'=>(isset($_POST['model']))?$_POST['model']:'',
        'ITEM_PRINTCODE'=>(isset($_POST['itemprintcode']))?$_POST['itemprintcode']:'',
        'GROUP_CODE'=>(isset($_POST['groupcode']))?$_POST['groupcode']:'',
        'DESCRIPTION'=>(isset($_POST['description']))?$_POST['description']:'',        
        'PACK_QTY'=>(isset($_POST['packqty']))?$_POST['packqty']:'',
        'DANPLA_QTY'=>(isset($_POST['danplaqty']))?$_POST['danplaqty']:'',
        'LABEL_TYPE'=>(isset($_POST['labeltype']))?$_POST['labeltype']:'',
        'RESIN'=>(isset($_POST['resin']))?$_POST['resin']:'',
        'EPSON_PRODUCTNAME'=>(isset($_POST['epson_productname']))?$_POST['epson_productname']:'',
    );

    function select(){
        $row = $GLOBALS['db']->get_rows($GLOBALS['tb'],$GLOBALS['col'],$_POST['id']);
        echo $row;
    }

    function select2(){
        $id = $_POST['id'];
        $row = $GLOBALS['db']->get_rows($GLOBALS['tb'],$_POST['column'],$id);
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

    function barcode(){
        $rows = $GLOBALS['db']->get_rows3($GLOBALS['tb'],$GLOBALS['filter'],true,$GLOBALS['searchcol']);
        echo json_encode($rows,true);
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
        case "selectall":
            selectall();
            break;
        case "barcode":
            barcode();
            break;
    }
?>