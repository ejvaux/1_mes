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
<div style="width: 100%;">
  <div class="row">   
    <!-- ------------------------------------------------------------------------------------- -->
    <div class="col-md-6"> <!-- 1st Column -->
      
      <div class="row"> <!-- Buttons Row -->
        <div class="col-md-10 ml-4">
          <div class="py-1 input-group">
            <input type="text" class="form-control form-control-sm" id="ReceivingBarcode_text" placeholder="SCAN DANPLA SERIAL NUMBER">
            <div class="input-group-append">
              <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="AddReceiveBtn" onclick="AddReceive()">ADD</button>
              <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="ConfirmReceiveBtn" onclick="ApproveTransfer()">TRANSFER</button>
              <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="clearReceive" onclick="clearReceive()">CANCEL TRANSFER</button>
            </div>
          </div>
        </div>
      </div> 

      <div class="row" > <!-- 1st table Row -->
        <div class="col-md-12 ml-3" id="first_table">
        </div>
      </div>

    </div>
    <!-- ------------------------------------------------------------------------------------- -->
    <div class="col-md-6" id="second_table"> <!-- 2nd Column -->
    
    </div>
    <!-- ------------------------------------------------------------------------------------- -->
  </div>
</div>