      <script>
      $('.sel2').select2({width: '80%'});
        
      </script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-list-alt"></i> CREATE GROUP FOR DELIVERY </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loadmodal1('ShipmentModal');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="card">
              <div class="card-header">Choose an option</div>
              <div class="card-body">
                    
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input id="radioGroup" onclick="CheckCreationType('group')" type="radio" class="form-check-input" name="optradio" checked="checked">Create Group
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input id="radioDr" onclick="CheckCreationType('dr')" type="radio" class="form-check-input" name="optradio">Assign DR
                        </label>
                      </div>
              </div>   
            </div>
<br>
            <div class="card">
              <div class="card-header">Create Group</div>
              <div class="card-body">
           
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Group Name: </span>
                    </div>
                    <input type="text" class="form-control" id="grouptext" placeholder="Group Name" required>
                  </div>

              </div>
            </div>
<br>
            <div class="card">
              <div class="card-header">Assign a DR</div>
              <div class="card-body">
           
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">DR #: </span>
                    </div>
                    <select class="sel2 form-control" id="drtext">
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


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="InsertDrGroup();" >Save changes</button>
        <button id="btnclose" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="loadmodal1('ShipmentModal');">Close</button>
      </div>
    </div>
  </div>
</div>


