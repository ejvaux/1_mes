
function DisplayTable(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,                
        "ajax": {
          url: "/1_mes/_includes/"+Tablesp+".php",
          type: 'POST'
        },            
        "dom": '<"row"<"col-4"B><"col"><"col-sm-3 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
        'buttons': [            
          { text: 'Add', 
            name: 'add', // do not change name 
            className: 'btn btn-outline-secondary btn-xs py-1',
            extend: 'add0'                 
          },
          { extend: 'selected', // Bind to Selected row
            text: '<i class="fas fa-edit"></i>',              
            attr:  {
                  title: 'Edit Data',
                  id: 'editButton'
              },
            name: 'edit',        // do not change name
            className: 'btn btn-outline-secondary btn-xs py-1',
            action: function ( e, dt, node, config ) {
              alert('test Edit button');
              var data = dt.row( '.selected' ).data();                                    
              alert( data[0] +" is the ID. " );                       
              $('#editmodal').modal('show');
              $('#editmodal').focus();
            }
          },
          {
            
            name: 'delete',      // do not change name
            className: 'btn btn-outline-secondary btn-xs py-1',
            extend: 'selected', // Bind to Selected row
            action: function ( e, dt, node, config ) {
              if (confirm('Are you sure you want to delete this?')) {
              /* alert('test Delete button'); */                  
              var data = dt.row( '.selected' ).data();
              alert(data[0]);             
              }
            }                
          },
          { extend: 'copy', text: '<i class="far fa-copy"></i>', 
          attr:  {
                title: 'Copy to Clipboard',
                id: 'copyButton'
            },
             className: 'btn btn-outline-secondary btn-xs py-1'},
          { extend: 'excel', text: '<i class="fas fa-table"></i>',
          attr:  {
                title: 'Export to Excel',
                id: 'exportButton'
            },
            filename: tbltitle, className: 'btn btn-outline-secondary btn-xs py-1'}
          ],        
          select: 'single',
          "columnDefs": [ {
            /* sortable: false,
            "class": "index",
            "searchable": false,
            "orderable": false, */
            "targets": 0
        } ],
        "order": [[ 0, 'desc' ]]
                                       
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
$.fn.dataTable.ext.buttons.add0 = {
  action: function () {         
    $("#moldlistmod").modal('show');
  }
};
 


/* ______________ MOLD LIST _____________________ */

function DisplayTable1(Table_Name,Tablesp,tbltitle) {
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
          "iDisplayLength": 1000,          
          "ajax": {
            url: "/1_mes/_includes/"+Tablesp+".php",
            type: 'POST'
          },
          "createdRow": function( row, data){
            if(data[13] != null){
              if(data[13].match(/.*RUNNING OGS.*/) || data[13].match(/.*FOR SCRAP.*/)){
                  $(row).addClass('ogs');
                  /* $(row).text(data[13]); */
              }
            }            
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
              extend: 'add1'                 
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

                $.ajax(
                  {
                  method:'post',
                  url:'/1_mes/database/table_handler/master/moldlistHandler.php',
                  data:
                  {
                    'action': 'select',
                    'id': data[0],
                    'ajax': true
                  },
                  success: function(data1) {
                    var val = JSON.parse(data1);

                    $("#idmoldlist").val(val['MOLD_ID']);
                    $("#emoldcode").val(val['MOLD_CODE']);
                    $("#etoolnumber").val(val['TOOL_NUMBER']);
                    $("#eitemcode").val(val['ITEM_CODE']);
                    $("#eitemname").val("");
                    $("#ecustomercode").val(val['CUSTOMER_CODE']);
                    $("#ecustomername").val("");
                    $("#eapprovaldate").val(val['APPROVAL_DATE']);
                    $("#edrawingrevision").val(val['DRAWING_REVISION']);
                    $("#eguaranteeshot").val(val['GUARANTEE_SHOT']);
                    $("#emoldshot").val(val['MOLD_SHOT']);
                    $("#ecavity").val(val['CAVITY']);
                    $("#emoldremarks").val(val['MOLD_REMARKS']);
                    $("#eassetnumber").val(val['ASSET_NUMBER']);
                    $("#etransferdate").val(val['TRANSFER_DATE']);
                    $("#emoldmodel").val(val['MOLD_MODEL']);
                    $("#emoldmaker").val(val['MOLD_MAKER']);
                    $("#emoldcategory").val(val['MOLD_CATEGORY']);
                    
                    getitemname('eitemcode',eitemname);
                    getcustomername('ecustomercode',ecustomername);
                    $('.sel').select2({ width: '100%' });
                    $('#emoldlistmod').modal('show');                   
        
                  }
                });                
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
                      url:'/1_mes/database/table_handler/master/moldlistHandler.php',
                      data:
                      {
                        'action':'delete',
                        'id': data[0],
                        'ajax': true
                      },
                      success: function(data) {
                        /* alert(data); */

                        if(data==true){
                          DisplayTable1('mold_table','moldsp','Mold List');
                          loadmodal('masterdatamodal');

                          $.notify({
                            icon: 'fas fa-info-circle',
                            title: 'System Notification: ',
                            message: 'Record deleted successfully!',
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
            },              
        ],
        "order": [[ 0, 'desc' ]]
                                           
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
  
  $.fn.dataTable.ext.buttons.add1 = {
    action: function () {  
      getitemname('itemcode',itemname);
      getcustomername('amcustomercode',amcustomername);
      $("#moldlistmod").modal('show');
    }
  };

/* ______________ MOLD LIST _____________________ */


/* ______________ CUSTOMER _____________________ */

function DisplayTable2(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,        
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
            extend: 'add2'                 
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
              var data = dt.row( '.selected' ).data();
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/database/table_handler/master/customerHandler.php',
                data:
                {
                  'action': 'select',
                  'id': data[0],
                  'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);

                  $("#idcustomer").val(val['CUSTOMER_ID']);
                  $("#eccustomercode").val(val['CUSTOMER_CODE']);
                  $("#eccustomerinitial").val(val['CUSTOMER_INITIAL']);
                  $("#ecdivisioncode").val(val['DIVISION_CODE']);
                  $("#eccustomername").val(val['CUSTOMER_NAME']);
                  $("#ecgroupcode").val(val['GROUP_CODE']);

                  $('.sel').select2({ width: '100%' });  
                  $('#ecustomermod').modal('show');                                   
      
                }
              });                   
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
                    url:'/1_mes/database/table_handler/master/customerHandler.php',
                    data:
                    {
                      'action':'delete',
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      /* alert(data); */

                      if(data==true){
                        DisplayTable2('customer_table','customersp','Customer List');
                        loadmodal('masterdatamodal');
      
                        $.notify({
                          icon: 'fas fa-info-circle',
                          title: 'System Notification: ',
                          message: 'Record deleted successfully!',
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
        "order": [[ 0, 'desc' ]]
                                     
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

$.fn.dataTable.ext.buttons.add2 = {
  action: function () {        
    $("#customermod").modal('show');
  }
};

/* ______________ CUSTOMER _____________________ */



/* ______________ ITEM LIST _____________________ */

function DisplayTable3(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,        
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
            extend: 'add3'                 
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
              var data = dt.row( '.selected' ).data();

              $.ajax(
                {
                method:'post',
                url:'/1_mes/database/table_handler/master/itemHandler.php',
                data:
                {
                  'action': 'select',
                  'id': data[0],
                  'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);

                  $("#iditem").val(val['ITEM_ID']);
                  $("#eiitemcode").val(val['ITEM_CODE']);
                  $("#eidivisioncode").val(val['DIVISION_CODE']);
                  $("#eicustomercode").val(val['CUSTOMER_CODE']);
                  $("#eicustomername").val('');
                  $("#eibarcode").val(val['BARCODE']);
                  $("#eiitemname").val(val['ITEM_NAME']);
                  $("#eimodel").val(val['MODEL']);
                  $("#eiitemprintcode").val(val['ITEM_PRINTCODE']);
                  $("#eigroupcode").val(val['GROUP_CODE']);
                  $("#eipackqty").val(val['PACK_QTY']);
                  $("#eidanplaqty").val(val['DANPLA_QTY']);
                  $("#eilabeltype").val(val['LABEL_TYPE']);
                  $("#eidescription").val(val['DESCRIPTION']);
                  $("#eiresin").val(val['RESIN']);
                  $("#eepsonprodname").val(val['EPSON_PRODUCTNAME']);
                  
                  $('.sel').select2({ width: '100%' });
                  $('#eitemmod').modal('show');
                  getcustomername('eicustomercode',eicustomername);
      
                }
              });                          
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
                    url:'/1_mes/database/table_handler/master/itemHandler.php',
                    data:
                    {
                      'action':'delete',
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      /* alert(data); */
                      if(data==true){
                        DisplayTable3('item_list_table','item_listsp','Item List');
                        loadmodal('masterdatamodal');

                        $.notify({
                          icon: 'fas fa-info-circle',
                          title: 'System Notification: ',
                          message: 'Record deleted successfully!',
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
        "order": [[ 0, 'desc' ]]
                                        
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

$.fn.dataTable.ext.buttons.add3 = {
  action: function () { 
    getcustomername('aicustomercode',aicustomername);            
    $("#itemmod").modal('show');
  }
};

/* ______________ ITEM LIST _____________________ */



/* ______________ MACHINE LIST _____________________ */

function DisplayTable4(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,        
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
            extend: 'add4'                 
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
              var data = dt.row( '.selected' ).data();      
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/database/table_handler/master/machineHandler.php',
                data:
                {
                  'action': 'select',
                  'id': data[0],
                  'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);

                  $("#idmachine").val(val['MACHINE_ID']);
                  $("#emmachinecode").val(val['MACHINE_CODE']);
                  $("#emmachinemaker").val(val['MACHINE_MAKER']);
                  $("#emtonnage").val(val['TONNAGE']);
                  $("#emmachinegroup").val(val['MACHINE_GROUP']);
                  $("#emassetnumber").val(val['ASSET_NUMBER']);
                  
                  $('.sel').select2({ width: '100%' });
                  $('#emachinemod').modal('show');
      
                }
              });              
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
                  url:'/1_mes/database/table_handler/master/machineHandler.php',
                  data:
                  {
                    'action':'delete',
                      'id': data[0],
                      'ajax': true
                  },
                  success: function(data) {
                    /* alert(data); */
                    if(data==true){
                      DisplayTable4('machine_list_table','machine_listsp','Machine List');
                      loadmodal('masterdatamodal');

                      $.notify({
                        icon: 'fas fa-info-circle',
                        title: 'System Notification: ',
                        message: 'Record deleted successfully!',
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
        "order": [[ 0, 'desc' ]]
                                        
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

$.fn.dataTable.ext.buttons.add4 = {
  action: function () {             
    $("#machinemod").modal('show');
  }
};

/* ______________ MACHINE LIST _____________________ */



/* ______________ DEFECT CODE _____________________ */

function DisplayTable5(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,        
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
            extend: 'add5'                 
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
              var data = dt.row( '.selected' ).data();
              
                $.ajax(
                {
                method:'post',
                url:'/1_mes/database/table_handler/master/defectHandler.php',
                data:
                {
                  'action': 'select',
                  'id': data[0],
                  'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);

                  $("#iddefect").val(val['DEFECT_ID']);
                  $("#eddefectcode").val(val['DEFECT_CODE']);
                  $("#eddivisioncode").val(val['DIVISION_CODE']);
                  $("#eddefectgroup").val(val['DEFECT_GROUP']);
                  $("#eddefectname").val(val['DEFECT_NAME']);
                  
                  $('.sel').select2({ width: '100%' });
                  $('#edefectmod').modal('show');
      
                }
              });                          
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
                    url:'/1_mes/database/table_handler/master/defectHandler.php',
                    data:
                    {
                      'action':'delete',
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      
                      if(data==true){
                        DisplayTable5('defect_code_table','defect_codesp','Defect Code');
                        loadmodal('masterdatamodal');

                        $.notify({
                          icon: 'fas fa-info-circle',
                          title: 'System Notification: ',
                          message: 'Record deleted successfully!',
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
        "order": [[ 0, 'desc' ]]
                                        
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

$.fn.dataTable.ext.buttons.add5 = {
  action: function () {             
    $("#defectmod").modal('show');
  }
};

/* ______________ DEFECT CODE _____________________ */



/* ______________ USER INFO LIST _____________________ */

function DisplayTable6(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,        
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
            extend: 'add6'                 
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
              var data = dt.row( '.selected' ).data();
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/database/table_handler/master/userinfoHandler.php',
                data:
                {
                  'action': 'select',
                  'id': data[0],
                  'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);
                  $("#iduserinfo").val(val['NO']);
                  $("#euuserid").val(val['USER_ID']);
                  $("#euusername").val(val['USER_NAME']);
                  $("#euemailaddress").val(val['EMAIL_ADDRESS']);
                  $("#euuserauthority").val(val['USER_AUTHORITY']);
                  
                  $('.sel').select2({ width: '100%' });
                  $('#euserinfomod').modal('show');
      
                }
              });
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
                    url:'/1_mes/database/table_handler/master/userinfoHandler.php',
                    data:
                    {
                      'action':'select',
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data1) {
                      var val = JSON.parse(data1);
                      /* alert(usrname); */
                      if(val['USER_ID']==usrname){
                        swal(
                          'WARNING!',
                          'Deleting the logged account is prohibited',
                          'warning'
                        )
                      }
                      else{
                        $.ajax(
                          {
                          method:'post',
                          url:'/1_mes/database/table_handler/master/userinfoHandler.php',
                          data:
                          {
                            'action':'delete',
                              'id': data[0],
                              'ajax': true
                          },
                          success: function(data2) {
                            if(data2==true){
                              DisplayTable6('user_info_table','user_infosp','User Information');
                              loadmodal('masterdatamodal');
                              
                              $.notify({
                                icon: 'fas fa-info-circle',
                                title: 'System Notification: ',
                                message: 'Record deleted successfully!',
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
                      }
                      
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
        "order": [[ 0, 'desc' ]]
                                        
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

$.fn.dataTable.ext.buttons.add6 = {
  action: function () {             
    $("#userinfomod").modal('show');
  }
};

/* ______________ USER INFO LIST _____________________ */


/* ______________ USER AUTH LIST _____________________ */

function DisplayTable7(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,        
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
            extend: 'add7'                 
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
              var data = dt.row( '.selected' ).data();

              $.ajax(
                {
                method:'post',
                url:'/1_mes/database/table_handler/master/userauthHandler.php',
                data:
                {
                  'action': 'select',
                  'id': data[0],
                  'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);

                  $("#iduserauth").val(val['AUTHORITY_ID']);
                  $("#eaauthoritycode").val(val['AUTHORITY_CODE']);
                  $("#eauserauthority").val(val['USER_AUTHORITY']);
                  
                  $('.sel').select2({ width: '100%' });
                  $('#euserauthmod').modal('show');                                 
      
                }
              });                          
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
                    url:'/1_mes/database/table_handler/master/userauthHandler.php',
                    data:
                    {
                      'action':'delete',
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      if(data==true){
                        DisplayTable7('user_auth_table','user_authsp','User Authority');
                        loadmodal('masterdatamodal');

                        $.notify({
                          icon: 'fas fa-info-circle',
                          title: 'System Notification: ',
                          message: 'Record deleted successfully!',
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
        "order": [[ 1, 'asc' ]],
                                        
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

$.fn.dataTable.ext.buttons.add7 = {
  action: function () {             
    $("#userauthmod").modal('show');
  }
};

/* ______________ USER AUTH LIST _____________________ */


/* ______________ DIVISION CODE LIST _____________________ */

function DisplayTable8(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,        
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
            extend: 'add8'                 
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
              var data = dt.row( '.selected' ).data();
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/database/table_handler/master/divisionHandler.php',
                data:
                {
                  'action': 'select',
                  'id': data[0],
                  'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);

                  $("#iddivcode").val(val['DIVISION_ID']);
                  $("#eddivisioncode1").val(val['DIVISION_CODE']);
                  $("#eddivisionname").val(val['DIVISION_NAME']);
                  $('#edsapcode').val(val['SAP_DIVISION_CODE']);
                  
                  $('.sel').select2({ width: '100%' });
                  $('#edivcodemod').modal('show');                         
      
                }
              });              
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
                    url:'/1_mes/database/table_handler/master/divisionHandler.php',
                    data:
                    {
                      'action':'delete',
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      if(data==true){
                        DisplayTable8('division_code_table','division_codesp','Division Code');
                        loadmodal('masterdatamodal');

                        $.notify({
                          icon: 'fas fa-info-circle',
                          title: 'System Notification: ',
                          message: 'Record deleted successfully!',
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
        "order": [[ 0, 'desc' ]]
                                        
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

$.fn.dataTable.ext.buttons.add8 = {
  action: function () {             
    $("#divcodemod").modal('show');
  }
};

/* ______________ DIVISION CODE LIST _____________________ */
   


/* ______________ EMPLOYEE LIST _____________________ */

function DisplayTable9(Table_Name,Tablesp,tbltitle) {
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
        "iDisplayLength": 1000,        
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
            extend: 'add9'                 
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
              var data = dt.row( '.selected' ).data();     

              $.ajax(
                {
                method:'post',
                url:'/1_mes/database/table_handler/master/employeeHandler.php',
                data:
                {
                  'action': 'select',
                  'id': data[0],
                  'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);

                  $("#employeeid").val(val['EMPLOYEE_ID']);
                  $("#eemployeecode").val(val['EMPLOYEE_CODE']);
                  $("#eemployeename").val(val['EMPLOYEE_NAME']);
                  $('#eemployeestatus').val(val['EMPLOYEE_STATUS']);
                  $('#edatehired').val(val['DATE_HIRED']);
                  $('#eemdivision').val(val['DIVISION']);
                  
                  $('#eemployeemod').modal('show');                      
      
                }
              });              
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
                    url:'/1_mes/database/table_handler/master/employeeHandler.php',
                    data:
                    {
                      'action':'delete',
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      if(data==true){
                        DisplayTable9('employee_table','employeesp','Employee List');
                        loadmodal('masterdatamodal');

                        $.notify({
                          icon: 'fas fa-info-circle',
                          title: 'System Notification: ',
                          message: 'Record deleted successfully!',
                        },{
                          type:'success',
                          placement:{
                            align: 'center'
                          },           
                          delay: 3000,                        
                        });
                      }
                      else{
                        alert(alert);
                      }
                      
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
        "order": [[ 0, 'desc' ]]
                                        
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

$.fn.dataTable.ext.buttons.add9 = {
  action: function () {
    getemployeecode(employeecode);       
    $("#employeemod").modal('show');
  }
};

/* ______________ EMPLOYEE LIST _____________________ */