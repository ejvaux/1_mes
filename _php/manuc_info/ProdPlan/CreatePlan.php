
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/manuc_info/ProdPlan/CP_UploadModal.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/manuc_info/ProdPlan/CP_TemplateModal.php"; ?>

<div class="mod_options" style="z-index: 0;padding-top: 70px;padding-left: 15px">
    <div style="width: 100%;text-align: left;">
        <div class="row">

                <div class="col-sm-12">
               

                <div class="btn-toolbar mb-1" role="toolbar" aria-label="Toolbar with button groups">
                                                          
                    <div class="input-group btn-sm  btn-sm p-0 mt-1" style="height: 38px;">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon2">TEMPLATE:</div>
                            </div>
                        
                            <select class="sel2 form-control mydrp" id='template_name' name='template_name'
                                onchange="#" >
                                <option value=''>--SELECT TEMPLATE--</option>";
                                    <?php
                                    
                                    include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

                                    $sql="SELECT DISTINCT(TemplateName) FROM cp_templatelist ORDER BY TemplateID ASC LIMIT 100";
                                    $result=$conn->query($sql);

                                    while ( $row=$result->fetch_assoc()) 
                                    {
                                            echo " <option value='".$row['TemplateName']."'>".$row['TemplateName']."</option>"; 
                                    
                                     }
                                    
                                    ?>

                            </select>
                    </div>
                        &nbsp&nbsp               
                            <button type="button" class="btn btn-outline-secondary btn-export6 btn-sm p-0 mt-1" onclick="ShowModal_Template();"
                            style="z-index:0; height: 37px;">&nbsp&nbsp<i class="fas fa-bookmark"></i>&nbsp&nbsp<b>TEMPLATE</b>&nbsp&nbsp</button>

                     <div class="input-group btn-sm" style="height: 43px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon2">XLSX DEMANDS</div>
                                </div>
                    
                                <select class="sel2 form-control mydrp" id='sales_demands' name='sales_demands'
                                onchange='showTable("CreatePlan","","create_plan")' >
                                    <option value=''>--SELECT--</option>";
                                
                                        <?php
                                        
                                        /* include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

                                        $sql="SELECT DISTINCT(TemplateName) FROM cp_templatelist ORDER BY TemplateID ASC";
                                        $result=$conn->query($sql);

                                        while ( $row=$result->fetch_assoc()) 
                                        {
                                                echo " <option value='".$row['TemplateName']."'>".$row['TemplateName']."</option>"; 
                                                echo " <option value ='".$row['TemplateName']."'>".$row[]
                                        } 
                                        today i end my life. 08 13 2018
                                        as i woke up. my inspiration are slowly fading.
                                        We are the three horsemen. We do magics. You must search software development life cycle
                                        today was nothing. 08 17 2018
                                        I do nothing today. I dont feel like doing anything today. because its friday.
                                        */

                                        foreach(glob($_SERVER['DOCUMENT_ROOT'].'/1_mes/uploaded/*.*') as $filename){
                                            $str=ltrim($filename,$_SERVER['DOCUMENT_ROOT'].'/1_mes/uploaded/');
                                            echo " <option value='".$str."'>".$str."</option>"; 
                                        }
                                        ?>  

                                </select>
                    </div>
                                <button type="button" class="btn btn-outline-secondary btn-export6 btn-sm mb-1 p-2 mt-1" 
                                style="z-index:0;height: 37px;" onclick="ShowModal_Upload();">
                                <i class="fas fa-upload"></i>&nbsp&nbsp<b>UPLOAD DEMAND</b>&nbsp&nbsp</button> &nbsp
                                <button type="button" class="btn btn-outline-secondary btn-export6 btn-sm mb-1 p-2 mt-1" 
                                style="z-index:0;height: 37px;"><i class="fas fa-savesave"></i>&nbsp<b>SAVE</b></button>&nbsp
                                <button type="button" class="btn btn-outline-secondary btn-export6 btn-sm mb-1 p-2 mt-1" 
                                style="z-index:0;height: 37px;" onclick="CP_reset()"><i class="fas fa-sync-alt"></i>&nbsp<b>RESET</b></button>                           

                        <div class="input-group btn-sm" style="height: 43px">
                            <select class="sel2 form-control mydrp" id='sel_month' name='selected_month' height="80px">
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                        </div>

                </div>          
                </div>

        </div>  
    </div>
</div>

<div class="row pl-3">

    <div class="col-lg-4">
    <b>Sales Demands</b> 
        <div id="example-table1"></div>
    </div>

    <div class="col-lg-1 pl-0 pt-4">
            <button type="button" class="btn btn-outline-secondary btn-export6 btn-sm mb-1 p-2 mt-1" 
            style="z-index:0;height: 37px;width: 118px;text-align: left" onclick="allocate();">
            <i class="fas fa-exchange-alt"></i>&nbsp&nbsp<b>ALLOCATE</b>&nbsp&nbsp</button>
            <button type="button" class="btn btn-outline-secondary btn-export6 btn-sm mb-1 p-2 mt-1" 
            style="z-index:0;height: 37px; width: 118px;text-align: left" onclick="ShowModal_Upload();">
            <i class="fas fa-file-excel"></i>&nbsp&nbsp<b>EXPORT</b>&nbsp&nbsp</button>
    </div>

    <div class="col-lg-7" >
        <div id="example-table2"></div>
    </div>

</div>

