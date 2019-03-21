
<script src="/1_mes/_includes/auth_portal.js"></script>
<span class="nav-item">

    <a id="1" class="btn m-0 p-0 tnv" href="/1_mes/_php/master_database/masterdata.php" data-toggle="tooltip" data-placement="auto" title="Master Database" ><img src="/1_MES/_icons/nav/masterDB.png" style="width:30px;height:30px;"></img></a>
    <a id="2" class="btn m-0 p-0 tnv" href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResult.php" data-toggle="tooltip" data-placement="auto" title="Manufacturing Information" ><img src="/1_MES/_icons/nav/manucinfo.png" style="width:25px;height:25px;"></img></a>
    <a id="3" class="btn m-0 p-0 tnv" href="/1_mes/_php/QualityManagement/QualityManagement.php" data-toggle="tooltip" data-placement="auto" title="Quality Management" ><img src="/1_MES/_icons/nav/quality.png" style="width:25px;height:25px;"></img></a> 
    <a id="4" class="btn m-0 p-0 tnv" href="/1_mes/_php/mold_maintenance/mold_maintenance.php" data-toggle="tooltip" data-placement="auto" title="Mold Maintenance" ><img src="/1_MES/_icons/nav/mold.png" style="width:25px;height:25px;"></img></a>
    <a id="5" class="btn m-0 p-0 tnv" href="/1_MES/_php/machine_maintenance/machine_maintenance.php" data-toggle="tooltip" data-placement="auto" title="Machine Maintenance" ><img src="/1_MES/_icons/nav/machine.png" style="width:25px;height:25px;"></img></a>
    <!-- <a id="6" class="btn m-0 p-0 tnv" href="" data-toggle="tooltip" data-placement="auto" title="Management Indices" ><img src="/1_MES/_icons/nav/reports.png" style="width:25px;height:25px;"></img></a> -->
    <a id="6" class="btn m-0 p-0 tnv" href="/1_smt/public/smtmasterdb" data-toggle="tooltip" data-placement="auto" title="SMT Master Database" ><img src="/1_MES/_icons/nav/613756.jpg" style="width:25px;height:25px;"></img></a>

<!-- <ul class="navbar-nav">

    <li><a id="1" class="btn m-0 p-0 tnv" href="/1_mes/_php/master_database/masterdata.php" data-toggle="tooltip" data-placement="auto" title="Master Database" ><img src="/1_MES/_icons/nav/masterDB.png" style="width:30px;height:30px;"></img></a></li>
    <li><a id="2" class="btn m-0 p-0 tnv" href="/1_mes/_php/manuc_info/ProdPlan/ProdPlanVsResult.php" data-toggle="tooltip" data-placement="auto" title="Manufacturing Information" ><img src="/1_MES/_icons/nav/manucinfo.png" style="width:25px;height:25px;"></img></a></li>
    <li><a id="3" class="btn m-0 p-0 tnv" href="/1_mes/_php/QualityManagement/QualityManagement.php" data-toggle="tooltip" data-placement="auto" title="Quality Management" ><img src="/1_MES/_icons/nav/quality.png" style="width:25px;height:25px;"></img></a></li>    
    <li><a id="4" class="btn m-0 p-0 tnv" href="/1_mes/_php/mold_maintenance/mold_maintenance.php" data-toggle="tooltip" data-placement="auto" title="Mold Maintenance" ><img src="/1_MES/_icons/nav/mold.png" style="width:25px;height:25px;"></img></a></li>
    <li><a id="5" class="btn m-0 p-0 tnv" href="/1_MES/_php/machine_maintenance/machine_maintenance.php" data-toggle="tooltip" data-placement="auto" title="Machine Maintenance" ><img src="/1_MES/_icons/nav/machine.png" style="width:25px;height:25px;"></img></a></li>
    <li><a id="6" class="btn m-0 p-0 tnv" href="" data-toggle="tooltip" data-placement="auto" title="Management Indices" ><img src="/1_MES/_icons/nav/reports.png" style="width:25px;height:25px;"></img></a></li>
    
</ul> -->
</span>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    <?php 
    
    $aut = $_SESSION['auth']; 
    $aut = stripslashes($aut); 
    
    ?>
    var val = "<?php echo $aut; ?>";
    hide(val);

</script>