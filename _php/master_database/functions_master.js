/* ______________________ MOLD LIST ______________________ */

/* Insert */

$('#mod').on('click','#moldlistsubmit', function (e) {           
    /* alert('TEST'); */
    
    $.ajax({
      type: 'POST',
      url: '/1_mes/_query/master_database/mold/insert.php',
      data: $('#moldlistform').serialize(),
      success: function (data) {
        /* alert(data); */   
        if(data=="success"){          
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

$('#mod').on('click','#emoldlistsubmit', function (e) {           
  /* alert('TEST'); */
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/mold/update.php',
    data: $('#emoldlistform').serialize(),
    success: function (data) {    
      if(data=="success"){
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

$('#mod').on('click','#customersubmit', function (e) {           
    /* alert('TEST'); */
    
    $.ajax({
      type: 'POST',
      url: '/1_mes/_query/master_database/customer/insert.php',
      data: $('#customerform').serialize(),
      success: function (data) {
        /* alert(data); */   
        if(data=="success"){
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

$('#mod').on('click','#ecustomersubmit', function (e) {           
  /* alert('TEST'); */
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/customer/update.php',
    data: $('#ecustomerform').serialize(),
    success: function (data) {    
      if(data=="success"){
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

$('#mod').on('click','#itemsubmit', function (e) {           
  /* alert('TEST'); */
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/item/insert.php',
    data: $('#itemform').serialize(),
    success: function (data) {
      /* alert(data); */   
      if(data=="success"){
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

$('#mod').on('click','#eitemsubmit', function (e) {           
  /* alert('TEST');  */ 
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/item/update.php',
    data: $('#eitemform').serialize(),
    success: function (data) {    
      if(data=="success"){
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

$('#mod').on('click','#machinesubmit', function (e) {           
  /* alert('TEST'); */
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/machine/insert.php',
    data: $('#machineform').serialize(),
    success: function (data) {         
      if(data=="success"){
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

$('#mod').on('click','#emachinesubmit', function (e) {           
  /* alert('TEST');  */ 
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/machine/update.php',
    data: $('#emachineform').serialize(),
    success: function (data) {    
      if(data=="success"){
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

$('#mod').on('click','#defectsubmit', function (e) {           
  /* alert('TEST'); */
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/defect/insert.php',
    data: $('#defectform').serialize(),
    success: function (data) {         
      if(data=="success"){
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

$('#mod').on('click','#edefectsubmit', function (e) {           
  /* alert('TEST');  */ 
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/defect/update.php',
    data: $('#edefectform').serialize(),
    success: function (data) {    
      if(data=="success"){
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

$('#mod').on('click','#userinfosubmit', function (e) {           
  /* alert('TEST'); */
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/userinfo/insert.php',
    data: $('#userinfoform').serialize(),
    success: function (data) {         
      if(data=="success"){
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

$('#mod').on('click','#euserinfosubmit', function (e) {           
  /* alert('TEST'); */  
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/userinfo/update.php',
    data: $('#euserinfoform').serialize(),
    success: function (data) {    
      if(data=="success"){
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

$('#mod').on('click','#userauthsubmit', function (e) {           
  /* alert('TEST'); */
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/userauth/insert.php',
    data: $('#userauthform').serialize(),
    success: function (data) {         
      if(data=="success"){
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

$('#mod').on('click','#euserauthsubmit', function (e) {           
  /* alert('TEST'); */  
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/userauth/update.php',
    data: $('#euserauthform').serialize(),
    success: function (data) {    
      if(data=="success"){
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

$('#mod').on('click','#divcodesubmit', function (e) {           
  /* alert('TEST'); */
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/divcode/insert.php',
    data: $('#divcodeform').serialize(),
    success: function (data) {         
      if(data=="success"){
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

$('#mod').on('click','#edivcodesubmit', function (e) {           
  /* alert('TEST');  */ 
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/master_database/divcode/update.php',
    data: $('#edivcodeform').serialize(),
    success: function (data) {    
      if(data=="success"){
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




/* Display Data */

  function getitemname(mod,id){

    // find the dropdown
    var ddl = document.getElementById(id);
    // find the selected option
    var selectedOption = ddl.options[ddl.selectedIndex].text;

    if(mod=='add'){

      $.ajax({
      type:'POST',
      data:{
        'mc': selectedOption
      },
      url:'/1_mes/_query/master_database/get/getitemname.php',
      success:function(data){
          var val = JSON.parse(data);          
          $("#itemname").val(val.ITEM_NAME);
      } 
      });

    }

    else if(mod=='edit'){

      $.ajax({
      type:'POST',
      data:{
        'mc': selectedOption
      },
      url:'/1_mes/_query/master_database/get/getitemname.php',
      success:function(data){
          var val = JSON.parse(data);          
          $("#eitemname").val(val.ITEM_NAME);
      } 
      });

    }
    else{
      alert('INVALID MODAL');
    }
    
     

  } /* getitemname */
  
  function getcustomername(mod,id){

    // find the dropdown
    var ddl = document.getElementById(id);
    // find the selected option
    var selectedOption = ddl.options[ddl.selectedIndex].text;
    
    if(mod=='add'){      

      $.ajax({
      type:'POST',
      data:{
        'mc': selectedOption
      },
      url:'/1_mes/_query/master_database/get/getcustomername.php',
      success:function(data){
          var val = JSON.parse(data);          
          $("#amcustomername").val(val.CUSTOMER_NAME);
          $("#aicustomername").val(val.CUSTOMER_NAME);
      } 
      });

    }

    else if(mod=='edit'){

      $.ajax({
      type:'POST',
      data:{
        'mc': selectedOption
      },
      url:'/1_mes/_query/master_database/get/getcustomername.php',
      success:function(data){
          var val = JSON.parse(data);          
          $("#ecustomername").val(val.CUSTOMER_NAME);
          $("#eicustomername").val(val.CUSTOMER_NAME);
      } 
      });

    }
    else{
      alert('INVALID MODAL');
    }

  } /* getitemname */

/* Display Data */