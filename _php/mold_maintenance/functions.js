
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
        var val = JSON.parse(data);                   
        /* var x = val.ITEM_NAME;
        var y = val.TOOL_NUMBER;
        alert(x+" ==== "+y); */
        /* document.getElementById("#tnum").value(y); */
        $("#atoolnumber").attr("value",val.TOOL_NUMBER);
        $("#aitemname").attr("value",val.ITEM_NAME);
        $("#aitemcode").attr("value",val.ITEM_CODE);
        $("#acustomername").attr("value",val.CUSTOMER_NAME);
        
    } 

    }); 
  }

}/* lischange */

function listchange(){
    /* alert('test'); */
    // find the dropdown
    var ddl = document.getElementById("mcl");
      // find the selected option
      var selectedOption = ddl.options[ddl.selectedIndex].text;
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
              var val = JSON.parse(data);                   
              /* var x = val.ITEM_NAME;
              var y = val.TOOL_NUMBER;
              alert(x+" ==== "+y); */
              /* document.getElementById("#tnum").value(y); */
              $("#toolnumber").attr("value",val.TOOL_NUMBER);
              $("#itemname").attr("value",val.ITEM_NAME);
              $("#itemcode").attr("value",val.ITEM_CODE);
              $("#customername").attr("value",val.CUSTOMER_NAME);
              
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
          var val = JSON.parse(data);                   
          /* var x = val.ITEM_NAME;
          var y = val.TOOL_NUMBER;
          alert(x+" ==== "+y); */
          /* document.getElementById("#tnum").value(y); */
          $("#etoolnumber").attr("value",val.TOOL_NUMBER);
          $("#eitemname").attr("value",val.ITEM_NAME);
          $("#eitemcode").attr("value",val.ITEM_CODE);
          $("#ecustomername").attr("value",val.CUSTOMER_NAME);
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
    
    $.ajax({
      type: 'POST',
      url: '/1_mes/_query/mold_repair/update_check.php',
      data: $('#checklistform').serialize(),
      success: function (data) {    
        if(data=="success"){
          /* alert("Checklist Saved Successfully!"); */
          $('#checklistform').trigger('reset');
          $('#chcklist').modal('hide');
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

        $.ajax({
          type: 'POST',
          url: '/1_mes/_query/mold_repair/approve.php',
          data: $('#checklistform').serialize(),
          success: function (data) {    
            if(data=="success"){

              $.ajax({
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
              });
              
              /* $('#chcklist').modal('hide');
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
              }); */
            }
            else{
              alert(data);          
            }
          }
        });
        
      }
    })
    
    /* $.ajax({
      type: 'POST',
      url: '/1_mes/_query/mold_repair/approve.php',
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
    
  });


  /* ____________________ Approve ________________________ */



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

        $.ajax({
          type: 'POST',
          url: '/1_mes/_query/mold_repair/qc_approve.php',
          data: $('#qcchecklistform').serialize(),
          success: function (data) {    
            if(data=="success"){
              
              $('#qcchcklist').modal('hide');
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


  /* ____________________ QC Approve ________________________ */



  /* ____________________ EDIT ________________________ */

  $('#mod').on('submit','#editform', function (e) {           
    /* alert('TEST');
    alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
    e.preventDefault();
    e.stopImmediatePropagation();
    
    $.ajax({
      type: 'POST',
      url: '/1_mes/_query/mold_repair/edit_mold_repair.php',
      data: $('#editform').serialize(),
      success: function (data) {    
        if(data=="success"){
          /* alert("Record Updated Successfully!"); */
          $('#editform').trigger('reset');
          $('#editmoldrepair').modal('hide');
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
    
    $.ajax({
      type: 'POST',
      url: '/1_mes/_query/mold_repair/insert_mold_repair.php',
      data: $('#addformA').serialize(),
      success: function (data) {
        /* alert(data);  */  
        if(data=="success"){
          /* alert("Record saved successfully!"); */
          $('#addformA').trigger('reset');
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
          });
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
    
    $.ajax({
      type: 'POST',
      url: '/1_mes/_query/mold_repair/insert_mold_repair.php',
      data: $('#addform').serialize(),
      success: function (data) {
        /* alert(data); */   
        if(data=="success"){
          /* alert("Record saved successfully!"); */
          $('#addform').trigger('reset');
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
          });
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

  $('#mod').on('hide.bs.modal','.modal', function (e) {           
    /* alert('TEST');  */  
    $(this).find('form')[0].reset();
    $("[type='checkbox']").trigger("change");
  });


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
      
      if(status == 'WAITING' ||  status == 'ON-GOING'){

        if(ts<=172800){
          return "<span style='color: #2ECC71; font-weight: bold;'>"+time+"</span>";
        }
        else if(ts<=345600 && ts>172800){
          return "<span style='color: #F4D03F; font-weight: bold;'>"+time+"</span>";
        }
        else if(ts<=518400 && ts>345600){
          return "<span style='color: orange; font-weight: bold;'>"+time+"</span>";
        }
        else{
          return "<span style='color: red; font-weight: bold;'>"+time+"</span>";
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
        
        if(status == 'FOR MOLD TRIAL'){
          return "<span style='color: green; font-weight: bold;'>( "+time+" )</span>";
        }
        else if(status == 'QC APPROVED'){
          return "<span style='color: blue; font-weight: bold;'>( "+time+" )</span>";
        }
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
}

/* __________________ STATUS DISPLAY _______________________________ */


/* ____________________ INSERT HISTORY A ________________________ */

$('#mod').on('submit','#addmoldhistoryform', function (e) {           
  /* alert('TEST'); */
  /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
  e.preventDefault();
  e.stopImmediatePropagation();
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/mold_repair/insert_history.php',
    data: $('#addmoldhistoryform').serialize(),
    success: function (data) {
      /* alert(data);  */  
      if(data=="success"){
        /* alert("Record saved successfully!"); */
        $('#addmoldhistoryform').trigger('reset');
        $('#addmoldhistory').modal('hide');          
        checkuserauthH();
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
  
  $.ajax({
    type: 'POST',
    url: '/1_mes/_query/mold_repair/edit_history.php',
    data: $('#editmoldhistoryform').serialize(),
    success: function (data) {
      /* alert(data);  */  
      if(data=="success"){
        /* alert("Record saved successfully!"); */
        $('#editmoldhistoryform').trigger('reset');
        $('#editmoldhistory').modal('hide');          
        checkuserauthH();
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
  