
<!--  Session Check -->   

<?php      
        
if(!isset($_SESSION['username'])) {
    header("Location: /1_mes/");
    exit();
}

else{    
    $log = "true";
}
?>                    
