<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/1_mes/database/db.class.php";
$db = new DBQUERY;
?>

<div class="modal hide fade in" role="dialog" id="reportmsgmod" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bug Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="reportmsgform"  method="post">
      <input type="hidden" id="reportid" name="reportid">
      <div class="modal-body" style="">
          <!-- ____________ FORM __________________ -->

          <div class="form-group row">
            <div class="col">              
                <label for="" class="col-form-label-sm">MESSAGE:</label>                    
            </div>                               
          </div>
          <div class="form-group row">
            <div class="col">                             
                <textarea id="reportmsg" type="text" class="form-control form-control-sm" name="reportmsg" placeholder="" rows="8" maxlength="300" readonly></textarea>                
            </div>                    
          </div>

          <!-- ____________ FORM END __________________ -->
        
      </div>
      <div class="modal-footer">
        <!-- <button type="submit" class="btn btn-primary" name="submit" id="reportmsgsubmit"><i class="far fa-save"></i> Save</button> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>