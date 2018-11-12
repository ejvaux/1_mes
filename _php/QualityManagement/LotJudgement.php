
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
</style>

<!-- <select name="value" id="filterText" onchange="filterText()" style="margin-left:15px;margin-top:8px"> -->

<div class="container-fluid pt-1" style="margin-left:.3%">
  <!-- <div class="row" style="margin-left:.1%">
    <div class="col-m-6">
      <table>
          <tr>
          <td><select name="value" class ="filterT form-control form-control-sm" id="filterText" onchange="filterJudgement()">
                  <option value = "ALL">FILTER TABLE</option>
                  <option value = "PENDING">PENDING</option>
                  <option value = "APPROVED">APPROVED</option>
                  <option value = "DISAPPROVED">DISAPPROVED</option>
                </select></td>
          <td><input type="text" onchange="searchLot()" class="tx py-1 form-control form-control-sm" id="searchText" placeholder="SEARCH HERE AND PRESS ENTER." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING"></td>
          <td><button style="padding-top:-30%;padding-bottom:-30%" type="button" class="btn btn-outline-secondary" id="ClearSearch" onclick="ClearSearchLot()" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button></td>
          </tr>
        </table>
      </div>
    </div> -->


  <div class="row">
            <div class="col-12">

            
              <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Filter</div>
                    </div>
                      <select name="value" class ="filterT form-control" id="filterText" onchange="filterJudgement()">
                          <option value = "PENDING">PENDING</option>
                          <option value = "APPROVED">APPROVED</option>
                          <option value = "DISAPPROVED">DISAPPROVED</option>
                          <option value = "ALL">ALL</option>
                        </select>
                </div>
                
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Search</div>
                    </div>
                    <input type="text" id="searchText" onkeypress="searchLot()" class="py-1 form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
                    <div class="input-group-append">
                      <button style="z-index:0" type="button" class="btn btn-outline-secondary" id="ClearSearch" onclick="ClearSearchLot()  " data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button>
                    </div>
                  </div>
                </div>
              </div>
    </div>
<!--   <div class="row">
    <div class="col-12">
        
    <div>
  </div> -->
  
  <div class="row">
    <div class="col-12 table-wrapper-1" id="table_judgement">
      <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/judgement_table.php"; ?>
    </div>
    <div class="col">
        </div>
    </div>
  </div>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/_modal/DefectModal.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/_modal/LotDanplaListModal.php"; ?>
