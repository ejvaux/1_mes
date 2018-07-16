<div class="card">
  <div class="card-header">
    Bug Reports
  </div>
  <div class="card-body">
    <div class="input-group ml-3">
        <div class="input-group-prepend">
            <div class="input-group-text m-0" style="height: 31px;">Date</div>
        </div>
        <input type="date" id="min" min="">
        <div class="input-group-prepend">
            <div class="input-group-text m-0" style="height: 31px;">to</div>
        </div>
        <input type="date" id="max" min="">
        <button type="button" id="refresh" ><i class="fas fa-sync-alt"></i></button>
    </div>    
    <table class='table table-hover table-bordered table-sm nowrap' id='Dtable'>
    <thead>    
            <th>#</th>
            <th>Message</th>
            <th>Sender</th>
            <th>Date sent</th>
    </thead>
        
    </table>
  </div>
</div>