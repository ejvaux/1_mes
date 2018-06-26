function loadDoc(TableName) {
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("table_display").innerHTML = this.responseText;

     
      if (TableName == '1stTab'){
        DisplayTable1('DanplaTempStore', 'DanplaTempStoreSP', 'DanplaTemp')
        DisplayTable2('CreatedLot', 'CreatedLotSP', 'Created_Lot')
        /* DisplayTable3('PendingLot', 'PendingLotSP', 'Pending_Lot') */
      }
    }
  };
    xhttp.open("GET", TableName+".php", true);
    xhttp.send();
    
  }

function AddBtnClick(){
              var bcode = Barcode_text.value;
              if(bcode == ""){
                swal(
                  'Input Barcode!',
                  'Please insert danpla to be allocated.',
                  'warning'
                )
                return;
              }
  $.ajax({
          method:'post',
          url:'/1_mes/_php/QualityManagement/DanplaDetails.php',
          data:
              {
                'jo_barcode': bcode ,
                'ajax': true
              },
          success: function(data) {
            var val = JSON.parse(data);
          if (val != undefined){
              if (val.LOT_NUM == null || val.LOT_NUM == "" || val.LOT_NUM == undefined ){
                  var x = document.getElementById("DanplaTable").rows.length;
                  var check = "false";
                          if(x >= 1){
                            check = CheckDanpla(bcode, val.JO_NUM, val.ITEM_CODE, val.ITEM_NAME, val.SUM_QTY, val.MACHINE_CODE);    
                            }
                          else if(x = 0){
                            InsertDanpla(bcode, val.JO_NUM, val.ITEM_CODE, val.ITEM_NAME, val.SUM_QTY, val.MACHINE_CODE);
                            } 
                }
                else{
                  swal(
                    'Items already allocated into other lot.',
                    'Please insert new danpla be allocated.',
                    'warning'
                      )
                    }
              }
          else{
            swal(
              'Items does not exist!',
              'Please insert existing danpla be allocated.',
              'warning'
            )
            }
            }
    });
  }
function InsertDanpla(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertMachine){
  
  $.ajax({
    method:'post',
    url:'/1_mes/_php/QualityManagement/InsertDanplaTable.php',
    data:
        {
          'jo_barcode': insertBarcode ,
          'jo_num': insertJO ,
          'item_code': insertItemCode ,
          'item_name': insertItemName ,
          'print_qty': insertQuantity,
          'machine_code': insertMachine,

          'ajax': true
        },
    success: function(data) {
      swal({text: data, type: 'success'});
      DisplayTable1('DanplaTempStore', 'DanplaTempStoreSP', 'DanplaTemp');
                      }
                    });

                  }

function CheckDanpla(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertMachine){
  
  $.ajax({
    method:'post',
    url:'/1_mes/_php/QualityManagement/CheckDanplaJO.php',
    data:
        {
          'jo_barcode': insertBarcode ,
          'jo_num': insertJO ,
          'item_code': insertItemCode ,
          'item_name': insertItemName ,
          'print_qty': insertQuantity ,
          'machine_code': insertMachine,
          'ajax': true
        },
    success: function(data) {
      if (data == "false"){
        InsertDanpla(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertMachine);
      }
      else if (data == '"true1"'){
        swal({ text: 'DANPLA EXIST', type: 'error' });
        document.getElementById('Barcode_text').value = "";
      }
      else if (data == '"true2"'){
        swal({ text: 'DANPLA IS FROM DIFFERENT JO', type: 'error' });
        }
      }
    });
  }
var lotNO;
function buildLotNumber(){
    var d = new Date();
    var month = d.getUTCMonth() + 1; //months from 1-12
    var day = d.getUTCDate();
    // first 4 chars in LOT NUMBER
    if (month < 10) { month = '0' + month }
    if (day < 10) { day = '0' + day }
    // 2nd 2 chars in LOT NUMBER
    var shift = "01"; //DayShift
    var today = new Date().getHours();
    if (today <= 6 && today >= 18) { shift = "02" }
  
    $.ajax({
      method: 'post',
      url: '/1_mes/_php/QualityManagement/GetMachine.php',
      success: function (data) {
        var val = JSON.parse(data);
        var machine = val.MACHINE_CODE.slice(-4);
        
        var lotNumber = month + "" + day + "" + shift + machine + "01";
        lotNO = lotNumber;
      }
    });
  }

function generateLot(){
  var lotNew, newL;
  
  var x = document.getElementById("DanplaTable").rows[1].cells[0].innerHTML;
  if (x == "No data available in table") {
    swal(
      'No items allocated.',
      'Please insert danpla to create lot.',
      'warning'
    )
    return;
  }
  else{
  var x = document.getElementById("DanplaTable").rows[1].cells[1].innerHTML;
  var y = document.getElementById("DanplaTable").rows[1].cells[6].innerHTML;
  }

  $.ajax({
    method:'post',
    url:'/1_mes/_php/QualityManagement/GetNextLot.php',
    data:{
      'jo_num':x,
      'machine_code': y,
      'ajax' : true
    },
    success: function(data){
      
      if (data == "true" || data== "false" ){
        buildLotNumber(newL);
        AddLotBtnClick(lotNO);
      }
      else if (data != "false" || data != "true"){
        
      var val = JSON.parse(data);
      
                  var lotPrev = val.slice(0,11);
                  var series= val.slice(-1);
                  var i = parseInt(series) + 1;
        lotNew = lotPrev + i;
        AddLotBtnClick(lotNew);
      }
    }
  });
}

function AddLotBtnClick(newLot){
  var x = document.getElementById("DanplaTable").rows.length;
  if (newLot==undefined){
    alert("No Lot Number Try Again");
    return;
  }
  swal({
    title: 'Lot Confirmation',
    text: "You won't be able to revert this anymore!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Create Lot'
  }).then((result) => {
    if (result.value) {


      $.ajax({
        method: 'post',
        url: '/1_mes/_php/QualityManagement/InsertLotTable.php',
        data:
          {
            'row_count': x,
            'lot_number': newLot,
            'ajax': true
          },
        success: function (data) {
          loadDoc('1stTab');
          lotNO = "";
          return;

        }
      });

      swal(
        'Lot ' + newLot + ' Created!',
        'Your items is now allocated!! Please note the lot number!!',
        'success'
      )
    }
  });

  
}

function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}

$(document).on('click', '.lotApprove', function () {
  //$('#dataModal').modal();
  var lotNumber = $(this).attr("id");
  
  swal({
    title: 'Are you sure you will approve lot ' + lotNumber + ' ?',
    text: "REVERT this in Lot Judgement > FILTER TABLE:APPROVED > Click:PENDING",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'APPROVE'
  }).then((result) => {
    if (result.value) {

      $.ajax({
        url: "/1_mes/_php/QualityManagement/UpdateLotJudgement.php",
        method: "POST",
        data: {
          'lot_number': lotNumber,
          'decision': "APPROVE"
        },
        success: function (data) {
          filterText();
        }
      });

      swal(
        'LOT APPROVED!',
        'Your items has been approved.',
        'success'
      )
    }
  })

 });

$(document).on('click', '.lotPending', function () {
  //$('#dataModal').modal();
  var lotNumber = $(this).attr("id");

  swal({
    title: 'Change Status to PENDING?',
    text: "Revert this in LotJudgement > FILTER TABLE:PENDING > Find " + lotNumber + " > Click:APPROVE/DISAPPROVE",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'PENDING'
  }).then((result) => {
    if (result.value) {

      $.ajax({
        url: "/1_mes/_php/QualityManagement/UpdateLotJudgement.php",
        method: "POST",
        data: {
          'lot_number': lotNumber,
          'decision': "PENDING"
        },
        success: function (data) {
          filterText();
        }
      });

      swal(
        'Status changed to PENDING!',
        'Your item has been moved to pending.',
        'success'
      )
    }
  })


  
 });

/* function filterText() {
  var rex = new RegExp($('#filterText').val());

  $('.content').hide();
  $('.content').filter(function () {
    return rex.test($(this).text());
  }).show();
 } */

function filterJudgement(){
  var x = document.getElementById("filterText");
  var y = x.options[x.selectedIndex].value;
  if(y == "ALL"){
    var z = 'SELECT * FROM qmd_lot_create ORDER BY PROD_DATE DESC;';
  }
  else{
    var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + '" ORDER BY PROD_DATE DESC;' ;
  }
  
  
  /* var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + ' AND DATE(NOW()) = DATE(PROD_DATE)";'; */
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/table/judgement_table.php',
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      
      document.getElementById("table_judgement").innerHTML = data;
    }
  });
 }

function filterText() {
  var x = document.getElementById("filterText");
  var y = x.options[x.selectedIndex].value;
  
  if(y == "ALL"){
    var z = 'SELECT * FROM qmd_lot_create ORDER BY PROD_DATE DESC;';
  }
  else{
    var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + '" ORDER BY PROD_DATE DESC;' ;
  }

  
  /* var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + x + ' AND DATE(NOW()) = DATE(PROD_DATE)";'; */
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/table/judgement_table.php',
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_judgement").innerHTML = data;
    }
  });
 }

function searchLot(){
  var x = document.getElementById("filterText");
  var y = x.options[x.selectedIndex].value;
  var search = searchText.value;
  /* var z = "SELECT * FROM qmd_lot_create WHERE LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%' OR LOT_JUDGEMENT LIKE '%" + search + "%' AND DATE(NOW()) = DATE(PROD_DATE);"; */
 
  if (y == "ALL") {
    var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%') GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;";
  }
  else {
    var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%') AND LOT_JUDGEMENT = '" + y + "' GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;";
  }
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/table/judgement_table.php',
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_judgement").innerHTML = data;
    }
  });
 }
function ClearSearchLot() {
  var x = document.getElementById("filterText");
  var y = x.options[x.selectedIndex].value;

  if (y == "ALL") {
    var z = 'SELECT * FROM qmd_lot_create GROUP BY LOT_NUMBER ORDER BY LOT_JUDGEMENT DESC;';
  }
  else {
    var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + '" GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;';
  }
  /* var z = "SELECT * FROM qmd_lot_create WHERE DATE(NOW()) = DATE(PROD_DATE);"; */
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/table/judgement_table.php',
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_judgement").innerHTML = data;
      searchText.value = "";
    }
  });
 }

$(document).on('click', '.lotDisapprove', function () {
  //$('#dataModal').modal();
  var lotNumber = $(this).attr("id");
  /* DisplayLotDetails(lotNumber); */
  document.getElementById('lot_num').value = lotNumber;

 });

$(document).on('click', '.lotDanpla', function () { 
  //$('#dataModal').modal();
  var lotNumber = $(this).attr("id");
  DisplayLotDetails(lotNumber);
  document.getElementById('LOT_NUMBER').value = lotNumber; 
  
 });

function DisplayLotDetails(lotNum){
  var x = lotNum;
  var z = "SELECT PACKING_NUMBER, SUM(PRINT_QTY) as SUMQ FROM mis_product WHERE LOT_NUM ='" + x + "' GROUP BY PACKING_NUMBER";
  $.ajax({
    url: "/1_mes/_php/QualityManagement/_modal/TableDefectModal.php",
    method: "POST",
    data: {
      'sql1': z,
      'lot_number': x,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("tblModal").innerHTML = data;
    }
  });
 }

/* $(document).on('click', '.checkBoxDefect', function () {
  //$('#dataModal').modal();
  var danpla = $(this).attr("id");
  var defectqty = "DEFECT_QUANTITY" + danpla;
  var checkBox = document.getElementById(danpla);
  var def = document.getElementById(defectqty);

  if (checkBox.checked == true) {
    def.className = "showText";
    def.value = "";
  } else {
    def.className = "hiddenText";
    def.value = "";
  }
  
 }); */

/* $(document).on('click', '#ConfirmDefect', function () {
  //$('#dataModal').modal();
  var x = document.getElementById("LotDetails").rows.length;
  var lotNumber = document.getElementById("lot_num").value;
  var remarks = document.getElementById("defectInputID").value;
  var totalDefect = parseInt(0);
  var switchCount = 0;

 swal({
  title: "Are you sure you want to record lot:" + " " + lotNumber + " " + "as Defect?",
  text: "Revert this in Lot Reject Recovery > Find " + lotNumber + " > Click:REWORK > Lot Judgement > FILTER TABLE:APPROVED > Find " + lotNumber + " > Click:PENDING/DISAPPROVE",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'DEFECT'
  }).then((result) => {
    if (result.value) {
      for(a=1;a<x;a++){
        var y = document.getElementById("LotDetails").rows[a].cells[2].innerHTML;
        var actualQty = document.getElementById("LotDetails").rows[a].cells[3].innerHTML;
        var switchID = document.getElementById(y).checked;
    
        
        if(switchID == true){
          switchCount = switchCount + 1;
          
          var defectQTY = document.getElementById("DEFECT_QUANTITY"+y).value;
          if (defectQTY == undefined || defectQTY == ""){
            defectQTY = parseInt(actualQty);
           }
          totalDefect = parseInt(totalDefect) + parseInt(defectQTY);
          AddLotDefect(y, actualQty, defectQTY, lotNumber, remarks);
        }
        else{
          defectQTY = "";
          }
        
        }
      var decision = "DISAPPROVE";
      if(switchCount == 0){
        if (confirm("Lot will be APPROVED due to no danpla were assigned as defect. CONFIRM?")){
        decision = "APPROVE";
        }
        else{
        return;
        }
      }
        
    
      $.ajax({
        url: "/1_mes/_php/QualityManagement/UpdateLotJudgement.php",
        method: "POST",
        data: { 'lot_number': lotNumber,
                'defect_qty': totalDefect,
                'remarks': remarks,
                'decision' : decision,
                'ajax' : true
        },
        success: function (data) {
          filterText();
          $('#modalID').trigger('reset');
        }
      });

      swal(
        'REJECTED!',
        'Your item has been rejected.',
        'error'
      )
    }
  });

 }); */


/* function a(){
  var rowCount = document.getElementById("LotDetails").rows.length;
  for (var ctr = 1; ctr < rowCount; ctr++){
    var y = document.getElementById("LotDetails").rows[ctr].cells[2].innerHTML;
    var actualQty = parseInt(document.getElementById("LotDetails").rows[ctr].cells[3].innerHTML);
    var defectQtyID = "DEFECT_QUANTITY" + y;
    var defectQTY = parseInt(document.getElementById(defectQtyID).value);
    var def1 = document.getElementById(defectQtyID);
      if(defectQTY>actualQty){
        swal({
          text: 'DEFECT QUANTITY IS HIGHER THAN ITS ACTUAL QUANTITY. PLEASE CHECK',
          type: 'error'
        });
        document.getElementById("DEFECT_QUANTITY" + y).value = "";
        var switchID1 = document.getElementById(y).checked = false;
        def1.className = "hiddenText";
        exit();
        
        }
      }
  } */

$(document).on('click', '.reworkbtn', function () {
    //$('#dataModal').modal();
    var lotNumber = $(this).attr("id");

    swal({
      title: "Will proceed to record lot " + " " + lotNumber + " " + "as REWORK?",
      text: "Revert this in Lot Judgement > FILTER TABLE:PENDING > Find LOT " + lotNumber + " > Click:PENDING/DISAPPROVE",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'REWORK'
    }).then((result) => {
      if (result.value) {

        $.ajax({
          url: "/1_mes/_php/QualityManagement/ApproveRework.php",
          method: "POST",
          data: {
            'lot_number': lotNumber,
            'ajax': true
          },
          success: function (data) {
            loadDoc("LotRecovery");
          }
        });

        swal(
          'REWORK!',
          'Your file has been recorded as rework.',
          'success'
        )
      }
    })
  });


$(document).on('click', '.scrapbtn', function () {
    //$('#dataModal').modal();
    var lotNumber = $(this).attr("id");
  
    /* if (confirm()) {
      
        }
      else {
        return;
        } */
    swal({
      title: "Are you sure you want to record lot " + " " + lotNumber + " " + " as SCRAP?",
      text: "If no, Click:CANCEL > Click:REWORK to approve lot.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'SCRAP'
    }).then((result) => {
      if (result.value) {

        if (confirm("Recording lot:" + " " + lotNumber + " " + "as SCRAP.\nPROCEED?\nIf no, click 'CANCEL' and click 'REWORK' to approve lot.")) {
          if (confirm("Will proceed to record lot:" + " " + lotNumber + " " + "as SCRAP.\nCONFIRM?\nIf no, click 'CANCEL' and click 'REWORK' to approve lot.")) {
          }
          else {
            return;
          }
        }
        else {
          return;
        }

        $.ajax({
          url: "/1_mes/_php/QualityManagement/ApproveScrap.php",
          method: "POST",
          data: {
            'lot_number': lotNumber,
            'ajax': true
          },
          success: function (data) {
            loadDoc("LotRecovery");
          }
        });
        swal(
          'Deleted!',
          'Your lot has been recorded as SCRAP',
          'success'
        )
      }
    })
  });

$(document).on('click', '#ConfirmDefect', function () {
  //$('#dataModal').modal();
  var lotNumber = document.getElementById("lot_num").value;
  var Quantity_Defect = document.getElementById('defect_QTY').value;
  var remarks = document.getElementById('defectInput').value;
  if (Quantity_Defect  == 0){
    swal(
      'No defect quantity.',
      'Please input defect quantity to proceed.',
      'warning'
    )
    return;
  }

  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',


    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'REWORK',
    cancelButtonText: 'REJECT',
    reverseButtons: true

  }).then((result) => {
    if (result.value) {

      var decision = 'PENDING-REWORK';
      
      $.ajax({
        url: "/1_mes/_php/QualityManagement/UpdateLotJudgement.php",
        method: "POST",
        data: {
          'lot_number': lotNumber,
          'defect_qty': Quantity_Defect,
          'remarks': remarks,
          'decision': decision,
          'ajax': true
        },
        success: function (data) {
          insertRework(lotNumber,Quantity_Defect,remarks);
          filterText();
          $('#modalID').trigger('reset');
        }
      });

      swal(
        'REWORK!',
        'Your file has been recorded as rework.',
        'success'
      )
    } 

    else if (result.dismiss === swal.DismissReason.cancel) {

      var decision = 'DISAPPROVE';

      $.ajax({
        url: "/1_mes/_php/QualityManagement/UpdateLotJudgement.php",
        method: "POST",
        data: {
          'lot_number': lotNumber,
          'defect_qty': Quantity_Defect,
          'remarks': remarks,
          'decision': decision,
          'ajax': true
        },
        success: function (data) {
          InsertReject(Quantity_Defect, lotNumber, remarks);
          filterText();
          $('#modalID').trigger('reset');
        }
      });
      swal(
        'REJECT',
        'You rejected lot number ' + lotNumber + ' !',
        'error'
      )
    }
  });
 });

function InsertReject(defect, lotNum, rmks) {
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/InsertLotDefect.php',
    data:
      {
        'defectQty': defect,
        'lotNumber': lotNum,
        'remarks': rmks,
        'ajax': true
      },
    success: function (data) {
    }
  });
 }

function insertRework(lotNum, Quantity, reworkRemarks){
  
  $.ajax({
    url: "/1_mes/_php/QualityManagement/InsertRework.php",
    method: "POST",
    data: {
      'lot_number': lotNum,
      'defect_qty': Quantity,
      'remarks': reworkRemarks,
      'ajax': true
    },
    success: function (data) {
      
    }
  });
 }

function a(){
  var lotNumber = document.getElementById("lot_num").value;
  var defect = parseInt(document.getElementById('defect_QTY').value);
  $.ajax({
    url: "/1_mes/_php/QualityManagement/GetQty.php",
    method: "POST",
    data: {
      'lot_number': lotNumber,
      'ajax': true
    },
    success: function (data) {
      var actualQty = parseInt(data);
      

      if (defect > actualQty){
        document.getElementById('defect_QTY').value = "";
        
        swal({
          text: 'DEFECT QUANTITY IS HIGHER THAN ITS ACTUAL QUANTITY. PLEASE CHECK',
          type: 'error'
        });
        return;
      }
      else{
        return;
      }
    }
  });
 }

function RecoverySearchLot() {
  var search = RecoverySearch.value;
  /* var z = "SELECT * FROM qmd_lot_create WHERE LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%' OR LOT_JUDGEMENT LIKE '%" + search + "%' AND DATE(NOW()) = DATE(PROD_DATE);"; */
  var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%') AND (LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY) ORDER BY PROD_DATE DESC;";
  $.ajax({
    method: 'post',
    url: "/1_mes/_php/QualityManagement/table/recovery_table.php",
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_recovery").innerHTML = data;
    }
  });
 }


function RecoveryClearSearchLot() {
  var z = "SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY ORDER BY PROD_DATE DESC;";
  /* var z = "SELECT * FROM qmd_lot_create WHERE DATE(NOW()) = DATE(PROD_DATE);"; */
  $.ajax({
    method: 'post',
    url: "/1_mes/_php/QualityManagement/table/recovery_table.php",
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_recovery").innerHTML = data;
      RecoverySearch.value = "";
    }
  });
 }

function SearchLotCreate(){
  var search = SearchCreate.value;
  var d1 = lotDate1.value;
  var d2 = lotDate2.value;
  if (d1 != "" && d2 != "") {
    if (search == "") {
      var z = "SELECT * FROM qmd_lot_create WHERE PROD_DATE BETWEEN '" + d1 + "' AND '" + (d2+1) + "' ORDER BY PROD_DATE DESC;";
    }
    else {
      var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND (PROD_DATE BETWEEN '" + d1 + "' AND '" + (d2 + 1) + "') ORDER BY PROD_DATE DESC;";
    }
  }
  else if(d1!="" && d2==""){
    if(search==""){
      var z = "SELECT * FROM qmd_lot_create WHERE PROD_DATE LIKE '%"+ d1 +"%';";
    }
    else{
      var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND PROD_DATE = '" + d1 + "' ORDER BY PROD_DATE DESC;";
    }
  }
  else if (search != "") {
    var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') ORDER BY PROD_DATE DESC;";
  }
  /* var z = "SELECT * FROM qmd_lot_create WHERE LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%' OR LOT_JUDGEMENT LIKE '%" + search + "%' AND DATE(NOW()) = DATE(PROD_DATE);"; */
  $.ajax({
    method: 'post',
    url: "/1_mes/_php/QualityManagement/table/createdLot_table.php",
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("createdLotTable").innerHTML = data;
    }
  });
 }

function ClearSearchLotCreate() {
  var z = "SELECT * FROM qmd_lot_create ORDER BY PROD_DATE DESC;";
  /* var z = "SELECT * FROM qmd_lot_create WHERE DATE(NOW()) = DATE(PROD_DATE);"; */
  $.ajax({
    method: 'post',
    url: "/1_mes/_php/QualityManagement/table/createdLot_table.php",
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("createdLotTable").innerHTML = data;
      SearchCreate.value = "";
      lotDate1.value = "";
      lotDate2.value = "";
    }
  });
 }

function notWorking(){
  swal(
    'Stop!',
    'Under construction.',
    'error'
  );
 }

function SearchDanplaCreate() {
  var search = SearchPendingDanpla.value;
  var d1 = danplaDate1.value;
  var d2 = danplaDate2.value;
  if (d1 != "" && d2 != "") {
    if (search == "") {
      var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE (PRINT_DATE BETWEEN '" + d1 + "' AND '" + (d2 + 1) + "') AND LOT_NUM = ''  GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
    }
    else {
      var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE ((PACKING_NUMBER LIKE '%" + search + "%' OR JO_NUM LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND (PRINT_DATE BETWEEN '" + d1 + "' AND '" + (d2 + 1) + "')) AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
    }
  }
  else if (d1 != "" && d2 == "") {
    if (search == "") {
      var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE (PRINT_DATE LIKE '%" + d1 + "%') AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
    }
    else {
      var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE ((PACKING_NUMBER LIKE '%" + search + "%' OR JO_NUM LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND PRINT_DATE = '" + d1 + "') AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
    }
  }
  else if (search != "") {
    var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE (PACKING_NUMBER LIKE '%" + search + "%' OR JO_NUM LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
  }
  /* var z = "SELECT * FROM mis_product WHERE LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%' OR LOT_JUDGEMENT LIKE '%" + search + "%' AND DATE(NOW()) = DATE(PRINT_DATE);"; */
  $.ajax({
    method: 'post',
    url: "/1_mes/_php/QualityManagement/table/noLot_table.php",
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("noLotTable").innerHTML = data;
    }
  });
 }

function ClearSearchDanplaCreate() { 
  var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
  /* var z = "SELECT * FROM qmd_lot_create WHERE DATE(NOW()) = DATE(PRINT_DATE);"; */
  $.ajax({
    method: 'post',
    url: "/1_mes/_php/QualityManagement/table/noLot_table.php",
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("noLotTable").innerHTML = data;
      SearchPendingDanpla.value = "";
      danplaDate1.value = "";
      danplaDate2.value = "";
    }
  });
 }

function defectSearch(){
  var search = defectSearchId.value;
  /* var z = "SELECT * FROM qmd_lot_create WHERE LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%' OR LOT_JUDGEMENT LIKE '%" + search + "%' AND DATE(NOW()) = DATE(PROD_DATE);"; */
  var z = "SELECT * FROM qmd_defect_dl LEFT JOIN qmd_lot_create ON qmd_defect_dl.LOT_NUMBER = qmd_lot_create.LOT_NUMBER WHERE (qmd_defect_dl.UPDATE_USER LIKE '%" + search + "%' OR qmd_defect_dl.DEFECT_NAME LIKE '%" + search + "%' OR qmd_defect_dl.PROD_DATE LIKE '%" + search + "%' OR qmd_defect_dl.JOB_ORDER_NO LIKE '%" + search + "%' OR qmd_lot_create.LOT_CREATOR LIKE '%" + search + "%' OR qmd_defect_dl.ITEM_CODE LIKE '%" + search + "%' OR qmd_defect_dl.ITEM_NAME LIKE '%" + search + "%') AND qmd_defect_dl.REJECTION_REMARKS = 'DEFECT' ORDER BY qmd_lot_create.PROD_DATE DESC;";
  $.ajax({
    method: 'post',
    url: "/1_mes/_php/QualityManagement/table/defect_table.php",
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_defect").innerHTML = data;
    }
  });
 }

function ClearDefectSearch(){
  var z = "SELECT * FROM qmd_defect_dl WHERE REJECTION_REMARKS = 'DEFECT'";
  $.ajax({
    method: 'post',
    url: "/1_mes/_php/QualityManagement/table/defect_table.php",
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_defect").innerHTML = data;
      defectSearchId.value = "";
    }
  });
 }

$(document).on('change', '#JobOrderNo', function () {
    var jobOrderNumber = $(this).val();
  if (jobOrderNumber == " " || jobOrderNumber == null || jobOrderNumber == undefined){
    document.getElementById("JobOrderNo").value = "";
    return; 
    }

    $.ajax({
      url: "/1_mes/_php/QualityManagement/list/getLotNumbers.php",
      type: 'post',
      data: { 
        'jobOrder': jobOrderNumber,
        'ajax': true
      },

      success: function (data) {
          document.getElementById("datalistLotNumber").innerHTML = data;
    }
    }),

  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/_modal/DefectDetails.php',
    data:
      {
        'jobOrder': jobOrderNumber,
        'ajax': true
      },
    success: function (data) {
          var val = JSON.parse(data);
      document.getElementById("LotQuantityID").value = "";  
      if (val == '' || val == null || val == undefined) {
        itemCodeID.value = "";
        itemNameID.value = "";
        DivCodeID.value = "";
        DivNameID.value = "";
        document.getElementById("JobOrderNo").value = "";
        swal(
          'Job Order does not exist!',
          'Please search existing Job Order',
          'error'
        );
        return;
      }
      else {
        document.getElementById("itemCodeID").value = val.ITEMCODE;
        document.getElementById("itemNameID").value = val.ITEMNAME;
        document.getElementById("DivCodeID").value = val.DIVI_CODE;
        document.getElementById("DivNameID").value = val.DIVI_NAME;
        }
      }
    });

  });

$(document).on('change', '#defectInputID', function () {
  var defectName = $(this).val();
  if (defectName == " ") {
    document.getElementById("DefectCodeID").value = "";
    return;
  }
  $.ajax({
    url: "/1_mes/_php/QualityManagement/list/getDefectCode.php",
    type: 'post',
    data: {
      'defectName': defectName,
      'ajax': true
    },

    success: function (data) {
      var val = JSON.parse(data);
      document.getElementById("DefectCodeID").value = val.DEFECT_CODE;
    }
  });
 });

$(document).on('change', '#datalistLotNumber', function () {
  var defectMgmt_LotNum = $(this).val();
  if (defectMgmt_LotNum == " "){
    document.getElementById("LotQuantityID").value = "";
    document.getElementById("prodDateID").value = "";
    document.getElementById("prodTimeID").value = "";
    return;
  }
  $.ajax({
    url: "/1_mes/_php/QualityManagement/list/getLotQuantity.php",
    type: 'post',
    data: {
      'lotNumber': defectMgmt_LotNum,
      'ajax': true
    },

    success: function (data) {
      
      var val = JSON.parse(data);
      prodDate = val.PROD_DATE.slice(0,10);
      prodTime = val.PROD_DATE.slice(11,19);
      document.getElementById("prodDateID").value = prodDate;
      document.getElementById("prodTimeID").value = prodTime;
      document.getElementById("LotQuantityID").value = val.LOT_QTY;
    }
  });
 });

$(document).on('click', '#defectConfirm', function () {
  var DefectInputID = document.getElementById("defectInputID").value;
  var date = document.getElementById("prodDateID").value;
  var time = document.getElementById("prodTimeID").value;
  var JobOrderNo = document.getElementById("JobOrderNo").value;
  var datalistLotNumber = document.getElementById("datalistLotNumber").value;
  var DivCodeID = document.getElementById("DivCodeID").value;
  var DivNameID = document.getElementById("DivNameID").value;
  var itemCodeID = document.getElementById("itemCodeID").value;
  var itemNameID = document.getElementById("itemNameID").value;
  var LotQuantityID = document.getElementById("LotQuantityID").value;
  var DefectCodeID = document.getElementById("DefectCodeID").value;
  
  var dateTimeDefect = date + " " + time;
  var DefQty = document.getElementById("DefQty").value;
  if (DefectInputID == " " || date == "" || time == "" || JobOrderNo == "" || DefQty == ""){
    alert("Please leave no textbox empty.");
    DisplayTableDefect('DefectTable', 'DefectTableSP', 'Defective_List');
    return;
  }

  $.ajax({
    url: "/1_mes/_php/QualityManagement/_modal/AddDefect.php",
    type: 'post',
    data: {
      'JobOrderNo': JobOrderNo,
      'datalistLotNumber': datalistLotNumber,
      'DivCodeID': DivCodeID,
      'DivNameID': DivNameID,
      'itemCodeID': itemCodeID,
      'itemNameID': itemNameID,
      'LotQuantityID': LotQuantityID,
      'DefectCodeID': DefectCodeID,
      'DefectInputID': DefectInputID,
      'dateTimeDefect': dateTimeDefect,
      'DefQty': DefQty,
      'ajax': true
    },
    success: function (data) {
      swal(
        data,
        'Job Order Number ' + JobOrderNo + ' defect quantity already saved!',
        'success'
      );
      
      DisplayTableDefect('DefectTable', 'DefectTableSP', 'Defective_List');
    }
  });
 });

/* $(document).ready(function () {
  $('#example').DataTable();
 });
 */


function DisplayTableDefect(Table_Name, Tablesp, tbltitle) {
  
  var xhttp;
  if (Table_Name.length == 0) {
    document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    
    if (this.readyState == 4 && this.status == 200) {
      
      document.getElementById("table_display").innerHTML = this.responseText;
      var tble = $('#Dtable').DataTable({
        deferRender: true,
        scrollY: '59vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,
        "ajax": {
          url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
          type: 'POST'
        },
        "dom": '<"row"<"col-4"B><"col"><"col-sm-3 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [
          {
            text: '<i class="fas fa-plus"></i>',
            name: 'add', // do not change name 
            className: 'btn btn-export6 btn-xs py-1',
            extend: 'add0',
            action: function (e, dt, node, config) {
              $('#insertDefect').modal('show');
              $('#insertDefect').focus();
            }
          },
          {
            extend: 'selected', // Bind to Selected row
            text: '<i class="fas fa-edit"></i>',
            attr: {
              title: 'Edit Data',
              id: 'editButton'
            },
            name: 'edit',        // do not change name
            className: 'btn btn-export6 btn-xs py-1',
            action: function (e, dt, node, config) {
              var data = dt.row('.selected').data();
              getDefectDtls(data[0]);
              $('#editDefect').modal('show');
              $('#editDefect').focus();
            }
          },
          {

            name: 'delete',      // do not change name
            text: '<i class="fas fa-trash"></i>',
            className: 'btn btn-export6 btn-xs py-1',
            extend: 'selected', // Bind to Selected row
            action: function (e, dt, node, config) {
            var data = dt.row('.selected').data();
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                /* delete function */
                deleteDefect(data[0]);
                 /* delete function */
                swal(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                );
              }
            });

            }
          },
          {
            extend: 'copy', text: '<i class="far fa-copy"></i>',
            attr: {
              title: 'Copy to Clipboard',
              id: 'copyButton'
            },
            className: 'btn btn-export6 btn-xs py-1'
          },
          {
            extend: 'excel', text: '<i class="fas fa-table"></i>',
            attr: {
              title: 'Export to Excel',
              id: 'exportButton'
            },
            filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'
          }
        ],
        select: 'single',
        "columnDefs": [{
          /* sortable: false,
          "class": "index",
          "searchable": false,
          "orderable": false, */
          "targets": 0
        }],
        "order": [[0, 'desc']]

      });

      tble.on('order.dt search.dt processing.dt page.dt', function () {
        tble.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();

    }
  };
  xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name   + ".php", true);
  xhttp.send();
 }
 $.fn.dataTable.ext.buttons.add0 = {
 };

function DisplayTable1(Table_Name, Tablesp, tbltitle) {

  var xhttp;
  if (Table_Name.length == 0) {
    document.getElementById("first_table").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      document.getElementById("first_table").innerHTML = this.responseText;
      var tble = $('#DanplaTable').DataTable({
        deferRender: true, 
        scrollY: '54vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,
        "ajax": {
          url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
          type: 'POST'
        },
        "dom": '<"row"<"col-4"B><"col"><"col-sm-3 pl-0 mr-5">><"row"<"col-12"<"dd">>>t<"row"<"col"i><"col"p>>',
        'buttons': [
          {
            name: 'delete',      // do not change name
            text: '<i class="fas fa-trash"></i>',
            className: 'btn btn-export6 btn-xs py-1',
            extend: 'selected', // Bind to Selected row
            action: function (e, dt, node, config) {
              var data = dt.row('.selected').data();
              deleteDanpla(data[0]);
            }
          },
          {
            extend: 'copy', text: '<i class="far fa-copy"></i>',
            attr: {
              title: 'Copy to Clipboard',
              id: 'copyButton'
            },
            className: 'btn btn-export6 btn-xs py-1'
          },
          {
            extend: 'excel', text: '<i class="fas fa-table"></i>',
            attr: {
              title: 'Export to Excel',
              id: 'exportButton'
            },
            filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'
          }
        ],
        select: 'single',
        "columnDefs": [{
          "targets": 0
        }],
        "order": [[0, 'desc']]

      });

      $("div.dd").html('<div class="py-1 input-group"><input type="textarea" class="form-control form-control-sm" id="Barcode_text" placeholder="SCAN DANPLA SERIAL NUMBER"><div class="input-group-append"><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="AddBtn" onclick="AddBtnClick()">ADD</button><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="LotCreateBtn" onclick="generateLot()">LOT CREATE</button></div></div>');

      tble.on('order.dt search.dt processing.dt page.dt', function () {
        tble.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();

    }
  };
  xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
  xhttp.send();
    }
    $.fn.dataTable.ext.buttons.add0 = {
  };

function DisplayTable2(Table_Name, Tablesp, tbltitle) {

  var xhttp;
  if (Table_Name.length == 0) {
    document.getElementById("second_table").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      document.getElementById("second_table").innerHTML = this.responseText;
      var tble = $('#LotTable').DataTable({
        deferRender: true,
        scrollY: '60vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,
        "ajax": {
          url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
          type: 'POST'
        },
        "dom": '<"row"<"col-4"B><"col"><"col"><"col-sm-4 pl-5 ml-0"f>>t<"row"<"col"p>>',
        'buttons': [
          {
            extend: 'copy', text: '<i class="far fa-copy"></i>',
            attr: {
              title: 'Copy to Clipboard',
              id: 'copyButton'
            },
            className: 'btn btn-export6 btn-xs py-1'
          },
          {
            extend: 'excel', text: '<i class="fas fa-table"></i>',
            attr: {
              title: 'Export to Excel',
              id: 'exportButton'
            },
            filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'
          }
        ],
        select: 'single',
        "columnDefs": [{
          /* sortable: false,
          "class": "index",
          "searchable": false,
          "orderable": false, */
          "targets": 0
        }],
        "order": [[0, 'desc']]

      });

      tble.on('order.dt search.dt processing.dt page.dt', function () {
        tble.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();

    }
  };
  xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
  xhttp.send();
   }
    $.fn.dataTable.ext.buttons.add0 = {
  };
/* function DisplayTable3(Table_Name, Tablesp, tbltitle) {

  var xhttp;
  if (Table_Name.length == 0) {
    document.getElementById("third_table").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      document.getElementById("third_table").innerHTML = this.responseText;
      var tble = $('#pendingLotTable').DataTable({
        deferRender: true,
        scrollY: '59vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,
        "ajax": {
          url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
          type: 'POST'
        },
        "dom": '<"row"<"col-4"B><"col"><"col"><"col-sm-4 pl-5 ml-0"f>>t<"row"<"col"p>>',
        'buttons': [
          {
            extend: 'copy', text: '<i class="far fa-copy"></i>',
            attr: {
              title: 'Copy to Clipboard',
              id: 'copyButton'
            },
            className: 'btn btn-export6 btn-xs py-1'
          },
          {
            extend: 'excel', text: '<i class="fas fa-table"></i>',
            attr: {
              title: 'Export to Excel',
              id: 'exportButton'
            },
            filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'
          }
        ],
        select: 'single',
        "columnDefs": [{
          "targets": 0
        }],
        "order": [[0, 'desc']]

      });

      tble.on('order.dt search.dt processing.dt page.dt', function () {
        tble.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();

    }
  };
  xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
  xhttp.send();
  }
  $.fn.dataTable.ext.buttons.add0 = {
  };
 */
function getDefectDtls(defect_id){

  $.ajax({
    url: "/1_mes/_php/QualityManagement/list/getDefectDetails.php",
    type: 'post',
    data: {
      'def_ID': defect_id,
      'ajax': true
    },

    success: function (data) {
      var val = JSON.parse(data);
      var prodDate = val.PROD_DATE.slice(0, 10);
      var prodTime = val.PROD_DATE.slice(11, 19);

      if(val.LOT_NUMBER == " "){
        document.getElementById("edatalistLotNumber").value = "";
        document.getElementById("eLotQuantityID").value = "";
        document.getElementById("eprodDateID").value = "";
        document.getElementById("eprodTimeID").value = "";
      }
      else{
        document.getElementById("edatalistLotNumber").value = val.LOT_NUMBER;
        document.getElementById("eLotQuantityID").value = val.LOT_QTY;
        document.getElementById("eprodDateID").value = prodDate;
        document.getElementById("eprodTimeID").value = prodTime;
      }
      
      defectID
      document.getElementById("defectID").value = val.LOT_DEFECT_ID;
      document.getElementById("eJobOrderNo").value = val.JOB_ORDER_NO;
      document.getElementById("eDivCodeID").value = val.DIVISION_CODE;
      /* document.getElementById("DivNameID").value; */
      document.getElementById("eitemCodeID").value = val.ITEM_CODE;
      document.getElementById("eitemNameID").value = val.ITEM_NAME;
      document.getElementById("eDefectCodeID").value = val.DEFECT_CODE;
      document.getElementById("edefectInputID").value = val.DEFECT_NAME;
      document.getElementById("eDefQty").value = val.DEF_QUANTITY;




    }
  });
 }

$(document).on('change', '#eJobOrderNo', function () {
  document.getElementById("edatalistLotNumber").value = "";
  var jobOrderNumber = $(this).val();
  if (jobOrderNumber == "" || jobOrderNumber == " " || jobOrderNumber == null || jobOrderNumber == undefined) {
    document.getElementById("eJobOrderNo").value = "";
    return;
  }

  $.ajax({
    url: "/1_mes/_php/QualityManagement/list/getLotNumbers.php",
    type: 'post',
    data: {
      'jobOrder': jobOrderNumber,
      'ajax': true
    },

    success: function (data) {
      document.getElementById("lotNumber").innerHTML = data;
    }
  }),

  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/_modal/DefectDetails.php',
    data:
      {
        'jobOrder': jobOrderNumber,
        'ajax': true
      },
    success: function (data) {
      var val = JSON.parse(data);
      document.getElementById("eLotQuantityID").value = "";
      if (val == '' || val == null || val == undefined) {
        itemCodeID.value = "";
        itemNameID.value = "";
        DivCodeID.value = "";
        DivNameID.value = "";
        document.getElementById("eJobOrderNo").value = "";
        swal(
          'Job Order does not exist!',
          'Please search existing Job Order',
          'error'
        );
        return;
      }
      else {
        document.getElementById("eitemCodeID").value = val.ITEMCODE;
        document.getElementById("eitemNameID").value = val.ITEMNAME;
        document.getElementById("eDivCodeID").value = val.DIVI_CODE;
        document.getElementById("eDivNameID").value = val.DIVI_NAME;
      }
    }
  });

 });

$(document).on('change', '#edatalistLotNumber', function () {
  var defectMgmt_LotNum = $(this).val();
  if (defectMgmt_LotNum == "" || defectMgmt_LotNum == " " || defectMgmt_LotNum == null || defectMgmt_LotNum == undefined) {
    document.getElementById("edatalistLotNumber").value = "";
    document.getElementById("eLotQuantityID").value = "";
    document.getElementById("eprodDateID").value = "";
    document.getElementById("eprodTimeID").value = "";
    return;
  }
  $.ajax({
    url: "/1_mes/_php/QualityManagement/list/getLotQuantity.php",
    type: 'post',
    data: {
      'lotNumber': defectMgmt_LotNum,
      'ajax': true
    },

    success: function (data) {
      var val = JSON.parse(data);
      prodDate = val.PROD_DATE.slice(0, 10);
      prodTime = val.PROD_DATE.slice(11, 19);
      document.getElementById("eprodDateID").value = prodDate;
      document.getElementById("eprodTimeID").value = prodTime;
      document.getElementById("eLotQuantityID").value = val.LOT_QTY;
    }
  });
 });

$(document).on('change', '#edefectInputID', function () {
  var defectName = $(this).val();
  if (defectName == " ") {
    document.getElementById("eDefectCodeID").value = "";
    return;
  }
  $.ajax({
    url: "/1_mes/_php/QualityManagement/list/getDefectCode.php",
    type: 'post',
    data: {
      'defectName': defectName,
      'ajax': true
    },

    success: function (data) {
      var val = JSON.parse(data);
      document.getElementById("eDefectCodeID").value = val.DEFECT_CODE;
    }
  });
 });

function deleteDefect(def_ID){
  var x = def_ID;
  $.ajax({
    url: "/1_mes/_php/QualityManagement/deleteDefect.php",
    type: 'post',
    data: {
      'defect_ID': x,
      'ajax': true
    },

    success: function (data) {
      DisplayTableDefect('DefectTable', 'DefectTableSP', 'Defective_List');
    }
  });
 }

$(document).on('click', '#updateDefect', function () {
  var def_ID = document.getElementById("defectID").value;
  var DefectInputID = document.getElementById("edefectInputID").value;
  var date = document.getElementById("eprodDateID").value;
  var time = document.getElementById("eprodTimeID").value;
  var JobOrderNo = document.getElementById("eJobOrderNo").value;
  var datalistLotNumber = document.getElementById("edatalistLotNumber").value;
  var DivCodeID = document.getElementById("eDivCodeID").value;
  var DivNameID = document.getElementById("eDivNameID").value;
  var itemCodeID = document.getElementById("eitemCodeID").value;
  var itemNameID = document.getElementById("eitemNameID").value;
  var LotQuantityID = document.getElementById("eLotQuantityID").value;
  var DefectCodeID = document.getElementById("eDefectCodeID").value;

  var dateTimeDefect = date + " " + time;
  var DefQty = document.getElementById("eDefQty").value;

  if (DefectInputID == " " || date == "" || time == "" || JobOrderNo == "" || DefQty == "") {
    alert("Please leave no textbox empty.");
    DisplayTableDefect('DefectTable', 'DefectTableSP', 'Defective_List');
    return;
  }

  $.ajax({
    url: "/1_mes/_php/QualityManagement/_modal/EditDefect.php",
    type: 'post',
    data: {
      'defect_ID': def_ID,
      'JobOrderNo': JobOrderNo,
      'datalistLotNumber': datalistLotNumber,
      'DivCodeID': DivCodeID,
      'DivNameID': DivNameID,
      'itemCodeID': itemCodeID,
      'itemNameID': itemNameID,
      'LotQuantityID': LotQuantityID,
      'DefectCodeID': DefectCodeID,
      'DefectInputID': DefectInputID,
      'dateTimeDefect': dateTimeDefect,
      'DefQty': DefQty,
      'ajax': true
    },
    success: function (data) {
      swal(
        data,
        'Job Order Number ' + JobOrderNo + ' defect quantity already edited!',
        'success'
      );

      DisplayTableDefect('DefectTable', 'DefectTableSP', 'Defective_List');
    }
  });
 });

$(document).on('click', '.deleteDanpla', function () {
  //$('#dataModal').modal();
  var danpla = $(this).attr("id");
  
 swal({
    title: 'Delete' + danpla + "?",
    text: "Are you sure you want to delete?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Delete Danpla'
  }).then((result) => {
    if (result.value) {


      $.ajax({
        method: 'post',
        url: '/1_mes/_php/QualityManagement/delete_defect.php',
        data:
          {
            'danpla': danpla,
            'ajax': true
          },
        success: function (data) {

          swal(
            data,
            'Danpla ' + danpla + ' Deleted!!',
            'success'
          )

          loadDoc('1stTab');
          return;

        }
      });

      
    }
  });
 });

function deleteDanpla(danpla_ID) {
  //$('#dataModal').modal();
  var danpla = danpla_ID;
  swal({
    title: 'Are you sure you want to delete?',
    text: "You won't able to revert this.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Delete Danpla'
  }).then((result) => {
    if (result.value) {


      $.ajax({
        method: 'post',
        url: '/1_mes/_php/QualityManagement/delete_danpla.php',
        data:
          {
            'danpla': danpla,
            'ajax': true
          },
        success: function (data) {

          swal(
            'Success!',
            'Danpla deleted!!',
            'success'
          )

          DisplayTable1('DanplaTempStore', 'DanplaTempStoreSP', 'DanplaTemp');
          return;

        }
      });
    }
  });
 }
