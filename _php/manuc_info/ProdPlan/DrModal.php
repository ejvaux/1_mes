
<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-truck"></i> DELIVERY RECEIPT INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loadmodal1('DrModal');">
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
        </div>
        <div class="card">
                    <div class="card-header" style="font-weight: bold">Changes in Information</div>
                    <div class="card-body">   
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">DR #: </span>
                                    </div>
                                        <select class="sel2 form-control" id="drtextchange">
                                        <option>--SELECT A DR#--</option>
                                            <?php
                                            $datenow = date("Y-m-d");
                                            include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';
                                            $sql="SELECT DISTINCT(dr_number) FROM sap_dr WHERE dr_date = '$datenow'";

                                            $result = $conn->query($sql);
                                            while($row=$result->fetch_assoc())
                                            {
                                            echo '<option>'.$row['dr_number'].'</option>';
                                            }
                                            
                                            ?>
                                        
                                        </select>
                                </div>
                    </div>   
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="setdr();loadmodal1('DrModal');">Save changes</button>
        <button id="btnclose" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="loadmodal1('DrModal');">Close</button>
      </div>
    </div>
  </div>
</div>
            
