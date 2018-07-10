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
    $col = "EMPLOYEE_ID";
    $tb = 'dmc_employee';
    $user = $_SESSION['text'];
    $datetime = date('Y-m-d H:i:s');    

    $form_data = array(                
        'EMPLOYEE_CODE'=>(isset($_POST['employeecode']))?$_POST['employeecode']:'',
        'EMPLOYEE_NAME'=>(isset($_POST['employeename']))?$_POST['employeename']:'',
        'EMPLOYEE_STATUS'=>(isset($_POST['employeestatus']))?$_POST['employeestatus']:'',
        'DATE_HIRED'=>(isset($_POST['datehired']))?$_POST['datehired']:'',
        'DIVISION'=>(isset($_POST['division']))?$_POST['division']:''
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