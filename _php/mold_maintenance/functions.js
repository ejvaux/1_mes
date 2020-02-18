
/* ---------------------- MOLD ------------- MAINTENANCE ---------------------------- */

function alistchange(){
  /* alert('test'); */
  // find the dropdown
  var ddl = document.getElementById("amcl");
    // find the selected option
    var selectedOption = ddl.options[ddl.selectedIndex].text;
    /* alert(selectedOption); */

  if(selectedOption !== null){
    $.ajax({
    type:'POST',
    data:{
      'mc': selectedOption
    },
    url:'/1_mes/_query/mold_repair/moldcode_ddl.php',
    success:function(data){
      
      if(data != 'none'){
        var val = JSON.parse(data);                   
        
        $("#atoolnumber").attr("value",val.TOOL_NUMBER);
        $("#aitemname").attr("value",val.ITEM_NAME);
        $("#aitemcode").attr("value",val.ITEM_CODE);
        $("#acustomername").attr("value",val.CUSTOMER_NAME);
      }      
        
    } 

    }); 
  }

}/* lischange */

function listchange(){
    /* alert('test'); */
    // find the dropdown
    var ddl = document.getElementById("mcl");
      // find the selected option
      var selectedOption = ddl.options[ddl.selectedIndex].value;
      /* alert(selectedOption); */

      if(selectedOption !== null){
        /* alert('TEST LIST'); */
        $.ajax({
          type:'POST',
          data:{
            'mc': selectedOption
          },
          url:'/1_mes/_query/mold_repair/moldcode_ddl.php',
          success:function(data){

            if(data != 'none'){
              var val = JSON.parse(data);                   
              
              $("#toolnumber").attr("value",val.TOOL_NUMBER);
              $("#itemname").attr("value",val.ITEM_NAME);
              $("#itemcode").attr("value",val.ITEM_CODE);
              $("#customername").attr("value",val.CUSTOMER_NAME);
            }                       
          } 
    
          });

      }
       
  }/* lischange */

  function elistchange(){
    /* alert('test'); */
    // find the dropdown
    var ddl = document.getElementById("emcl");
      // find the selected option
      var selectedOption = ddl.options[ddl.selectedIndex].text;
      /* alert(selectedOption); */
      $.ajax({
      type:'POST',
      data:{
        'mc': selectedOption
      },
      url:'/1_mes/_query/mold_repair/moldcode_ddl.php',
      success:function(data){

        if(data != 'none'){
          var val = JSON.parse(data);                   
          
          $("#etoolnumber").attr("value",val.TOOL_NUMBER);
          $("#eitemname").attr("value",val.ITEM_NAME);
          $("#eitemcode").attr("value",val.ITEM_CODE);
          $("#ecustomername").attr("value",val.CUSTOMER_NAME);
        }          
      } 

      }); 
  }/* lischange */

  function getctrlnumber(){
    /* alert('TEST'); */
    $.ajax({          
      url:'/1_mes/_query/mold_repair/getcontrolnumber.php',
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
          var newnum = parseInt(val.MOLD_REPAIR_CONTROL_NO) + 1;          
          $("#pmcontrol").attr("value",pad(newnum,5));
          $("#apmcontrol").attr("value",pad(newnum,5));
        }
        else{
          /* alert('TEST else'); */ 
          $("#pmcontrol").attr("value",pad(1,5));
          $("#apmcontrol").attr("value",pad(1,5));
        }        
      } 

      });


  }/* getcontrolnumber */



  /* ____________________ UPDATE ________________________ */


  $('#mod').on('click','#checklistsubmit', function (e) {           
    /* alert('TEST');
    alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
    var formdata =  $('#checklistform').serializeArray();
    formdata.push({name: 'action', value: 'update_chk'});
    $.ajax({
      type: 'POST',
      url: '/1_mes/database/table_handler/mold/moldrepairHandler.php',
      data: $.param(formdata),
      success: function (data) {    
        if(data==true){
          /* alert("Checklist Saved Successfully!"); */
          $('#checklistform').trigger('reset');
          $('#chcklist').modal('hide');
          /* var dtdt =moment(Date()).format('YYYY-MM-DD');
          checkuserauth(dtdt,dtdt); */
          checkuserauth();
          loadmodal('moldrepairmodal');

          $.notify({
            icon: 'fas fa-info-circle',
            title: 'System Notification: ',
            message: "Checklist Saved Successfully!",
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


  /* ____________________ UPDATE ________________________ */


   /* ____________________ Approve ________________________ */


   $('#mod').on('click','#achecklistsubmit', function (e) {           
    /* alert('TEST');
    alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */

    swal({
      title: 'Are you sure you want to approve?',
      text: "You won't be able to revert this!",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
      if (result.value) {
        var formdata =  $('#checklistform').serializeArray();
        formdata.push({name: 'action', value: 'update_aprv'});
        $.ajax({
          type: 'POST',
          url: '/1_mes/database/table_handler/mold/moldrepairHandler.php',
          data: $.param(formdata),
          success: function (data) {    
            if(data==true){

              $('#chcklist').modal('hide');
                    /* var dtdt =moment(Date()).format('YYYY-MM-DD');
                    checkuserauth(dtdt,dtdt); */
                    checkuserauth();
                    loadmodal('moldrepairmodal');
          
                    $.notify({
                      icon: 'fas fa-info-circle',
                      title: 'System Notification: ',
                      message: "Repair Approved!",
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
        
      }
    })  
        
  });


  /* ____________________ Approve ________________________ */


  /* $.ajax({
    type: 'POST',
    url: '/1_mes/_query/mold_repair/insert_history.php',
    data: $('#checklistform').serialize(),
    success: function (data) {    
      if(data=="success"){

        $('#chcklist').modal('hide');
        checkuserauth();
        loadmodal('moldrepairmodal');

        $.notify({
          icon: 'fas fa-info-circle',
          title: 'System Notification: ',
          message: "Repair Approved!",
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
  }); */


  /* ____________________ QC Approve ________________________ */


  $('#mod').on('click','#qcchecklistsubmit', function (e) {           
    /* alert('TEST');
    alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */

    swal({
      title: 'Are you sure you want to approve?',
      text: "You won't be able to revert this!",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
      if (result.value) {
        var formdata =  $('#qcchecklistform').serializeArray();
        formdata.push({name: 'action', value: 'update_qc'});
        $.ajax({
          type: 'POST',
          url: '/1_mes/database/table_handler/mold/moldrepairHandler.php',
          data: $.param(formdata),
          success: function (data) {    
            if(data==true){             
              var formdata =  $('#qcchecklistform').serializeArray();
              formdata.push({name: 'action', value: 'insert'});
              $.ajax({
              type: 'POST',
              url: '/1_mes/database/table_handler/mold/historyHandler.php',
              data: $.param(formdata),
              success: function (data1) {    
                if(data1==true){
                  var mol = $("#qcchkmoldcode").val();
                  $.ajax({
                    type: 'POST',
                    url: '/1_mes/database/table_handler/master/moldlistHandler.php',
                    data: 
                    {
                      'action': 'update_onrepair2',                        
                      'mc': mol
                    },
                    success: function (data2) {    
                      if(data2==true){
                        $('#qcchcklist').modal('hide');
                        /* var dtdt =moment(Date()).format('YYYY-MM-DD');
                        checkuserauth(dtdt,dtdt); */
                        checkuserauth();
                        loadmodal('moldrepairmodal');
              
                        $.notify({
                          icon: 'fas fa-info-circle',
                          title: 'System Notification: ',
                          message: "Repair Approved!",
                        },{
                          type:'success',
                          placement:{
                            align: 'center'
                          },           
                          delay: 3000,                        
                        });
                      }
                      else{
                        alert(data2);          
                      }
                    }
                  });

                  /* $('#qcchcklist').modal('hide');
                  var dtdt =moment(Date()).format('YYYY-MM-DD');
                  checkuserauth(dtdt,dtdt);
                  loadmodal('moldrepairmodal');
        
                  $.notify({
                    icon: 'fas fa-info-circle',
                    title: 'System Notification: ',
                    message: "Repair Approved!",
                  },{
                    type:'success',
                    placement:{
                      align: 'center'
                    },           
                    delay: 3000,                        
                  }); */                 
                  
                }
                else{
                  alert(data1);          
                }
              }
              });
            }
            else{
              alert(data);          
            }
          }
        });
        
      }
    })  
        
  });


  /* ____________________ QC Approve ________________________ */



  /* ____________________ EDIT ________________________ */

  $('#mod').on('submit','#editform', function (e) {           
    /* alert('TEST');
    alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
    e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#editform').serializeArray();
    formdata.push({name: 'action', value: 'update_a'});
    $.ajax({
      type: 'POST',
      url: '/1_mes/database/table_handler/mold/moldrepairHandler.php',
      data: $.param(formdata),
      success: function (data) {    
        if(data==true){
          /* alert("Record Updated Successfully!"); */
          $('#editform').trigger('reset');
          $('#editmoldrepair').modal('hide');
          /* var dtdt =moment(Date()).format('YYYY-MM-DD');
          checkuserauth(dtdt,dtdt); */
          checkuserauth();        
          loadmodal('moldrepairmodal');

          $.notify({
            icon: 'fas fa-info-circle',
            title: 'System Notification: ',
            message: "Record Updated Successfully!",
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



  /* ____________________ EDIT ________________________ */


  /* ____________________ INSERT A ________________________ */

  $('#mod').on('submit','#addformA', function (e) {           
    /* alert('TEST'); */
    /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
    e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#addformA').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
    $.ajax({
      type: 'POST',
      url: '/1_mes/database/table_handler/mold/moldrepairHandler.php',
      data: $.param(formdata),
      success: function (data) {
        /* alert(data); */   
        if(data==true){
          var ddl = document.getElementById("mcl");
          // find the selected option
          var selectedOption = ddl.options[ddl.selectedIndex].text;
          /* alert(selectedOption); */
          $.ajax({
            type: 'POST',
            url: '/1_mes/database/table_handler/master/moldlistHandler.php',
            data: 
            {
              'action': 'update_onrepair',                        
              'mc': selectedOption
            },
            success: function (data1) {
              /* alert(data1); */
              if(data1==true){
                $('#addformA').trigger('reset');
                $('#addmoldrepairA').modal('hide');
                /* var dtdt =moment(Date()).format('YYYY-MM-DD');
                checkuserauth(dtdt,dtdt); */
                checkuserauth();    
                loadmodal('moldrepairmodal');

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
                alert(data1); 
              }
            }
          });        
          
          /* $('#addformA').trigger('reset');
          $('#addmoldrepairA').modal('hide');          
          checkuserauth();
          loadmodal('moldrepairmodal');

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
          }); */
        }
        else{
          alert(data);          
        }
      }
    }); 
    
  });


  /* ____________________ INSERT A ________________________ */



  /* ____________________ INSERT ________________________ */

  $('#mod').on('submit','#addform', function (e) {           
    /* alert('TEST'); */
    /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
    e.preventDefault();
    e.stopImmediatePropagation();
    var formdata =  $('#addform').serializeArray();
    formdata.push({name: 'action', value: 'insert'});
    $.ajax({
      type: 'POST',
      url: '/1_mes/database/table_handler/mold/moldrepairHandler.php',
      data: $.param(formdata),
      success: function (data) {
        /* alert(data); */   
        if(data==true){

          var ddl = document.getElementById("amcl");
          // find the selected option
          var selectedOption = ddl.options[ddl.selectedIndex].text;
          /* alert(selectedOption); */
          $.ajax({
            type: 'POST',
            url: '/1_mes/database/table_handler/master/moldlistHandler.php',
            data: 
            {
              'action': 'update_onrepair',                        
              'mc': selectedOption
            },
            success: function (data1) {
              /* alert(data1); */
              if(data1==true){
                $('#addform').trigger('reset');
                $('#addmoldrepair').modal('hide');
                /* var dtdt =moment(Date()).format('YYYY-MM-DD');
                checkuserauth(dtdt,dtdt); */
                checkuserauth();
                loadmodal('moldrepairmodal');

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
                alert(data1); 
              }
            }
          });
          /* $('#addform').trigger('reset');
          $('#addmoldrepair').modal('hide');          
          checkuserauth();
          loadmodal('moldrepairmodal');

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
          }); */
        }
        else{
          alert(data);          
        }
      }
    }); 
    
  });

  /* ____________________ INSERT ________________________ */



/* ________________ Defect name checkbox ____________________ */

function checkFluency(chckbox,sel,text)
{
  /* alert(chckbox);
  var checkbox = document.getElementById(chckbox); */
  if (chckbox.checked == true)
  {
    /* alert("test True"); */
    sel.disabled = true;
    text.disabled = false;
    /* document.getElementById("dn").disabled = true;
    document.getElementById("dno").disabled = false; */
    /* $('sel #dn').hide();
    $('#dn').parent().hide();
      $('#dno').show(); */
  }
  else{
    /* alert("test False"); */
    sel.disabled = false;
    text.disabled = true;
    /* document.getElementById("dn").disabled = false;
    document.getElementById("dno").disabled = true; */
    /* $('#dn').parent().show();
      $('#dno').hide(); */
  }
}

/* ________________ Defect name checkbox ____________________ */


/* ________________ Modal reset ____________________ */

  $('#mod').on('hide.bs.modal','.modal', function (e) {           
    /* alert('TEST');  */  
    $(this).find('form')[0].reset();
    $("[type='checkbox']").trigger("change");    
  });

  /* ________________ Modal reset ____________________ */


/* __________________ LEAD TIME _______________________________ */

function ltime(lead,status,approve){
  if(lead!=null){
    var second = Date.parse(new Date()) - Date.parse(new Date(lead));
      var seconds = parseInt(second,10)/1000;
      var ts = seconds;
      var days = Math.floor(seconds / (3600*24));
      seconds  -= days*3600*24;
      var hrs   = Math.floor(seconds / 3600);
      seconds  -= hrs*3600;
      var mnts = Math.floor(seconds / 60);
      seconds  -= mnts*60;
      var time = days+" day, "+hrs+" hr, "+mnts+" min";
      
      if(status == 'WAITING' ||  status == 'ON-GOING' || status == 'FOR MOLD TRIAL' || status == 'FOR PM'){

        if(ts<=172800){
          return "<span style='color: #2ECC71; font-weight: bold;'>("+time+")</span>";
        }
        else if(ts<=345600 && ts>172800){
          return "<span style='color: #F4D03F; font-weight: bold;'>("+time+")</span>";
        }
        else if(ts<=518400 && ts>345600){
          return "<span style='color: orange; font-weight: bold;'>("+time+")</span>";
        }
        else{
          return "<span style='color: red; font-weight: bold;'>("+time+")</span>";
        }
      }
      else{
        var a = Date.parse(new Date(approve)) - Date.parse(new Date(lead));
                          
        var at = parseInt(a,10)/1000;
        var tdays = Math.floor(at / (3600*24));
        at  -= tdays*3600*24;
        var thrs   = Math.floor(at / 3600);
        at  -= thrs*3600;
        var tmnts = Math.floor(at / 60);
        at  -= tmnts*60;
        var time = tdays+" day, "+thrs+" hr, "+tmnts+" min";
        
        /* if(status == 'FOR MOLD TRIAL'){
          return "<span style='color: green; font-weight: bold;'>( "+time+" )</span>";
        }
        else if(status == 'QC APPROVED'){
          return "<span style='color: blue; font-weight: bold;'>( "+time+" )</span>";
        } */
        return "<span style='color: blue; font-weight: bold;'>"+time+"</span>";
        /* return a; */
        
      }
  }
  else{
    return "<span style='color:blue; font-weight: bold;'>NO DATE</span>";
  }
}

/* __________________ LEAD TIME _______________________________ */


/* __________________ STATUS DISPLAY _______________________________ */

function statdisplay(stat){

  if ( stat == 'WAITING' ) {
    return 'pending';
  }
  else if(stat == 'ON-GOING'){
    return 'ongoing';
  }
  else if(stat == 'FOR MOLD TRIAL'){
    return 'finished';
  }
  else if(stat == 'QC APPROVED'){
    return 'approved';
  }
  else if(stat == 'FOR PM'){
    return 'repair';
  } 
}

/* __________________ STATUS DISPLAY _______________________________ */


/* ____________________ INSERT HISTORY A ________________________ */

$('#mod').on('submit','#addmoldhistoryform', function (e) {           
  /* alert('TEST'); */
  /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
  e.preventDefault();
  e.stopImmediatePropagation();
  var formdata =  $('#addmoldhistoryform').serializeArray();
  formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/mold/historyHandler.php',
    data: $.param(formdata),
    success: function (data) {
      /* alert(data);  */  
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#addmoldhistoryform').trigger('reset');
        $('#addmoldhistory').modal('hide');          
        var dtdt =moment(Date()).format('YYYY-MM-DD');
        var dtdt2 = dtdt +" 23:59:59";
        checkuserauthH(dtdt,dtdt2);
        loadmodal('moldrepairmodal');

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


/* ____________________ INSERT HISTORY A ________________________ */


/* ____________________ EDIT HISTORY A ________________________ */

$('#mod').on('submit','#editmoldhistoryform', function (e) {           
  /* alert('TEST'); */
  /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
  e.preventDefault();
  e.stopImmediatePropagation();
  var formdata =  $('#editmoldhistoryform').serializeArray();
  formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/mold/historyHandler.php',
    data: $.param(formdata),
    success: function (data) {
      /* alert(data);  */  
      if(data==true){
        /* alert("Record saved successfully!"); */
        $('#editmoldhistoryform').trigger('reset');
        $('#editmoldhistory').modal('hide');          
        var dtdt =moment(Date()).format('YYYY-MM-DD');
        var dtdt2 = dtdt +" 23:59:59";
        checkuserauthH(dtdt,dtdt2);
        loadmodal('moldrepairmodal');

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


/* ____________________ EDIT HISTORY A ________________________ */
  

/* ____________________ ADD MOLD FABRICATION A ________________________ */

$('#mod').on('submit','#addmoldfabricationform', function (e) {           
  /* alert('TEST'); */
  /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
  e.preventDefault();
  e.stopImmediatePropagation();
 /*  alert('test'); */
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/mold_repair/insert_mold_fabrication.php',
    data: $('#addmoldfabricationform').serialize(),
    success: function (data) {
      /* alert(data); */   
      
      if(data=="success"){
        /* alert("Record saved successfully!"); */
        $('#addmoldfabricationform').trigger('reset');
        $('#addmoldfabrication').modal('hide');          
        var dtdt =moment(Date()).format('YYYY-MM-DD');
        var dtdt2 = dtdt +" 23:59:59";
        checkuserauthF(dtdt,dtdt2);
        loadmodal('moldrepairmodal');

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


/* ____________________ ADD MOLD FABRICATION A ________________________ */


/* ____________________ EDIT MOLD FABRICATION A ________________________ */

$('#mod').on('submit','#emoldfabricationform', function (e) {           
  /* alert('TEST'); */
  /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
  e.preventDefault();
  e.stopImmediatePropagation();
 /*  alert('test'); */
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/mold_repair/edit_moldfab.php',
    data: $('#emoldfabricationform').serialize(),
    success: function (data) {
      /* alert(data); */   
      if(data=="success"){
        /* alert("Record saved successfully!"); */
        $('#emoldfabricationform').trigger('reset');
        $('#emoldfabrication').modal('hide');          
        var dtdt =moment(Date()).format('YYYY-MM-DD');
        var dtdt2 = dtdt +" 23:59:59";
        checkuserauthF(dtdt,dtdt2);
        loadmodal('moldrepairmodal');

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


/* ____________________ EDIT MOLD FABRICATION A ________________________ */



/* ____________________ MOLD FABRICATION GET CUSTOMER NAME ________________________ */

function getcus_name(dd,input){
  /* alert('test'); */
    // find the dropdown
    /* var ddl = document.getElementById(dd); */
      // find the selected option
      var selectedOption = dd.options[dd.selectedIndex].text;
      /* alert(selectedOption); */

      if(selectedOption !== null){
        /* alert('TEST LIST'); */
        $.ajax({
          type:'POST',
          data:{
            'cc': selectedOption
          },
          url:'/1_mes/_query/mold_repair/getcustomername.php',
          success:function(data){
            
            if(data!='none'){
              var val = JSON.parse(data);              
              $(input).val(val.CUSTOMER_NAME);  
            }                                               
          } 
    
          });

      }

  }
    /* ____________________ MOLD FABRICATION GET CUSTOMER NAME ________________________ */


    /* ____________________ MOLD FABRICATION CHANGE PROCESS ________________________ */

$('#mod').on('submit','#changeprocessform', function (e) {           
  
  e.preventDefault();
  e.stopImmediatePropagation();
  /* alert($('#prevprocessdatetime').val()); */
 swal({
  title: 'Are you sure?',
  text: "Please double check the process. You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, change it!'
}).then((result) => {
  if (result.value) {
    var currentprocess = $('#ccurrentprocess').val();

    $.ajax({
      type: 'POST',
      url: '/1_mes/_query/mold_repair/checkprocess.php',
      data: $('#changeprocessform').serialize(),
      success: function (data) {
                  
           if(data){
            /* alert("||"+data+"||"); */
            swal({
              type: 'error',
              title: 'Oops...',
              text: 'The process is either in-process or already done.',
            })

           }
           else{

            $.ajax({
              type: 'POST',
              url: '/1_mes/_query/mold_repair/changeprocess.php',
              data: $('#changeprocessform').serialize(),
              success: function (data) {
                   
                if(data=="success"){
                  $('#changeprocessform').trigger('reset');
                  $('#changeprocess').modal('hide');          
                  var dtdt =moment(Date()).format('YYYY-MM-DD');
                  var dtdt2 = dtdt +" 23:59:59";
                  checkuserauthF(dtdt,dtdt2);
                  loadmodal('moldrepairmodal');
          
                  $.notify({
                    icon: 'fas fa-info-circle',
                    title: 'System Notification: ',
                    message: "Process changed successfully!",
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

           }         
      }
    });       

  }
})
  
});

/* ____________________ MOLD FABRICATION CHANGE PROCESS ________________________ */


/* ____________________ MOLD FABRICATION GET ORDER NUMBER ________________________ */

function getordernumber(){
  /* alert('TEST'); */
  var num = 0;
  $.ajax({          
    url:'/1_mes/_query/mold_repair/getordernumber.php',    
    async: false,
    error: function() {
        alert("Error occured");
    },
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
        var newnum = parseInt(val.ORDER_NO) + 1;          
        /* $("#pmcontrol").attr("value",pad(newnum,5));
        $("#apmcontrol").attr("value",pad(newnum,5)); */
        /* return newnum; */
        num = newnum;
      }
      else{
        /* alert('TEST else'); */ 
        /* $("#pmcontrol").attr("value",pad(1,5));
        $("#apmcontrol").attr("value",pad(1,5)); */
        /* return 1; */
        num = 1;
      }        
    } 

    });
    return num;
}/* getcontrolnumber */

/* ____________________ MOLD FABRICATION GET ORDER NUMBER ________________________ */


/* ____________________ MOLD FABRICATION GET LEAD TIME FORMAT ________________________ */
function ltformat(sec){
  if(sec==""){
    return "";
  }
  else if(!moment(sec, "YYYY-MM-DD HH:mm:ss", true).isValid()){
    var min = sec;
    /* min= min.slice(1, -1); */
    /* min = Math.floor(min / 60); */
    min = min*60;
    var seconds = min;
    var days = Math.floor(seconds / (3600*24));
    seconds  -= days*3600*24;
    var hrs   = Math.floor(seconds / 3600);
    seconds  -= hrs*3600;
    var mnts = Math.floor(seconds / 60);
    seconds  -= mnts*60;
    var time = days+" day, "+hrs+" hr, "+mnts+" min";
    return "<span style='color:blue;font-weight:bold'>"+time+"</span>";
  }              
  else if(moment(sec, "YYYY-MM-DD HH:mm:ss", true).isValid()){    
    var second = Date.parse(new Date()) - Date.parse(new Date(sec));
    var seconds = parseInt(second,10)/1000;
    var days = Math.floor(seconds / (3600*24));
    seconds  -= days*3600*24;
    var hrs   = Math.floor(seconds / 3600);
    seconds  -= hrs*3600;
    var mnts = Math.floor(seconds / 60);
    seconds  -= mnts*60;
    var time = "( "+ days+" day, "+hrs+" hr, "+mnts+" min )";
    return "<span style='color:orange;font-weight:bold'>"+time+"</span>";
  }
}
/* ____________________ MOLD FABRICATION GET LEAD TIME FORMAT ________________________ */


/* ____________________ MOLD FABRICATION GET LEAD TIME MODAL ________________________ */
function ltformatm(sec){
  if(sec==""){
    return "";
  }
  else if(!moment(sec, "YYYY-MM-DD HH:mm:ss", true).isValid()){
    var min = sec;
    /* min= min.slice(1, -1); */
    /* min = Math.floor(min / 60); */
    min = min*60;
    var seconds = min;
    var ts = seconds;
    var days = Math.floor(seconds / (3600*24));
    seconds  -= days*3600*24;
    var hrs   = Math.floor(seconds / 3600);
    seconds  -= hrs*3600;
    var mnts = Math.floor(seconds / 60);
    seconds  -= mnts*60;
    var time = days+" day, "+hrs+" hr, "+mnts+" min";
    return time;
  }              
  else if(moment(sec, "YYYY-MM-DD HH:mm:ss", true).isValid()){
    var second = Date.parse(new Date()) - Date.parse(new Date(sec));
    var seconds = parseInt(second,10)/1000;
    var ts = seconds;
    var days = Math.floor(seconds / (3600*24));
    seconds  -= days*3600*24;
    var hrs   = Math.floor(seconds / 3600);
    seconds  -= hrs*3600;
    var mnts = Math.floor(seconds / 60);
    seconds  -= mnts*60;
    var time = "( "+ days+" day, "+hrs+" hr, "+mnts+" min )";
    return time;
  }
}
/* ____________________ MOLD FABRICATION GET LEAD TIME FORMAT MODAL ________________________ */


/* ____________________ EDIT CHANGE PROCESS MODAL ________________________ */
$('#mod').on('click','#echangeprocess', function (e) { 
  var id = $("#cmoldfabricationid").val()

  $.ajax(
    {
    method:'post',
    url:'/1_mes/_query/mold_repair/getrowfab.php',
    data:
    {
        'id': id,
        'ajax': true
    },
    success: function(data1) {
      $('#changeprocess').modal('hide');
      var val = JSON.parse(data1);
      $("#ecmoldfabricationid").val(val.MOLD_FABRICATION_ID);            

      $('#eleadtime_1').val(val['DESIGN-1']); $('#eoperator_1').val(val['DESIGN-1_OPERATOR']);
      $('#eleadtime_2').val(val['DESIGN-2']); $('#eoperator_2').val(val['DESIGN-2_OPERATOR']);
      $('#eleadtime_3').val(val['DESIGN-3']); $('#eoperator_3').val(val['DESIGN-3_OPERATOR']);
      $('#eleadtime_4').val(val['RADIAL-1']); $('#eoperator_4').val(val['RADIAL-1_OPERATOR']);
      $('#eleadtime_5').val(val['LATHER-1']); $('#eoperator_5').val(val['LATHER-1_OPERATOR']);
      $('#eleadtime_6').val(val['BANDSAW']); $('#eoperator_6').val(val['BANDSAW_OPERATOR']);
      $('#eleadtime_7').val(val['ML']); $('#eoperator_7').val(val['ML_OPERATOR']);
      $('#eleadtime_8').val(val['GS-1']); $('#eoperator_8').val(val['GS-1_OPERATOR']);
      $('#eleadtime_9').val(val['GS-2']); $('#eoperator_9').val(val['GS-2_OPERATOR']);
      $('#eleadtime_10').val(val['HSM']); $('#eoperator_10').val(val['HSM_OPERATOR']);
      $('#eleadtime_11').val(val['HSM-1']); $('#eoperator_11').val(val['HSM-1_OPERATOR']);
      $('#eleadtime_12').val(val['HSM-2']); $('#eoperator_12').val(val['HSM-2_OPERATOR']);
      $('#eleadtime_13').val(val['WEDM']); $('#eoperator_13').val(val['WEDM_OPERATOR']);
      $('#eleadtime_14').val(val['M-EDM']); $('#eoperator_14').val(val['M-EDM_OPERATOR']);
      $('#eleadtime_15').val(val['EDM']); $('#eoperator_15').val(val['EDM_OPERATOR']);
      $('#eleadtime_16').val(val['ASSEMBLE-1']); $('#eoperator_16').val(val['ASSEMBLE-1_OPERATOR']);
      $('#eleadtime_17').val(val['POLISHING-1']); $('#eoperator_17').val(val['POLISHING-1_OPERATOR']);
     
      $('.sel').select2({ width: '100%' });     
      
      $('#editchangeprocess').modal('show');
      $('#eleadtime_1').trigger('focus')

    }
  });
  
})

/* ____________________ EDIT CHANGE PROCESS MODAL ________________________ */


/* ____________________ EDIT CHANGE PROCESS ________________________ */

$('#mod').on('submit','#editchangeprocessform', function (e) {           
  
  e.preventDefault();
  e.stopImmediatePropagation();
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/mold_repair/edit_process.php',
    data: $('#editchangeprocessform').serialize(),
    success: function (data) {
        
      if(data=="success"){
        
        $('#editchangeprocessform').trigger('reset');
        $('#editchangeprocess').modal('hide');          
        var dtdt =moment(Date()).format('YYYY-MM-DD');
        var dtdt2 = dtdt +" 23:59:59";
        checkuserauthF(dtdt,dtdt2);
        loadmodal('moldrepairmodal');

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

/* ____________________ EDIT CHANGE PROCESS ________________________ */


/* _______________________ Check negative number ____________________________ */

function isNumberNegative(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode;
  return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

/* _______________________ Check negative number ____________________________ */


/* ____________________ ADD Operator ________________________ */

$('#mod').on('submit','#operatorform', function (e) {           
  /* alert('TEST'); */
  /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
  e.preventDefault();
  e.stopImmediatePropagation();
 /*  alert('test'); */
 var formdata = $('#operatorform').serializeArray();
 formdata.push({name: 'action', value: 'insert'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/mold/operatorHandler.php',
    data: $.param(formdata),
    success: function (data) {
      /* alert(data); */   
      
      if(data == true){
        /* alert("Record saved successfully!"); */
        $('#operatorform').trigger('reset');
        $('#operatormod').modal('hide');          
        checkuserauthO();
        loadmodal('moldrepairmodal');

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


/* ____________________ ADD operator ________________________ */


/* ____________________ EDIT Operator ________________________ */

$('#mod').on('submit','#eoperatorform', function (e) {           
  /* alert('TEST'); */
  /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
  e.preventDefault();
  e.stopImmediatePropagation();
 /*  alert('test'); */
 var formdata = $('#eoperatorform').serializeArray();
 formdata.push({name: 'action', value: 'update'});
  $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/mold/operatorHandler.php',
    data: $.param(formdata),
    success: function (data) {
      /* alert(data); */   
      
      if(data == true){
        /* alert("Record saved successfully!"); */
        $('#eoperatorform').trigger('reset');
        $('#eoperatormod').modal('hide');          
        checkuserauthO();
        loadmodal('moldrepairmodal');

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


/* ____________________ EDIT operator ________________________ */