
<div class="modal hide fade in" role="dialog" id="addmoldrepairA" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add request.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addformA">
      <div class="modal-body">
        <!-- <p>Modal body text goes here.</p> -->
        <!-- method="post" action="/1_mes/_query/insert_mold_repair.php" -->
        
                                               
                <div class="form-group row">

                    <div class="col-sm-6">
                        <input type="hidden" id="num" name="num">
                        <label for="inputFirstname" class="col-form-label-sm">REPAIR CONTROL NO.:</label>
                        <input id="pmcontrol" type="text" class="form-control form-control-sm" name="repaircontrol" placeholder="" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">MOLD CODE:</label>
                        <select class="form-control form-control-sm sel" name="moldcode" placeholder="" onchange="listchange()" id="mcl">
                        
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT MOLD_CODE FROM dmc_mold_list ORDER BY MOLD_CODE ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['MOLD_CODE'];
                                        echo "'>";
                                        echo $row['MOLD_CODE'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>
                        
                        </select>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">TOOL NUMBER:</label>
                        <input id="toolnumber" type="text" class="form-control form-control-sm" name="toolnumber" placeholder="" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">ITEM NAME:</label>
                        <input id="itemname" type="text" class="form-control form-control-sm" name="itemname" placeholder="" readonly>
                    </div>                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">ITEM CODE:</label>
                        <input id="itemcode" type="text" class="form-control form-control-sm" name="itemcode" placeholder="" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">CUSTOMER NAME:</label>
                        <input id="customername" type="text" class="form-control form-control-sm" name="customername" placeholder="" readonly>
                    </div>                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">DATE REQUIRED:</label>
                        <input id="daterequired" type="date" class="form-control form-control-sm" name="daterequired" placeholder="" value="">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">TIME REQUIRED:</label>
                        <input id="timerequired" type="time" class="form-control form-control-sm" name="timerequired" placeholder="" value="">
                    </div><?php /* echo date("H:i", time());  */?>
                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">                        
                        <label for="inputFirstname" class="col-form-label-sm">MACHINE CODE:</label>
                        <input type="text" class="form-control form-control-sm" name="machinecode" placeholder="">
                        <!-- <select type="text" class="form-control form-control-sm sel" name="machinecode" placeholder=""> -->

                            <?php

                                /* include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT DISTINCT MACHINE_CODE FROM dmc_item_mold_matching WHERE MACHINE_CODE IS NOT NULL ORDER BY MACHINE_CODE ASC";
                                $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        
                                        echo "<option value='";
                                        echo $row['MACHINE_CODE'];
                                        echo "'>";
                                        echo $row['MACHINE_CODE'];
                                        echo "</option>";
                                    }

                                $conn->close(); */

                            ?>

                        <!-- </select> -->
                    </div>
                    <!-- <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">MOLD SHOT:</label>
                        <input type="text" class="form-control form-control-sm" name="moldshot" placeholder="" readonly>
                    </div>  -->
                    <div class="col-sm-6">
                        <!-- <label for="inputLastname" class="col-form-label-sm">APPROVER:</label>
                        <input type="text" class="form-control form-control-sm" name="approver" placeholder=""> -->
                        <label for="inputFirstname" class="col-form-label-sm">STATUS:</label>
                        <select type="text" class="form-control form-control-sm" name="moldstatus" placeholder="">
                                
                            <option value="WAITING">WAITING</option>
                            <option value="ON-GOING">ON-GOING</option>
                            <option value="DONE">DONE</option>

                        </select>
                    </div>
                                       
                </div>                

                <div class="form-group row">                    
                    <div class="col-sm-6">
                        
                        <label for="defectname" class="checkbox col-form-label-sm">DEFECT NAME:<input type="checkbox" class="ml-2" id="others" onchange="checkFluency(this,dn,dno)"> OTHERS</label>
                                                
                        <select type="text" class="form-control form-control-sm sel" id="dn" name="defectname" placeholder="">
                            
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                            $sql = "SELECT DEFECT_NAME FROM dmc_defect_code ORDER BY DEFECT_NAME ASC";
                            $result = $conn->query($sql);
                            
                                while($row = $result->fetch_assoc()) {

                                    echo "<option value='";
                                    echo $row['DEFECT_NAME'];
                                    echo "'>";
                                    echo $row['DEFECT_NAME'];
                                    echo "</option>";
                                }
                            
                            $conn->close();

                        ?>


                        </select>
                    </div>
                    <div class="col-sm-6">                                               
                        <label for="others" class="col-form-label-sm">SPECIFY DEFECT NAME</label>                                                      
                        <input type="text" class="form-control form-control-sm" name="defectname" placeholder="" id="dno" value="" disabled>
                    </div>                  
                </div>
                
                <!-- <div class="form-group row"> -->

                    <!-- <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">REPAIR REMARKS:</label>
                        <textarea type="text" class="form-control form-control-sm" name="repairremarks" placeholder=""></textarea>
                    </div>   -->                  
                
                    <!-- <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">ACTION TAKEN:</label>
                        <input type="text" class="form-control form-control-sm" name="actiontaken" placeholder="">
                    </div> -->
                <!-- </div> -->

                <!-- <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">ACTION TAKEN:</label>
                        <input type="text" class="form-control form-control-sm" name="moldstatus" placeholder="">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">ACTION TAKEN:</label>
                        <input type="text" class="form-control" name="actiontaken" placeholder="">
                    </div>
                </div>  -->             

                <div class="modal-footer">
                    <button type="button" name='submit' class="btn btn-primary" id="Ainsertsubmit"><i class="far fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
                </div>

            </form>

      </div>
      
    </div>
  </div>
</div>












<div class="modal hide fade in" role="dialog" id="addmoldrepair" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add request.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <p>Modal body text goes here.</p> -->
        <!-- method="post" action="/1_mes/_query/insert_mold_repair.php" -->
        <form name="myForm" id="addform">
                                               
                <div class="form-group row">

                    <div class="col-sm-6">
                        <input type="hidden" id="num" name="num">
                        <label for="inputFirstname" class="col-form-label-sm">REPAIR CONTROL NO.:</label>
                        <input id="apmcontrol" type="text" class="form-control form-control-sm" name="repaircontrol" placeholder="" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">MOLD CODE:</label>
                        <select class="form-control form-control-sm sel" name="moldcode" placeholder="" onchange="alistchange()" id="amcl">
                        
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT MOLD_CODE FROM dmc_mold_list ORDER BY MOLD_CODE ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['MOLD_CODE'];
                                        echo "'>";
                                        echo $row['MOLD_CODE'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>
                        
                        </select>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">TOOL NUMBER:</label>
                        <input id="atoolnumber" type="text" class="form-control form-control-sm" name="toolnumber" placeholder="" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">ITEM NAME:</label>
                        <input id="aitemname" type="text" class="form-control form-control-sm" name="itemname" placeholder="" readonly>
                    </div>                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">ITEM CODE:</label>
                        <input id="aitemcode" type="text" class="form-control form-control-sm" name="itemcode" placeholder="" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">CUSTOMER NAME:</label>
                        <input id="acustomername" type="text" class="form-control form-control-sm" name="customername" placeholder="" readonly>
                    </div>                    
                </div>

                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">DATE REQUIRED:</label>
                        <input id="daterequired" type="date" class="form-control form-control-sm" name="daterequired" placeholder="" value="">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">TIME REQUIRED:</label>
                        <input id="timerequired" type="time" class="form-control form-control-sm" name="timerequired" placeholder="" value="">
                    </div>
                    
                    <!-- <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">MOLD SHOT:</label>
                        <input type="text" class="form-control form-control-sm" name="moldshot" placeholder="" readonly>
                    </div>  -->                   
                </div>

                <div class="form-group row">
                <div class="col-sm-6">                        
                        <label for="inputFirstname" class="col-form-label-sm">MACHINE CODE:</label>
                        <input type="text" class="form-control form-control-sm" name="machinecode" placeholder="">
                        <!-- <select type="text" class="form-control form-control-sm sel" name="machinecode" placeholder=""> -->

                            <?php

                                /* include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT DISTINCT MACHINE_CODE FROM dmc_item_mold_matching WHERE MACHINE_CODE IS NOT NULL ORDER BY MACHINE_CODE ASC";
                                $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        
                                        echo "<option value='";
                                        echo $row['MACHINE_CODE'];
                                        echo "'>";
                                        echo $row['MACHINE_CODE'];
                                        echo "</option>";
                                    }

                                $conn->close(); */

                            ?>

                        <!--  --></select>
                    </div>
                    <div class="col-sm-6">
                        <!-- <label for="inputLastname" class="col-form-label-sm">APPROVER:</label>
                        <input type="text" class="form-control form-control-sm" name="approver" placeholder=""> -->
                        <label for="inputFirstname" class="col-form-label-sm">STATUS:</label>
                        <input type="text" class="form-control form-control-sm" name="moldstatus" placeholder="" value="WAITING" readonly>
                                
                            <!-- <option value="PENDING">PENDING</option>
                            <option value="ON-GOING">ON-GOING</option>
                            <option value="FINISHED">FINISHED</option>

                        </input> -->
                    </div>                  
                    
                </div>

                <div class="form-group row">
                    

                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">DEFECT NAME:<input type="checkbox" class="ml-2" id="arothers" onchange="checkFluency(this,ardn,ardno)"> OTHERS</label>
                        <select id="ardn" type="text" class="form-control form-control-sm sel" name="defectname" placeholder="">
                            
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                            $sql = "SELECT DEFECT_NAME FROM dmc_defect_code ORDER BY DEFECT_NAME ASC";
                            $result = $conn->query($sql);
                            
                                while($row = $result->fetch_assoc()) {

                                    echo "<option value='";
                                    echo $row['DEFECT_NAME'];
                                    echo "'>";
                                    echo $row['DEFECT_NAME'];
                                    echo "</option>";
                                }
                            
                            $conn->close();

                        ?>


                        </select>
                    </div>
                    <div class="col-sm-6">                                               
                        <label for="others" class="col-form-label-sm">SPECIFY DEFECT NAME</label>                                                      
                        <input type="text" class="form-control form-control-sm" name="defectname" placeholder="" id="ardno" value="" disabled>
                    </div>   
                    <!-- <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">REPAIR REMARKS:</label>
                        <select type="text" class="form-control form-control-sm" name="repairremarks" placeholder="">

                            <option value="GOOD">GOOD</option>
                            <option value="NO GOOD">NO GOOD</option>

                        </select>
                    </div>  -->                   
                </div>
                
                <!-- <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">APPROVER:</label>
                        <input type="text" class="form-control form-control-sm" name="approver" placeholder="">
                        <label for="inputFirstname" class="col-form-label-sm">STATUS:</label>
                        <input type="text" class="form-control form-control-sm" name="moldstatus" placeholder="" value="PENDING" readonly>
                                
                            <option value="PENDING">PENDING</option>
                            <option value="ON-GOING">ON-GOING</option>
                            <option value="FINISHED">FINISHED</option>

                        </input>
                    </div>
                
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">ACTION TAKEN:</label>
                        <input type="text" class="form-control form-control-sm" name="actiontaken" placeholder="">
                    </div>
                </div> -->

                <!-- <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">ACTION TAKEN:</label>
                        <input type="text" class="form-control form-control-sm" name="moldstatus" placeholder="">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">ACTION TAKEN:</label>
                        <input type="text" class="form-control" name="actiontaken" placeholder="">
                    </div>
                </div>  -->             

                <div class="modal-footer">
                    <button type="button" name='submit' class="btn btn-primary" id="insertsubmit"><i class="far fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
                </div>

            </form>

      </div>
      
    </div>
  </div>
</div>



<div class="modal hide fade in" role="dialog" id="editmoldrepair" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <p>Modal body text goes here.</p> -->
        <!-- method="post" action="/1_mes/_query/insert_mold_repair.php" -->
        <form name="myForm" id="editform">
                                               
                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">REPAIR CONTROL NO.:</label>
                        <input id="epmcontrol" type="text" class="form-control form-control-sm" name="repaircontrol" placeholder="" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">MOLD CODE:</label>
                        <select class="form-control form-control-sm sel" name="moldcode" placeholder="" onchange="elistchange()" id="emcl">
                        
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT MOLD_CODE FROM dmc_mold_list ORDER BY MOLD_CODE ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['MOLD_CODE'];
                                        echo "'>";
                                        echo $row['MOLD_CODE'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>
                        
                        </select>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">TOOL NUMBER:</label>
                        <input id="etoolnumber" type="text" class="form-control form-control-sm" name="toolnumber" placeholder="" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">ITEM NAME:</label>
                        <input id="eitemname" type="text" class="form-control form-control-sm" name="itemname" placeholder="" readonly>
                    </div>                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">ITEM CODE:</label>
                        <input id="eitemcode" type="text" class="form-control form-control-sm" name="itemcode" placeholder="" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">CUSTOMER NAME:</label>
                        <input id="ecustomername" type="text" class="form-control form-control-sm" name="customername" placeholder="" readonly>
                    </div>                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">DATE REQUIRED:</label>
                        <input id="edaterequired" type="date" class="form-control form-control-sm" name="daterequired" placeholder="" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">TIME REQUIRED:</label>
                        <input id="etimerequired" type="time" class="form-control form-control-sm" name="timerequired" placeholder="">
                    </div>
                    
                </div>

                <div class="form-group row">
                <div class="col-sm-6">                        
                        <label for="inputFirstname" class="col-form-label-sm">MACHINE CODE:</label>
                        <input id="emachinecode" type="text" class="form-control form-control-sm" name="machinecode" placeholder="">

                            <?php

                                /* include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT DISTINCT MACHINE_CODE FROM dmc_item_mold_matching WHERE MACHINE_CODE IS NOT NULL ORDER BY MACHINE_CODE ASC";
                                $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        
                                        echo "<option value='";
                                        echo $row['MACHINE_CODE'];
                                        echo "'>";
                                        echo $row['MACHINE_CODE'];
                                        echo "</option>";
                                    }

                                $conn->close(); */

                            ?>

                        <!-- </input> -->
                    </div>
                    <div class="col-sm-6">
                        <!-- <label for="inputLastname" class="col-form-label-sm">APPROVER:</label>
                        <input type="text" class="form-control form-control-sm" name="approver" placeholder=""> -->
                        <label for="inputFirstname" class="col-form-label-sm">STATUS:</label>
                        <select id="emoldstatus" type="text" class="form-control form-control-sm" name="moldstatus" placeholder="">
                                
                            <option value="WAITING">WAITING</option>
                            <option value="ON-GOING">ON-GOING</option>
                            <option value="DONE">DONE</option>

                        </select>
                    </div>
                    
                    <!-- <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">MOLD SHOT:</label>
                        <input id="emoldshot" type="text" class="form-control form-control-sm" name="moldshot" placeholder="" readonly>
                    </div>  -->                   
                </div>                

                <div class="form-group row">
                    
                    <div class="col-sm-6">
                        <label for="inputLastname" class="col-form-label-sm">DEFECT NAME:<input type="checkbox" class="ml-2" id="eothers" onchange="checkFluency(this,edefectname,edno)"> OTHERS</label>
                        <select id="edefectname" type="text" class="form-control form-control-sm sel" name="defectname" placeholder="">
                            
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                            $sql = "SELECT DEFECT_NAME FROM dmc_defect_code ORDER BY DEFECT_NAME ASC";
                            $result = $conn->query($sql);
                            
                                while($row = $result->fetch_assoc()) {

                                    echo "<option value='";
                                    echo $row['DEFECT_NAME'];
                                    echo "'>";
                                    echo $row['DEFECT_NAME'];
                                    echo "</option>";
                                }
                            
                            $conn->close();

                        ?>


                        </select>
                    </div>

                    <div class="col-sm-6">                                               
                        <label for="others" class="col-form-label-sm">SPECIFY DEFECT NAME</label>                                                      
                        <input type="text" class="form-control form-control-sm" name="defectname" placeholder="" id="edno" value="" disabled>
                    </div>
                     
                    <!-- <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">REPAIR REMARKS:</label>
                        <select id="erepairremarks" type="text" class="form-control form-control-sm" name="repairremarks" placeholder="">

                            <option value="GOOD">GOOD</option>
                            <option value="NO GOOD">NO GOOD</option>

                        </select>
                    </div>  -->                   
                </div>
                
                <!-- <div class="form-group row">

                    <div class="col-sm-6">                        
                        <label for="inputFirstname" class="col-form-label-sm">STATUS:</label>
                        <select id="emoldstatus" type="text" class="form-control form-control-sm" name="moldstatus" placeholder="">
                                
                            <option value="PENDING">PENDING</option>
                            <option value="ON-GOING">ON-GOING</option>
                            <option value="FINISHED">FINISHED</option>

                        </select>
                    </div>                
                </div>   -->                         

                <div class="modal-footer">
                    <button type="button" name='submit' class="btn btn-primary" id="editformsubmit"><i class="far fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
                </div>

            </form>

      </div>
      
    </div>
  </div>
</div>





  <div class="modal hide fade in" role="dialog" id="chcklist" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Inspection Checklist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="checklistform">
      <input type="hidden" id="chkrepaircontrol" name="repaircontrol">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

            <!-- CARD 3 start -->
            <div class="form-group">
                
                <div class="card bg-light p-3"> 
                    <div class="container">

                        <div class="row">                           

                            <div class="col-4">                          
                                
                                <label for="sel1" class="form-label-sm"><b>Checklist type</b></label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                <label for="sel1" class="form-label-sm"><b>Status</b></label> 

                            </div>
                            
                            <div class="col-4">                          

                                <label for="sel1" class="form-label-sm"><b>Checklist type</b></label>                                                                   

                            </div>

                            <div class="col-2">
                                
                                <label for="sel1" class="form-label-sm"><b>Status</b></label> 

                            </div>                            

                        </div><!-- row -->
                        
                        <div class="row">     

                            <div class="col-4">                          

                                    <label for="MRI001" class="form-label-sm">INSPECT PRODUCT</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="MRI001" name="MRI001">
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>
                            
                            <div class="col-4">                          

                                    <label for="MRI005" class="form-label-sm">INSPECT EJECTOR PIN</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="MRI005" name="MRI005">
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>

                        </div><!-- row -->

                        <div class="row">

                            <div class="col-4">                          

                                    <label for="MRI002" class="form-label-sm">INSPECT CAVITY</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="MRI002" name="MRI002">
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>
                            <div class="col-4">                          

                                <label for="MRI006" class="form-label-sm">INSPECT SLIDE CORE</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="MRI006" name="MRI006">
                                    <option>G</option>
                                    <option>NG</option>
                                </select>

                            </div>

                        </div><!-- row -->

                        <div class="row">

                            <div class="col-4">                          

                                    <label for="MRI003" class="form-label-sm">INSPECT CORE</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="MRI003" name="MRI003">
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>

                            <div class="col-4">                          

                                <label for="MRI007" class="form-label-sm">INSPECT HOT SYSTEM</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="MRI007" name="MRI007">
                                    <option>G</option>
                                    <option>NG</option>
                                </select>

                            </div>

                        </div><!-- row -->

                        <div class="row">

                            <div class="col-4">                          

                                    <label for="MRI004" class="form-label-sm">INSPECT CORE INSERT</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="MRI004" name="MRI004">
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>

                            <div class="col-4">                          

                                <label for="MRI008" class="form-label-sm">INSPECT COOLING LINE</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="MRI008" name="MRI008">
                                    <option>G</option>
                                    <option>NG</option>
                                </select>

                            </div>

                        </div><!-- row -->                        
                    
                    </div>

                </div>   
                
            </div>
            <!-- CARD 3 end -->


            <!-- CARD 1 -->
            <div class="form-group">
            <div class="card bg-light">                
                <div class="card-header"><b>Standard PM Procedure</b></div>
                <div class="card-body">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI009" id="MRI009">EXECUTE EJECTOR PIN OF THE LOWER SIDE CLEANING
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI010" id="MRI010">EXECUTE MAIN CORE OF THE UPPER SIDE CLEANING
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI011" id="MRI011">EXECUTE MAIN CORE OF THE LOWER SIDE CLEANING 
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI012" id="MRI012">INSPECT MOVING CORE'S WEAR AND EXECUTE REPAIRING/CLEANING/APPLYING GREASE
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI013" id="MRI013">EXECUTE GATE PIN OF HOT SYSTEM CLEANING AFTER DISASSEMBLE PERFECTLY
                        </label>
                    </div>
                </div> 
            </div>
            </div>
            <!-- CARD 1 end -->
            
            <!-- CARD 2 Start -->
            <div class="form-group">
                <div class="card bg-light">                
                <div class="card-header"><b>Counter Checking after M/T</b></div>
                    <div class="card-body">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI014" id="MRI014">CHECK MOVING PARTS. HAVE GREASE & SHOULD BE STUCK UP FREE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI015" id="MRI015">CHECK TEXTURED SURFACE. SHOULD HAVE NO RUST & SCRATCHES
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI016" id="MRI016">CHECK COOLING LINE. SHOULD HAVE NO WATER LEAKAGE. AFTER TESTING, DRAIN ALL WATERS INSIDE THE COOLING LINES 
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI017" id="MRI017">CHECK MAIN CORE AND CAVITY. SHOULD HAVE NO RUST & DAMAGE PARTS
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI018" id="MRI018">CHECK GUIDE POST & BUSHING. SHOULD HAVE GREASE & FREE FROM DAMAGE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI019" id="MRI019">CHECK GATE PINS AND HOT SYSTEM. SHOULD BE BE FREE FROM DAMAGE & MATERIAL RESIN RESIDUE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI020" id="MRI020">CHECK MOPP TO PREVENT OPENING OF THE MOLD. MAKE SURE TO LOCK AFTER M/T 
                            </label>
                        </div>

                    </div> 
                </div>
            </div>
            <!-- CARD 2 end -->            

            <!-- CARD 4 Start -->
            <div class="form-group">
                
                <div class="card bg-light p-3"> 
                
                    <div class="container">

                        <div class="row">

                            <label for="comment" class="form-label-sm">Action Taken:</label>                           
                            <textarea class="form-control" rows="5" name="actiontaken" id="actiontaken"></textarea>
                            
                        </div><!-- row -->                        
                    
                    </div>

                </div>   
                
            </div>

            <!-- CARD 4 end -->    

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="submit" id="checklistsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-success" name="submit" id="achecklistsubmit"><i class="far fa-save"></i> Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


                                        <!-- Checklist --> 


<div class="modal hide fade in" role="dialog" id="achcklist" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Inspection Checklist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="achecklistform">
      <input type="hidden" id="achkrepaircontrol" name="repaircontrol">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

            <!-- CARD 3 start -->
            <div class="form-group">
                
                <div class="card bg-light p-3"> 
                    <div class="container">

                        <div class="row">                           

                            <div class="col-4">                          
                                
                                <label for="sel1" class="form-label-sm"><b>Checklist type</b></label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                <label for="sel1" class="form-label-sm"><b>Status</b></label> 

                            </div>
                            
                            <div class="col-4">                          

                                <label for="sel1" class="form-label-sm"><b>Checklist type</b></label>                                                                   

                            </div>

                            <div class="col-2">
                                
                                <label for="sel1" class="form-label-sm"><b>Status</b></label> 

                            </div>                            

                        </div><!-- row -->
                        
                        <div class="row">     

                            <div class="col-4">                          

                                    <label for="MRI001" class="form-label-sm">INSPECT PRODUCT</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="aMRI001" name="MRI001" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>
                            
                            <div class="col-4">                          

                                    <label for="MRI005" class="form-label-sm">INSPECT EJECTOR PIN</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="aMRI005" name="MRI005" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>

                        </div><!-- row -->

                        <div class="row">

                            <div class="col-4">                          

                                    <label for="MRI002" class="form-label-sm">INSPECT CAVITY</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="aMRI002" name="MRI002" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>
                            <div class="col-4">                          

                                <label for="MRI006" class="form-label-sm">INSPECT SLIDE CORE</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="aMRI006" name="MRI006" disabled>
                                    <option>G</option>
                                    <option>NG</option>
                                </select>

                            </div>

                        </div><!-- row -->

                        <div class="row">

                            <div class="col-4">                          

                                    <label for="MRI003" class="form-label-sm">INSPECT CORE</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="aMRI003" name="MRI003" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>

                            <div class="col-4">                          

                                <label for="MRI007" class="form-label-sm">INSPECT HOT SYSTEM</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="aMRI007" name="MRI007" disabled>
                                    <option>G</option>
                                    <option>NG</option>
                                </select>

                            </div>

                        </div><!-- row -->

                        <div class="row">

                            <div class="col-4">                          

                                    <label for="MRI004" class="form-label-sm">INSPECT CORE INSERT</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="aMRI004" name="MRI004" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>

                            <div class="col-4">                          

                                <label for="MRI008" class="form-label-sm">INSPECT COOLING LINE</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="aMRI008" name="MRI008" disabled>
                                    <option>G</option>
                                    <option>NG</option>
                                </select>

                            </div>

                        </div><!-- row -->                        
                    
                    </div>

                </div>   
                
            </div>
            <!-- CARD 3 end -->


            <!-- CARD 1 -->
            <div class="form-group">
            <div class="card bg-light">                
                <div class="card-header"><b>Standard PM Procedure</b></div>
                <div class="card-body">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI009" id="aMRI009" disabled>EXECUTE EJECTOR PIN OF THE LOWER SIDE CLEANING
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI010" id="aMRI010" disabled>EXECUTE MAIN CORE OF THE UPPER SIDE CLEANING
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI011" id="aMRI011" disabled>EXECUTE MAIN CORE OF THE LOWER SIDE CLEANING 
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI012" id="aMRI012" disabled>INSPECT MOVING CORE'S WEAR AND EXECUTE REPAIRING/CLEANING/APPLYING GREASE
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI013" id="aMRI013" disabled>EXECUTE GATE PIN OF HOT SYSTEM CLEANING AFTER DISASSEMBLE PERFECTLY
                        </label>
                    </div>
                </div> 
            </div>
            </div>
            <!-- CARD 1 end -->
            
            <!-- CARD 2 Start -->
            <div class="form-group">
                <div class="card bg-light">                
                <div class="card-header"><b>Counter Checking after M/T</b></div>
                    <div class="card-body">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI014" id="aMRI014" disabled>CHECK MOVING PARTS. HAVE GREASE & SHOULD BE STUCK UP FREE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI015" id="aMRI015" disabled>CHECK TEXTURED SURFACE. SHOULD HAVE NO RUST & SCRATCHES
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI016" id="aMRI016" disabled>CHECK COOLING LINE. SHOULD HAVE NO WATER LEAKAGE. AFTER TESTING, DRAIN ALL WATERS INSIDE THE COOLING LINES 
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI017" id="aMRI017" disabled>CHECK MAIN CORE AND CAVITY. SHOULD HAVE NO RUST & DAMAGE PARTS
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI018" id="aMRI018" disabled>CHECK GUIDE POST & BUSHING. SHOULD HAVE GREASE & FREE FROM DAMAGE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI019" id="aMRI019" disabled>CHECK GATE PINS AND HOT SYSTEM. SHOULD BE BE FREE FROM DAMAGE & MATERIAL RESIN RESIDUE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI020" id="aMRI020" disabled>CHECK MOPP TO PREVENT OPENING OF THE MOLD. MAKE SURE TO LOCK AFTER M/T 
                            </label>
                        </div>

                    </div> 
                </div>
            </div>
            <!-- CARD 2 end -->            

            <!-- CARD 4 Start -->
            <div class="form-group">
                
                <div class="card bg-light p-3"> 
                
                    <div class="container">

                        <div class="row">

                            <label for="comment" class="form-label-sm">Action Taken:</label>                           
                            <textarea class="form-control" rows="5" name="actiontaken" id="aactiontaken" readonly></textarea>
                            
                        </div><!-- row -->                        
                    
                    </div>

                </div>   
                
            </div>

            <!-- CARD 4 end -->    

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" name="submit" id="achecklistsubmit"><i class="far fa-save"></i> Approve</button> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


                                        <!-- Checklist --> 


                                        <!-- INSPECT/APPROVE -->       


                                        <!-- INSPECT/APPROVE -->                                    