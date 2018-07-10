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
    $col = "MOLD_ID";
    $tb = 'dmc_mold_list';
    $user = $_SESSION['text'];
    $datetime = date('Y-m-d H:i:s');    

    $form_data = array(        
        'MOLD_CODE'=>(isset($_POST['moldcode']))?$_POST['moldcode']:'',
        'TOOL_NUMBER'=>(isset($_POST['toolnumber']))?$_POST['toolnumber']:'',
        'ITEM_CODE'=>(isset($_POST['itemcode']))?$_POST['itemcode']:'',
        'ITEM_NAME'=>(isset($_POST['itemname']))?$_POST['itemname']:'',
        'CUSTOMER_CODE'=>(isset($_POST['customercode']))?$_POST['customercode']:'',
        'CUSTOMER_NAME'=>(isset($_POST['customername']))?$_POST['customername']:'',
        'APPROVAL_DATE'=>(isset($_POST['approvaldate']))?$_POST['approvaldate']:'',
        'DRAWING_REVISION'=>(isset($_POST['drawingrevision']))?$_POST['drawingrevision']:'',
        'GUARANTEE_SHOT'=>(isset($_POST['guaranteeshot']))?$_POST['guaranteeshot']:'',
        'MOLD_SHOT'=>(isset($_POST['moldshot']))?$_POST['moldshot']:'',
        'CAVITY'=>(isset($_POST['cavity']))?$_POST['cavity']:'',
        'MOLD_REMARKS'=>(isset($_POST['moldremarks']))?$_POST['moldremarks']:'',
        'ASSET_NUMBER'=>(isset($_POST['assetnumber']))?$_POST['assetnumber']:'',        
        'TRANSFER_DATE'=>(isset($_POST['transferdate']))?$_POST['transferdate']:'',
        'MOLD_MODEL'=>(isset($_POST['moldmodel']))?$_POST['moldmodel']:'',
        'MOLD_MAKER'=>(isset($_POST['moldmaker']))?$_POST['moldmaker']:'',
        'MOLD_CATEGORY'=>(isset($_POST['moldcategory']))?$_POST['moldcategory']:'',
    );

    function select(){

        $row = $GLOBALS['db']->get_rows($GLOBALS['tb'],$GLOBALS['col'],$_POST['id']);
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
    }

    
    
?>