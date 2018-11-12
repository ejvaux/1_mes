
<div class="mod_options" style="z-index: 0;padding-top: 70px; padding-left: 15px;">
                
    <div style="width: 100%;text-align: left;">


 
 
            <div class="row">
                             
                                        <div class="col">
                                    
                                            
                                                    <div class="form-group">

                                                        <div class="row">
                                                          <div class="col-12">                                                          
                                                            <div class="btn-toolbar mb-1" role="toolbar" aria-label="Toolbar with button groups">
                                                          
                                                                <div class="input-group btn-sm" style="height: 40px;">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text" id="btnGroupAddon2">SEARCH:</div>
                                                                    </div>
                                                                    <input onchange='showTable("ProdResultMOLD","MOLD","Result")' id='search' type='text' name='search1' placeholder='Type anything..' class='form-control' style='font-size: 10px;'>
                                                                    <div class="input-group-append" id="btnGroupAddon3">
                                                                    <button type="button" onclick='showTable("ProdResultMOLD","MOLD","Result")' class="btn btn-outline-secondary btn-export6 btn-sm" style="z-index:0">&nbsp<i class="fa fa-search"></i>&nbsp</button>    </div>
                                                                </div>

                                                                <div class="input-group btn-sm" style="height: 40px;">
                                                                  <div class="input-group-prepend">
                                                                    <div class="input-group-text" id="btnGroupAddon2">SORT FROM:</div>
                                                                  </div>
                                                                  <input id='sortfrom' onchange='showTable("ProdResultMOLD","MOLD","Result")' type='date' name='sortingdatefrom' class='form-control' style='font-size: 10px'>
                                                                </div>
                                                                
                                                                <div class="input-group btn-sm" style="height: 40px;">
                                                                  <div class="input-group-prepend">
                                                                    <div class="input-group-text" id="btnGroupAddon2">SORT TO:</div>
                                                                  </div>
                                                                  <input id='sortto' onchange='showTable("ProdResultMOLD","MOLD","Result")' type='date' name='sortingdateto' class='form-control' style='font-size: 10px'>
                                                                </div>
                                                                
                                                                <div class="input-group btn-sm" style="height: 40px;">
                                                                    <div class="btn-group btn-group-sm">  
                                                                    <button type="button" onclick="cancelfilter('ProdResultMOLD','MOLD','Result')" class="btn btn-outline-secondary btn-export6"><i class="fas fa-ban"></i>&nbspCANCEL FILTER&nbsp&nbsp</button>  
                                                                     <button type="button" class="btn btn-outline-secondary btn-export6" onclick="SyncToProdOutputSystem();syncdatareload('ProdResultMOLD','MOLD','Result')" ><i class="fas fa-sync-alt"></i>&nbspSYNC&nbsp&nbsp</button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-export6" onclick="exportxlsx('ProdResultMOLD','MOLD','Result')"><i class="fas fa-file-excel"></i>&nbspEXPORT&nbsp&nbsp</button>
                                                                </div>
                                                                &nbsp&nbsp&nbsp<span style="font-size: 16px; font-weight: bold"><h5>Prod Result MOLD</h5></span>
                                                                </div>
                                                             

                                                            </div>
                                                          </div>
                                                        </div>


                                                    </div> <!-- end div of form group -->

                                      </div> <!-- end div of col -->

                          </div><!-- end of row-->
       
       

                 
    </div>


</div>
      
  <!-- below div is the div of container-fluid --> 
  </div>

 <div class="cont1 p-1">
        <div id="example-table"></div>
    </div>