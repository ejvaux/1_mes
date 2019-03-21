<!DOCTYPE html>

<html lang="en" class="html">
    
    <head>
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/header.php"; 
            $auth = $_SESSION['auth'];
            $auth = stripslashes($auth);            
        ?>
        
        <link rel ="stylesheet" href="/1_MES/css/animate.css">
                    
        <title>Portal | MES - Primatech</title>
        <script src="/1_mes/_includes/auth_portal.js"></script>
        <style type="text/css">
            body{
                background-image: url('/1_MES/_images/symphony.png'); 
                background-repeat: repeat;
            }
            /* .page-bg {
                background: url('http://preview.ibb.co/iWOown/DSC_3967.jpg')no-repeat center center fixed;
                -webkit-filter: blur(2px);
                -moz-filter: blur(2px);
                -o-filter: blur(2px);
                -ms-filter: blur(2px);/1_MES/_images/primatech-logo_bg.png
                filter: blur(2px);
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                z-index: -1;
                background-size: cover;
                filter:brightness(110%);
            }  */ 
            
            /* a:link {
                
                color: rgba(0,0,0,.5); 
                background-color: transparent; 
                text-decoration: none;
            }

            a:visited {
                color: rgba(0,0,0,.5);
                background-color: transparent;
                text-decoration: none;
            }

            a:hover {
                color: red;
                background-color: transparent;
                text-decoration: none;
            }

            a:active {
                color: yellow;
                background-color: transparent;
                text-decoration: none;
            }  */ 
            
            a.modlink:visited {
                color: black;
                background-color: transparent;
                text-decoration: none;
            }
                            
            .tr {
                background: rgba(230, 230, 250, 0.35);
                border-radius: 3px;
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
                border: 7px solid #cecece;
                /* margin-top: 75px; */
                margin-top: 20px;
                width: 60%;
            }

            .animateIcon:hover
            {  
                -webkit-animation: flip;
                animation-iteration-count: infinite;
                animation-duration: 2s;

            }

            #con {         
                border-image-source: url('/1_MES/_icons/border-img.png');
                border-image-slice: 90 90 90 90; 
                border-image-width: 25px 25px 25px 25px;
                border-image-outset: 20px 20px 20px 20px; 
                border-image-repeat: stretch stretch;

                /* border-image-slice: 360 455 400 470; 
                border-image-width: 150px 150px 150px 150px; 
                border-image-outset: 120px 100px 100px 100px; 
                border-image-repeat: stretch stretch; 
                border-image-source: url("http://www.freepngimg.com/download/decorative_border/34887-6-purple-border-frame-transparent.png"); */
                
            }

            /* .btn-outline-primary{
                border: 0;
                color: rgba(0,0,0,.5);
                outline: none;
            }

            .btn-outline-primary:hover{
                background-color: transparent;
                color: red;
                text-decoration: none;
                box-shadow: none;
                outline: none;
            }

            .btn-outline-primary:visited,.btn-outline-primary:link,.btn-outline-primary:focus,.btn-outline-primary:active
            ,.btn-outline-primary:active:focus{
                background-color: transparent !important;
                color: rgba(0,0,0,.5) !important;
                text-decoration: none !important;
                outline: none !important;
            } */


        
        </style>

    </head>    
        
    <body>

    <script>
        NProgress.configure({  showSpinner: false });    
        NProgress.start();          
        NProgress.inc();
    </script>
            
    <div class="page-bg"></div>
        
            <!-- Navbar - START -->
                <?php
                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/navbar.php";            
                ?>
            <!-- Navbar - END -->                    
             
        <div class="container rounded tr" id="con">                    
                                         
            <div class="row mt-4" style="text-align:center;">
                                
                <!-- <div class="col"></div> -->
                
                <div class="col-md-4" >
                    
                    <!-- Master database -->
                    
                    <a href='/1_MES/_php/master_database/masterdata.php' class="btn" id="1" >
                    
                    <div class="faa-bounce animated-hover faa-slow">
                        
                        <img src="/1_MES/_icons/portal/master_data.png" class="rounded img-fluid" alt="Master Database" width="200" height="200">
                        <!-- <p>Master Data</p> -->
                    
                    </div>
                        
                    </a>
                    
                </div> 
                
                <div class="col-md-4" >
                
                    <!-- Manufacturing Information -->
                    
                    <a href='/1_MES/_php/manuc_info/ProdPlan/ProdPlanVsResult.php' class="btn" id="2" >
                    
                    <div class="faa-bounce animated-hover faa-slow">
                        
                        <img src="/1_MES/_icons/portal/manuc_info.png" class="rounded img-fluid" alt="Manufacturing Information" width="200" height="200">
                        <!-- <p>Manufacturing Information</p> -->
                    
                    </div>
                        
                    </a>
                    
                </div> 
                
                <div class="col-md-4" >    
                    
                    <!-- Quality Management -->
                    
                    <a href='/1_MES/_php/QualityManagement/QualityManagement.php' class="btn" id="3" >
                    
                    <div class="faa-bounce animated-hover faa-slow">
                        
                        <img src="/1_MES/_icons/portal/quality_management.png" class="rounded img-fluid" alt="Quality Management" width="200" height="200">
                        <!-- <p>Quality Management</p> -->
                    
                    </div>
                        
                    </a>
                     
                </div>
                
                <!-- <div class="col"></div> -->
                            
                
            </div>
            
            <div class="row mb-4" style="text-align:center;">
                
                <!-- <div class="col"></div> -->
                
                <div class="col-md-4">
                    
                    <!-- Mold Maintenance -->
                    
                    <a href='/1_MES/_php/mold_maintenance/mold_maintenance.php' class="btn" id="4" >
                    
                    <div class="faa-bounce animated-hover faa-slow" >
                        
                        <img src="/1_MES/_icons/portal/mold_management.png" class="rounded img-fluid" alt="Mold Maintenance" width="200" height="200">
                        <!-- <p>Mold Maintenance</p> -->
                    
                    </div>
                        
                    </a>
                
                </div> 
                
                <div class="col-md-4">
                    
                    <!-- Machine Maintenance -->
                    
                    <a href='/1_MES/_php/machine_maintenance/machine_maintenance.php' class="btn" id="5" >
                                        
                    <div class="faa-bounce animated-hover faa-slow">
                        
                        <img src="/1_MES/_icons/portal/machine_management.png" class="rounded img-fluid" alt="Machine Maintenance" width="200" height="200">
                        <!-- <p>Machine Maintenance</p> -->
                    
                    </div>
                        
                    </a>
                                            
                </div>
                
                <div class="col-md-4">
                    
                    <!-- Management Indices -->
                    
                    <!-- <a href='/1_MES/_template/pagetemplate.php' class="btn" id="6" > -->
                    <a href='/1_smt/public/smtmasterdb/<?php echo $_SESSION["user_num"]; ?>' class="btn" id="6" >

                    <div class="faa-bounce animated-hover faa-slow">
                        
                        <img src="/1_MES/_icons/portal/management_indices.png" class="rounded img-fluid" alt="Management Indices" width="200" height="200">
                        <!-- <p>Management Indices</p> -->
                    
                    </div>
                        
                    </a>
                                
                </div>
                
                <!-- <div class="col"></div> -->
                
                        
            </div>
                        
        </div>    
        <div class="mdl" style=" z-index: 1"><!-- Place at bottom of page --></div>
    <script>              
    <?php
        $auth = $_SESSION['auth'];
        $auth = stripslashes($auth);     
    ?>    
    hide("<?php echo $auth; ?>");

    var timer;

    $(document).ajaxStart(function () {
        timer = setTimeout(function() { $body.addClass("loading"); }, 500);

    }).ajaxStop(function () {
        clearTimeout(timer);
        $body.removeClass("loading");
    })
    NProgress.done();
    </script>
    </body>

</html>