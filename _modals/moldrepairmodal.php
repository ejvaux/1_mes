
<div class="modal hide fade in" role="dialog" id="addmoldrepairA" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add request.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addformA" method="post">
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
                        <select class="form-control form-control-sm sel" name="moldcode" placeholder="" onchange="listchange()" id="mcl" required>
                        <option value="">Please select</option>
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
                    <!-- <div class="col-sm-6"> -->
                        <!-- <label for="inputLastname" class="col-form-label-sm">MOLD SHOT:</label> -->
                        <!-- <input type="hidden" class="form-control form-control-sm" name="moldshot" placeholder="" readonly> -->
                    <!-- </div>  -->
                    <div class="col-sm-6">
                        <!-- <label for="inputLastname" class="col-form-label-sm">APPROVER:</label>
                        <input type="text" class="form-control form-control-sm" name="approver" placeholder=""> -->
                        <label for="inputFirstname" class="col-form-label-sm">STATUS:</label>
                        <select type="text" class="form-control form-control-sm" name="moldstatus" placeholder="" required>
                            
                            <option value="">Please select</option>
                            <option value="WAITING">WAITING</option>
                            <option value="ON-GOING">ON-GOING</option>
                            <option value="FOR MOLD TRIAL">FOR MOLD TRIAL</option>
                            <option value="QC APPROVED">QC APPROVED</option>                          

                        </select>
                    </div>
                                       
                </div>                

                <div class="form-group row">                    
                    <div class="col-sm-6">
                        
                        <label for="defectname" class="checkbox col-form-label-sm">DEFECT NAME:<input type="checkbox" class="ml-2" id="others" onchange="checkFluency(this,dn,dno)"> OTHERS</label>
                                                
                        <select type="text" class="form-control form-control-sm sel" id="dn" name="defectname" placeholder="" required>
                        <option value="">Please select</option>
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
                    <button type="submit" name='submit' class="btn btn-primary" id="Ainsertsubmit"><i class="far fa-save"></i> Save</button>
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
        <form name="myForm" id="addform"  method="post">
                                               
                <div class="form-group row">

                    <div class="col-sm-6">
                        <input type="hidden" id="num" name="num">
                        <label for="inputFirstname" class="col-form-label-sm">REPAIR CONTROL NO.:</label>
                        <input id="apmcontrol" type="text" class="form-control form-control-sm" name="repaircontrol" placeholder="" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">MOLD CODE:</label>
                        <select class="form-control form-control-sm sel" name="moldcode" placeholder="" onchange="alistchange()" id="amcl" required>
                        <option value="">Please select</option>
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
                        <select id="ardn" type="text" class="form-control form-control-sm sel" name="defectname" placeholder=""  required>
                        <option value="">Please select</option>
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
                    <button type="submit" name='submit' class="btn btn-primary" id="insertsubmit"><i class="far fa-save"></i> Save</button>
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
        <form name="myForm" id="editform"  method="post">
        <input type="hidden" id="emoldrepairid" name="id">
                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">REPAIR CONTROL NO.:</label>
                        <input id="epmcontrol" type="text" class="form-control form-control-sm" name="repaircontrol" placeholder="" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="inputFirstname" class="col-form-label-sm">MOLD CODE:</label>
                        <select class="form-control form-control-sm sel" name="moldcode" placeholder="" onchange="elistchange()" id="emcl" required>
                        <option value="">Please select</option>
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
                        <input type="hidden" id="hemoldstatus" name="moldstatus" disabled>
                        <label for="inputFirstname" class="col-form-label-sm">STATUS:</label>
                        <select id="emoldstatus" type="text" class="form-control form-control-sm" name="moldstatus" placeholder="" required>
                            
                            <option value="">Please select</option>
                            <option value="WAITING">WAITING</option>
                            <option value="ON-GOING">ON-GOING</option>
                            <option value="FOR MOLD TRIAL">FOR MOLD TRIAL</option>
                            <option value="QC APPROVED">QC APPROVED</option>

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
                        <select id="edefectname" type="text" class="form-control form-control-sm sel" name="defectname" placeholder="" required>
                        <option value="">Please select</option>
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
                    <button type="submit" name='submit' class="btn btn-primary" id="editformsubmit"><i class="far fa-save"></i> Save</button>
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
      <form id="checklistform"  method="post">
      <input type="hidden" id="chkmoldrepairid" name="id">
      <input type="hidden" id="chkrepaircontrol" name="repaircontrol">
      <input type="hidden" id="chkmoldstatus" name="moldstatus">
      <input type="hidden" id="chkrequestdate" name="requestdate">
      <input type="hidden" id="chkmoldcode" name="moldcode">
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
        <button type="button" class="btn btn-success" name="submit" id="achecklistsubmit"><i class="fas fa-check"></i> Approve</button>
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
      <form id="achecklistform"  method="post">
      <input type="hidden" id="achkmoldrepairid" name="id">
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


                                        <!-- QC Checklist --> 


<div class="modal hide fade in" role="dialog" id="qcchcklist" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Inspection Checklist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="qcchecklistform"  method="post">
      <input type="hidden" id="qcchkmoldrepairid" name="id">
      <input type="hidden" id="qcchkrepaircontrol" name="repaircontrol">
      <input type="hidden" id="qcchkrequestdate" name="requestdate">
      <input type="hidden" id="qcchkmoldcode" name="moldcode">
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
                                    
                                    <select class="form-control-sm" id="qcMRI001" name="MRI001" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>
                            
                            <div class="col-4">                          

                                    <label for="MRI005" class="form-label-sm">INSPECT EJECTOR PIN</label>                                                                   

                            </div>

                            <div class="col-2">
                                    
                                    <select class="form-control-sm" id="qcMRI005" name="MRI005" disabled>
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
                                    
                                    <select class="form-control-sm" id="qcMRI002" name="MRI002" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>
                            <div class="col-4">                          

                                <label for="MRI006" class="form-label-sm">INSPECT SLIDE CORE</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="qcMRI006" name="MRI006" disabled>
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
                                    
                                    <select class="form-control-sm" id="qcMRI003" name="MRI003" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>

                            <div class="col-4">                          

                                <label for="MRI007" class="form-label-sm">INSPECT HOT SYSTEM</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="qcMRI007" name="MRI007" disabled>
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
                                    
                                    <select class="form-control-sm" id="qcMRI004" name="MRI004" disabled>
                                        <option>G</option>
                                        <option>NG</option>
                                    </select>

                            </div>

                            <div class="col-4">                          

                                <label for="MRI008" class="form-label-sm">INSPECT COOLING LINE</label>                                                                   

                            </div>

                            <div class="col-2">

                                <select class="form-control-sm" id="qcMRI008" name="MRI008" disabled>
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
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI009" id="qcMRI009" disabled>EXECUTE EJECTOR PIN OF THE LOWER SIDE CLEANING
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI010" id="qcMRI010" disabled>EXECUTE MAIN CORE OF THE UPPER SIDE CLEANING
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI011" id="qcMRI011" disabled>EXECUTE MAIN CORE OF THE LOWER SIDE CLEANING 
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI012" id="qcMRI012" disabled>INSPECT MOVING CORE'S WEAR AND EXECUTE REPAIRING/CLEANING/APPLYING GREASE
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input form-control-sm" name="MRI013" id="qcMRI013" disabled>EXECUTE GATE PIN OF HOT SYSTEM CLEANING AFTER DISASSEMBLE PERFECTLY
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
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI014" id="qcMRI014" disabled>CHECK MOVING PARTS. HAVE GREASE & SHOULD BE STUCK UP FREE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI015" id="qcMRI015" disabled>CHECK TEXTURED SURFACE. SHOULD HAVE NO RUST & SCRATCHES
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI016" id="qcMRI016" disabled>CHECK COOLING LINE. SHOULD HAVE NO WATER LEAKAGE. AFTER TESTING, DRAIN ALL WATERS INSIDE THE COOLING LINES 
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI017" id="qcMRI017" disabled>CHECK MAIN CORE AND CAVITY. SHOULD HAVE NO RUST & DAMAGE PARTS
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI018" id="qcMRI018" disabled>CHECK GUIDE POST & BUSHING. SHOULD HAVE GREASE & FREE FROM DAMAGE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI019" id="qcMRI019" disabled>CHECK GATE PINS AND HOT SYSTEM. SHOULD BE BE FREE FROM DAMAGE & MATERIAL RESIN RESIDUE
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input form-control-sm" name="MRI020" id="qcMRI020" disabled>CHECK MOPP TO PREVENT OPENING OF THE MOLD. MAKE SURE TO LOCK AFTER M/T 
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
                            <textarea class="form-control" rows="5" name="actiontaken" id="qcactiontaken" readonly></textarea>
                            
                        </div><!-- row -->                        
                    
                    </div>

                </div>   
                
            </div>

            <!-- CARD 4 end -->    

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="submit" id="qcchecklistsubmit"><i class="fas fa-check"></i> QC Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


                                        <!-- QC Checklist --> 


<!--_________________________________ Insert History ________________________________________-->


<div class="modal hide fade in" role="dialog" id="addmoldhistory" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Mold History.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addmoldhistoryform" method="post">
      <input type="hidden" id="moldhistoryid" name="moldhistoryid">
      <div class="modal-body">      
                                                       
                <div class="form-group row">                   

                    <div class="col-sm-6">
                        <label for="historymoldcode" class="col-form-label-sm">MOLD CODE:</label>
                        <select id="historymoldcode" class="form-control form-control-sm sel" name="moldcode" placeholder="" required>
                        <option value="">Please select</option>
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
                    <div class="col-sm-6">                        
                        <label for="historyrequestdate" class="col-form-label-sm">REQUEST DATE:</label>
                        <input id="historyrequestdate" type="date" class="form-control form-control-sm" name="requestdate">
                    </div>
                    
                </div>
                
                <div class="form-group row">                   

                    <div class="col-sm-6">
                        <label for="historyrepairdate" class="col-form-label-sm">REPAIR DATE:</label>
                        <input id="historyrepairdate" type="date" class="form-control form-control-sm" name="repairdate" placeholder="">                        
                    </div>                    
                    
                </div> 

                <div class="modal-footer">
                    <button type="submit" name='submit' class="btn btn-primary" id="addmoldhistorysubmit"><i class="far fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
                </div>

            </form>

      </div>
      
    </div>
  </div>
</div>

<!--_________________________________ Insert History ________________________________________-->



<!--_________________________________ Edit History ________________________________________-->


<div class="modal hide fade in" role="dialog" id="editmoldhistory" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Mold History.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editmoldhistoryform" method="post">
      <input type="hidden" id="emoldhistoryid" name="id">
      <div class="modal-body">      
                                                       
                <div class="form-group row">                   

                    <div class="col-sm-6">
                        <label for="ehistorymoldcode" class="col-form-label-sm">MOLD CODE:</label>
                        <select id="ehistorymoldcode" class="form-control form-control-sm sel" name="moldcode" placeholder="" required>
                        <option value="">Please select</option>
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
                    <div class="col-sm-6">                        
                        <label for="ehistoryrequestdate" class="col-form-label-sm">REQUEST DATE:</label>
                        <input id="ehistoryrequestdate" type="date" class="form-control form-control-sm" name="requestdate">
                    </div>
                    
                </div>
                
                <div class="form-group row">                   

                    <div class="col-sm-6">
                        <label for="ehistoryrepairdate" class="col-form-label-sm">REPAIR DATE:</label>
                        <input id="ehistoryrepairdate" type="date" class="form-control form-control-sm" name="repairdate" placeholder="">                        
                    </div>                    
                    
                </div> 

                <div class="modal-footer">
                    <button type="submit" name='submit' class="btn btn-primary" id="editmoldhistorysubmit"><i class="far fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
                </div>

            </form>

      </div>
      
    </div>
  </div>
</div>

<!--_________________________________ Edit History ________________________________________-->


<!--_________________________________ Insert Fabrication A ________________________________________-->


<div class="modal hide fade in" role="dialog" id="addmoldfabrication" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new fabrication.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addmoldfabricationform" method="post">
      <input type="hidden" id="addmoldfabricationid" name="moldfabricationid">
      <div class="modal-body">      
                                                       
                <div class="form-group row">
                
                    <div class="col-sm-6">
                        <label for="aordernumber" class="col-form-label-sm ">ORDER NUMBER:</label>
                        <input id="aordernumber" type="text" class="form-control form-control-sm" name="ordernumber" placeholder="" readonly>                        
                    </div> 

                    <div class="col-sm-6">
                        <label for="amanufacturedate" class="col-form-label-sm ">MANUFACTURE DATE:</label>
                        <input id="amanufacturedate" type="date" class="form-control form-control-sm" name="manufacturedate" placeholder="" required>                        
                    </div> 

                    <div class="col-sm-6">
                        <label for="addmoldfabricationmcode" class="col-form-label-sm mt-2">MOLD CODE:</label>
                        <select id="addmoldfabricationmcode" class="form-control form-control-sm sel" name="moldcode" placeholder="" required>
                        <option value="">Please select</option>
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

                    <div class="col-sm-6">                        
                        <label for="acustomercode" class="col-form-label-sm mt-2">CUSTOMER CODE:</label>
                        <select id="acustomercode" type="text" class="form-control form-control-sm sel" name="customercode" onchange="getcus_name(acustomercode,acustomername)" placeholder="" required>
                        <option value="">Please select</option>
                            <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT CUSTOMER_CODE FROM dmc_customer ORDER BY CUSTOMER_CODE ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {

                                        echo "<option value='";
                                        echo $row['CUSTOMER_CODE'];
                                        echo "'>";
                                        echo $row['CUSTOMER_CODE'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                            ?>

                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="acustomername" class="col-form-label-sm mt-2">CUSTOMER NAME:</label>
                        <input id="acustomername" type="text" class="form-control form-control-sm" name="customername" placeholder="" readonly>                        
                    </div>  

                    <div class="col-sm-6">                        
                        <label for="acurrentprocess" class="col-form-label-sm mt-2">INITIAL PROCESS:</label>
                        <select id="acurrentprocess" type="text" class="form-control form-control-sm sel" name="currentprocess" placeholder="" required>
                        <option value="">Please select</option>
                            <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT PROCESS_NAME FROM mmc_mold_fabrication_process";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {

                                        echo "<option value='";
                                        echo $row['PROCESS_NAME'];
                                        echo "'>";
                                        echo $row['PROCESS_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                            ?>

                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="adeliveryplan" class="col-form-label-sm mt-2">DELIVERY PLAN:</label>
                        <input id="adeliveryplan" type="date" class="form-control form-control-sm" name="deliveryplan" placeholder="" required>                        
                    </div>

                    <div class="col-sm-6">
                        <label for="aoperator" class="col-form-label-sm mt-2">OPERATOR:</label>
                        <select id="aoperator" type="text" class="form-control form-control-sm" name="operator" placeholder="" required>
                        <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                        </select>                       
                    </div>                                           
                    
                </div> 

                <div class="modal-footer">
                    <button type="submit" name='submit' class="btn btn-primary" id="addmoldfabricationsubmit"><i class="far fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
                </div>

            </form>

      </div>
      
    </div>
  </div>
</div>

<!--_________________________________ Insert Fabrication A ________________________________________-->


<!--_________________________________ Update Fabrication A ________________________________________-->


<div class="modal hide fade in" role="dialog" id="emoldfabrication" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update fabrication.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="emoldfabricationform" method="post">
      <input type="hidden" id="emoldfabricationid" name="moldfabricationid">
      <div class="modal-body">      
                                                       
                <div class="form-group row">
                
                    <div class="col-sm-6">
                        <label for="eordernumber" class="col-form-label-sm ">ORDER NUMBER:</label>
                        <input id="eordernumber" type="text" class="form-control form-control-sm" name="ordernumber" placeholder="" readonly>                        
                    </div> 

                    <div class="col-sm-6">
                        <label for="emanufacturedate" class="col-form-label-sm ">MANUFACTURE DATE:</label>
                        <input id="emanufacturedate" type="date" class="form-control form-control-sm" name="manufacturedate" placeholder="" required>                        
                    </div> 

                    <div class="col-sm-6">
                        <label for="emoldfabricationmcode" class="col-form-label-sm mt-2">MOLD CODE:</label>
                        <select id="emoldfabricationmcode" class="form-control form-control-sm sel" name="moldcode" placeholder="" required>
                        <option value="">Please select</option>
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

                    <div class="col-sm-6">                        
                        <label for="ecustomercode" class="col-form-label-sm mt-2">CUSTOMER CODE:</label>
                        <select id="ecustomercode" type="text" class="form-control form-control-sm sel" name="customercode" onchange="getcus_name(ecustomercode,ecustomername)" placeholder="" required>
                        <option value="">Please select</option>
                            <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT CUSTOMER_CODE FROM dmc_customer ORDER BY CUSTOMER_CODE ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {

                                        echo "<option value='";
                                        echo $row['CUSTOMER_CODE'];
                                        echo "'>";
                                        echo $row['CUSTOMER_CODE'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                            ?>

                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="ecustomername" class="col-form-label-sm mt-2">CUSTOMER NAME:</label>
                        <input id="ecustomername" type="text" class="form-control form-control-sm" name="customername" placeholder="" readonly>                        
                    </div>  

                    <div class="col-sm-6">                        
                        <label for="ecurrentprocess" class="col-form-label-sm mt-2">CURRENT PROCESS:</label>
                        <select id="ecurrentprocess" type="text" class="form-control form-control-sm sel" name="currentprocess" placeholder="" required>
                        <option value="">Please select</option>
                            <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT PROCESS_NAME FROM mmc_mold_fabrication_process";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {

                                        echo "<option value='";
                                        echo $row['PROCESS_NAME'];
                                        echo "'>";
                                        echo $row['PROCESS_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                            ?>

                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="edeliveryplan" class="col-form-label-sm mt-2">DELIVERY PLAN:</label>
                        <input id="edeliveryplan" type="date" class="form-control form-control-sm" name="deliveryplan" placeholder="" required>                        
                    </div>

                    <div class="col-sm-6">
                        <label for="eoperator" class="col-form-label-sm mt-2">OPERATOR:</label>
                        <select id="eoperator" type="text" class="form-control form-control-sm" name="operator" placeholder="" required>
                        <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>
                        
                        </select>                        
                    </div>                                           
                    
                </div> 

                <div class="modal-footer">
                    <button type="submit" name='submit' class="btn btn-primary" id="emoldfabricationsubmit"><i class="far fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
                </div>

            </form>

      </div>
      
    </div>
  </div>
</div>

<!--_________________________________ Update Fabrication A ________________________________________-->


<!--_________________________________ Fabrication Change Process ________________________________________-->

<div class="modal hide fade in" role="dialog" id="changeprocess" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Process.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="changeprocessform" method="post">
      <input type="hidden" id="cmoldfabricationid" name="moldfabricationid">
      <input type="hidden" id="prevprocess" name="prevprocess">
      <input type="hidden" id="prevprocessdatetime" name="prevprocessdatetime">
      <div class="modal-body">

            <div class="form-group row mt-0 mb-0 p-0">
                
                <div class="col-sm-3">
                    <label class="col-form-label-sm">PROCESS</label>
                </div>
                <div class="col-sm-5">
                    <label class="col-form-label-sm">LEAD TIME</label>           
                </div>                
                <div class="col-sm-4">
                    <label class="col-form-label-sm">OPERATOR</label>
                </div>                
            
            </div>

            <div class="form-group row mt-0 mb-0 p-0">                  
                
                <div class="col-sm-3">
                    <label class="col-form-label-sm">DESIGN-1</label>
                </div>
                <div class="col-sm-5">                    
                    <input id="leadtime_1" type="text" class="form-control form-control-sm" name="leadtime_1" placeholder="" readonly>        
                </div>
                <div class="col-sm-4">
                    <input id="operator_1" type="text" class="form-control form-control-sm" name="operator_1" placeholder="" readonly>                    
                </div>                                          

            </div>
            <div class="form-group row mt-0 mb-0 p-0">           

                <div class="col-sm-3">
                    <label class="col-form-label-sm">DESIGN-2</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_2" type="text" class="form-control form-control-sm" name="leadtime_2" placeholder="" readonly>            
                </div>
                <div class="col-sm-4">
                    <input id="operator_2" type="text" class="form-control form-control-sm" name="operator_2" placeholder="" readonly>
                </div>                          

            </div>
            <div class="form-group row mt-0 mb-0 p-0">            
                
                <div class="col-sm-3">
                    <label class="col-form-label-sm">DESIGN-3</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_3" type="text" class="form-control form-control-sm" name="leadtime_3" placeholder="" readonly>          
                </div>
                <div class="col-sm-4">
                    <input id="operator_3" type="text" class="form-control form-control-sm" name="operator_3" placeholder="" readonly>
                </div>                                               

            </div>
            <div class="form-group row mt-0 mb-0 p-0">            

                <div class="col-sm-3">
                    <label class="col-form-label-sm">RADIAL-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_4" type="text" class="form-control form-control-sm" name="leadtime_4" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_4" type="text" class="form-control form-control-sm" name="operator_4" placeholder="" readonly>
                </div>                   

            </div>
            <div class="form-group row mt-0 mb-0 p-0">            

                <div class="col-sm-3">
                    <label class="col-form-label-sm">LATHER-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_5" type="text" class="form-control form-control-sm" name="leadtime_5" placeholder="" readonly>         
                </div>
                <div class="col-sm-4">
                    <input id="operator_5" type="text" class="form-control form-control-sm" name="operator_5" placeholder="" readonly>
                </div>                       

            </div>
            <div class="form-group row mt-0 mb-0 p-0">           

                <div class="col-sm-3">
                    <label class="col-form-label-sm">BANDSAW</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_6" type="text" class="form-control form-control-sm" name="leadtime_6" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_6" type="text" class="form-control form-control-sm" name="operator_6" placeholder="" readonly>
                </div>                     

            </div>
            <div class="form-group row mt-0 mb-0 p-0">          

                <div class="col-sm-3">
                    <label class="col-form-label-sm">ML</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_7" type="text" class="form-control form-control-sm" name="leadtime_7" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_7" type="text" class="form-control form-control-sm" name="operator_7" placeholder="" readonly>
                </div>                           

            </div>
            <div class="form-group row mt-0 mb-0 p-0">            

                <div class="col-sm-3">
                    <label class="col-form-label-sm">GS-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_8" type="text" class="form-control form-control-sm" name="leadtime_8" placeholder="" readonly>            
                </div>
                <div class="col-sm-4">
                    <input id="operator_8" type="text" class="form-control form-control-sm" name="operator_8" placeholder="" readonly>
                </div>                      

            </div>       
            <div class="form-group row mt-0 mb-0 p-0">                      

                <div class="col-sm-3">
                    <label class="col-form-label-sm">GS-2</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_9" type="text" class="form-control form-control-sm" name="leadtime_9" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_9" type="text" class="form-control form-control-sm" name="operator_9" placeholder="" readonly>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                  

                <div class="col-sm-3">
                    <label class="col-form-label-sm">HSM</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_10" type="text" class="form-control form-control-sm" name="leadtime_10" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_10" type="text" class="form-control form-control-sm" name="operator_10" placeholder="" readonly>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                  

                <div class="col-sm-3">
                    <label class="col-form-label-sm">HSM-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_11" type="text" class="form-control form-control-sm" name="leadtime_11" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_11" type="text" class="form-control form-control-sm" name="operator_11" placeholder="" readonly>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                    

                <div class="col-sm-3">
                    <label class="col-form-label-sm">HSM-2</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_12" type="text" class="form-control form-control-sm" name="leadtime_12" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_12" type="text" class="form-control form-control-sm" name="operator_12" placeholder="" readonly>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                   

                <div class="col-sm-3">
                    <label class="col-form-label-sm">WEDM</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_13" type="text" class="form-control form-control-sm" name="leadtime_13" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_13" type="text" class="form-control form-control-sm" name="operator_13" placeholder="" readonly>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                   

                <div class="col-sm-3">
                    <label class="col-form-label-sm">M-EDM</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_14" type="text" class="form-control form-control-sm" name="leadtime_14" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_14" type="text" class="form-control form-control-sm" name="operator_14" placeholder="" readonly>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                   

                <div class="col-sm-3">
                    <label class="col-form-label-sm">EDM</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_15" type="text" class="form-control form-control-sm" name="leadtime_15" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_15" type="text" class="form-control form-control-sm" name="operator_15" placeholder="" readonly>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                    

                <div class="col-sm-3">
                    <label class="col-form-label-sm">ASSEMBLE-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_16" type="text" class="form-control form-control-sm" name="leadtime_16" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_16" type="text" class="form-control form-control-sm" name="operator_16" placeholder="" readonly>
                </div>

            </div>
            <div class="form-group row mt-0 p-0">                     

                <div class="col-sm-3">
                    <label class="col-form-label-sm">POLISHING-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="leadtime_17" type="text" class="form-control form-control-sm" name="leadtime_17" placeholder="" readonly>           
                </div>
                <div class="col-sm-4">
                    <input id="operator_17" type="text" class="form-control form-control-sm" name="operator_17" placeholder="" readonly>
                </div>

            </div>
                                                       
                <div class="form-group row" id="hd1">

                    <div class="col-sm">
                    </div>        
                    <div class="col-sm-5">
                        <label class="col-form-label-sm">CHANGE PROCESS TO:</label>
                    </div>
                    
                    <div class="col-sm-5 pt-1">                        
                        
                        <select id="ccurrentprocess" type="text" class="form-control form-control-sm" name="nextprocess" placeholder="" required>
                        <option value="">Please select</option>
                            <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT PROCESS_NAME FROM mmc_mold_fabrication_process";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {

                                        echo "<option value='";
                                        echo $row['PROCESS_NAME'];
                                        echo "'>";
                                        echo $row['PROCESS_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                            ?>

                        </select>
                    </div>
                    <div class="col-sm">
                    </div>
                </div>
                <div class="form-group row" id="hd2">
                    
                    <div class="col-sm">
                    </div>
                    <div class="col-sm-5 pt-1">
                        <label class="col-form-label-sm">PROCESS OPERATOR:</label>
                    </div>

                    <div class="col-sm-5 pt-1">                        
                        
                        <select id="cprocessoperator" type="text" class="form-control form-control-sm" name="processoperator" placeholder="" required>
                        <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                        </select>
                    </div>
                    <div class="col-sm">
                    </div>
                    
                </div> 

                <div class="modal-footer">
                    <button type="submit" name='submit' class="btn btn-primary" id="hd3"><i class="fas fa-exchange-alt"></i> Change</button>
                    <button type="button" class="btn btn-info" id="echangeprocess" onclick=""><i class="fas fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
                </div>

            </form>

      </div>
      
    </div>
  </div>
</div>

<!--_________________________________ Fabrication Change Process ________________________________________-->


<!--_________________________________ Fabrication Edit Change Process ________________________________________-->



<div class="modal hide fade in" role="dialog" id="editchangeprocess" data-keyboard="false" data-backdrop="static" style="overflow: auto !important;" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Process.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editchangeprocessform" method="post">
      <input type="hidden" id="ecmoldfabricationid" name="moldfabricationid">
      <div class="modal-body">
                                    
            <div class="form-group row mt-0 mb-0 p-0">
                
                <div class="col-sm-3">
                    <label class="col-form-label-sm">PROCESS</label>
                </div>
                <div class="col-sm-5">
                    <label class="col-form-label-sm">LEAD TIME (in minutes)</label>           
                </div>                
                <div class="col-sm-4">
                    <label class="col-form-label-sm">OPERATOR</label>
                </div>                
            
            </div>

            <div class="form-group row mt-0 mb-0 p-0">                  
                
                <div class="col-sm-3">
                    <label class="col-form-label-sm">DESIGN-1</label>
                </div>
                <div class="col-sm-5">                    
                    <input id="eleadtime_1" type="text" class="form-control form-control-sm" name="leadtime_1" placeholder="" >        
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_1" type="text" class="form-control form-control-sm" name="operator_1" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>                    
                </div>                                          

            </div>
            <div class="form-group row mt-0 mb-0 p-0">           

                <div class="col-sm-3">
                    <label class="col-form-label-sm">DESIGN-2</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_2" type="text" class="form-control form-control-sm" name="leadtime_2" placeholder="" >            
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_2" type="text" class="form-control form-control-sm" name="operator_2" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>                          

            </div>
            <div class="form-group row mt-0 mb-0 p-0">            
                
                <div class="col-sm-3">
                    <label class="col-form-label-sm">DESIGN-3</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_3" type="text" class="form-control form-control-sm" name="leadtime_3" placeholder="" >          
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_3" type="text" class="form-control form-control-sm" name="operator_3" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>                                               

            </div>
            <div class="form-group row mt-0 mb-0 p-0">            

                <div class="col-sm-3">
                    <label class="col-form-label-sm">RADIAL-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_4" type="text" class="form-control form-control-sm" name="leadtime_4" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_4" type="text" class="form-control form-control-sm" name="operator_4" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>                   

            </div>
            <div class="form-group row mt-0 mb-0 p-0">            

                <div class="col-sm-3">
                    <label class="col-form-label-sm">LATHER-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_5" type="text" class="form-control form-control-sm" name="leadtime_5" placeholder="" >         
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_5" type="text" class="form-control form-control-sm" name="operator_5" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>                       

            </div>
            <div class="form-group row mt-0 mb-0 p-0">           

                <div class="col-sm-3">
                    <label class="col-form-label-sm">BANDSAW</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_6" type="text" class="form-control form-control-sm" name="leadtime_6" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_6" type="text" class="form-control form-control-sm" name="operator_6" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>                     

            </div>
            <div class="form-group row mt-0 mb-0 p-0">          

                <div class="col-sm-3">
                    <label class="col-form-label-sm">ML</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_7" type="text" class="form-control form-control-sm" name="leadtime_7" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_7" type="text" class="form-control form-control-sm" name="operator_7" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>                           

            </div>
            <div class="form-group row mt-0 mb-0 p-0">            

                <div class="col-sm-3">
                    <label class="col-form-label-sm">GS-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_8" type="text" class="form-control form-control-sm" name="leadtime_8" placeholder="" >            
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_8" type="text" class="form-control form-control-sm" name="operator_8" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>                      

            </div>       
            <div class="form-group row mt-0 mb-0 p-0">                      

                <div class="col-sm-3">
                    <label class="col-form-label-sm">GS-2</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_9" type="text" class="form-control form-control-sm" name="leadtime_9" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_9" type="text" class="form-control form-control-sm" name="operator_9" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                  

                <div class="col-sm-3">
                    <label class="col-form-label-sm">HSM</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_10" type="text" class="form-control form-control-sm" name="leadtime_10" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_10" type="text" class="form-control form-control-sm" name="operator_10" placeholder=""  >
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                  

                <div class="col-sm-3">
                    <label class="col-form-label-sm">HSM-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_11" type="text" class="form-control form-control-sm" name="leadtime_11" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_11" type="text" class="form-control form-control-sm" name="operator_11" placeholder=""  >
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                    

                <div class="col-sm-3">
                    <label class="col-form-label-sm">HSM-2</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_12" type="text" class="form-control form-control-sm" name="leadtime_12" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_12" type="text" class="form-control form-control-sm" name="operator_12" placeholder=""  >
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                   

                <div class="col-sm-3">
                    <label class="col-form-label-sm">WEDM</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_13" type="text" class="form-control form-control-sm" name="leadtime_13" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_13" type="text" class="form-control form-control-sm" name="operator_13" placeholder="" >
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                   

                <div class="col-sm-3">
                    <label class="col-form-label-sm">M-EDM</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_14" type="text" class="form-control form-control-sm" name="leadtime_14" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_14" type="text" class="form-control form-control-sm" name="operator_14" placeholder=""  >
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                   

                <div class="col-sm-3">
                    <label class="col-form-label-sm">EDM</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_15" type="text" class="form-control form-control-sm" name="leadtime_15" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_15" type="text" class="form-control form-control-sm" name="operator_15" placeholder=""  >
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div>
            <div class="form-group row mt-0 mb-0 p-0">                    

                <div class="col-sm-3">
                    <label class="col-form-label-sm">ASSEMBLE-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_16" type="text" class="form-control form-control-sm" name="leadtime_16" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_16" type="text" class="form-control form-control-sm" name="operator_16" placeholder="" >
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div>
            <div class="form-group row mt-0 p-0">                     

                <div class="col-sm-3">
                    <label class="col-form-label-sm">POLISHING-1</label>
                </div>
                <div class="col-sm-5">
                    <input id="eleadtime_17" type="text" class="form-control form-control-sm" name="leadtime_17" placeholder="" >           
                </div>
                <div class="col-sm-4">
                    <select id="eoperator_17" type="text" class="form-control form-control-sm" name="operator_17" placeholder="">
                    <option value="">Please select</option>
                        <?php

                            include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                                $sql = "SELECT OPERATOR_NAME FROM mmc_mold_operator ORDER BY OPERATOR_NAME ASC";
                                $result = $conn->query($sql);
                                
                                    while($row = $result->fetch_assoc()) {
                   
                                        echo "<option value='";
                                        echo $row['OPERATOR_NAME'];
                                        echo "'>";
                                        echo $row['OPERATOR_NAME'];
                                        echo "</option>";
                                    }
                                
                                $conn->close();

                        ?>

                    </select>
                </div>

            </div> 

            <div class="modal-footer">
                <button type="submit" name='submit' class="btn btn-primary" id=""><i class="far fa-save"></i> Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn"><i class="fas fa-times"></i> Close</button>
            </div>

            </form>

      </div>
      
    </div>
  </div>
</div>



<!--_________________________________ Fabrication Edit Change Process ________________________________________-->


 <!-- ________ Operator add ____________ -->

 <div class="modal hide fade in" role="dialog" id="operatormod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="operatorform"  method="post">
      <input type="hidden" id="" name="">
      <div class="modal-body" style="">
      
          <!-- ____________ FORM __________________ -->
  
          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="operatorname" class="col-form-label-sm">OPERATOR NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="operatorname" type="text" class="form-control form-control-sm" name="operatorname" placeholder="" required>
                </div>
              </div>
            </div>                               
          </div>          

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="operatorsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ________ Operator add ____________ -->


<!-- ________ Operator Edit ____________ -->

<div class="modal hide fade in" role="dialog" id="eoperatormod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="eoperatorform"  method="post">
      <input type="hidden" id="operatorid" name="id">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col-6">
              <div class="row">
                <div class="col-5">
                  <label for="eoperatorname" class="col-form-label-sm">OPERATOR NAME:</label>                  
                </div>
                <div class="col-7">
                  <input id="eoperatorname" type="text" class="form-control form-control-sm" name="operatorname" placeholder="" required>
                </div>
              </div>
            </div>                               
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="eoperatorsubmit"><i class="far fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ________ Operator Edit ____________ -->
