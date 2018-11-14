<style>
.table-wrapper-LotCreate-3{
  display: block;
  max-width: 100vw;
  max-height: 65vh; 
  overflow-y: auto;
  overflow-x: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

</style>
<div class="container-fluid" style="margin-top:11vh">
    <div class="row">
      <div class="col-md-3">      
                  <div class="py-2 input-group">
                    <input type="text" class="form-control form-control-sm py-2" id="ReceivingBarcode_text" placeholder="SCAN DANPLA SERIAL NUMBER">
                  </div>
      </div>
      <div class="col-md-8 py-1">
        <div class="py-1 input-group">      
          <div class="input-group-prepend">
            <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="AddReceiveBtn" onclick="AddReceive()">ADD</button>
          </div>
          <div class="input-group-append">
            <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="ConfirmReceiveBtn" onclick="ApproveTransfer()">TRANSFER</button>
            <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="clearReceive" onclick="clearReceive()">CLEAR TRANSFER</button> 
          </div>
        </div>
      </div>
    </div>

    <div class="row" >
      <div class="col-12 table-wrapper-LotCreate-3" id="table_received">
        <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/ItemReceivedTable.php"; ?>
      </div>
    </div>

</div>