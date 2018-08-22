
<!-- Modal -->
<form action="UploadExcelFile.php" method="POST" ENCTYPE="multipart/form-data" target="_blank">
<div class="modal fade" id="exampleModal1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"   data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-chart-line"></i> UPLOAD SALES DEMANDS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">           
        <div class="card">
                <div class="card-header"><i class="fas fa-file-excel"></i> &nbspEXCEL FILE UPLOAD</div>
                <div class="card-body">
                
                    <div class="input-group mb-3" id="groupcont">
                        <div class="input-group-prepend">
                        <span class="input-group-text" style="font-weight: bold">File </span>
                        </div>
                        <input type="file" class="form-control" name="file_upload">
                    </div>

                </div>   
                </div>
        </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" onclick=" $('#exampleModal1').modal('hide');swal({
  title: 'SUCCESS!',
  text: 'File uploaded successfully',
  type: 'success',
  showCancelButton: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'OK'
}).then((result) => {
  if (result.value) {
    loadtbl2('CreatePlan','','create_plan')
  }
});" ><i class="fas fa-check-circle"></i> USE THIS FILE TO CREATE PLAN</button>
        <button id="btnclose" type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> CLOSE</button>
      </div>
    </div>
  </div>
</div>  
</form>