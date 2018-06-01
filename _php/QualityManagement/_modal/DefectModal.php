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


<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-MD modal-dialog-center">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
          <h4 class="modal-title">LOT DISAPPROVAL DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <!-- Modal body -->
      <div class="modal-body py-1" id='lotmodal'>
      <form id="modalID">
        <div class="form-group row">
          <div class="col-12">
              
              <div class="row">
                <div class="col-3">
                      <label class="col-form-label-sm">LOT NUMBER:</label></div>
                <div class="col-9">
                   
                      <input type="text" class="form-control form-control-sm text-center" id="lot_num" readonly />         
                  </div>
                </div>
              
             <div class="row">
                <div class="col-5">
                      <label class="col-form-label-sm">DEFECT QUANTITY:</label>                  
                  </div>
                <div class="col-7">
                      <input id="defect_QTY" type="number" class="form-control form-control-sm" onkeyup='a()' onfocusout='a()' placeholder="INPUT DEFECT QTY"></input>              
                  </div>
                </div>


              <!-- <div class="row">
                <div class="col-3">
                  <label class="col-form-label-sm">ITEM SERIAL LIST:</label>                  
                  </div>
              
                <div class="col-7" id="tblModal">
                  
                  <?php /* include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/_modal/TableDefectModal.php"; */ ?>

                  </div>
                </div> -->

              <div class ="row">
                <div class="col-5">
                    <label class="col-form-label-sm">DEFECT NAME:</label>   
                  </div>
                <div class="col-7">
                      <select id="defectInputID" type="text" class="form-control form-control-sm " name="defectInput" placeholder="">
                  
                  <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/list/getDefectNames.php"; ?>

                  </select>      
                  </div>
                </div>

              <div class="row">
                <div class="col-5">
                      <label class="col-form-label-sm">REMARKS:</label>                  
                  </div>
                <div class="col-7">
                      <textarea id="remarks" type="textarea" class="form-control form-control-sm" name="remarks" placeholder="INPUT REMARKS"></textarea>              
                  </div>
                </div>

              <div class="row">
                <div class="col-7">
                                 
                  </div>
                <div class="col-5" style="text-align:right; padding-top:7px">
                    <button type='button' class='btn btn-danger close' data-dismiss="modal" id='ConfirmDefect'>CONFIRM DEFECT</button></div>
                  </div>
                </div>

            </div>
          </div>
          </form>
        </div>


      </div>
    </div>
  </div>
 