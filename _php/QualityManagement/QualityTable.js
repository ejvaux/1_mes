function loadDoc(TableName) {
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      /* totalQty(); */
     document.getElementById("table_display").innerHTML = this.responseText;
      
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
                  'Please insert danpla be allocated.',
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
                  var x = document.getElementById("LotCreationTable").rows.length;
                  var check = "false";
                          if(x > 1 ){
                            check = CheckDanpla(val.PACKING_NUMBER, val.JO_NUM, val.ITEM_CODE, val.ITEM_NAME, val.SUM_QTY, val.MACHINE_CODE);    
                            }
                          else if(x = 1){
                            InsertDanpla(val.PACKING_NUMBER, val.JO_NUM, val.ITEM_CODE, val.ITEM_NAME, val.SUM_QTY, val.MACHINE_CODE);
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
      loadDoc("LotCreate");
      totalQty();
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
        totalQty();
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


function totalQty(){
  $.ajax({
    url:'/1_mes/_php/QualityManagement/TotalQty.php',
    method:'post',
    success: function(data){
      if (data != null){
      document.getElementById('Quantity_text').value = data;
      }
      else{
        document.getElementById('Quantity_text').value = "0";
      }
    }
    });
  }

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
        lotlot = lotNumber;
        
        
      }
    });
  }

var lotGlobal;
var lotlot;
function generateLot(){
  var z = document.getElementById("LotCreationTable").rows.length;
  if (z == 1) {
    swal(
      'No items allocated.',
      'Please insert danpla to create lot.',
      'warning'
    )
    return;
  }
  else{
  var x = document.getElementById("LotCreationTable").rows[1].cells[1].innerHTML;
  var y = document.getElementById("LotCreationTable").rows[1].cells[4].innerHTML;
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
      if (data == "true" || data == "false" ){
        buildLotNumber();
        lotGlobal = lotlot;
        
      }
      else if (data != "false" || data != "true"){
      var val = JSON.parse(data);
                  var lotPrev = val.slice(0,11);
                  var series= val.slice(-1);
                  var i = parseInt(series) + 1;
        lotlot = lotPrev + i;
        lotGlobal = lotlot;
       
      }
      AddLotBtnClick(lotGlobal);
    }
  });
}

function AddLotBtnClick(lotGlobal){
  
  var x = document.getElementById("LotCreationTable").rows.length;

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
            'lot_number': lotGlobal,
            'lot_qty': document.getElementById('Quantity_text').value,
            'ajax': true
          },
        success: function (data) {
          loadDoc("LotCreate");
          return;

        }
      });

      swal(
        'Lot '  + lotGlobal + ' Created!',
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
          /* alert(data); */
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
  var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + '";' ;
  /* var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + ' AND DATE(NOW()) = DATE(PROD_DATE)";'; */
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/LotJudgement.php',
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_display").innerHTML = data;
    }
  });
}

function filterText() {
  var y = document.getElementById("CreatedLotTable").rows.length;
  var x = document.getElementById("CreatedLotTable").rows[y-1].cells[1].innerHTML;
  
  if(x!="PENDING" && x!="APPROVED" && x!="DISAPPROVED"){
      x = "PENDING"
  }
  var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT LIKE "%' + x + '%" ORDER BY LOT_JUDGEMENT DESC;';
  /* var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + x + ' AND DATE(NOW()) = DATE(PROD_DATE)";'; */
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/LotJudgement.php',
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_display").innerHTML = data;
    }
  });
}

function searchLot(){
  var search = searchText.value;
  /* var z = "SELECT * FROM qmd_lot_create WHERE LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%' OR LOT_JUDGEMENT LIKE '%" + search + "%' AND DATE(NOW()) = DATE(PROD_DATE);"; */
  var z = "SELECT * FROM qmd_lot_create WHERE LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%' OR LOT_JUDGEMENT LIKE '%" + search + "%' ORDER BY LOT_JUDGEMENT DESC;";
  
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/LotJudgement.php',
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_display").innerHTML = data;
    }
  });
}
function ClearSearchLot() {
  var z = "SELECT * FROM qmd_lot_create ORDER BY LOT_JUDGEMENT DESC;";
  /* var z = "SELECT * FROM qmd_lot_create WHERE DATE(NOW()) = DATE(PROD_DATE);"; */
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/LotJudgement.php',
    data: {
      'sql': z,
      'ajax': true
    },
    success: function (data) {
      document.getElementById("table_display").innerHTML = data;
    }
  });
}

$(document).on('click', '.lotDisapprove', function (){


});


$(document).on('click', '.lotDisapprove', function () {
  //$('#dataModal').modal();
  var lotNumber = $(this).attr("id");
 /*  DisplayLotDetails(lotNumber); */
  document.getElementById('lot_num').value = lotNumber;
  
});

/* function DisplayLotDetails(lotNum){
  var x = lotNum;
  var z = "SELECT JO_BARCODE, SUM(PRINT_QTY) as SUMQ FROM mis_product WHERE LOT_NUM ='" + x + "' GROUP BY PACKING_NUMBER";
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
} */

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
    insertRework(lotNumber, Quantity_Defect, remarks);
    filterText();
    $('#modalID').trigger('reset');
  }
});


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
        /* $.ajax({
          url: "/1_mes/_php/QualityManagement/ApproveRework.php",
          method: "POST",
          data: {
            'lot_number': lotNumber,
            'ajax': true
          },
          success: function (data) {

            loadDoc("LotRecovery");
          }
        }); */

        var decision = 'PENDING-REWORK';

        $.ajax({
          url: "/1_mes/_php/QualityManagement/ApproveRework.php",
          method: "POST",
          data: {
            'lot_number': lotNumber,
            'decision': decision,
            'ajax': true
          },
          success: function (data) {
            filterText();
            $('#modalID').trigger('reset');
          }
        });

        swal(
          'REWORK!',
          'Your file has been recorded as rework.',
          'success'
        )






        


        swal(
          'Lot Approved!',
          'Your item has been approved!',
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
            alert(data);
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
  var remarks = document.getElementById('defectInputID').value;
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
        'Your imaginary file is safe :)',
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

$("#myModal").on('hide.bs.modal', function () {
  /* $('#modalID').trigger('reset'); */
  document.getElementById('defect_QTY').value = "";
});

/* $("#myModal").on("hidden.bs.modal", function (e) {
  $(this).removeData();
}); */
