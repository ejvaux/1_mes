<?php
    session_start();
    /* if(!isset($_SESSION['username'])){
                
        // not logged in
        header('Location: /1_mes/');
        exit();
    } */
    include_once $_SERVER['DOCUMENT_ROOT']."/1_mes/database/db.class.php"; 
 
    $db = new DBQUERY;
    $action = $_POST['action'];
    $col = "NO";
    $tb = 'dmc_user_info';
    $user = (isset($_SESSION['text']))?$_SESSION['text']:$_POST['username'];
    $datetime = date('Y-m-d H:i:s');    

    $form_data = array(
        'USER_ID'=>(isset($_POST['userid']))?$_POST['userid']:'',
        'USER_NAME'=>(isset($_POST['username']))?$_POST['username']:'',
        'EMAIL_ADDRESS'=>(isset($_POST['emailaddress']))?$_POST['emailaddress']:'',
        'USER_AUTHORITY'=>(isset($_POST['userauthority']))?$_POST['userauthority']:'',
        /* 'USER_PASSWORD'=>(isset($_POST['userpassword']))?$_POST['userpassword']:'228487974466a761f027a67fb52b6e58', */
    );

    function select(){

        $row = $GLOBALS['db']->get_rows($GLOBALS['tb'],$GLOBALS['col'],$_POST['id']);
        echo json_encode($row,true);
    }

    function insert(){
        
        global $form_data;
        if(isset($_POST['userpassword'])){
            $pw = $_POST['userpassword'];
            $pw = stripslashes($pw);
            $cpw =  md5("ejvaux" . $pw);
            $form_data['USER_PASSWORD'] = $cpw;
        }
        else{
            $form_data['USER_PASSWORD'] = '228487974466a761f027a67fb52b6e58';
        }
        
        $form_data['INSERT_USER'] = $GLOBALS['user'];
        $form_data['INSERT_DATETIME'] = $GLOBALS['datetime'];

        echo $GLOBALS['db']->insert_row($GLOBALS['tb'],$form_data);
    }

    function update(){

        global $form_data;
        if($_POST['userpassword'] == 'def'){
            $form_data['USER_PASSWORD'] = '228487974466a761f027a67fb52b6e58';
        }        
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