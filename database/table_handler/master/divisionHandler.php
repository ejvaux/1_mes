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
    $col = "DIVISION_ID";
    $tb = 'dmc_division_code';
    $user = $_SESSION['text'];
    $datetime = date('Y-m-d H:i:s');
    $filter = (isset($_POST['filter']))?$_POST['filter']:'';
    $searchcol = (isset($_POST['searchcol']))?$_POST['searchcol']:''; 

    $form_data = array(        
        'DIVISION_CODE'=>(isset($_POST['divisioncode']))?$_POST['divisioncode']:'',
        'DIVISION_NAME'=>(isset($_POST['divisionname']))?$_POST['divisionname']:'',
        'SAP_DIVISION_CODE'=>(isset($_POST['sapcode']))?$_POST['sapcode']:'',
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

    function select3(){
        $rows = $GLOBALS['db']->get_rows3($GLOBALS['tb'],$GLOBALS['filter'],false,$GLOBALS['searchcol']);
        echo json_encode($rows,true);
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
    }

    
    
?>