<script>
      $('.sel2').select2({width: '80%'});
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard = "false"> 
  <div class="modal-dialog vertical-align-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-list-alt"></i>&nbsp SCAN AN ITEM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loadmodal2('scanmodal');cancelfilter('ShipmentList','','shipment_management')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="card">
              <div class="card-header">Scan Type</div>
                  <div class="card-body">
                      <div class="input-group mb-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input id="radiodanpla"  type="radio" class="form-check-input" name="optradio1" checked="checked">Danpla
                        </label>
                      </div>  
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input id="radiopoly"  type="radio" class="form-check-input" name="optradio2">PolyBag
                        </label>
                      </div>
                      </div>

                  </div>
          </div>     
          <br>
            <div class="card">
              <div class="card-header">Scan Reference Number</div>
              <div class="card-body">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">REF #: </span>
                    </div>
                    <input type="text" class="form-control" id="ref_num" placeholder="Reference #">
                  </div>

              </div>
            </div>
<br>
                 


      </div>
      <div class="modal-footer">
        <button id="btnclose" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="loadmodal2('scanmodal');cancelfilter('ShipmentList','','shipment_management')">Close</button>
      </div>
    </div>
  </div>
</div>


