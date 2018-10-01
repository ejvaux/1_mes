<style>

.lotTable{
  margin-left:-19%;
  width:150%;
  margin-bottom:5px;
}
.defectText{
  width:100%;
  margin-top:2%;
  margin-bottom:2%;
  padding:1%;
}
</style>


<div class="modal fade" id="myModalDanpla">
  <div class="modal-dialog modal-md modal-dialog-center">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
          <h4 class="modal-title">LOT DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <!-- Modal body -->
      <div class="modal-body py-1" id='lotmodal'>
      <form id="DanplaModalID">
        <div class="form-group row">
          <div class="col-12">
              
              <div class="row">
                <div class="col-3">
                      <label class="col-form-label-sm">LOT NUMBER:</label></div>
                <div class="col-9">
                      <input type="text" class="form-control form-control-sm text-center" id="LOT_NUMBER" readonly />         
                  </div>
                </div>
              
              <div class="row">
                <div class="col-12">
                  <label class="col-form-label-sm">ITEM SERIAL LIST:</label>                  
                  </div>
                </div>
                <div class="row">
                <div class="col-1"></div>
                <div class="col-8" id="tblModal">
                
                  <!-- <button type='button' class='btn btn-outline-secondary lotView1' id='LotView'>VIEW LOT DETAILS</button> -->
                  <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/LotDanplaList.php"; ?>

                  </div>
                <div class="col-2"></div>
                </div>

              <div class="row">
                <div class="col-7">
                                 
                  </div>
                <div class="col-5" style="text-align:right; padding-top:7px">
                    <button type='button' class='btn btn-danger close' data-dismiss="modal">CLOSE</button></div>
                  </div>
                </div>

            </div>
          </div>
          </form>
        </div>


      </div>
    </div>
  </div>
 