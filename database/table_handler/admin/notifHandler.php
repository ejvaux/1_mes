<?php
    session_start();
    
    include_once $_SERVER['DOCUMENT_ROOT']."/1_mes/database/db.class.php"; 
 
    $db = new DBQUERY;
    $action = $_POST['action'];
    $col = "notif_id";
    $tb = 'r_notification';
    $user =(isset( $_SESSION['text']))? $_SESSION['text']:'';
    $datetime = date('Y-m-d H:i:s');    

    $form_data = array(
        'notif_message'=>(isset($_POST['notif_message']))?$_POST['notif_message'].'<br><br>~ '.$user:''
    );

    function select(){

        $row = $GLOBALS['db']->get_rows($GLOBALS['tb'],$GLOBALS['col'],1);
        echo $row;
    }

    function insert(){
        
        global $form_data;
        echo $GLOBALS['db']->insert_row($GLOBALS['tb'],$form_data);
    }

    function update(){

        global $form_data;
    
        echo $GLOBALS['db']->update_row($GLOBALS['tb'],$form_data,$GLOBALS['col'],1);
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