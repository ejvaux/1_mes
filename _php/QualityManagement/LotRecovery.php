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
  </style>
<div class="container-fluid pt-1" style="margin-left:.3%">
  <div class="row">
        <!-- <div class="col"></div> -->
        <div class="col-12">
        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="First group">
                    
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddon2">Search</div>
                        </div>
                            <input type="text" id="RecoverySearch" onchange="RecoverySearchLot()" class="form-control" placeholder="Type anything here..." data-toggle="tooltip" title="PRESS ENTER AFTER TYPING">
                            <div class="input-group-append">
                                <button style="z-index:0" type="button" class=" btn btn-outline-secondary" id="RecoveryClearSearch" onclick="RecoveryClearSearchLot()" data-toggle="tooltip" title="CLEAR SEARCH"><i class="fas fa-sync-alt"></i></button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

  <div class="row" >
    <div class="col-12" id="table_recovery">
      <?php include $_SERVER['DOCUMENT_ROOT']."/1_mes/_php/QualityManagement/table/recovery_table.php"; ?>
    </div>
  </div>
</div>
