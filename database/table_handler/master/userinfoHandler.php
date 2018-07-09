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
    $col = "NO";
    $tb = 'dmc_user_info';
    $user = $_SESSION['text'];
    $datetime = date('Y-m-d H:i:s');    

    $form_data = array(
        'USER_ID'=>(isset($_POST['userid']))?$_POST['userid']:'',
        'USER_NAME'=>(isset($_POST['username']))?$_POST['username']:'',
        'EMAIL_ADDRESS'=>(isset($_POST['emailaddress']))?$_POST['emailaddress']:'',
        'USER_AUTHORITY'=>(isset($_POST['userauthority']))?$_POST['userauthority']:'',
        'USER_PASSWORD'=>'228487974466a761f027a67fb52b6e58'
    );

    function select(){

        $row = $GLOBALS['db']->get_rows($GLOBALS['tb'],$GLOBALS['col'],$_POST['id']);
        echo json_encode($row,true);
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