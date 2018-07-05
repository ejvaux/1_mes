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
    $col = "MOLD_FABRICATION_ID";
    $tb = 'mmc_mold_fabrication';
    $user = $_SESSION['text'];
    $datetime = date('Y-m-d H:i:s');    

    $form_data = array(
        'ORDER_NO'=> (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'MANUFACTURE_DATE' => (isset($_POST['manufacturedate']))?$_POST['manufacturedate']:'',
        'MOLD_CODE' => (isset($_POST['moldcode']))?$_POST['moldcode']:'',
        'CUSTOMER_CODE' => (isset($_POST['customercode']))?$_POST['customercode']:'',
        'CUSTOMER_NAME' => (isset($_POST['customername']))?$_POST['customername']:'',
        'CURRENT_PROCESS' => (isset($_POST['currentprocess']))?$_POST['currentprocess']:'',
        'DELIVERY_PLAN' => (isset($_POST['deliveryplan']))?$_POST['deliveryplan']:'',
        'FINISHED_DATE' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'OPERATOR' => (isset($_POST['operator']))?$_POST['operator']:'',

        'DESIGN-1' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'DESIGN-1_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'DESIGN-2' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'DESIGN-2_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'DESIGN-3' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'DESIGN-3_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'RADIAL-1' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'RADIAL-1_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'LATHER-1' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'LATHER-1_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'BANDSAW' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'BANDSAW_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'ML' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'ML_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'GS-1' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'GS-1_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'GS-2' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'GS-2_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'HSM' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'HSM_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'HSM-1' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'HSM-1_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'HSM-2' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'HSM-2_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'WEDM' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'WEDM_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'M-EDM' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'M-EDM_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'EDM' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'EDM_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'ASSEMBLE-1' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'ASSEMBLE-1_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'POLISHING-1' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
        'POLISHING-1_OPERATOR' => (isset($_POST['ordernumber']))?$_POST['ordernumber']:'',
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