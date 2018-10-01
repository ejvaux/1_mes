/* ______________________ MOLD LIST ______________________ */

/* Insert */

$('#mod').on('submit','#moldlistform', function (e) {           
    /* alert('TEST'); */
    e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#moldlistform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
    $.ajax({
      type: 'POST',
      url: '/1_mes/database/table_handler/master/moldlistHandler.php',
      data: $.param(formdata),
      success: function (data) {
        /* alert(data); */   
        if(data==true){          
          /* alert("Record saved successfully!"); */
          $('#moldlistform').trigger('reset');
          $('#moldlistmod').modal('hide');          
          DisplayTable1('mold_table','moldsp','Mold List');
          loadmodal('masterdatamodal');

          $.notify({
            icon: 'fas fa-info-circle',
            title: 'System Notification: ',
            message: "Record saved successfully!",
          },{
            type:'success',
            placement:{
              align: 'center'
            },           
            delay: 3000,                        
          });
        }
        else{
          alert(data);          
        }
      }
    }); 
    
});

/* Insert */

/* Update */

$('#mod').on('submit','#emoldlistform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
  e.stopImmediatePropagation();
  var formdata =  $('#emoldlistform').serializeArray();
  formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/moldlistHandler.php',
    data: $.param(formdata),
    success: function (data) {    
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#emoldlistform').trigger('reset');
        $('#emoldlistmod').modal('hide');
        DisplayTable1('mold_table','moldsp','Mold List');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ MOLD LIST ______________________ */


/* ______________________ CUSTOMER ______________________ */

/* Insert */

$('#mod').on('submit','#customerform', function (e) {           
    /* alert('TEST'); */
    e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#customerform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
    $.ajax({
      type: 'POST',
      url: '/1_mes/database/table_handler/master/customerHandler.php',
      data: $.param(formdata),
      success: function (data) {
        /* alert(data); */   
        if(data==true){
          /* alert("Record saved successfully!"); */
          $('#customerform').trigger('reset');
          $('#customermod').modal('hide');          
          DisplayTable2('customer_table','customersp','Customer List');
          loadmodal('masterdatamodal');

          $.notify({
            icon: 'fas fa-info-circle',
            title: 'System Notification: ',
            message: "Record saved successfully!",
          },{
            type:'success',
            placement:{
              align: 'center'
            },           
            delay: 3000,                        
          });
        }
        else{
          alert(data);          
        }
      }
    }); 
    
});

/* Insert */

/* Update */

$('#mod').on('submit','#ecustomerform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#ecustomerform').serializeArray();
    formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/customerHandler.php',
    data: $.param(formdata),
    success: function (data) {
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#ecustomerform').trigger('reset');
        $('#ecustomermod').modal('hide');
        DisplayTable2('customer_table','customersp','Customer List');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ CUSTOMER ______________________ */


/* ______________________ ITEM LIST ______________________ */

/* Insert */

$('#mod').on('submit','#itemform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
  e.stopImmediatePropagation();
  var formdata =  $('#itemform').serializeArray();
  formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/itemHandler.php',
    data: $.param(formdata),
    success: function (data) {
      /* alert(data); */   
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#itemform').trigger('reset');
        $('#itemmod').modal('hide');          
        DisplayTable3('item_list_table','item_listsp','Item List');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record saved successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Insert */


/* Update */

$('#mod').on('submit','#eitemform', function (e) {           
  /* alert('TEST');  */
  e.preventDefault();
  e.stopImmediatePropagation();
  var formdata =  $('#eitemform').serializeArray();
  formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/itemHandler.php',
    data: $.param(formdata),
    success: function (data) {    
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#eitemform').trigger('reset');
        $('#eitemmod').modal('hide');
        DisplayTable3('item_list_table','item_listsp','Item List');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ ITEM LIST ______________________ */


/* ______________________ MACHINE LIST ______________________ */

/* Insert */

$('#mod').on('submit','#machineform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#machineform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/machineHandler.php',
    data: $.param(formdata),
    success: function (data) {         
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#machineform').trigger('reset');
        $('#machinemod').modal('hide');          
        DisplayTable4('machine_list_table','machine_listsp','Machine List');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record saved successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Insert */

/* Update */

$('#mod').on('submit','#emachineform', function (e) {           
  /* alert('TEST');  */
  e.preventDefault();
    e.stopImmediatePropagation(); 
    var formdata =  $('#emachineform').serializeArray();
    formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/machineHandler.php',
    data: $.param(formdata),
    success: function (data) {    
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#emachineform').trigger('reset');
        $('#emachinemod').modal('hide');
        DisplayTable4('machine_list_table','machine_listsp','Machine List');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ MACHINE LIST ______________________ */


/* ______________________ DEFECT LIST ______________________ */

/* Insert */

$('#mod').on('submit','#defectform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#defectform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/defectHandler.php',
    data: $.param(formdata),
    success: function (data) {         
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#defectform').trigger('reset');
        $('#defectmod').modal('hide');          
        DisplayTable5('defect_code_table','defect_codesp','Defect Code');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record saved successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Insert */

/* Update */

$('#mod').on('submit','#edefectform', function (e) {           
  /* alert('TEST');  */
  e.preventDefault();
    e.stopImmediatePropagation(); 
    var formdata =  $('#edefectform').serializeArray();
    formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/defectHandler.php',
    data: $.param(formdata),
    success: function (data) {    
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#edefectform').trigger('reset');
        $('#edefectmod').modal('hide');
        DisplayTable5('defect_code_table','defect_codesp','Defect Code');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ DEFECT LIST ______________________ */



/* ______________________ USER INFO LIST ______________________ */

/* Insert */

$('#mod').on('submit','#userinfoform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#userinfoform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/userinfoHandler.php',
    data: $.param(formdata),
    success: function (data) {         
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#userinfoform').trigger('reset');
        $('#userinfomod').modal('hide');          
        DisplayTable6('user_info_table','user_infosp','User Information');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record saved successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Insert */

/* Update */

$('#mod').on('submit','#euserinfoform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation();  
    var formdata =  $('#euserinfoform').serializeArray();
    formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/userinfoHandler.php',
    data: $.param(formdata),
    success: function (data) {    
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#euserinfoform').trigger('reset');
        $('#euserinfomod').modal('hide');
        DisplayTable6('user_info_table','user_infosp','User Information');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ USER INFO LIST ______________________ */


/* ______________________ USER AUTH LIST ______________________ */

/* Insert */

$('#mod').on('submit','#userauthform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#userauthform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/userauthHandler.php',
    data: $.param(formdata),
    success: function (data) {         
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#userauthform').trigger('reset');
        $('#userauthmod').modal('hide');          
        DisplayTable7('user_auth_table','user_authsp','User Authority');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record saved successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Insert */

/* Update */

$('#mod').on('submit','#euserauthform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation(); 
    var formdata =  $('#euserauthform').serializeArray();
    formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/userauthHandler.php',
    data: $.param(formdata),
    success: function (data) {    
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#euserauthform').trigger('reset');
        $('#euserauthmod').modal('hide');
        DisplayTable7('user_auth_table','user_authsp','User Authority');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ USER AUTH LIST ______________________ */


/* ______________________ DIVISION LIST ______________________ */

/* Insert */

$('#mod').on('submit','#divcodeform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#divcodeform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/divisionHandler.php',
    data: $.param(formdata),
    success: function (data) {         
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#divcodeform').trigger('reset');
        $('#divcodemod').modal('hide');          
        DisplayTable8('division_code_table','division_codesp','Division Code');
        loadmodal('masterdatamodal');
        
        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record saved successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Insert */

/* Update */

$('#mod').on('submit','#edivcodeform', function (e) {           
  /* alert('TEST');  */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#edivcodeform').serializeArray();
    formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/divisionHandler.php',
    data: $.param(formdata),
    success: function (data) {    
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#edivcodeform').trigger('reset');
        $('#edivcodemod').modal('hide');
        DisplayTable8('division_code_table','division_codesp','Division Code');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ DIVISION LIST ______________________ */


/* ______________________ EMPLOYEE LIST ______________________ */

/* Insert */

$('#mod').on('submit','#employeeform', function (e) {           
  /* alert('TEST'); */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#employeeform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/employeeHandler.php',
    data: $.param(formdata),
    success: function (data) {         
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#employeeform').trigger('reset');
        $('#employeemod').modal('hide');          
        DisplayTable9('employee_table','employeesp','Employee List');
        loadmodal('masterdatamodal');
        
        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record saved successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Insert */

/* Update */

$('#mod').on('submit','#eemployeeform', function (e) {           
  /* alert('TEST');  */
  e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#eemployeeform').serializeArray();
    formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/master/employeeHandler.php',
    data: $.param(formdata),
    success: function (data) {    
      if(data==true){
        /* alert("Record Updated Successfully!"); */
        $('#eemployeeform').trigger('reset');
        $('#eemployeemod').modal('hide');
        DisplayTable9('employee_table','employeesp','Employee List');
        loadmodal('masterdatamodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Record updated successfully!",
        },{
          type:'success',
          placement:{
            align: 'center'
          },           
          delay: 3000,                        
        });
      }
      else{
        alert(data);          
      }
    }
  }); 
  
});

/* Update */

/* ______________________ EMPLOYEE LIST ______________________ */

/* Display Data */

  function getitemname(id,tb1){

    // find the dropdown
    var ddl = document.getElementById(id);
    // find the selected option
    if(ddl.selectedIndex>=0){
      var selectedOption = ddl.options[ddl.selectedIndex].value;      
      $.ajax({
        type:'POST',
        data:{
          'action':'select2',
          'column':'ITEM_CODE',
          'id': selectedOption
        },
        url:'/1_mes/database/table_handler/master/itemHandler.php',
        success:function(data){
          if(data != 'none'){    
            var val = JSON.parse(data);
            $(tb1).val(val['ITEM_NAME']);      
          }
          else{
            $(tb1).val('');
          } 
        } 
        });  
    }
    

  } /* getitemname */
  
  function getcustomername(id,tb1){

    // find the dropdown
    var ddl = document.getElementById(id);
    if(ddl.selectedIndex>=0){
      // find the selected option
      var selectedOption = ddl.options[ddl.selectedIndex].text;
      
      $.ajax({
        type:'POST',       
        async: true,
        data:{
          'action':'select2',
          'column':'CUSTOMER_CODE',
          'id': selectedOption
        },
        url:'/1_mes/database/table_handler/master/customerHandler.php',
        success:function(data){

            if(data != 'none'){    
              var val = JSON.parse(data);         
              $(tb1).val(val.CUSTOMER_NAME);              
            }
            else{
              $(tb1).val('');
            }
        } 
        });
    }
    
  } /* getcustomername */

  function getgroupcode(id,tb1,tb2){

    // find the dropdown
    var ddl = document.getElementById(id);
    if(ddl.selectedIndex>=0){
      // find the selected option
      var selectedOption = ddl.options[ddl.selectedIndex].text;
      
      $.ajax({
        type:'POST',        
        async: true,
        data:{
          'action':'select2',
          'column':'DIVISION_CODE',
          'id': selectedOption
        },
        url:'/1_mes/database/table_handler/master/divisionHandler.php',
        success:function(data){

            if(data != 'none'){    
              var val = JSON.parse(data);         
              $(tb1).val(val.SAP_DIVISION_CODE+'000');
            }
            else{
              $(tb1).val('');
            }
        } 
        });
    }
    
  } /* getgroupcode */

/* Display Data */


/* _______________________ Check negative number ____________________________ */

function isNumberNegative(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode;
  return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

/* _______________________ Check negative number ____________________________ */


/* _______________________ Get employee code - Employee table ____________________________ */

function getemployeecode(id){
  /* alert('TEST'); */
  $.ajax({
    type:'get',
        data:{
          'action':'select3',
          'filter':'ORDER BY EMPLOYEE_CODE DESC LIMIT 1'
        },         
    url:'/1_mes/database/table_handler/master/employeeHandler.php',
    success:function(data){
      
      /* alert(data); */
      /* var val = JSON.parse(data); */
      function pad (str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
      }       
      
      if(data != 'none'){    
        /* alert('TEST none'); */           
        var val = JSON.parse(data);
        var newnum = parseInt(val.EMPLOYEE_CODE) + 1;          
        $(id).val(pad(newnum,6));
        
      }
      else{
        /* alert('TEST else'); */ 
        $(id).val(pad(1,6));
      }        
    } 

    });
  }

/* _______________________ Get employee code - Employee table ____________________________ */

 /* ______ Modal Reset ______ */

 $('#mod').on('hide.bs.modal','.modal', function (e) {           
  /* alert('TEST'); */   
  $(this).find('form')[0].reset();
  $("[type='checkbox']").trigger("change");
});

 /* ______ Modal Reset ______ */

 /* ______ GENERATING BARCODE ______ */

function generateBarCode(text){
  var srl = ['0','1','2','3','4','5','6','7','8','9',
          'A','B','C','D','E','F','G','H','I','J','K','L','M',
          'N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
  ];
  var code;
  var bc;
  $.ajax({
      type:'POST',      
      async: false,
      data:{
      'action':'barcode',
      'searchcol':'BARCODE',
      'filter':"WHERE `BARCODE` LIKE '" + text + "%' ORDER BY `BARCODE` DESC Limit 1"

      },
      url:'/1_mes/database/table_handler/master/itemHandler.php',
      success:function(data){
          var val = JSON.parse(data);
          /* alert("||"+data+"||"); */
          /* alert(val); */
          if(data != '"none"'){
            code = val[0]['BARCODE'].substring(2,4);
            var fc = code[0];
            var lc = code[1];
            var ilc = srl.indexOf(lc);
            if(ilc<35){
                bc = text + fc + srl[ilc+1]
            }
            else{
                ifc = srl.indexOf(fc);
                bc =  text + srl[ifc+1] + '0';
            }
          }
          else{
            bc =  text + "01";
          }          
      } 
      });
      return bc;
}

 /* ______ GENERATING BARCODE ______ */ 

/* ______ GET DIVISION INITIAL ______ */

function getdivisioninitial(dc){
  var x;
  $.ajax({
    type:'POST',
    async: false,
    data:{
    'action':'select3',
    'searchcol':'BARCODE_INITIAL',
    'filter':"WHERE `DIVISION_CODE` = '" + dc + "'"
    },
    url:'/1_mes/database/table_handler/master/divisionHandler.php',
    success:function(data){
      var val = JSON.parse(data);
      var dd = val[0]['BARCODE_INITIAL'];
      x = dd;
    } 
    });
  return x;
}

/* ______ GET DIVISION INITIAL ______ */

/* ______ GET CUSTOMER INITIAL ______ */

function getcustomerinitial(cc){
  var x;
  $.ajax({
    type:'POST',
    async: false,
    data:{
    'action':'select3',
    'searchcol':'CUSTOMER_INITIAL',
    'filter':"WHERE `CUSTOMER_CODE` = '" + cc + "'"
    },
    url:'/1_mes/database/table_handler/master/customerHandler.php',
    success:function(data){
      var val = JSON.parse(data);
      var dd = val[0]['CUSTOMER_INITIAL'];
      x = dd;        
    } 
    });
    return x;
}

/* ______ GET CUSTOMER INITIAL ______ */

/* ______ INSERTING BARCODE ______ */

function insertbc(tb1,tb2,tb3){    
  if($(tb1).val() != '' && $(tb2).val() != ''){
    var cc = getcustomerinitial($(tb1).val());
    var dc = getdivisioninitial($(tb2).val());
    /* alert(dc+cc); */
    var dccc = dc+cc;
    var bc = generateBarCode(dccc);
    /* alert(bc); */
    $(tb3).val(bc);
  }
}

/* ______ INSERTING BARCODE ______ */

/* ______ EDIT MODAL BARCODE REGEN ______ */

$('#mod').on('change','.ebc', function (e) {           
/* alert('TEST'); */   
$('#eibarcode').val('');
});

/* ______ EDIT MODAL BARCODE REGEN ______ */

/* ______ EDIT MODAL BARCODE REGEN ______ */
$('#mod').on('keydown','.readonly', function (e) {           
  e.preventDefault();
});
/* ______ EDIT MODAL BARCODE REGEN ______ */