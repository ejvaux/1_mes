<?php
  if(!isset($_SESSION))
  {
  session_start();
  }
?>
<style>
.tx{
  height:34px;
  width:380px;
  /* margin-left:-1%; */
  /* margin-top:5%; */
  /* padding-top:10px; */
}
.bt{
  width:75px;
  font-size: 12px;
  padding: 0px;
}
.lblqty{
  /* margin-left:-90px; */
  margin-top:8px;
  padding-top:8px;
  padding-bottom:8px;
  padding-left:10px;
  padding-right:10px;
}
.element{
    height: 60%; 
    width:  95%;
}
.searchBtn{
margin-left:-70%;
}
.ctrl{
  margin-top:.7%;
  margin-bottom:-1%
}

/* .btn-toolbar{
  margin-left:-1.2%
} */
</style>

<!-- <select name="value" id="filterText" onchange="filterText()" style="margin-left:15px;margin-top:8px"> -->

<div class="container-fluid pt-2" style="margin-left:.3%">

  <div class="row">
    <div class="col-12">
      <div class="btn-toolbar justify-content-between" role="toolbar">
        
        <div class="input-group btn-xs">
          <div class="input-group-prepend">
            <div class="input-group-text" id="btnGroupAddon2">SEARCH</div>
          </div>
            <input type="text" id="searchText" onchange="filterJudgement()" class="py-1 form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
          <div class="input-group-append">
            <button style="z-index:0" type="button" class="btn btn-outline-secondary" id="btnSearch" onclick="filterJudgement()" data-toggle="tooltip" title="SEARCH"><i class="fas fa-search"></i></button>
          </div>
        </div>

        <div class="input-group input-group-xs btn-xs">
          <div class="input-group-prepend">
            <div class="input-group-text">FROM</div>
          </div>
            <input id="judgementDate1" type="date" class="py-1 form-control dateText" onchange="filterJudgement()">

          <div class="input-group-prepend">
            <div class="input-group-text">TO</div>
          </div>
            <input id="judgementDate2" type="date" class="py-1 form-control dateText" onchange="filterJudgement()">
        </div>

        <div class="input-group btn-xs">
          <div class="input-group-prepend">
            <select name="value" class ="showlimit form-control" id="showlimit" onchange="filterJudgement()">
                  <option value = "100">100</option>
                  <option value = "500">500</option>
                  <option value = "1000">1000</option>
                  <option value = "ALL">NOTHING</option>
            </select>
          </div>
            <div class="input-group-append">
              <div class="input-group-text">ROWS</div>
            </div>
        </div>
          
        <div class="input-group btn-xs">
          <!-- <div class="input-group-prepend">
            <div class="input-group-text" id="btnGroupAddon2">FILTER</div>
          </div> -->
          <select name="value" class ="filterT form-control" id="filterText" onchange="filterJudgement()">
                <option value = "PENDING">PENDING</option>
                <option value = "APPROVED">APPROVED</option>
                <option value = "DISAPPROVED">DISAPPROVED</option>
                <option value = "ALL">ALL</option>
          </select>

          <div class="input-group-append">
              <button style="z-index:0" type="button" class="btn btn-outline-secondary btnExportJudgement" id="btnExportJudgement" data-toggle="tooltip" title="EXPORT"><i class="fas fa-table"></i></button>
          </div>
          <div class="input-group-append">
            <button style="z-index:0" type="button" class="btn btn-outline-secondary" id="btnClearSearch" onclick="ClearSearchLot()" data-toggle="tooltip" title="CLEAR SEARCH">CLEAR<!-- <i class="fas fa-sync-alt"></i> --></button>
          </div>
        </div>  

      </div>
    </div>
  </div>

  
  <div class="row mt-2">
    <div class="col-12 table-wrapper-1" id="table_judgement">
      <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/judgement_table.php"; ?>
    </div>
  </div>

</div>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/_modal/DefectModal.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/_modal/LotDanplaListModal.php"; ?>
