
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
        "iDisplayLength": 100,                
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

                $("#idmoldlist").attr("value",data[0]);
                $("#emoldcode").attr("value",data[1]);
                $("#etoolnumber").attr("value",data[2]);
                $("#eitemcode").val(data[3]);
                $("#eitemname").val("");
                $("#ecustomercode").val(data[5]);
                $("#ecustomername").val("");
                $("#eapprovaldate").attr("value",data[7]);
                $("#edrawingrevision").attr("value",data[8]);
                $("#eguaranteeshot").attr("value",data[9]);
                $("#emoldshot").attr("value",data[10]);
                $("#ecavity").attr("value",data[11]);
                $("#emoldremarks").attr("value",data[12]);
                $("#eassetnumber").attr("value",data[13]);
                $("#etransferdate").attr("value",data[18]);

                $('.sel').select2({ width: '100%' });
                $('#emoldlistmod').modal('show');
                getitemname('edit','eitemcode');
                getcustomername('edit','ecustomercode');
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
                /* if (confirm('Are you sure you want to delete this?')) {
                alert('test Delete button');                  
                var data = dt.row( '.selected' ).data();
                alert(data[0]);
                
                $.ajax(
                  {
                  method:'post',
                  url:'/1_mes/_query/master_database/mold/delete.php',
                  data:
                  {
                      'id': data[0],
                      'ajax': true
                  },
                  success: function(data) {
                    alert(data);
                    DisplayTable1('mold_table','moldsp','Mold List');
                    loadmodal('masterdatamodal');
                    
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
                } */
                
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
                      url:'/1_mes/_query/master_database/mold/delete.php',
                      data:
                      {
                          'id': data[0],
                          'ajax': true
                      },
                      success: function(data) {
                        /* alert(data); */
                        DisplayTable1('mold_table','moldsp','Mold List');
                        loadmodal('masterdatamodal');                        
                        
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
  
  $.fn.dataTable.ext.buttons.add1 = {
    action: function () {  
      getitemname('add','itemcode');
      getcustomername('add','amcustomercode');         
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
              /* alert('test Edit button'); */
              var data = dt.row( '.selected' ).data();                                    
              /* alert( data[0] +" is the ID. " ); */
              
              $("#idcustomer").attr("value",data[0]);
              $("#eccustomercode").attr("value",data[1]);
              $("#eccustomerinitial").attr("value",data[2]);
              $("#ecdivisioncode").val(data[3]);
              $("#eccustomername").val(data[4]);
              $("#ecgroupcode").attr("value",data[5]);

              $('.sel').select2({ width: '100%' });  
              $('#ecustomermod').modal('show');
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
              /* if (confirm('Are you sure you want to delete this?')) {              
              var data = dt.row( '.selected' ).data();

              $.ajax(
                {
                method:'post',
                url:'/1_mes/_query/master_database/customer/delete.php',
                data:
                {
                    'id': data[0],
                    'ajax': true
                },
                success: function(data) {
                  DisplayTable2('customer_table','customersp','Customer List');
                  loadmodal('masterdatamodal');

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
              } */

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
                    url:'/1_mes/_query/master_database/customer/delete.php',
                    data:
                    {
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      /* alert(data); */
                      DisplayTable2('customer_table','customersp','Customer List');
                      loadmodal('masterdatamodal');
    
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
              /* alert('test Edit button'); */
              var data = dt.row( '.selected' ).data();                                    
              /* alert( data[0] +" is the ID. " ); */ 
              
              $("#iditem").attr("value",data[0]);
              $("#eiitemcode").attr("value",data[1]);
              $("#eidivisioncode").val(data[2]);
              $("#eicustomercode").val(data[3]);
              $("#eicustomername").val('');
              $("#eibarcode").attr("value",data[5]);
              $("#eiitemname").val(data[6]);
              $("#eimodel").attr("value",data[7]);
              $("#eiitemprintcode").attr("value",data[8]);
              $("#eigroupcode").attr("value",data[9]);
              $("#eidescription").attr("value",data[10]);
              
              $('.sel').select2({ width: '100%' });
              $('#eitemmod').modal('show');
              getcustomername('edit','eicustomercode');
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
              /* if (confirm('Are you sure you want to delete this?')) {                            
              var data = dt.row( '.selected' ).data();                   
              $.ajax(
                {
                method:'post',
                url:'/1_mes/_query/master_database/item/delete.php',
                data:
                {
                    'id': data[0],
                    'ajax': true
                },
                success: function(data) {
                  DisplayTable3('item_list_table','item_listsp','Item List');
                  loadmodal('masterdatamodal');

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
              } */

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
                    url:'/1_mes/_query/master_database/item/delete.php',
                    data:
                    {
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      /* alert(data); */
                      DisplayTable3('item_list_table','item_listsp','Item List');
                      loadmodal('masterdatamodal');

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

$.fn.dataTable.ext.buttons.add3 = {
  action: function () { 
    getcustomername('add','aicustomercode');            
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
              /* alert('test Edit button'); */
              var data = dt.row( '.selected' ).data();                                    
              /* alert( data[0] +" is the ID. " ); */
              
              $("#idmachine").attr("value",data[0]);
              $("#emmachinecode").attr("value",data[1]);
              $("#emmachinemaker").attr("value",data[2]);
              $("#emtonnage").attr("value",data[3]);
              $("#emmachinegroup").attr("value",data[4]);
              $("#emassetnumber").attr("value",data[5]);
              
              $('.sel').select2({ width: '100%' });
              $('#emachinemod').modal('show');
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
              /* if (confirm('Are you sure you want to delete this?')) {
                           
              var data = dt.row( '.selected' ).data();
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/_query/master_database/machine/delete.php',
                data:
                {
                    'id': data[0],
                    'ajax': true
                },
                success: function(data) {
                  alert(data);
                  DisplayTable4('machine_list_table','machine_listsp','Machine List');
                  loadmodal('masterdatamodal');

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
              } */

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
                  url:'/1_mes/_query/master_database/machine/delete.php',
                  data:
                  {
                      'id': data[0],
                      'ajax': true
                  },
                  success: function(data) {
                    /* alert(data); */
                    DisplayTable4('machine_list_table','machine_listsp','Machine List');
                    loadmodal('masterdatamodal');

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
              /* alert('test Edit button'); */
              var data = dt.row( '.selected' ).data();                                    
              /* alert( data[0] +" is the ID. " ); */
              
              $("#iddefect").attr("value",data[0]);
              $("#eddefectcode").attr("value",data[1]);
              $("#eddivisioncode").val(data[2]);
              $("#eddefectgroup").attr("value",data[3]);
              $("#eddefectname").attr("value",data[4]);
              
              $('.sel').select2({ width: '100%' });
              $('#edefectmod').modal('show');
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
              /* if (confirm('Are you sure you want to delete this?')) {         
              var data = dt.row( '.selected' ).data();
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/_query/master_database/defect/delete.php',
                data:
                {
                    'id': data[0],
                    'ajax': true
                },
                success: function(data) {
                  
                  DisplayTable5('defect_code_table','defect_codesp','Defect Code');
                  loadmodal('masterdatamodal');

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
              } */

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
                    url:'/1_mes/_query/master_database/defect/delete.php',
                    data:
                    {
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      
                      DisplayTable5('defect_code_table','defect_codesp','Defect Code');
                      loadmodal('masterdatamodal');

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
              /* alert('test Edit button'); */
              var data = dt.row( '.selected' ).data();                                    
              /* alert( data[0] +" is the ID. " ); */

              $("#iduserinfo").attr("value",data[0]);
              $("#euuserid").attr("value",data[1]);
              $("#euusername").attr("value",data[2]);
              $("#euemailaddress").attr("value",data[3]);
              $("#euuserauthority").val(data[4]);
              
              $('.sel').select2({ width: '100%' });
              $('#euserinfomod').modal('show');

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
              /* if (confirm('Are you sure you want to delete this?')) {           
              var data = dt.row( '.selected' ).data();
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/_query/master_database/userinfo/delete.php',
                data:
                {
                    'id': data[0],
                    'ajax': true
                },
                success: function(data) {
                  DisplayTable6('user_info_table','user_infosp','User Information');
                  loadmodal('masterdatamodal');
                  
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
              } */

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
                    url:'/1_mes/_query/master_database/userinfo/delete.php',
                    data:
                    {
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      DisplayTable6('user_info_table','user_infosp','User Information');
                      loadmodal('masterdatamodal');
                      
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
              /* alert('test Edit button'); */
              var data = dt.row( '.selected' ).data();                                    
              /* alert( data[0] +" is the ID. " );  */
              
              $("#iduserauth").attr("value",data[0]);
              $("#eaauthoritycode").attr("value",data[1]);
              $("#eauserauthority").attr("value",data[2]);
              
              $('.sel').select2({ width: '100%' });
              $('#euserauthmod').modal('show');
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
              /* if (confirm('Are you sure you want to delete this?')) {             
              var data = dt.row( '.selected' ).data();
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/_query/master_database/userauth/delete.php',
                data:
                {
                    'id': data[0],
                    'ajax': true
                },
                success: function(data) {
                  DisplayTable7('user_auth_table','user_authsp','User Authority');
                  loadmodal('masterdatamodal');

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
              } */

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
                    url:'/1_mes/_query/master_database/userauth/delete.php',
                    data:
                    {
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      DisplayTable7('user_auth_table','user_authsp','User Authority');
                      loadmodal('masterdatamodal');

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
              /* alert('test Edit button'); */
              var data = dt.row( '.selected' ).data();                                    
              /* alert( data[0] +" is the ID. " ); */

              $("#iddivcode").attr("value",data[0]);
              $("#eddivisioncode1").attr("value",data[1]);
              $("#eddivisionname").attr("value",data[2]);
              $('#edsapcode').val(data[3]);
              
              $('.sel').select2({ width: '100%' });
              $('#edivcodemod').modal('show');
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
              /* if (confirm('Are you sure you want to delete this?')) {             
              var data = dt.row( '.selected' ).data();
              
              $.ajax(
                {
                method:'post',
                url:'/1_mes/_query/master_database/divcode/delete.php',
                data:
                {
                    'id': data[0],
                    'ajax': true
                },
                success: function(data) {
                  DisplayTable8('division_code_table','division_codesp','Division Code');
                  loadmodal('masterdatamodal');

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
              } */

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
                    url:'/1_mes/_query/master_database/divcode/delete.php',
                    data:
                    {
                        'id': data[0],
                        'ajax': true
                    },
                    success: function(data) {
                      DisplayTable8('division_code_table','division_codesp','Division Code');
                      loadmodal('masterdatamodal');

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

$.fn.dataTable.ext.buttons.add8 = {
  action: function () {             
    $("#divcodemod").modal('show');
  }
};

/* ______________ DIVISION CODE LIST _____________________ */
   