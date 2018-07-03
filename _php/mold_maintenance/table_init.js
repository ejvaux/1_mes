
/* ____________ Table Init ________________ */

function checkuserauth(sd,ed){
  if(val=="A" || val=="G"){
    DisplayTble('mold_repair_table','mold_repairsp','Mold Repair',sd,ed);
  }
  
  else if(val=="DC"){
    DisplayTbleC('mold_repair_table2','mold_repairsp','Mold Repair',sd,ed);
  }
  
  else if(val=="DG"){
    DisplayTbleG('mold_repair_table3','mold_repairsp','Mold Repair',sd,ed);
  }

  else if(val=="DA"){
    DisplayTbleA('mold_repair_table2','mold_repairsp','Mold Repair',sd,ed);
  }

  else if(val=="C"){
    DisplayTbleQC('mold_repair_table2','mold_repairsp','Mold Repair',sd,ed);
  }

  else{
    alert('Not Authorized');
    window.location.href='/1_MES/_php/portal.php';
  }
}              
/* _______________ Table Init ______________ */


/* ____________ Table Init H ________________ */

function checkuserauthH(){
  if(val=="A"){
    DisplayTbleHA('mold_history_table','mold_historysp','Mold History');
  }
  
  else{
    DisplayTbleH('mold_history_table','mold_historysp','Mold History');
  }
}              
/* _______________ Table Init H ______________ */

/* ____________ Table Init F ________________ */

function checkuserauthF(){
  if(val=="A"){
    DisplayTbleFA('mold_fabrication_table','mold_fabricationsp','Mold Fabrication');
  }
  
  else{
    DisplayTbleFC('mold_fabrication_table','mold_fabricationsp','Mold Fabrication');
  }
}              
/* _______________ Table Init F ______________ */

/* ____________ Table Init O ________________ */

function checkuserauthO(){
  
    DisplayTbleO('mold_operator_table','mold_operatorsp','Mold Operator List');
  
}              
/* _______________ Table Init F ______________ */

/* Display Table USER A*/
        
function DisplayTble(Table_Name,Tablesp,tbltitle,startdate,enddate) {
    var xhttp;
    if (Table_Name.length == 0) { 
      document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("table_display").innerHTML = this.responseText;       
        
        var tble = $('#Dtable').DataTable( {
        scrollY:        '61vh',
        "sScrollX": "100%",
        /* scrollerX:      true, */
          "processing": true,
          "serverSide": true,
          "iDisplayLength": 100,          
          fixedColumns: {
              heightMatch: 'semiauto'
          },
          "dom": '<"row"<"col-sm-3"B><"col-sm-5"<"dr">><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',         
          "ajax": {
            url: "/1_mes/_includes/"+Tablesp+".php",
            type: 'POST',
            data: {
              "sday": startdate,
              "eday": enddate
            }
          },                      
          'buttons': [            
            { text: '<i class="fas fa-plus"></i>',
              attr:  {
                  title: 'Add Request',
                  id: 'addButton'
              },  
              name: 'add',
              className: 'btn btn-export6 btn-xs py-1 addbt',
              extend: 'add1'               
            },
            { extend: 'selected', // Bind to Selected row
              text: '<i class="fas fa-edit"></i>',
              attr:  {
                  title: 'Edit Request',
                  id: 'editButton'
              },
              name: 'edit',        // do not change name
              className: 'btn btn-export6 btn-xs py-1 editbt',
              action: function ( e, dt, node, config ) {
                /* alert('test Edit button'); */
                var data = dt.row( '.selected' ).data();                                    
                /* alert( data[0] +" is the ID. " ); */
                /* alert("||"+data[3]+"||"); */
                /* document.getElementById("emcl").value = data[3]; */
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
                    /* alert(data1);
                    alert(val.MOLD_REPAIR_CONTROL_NO); */
                    /* alert("||"+val.MACHINE_CODE+"||");
                    alert("||"+data[3]+"||"); */

                    $("#epmcontrol").val(val.MOLD_REPAIR_CONTROL_NO);               
                    $("#emcl").val(val.MOLD_CODE);   
                    elistchange();
                    $("#emoldshot").val(val.MOLD_SHOT);
                    $("#emachinecode").val(val.MACHINE_CODE);
                    $("#edaterequired").val(val.DATE_REQUIRED);
                    $("#etimerequired").val(val.TIME_REQUIRED);
                    $("#edefectname").val(val.DEFECT_NAME);
                    $("#erepairremarks").val(val.REPAIR_REMARKS);
                    $("#emoldstatus").val(val.MOLD_STATUS);
                    /* alert($("#edefectname").val()); */
                    if($("#edefectname").val()==null){
                      /* alert('test'); */
                      $("#eothers").prop('checked', true);
                      $("#eothers").trigger("change");
                      $("#edno").val(val.DEFECT_NAME);
                    }
                    
                    $('.sel').select2({ width: '100%' });
                    $('#editmoldrepair').modal('show');
                  }
                });                                             
                
              }
            },
            {
              extend: 'selected', // Bind to Selected row
              text: '<i class="fas fa-trash"></i>',
              attr:  {
                  title: 'Delete Request',
                  id: 'deleteButton'
              },
              name: 'delete',      // do not change name
              className: 'btn btn-export6 btn-xs py-1 delbt',
              
              action: function ( e, dt, node, config ) {                         

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
                    
                    var data = dt.row( '.selected' ).data();
                    $.ajax(
                      {
                      method:'post',
                      url:'/1_mes/_query/mold_repair/delete_mold_repair.php',
                      data:
                      {
                          'id': data[5],
                          'ajax': true
                      },
                      success: function(data) {
                        checkuserauth();

                        $.notify({
                          icon: 'fas fa-info-circle',
                          title: 'System Notification: ',
                          message: data,
                        },{
                          type:'success',
                          placement:{
                            align: 'center'
                          },           
                          delay: 3000,                        
                        });
                      }
                      });

                  }
                })

              }                
            },
            { extend: 'copy', text: '<i class="far fa-copy"></i>', 
            attr:  {
              title: 'Copy to Clipboard',
              id: 'copyButton'
          },
           className: 'btn btn-export6 btn-xs py-1'},
            { extend: 'excel', text: '<i class="fas fa-table"></i>',
            attr:  {
            title: 'Export to Excel',
            id: 'exportButton'
        },
         filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'}
            ],          
            select: 'single',
              "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 1
            },
            {
              "data": null,
              "searchable": false,
              "orderable": false,
              render: function ( data, type, row ) {
                
                if(row[3]=='FOR PM' ){
                    return "<div class='text-center'><button id='forpm' class='btn btn-export4 py-0 px-1 m-0'><span style='font-size:.8em;'>Add PM</span></button></div>";
                  }
                  else{
                    return "<div class='text-center'><button id='checking' class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";
                  }
                                                                                  
              },              
              "targets": 0,
            },
            {
              "data": null,
              render: function ( data, type, row ) {
                
                return ltime(row[2],row[3],row[21]);                                 
              },              
              "targets": 2,
            },
           ],
            
            "order": [[ 5, 'desc' ],[ 6, 'desc' ]],
            "createdRow": function ( row, data, index ) {
              $('td', row).eq(3).addClass(statdisplay(data[3]));
            },
            /* responsive: true */
                                 
        } );       
        
        /* ____________________ FUNCTIONS ___________________ */        

        tble.on( 'order.dt search.dt processing.dt page.dt processing.dt page.dt', function () {
            tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();     

        $('#Dtable tbody').on( 'click', '#checking', function () {
          var data = tble.row( $(this).parents('tr') ).data();
          /* var tt =JSON.stringify(data); */
          /* alert(data[5]); */
          /* document.getElementById("chkrepaircontrol").value = data[5]; */
  
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
              /* alert(data1);
              alert(val.MOLD_REPAIR_CONTROL_NO); */
              /* alert("||"+val.MACHINE_CODE+"||");
              alert("||"+data[3]+"||"); */
             /* alert(val.MOLD_REPAIR_CONTROL_NO); */
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
              $("#achecklistsubmit").hide();
  
              $('.sel').select2({ width: '100%' });
              $('#chcklist').modal('show');
            }
          });              
          
      } );
      
      $('#Dtable tbody').on( 'click', '#forpm', function () {
        var data = tble.row( $(this).parents('tr') ).data();
                
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
            /* alert(data1);
            alert(val.MOLD_REPAIR_CONTROL_NO); */
            /* alert("||"+val.MACHINE_CODE+"||");
            alert("||"+data[3]+"||"); */

            $("#epmcontrol").val(val.MOLD_REPAIR_CONTROL_NO);               
            $("#emcl").val(val.MOLD_CODE);   
            elistchange();
            $("#emoldshot").val(val.MOLD_SHOT);
            $("#emachinecode").val(val.MACHINE_CODE);
            $("#edaterequired").val(val.DATE_REQUIRED);
            $("#etimerequired").val(val.TIME_REQUIRED);
            $("#edefectname").val(val.DEFECT_NAME);
            $("#erepairremarks").val(val.REPAIR_REMARKS);
            $("#emoldstatus").attr('disabled','disabled');
            $("#hemoldstatus").removeAttr('disabled');
            $("#hemoldstatus").val('WAITING');
            /* alert($("#edefectname").val()); */
            if($("#edefectname").val()==null){
              /* alert('test'); */
              $("#eothers").prop('checked', true);
              $("#eothers").trigger("change");
              $("#edno").val(val.DEFECT_NAME);
            }
            
            $('.sel').select2({ width: '100%' });
            $('#editmoldrepair').modal('show');
          }
        });
        
      } );

      $("div.dd").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Status</div></div><select class="form-control p-1" id="sortstatus" style="height: 31px;"><option>ALL</option><option>FOR PM</option><option>WAITING</option><option>ON-GOING</option><option>FOR MOLD TRIAL</option><option>QC APPROVED</option></select></div>');
      $("div.dr").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Date</div></div><input type="date" id="min"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">to</div></div><input type="date" id="max"><button type="button" id="refresh" ><i class="fas fa-sync-alt"></i></button></div>');
      
      $('#min').val(startdate);
      $('#max').val(enddate);

      $('#sortstatus').on('change',function(){
        /* alert('test'); */
        var selectedValue = $(this).val();
        /* alert(selectedValue); */
        if(selectedValue!="ALL"){
          tble
          .columns( 3 )
          .search( selectedValue)
          .draw();
        }
        else{
          tble
          .columns( 3 )
          .search('')
          .draw();
        }
        
      });

      $('#min, #max').on('change',function(){
        var sdate = $('#min').val();
        var edate = $('#max').val();

        if(moment(sdate,'YYYY-MM-DD').isValid() && moment(edate,'YYYY-MM-DD').isValid()){
          /* alert('Good'); */
          
          checkuserauth(sdate,edate);          
        }
        else{
          /* alert('No Good'); */
        }
        /* alert('test'); */        
      });

      $('#refresh').on('click',function(){
        checkuserauth();
      });

      /* $('#min, #max').keyup( function() {
        tble.draw();
    } ); */   
        /* ____________________________ FUNCTIONS _________________________ */
      }
      
    };
    xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
    xhttp.send();   
    
  } 
  
  $.fn.dataTable.ext.buttons.add1 = {
    action: 
    function () {
      
      /* listchange();
      getctrlnumber(); */
      $("#addmoldrepairA").modal('show');        
      
    }
  };
  
      /* Display Table - END */

/* --------------------------- user G ------------------------------------------- */

function DisplayTbleG(Table_Name,Tablesp,tbltitle,startdate,enddate) {
  var xhttp;
  if (Table_Name.length == 0) { 
    document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_display").innerHTML = this.responseText;
      var tble = $('#Dtable').DataTable( {        
        deferRender:    true,
        scrollY:        '61vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,        
        fixedColumns: {
            heightMatch: 'semiauto'
        },
        "ajax": {
          url: "/1_mes/_includes/"+Tablesp+".php",
          type: 'POST',
          data: {
            "sday": startdate,
            "eday": enddate
          }
        },            
        "dom": '<"row"<"col-sm-3"B><"col-sm-5"<"dr">><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [            
          { text: '<i class="fas fa-plus"></i>',
          attr:  {
              title: 'Add Request',
              id: 'addButton'
          },
            name: 'add', // do not change name 
            className: 'btn btn-export6 btn-xs py-1 addbt',
            extend: 'add2'               
          },            
          { extend: 'copy', text: '<i class="far fa-copy"></i>',
          attr:  {
              title: 'Copy to Clipboard',
              id: 'copyButton'
          },
           className: 'btn btn-export6 btn-xs py-1'},
          { extend: 'excel', text: '<i class="fas fa-table"></i>', 
          attr:  {
            title: 'Export to Excel',
            id: 'exportButton'
        },
         filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'}
          ],        
          select: false,
          "columnDefs": [
              {
                "searchable": false,
                "orderable": false,
                "targets": 1
              },
              {
                "data": null,
                "searchable": false,
                "orderable": false,
                render: function ( data, type, row ) {
                  
                  if(row[3]=='FOR PM' ){
                    return "<div class='text-center'><button id='forpm' class='btn btn-export4 py-0 px-1 m-0'><span style='font-size:.8em;'>Add PM</span></button></div>";
                  }
                  else{                   
                    return "<div class='text-center'><button id='checking' class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";
                  }
                                                                                    
                },              
                "targets": 0,
              },            
              {
                "data": null,
                render: function ( data, type, row ) {
                  
                  return ltime(row[2],row[3],row[21]);                                   
                },              
                "targets": 2,
              },
              
            ],
            "order": [[ 4, 'desc' ],[ 5, 'desc' ]],
            "createdRow": function ( row, data, index ) {

              $('td', row).eq(3).addClass(statdisplay(data[3]));
          }
          /* responsive: true */
                               
      } );                
      
      /* ____________________ FUNCTIONS ___________________ */
      tble.on( 'order.dt search.dt processing.dt page.dt', function () {
          tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();
      
      $('#Dtable tbody').on( 'click', '#checking', function () {
        var data = tble.row( $(this).parents('tr') ).data();
        /* alert(data[5]); */

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

            $("#achkrepaircontrol").val(val.MOLD_REPAIR_CONTROL_NO);

            $("#aMRI001").val(val.MRI001);
            $("#aMRI002").val(val.MRI002); 
            $("#aMRI003").val(val.MRI003); 
            $("#aMRI004").val(val.MRI004); 
            $("#aMRI005").val(val.MRI005); 
            $("#aMRI006").val(val.MRI006); 
            $("#aMRI007").val(val.MRI007); 
            $("#aMRI008").val(val.MRI008);
            
            if(val.MRI009=='YES'){document.getElementById("aMRI009").checked = true; };
            if(val.MRI010=='YES'){document.getElementById("aMRI010").checked = true; };
            if(val.MRI011=='YES'){document.getElementById("aMRI011").checked = true; };
            if(val.MRI012=='YES'){document.getElementById("aMRI012").checked = true; };
            if(val.MRI013=='YES'){document.getElementById("aMRI013").checked = true; };

            if(val.MRI014=='YES'){document.getElementById("aMRI014").checked = true; };
            if(val.MRI015=='YES'){document.getElementById("aMRI015").checked = true; };
            if(val.MRI016=='YES'){document.getElementById("aMRI016").checked = true; };
            if(val.MRI017=='YES'){document.getElementById("aMRI017").checked = true; };
            if(val.MRI018=='YES'){document.getElementById("aMRI018").checked = true; };
            if(val.MRI019=='YES'){document.getElementById("aMRI019").checked = true; };
            if(val.MRI020=='YES'){document.getElementById("aMRI020").checked = true; };

            $("#aactiontaken").val(val.ACTION_TAKEN);

            $("#achecklistsubmit").hide();

            $('.sel').select2({ width: '100%' });
            $('#achcklist').modal('show');
          }
        });
        
      } );

      $('#Dtable tbody').on( 'click', '#forpm', function () {
        var data = tble.row( $(this).parents('tr') ).data();
                
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
            /* alert(data1);
            alert(val.MOLD_REPAIR_CONTROL_NO); */
            /* alert("||"+val.MACHINE_CODE+"||");
            alert("||"+data[3]+"||"); */

            $("#epmcontrol").val(val.MOLD_REPAIR_CONTROL_NO);               
            $("#emcl").val(val.MOLD_CODE);   
            elistchange();
            $("#emoldshot").val(val.MOLD_SHOT);
            $("#emachinecode").val(val.MACHINE_CODE);
            $("#edaterequired").val(val.DATE_REQUIRED);
            $("#etimerequired").val(val.TIME_REQUIRED);
            $("#edefectname").val(val.DEFECT_NAME);
            $("#erepairremarks").val(val.REPAIR_REMARKS);
            $("#emoldstatus").attr('disabled','disabled');
            $("#hemoldstatus").removeAttr('disabled');
            $("#hemoldstatus").val('WAITING');
            /* alert($("#edefectname").val()); */
            if($("#edefectname").val()==null){
              /* alert('test'); */
              $("#eothers").prop('checked', true);
              $("#eothers").trigger("change");
              $("#edno").val(val.DEFECT_NAME);
            }
            
            $('.sel').select2({ width: '100%' });
            $('#editmoldrepair').modal('show');
          }
        });
        
      } );

      $("div.dd").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Status</div></div><select class="form-control p-1" id="sortstatus" style="height: 31px;"><option>ALL</option><option>FOR PM</option><option>WAITING</option><option>ON-GOING</option><option>FOR MOLD TRIAL</option><option>QC APPROVED</option></select></div>');
      $("div.dr").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Date</div></div><input type="date" id="min"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">to</div></div><input type="date" id="max"><button type="button" id="refresh" ><i class="fas fa-sync-alt"></i></button></div>');

      $('#min').val(startdate);
      $('#max').val(enddate);

      $('#sortstatus').on('change',function(){
        /* alert('test'); */
        var selectedValue = $(this).val();
        /* alert(selectedValue); */
        if(selectedValue!="ALL"){
          tble
          .columns( 3 )
          .search( selectedValue)
          .draw();
        }
        else{
          tble
          .columns( 3 )
          .search( '')
          .draw();
        }
        
      });
      
      $('#min, #max').on('change',function(){
        var sdate = $('#min').val();
        var edate = $('#max').val();

        if(moment(sdate,'YYYY-MM-DD').isValid() && moment(edate,'YYYY-MM-DD').isValid()){
          /* alert('Good'); */
          
          checkuserauth(sdate,edate);          
        }
        else{
          /* alert('No Good'); */
        }
        /* alert('test'); */        
      });

      $('#refresh').on('click',function(){
        checkuserauth();
      });

      /* ____________________________ FUNCTIONS _________________________ */
    }
    
  };
  xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
  xhttp.send();   
  
} 

$.fn.dataTable.ext.buttons.add2 = {
  action: 
  function () {
    var t = new Date();
      alistchange();
      getctrlnumber();    
    $("#addmoldrepair").modal('show');  
    /* alert('TEST');   */ 
    
  }
};

/* ------------------------------------ user G ------------------------------------------- */


/* -------------------------------------- User C -------------------------------------------- */

function DisplayTbleC(Table_Name,Tablesp,tbltitle,startdate,enddate) {
  var xhttp;
  if (Table_Name.length == 0) { 
    document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_display").innerHTML = this.responseText;
      var tble = $('#Dtable').DataTable( {
        deferRender:    true,
        scrollY:        '61vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,        
        fixedColumns: {
            heightMatch: 'semiauto'
        },
        /* "ajax": "/1_mes/_includes/"+Tablesp+".php", */
        "ajax": {
          url: "/1_mes/_includes/"+Tablesp+".php",
          type: 'POST',
          data: {
            "sday": startdate,
            "eday": enddate
          }
        },            
        "dom": '<"row"<"col-sm-3"B><"col-sm-5"<"dr">><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [
          { text: '<i class="fas fa-plus"></i>',
          attr:  {
              title: 'Add Request',
              id: 'addButton'
          },
            name: 'add', // do not change name 
            className: 'btn btn-export6 btn-xs py-1 addbt',
            extend: 'add2'               
          },                                
          { extend: 'copy', text: '<i class="far fa-copy"></i>',
          attr:  {
              title: 'Copy to Clipboard',
              id: 'copyButton'
          },
           className: 'btn btn-export6 btn-xs py-1'},
          { extend: 'excel', text: '<i class="fas fa-table"></i>',
          attr:  {
            title: 'Export to Excel',
            id: 'exportButton'
        },
         filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'}
          ],
        /* fixedHeader: {
          header: true,
          headerOffset: 122            
          }, */
          /* select: 'single', */
          "columnDefs": [
              {
                "searchable": false,
                "orderable": false,
                "targets": 1
              },
              {
                "data": null,
                "searchable": false,
                "orderable": false,
                render: function ( data, type, row ) {  
                  
                  if(row[3]=='FOR MOLD TRIAL' || row[3]=='QC APPROVED'){
                    return "<div class='text-center'><button id='checking' class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";
                  }
                  else if(row[3]=='FOR PM' ){
                    return "<div class='text-center'><button id='forpm' class='btn btn-export4 py-0 px-1 m-0'><span style='font-size:.8em;'>Add PM</span></button></div>";
                  }
                  else{
                    return "<div class='text-center'><button id='checking' class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Inspect</span></button></div>";
                  }
                                                                               
                },              
                "targets": 0,
              },
              {
                "data": null,
                render: function ( data, type, row ) {                  
                  return ltime(row[2],row[3],row[21]);                                   
                },              
                "targets": 2,
              },
            ],
            "order": [[ 4, 'desc' ],[ 5, 'desc' ]],
            "createdRow": function ( row, data, index ) {             
              $('td', row).eq(3).addClass(statdisplay(data[3]));
            },           
          /* fixedColumns:   true */
                               
      } );
      
      /* ____________________ FUNCTIONS ___________________ */
      tble.on( 'order.dt search.dt processing.dt page.dt', function () {
          tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

      $('#Dtable tbody').on( 'click', '#checking', function () {
        var data = tble.row( $(this).parents('tr') ).data();
        /* var tt =JSON.stringify(data); */
        /* alert(data[5]); */
        /* document.getElementById("chkrepaircontrol").value = data[5]; */

        if(data[3]=='FOR MOLD TRIAL'){

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
              /* alert(data1);
              alert(val.MOLD_REPAIR_CONTROL_NO); */
              /* alert("||"+val.MACHINE_CODE+"||");
              alert("||"+data[3]+"||"); */
             /* alert(val.MOLD_REPAIR_CONTROL_NO); */
              $("#achkrepaircontrol").val(val.MOLD_REPAIR_CONTROL_NO);
  
              $("#aMRI001").val(val.MRI001);
              $("#aMRI002").val(val.MRI002); 
              $("#aMRI003").val(val.MRI003); 
              $("#aMRI004").val(val.MRI004); 
              $("#aMRI005").val(val.MRI005); 
              $("#aMRI006").val(val.MRI006); 
              $("#aMRI007").val(val.MRI007); 
              $("#aMRI008").val(val.MRI008);
              
              if(val.MRI009=='YES'){document.getElementById("aMRI009").checked = true; };
              if(val.MRI010=='YES'){document.getElementById("aMRI010").checked = true; };
              if(val.MRI011=='YES'){document.getElementById("aMRI011").checked = true; };
              if(val.MRI012=='YES'){document.getElementById("aMRI012").checked = true; };
              if(val.MRI013=='YES'){document.getElementById("aMRI013").checked = true; };
  
              if(val.MRI014=='YES'){document.getElementById("aMRI014").checked = true; };
              if(val.MRI015=='YES'){document.getElementById("aMRI015").checked = true; };
              if(val.MRI016=='YES'){document.getElementById("aMRI016").checked = true; };
              if(val.MRI017=='YES'){document.getElementById("aMRI017").checked = true; };
              if(val.MRI018=='YES'){document.getElementById("aMRI018").checked = true; };
              if(val.MRI019=='YES'){document.getElementById("aMRI019").checked = true; };
              if(val.MRI020=='YES'){document.getElementById("aMRI020").checked = true; };
             
              $("#aactiontaken").val(val.ACTION_TAKEN);

              $("#achecklistsubmit").hide();
  
              $('.sel').select2({ width: '100%' });
              $('#achcklist').modal('show');
            }
          });

        }
        else{

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
            /* alert(data1);
            alert(val.MOLD_REPAIR_CONTROL_NO); */
            /* alert("||"+val.MACHINE_CODE+"||");
            alert("||"+data[3]+"||"); */
           /* alert(val.MOLD_REPAIR_CONTROL_NO); */
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
            $("#achecklistsubmit").hide();

            $('.sel').select2({ width: '100%' });
            $('#chcklist').modal('show');
          }
        });              
      }
    } );

    $('#Dtable tbody').on( 'click', '#forpm', function () {
      var data = tble.row( $(this).parents('tr') ).data();
              
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
          /* alert(data1);
          alert(val.MOLD_REPAIR_CONTROL_NO); */
          /* alert("||"+val.MACHINE_CODE+"||");
          alert("||"+data[3]+"||"); */

          $("#epmcontrol").val(val.MOLD_REPAIR_CONTROL_NO);               
          $("#emcl").val(val.MOLD_CODE);   
          elistchange();
          $("#emoldshot").val(val.MOLD_SHOT);
          $("#emachinecode").val(val.MACHINE_CODE);
          $("#edaterequired").val(val.DATE_REQUIRED);
          $("#etimerequired").val(val.TIME_REQUIRED);
          $("#edefectname").val(val.DEFECT_NAME);
          $("#erepairremarks").val(val.REPAIR_REMARKS);
          $("#emoldstatus").attr('disabled','disabled');
          $("#hemoldstatus").removeAttr('disabled');
          $("#hemoldstatus").val('WAITING');
          /* alert($("#edefectname").val()); */
          if($("#edefectname").val()==null){
            /* alert('test'); */
            $("#eothers").prop('checked', true);
            $("#eothers").trigger("change");
            $("#edno").val(val.DEFECT_NAME);
          }
          
          $('.sel').select2({ width: '100%' });
          $('#editmoldrepair').modal('show');
        }
      });
      
    } );

    $("div.dd").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Status</div></div><select class="form-control p-1" id="sortstatus" style="height: 31px;"><option>ALL</option><option>FOR PM</option><option>WAITING</option><option>ON-GOING</option><option>FOR MOLD TRIAL</option><option>QC APPROVED</option></select></div>');
    $("div.dr").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Date</div></div><input type="date" id="min"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">to</div></div><input type="date" id="max"><button type="button" id="refresh" ><i class="fas fa-sync-alt"></i></button></div>');

    $('#min').val(startdate);
    $('#max').val(enddate);

      $('#sortstatus').on('change',function(){
        /* alert('test'); */
        var selectedValue = $(this).val();
        /* alert(selectedValue); */
        if(selectedValue!="ALL"){
          tble
          .columns( 3 )
          .search( selectedValue)
          .draw();
        }
        else{
          tble
          .columns( 3 )
          .search( '')
          .draw();
        }
        
      });

      $('#min, #max').on('change',function(){
        var sdate = $('#min').val();
        var edate = $('#max').val();

        if(moment(sdate,'YYYY-MM-DD').isValid() && moment(edate,'YYYY-MM-DD').isValid()){
          /* alert('Good'); */
          
          checkuserauth(sdate,edate);          
        }
        else{
          /* alert('No Good'); */
        }
        /* alert('test'); */        
      });

      $('#refresh').on('click',function(){
        checkuserauth();
      });

      /* ____________________________ FUNCTIONS _________________________ */
    }
    
  };
  xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
  xhttp.send();   
  
} 

$.fn.dataTable.ext.buttons.add3 = {
  action: 
  function () {
      alistchange();
      getctrlnumber();    
    $("#addmoldrepair").modal('show');
    /* alert('TEST');  */       
  }
};   

/* -------------------------------------- User C -------------------------------------------- */

/* -------------------------------------- User Approver-------------------------------------------- */

function DisplayTbleA(Table_Name,Tablesp,tbltitle,startdate,enddate) {
  var xhttp;
  if (Table_Name.length == 0) { 
    document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_display").innerHTML = this.responseText;
      var tble = $('#Dtable').DataTable( {      
        deferRender:    true,
        scrollY:  '61vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,        
        fixedColumns: {
            heightMatch: 'semiauto'
        },
        /* "ajax": "/1_mes/_includes/"+Tablesp+".php", */
        "ajax": {
          url: "/1_mes/_includes/"+Tablesp+".php",
          type: 'POST',
          data: {
            "sday": startdate,
            "eday": enddate
          }
        },            
        "dom": '<"row"<"col-sm-3"B><"col-sm-5"<"dr">><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [ 
          { text: '<i class="fas fa-plus"></i>',
          attr:  {
              title: 'Add Request',
              id: 'addButton'
          },
            name: 'add', // do not change name 
            className: 'btn btn-export6 btn-xs py-1 addbt',
            extend: 'add2'               
          },                            
          { extend: 'copy', text: '<i class="far fa-copy"></i>',
          attr:  {
              title: 'Copy to Clipboard',
              id: 'copyButton'
          },
           className: 'btn btn-export6 btn-xs py-1'},
          { extend: 'excel', text: '<i class="fas fa-table"></i>',
          attr:  {
            title: 'Export to Excel',
            id: 'exportButton'
        },
         filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'}
          ],
        /* fixedHeader: {
          header: true,
          headerOffset: 122            
          }, */
          /* select: 'single', */
          "columnDefs": [
              {
                "searchable": false,
                "orderable": false,
                "targets": 1
              },
              {
                "data": null,
                "searchable": false,
                "orderable": false,
                render: function ( data, type, row ) {

                  if ( data[3] == 'WAITING' || data[3] == 'ON-GOING') {
                    return "<div class='text-center'><button id='inspect' class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Inspect</span></button></div>";
                  }
                  else if(row[3]=='FOR PM' ){
                    return "<div class='text-center'><button id='forpm' class='btn btn-export4 py-0 px-1 m-0'><span style='font-size:.8em;'>Add PM</span></button></div>";
                  }
                  else {
                    return "<div class='text-center'><button id='check' class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";
                  }
                                                    
                },              
                "targets": 0,
              },
              {
                "data": null,
                render: function ( data, type, row ) {
                  
                  return ltime(row[2],row[3],row[21]);                                   
                },              
                "targets": 2,
              },
            ],
            "order": [[ 4, 'desc' ],[ 5, 'desc' ]],
            "createdRow": function ( row, data, index ) {

              $('td', row).eq(3).addClass(statdisplay(data[3]));
            },           
          /* fixedColumns:   true */
                               
      } );
      
      /* ____________________ FUNCTIONS ___________________ */
      tble.on( 'order.dt search.dt processing.dt page.dt', function () {
          tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();      

      $('#Dtable tbody').on( 'click', '#inspect', function () {
        var data = tble.row( $(this).parents('tr') ).data();
                
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
            $("#chkrequestdate").val(val.REQUEST_DATE);
            $("#chkmoldcode").val(val.MOLD_CODE);


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
            $("#achecklistsubmit").show();

            $('.sel').select2({ width: '100%' });
            $('#chcklist').modal('show');
          }
        });
        
    } );


    $('#Dtable tbody').on( 'click', '#approve', function () {
        var data = tble.row( $(this).parents('tr') ).data();
                
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
            
            $("#achkrepaircontrol").val(val.MOLD_REPAIR_CONTROL_NO);

            $("#aMRI001").val(val.MRI001);
            $("#aMRI002").val(val.MRI002); 
            $("#aMRI003").val(val.MRI003); 
            $("#aMRI004").val(val.MRI004); 
            $("#aMRI005").val(val.MRI005); 
            $("#aMRI006").val(val.MRI006); 
            $("#aMRI007").val(val.MRI007); 
            $("#aMRI008").val(val.MRI008);
            
            if(val.MRI009=='YES'){document.getElementById("aMRI009").checked = true; };
            if(val.MRI010=='YES'){document.getElementById("aMRI010").checked = true; };
            if(val.MRI011=='YES'){document.getElementById("aMRI011").checked = true; };
            if(val.MRI012=='YES'){document.getElementById("aMRI012").checked = true; };
            if(val.MRI013=='YES'){document.getElementById("aMRI013").checked = true; };

            if(val.MRI014=='YES'){document.getElementById("aMRI014").checked = true; };
            if(val.MRI015=='YES'){document.getElementById("aMRI015").checked = true; };
            if(val.MRI016=='YES'){document.getElementById("aMRI016").checked = true; };
            if(val.MRI017=='YES'){document.getElementById("aMRI017").checked = true; };
            if(val.MRI018=='YES'){document.getElementById("aMRI018").checked = true; };
            if(val.MRI019=='YES'){document.getElementById("aMRI019").checked = true; };
            if(val.MRI020=='YES'){document.getElementById("aMRI020").checked = true; };
           
            $("#aactiontaken").val(val.ACTION_TAKEN);

            $('.sel').select2({ width: '100%' });
            $('#achcklist').modal('show');
          }
        });
        
    } );

    $('#Dtable tbody').on( 'click', '#forpm', function () {
      var data = tble.row( $(this).parents('tr') ).data();
              
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
          /* alert(data1);
          alert(val.MOLD_REPAIR_CONTROL_NO); */
          /* alert("||"+val.MACHINE_CODE+"||");
          alert("||"+data[3]+"||"); */

          $("#epmcontrol").val(val.MOLD_REPAIR_CONTROL_NO);               
          $("#emcl").val(val.MOLD_CODE);   
          elistchange();
          $("#emoldshot").val(val.MOLD_SHOT);
          $("#emachinecode").val(val.MACHINE_CODE);
          $("#edaterequired").val(val.DATE_REQUIRED);
          $("#etimerequired").val(val.TIME_REQUIRED);
          $("#edefectname").val(val.DEFECT_NAME);
          $("#erepairremarks").val(val.REPAIR_REMARKS);
          $("#emoldstatus").attr('disabled','disabled');
          $("#hemoldstatus").removeAttr('disabled');
          $("#hemoldstatus").val('WAITING');
          /* alert($("#edefectname").val()); */
          if($("#edefectname").val()==null){
            /* alert('test'); */
            $("#eothers").prop('checked', true);
            $("#eothers").trigger("change");
            $("#edno").val(val.DEFECT_NAME);
          }
          
          $('.sel').select2({ width: '100%' });
          $('#editmoldrepair').modal('show');
        }
      });
      
    } );

    $("div.dd").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Status</div></div><select class="form-control p-1" id="sortstatus" style="height: 31px;"><option>ALL</option><option>FOR PM</option><option>WAITING</option><option>ON-GOING</option><option>FOR MOLD TRIAL</option><option>QC APPROVED</option></select></div>');
    $("div.dr").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Date</div></div><input type="date" id="min"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">to</div></div><input type="date" id="max"><button type="button" id="refresh" ><i class="fas fa-sync-alt"></i></button></div>');

    $('#min').val(startdate);
    $('#max').val(enddate);

      $('#sortstatus').on('change',function(){
        /* alert('test'); */
        var selectedValue = $(this).val();
        /* alert(selectedValue); */
        if(selectedValue!="ALL"){
          tble
          .columns( 3 )
          .search( selectedValue)
          .draw();
        }
        else{
          tble
          .columns( 3 )
          .search( '')
          .draw();
        }
        
      });

      $('#min, #max').on('change',function(){
        var sdate = $('#min').val();
        var edate = $('#max').val();

        if(moment(sdate,'YYYY-MM-DD').isValid() && moment(edate,'YYYY-MM-DD').isValid()){
          /* alert('Good'); */
          
          checkuserauth(sdate,edate);          
        }
        else{
          /* alert('No Good'); */
        }
        /* alert('test'); */        
      });

      $('#refresh').on('click',function(){
        checkuserauth();
      });


      /* ____________________________ FUNCTIONS _________________________ */
    }
    
  };
  xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
  xhttp.send();   
  
} 

$.fn.dataTable.ext.buttons.add3 = {
  action: 
  function () {
      alistchange();
      getctrlnumber();    
    $("#addmoldrepair").modal('show');
    /* alert('TEST');  */    
    
  }
};   

/* -------------------------------------- User Approver -------------------------------------------- */


/* -------------------------------------- QC -------------------------------------------- */

function DisplayTbleQC(Table_Name,Tablesp,tbltitle,startdate,enddate) {
  var xhttp;
  if (Table_Name.length == 0) { 
    document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_display").innerHTML = this.responseText;
      var tble = $('#Dtable').DataTable( {      
        deferRender:    true,
        scrollY:  '61vh',
        "sScrollX": "100%",
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,        
        fixedColumns: {
            heightMatch: 'semiauto'
        },
        /* "ajax": "/1_mes/_includes/"+Tablesp+".php", */
        "ajax": {
          url: "/1_mes/_includes/"+Tablesp+".php",
          type: 'POST',
          data: {
            "sday": startdate,
            "eday": enddate
          }
        },            
        "dom": '<"row"<"col-sm-3"B><"col-sm-5"<"dr">><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [                                       
          { extend: 'copy', text: '<i class="far fa-copy"></i>',
          attr:  {
              title: 'Copy to Clipboard',
              id: 'copyButton'
          },
           className: 'btn btn-export6 btn-xs py-1'},
          { extend: 'excel', text: '<i class="fas fa-table"></i>',
          attr:  {
            title: 'Export to Excel',
            id: 'exportButton'
        },
         filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'}
          ],
        /* fixedHeader: {
          header: true,
          headerOffset: 122            
          }, */
          /* select: 'single', */
          "columnDefs": [
              {
                "searchable": false,
                "orderable": false,
                "targets": 1
              },
              {
                "data": null,
                "searchable": false,
                "orderable": false,
                render: function ( data, type, row ) {

                  if ( data[3] != 'FOR MOLD TRIAL') {
                    return "<div class='text-center'><button id='check' class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";
                  }
                  /* else if(data[3] == 'ON-GOING'){
                    return "<div class='text-center'><button id='inspect' class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Inspect</span></button></div><div class='text-center'><button id='approve' class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Approve</span></button></div>";
                  } */
                  else {
                    return "<div class='text-center'><button id='approve' class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Approve</span></button></div>";
                  }
                                                    
                },              
                "targets": 0,
              },
              {
                "data": null,
                render: function ( data, type, row ) {
                  
                  return ltime(row[2],row[3],row[21]);                                 
                },              
                "targets": 2,
              },
            ],
            "order": [[ 4, 'desc' ],[ 5, 'desc' ]],
            "createdRow": function ( row, data, index ) {              
              $('td', row).eq(3).addClass(statdisplay(data[3]));
            },           
          /* fixedColumns:   true */
                               
      } );
      
      /* ____________________ FUNCTIONS ___________________ */
      tble.on( 'order.dt search.dt processing.dt page.dt', function () {
          tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

      $('#Dtable tbody').on( 'click', '#check', function () {
          var data = tble.row( $(this).parents('tr') ).data();
          
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
              
              $("#achkrepaircontrol").val(val.MOLD_REPAIR_CONTROL_NO);
  
              $("#aMRI001").val(val.MRI001);
              $("#aMRI002").val(val.MRI002); 
              $("#aMRI003").val(val.MRI003); 
              $("#aMRI004").val(val.MRI004); 
              $("#aMRI005").val(val.MRI005); 
              $("#aMRI006").val(val.MRI006); 
              $("#aMRI007").val(val.MRI007); 
              $("#aMRI008").val(val.MRI008);
              
              if(val.MRI009=='YES'){document.getElementById("aMRI009").checked = true; };
              if(val.MRI010=='YES'){document.getElementById("aMRI010").checked = true; };
              if(val.MRI011=='YES'){document.getElementById("aMRI011").checked = true; };
              if(val.MRI012=='YES'){document.getElementById("aMRI012").checked = true; };
              if(val.MRI013=='YES'){document.getElementById("aMRI013").checked = true; };
  
              if(val.MRI014=='YES'){document.getElementById("aMRI014").checked = true; };
              if(val.MRI015=='YES'){document.getElementById("aMRI015").checked = true; };
              if(val.MRI016=='YES'){document.getElementById("aMRI016").checked = true; };
              if(val.MRI017=='YES'){document.getElementById("aMRI017").checked = true; };
              if(val.MRI018=='YES'){document.getElementById("aMRI018").checked = true; };
              if(val.MRI019=='YES'){document.getElementById("aMRI019").checked = true; };
              if(val.MRI020=='YES'){document.getElementById("aMRI020").checked = true; };
             
              $("#aactiontaken").val(val.ACTION_TAKEN);

              $("#achecklistsubmit").hide();
  
              $('.sel').select2({ width: '100%' });
              $('#achcklist').modal('show');
            }
          });                   
      } );     


    $('#Dtable tbody').on( 'click', '#approve', function () {
        var data = tble.row( $(this).parents('tr') ).data();
                
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
            
            $("#qcchkrepaircontrol").val(val.MOLD_REPAIR_CONTROL_NO);

            $("#qcMRI001").val(val.MRI001);
            $("#qcMRI002").val(val.MRI002); 
            $("#qcMRI003").val(val.MRI003); 
            $("#qcMRI004").val(val.MRI004); 
            $("#qcMRI005").val(val.MRI005); 
            $("#qcMRI006").val(val.MRI006); 
            $("#qcMRI007").val(val.MRI007); 
            $("#qcMRI008").val(val.MRI008);
            
            if(val.MRI009=='YES'){document.getElementById("qcMRI009").checked = true; };
            if(val.MRI010=='YES'){document.getElementById("qcMRI010").checked = true; };
            if(val.MRI011=='YES'){document.getElementById("qcMRI011").checked = true; };
            if(val.MRI012=='YES'){document.getElementById("qcMRI012").checked = true; };
            if(val.MRI013=='YES'){document.getElementById("qcMRI013").checked = true; };

            if(val.MRI014=='YES'){document.getElementById("qcMRI014").checked = true; };
            if(val.MRI015=='YES'){document.getElementById("qcMRI015").checked = true; };
            if(val.MRI016=='YES'){document.getElementById("qcMRI016").checked = true; };
            if(val.MRI017=='YES'){document.getElementById("qcMRI017").checked = true; };
            if(val.MRI018=='YES'){document.getElementById("qcMRI018").checked = true; };
            if(val.MRI019=='YES'){document.getElementById("qcMRI019").checked = true; };
            if(val.MRI020=='YES'){document.getElementById("qcMRI020").checked = true; };
           
            $("#qcactiontaken").val(val.ACTION_TAKEN);

            $('.sel').select2({ width: '100%' });
            $('#qcchcklist').modal('show');
          }
        });
        
    } );

    $("div.dd").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Status</div></div><select class="form-control p-1" id="sortstatus" style="height: 31px;"><option>ALL</option><option>FOR PM</option><option>WAITING</option><option>ON-GOING</option><option>FOR MOLD TRIAL</option><option>QC APPROVED</option></select></div>');
    $("div.dr").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Date</div></div><input type="date" id="min"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">to</div></div><input type="date" id="max"><button type="button" id="refresh" ><i class="fas fa-sync-alt"></i></button></div>');

      $('#min').val(startdate);
      $('#max').val(enddate);

      $('#sortstatus').on('change',function(){
        /* alert('test'); */
        var selectedValue = $(this).val();
        /* alert(selectedValue); */
        if(selectedValue!="ALL"){
          tble
          .columns( 3 )
          .search( selectedValue)
          .draw();
        }
        else{
          tble
          .columns( 3 )
          .search( '')
          .draw();
        }
        
      });

      $('#min, #max').on('change',function(){
        var sdate = $('#min').val();
        var edate = $('#max').val();

        if(moment(sdate,'YYYY-MM-DD').isValid() && moment(edate,'YYYY-MM-DD').isValid()){
          /* alert('Good'); */
          
          checkuserauth(sdate,edate);          
        }
        else{
          /* alert('No Good'); */
        }
        /* alert('test'); */        
      });

      $('#refresh').on('click',function(){
        checkuserauth();
      });

      /* ____________________________ FUNCTIONS _________________________ */
    }
    
  };
  xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
  xhttp.send();   
  
} 

$.fn.dataTable.ext.buttons.add3 = {
  action: 
  function () {
      alistchange();
      getctrlnumber();    
    $("#addmoldrepair").modal('show');
    /* alert('TEST');  */    
    
  }
};   

/* -------------------------------------- QC -------------------------------------------- */


/*  -------------------------------- TH - A -----------------------------------------------  */
        
function DisplayTbleHA(Table_Name,Tablesp,tbltitle) {
  var xhttp;
  if (Table_Name.length == 0) { 
    document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_display").innerHTML = this.responseText;
      var tble = $('#Dtable').DataTable( {
        deferRender:    true,
      scrollY:        '61vh',
      "sScrollX": "100%",
      /* scrollerX:      true, */
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,                  
        "ajax": {
          url: "/1_mes/_includes/"+Tablesp+".php",
          type: 'POST'
        },            
        "dom": '<"row"<"col-sm-3"B><"col"><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [            
          { text: '<i class="fas fa-plus"></i>',
            attr:  {
                title: 'Add history',
                id: 'addButton'
            },  
            name: 'add',
            className: 'btn btn-export6 btn-xs py-1 addbt',
            extend: 'addh'               
          },
          { extend: 'selected', // Bind to Selected row
            text: '<i class="fas fa-edit"></i>',
            attr:  {
                title: 'Edit history',
                id: 'editButton'
            },
            name: 'edit',        // do not change name
            className: 'btn btn-export6 btn-xs py-1 editbt',
            action: function ( e, dt, node, config ) {
              /* alert('test Edit button'); */
              var data = dt.row( '.selected' ).data();

              $('#emoldhistoryid').val(data[0]);
              $('#ehistorymoldcode').val(data[1]);
              $('#ehistoryrequestdate').val(data[2]);
              $('#ehistoryrepairdate').val(data[3]);
              
              $('.sel').select2({ width: '100%' });
              $('#editmoldhistory').modal('show');              
                                                                                
            }
          },
          {
            extend: 'selected', // Bind to Selected row
            text: '<i class="fas fa-trash"></i>',
            attr:  {
                title: 'Delete history',
                id: 'deleteButton'
            },
            name: 'delete',      // do not change name
            className: 'btn btn-export6 btn-xs py-1 delbt',
            
            action: function ( e, dt, node, config ) {               
              

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
                  
                  var data = dt.row( '.selected' ).data();
                  $.ajax(
                    {
                    method:'post',
                    url:'/1_mes/_query/mold_repair/delete_history.php',
                    data:
                    {
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      checkuserauthH();

                      $.notify({
                        icon: 'fas fa-info-circle',
                        title: 'System Notification: ',
                        message: data,
                      },{
                        type:'success',
                        placement:{
                          align: 'center'
                        },           
                        delay: 3000,                        
                      });
                    }
                    });

                }
              })

            }                
          },
          { extend: 'copy', text: '<i class="far fa-copy"></i>', 
          attr:  {
            title: 'Copy to Clipboard',
            id: 'copyButton'
        },
         className: 'btn btn-export6 btn-xs py-1'},
          { extend: 'excel', text: '<i class="fas fa-table"></i>',
          attr:  {
          title: 'Export to Excel',
          id: 'exportButton'
      },
       filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'}
          ],        
          select: 'single',
            "columnDefs": [ {
              "searchable": false,
              "targets": 0
          } ],
          "order": [[ 0, 'desc' ]],        
                               
      } );
      
      
      
      /* ____________________ FUNCTIONS ___________________ */

      tble.on( 'order.dt search.dt processing.dt page.dt', function () {
          tble.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

      /* ____________________________ FUNCTIONS _________________________ */
    }
    
  };
  xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
  xhttp.send();   
  
} 

$.fn.dataTable.ext.buttons.addh = {
  action: 
  function () {
  
    $("#addmoldhistory").modal('show');        
    
  }
};



    /* ------------------------------- TH - A ------------------------------------------------  */



/* ---------------------------- TH ------------------------------ */

function DisplayTbleH(Table_Name,Tablesp,tbltitle) {
  var xhttp;
  if (Table_Name.length == 0) { 
    document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_display").innerHTML = this.responseText;
      var tble = $('#Dtable').DataTable( {
        deferRender:    true,
      scrollY:        '61vh',
      "sScrollX": "100%",
      /* scrollerX:      true, */
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,          
        "ajax": {
          url: "/1_mes/_includes/"+Tablesp+".php",
          type: 'POST'
        },            
        "dom": '<"row"<"col-4"B><"col"><"col-sm-3 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [             
          { extend: 'copy', text: '<i class="far fa-copy"></i>', 
          attr:  {
            title: 'Copy to Clipboard',
            id: 'copyButton'
        },
         className: 'btn btn-export6 btn-xs py-1'},
          { extend: 'excel', text: '<i class="fas fa-table"></i>',
          attr:  {
          title: 'Export to Excel',
          id: 'exportButton'
      },
       filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'}
          ],        
          /* select: 'single', */
            "columnDefs": [ {
              "searchable": false,
              "targets": 0
          } ],
          "order": [[ 0, 'desc' ]],                                  
      } );
            
      
      /* ____________________ FUNCTIONS ___________________ */

      tble.on( 'order.dt search.dt processing.dt page.dt', function () {
          tble.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

      /* ____________________________ FUNCTIONS _________________________ */
    }
    
  };
  xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
  xhttp.send();   
  
} 

$.fn.dataTable.ext.buttons.add1 = {
  action: 
  function () {

    listchange();
    getctrlnumber();    
    $("#addmoldrepairA").modal('show');        
    
  }
};

/* ---------------------------- TH ------------------------------ */


/*  -------------------------------- FABRICATION - A -----------------------------------------------  */
        
function DisplayTbleFA(Table_Name,Tablesp,tbltitle) {
  var xhttp;
  if (Table_Name.length == 0) { 
    document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_display").innerHTML = this.responseText;
      var tble = $('#Dtable').DataTable( {
        deferRender:    true,
      scrollY:        '61vh',
      "sScrollX": "100%",
      /* scrollerX:      true, */
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 100,
        fixedColumns: {
          heightMatch: 'semiauto',
          /* leftColumns: 3 */
        },                  
        "ajax": {
          url: "/1_mes/_includes/"+Tablesp+".php",
          type: 'POST'
        },            
        "dom": '<"row"<"col-sm-3"B><"col"><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [            
          { text: '<i class="fas fa-plus"></i>',
            attr:  {
                title: 'Add fabrication',
                id: 'addButton'
            },  
            name: 'add',
            className: 'btn btn-export6 btn-xs py-1 addbt',
            extend: 'addfab1'               
          },
          { extend: 'selected', // Bind to Selected row
            text: '<i class="fas fa-edit"></i>',
            attr:  {
                title: 'Edit fabrication',
                id: 'editButton'
            },
            name: 'edit',        // do not change name
            className: 'btn btn-export6 btn-xs py-1 editbt',
            action: function ( e, dt, node, config ) {
              /* alert('UNAVAILABLE'); */
              var data = dt.row( '.selected' ).data();                                    
              /* alert( data[1] +" is the ID. " ); */
              /* alert("||"+data[3]+"||"); */              

              $.ajax(
                {
                method:'post',
                url:'/1_mes/_query/mold_repair/getrowfab.php',
                data:
                {
                    'id': data[1],
                    'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);
                  /* alert(val.MANUFACTURE_DATE); */
                  $("#emoldfabricationid").val(val.MOLD_FABRICATION_ID);
                  $("#eordernumber").val(val.ORDER_NO);
                  $("#emanufacturedate").val(val.MANUFACTURE_DATE);
                  $("#emoldfabricationmcode").val(val.MOLD_CODE);
                  $("#ecustomercode").val(val.CUSTOMER_CODE);
                  getcus_name(ecustomercode,ecustomername);
                  $("#ecurrentprocess").val(val.CURRENT_PROCESS);
                  $("#edeliveryplan").val(val.DELIVERY_PLAN);
                  $("#eoperator").val(val.OPERATOR);                  
                  
                  $('.sel').select2({ width: '100%' });
                  $('#emoldfabrication').modal('show');
                }
              });                                      
              
            }
          },
          {
            extend: 'selected', // Bind to Selected row
            text: '<i class="fas fa-trash"></i>',
            attr:  {
                title: 'Delete fabrication',
                id: 'deleteButton'
            },
            name: 'delete',      // do not change name
            className: 'btn btn-export6 btn-xs py-1 delbt',
            
            action: function ( e, dt, node, config ) {               
              
              /* alert('UNAVAILABLE'); */
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
                  
                  var data = dt.row( '.selected' ).data();
                  $.ajax(
                    {
                    method:'post',
                    url:'/1_mes/_query/mold_repair/delete_moldfab.php',
                    data:
                    {
                        'id': data[1],
                        'ajax': true
                    },
                    success: function(data) {
                      checkuserauthF();

                      $.notify({
                        icon: 'fas fa-info-circle',
                        title: 'System Notification: ',
                        message: data,
                      },{
                        type:'success',
                        placement:{
                          align: 'center'
                        },           
                        delay: 3000,                        
                      });
                    }
                    });

                }
              })

            }                
          },          
          { extend: 'copy', text: '<i class="far fa-copy"></i>', 
          attr:  {
            title: 'Copy to Clipboard',
            id: 'copyButton'
        },
         className: 'btn btn-export6 btn-xs py-1'},
          { extend: 'excel', text: '<i class="fas fa-table"></i>',
          attr:  {
          title: 'Export to Excel',
          id: 'exportButton'
      },
       filename: tbltitle, className: 'btn btn-export6 btn-xs py-1',
       exportOptions: {
          columns: '.ex',
          modifier: {
            selected: null
          }
      }
      }
          ],        
          select: 'single',
            "columnDefs": [
              /*  {
              "searchable": false,
              "orderable": false,
              "targets": 1
              }, */
              {
                "data": null,
                "searchable": false,
                "orderable": false,
                render: function ( data, type, row ) {

                  if(row[7]!='FINISHED'){
                    return "<div class='text-center'><button id='change' class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Change</span></button></div>";
                  }
                  else{
                    return "<div class='text-center'><button id='change' class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Process</span></button></div>";
                  }               
                                                                      
                },              
                "targets": 0,
              },
              {
                "data": null,
                "searchable": false,
                "orderable": false,
                render: function ( data, type, row ) {

                  if(row[7]!='FINISHED'){
                    return "<span style='color:orange;font-weight:bold'>" + row[7] + "</span>";
                  }
                  else{
                    return "<span style='color:green;font-weight:bold'>" + row[7] + "</span>";
                  }               
                                                                      
                },              
                "targets": 7,
              },                          
              {
                "createdCell": function (td, cellData, rowData, row, col) {
                
                $(td).html(ltformat($(td).text())); 

              },"targets": 'proc',
            }
        ],
          "order": [[ 1, 'desc' ]],                      
                               
      } );
      
      
      
      /* ____________________ FUNCTIONS ___________________ */

      tble.on( 'order.dt search.dt processing.dt page.dt', function () {
          tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();
      
      $('#Dtable tbody').on( 'click', '#change', function () {
        var data = tble.row( $(this).parents('tr') ).data();


        $.ajax(
          {
          method:'post',
          url:'/1_mes/_query/mold_repair/getrowfab.php',
          data:
          {
              'id': data[1],
              'ajax': true
          },
          success: function(data1) {
            var val = JSON.parse(data1);
            $("#cmoldfabricationid").val(val.MOLD_FABRICATION_ID);            

            $('#leadtime_1').val(ltformatm(val['DESIGN-1'])); $('#operator_1').val(val['DESIGN-1_OPERATOR']);
            $('#leadtime_2').val(ltformatm(val['DESIGN-2'])); $('#operator_2').val(val['DESIGN-2_OPERATOR']);
            $('#leadtime_3').val(ltformatm(val['DESIGN-3'])); $('#operator_3').val(val['DESIGN-3_OPERATOR']);
            $('#leadtime_4').val(ltformatm(val['RADIAL-1'])); $('#operator_4').val(val['RADIAL-1_OPERATOR']);
            $('#leadtime_5').val(ltformatm(val['LATHER-1'])); $('#operator_5').val(val['LATHER-1_OPERATOR']);
            $('#leadtime_6').val(ltformatm(val['BANDSAW'])); $('#operator_6').val(val['BANDSAW_OPERATOR']);
            $('#leadtime_7').val(ltformatm(val['ML'])); $('#operator_7').val(val['ML_OPERATOR']);
            $('#leadtime_8').val(ltformatm(val['GS-1'])); $('#operator_8').val(val['GS-1_OPERATOR']);
            $('#leadtime_9').val(ltformatm(val['GS-2'])); $('#operator_9').val(val['GS-2_OPERATOR']);
            $('#leadtime_10').val(ltformatm(val['HSM'])); $('#operator_10').val(val['HSM_OPERATOR']);
            $('#leadtime_11').val(ltformatm(val['HSM-1'])); $('#operator_11').val(val['HSM-1_OPERATOR']);
            $('#leadtime_12').val(ltformatm(val['HSM-2'])); $('#operator_12').val(val['HSM-2_OPERATOR']);
            $('#leadtime_13').val(ltformatm(val['WEDM'])); $('#operator_13').val(val['WEDM_OPERATOR']);
            $('#leadtime_14').val(ltformatm(val['M-EDM'])); $('#operator_14').val(val['M-EDM_OPERATOR']);
            $('#leadtime_15').val(ltformatm(val['EDM'])); $('#operator_15').val(val['EDM_OPERATOR']);
            $('#leadtime_16').val(ltformatm(val['ASSEMBLE-1'])); $('#operator_16').val(val['ASSEMBLE-1_OPERATOR']);
            $('#leadtime_17').val(ltformatm(val['POLISHING-1'])); $('#operator_17').val(val['POLISHING-1_OPERATOR']);
                         
            $('#ccurrentprocess').val(val.CURRENT_PROCESS);
            $('#cprocessoperator').val(val.OPERATOR);
            $('#prevprocess').val(val.CURRENT_PROCESS);
            $('#prevprocessdatetime').val(val[$('#ccurrentprocess').val()]);

            if(val.CURRENT_PROCESS=="FINISHED"){
              $('#hd1').hide();
              $('#hd2').hide();
              $('#hd3').hide();
            }
            else{
              $('#hd1').show();
              $('#hd2').show();
              $('#hd3').show();
            }

            $('.sel').select2({ width: '100%' });
            $('#changeprocess').modal('show');

          }
        });               
      } );    

      /* ____________________________ FUNCTIONS _________________________ */
    }
    
  };
  xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
  xhttp.send();   
  
} 

$.fn.dataTable.ext.buttons.addfab1 = {
  action: 
  function () {
    /* alert('UNAVAILABLE'); */
    getcus_name(acustomercode,acustomername);    
    $('#aordernumber').val(getordernumber());
    $("#addmoldfabrication").modal('show');        
    
  }
};



    /* ------------------------------- FABRICATION - A ------------------------------------------------  */


    /*  -------------------------------- FABRICATION CHECKER -----------------------------------------------  */
        
    function DisplayTbleFC(Table_Name,Tablesp,tbltitle) {
      var xhttp;
      if (Table_Name.length == 0) { 
        document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
        return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("table_display").innerHTML = this.responseText;
          var tble = $('#Dtable').DataTable( {
            deferRender:    true,
          scrollY:        '61vh',
          "sScrollX": "100%",
          /* scrollerX:      true, */
            "processing": true,
            "serverSide": true,
            "iDisplayLength": 100,
            fixedColumns: {
              heightMatch: 'semiauto',
              /* leftColumns: 3 */
            },                  
            "ajax": {
              url: "/1_mes/_includes/"+Tablesp+".php",
              type: 'POST'
            },            
            "dom": '<"row"<"col-sm-3"B><"col"><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
            'buttons': [            
              { text: '<i class="fas fa-plus"></i>',
                attr:  {
                    title: 'Add fabrication',
                    id: 'addButton'
                },  
                name: 'add',
                className: 'btn btn-export6 btn-xs py-1 addbt',
                extend: 'addfab1'               
              },                                      
              { extend: 'copy', text: '<i class="far fa-copy"></i>', 
              attr:  {
                title: 'Copy to Clipboard',
                id: 'copyButton'
            },
             className: 'btn btn-export6 btn-xs py-1'},
              { extend: 'excel', text: '<i class="fas fa-table"></i>',
              attr:  {
              title: 'Export to Excel',
              id: 'exportButton'
          },
           filename: tbltitle, className: 'btn btn-export6 btn-xs py-1',
           exportOptions: {
              columns: '.ex'
          }
          }
              ],        
              select: 'single',
                "columnDefs": [
                  /*  {
                  "searchable": false,
                  "orderable": false,
                  "targets": 1
                  }, */
                  {
                    "data": null,
                    "searchable": false,
                    "orderable": false,
                    render: function ( data, type, row ) {
    
                      if(row[7]!='FINISHED'){
                        return "<div class='text-center'><button id='change' class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Change</span></button></div>";
                      }
                      else{
                        return "<div class='text-center'><button id='change' class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Process</span></button></div>";
                      }               
                                                                          
                    },              
                    "targets": 0,
                  },
                  {
                    "data": null,
                    "searchable": false,
                    "orderable": false,
                    render: function ( data, type, row ) {
    
                      if(row[7]!='FINISHED'){
                        return "<span style='color:orange;font-weight:bold'>" + row[7] + "</span>";
                      }
                      else{
                        return "<span style='color:green;font-weight:bold'>" + row[7] + "</span>";
                      }               
                                                                          
                    },              
                    "targets": 7,
                  },                          
                  {
                    "createdCell": function (td, cellData, rowData, row, col) {
                    
                    $(td).html(ltformat($(td).text())); 
    
                  },"targets": 'proc',
                }
            ],
              "order": [[ 1, 'desc' ]],                      
                                   
          } );
          
          
          
          /* ____________________ FUNCTIONS ___________________ */
    
          tble.on( 'order.dt search.dt processing.dt page.dt', function () {
              tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                  cell.innerHTML = i+1;
              } );
          } ).draw();
          
          $('#Dtable tbody').on( 'click', '#change', function () {
            var data = tble.row( $(this).parents('tr') ).data();
    
    
            $.ajax(
              {
              method:'post',
              url:'/1_mes/_query/mold_repair/getrowfab.php',
              data:
              {
                  'id': data[1],
                  'ajax': true
              },
              success: function(data1) {
                var val = JSON.parse(data1);
                $("#cmoldfabricationid").val(val.MOLD_FABRICATION_ID);            
    
                $('#leadtime_1').html(ltformat(val['DESIGN-1'])); $('#operator_1').text(val['DESIGN-1_OPERATOR']);
                $('#leadtime_2').html(ltformat(val['DESIGN-2'])); $('#operator_2').text(val['DESIGN-2_OPERATOR']);
                $('#leadtime_3').html(ltformat(val['DESIGN-3'])); $('#operator_3').text(val['DESIGN-3_OPERATOR']);
                $('#leadtime_4').html(ltformat(val['RADIAL-1'])); $('#operator_4').text(val['RADIAL-1_OPERATOR']);
                $('#leadtime_5').html(ltformat(val['LATHER-1'])); $('#operator_5').text(val['LATHER-1_OPERATOR']);
                $('#leadtime_6').html(ltformat(val['BANDSAW'])); $('#operator_6').text(val['BANDSAW_OPERATOR']);
                $('#leadtime_7').html(ltformat(val['ML'])); $('#operator_7').text(val['ML_OPERATOR']);
                $('#leadtime_8').html(ltformat(val['GS-1'])); $('#operator_8').text(val['GS-1_OPERATOR']);
                $('#leadtime_9').html(ltformat(val['GS-2'])); $('#operator_9').text(val['GS-2_OPERATOR']);
                $('#leadtime_10').html(ltformat(val['HSM'])); $('#operator_10').text(val['HSM_OPERATOR']);
                $('#leadtime_11').html(ltformat(val['HSM-1'])); $('#operator_11').text(val['HSM-1_OPERATOR']);
                $('#leadtime_12').html(ltformat(val['HSM-2'])); $('#operator_12').text(val['HSM-2_OPERATOR']);
                $('#leadtime_13').html(ltformat(val['WEDM'])); $('#operator_13').text(val['WEDM_OPERATOR']);
                $('#leadtime_14').html(ltformat(val['M-EDM'])); $('#operator_14').text(val['M-EDM_OPERATOR']);
                $('#leadtime_15').html(ltformat(val['EDM'])); $('#operator_15').text(val['EDM_OPERATOR']);
                $('#leadtime_16').html(ltformat(val['ASSEMBLE-1'])); $('#operator_16').text(val['ASSEMBLE-1_OPERATOR']);
                $('#leadtime_17').html(ltformat(val['POLISHING-1'])); $('#operator_17').text(val['POLISHING-1_OPERATOR']);
                             
                $('#ccurrentprocess').val(val.CURRENT_PROCESS);
                $('#prevprocess').val(val.CURRENT_PROCESS);
                $('#prevprocessdatetime').val(val[$('#ccurrentprocess').val()]);
    
                if(val.CURRENT_PROCESS=="FINISHED"){
                  $('#hd1').hide();
                  $('#hd2').hide();
                  $('#hd3').hide();
                }
                else{
                  $('#hd1').show();
                  $('#hd2').show();
                  $('#hd3').show();
                }
    
                $('.sel').select2({ width: '100%' });
                $('#changeprocess').modal('show');
    
              }
            });               
          } );    
    
          /* ____________________________ FUNCTIONS _________________________ */
        }
        
      };
      xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
      xhttp.send();   
      
    } 
    
    $.fn.dataTable.ext.buttons.addfab1 = {
      action: 
      function () {
        /* alert('UNAVAILABLE'); */
        getcus_name(acustomercode,acustomername);    
        $('#aordernumber').val(getordernumber());
        $("#addmoldfabrication").modal('show');        
        
      }
    };
    /* ------------------------------- FABRICATION CHECKER ------------------------------------------------  */

    /* ------------------------------- OPERATOR ------------------------------------------------  */

    function DisplayTbleO(Table_Name,Tablesp,tbltitle) {
      var xhttp;
      if (Table_Name.length == 0) { 
        document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
        return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("table_display").innerHTML = this.responseText;
          var tble = $('#Dtable').DataTable( { 
            deferRender:    true,
            scrollY:        '61vh',
            "sScrollX": "100%",          
            "processing": true,
            "serverSide": true,
            "iDisplayLength": 100,        
            "ajax": {
              url: "/1_mes/_includes/"+Tablesp+".php",
              type: 'POST'
            },            
            "dom": '<"row"<"col-4"B><"col"><"col-sm-3 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
            'buttons': [            
              { text: '<i class="fas fa-plus"></i>',
                attr:  {
                      title: 'Insert Data',
                      id: 'addButton'
                  }, 
                name: 'add', // do not change name 
                className: 'btn btn-export6 btn-xs py-1',
                extend: 'addopt'                 
              },
              { extend: 'selected', // Bind to Selected row
                text: '<i class="fas fa-edit"></i>',              
                attr:  {
                      title: 'Edit Data',
                      id: 'editButton'
                  },
                name: 'edit',        // do not change name
                className: 'btn btn-export6 btn-xs py-1',
                action: function ( e, dt, node, config ) {
                  /* alert('test Edit button'); */
                  var data = dt.row( '.selected' ).data();                                    
                  /* alert( data[0] +" is the ID. " ); */
    
                  $("#operatorid").attr("value",data[0]);
                  $("#eoperatorname").attr("value",data[1]);
                  
                  $('#eoperatormod').modal('show');
                }
              },
              {
                text: '<i class="fas fa-trash"></i>',              
                attr:  {
                      title: 'Delete Data',
                      id: 'deleteButton'
                  },
                name: 'delete',      // do not change name
                className: 'btn btn-export6 btn-xs py-1',
                extend: 'selected', // Bind to Selected row
                action: function ( e, dt, node, config ) {                  
    
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
                      
                      var data = dt.row( '.selected' ).data();
                  
                      $.ajax(
                        {
                        method:'post',
                        url:'/1_mes/_query/mold_repair/operator/delete.php',
                        data:
                        {
                            'id': data[0],
                            'ajax': true
                        },
                        success: function(data) {
                          checkuserauthO();
                          loadmodal('moldrepairmodal');
    
                          $.notify({
                            icon: 'fas fa-info-circle',
                            title: 'System Notification: ',
                            message: data,
                          },{
                            type:'success',
                            placement:{
                              align: 'center'
                            },           
                            delay: 3000,                        
                          });
                        }
                        });
    
                    }
                  })
    
                }                
              },
              { extend: 'copy', text: '<i class="far fa-copy"></i>', 
              attr:  {
                    title: 'Copy to Clipboard',
                    id: 'copyButton'
                },
                 className: 'btn btn-export6 btn-xs py-1'},
              { extend: 'excel', text: '<i class="fas fa-table"></i>',
              attr:  {
                    title: 'Export to Excel',
                    id: 'exportButton'
                },
                filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'}
              ],          
              select: 'single',
              "columnDefs": [ {              
                "targets": 0
            } ],
                                            
          } );           
          tble.on( 'order.dt search.dt processing.dt page.dt', function () {
            tble.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
        }
      };
      xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
      xhttp.send();       
    }  
    
    $.fn.dataTable.ext.buttons.addopt = {
      action: function () {             
        $("#operatormod").modal('show');
      }
    };


    /* ------------------------------- OPERATOR ------------------------------------------------  */