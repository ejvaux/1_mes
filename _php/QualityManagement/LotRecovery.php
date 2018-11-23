<style>
    .tx{
    height:34px;
    width:250px;
    /* margin-left:-90px; */
    padding-top:10px;
    }
    .bt{
    width:75px;
    font-size: 12px;
    padding: 0px;
    }
    .reworkbtn{
    width:50%;
    font-size: 12px;
    padding: 0px;
    }
    .scrapbtn{
    width:50%;
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
    .txtqty{
    width:90px;
    }
    .element{
        height: 70vh; 
        width:  95vw;
    }
    .fixTable{
  width:1000px;
    }
    .ctrl{
  margin-top:.7%;
  margin-bottom:-1%
    }
    .table-wrapper-3 {
            display: block;
            max-width: 100%;
            max-height: 430px;
            overflow-y: auto;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }
  </style>
<div class="container-fluid">

    <div class="row">
    <div class="col-12 pb-2">
      <div class="btn-toolbar justify-content-between" role="toolbar">
        
        <div class="input-group btn-xs pt-2">
          <div class="input-group-prepend">
            <div class="input-group-text" id="btnGroupAddon2">SEARCH</div>
          </div>
            <input type="text" id="RecoverySearch" onchange="RecoverySearchLot()" class="py-1 form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
          <div class="input-group-append">
            <button style="z-index:0" type="button" class="btn btn-outline-secondary" id="btnSearch" onclick="RecoverySearchLot()" data-toggle="tooltip" title="SEARCH"><i class="fas fa-search"></i></button>
          </div>
        </div>

        <div class="input-group input-group-xs btn-xs pt-2">
          <div class="input-group-prepend">
            <div class="input-group-text">FROM</div>
          </div>
            <input id="recoveryDate1" type="date" class="py-1 form-control dateText" onchange="RecoverySearchLot()">

          <div class="input-group-prepend">
            <div class="input-group-text">TO</div>
          </div>
            <input id="recoveryDate2" type="date" class="py-1 form-control dateText" onchange="RecoverySearchLot()">
        </div>

        <div class="input-group btn-xs pt-2">
          <div class="input-group-prepend">
            <select name="value" class ="showlimitRecovery form-control" id="showlimitRecovery" onchange="RecoverySearchLot()">
                  <option value = "100">100</option>
                  <option value = "500">500</option>
                  <option value = "1000">1000</option>
                  <option value = "ALL">NOTHING</option>
            </select>
          </div>
            <div class="input-group-append">
              <div class="input-group-text">ROWS</div>
            </div>

            <div class="input-group-append">
              <button style="z-index:0" type="button" class="btn btn-outline-secondary btnExportRecovery" id="btnExportRecovery" data-toggle="tooltip" title="EXPORT"><i class="fas fa-table"></i></button>
            </div>
            <div class="input-group-append">
              <button style="z-index:0" type="button" class="btn btn-outline-secondary" id="btnClearSearch" onclick="RecoveryClearSearchLot()" data-toggle="tooltip" title="CLEAR SEARCH">CLEAR<!-- <i class="fas fa-sync-alt"></i> --></button>
            </div>
        </div>

      </div>
    </div>
  </div>

    <div class="row" >
      <div class="col-12 table-wrapper-1" id="table_recovery">
        <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/recovery_table.php"; ?>
      </div>
    </div>

</div>
