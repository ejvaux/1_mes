var username;

function loadDoc(TableName, uname) {
  username = uname;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_display").innerHTML = this.responseText;
      if (TableName == 'LotCreate') {
        DisplayTable1('DanplaTempStore', 'DanplaTempStoreSP', 'DanplaTemp', uname);
        DisplayTable2('CreatedLot', 'CreatedLotSP', 'Created_Lot');
        /* DisplayTable3(); */
        //var dtdt = new Date().toISOString().slice(0, 10);
        /* var dtdt1 = moment(dtdt, 'YYYY-MM-DD').add(1, 'days').calendar(); */
        checkuserauthF();
      } else if (TableName == 'ItemReceiving') {
        DisplayTableItemReceiving('ItemReceivedTable', 'ItemReceivedTableSP', uname);
        //ReloadTableList()
        DisplayTableDanplaList('ItemReceivingDanplaList', 'ItemReceivingDanplaListSP', 'DanplaList', '123','123');
      }
    }
  };
  xhttp.open("GET", TableName + ".php", true);
  xhttp.send();
} //end loads table in different tabs


//-------------------------------------------- LOT JUDGEMENT FUNCTIONS -------------------------
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
  } //end data validation in where number keys is only needed

$(document).on('click', '.lotApprove', function () {
  var id = $(this).attr("id");
  var item_code = id.substr(id.indexOf('@') + 1)
  var lotNumber = id.substr(0, id.indexOf('@'));
  /* alert(lotNumber + ' xxxxxx ' + item_code); */
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
          url: "/1_mes/_php/QualityManagement/query/update/UpdateLotJudgement.php",
          method: "POST",
          data: {
            'lot_number': lotNumber,
            'item_code': item_code,
            'decision': "APPROVE"
          },
          success: function (data) {
            filterText();
          }
        });
        swal('LOT APPROVED!', 'Your items has been approved.', 'success')
      }
    })
  }); // end approves a lot

$(document).on('click', '.epsonApprove', function () {
  var id = $(this).attr("id");
  var item_code = id.substr(id.indexOf('@') + 1)
  var lotNumber = id.substr(0, id.indexOf('@'));
  /* alert(lotNumber + ' xxxxxx ' + item_code); */
  swal({
    title: 'BQICS Lot Approval',
    text: 'Are you sure you will approve lot ' + lotNumber + ' ?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'APPROVE'
    }).then((result) => {
    if (result.value) {
        $.ajax({
          url: "/1_mes/_php/QualityManagement/query/update/UpdateLotJudgement.php",
          method: "POST",
          data: {
            'lot_number': lotNumber,
            'item_code': item_code,
            'decision': "EPSON_APPROVED"
            },
          success: function (data) {
            filterText();
            }
          });
        swal('EPSON LOT APPROVED!', 'Your items has been approved.', 'success')
      }
      })
  }); // end approves a lot

$(document).on('click', '.lotPending', function () {
  var id = $(this).attr("id");
  var item_code = id.substr(id.indexOf('@') + 1)
  var lotNumber = id.substr(0, id.indexOf('@'));
  /* alert(lotNumber + ' xxxxxx ' + item_code); */
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
          url: "/1_mes/_php/QualityManagement/query/update/UpdateLotJudgement.php",
          method: "POST",
          data: {
            'lot_number': lotNumber,
            'item_code': item_code,
            'decision': "PENDING"
            },
          success: function (data) {
            filterText();
            }
          });
        swal('Status changed to PENDING!', 'Your item has been moved to pending.', 'success')
        }
        })
  }); // end sets an approved or disapproved lot into pending status again

function filterJudgement() {
  var x = document.getElementById("filterText");
  var y = x.options[x.selectedIndex].value;
  if (y == "ALL") {
    var z = 'SELECT * FROM qmd_lot_create ORDER BY PROD_DATE DESC LIMIT 100;';
  } else {
    var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + '" ORDER BY PROD_DATE DESC LIMIT 100;';
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
  } //end sets filter for judgement table whether approved, disapproved, pending or all

function filterText() {
  var x = document.getElementById("filterText");
  var y = x.options[x.selectedIndex].value;
  if (y == "ALL") {
    var z = 'SELECT * FROM qmd_lot_create ORDER BY PROD_DATE DESC LIMIT 100;';
    }
  else {
    var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + '" ORDER BY PROD_DATE DESC LIMIT 100;';
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
  } //end maintains the filter in judgement table whether approved, disapproved, pending or all

function searchLot() {
  var x = document.getElementById("filterText");
  var y = x.options[x.selectedIndex].value;
  var search = searchText.value;
  /* var z = "SELECT * FROM qmd_lot_create WHERE LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%' OR LOT_JUDGEMENT LIKE '%" + search + "%' AND DATE(NOW()) = DATE(PROD_DATE);"; */
  if (y == "ALL") {
    var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER IN (SELECT lot_num from mis_product WHERE danpla LIKE '%" + search + "%' OR danpla_reference LIKE  '%" + search + "%' )) OR (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%') ORDER BY PROD_DATE DESC LIMIT 100;";
    } 
  else {
    var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER IN (SELECT lot_num from mis_product WHERE danpla LIKE '%" + search + "%' OR danpla_reference LIKE  '%" + search + "%' )) OR ((LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%') AND (LOT_JUDGEMENT = '" + y + "')) ORDER BY PROD_DATE DESC LIMIT 100;";
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
  } //end search in lot judgement

function ClearSearchLot() {
  var x = document.getElementById("filterText");
  var y = x.options[x.selectedIndex].value;
  if (y == "ALL") {
    var z = 'SELECT * FROM qmd_lot_create ORDER BY LOT_JUDGEMENT DESC LIMIT 100;';
    } 
  else {
    var z = 'SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT ="' + y + '" ORDER BY PROD_DATE DESC LIMIT 100;';
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
  } //end clear search in lot judgement

$(document).on('click', '.lotDisapprove', function () {
  var id = $(this).attr("id");
  var item_code = id.substr(id.indexOf('@') + 1)
  var lotNumber = id.substr(0, id.indexOf('@'));
  /* alert(lotNumber + ' xxxxxx ' + item_code);   */
  document.getElementById('lot_num').value = lotNumber;
  document.getElementById('item_code').value = item_code;
}); //modal that appears when item is judged as disapproved

$(document).on('click', '.lotDanpla', function () {
  var id = $(this).attr("id");
  var item_code = id.substr(id.indexOf('@') + 1)
  var lotNumber = id.substr(0, id.indexOf('@'));
  /* alert(lotNumber + ' xxxxxx ' + item_code); */

  DisplayLotDetails(lotNumber, item_code);
  document.getElementById('LOT_NUMBER').value = lotNumber;
  document.getElementById('ITEM_CODE').value = item_code;
}); //end opens modal that displays lot details

function DisplayLotDetails(lotNum, item_code) {
  var x = lotNum;
  var y = item_code;
  /* var z = "SELECT PACKING_NUMBER, SUM(PRINT_QTY) as SUMQ,danpla_reference FROM mis_product WHERE LOT_NUM ='" + x + "' GROUP BY PACKING_NUMBER"; */
  var z = "SELECT danpla_reference, PACKING_NUMBER, SUM(PRINT_QTY) as SUMQ FROM mis_product WHERE LOT_NUM ='" + x + "' AND ITEM_CODE ='"+ y + "' GROUP BY PACKING_NUMBER";
  
  $.ajax({
    url: "/1_mes/_php/QualityManagement/table/LotDanplaList.php",
    method: "POST",
    data: {
      'sql1': z,
      'item_code': y,
      'lot_number': x,
      'ajax': true
      },
    success: function (data) {
      document.getElementById("tblModal").innerHTML = data;
      }
    });
  } // end table inside modal that displays lot details

$(document).on('click', '#ConfirmDefect', function () {
  var lotNumber = document.getElementById("lot_num").value;
  var item_code = document.getElementById("item_code").value;
  var Quantity_Defect = document.getElementById('defect_QTY').value;
  var remarks = document.getElementById('defectInput').value;
  if (Quantity_Defect == 0) {
    swal('No defect quantity.', 'Please input defect quantity to proceed.', 'warning')
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
        url: "/1_mes/_php/QualityManagement/query/update/UpdateLotJudgement.php",
        method: "POST",
        data: {
          'lot_number': lotNumber,
          'item_code': item_code,
          'defect_qty': Quantity_Defect,
          'remarks': remarks,
          'decision': decision,
          'ajax': true
          },
        success: function (data) {
          insertRework(lotNumber,item_code, Quantity_Defect, remarks);
          filterText();
          $('#modalID').trigger('reset');
          }
        });
      swal('REWORK!', 'Your file has been recorded as rework.', 'success')
      } 
    else if (result.dismiss === swal.DismissReason.cancel) {
      var decision = 'DISAPPROVE';
      $.ajax({
        url: "/1_mes/_php/QualityManagement/query/update/UpdateLotJudgement.php",
        method: "POST",
        data: {
          'lot_number': lotNumber,
          'item_code': item_code,
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
      swal('REJECT', 'You rejected lot number ' + lotNumber + ' !', 'error')
      }
    });
  }); //confirmation message if rework or reject

function InsertReject(defect, lotNum, rmks) {
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/query/insert/InsertLotDefect.php',
    data: {
      'defectQty': defect,
      'lotNumber': lotNum,
      'remarks': rmks,
      'ajax': true
      },
    success: function (data) { }
    });
  } //end insert reject info into DB table

function insertRework(lotNum,item_code, Quantity, reworkRemarks) {
  $.ajax({
    url: "/1_mes/_php/QualityManagement/query/insert/InsertRework.php",
    method: "POST",
    data: {
      'lot_number': lotNum,
      'item_code': item_code,
      'defect_qty': Quantity,
      'remarks': reworkRemarks,
      'ajax': true
      },
    success: function (data) {}
    });
  } //end insert rework information into DB table


//------------------------------------------------ LOT RECOVERY TAB FUNCTIONS
function RecoverySearchLot() {
  var search = RecoverySearch.value;
  var d1 = recoveryDate1.value;
  var d2 = recoveryDate2.value;
  if (d1 != "" && d2 != "") {
    if (search == "") {
      var z = "SELECT * FROM qmd_lot_create WHERE (PROD_DATE BETWEEN '" + d1 + "' AND '" + (d2 + 1) + "') AND (LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY) GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;";
      //var z = "SELECT * FROM qmd_lot_create WHERE (PROD_DATE BETWEEN '"+ d1 +"' AND '"+ (d2 + 1) +"') AND (LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY) GROUP BY LOT_NUMBER;";
      }
    else {
      var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%') AND (LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY) AND (PROD_DATE BETWEEN '%" + d1 + "' AND '%" + (d2 + 1) + "%') GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;";
      }
    }
  else if (d1 != "" && d2 == "") {
    if (search == "") {
      var z = "SELECT * FROM qmd_lot_create WHERE (PROD_DATE LIKE '%" + d1 + "%') AND (LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY) GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;";
      }
    else {
      var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%') AND (LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY) AND (PROD_DATE LIKE '%" + d1 + "%') GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;";
      }
    }
  else if (search != "") {
    var z = "SELECT * FROM qmd_lot_create WHERE (LOT_NUMBER LIKE '%" + search + "%' OR LOT_CREATOR LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%' OR JUDGE_BY LIKE '%" + search + "%' OR REMARKS LIKE '%" + search + "%') AND (LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY) GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;";
    }
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
  } //search in lot recovery table

function RecoveryClearSearchLot() {
  var z = "SELECT * FROM qmd_lot_create WHERE LOT_JUDGEMENT = 'DISAPPROVED' AND LOT_QTY != DEFECT_QTY GROUP BY LOT_NUMBER ORDER BY PROD_DATE DESC;";
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
      recoveryDate1.value = "";
      recoveryDate2.value = "";
      }
    });
  } // clear search in lot recovery table

$(document).on('click', '.scrapbtn', function () {
  var lotNumber = $(this).attr("id");
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
        if (confirm("Will proceed to record lot:" + " " + lotNumber + " " + "as SCRAP.\nCONFIRM?\nIf no, click 'CANCEL' and click 'REWORK' to approve lot.")) { } 
        else {
          return;
          }
        }
      else {
        return;
        }
      $.ajax({
        url: "/1_mes/_php/QualityManagement/query/update/ApproveScrap.php",
        method: "POST",
        data: {
          'lot_number': lotNumber,
          'ajax': true
          },
        success: function (data) {
          loadDoc("LotRecovery");
          }
        });
      swal('Deleted!', 'Your lot has been recorded as SCRAP', 'success')
      }
    })
  }); //end confirm scrap button

$(document).on('click', '.reworkbtn', function () {
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
        url: "/1_mes/_php/QualityManagement/query/update/ApproveRework.php",
        method: "POST",
        data: {
          'lot_number': lotNumber,
          'ajax': true
          },
        success: function (data) {
          loadDoc("LotRecovery");
          }
        });
      swal('REWORK!', 'Your file has been recorded as rework.', 'success')
      }
      })
  }); //end confirm rework button

//------------------------------------------------- UNIVERSAL FUNCTION ---------------------------
function notWorking() {
  swal('Stop!', 'Under construction.', 'error');
} //prevent function from performing when function is not yet done

//-------------------------------------------------- DEFECT MANAGEMENT TAB FUNCTIONS ---------------------
$(document).on('change', '#JobOrderNo', function () {
  var jobOrderNumber = $(this).val();
  if (jobOrderNumber == " " || jobOrderNumber == null || jobOrderNumber == undefined) {
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
      getDefectDetails(jobOrderNumber);
      }
    })
  }); //select jobOrder in ddown

function getDefectDetails(jobOrder) {
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/_modal/DefectDetails.php',
    data: {
      'jobOrder': jobOrder,
      'ajax': true
      },
    success: function (data) {
      var val = JSON.parse(data);
      document.getElementById("LotQuantityID").value = "";
      if (val == '' || val == null || val == undefined) {
        DivCodeID.value = "";
        DivNameID.value = "";
        itemCodeID.value = "";
        itemNameID.value = "";
        datalistLotNumber.value = "";
        LotQuantityID.value = "";
        DefectCodeID.value = "";
        defectInputID.value = "";
        prodDateID.value = "";
        prodTimeID.value = "";
        DefQty.value = "";
        remarks.value = "";
        document.getElementById("JobOrderNo").value = "";
        swal('Job Order does not exist!', 'Please search existing Job Order', 'error');
        return;
        } 
      else {
        document.getElementById("DivCodeID").value = val.DIVI_CODE;
        document.getElementById("DivNameID").value = val.DIVI_NAME;
        document.getElementById("itemCodeID").value = val.ITEMCODE;
        document.getElementById("itemNameID").value = val.ITEMNAME;
        LotQuantityID.value = "";
        DefectCodeID.value = "";
        prodDateID.value = "";
        prodTimeID.value = "";
        DefQty.value = "";
        remarks.value = "";
        }
      }
    });
  } //display joborder details after selecting Joborder

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
  }); //select defect name in ddown

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
      prodDate = val.PROD_DATE.slice(0, 10);
      prodTime = val.PROD_DATE.slice(11, 19);
      document.getElementById("prodDateID").value = prodDate;
      document.getElementById("prodTimeID").value = prodTime;
      document.getElementById("LotQuantityID").value = val.LOT_QTY;
      }
    });
  }); //insert lotNumber in ddown

$(document).on('submit', '#modalID', function (e) {
  e.preventDefault();
  e.stopImmediatePropagation();

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
  if (DefectInputID == " " || date == "" || time == "" || JobOrderNo == "" || DefQty == "") {
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
      $('#insertDefect').delay(1000).fadeOut(450);
      setTimeout(function () {
        $('#insertDefect').modal("hide");
        $('.modal-backdrop').remove();
      }, 1500);
      swal(data, 'Job Order Number ' + JobOrderNo + ' defect quantity already saved!', 'success');
      DisplayTableDefect('DefectTable', 'DefectTableSP', 'Defective_List');
    }
  });
}); //insert defective item

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
        'buttons': [{
          text: '<i class="fas fa-plus"></i>',
          name: 'add', // do not change name 
          className: 'btn btn-export6 btn-xs py-1',
          extend: 'add0',
          action: function (e, dt, node, config) {
            $('#insertDefect').modal('show');
            $('#insertDefect').focus();
            }
          }, {
          extend: 'selected', // Bind to Selected row
          text: '<i class="fas fa-edit"></i>',
          attr: {
            title: 'Edit Data',
            id: 'editButton'
            },
          name: 'edit', // do not change name
          className: 'btn btn-export6 btn-xs py-1',
          action: function (e, dt, node, config) {
            var data = dt.row('.selected').data();
            $('#editDefect').modal('show');
            $('#editDefect').focus();
            getDefectDtls(data[0]);
            }
          }, {
          name: 'delete', // do not change name
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
                swal('Deleted!', 'Your file has been deleted.', 'success');
                }
              });
            }
          }, {
          extend: 'copy',
          text: '<i class="far fa-copy"></i>',
          attr: {
            title: 'Copy to Clipboard',
            id: 'copyButton'
            },
          className: 'btn btn-export6 btn-xs py-1'
            }, {
          extend: 'excel',
          text: '<i class="fas fa-table"></i>',
          attr: {
            title: 'Export to Excel',
            id: 'exportButton'
          },
          filename: tbltitle,
          className: 'btn btn-export6 btn-xs py-1'
          }],
        select: 'single',
        "columnDefs": [{
          /* sortable: false,
          "class": "index",
          "searchable": false,
          "orderable": false, */
          "targets": 0
          }],
        "order": [
          [0, 'desc']
          ]
        });
      tble.on('order.dt search.dt processing.dt page.dt', function () {
        tble.column(0, {
          search: 'applied',
          order: 'applied'
          }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
            });
        }).draw();
      }
    };
    xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
    xhttp.send();
  }
  $.fn.dataTable.ext.buttons.add0 = {}; //end defect management table

function a() {
  var lotNumber = document.getElementById("lot_num").value;
  var defect = parseInt(document.getElementById('defect_QTY').value);
  $.ajax({
    url: "/1_mes/_php/QualityManagement/query/get/GetQty.php",
    method: "POST",
    data: {
      'lot_number': lotNumber,
      'ajax': true
    },
    success: function (data) {
      var actualQty = parseInt(data);
      if (defect > actualQty) {
        document.getElementById('defect_QTY').value = "";
        swal({
          text: 'DEFECT QUANTITY IS HIGHER THAN ITS ACTUAL QUANTITY. PLEASE CHECK',
          type: 'error'
          });
        return;
       } 
      else {
        return;
        }
      }
    });
  } // insert defect qty in defect management tab

function getDefectDtls(defect_id) {
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
      if (val.LOT_NUMBER == " " || val.LOT_NUMBER == "" || val.LOT_NUMBER == null || val.LOT_NUMBER == undefined) {
        document.getElementById("edatalistLotNumber").value = "";
        document.getElementById("eLotQuantityID").value = "";
        document.getElementById("eprodDateID").value = "";
        document.getElementById("eprodTimeID").value = "";
      } else {
        document.getElementById("edatalistLotNumber").value = val.LOT_NUMBER;
        document.getElementById("eLotQuantityID").value = val.LOT_QTY;
        document.getElementById("eprodDateID").value = prodDate;
        document.getElementById("eprodTimeID").value = prodTime;
      }
      document.getElementById("defectID").value = val.LOT_DEFECT_ID;
      document.getElementById("eJobOrderNo").value = val.JOB_ORDER_NO;
      document.getElementById("eDivCodeID").value = val.DIVISION_CODE;
      document.getElementById("eDivNameID").value = val.DIVI_NAME;
      document.getElementById("eitemCodeID").value = val.ITEM_CODE;
      document.getElementById("eitemNameID").value = val.ITEM_NAME;
      document.getElementById("eDefectCodeID").value = val.DEFECT_CODE;
      document.getElementById("edefectInputID").value = val.DEFECT_NAME;
      document.getElementById("eDefQty").value = val.DEF_QUANTITY;
    }
  });
} //displays defect details for editing

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
      data: {
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
          swal('Job Order does not exist!', 'Please search existing Job Order', 'error');
          return;
        } else {
          document.getElementById("eitemCodeID").value = val.ITEMCODE;
          document.getElementById("eitemNameID").value = val.ITEMNAME;
          document.getElementById("eDivCodeID").value = val.DIVI_CODE;
          document.getElementById("eDivNameID").value = val.DIVI_NAME;
        }
      }
    });
  }); //display defect details when JO is selected

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
}); //edit lotNumber in ddown

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
}); //edit defect name in ddown

function deleteDefect(def_ID) {
  var x = def_ID;
  $.ajax({
    url: "/1_mes/_php/QualityManagement/query/delete/delete_defect.php",
    type: 'post',
    data: {
      'defect_ID': x,
      'ajax': true
    },
    success: function (data) {
      DisplayTableDefect('DefectTable', 'DefectTableSP', 'Defective_List');
    }
  });
} //deletes defective item 

$(document).on('submit', '#emodalID', function (e) {
  e.preventDefault();
  e.stopImmediatePropagation();
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
      $('#updateDefect').delay(1000).fadeOut(450);
      setTimeout(function () {
        $('#updateDefect').modal("hide");
        $('.modal-backdrop').remove();
      }, 1500);
      swal(data, 'Job Order Number ' + JobOrderNo + ' defect quantity already edited!', 'success');
      DisplayTableDefect('DefectTable', 'DefectTableSP', 'Defective_List');
    }
  });
}); // edits defective item

//----------------------------------------- ITEM RECEIVING FUNCTIONS------------------------------------------------
function clearReceive() {
  //$('#dataModal').modal();
  swal({
    title: 'Cancel Transferred Items?',
    text: "You won't able to revert this.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Clear Items'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        method: 'post',
        url: '/1_mes/_php/QualityManagement/query/delete/delete_receive.php',
        data: {
          'ajax': true
        },
        success: function (data) {
          swal(data, 'Danpla deleted!!', 'success')
          loadDoc("ItemReceiving");
          return;
        }
      });
    }
  });
} //clear items in danpla Received table

function DisplayTableItemReceiving(Table_Name, Tablesp, tbluser) {
  var xhttp;
  if (Table_Name.length == 0) {
    document.getElementById("first_table").innerHTML = "<h1>No data to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("first_table").innerHTML = this.responseText;
      var tble = $('#ItemReceivedTable').DataTable({
        deferRender: true,
        scrollY: '54.2vh',
        "oSearch": {
          "sSearch": tbluser
        },
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,
        "ajax": {
          url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
          type: 'POST'
        },
        "dom": '<"row"<"col-4"><"col"><"col-sm-3 pl-0 mr-5">><"row"<"col-md-12"<"db">>>t',
        select: 'single',
        "columnDefs": [{
          "targets": 0
        }, {
          "targets": 6,
          "visible": false,
        }],
        "order": [
          [0, 'desc']
        ]
      });
      $("div.db").html('<div class="py-1 input-group"><input type="textarea" class="form-control form-control-sm" id="ReceivingBarcode_text" placeholder="SCAN DANPLA SERIAL NUMBER"><div class="input-group-append"><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="AddReceiveBtn" onclick="AddReceive()">ADD</button><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="ConfirmReceiveBtn" onclick="ApproveTransfer()">TRANSFER</button><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="clearReceive" onclick="clearReceive()">CANCEL TRANSFER</button></div></div>');
      tble.on('order.dt search.dt processing.dt page.dt', function () {
        tble.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();
    }
  };
  xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
  xhttp.send();
}
$.fn.dataTable.ext.buttons.add0 = {}; //Item Receiving first table

function DisplayTableDanplaList(Table_Name, Tablesp, tbltitle, tblLot,tblItem) {
  var xhttp;
  if (Table_Name.length == 0) {
    document.getElementById("second_table").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("second_table").innerHTML = this.responseText;
      var tble = $('#ItemReceiveDanplaTable').DataTable({
        deferRender: true,
        scrollY: '54.2vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,
        "ajax": {
          url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
          data: {
            'item_code' : tblItem,
            'lot_number': tblLot,
            'ajax': true
          },
          type: 'POST'
        },
        "dom": '<"row py-1"<"col-3 py-2"B><"col"f>><"row"<"col"t>><"row"<"col"><"dd">>',
        'buttons': [{
          extend: 'copy',
          text: '<i class="far fa-copy"></i>',
          attr: {
            title: 'Copy to Clipboard',
            id: 'copyButton'
          },
          className: 'btn btn-export6 btn-xs py-1'
        }, {
          extend: 'excel',
          text: '<i class="fas fa-table"></i>',
          attr: {
            title: 'Export to Excel',
            id: 'exportButton'
          },
          filename: tbltitle,
          className: 'btn btn-export6 btn-xs py-1'
        }],
        select: 'single',
        "columnDefs": [{
          "targets": 0
        }, {
          "targets": 5,
          "visible": false,
        }, {
          "targets": 6,
          "visible": false,
        }],
        "order": [
          [0, 'desc']
        ]
      });
      $("div.dd").html('<div class="py-1"><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="reloadtbl" onclick="ReloadTableList()">RELOAD</button></div>');
      tble.on('order.dt search.dt processing.dt page.dt', function () {
        tble.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();
    }
  };
  xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
  xhttp.send();
}
$.fn.dataTable.ext.buttons.add0 = {}; //end list of DANPLA needed

function ReloadTableList() {
  var x = document.getElementById('ItemReceivedTable').rows[1].cells[0].innerHTML;
  if (x != "No data available in table") {
    var vblLot = document.getElementById('ItemReceivedTable').rows[1].cells[2].innerHTML;
    var vblItemCode = document.getElementById('ItemReceivedTable').rows[1].cells[3].innerHTML;
    DisplayTableDanplaList('ItemReceivingDanplaList', 'ItemReceivingDanplaListSP', 'DanplaList', vblLot, vblItemCode);
  }
} // end reload remaining fg table

function AddReceive() {
  var bcode = ReceivingBarcode_text.value;
  if (bcode == "") {
    swal('Input Barcode!', 'Please insert danpla to receive.', 'warning')
    return;
  }
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/query/get/getDanplaDetails.php',
    data: {
      'jo_barcode': bcode,
      'ajax': true
    },
    success: function (data) {
      var val = JSON.parse(data);
      if (val != undefined) {
        checkReceive(val.PACKING_NUMBER, val.JO_NUM, val.ITEM_CODE, val.ITEM_NAME, val.SUM_QTY, val.LOT_NUM);
      } else {
        swal('Serial does not exist in database!', 'Please insert existing danpla be allocated.', 'warning')
      }
    }
  });
} //end receive item in fg Item Receiving tab

function checkReceive(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertLot) {
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/query/get/getDanplaLot.php',
    data: {
      'jo_barcode': insertBarcode,
      'jo_num': insertJO,
      'lot_num': insertLot,
      'ajax': true
    },
    success: function (data) {
      if (data == '"true1"') {
        swal({
          text: 'DANPLA EXIST',
          type: 'error'
        });
        document.getElementById('ReceivingBarcode_text').value = "";
      } else if (data == '"true2"') {
        swal({
          text: 'DANPLA IS FROM DIFFERENT JO',
          type: 'error'
        });
        document.getElementById('ReceivingBarcode_text').value = "";
      } else if (data == '"true3"') {
        swal({
          text: 'DANPLA IS FROM DIFFERENT LOT',
          type: 'error'
        });
        document.getElementById('ReceivingBarcode_text').value = "";
      } else if (data == '"true4"') {
        swal('LOT STILL NOT APPROVED', 'Please get back to QM Dept for LOT APPROVAL', 'error');
        document.getElementById('ReceivingBarcode_text').value = "";
      } else if (data == '"true5"') {
        swal('DANPLA ALREADY TRANSFERRED', 'Please verify your stocks before inputting.', 'error');
        document.getElementById('ReceivingBarcode_text').value = "";
      } else if (data == '"false"') {
        insertReceive(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertLot);
      }
    }
  });
} //end danplaChecking before receiving

function insertReceive(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertLot) {
  $.ajax({
    method: 'post',
    url: '/1_mes/_php/QualityManagement/query/insert/InsertReceiveItem.php',
    data: {
      'jo_barcode': insertBarcode,
      'jo_num': insertJO,
      'item_code': insertItemCode,
      'item_name': insertItemName,
      'print_qty': insertQuantity,
      'lot_num': insertLot,
      'ajax': true
    },
    success: function (data) {
      swal({
        text: data,
        type: 'success'
      });
      DisplayTableItemReceiving('ItemReceivedTable', 'ItemReceivedTableSP', username);
      DisplayTableDanplaList('ItemReceivingDanplaList', 'ItemReceivingDanplaListSP', 'DanplaList', insertLot, insertItemCode);
    }
  });
} // end InsertIntoQueueingTable

function ApproveTransfer() {
  var gathered = document.getElementById("ItemReceivedTable").rows.length;
  var list = document.getElementById("ItemReceiveDanplaTable").rows.length;
  var x = document.getElementById('ItemReceivedTable').rows[1].cells[0].innerHTML;
  var y = document.getElementById('ItemReceiveDanplaTable').rows[1].cells[0].innerHTML;
  var vblLot = document.getElementById('ItemReceivedTable').rows[1].cells[2].innerHTML;
  var vblItemCode = document.getElementById('ItemReceivedTable').rows[1].cells[3].innerHTML;
  if (x != "No data available in table" && y == "No data available in table") {
    ReloadTableList();
    swal('Try again', 'Table is now reloaded.', 'error');
    return;
  } else if (x == "No data available in table" && y == "No data available in table") {
    swal('Please scan barcode!', 'Please insert danpla to be receive.', 'warning')
    return;
  } else if (gathered != list) {
    swal('WAIT!', 'Please scan all danpla before receiving!', 'warning')
    return;
  } else if (gathered == list) {
    updateWarehouseReceive(vblLot,vblItemCode);
  }
} // end approveTransfer

function updateWarehouseReceive(lotNumber,item_code) {
  (async function getCountry() {
  const { value: warehouse } = await swal({
    title: 'LOT NUMBER:' + lotNumber + "-" + item_code,
    text: 'Select next warehouse transfer.',
    input: 'select',
    inputOptions: {
      'FG01': 'FG01 - FINISHED GOOD WAREHOUSE',
      'PR01': 'PR01 - PRINTING WAREHOUSE',
      'PD01': 'PD01 - PRODUCTION WAREHOUSE'
    },
    inputPlaceholder: 'Select Warehouse',
    showCancelButton: true,
    inputValidator: (value) => {
      return new Promise((resolve) => {
          resolve()
      })
    }
  })

  if (warehouse) {
    swal({
      title: 'Confirm Transfer?',
      text: "You won't able to revert this.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Transfer'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          method: 'post',
          url: '/1_mes/_php/QualityManagement/query/update/UpdateWarehouseReceive.php',
          data: {
            'item_code': item_code,
            'warehouse': warehouse,
            'lot_num': lotNumber,
            'ajax': true
          },
          success: function (data) {
            swal(data, 'Lot ' + lotNumber + "-" + item_code + " is now transferred.", 'success')
            loadDoc('ItemReceiving');
          }
        });
      }
    });
  }
  })();
} // end updateWarehouse Receive

//--------------------------------------------------no lot danpla list------- LOT CREATE FUNCTIONS -------------------------------------------

  function DisplayTable1(Table_Name, Tablesp, tbltitle, tbluser) {
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
          scrollY: '54.2vh',
          "oSearch": {
            "sSearch": tbluser
          },
          "sScrollX": "100%",
          "processing": true,
          "serverSide": true,
          "iDisplayLength": 100,
          "ajax": {
            url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
            type: 'POST'
          },
          "dom": '<"row"<"col-4"B><"col"><"col-sm-3 pl-0 mr-5">><"row"<"col-12"<"dd">>>t',
          'buttons': [{
            name: 'delete', // do not change name
            text: '<i class="fas fa-trash"></i>',
            className: 'btn btn-export6 btn-xs py-1',
            extend: 'selected', // Bind to Selected row
            action: function (e, dt, node, config) {
              var data = dt.row('.selected').data();
              deleteDanpla(data[0]);
            }
          }, {
            extend: 'copy',
            text: '<i class="far fa-copy"></i>',
            attr: {
              title: 'Copy to Clipboard',
              id: 'copyButton'
            },
            className: 'btn btn-export6 btn-xs py-1'
          },],
          select: 'single',
          "columnDefs": [{
            "targets": 0
          }, {
            "targets": 7,
            "visible": false,
          }],
          "order": [
            [0, 'desc']
          ]
        });
        $("div.dd").html('<div class="py-1 input-group"><input type="textarea" class="form-control form-control-sm" id="Barcode_text" placeholder="SCAN DANPLA SERIAL NUMBER"><div class="input-group-append"><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="AddBtn" onclick="AddBtnClick()">ADD</button><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="LotCreateBtn" onclick="generateLot()">LOT CREATE</button></div></div>');
        tble.on('order.dt search.dt processing.dt page.dt', function () {
          tble.column(0, {
            search: 'applied',
            order: 'applied'
          }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
          });
        }).draw();
      }
    };
    xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
    xhttp.send();
  }
  $.fn.dataTable.ext.buttons.add0 = {}; //end danpla inserted for lot creation

  function AddLotBtnClick(newLot, joborder) {
    var x = document.getElementById("DanplaTable").rows.length;
    if (newLot == undefined || newLot == "" || newLot == null || newLot == " ") {
      alert("No Lot Number Try Again");
      return;
    }
    else {
      swal({
        title: 'Create Lot ' + newLot + ' ? Confirm?',
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
            url: '/1_mes/_php/QualityManagement/query/insert/InsertLotTable.php',
            data: {
              'jo_num': joborder,
              'row_count': x,
              'lot_number': newLot,
              'ajax': true
            },
            success: function (data) {
              loadDoc('LotCreate', username);
              lotNO = "";
              swal('Lot ' + newLot + ' Created!', 'Your items is now allocated!! Please note the lot number!!', 'success')
            }
          });
        }
      });
    }
  } //function that inserts the created lot into DB

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
          "iDisplayLength": 1000,
          "ajax": {
            url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
            type: 'POST'
          },
          "dom": '<"row"<"col-3"B><"col"f>><"row"<"col"t>><"row"<"col">><"row"<"col"><"col"><"col"p>>',
          'buttons': [{
            extend: 'copy',
            text: '<i class="far fa-copy"></i>',
            attr: {
              title: 'Copy to Clipboard',
              id: 'copyButton'
            },
            className: 'btn btn-export6 btn-xs py-1'
          }, {
            extend: 'excel',
            text: '<i class="fas fa-table"></i>',
            attr: {
              title: 'Export to Excel',
              id: 'exportButton'
            },
            filename: tbltitle,
            className: 'btn btn-export6 btn-xs py-1'
          }],
          select: 'single',
          "columnDefs": [{
            /* sortable: false,
            "class": "index",
            "searchable": false,
            "orderable": false, */
            "targets": 0
          }],
          "order": [
            [0, 'desc']
          ]
        });
        tble.on('order.dt search.dt processing.dt page.dt', function () {
          tble.column(0, {
            search: 'applied',
            order: 'applied'
          }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
          });
        }).draw();
      }
    };
    xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
    xhttp.send();
  }
  $.fn.dataTable.ext.buttons.add0 = {}; // list of lot created

  /* function DisplayTable3() {

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("noLotTable").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "/1_mes/_php/QualityManagement/table/noLot_table.php", true);
    xhttp.send();
  } */

  function DisplayTable3(Table_Name, Tablesp, tbltitle, startdate, enddate) {
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
          "iDisplayLength": 1000,
          "ajax": {
            url: "/1_mes/_php/QualityManagement/sp/" + Tablesp + ".php",
            type: 'POST',
            data: {
              "sday": startdate,
              "eday": enddate
            }
          },
          /* "dom": '<"row"<"col-4"B><"col"><"col-sm-3 pl-0 mr-5">><"row"<"col-12"<"dd">>>t', */
          "dom": '<"row"<"col-6"<"dx">><"col-2 mt-2"B><"col-4 mt-3"f>>t<"row"<"col"p>>',
          'buttons': [{
            extend: 'copy',
            text: '<i class="far fa-copy"></i>',
            attr: {
              title: 'Copy to Clipboard',
              id: 'copyButton'
            },
            className: 'btn-outline-secondary btn pt-2'
          }, {
            extend: 'excel',
            text: 'Export',
            attr: {
              title: 'Export to Excel',
              id: 'exportButton'
            },
            filename: tbltitle,
            className: 'btn-outline-secondary btn pt-2'
          }],
          select: 'single',
          "columnDefs": [{
            "targets": 0
          }],
          "order": [
            [0, 'asc']
          ]
        });
        tble.on('order.dt search.dt processing.dt page.dt', function () {
          tble.column(0, {
            search: 'applied',
            order: 'applied'
          }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
          });
        }).draw();

        var dt = new Date();
        dt.setMonth(dt.getMonth() - 1);
        dt.setDate(1);
        //$("div.dx").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0 form-control">Date</div></div> <input class="form-control" type="date" id="min" min="' + moment(dt).format('YYYY-MM-DD') + '"><div class="input-group-prepend"><div class="input-group-text m-0 form-control">to</div></div> <input class="form-control" type="date" id="max" min="' + moment(dt).format('YYYY-MM-DD') + '"> <button class="btn btn-outline-secondary" type="button" id="refresh"><i class="fas fa-sync-alt"></i> </button></div>');
        $("div.dx").html('<div class="p-2 input-group"><div class="input-group-prepend"><div class="input-group-text" id="btnGroupAddon2">FROM</div></div><input id="min" min="' + moment(dt).format('YYYY-MM-DD') + '" type="date" class="py-1 form-control dateText"><div class="input-group-prepend"><div class="input-group-text" id="btnGroupAddon2">TO</div></div> <input id="max" min="' + moment(dt).format('YYYY-MM-DD') + '" type="date" class="py-1 form-control dateText" onchange="SearchDanplaCreate()"><div class="input-group-append"><button style="z-index:0" type="button" class="btn btn-outline-secondary py-1" id="refresh">REFRESH</button></div></div>');
        min.value = startdate;
        max.value = enddate;

        $('#min, #max').on('change', function () {
          var sdate = min.value;
          var edate = max.value;

          if (sdate != '' && edate == '') {
            checkuserauthF(sdate);
          }
          else if (sdate == '' && edate != '') {
            checkuserauthF(sdate, edate);

          }
          else if (sdate != '' && edate != '') {
            if (sdate == edate) {
              checkuserauthF(sdate);
            }
            else {
              checkuserauthF(sdate, edate);
            }

          }
          else {
            checkuserauthF();
          }
        });

        $('#refresh').on('click', function () {
          checkuserauthF();
        });

      }
    };
    xhttp.open("POST", "/1_mes/_php/QualityManagement/table/" + Table_Name + ".php", true);
    xhttp.send();
  }
  $.fn.dataTable.ext.buttons.add0 = {}; //end pending danpla for lot creation

  function exportExcel() {
    var search = SearchPendingDanpla.value;
    var d1 = danplaDate1.value;
    var d2 = danplaDate2.value;
    if (d1 != "" && d2 != "") {
      if (search == "") {
        var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE (PRINT_DATE BETWEEN '" + d1 + "' AND '" + d2 + "') AND LOT_NUM = ''  GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
      } else {
        var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE ((PACKING_NUMBER LIKE '%" + search + "%' OR JO_NUM LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND (PRINT_DATE BETWEEN '" + d1 + "' AND '" + d2 + "')) AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
      }
    } else if (d1 != "" && d2 == "") {
      if (search == "") {
        var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE (PRINT_DATE LIKE '%" + d1 + "%') AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
      } else {
        var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE ((PACKING_NUMBER LIKE '%" + search + "%' OR JO_NUM LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND PRINT_DATE = '" + d1 + "') AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
      }
    } else if (search != "") {
      var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE (PACKING_NUMBER LIKE '%" + search + "%' OR JO_NUM LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
    }
    $.ajax({
      method: 'post',
      url: '/1_mes/_php/QualityManagement/table/Export_NoLot.php',
      data: {
        'sql': z,
        'ajax': true
      },
      success: function (data) {
        //window.location = '/1_mes/_php/QualityManagement/table/Export_NoLot.php';
        /* document.getElementById("noLotTable").innerHTML = data; */
        /* loadDoc('LotCreate',data); */
      }
    });
  } //end export excel

  function deleteDanpla(danpla_ID) {
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
          url: '/1_mes/_php/QualityManagement/query/delete/delete_danpla.php',
          data: {
            'danpla': danpla,
            'ajax': true
          },
          success: function (data) {
            swal('Success!', 'Danpla deleted!!', 'success')
            DisplayTable1('DanplaTempStore', 'DanplaTempStoreSP', 'DanplaTemp');
            return;
          }
        });
      }
    });
  } //remove danpla via button(datatables)

  function checkuserauthF(sdate, edate) {

    DisplayTable3('PendingLot', 'PendingLotSP', 'Pending_Lot', sdate, edate);

  }   //end display table 3

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
  } //clear search in pending danpla for lot creation

  function SearchDanplaCreate() {
    var search = SearchPendingDanpla.value;
    var d1 = danplaDate1.value;
    var d2 = danplaDate2.value;
    if (d1 != "" && d2 != "") {
      if (search == "") {
        var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE (PRINT_DATE BETWEEN '" + d1 + "' AND '" + (d2 + 1) + "') AND LOT_NUM = ''  GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
      } else {
        var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE ((PACKING_NUMBER LIKE '%" + search + "%' OR JO_NUM LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND (PRINT_DATE BETWEEN '" + d1 + "' AND '" + (d2 + 1) + "')) AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
      }
    } else if (d1 != "" && d2 == "") {
      if (search == "") {
        var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE (PRINT_DATE LIKE '%" + d1 + "%') AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
      } else {
        var z = "SELECT *,SUM(PRINT_QTY) as SUMQTY FROM mis_product WHERE ((PACKING_NUMBER LIKE '%" + search + "%' OR JO_NUM LIKE '%" + search + "%' OR ITEM_CODE LIKE '%" + search + "%' OR ITEM_NAME LIKE '%" + search + "%') AND PRINT_DATE = '" + d1 + "') AND LOT_NUM = '' GROUP BY PACKING_NUMBER ORDER BY PRINT_DATE ASC;";
      }
    } else if (search != "") {
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
  } //search in pending danpla for lot creation

  function AddBtnClick() {
    var bcode = Barcode_text.value;
    if (bcode == "") {
      swal('Input Barcode!', 'Please insert danpla to be allocated.', 'warning')
      return;
    }
    $.ajax({
      method: 'post',
      url: '/1_mes/_php/QualityManagement/query/get/getDanplaDetails.php',
      data: {
        'jo_barcode': bcode,
        'ajax': true
      },
      success: function (data) {
        //alert(data);
        var val = JSON.parse(data);
        //alert(val);
        if (val != undefined) {
          if (val.LOT_NUM == null || val.LOT_NUM == "" || val.LOT_NUM == undefined) {
            CheckDanpla(val.PACKING_NUMBER, val.JO_NUM, val.ITEM_CODE, val.ITEM_NAME, val.SUM_QTY, val.MACHINE_CODE);
          } else {
            swal('Items already allocated into other lot.', 'Please insert new danpla be allocated.', 'warning')
          }
        } else {
          swal('Items does not exist!', 'Please insert existing danpla be allocated.', 'warning')
        }
      }
    });
  } //end function for button that adds in the collection of danpla

  function InsertDanpla(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertMachine) {
    $.ajax({
      method: 'post',
      url: '/1_mes/_php/QualityManagement/query/insert/InsertDanplaTable.php',
      data: {
        'jo_barcode': insertBarcode,
        'jo_num': insertJO,
        'item_code': insertItemCode,
        'item_name': insertItemName,
        'print_qty': insertQuantity,
        'machine_code': insertMachine,
        'ajax': true
      },
      success: function (data) {
        swal({
          text: data,
          type: 'success'
        });
        DisplayTable1('DanplaTempStore', 'DanplaTempStoreSP', 'DanplaTemp', username);
        //Barcode_text.focus();
      }
    });
  } //end inserts validated danpla into DB table

  function CheckDanpla(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertMachine) {
    $.ajax({
      method: 'post',
      url: '/1_mes/_php/QualityManagement/query/get/getDanplaJO.php',
      data: {
        'jo_barcode': insertBarcode,
        'jo_num': insertJO,
        'ajax': true
      },
      success: function (data) {
        if (data == "false") {
          InsertDanpla(insertBarcode, insertJO, insertItemCode, insertItemName, insertQuantity, insertMachine);
        } else if (data == '"true1"') {
          swal({
            text: 'DANPLA EXIST',
            type: 'error'
          });
          document.getElementById('Barcode_text').value = "";
        } else if (data == '"true2"') {
          swal({
            text: 'DANPLA IS FROM DIFFERENT JO',
            type: 'error'
          });
        }
      }
    });
  } //end checks if danpla is valid in the collection of danpla for lot creation
  var lotNO;

  function buildLotNumber() {
    var d = new Date();
    var month = d.getUTCMonth() + 1; //months from 1-12
    var day = d.getUTCDate();
    var year = d.getUTCFullYear().toString().substr(2, 2);
    // first 4 chars in LOT NUMBER
    if (month < 10) {
      month = '0' + month
    }
    if (day < 10) {
      day = '0' + day
    }
    // 2nd 2 chars in LOT NUMBER
    var shift = "01"; //DayShift
    var today = new Date().getHours();
    if (today <= 6 && today >= 18) {
      shift = "02"
    }
    $.ajax({
      method: 'post',
      url: '/1_mes/_php/QualityManagement/query/get/GetMachine.php',
      success: function (data) {
        var val = JSON.parse(data);
        var machine = val.MACHINE_CODE;
        var lotNumber = year + "" + month + "" + day + "" + shift + machine + "01";
        lotNO = lotNumber;
        return lotNO;
      }
    });
  } //end algo that creates a new lot Number

  function generateLot() {
    var lotNew, newL;
    var x = document.getElementById("DanplaTable").rows[1].cells[0].innerHTML;
    if (x == "No data available in table") {
      swal('No items allocated.', 'Please insert danpla to create lot.', 'warning')
      return;
    } else {
      var joborder = document.getElementById("DanplaTable").rows[1].cells[2].innerHTML;
      var y = document.getElementById("DanplaTable").rows[1].cells[6].innerHTML;
    }
    $.ajax({
      method: 'post',
      url: '/1_mes/_php/QualityManagement/query/get/GetNextLot.php',
      data: {
        'jo_num': joborder,
        'machine_code': y,
        'ajax': true
      },
      success: function (data) {
        var val = JSON.parse(data);
        
        if (data == '"true"' || data == '"false"') {
          buildLotNumber(newL);
          AddLotBtnClick(lotNO, joborder);
        } else if (data != '"false"' || data != '"true"') {
          var lotPrev = val.slice(0, 12);
          var series = val.slice(-1);
          var i = parseInt(series) + 1;
          lotNew = lotPrev + i;
          AddLotBtnClick(lotNew, joborder);
        }
      }
    });
  } //end check if lot will be generating as new or will be generating the next lot

