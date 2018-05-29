
/* ---------------------- MOLD ------------- MAINTENANCE ---------------------------- */

function alistchange(){
  /* alert('test'); */
  // find the dropdown
  var ddl = document.getElementById("amcl");
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
        $("#atoolnumber").attr("value",val.TOOL_NUMBER);
        $("#aitemname").attr("value",val.ITEM_NAME);
        $("#aitemcode").attr("value",val.ITEM_CODE);
        $("#acustomername").attr("value",val.CUSTOMER_NAME);
        
    } 

    }); 
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
    
    $.ajax({
      type: 'POST',
      url: '/1_mes/_query/mold_repair/approve.php',
      data: $('#achecklistform').serialize(),
      success: function (data) {    
        if(data=="success"){
          /* alert("Checklist Saved Successfully!"); */
          /* $('#checklistform').trigger('reset'); */
          $('#achcklist').modal('hide');
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
    
  });


  /* ____________________ Approve ________________________ */



  /* ____________________ EDIT ________________________ */

  $('#mod').on('click','#editformsubmit', function (e) {           
    /* alert('TEST');
    alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
    
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

  $('#mod').on('click','#Ainsertsubmit', function (e) {           
    /* alert('TEST'); */
    /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
    
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

  $('#mod').on('click','#insertsubmit', function (e) {           
    /* alert('TEST'); */
    /* alert(document.getElementById("MRI009").checked ? 'YES' : 'NO'); */
    
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

function checkFluency()
{
  var checkbox = document.getElementById('others');
  if (checkbox.checked == true)
  {
    /* alert("test True"); */
    document.getElementById("dn").disabled = true;
    document.getElementById("dno").disabled = false;
    /* $('sel #dn').hide();
    $('#dn').parent().hide();
      $('#dno').show(); */
  }
  else{
    /* alert("test False"); */
    document.getElementById("dn").disabled = false;
    document.getElementById("dno").disabled = true;
    /* $('#dn').parent().show();
      $('#dno').hide(); */
  }
}

/* ________________ Defect name checkbox ____________________ */

function inspect(){
  $.ajax(
    {
    method:'post',
    url:'/1_mes/_query/mold_repair/getrow.php',
    data:
    {
        'id': data[5],
        'ajax': true
    },
    success: function(data1) {
      var val = JSON.parse(data1);
      
      $("#chkrepaircontrol").val(val.MOLD_REPAIR_CONTROL_NO);

      $("#MRI001").val(val.MRI001);
      $("#MRI002").val(val.MRI002); 
      $("#MRI003").val(val.MRI003); 
      $("#MRI004").val(val.MRI004); 
      $("#MRI005").val(val.MRI005); 
      $("#MRI006").val(val.MRI006); 
      $("#MRI007").val(val.MRI007); 
      $("#MRI008").val(val.MRI008);
      
      if(val.MRI009=='YES'){document.getElementById("MRI009").checked = true; };
      if(val.MRI010=='YES'){document.getElementById("MRI010").checked = true; };
      if(val.MRI011=='YES'){document.getElementById("MRI011").checked = true; };
      if(val.MRI012=='YES'){document.getElementById("MRI012").checked = true; };
      if(val.MRI013=='YES'){document.getElementById("MRI013").checked = true; };

      if(val.MRI014=='YES'){document.getElementById("MRI014").checked = true; };
      if(val.MRI015=='YES'){document.getElementById("MRI015").checked = true; };
      if(val.MRI016=='YES'){document.getElementById("MRI016").checked = true; };
      if(val.MRI017=='YES'){document.getElementById("MRI017").checked = true; };
      if(val.MRI018=='YES'){document.getElementById("MRI018").checked = true; };
      if(val.MRI019=='YES'){document.getElementById("MRI019").checked = true; };
      if(val.MRI020=='YES'){document.getElementById("MRI020").checked = true; };
     
      $("#actiontaken").val(val.ACTION_TAKEN);

      $('.sel').select2({ width: '100%' });
      $('#chcklist').modal('show');
    }
  });
}