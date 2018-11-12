



<div class="mod_options" style="z-index: 0;padding-top: 70px;padding-left: 15px">
                
                <div style="width: 100%;text-align: left;">
            
             
                        <div class="row">
                        
                                                  <div class="col">
                                                    <div class="form-group">
            
                                                          <div class="row">
                                                              <div class="col-12">                                                          
                                                                <div class="btn-toolbar mb-1" role="toolbar" aria-label="Toolbar with button groups">
                                                              
                                                                    <div class="input-group btn-sm" style="height: 40px;">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text" id="btnGroupAddon2">SEARCH:</div>
                                                                        </div>
                                                                        <input onchange='showTable("Dr-Assign","","dr_assign")' id='search' type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>
                                                                      <div class="input-group-append" id="btnGroupAddon3">
                                                                        <button type="button" onclick='showTable("Dr-Assign","","dr_assign")' class="btn btn-outline-secondary btn-export6 btn-sm" style="z-index:0">&nbsp<i class="fa fa-search"></i>&nbsp</button>    
                                                                      </div>
                                                                    </div>
            
                                                                    <div class="input-group btn-sm" style="height: 40px;">
                                                                      <div class="input-group-prepend">
                                                                        <div class="input-group-text" id="btnGroupAddon2">SORT FROM:</div>
                                                                      </div>
                                                                      <input id='sortfrom' onchange='showTable("Dr-Assign","","dr_assign")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                                                    </div>
                                                                    
                                                                    <div class="input-group btn-sm" style="height: 40px;">
                                                                      <div class="input-group-prepend">
                                                                        <div class="input-group-text" id="btnGroupAddon2">SORT TO:</div>
                                                                      </div>
                                                                      <input id='sortto' onchange='showTable("Dr-Assign","","dr_assign")' type='date' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                                                    </div>
                                                                    
                                                                    <div class="input-group btn-sm" style="height: 40px;">
                                                                        <div class="btn-group btn-group-sm">  
                                                                          <button type="button" onclick="cancelfilter('Dr-Assign','','dr_assign')" class="btn btn-outline-secondary btn-export6"><i class="fas fa-ban"></i>&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                                                          <button type="button" class="btn btn-outline-secondary btn-export6" onclick="SyncToProdOutputSystem();syncdatareload('Dr-Assign','','dr_assign')" ><i class="fas fa-sync-alt"></i>&nbspSYNC&nbsp&nbsp</button>
                                                                          <button type="button" class="btn btn-outline-secondary btn-export6" onclick="exportxlsx('Dr-Assign','','dr_assign')"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>
                                                                        </div>
            
                                                                         &nbsp&nbsp
                                                                        <select id="DrDataType" class="form-control" onchange="showTable('Dr-Assign','','dr_assign')" style="width: 100px;font-size: 10px; height:33px" name="PlanType">';
                                                                        <option value="ALL DATA">ALL DATA</option>
                                                                        <option value="UNASSIGNED DR">UNASSIGNED DR</option>
                                                                        <option value="ASSIGNED DR">ASSIGNED DR</option>
                                                                        </select>
                                                                       
                                                                    </div>

                                                                     
                                                                        <div class="input-group btn-sm" style="height: 40px;">
                                                                        <div class="btn-group btn-group-sm">
                                                                        <button type="button" class="btn btn-outline-secondary btn-export6" onclick="underConstruct()"><i class="fas fa-plus-square"></i>&nbspQUEUE&nbsp&nbsp</button>
                                                                        </div>
                                                                        </div>
                                                                  
            
                                                                </div>
                                                              </div>
                                                            </div>
                                                        
            
            
                                                        
                                                    </div> <!-- end div of form-group -->
                                                  </div> <!-- end div of col -->
            
            
            
            
                                      </div><!-- end of row-->
                  
                  
            
                             
                </div>
            
            
</div>
                  
              

<div class="row p-2">
    <div class="col-lg-5">
        <div id="example-table"></div>
    </div>
    <div class="col-lg-7">
        <div id="example-table2"></div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-truck"></i> DELIVERY RECEIPT INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">           
        <div class="card">
                <div class="card-header">Reference Information</div>
                <div class="card-body">
                        
                    <div class="input-group mb-3" id="groupcont">
                        <div class="input-group-prepend">
                        <span class="input-group-text" style="font-weight: bold">Group Name: </span>
                        </div>
                        <input type="text" class="form-control" id="grouptext" placeholder="Group Name" disabled>
                    </div>

                    <div class="input-group mb-3" id="drcont">
                            <div class="input-group-prepend">
                            <span class="input-group-text" style="font-weight: bold">Current DR #: </span>
                            </div>
                        <input type="text" class="form-control" id="drtext" placeholder="Dr No" disabled>
                    </div>



                </div>   
                
        </div>
        <br>
        <div class="card">
                    <div class="card-header" style="font-weight: bold">Changes in Information</div>
                    <div class="card-body">   
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">DR #: </span>
                                    </div>
                                        <select class="sel3dr form-control" id="drtextchange1">
                                          <option>--SELECT A DR#--</option>
                                            <?php
                                            $datenow = date("Y-m-d",strtotime('-7 days'));
                                           /*  include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
                                            $sql="SELECT DISTINCT(dr_number) FROM sap_dr ORDER BY dr_number DESC LIMIT 500";

                                            $result = $conn->query($sql);
                                            while($row=$result->fetch_assoc())
                                            {
                                            echo '<option>'.$row['dr_number'].'</option>';
                                            }
                                             */
                                            include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/SAPDbCon.php';
                                            $sql="SELECT DISTINCT(U_u_PORefNum),DocEntry FROM ODLN WHERE DocDate >= ? OR UpdateDate >= ? ORDER BY DocEntry DESC";
                                            $params = array($datenow,$datenow);
                                            $result =sqlsrv_query($SAPconn, $sql, $params);
                                            while($row=sqlsrv_fetch_array($result))
                                            {
                                            echo '<option value="'.$row['U_u_PORefNum'].'">'.$row['U_u_PORefNum'].'</option>';
                                            }
                                            ?>
                                        
                                        </select>
                                </div>
                    </div> 
          
                  
        </div>     
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="setdr();$('#exampleModal').modal('hide'); ">Save changes</button>
        <button id="btnclose" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal22 -->
<div class="modal fade" id="exampleModal22" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-truck"></i> ASSIGN DELIVERY RECEIPT INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">           
      <div class="card">
                <div class="card-header">Reference Information</div>
                <div class="card-body">
                        
                  <div class="input-group mb-3" id="itemcode_input">
                        <div class="input-group-prepend">
                        <span class="input-group-text" style="font-weight: bold">&nbsp&nbsp&nbsp Item Code: </span>
                        </div>
                        <input type="text" class="form-control" id="new_dr_ic" placeholder="ITEMCODE" disabled>
                    </div>

                    <div class="input-group mb-3" id="groupcont">
                        <div class="input-group-prepend">
                        <span class="input-group-text" style="font-weight: bold">Group Name: </span>
                        </div>
                        <input type="text" class="form-control" id="new_dr_gn" placeholder="GROUP NAME" disabled>
                    </div>

                    <div class="input-group mb-3" id="drcont">
                            <div class="input-group-prepend">
                            <span class="input-group-text" style="font-weight: bold">Current DR #: </span>
                            </div>
                        <input type="text" class="form-control" id="new_dr_dr" placeholder="DR NO" disabled>
                    </div>



                </div>   
                
        </div>
        <br>
        <div class="card">
                    <div class="card-header" style="font-weight: bold">Assign new DR #</div>
                    <div class="card-body">   
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">DR #: </span>
                                    </div>
                                        <select class="sel2dr form-control" id="new_dr_drop">
                                          <option>--SELECT A DR#--</option>
                                            <?php
                                             $datenow = date("Y-m-d",strtotime('-7 days'));
                                             /*  include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
                                              $sql="SELECT DISTINCT(dr_number) FROM sap_dr ORDER BY dr_number DESC LIMIT 500";
  
                                              $result = $conn->query($sql);
                                              while($row=$result->fetch_assoc())
                                              {
                                              echo '<option>'.$row['dr_number'].'</option>';
                                              }
                                               */
                                              include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/SAPDbCon.php';
                                              $sql="SELECT DISTINCT(U_u_PORefNum),DocEntry FROM ODLN WHERE DocDate >= ? OR UpdateDate >= ? ORDER BY DocEntry DESC";
                                              $params = array($datenow,$datenow);
                                              $result =sqlsrv_query($SAPconn, $sql, $params);
                                              while($row=sqlsrv_fetch_array($result))
                                              {
                                              echo '<option value="'.$row['U_u_PORefNum'].'">'.$row['U_u_PORefNum'].'</option>';
                                              }
                                            
                                            ?>
                                        
                                        </select>
                                </div>
                    </div> 
          
                  
        </div>     
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="setnewdr()">Save changes</button>
        <button id="btnclose" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


            
            
            <script>
                $body = $("body");
                $(document).on({
                    ajaxStart: function() { /* $body.addClass("loading"); */ $('.mdl').show();  },   
                    ajaxStop: function() { /* $body.removeClass("loading"); */$('.mdl').fadeOut(700); }     
                });    

            </script>
            
            