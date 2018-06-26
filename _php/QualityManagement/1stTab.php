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
    <div class="col-md-5" id="first_table"> 
    <!-- weasdsdasdasd
    <script>DisplayTable1('DanplaTempStore','DanplaTempStoreSP','DanplaTemp')</script> -->
      </div>
    <div class="col-md-7" id="second_table">
    <!-- weasdsdasdasd
        <script>DisplayTable2('CreatedLot','CreatedLotSP','Created_Lot')</script> -->
        </div>
    </div>
    <!-- <div class="row">
      <div class="col" id="third_table">
     
      </div>
    </div> -->
    <div class="row"></div>
    <div id="pendingLot">

    <div class="row ml-1">

      <div class="col-12">
        <div class="d-flex btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">

                  <div class="p-2 input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text" id="btnGroupAddon2">FROM</div>
                    </div>
                      <input id="danplaDate1" type="date" class="py-1 form-control dateText" onchange="SearchDanplaCreate()">
                    <div class="input-group-prepend">
                      <div class="input-group-text" id="btnGroupAddon2">TO</div>
                    </div>
                      <input id="danplaDate2" type="date" class="py-1 form-control dateText" onchange="SearchDanplaCreate()">
                    <div class="input-group-append"> 
                      <button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="lotPending" onclick="notWorking()">EXPORT</button>
                    </div>
                  </div>


                  <div class="p-2 input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text" id="btnGroupAddon2">Search</div>
                    </div>
                    <input type="text" id="SearchPendingDanpla" onkeypress="SearchDanplaCreate()" class="py-1 form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
                    <div class="input-group-append">
                      <button style="z-index:0" type="button" class="btn btn-outline-secondary" id="ClearSearch" onclick="ClearSearchDanplaCreate()" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button>
                    </div>
                  </div>
          </div>
        </div>

      </div>
      
      <div class="row ml-1">
        <div class="col-12" id="noLotTable">
          
              <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/noLot_table.php"; ?>

          </div>
        </div>

    </div>
  </div>