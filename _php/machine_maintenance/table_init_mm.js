
/* ____________ Table Init ________________ */

function checkuserauth(){
    if(val=="A"){
      DisplayTableA('machine_table','machine_pmsp','Machine PM');
    }
    
    /* else if(val=="DC"){
      DisplayTbleC('mold_repair_table2','mold_repairsp2','Mold Repair');
    }
    
    else if(val=="DG"){
      DisplayTbleG('mold_repair_table3','mold_repairsp3','Mold Repair');
    }
  
    else if(val=="DA"){
      DisplayTbleA('mold_repair_table2','mold_repairsp2','Mold Repair');
    } */
  }              
  /* _______________ Table Init ______________ */

/* Display Table USER A*/
        
function DisplayTableA(Table_Name,Tablesp,tbltitle) {
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
                  title: 'Add Request',
                  id: 'addButton'
              },  
              name: 'add',
              className: 'btn btn-export6 btn-xs py-1 addbt',
              extend: 'add0'               
            },
            { 
            extend: 'selected', // Bind to Selected row
            text: '<i class="fas fa-edit"></i>',
            attr:  {
                title: 'Edit Request',
                id: 'editButton'
            },
            name: 'edit',        // do not change name
            className: 'btn btn-export6 btn-xs py-1 editbt',
              action: function ( e, dt, node, config ) {
                alert('test Edit button');
                var data = dt.row( '.selected' ).data();                                    
                alert( data[0] +" is the ID. " );                       
                /* $('#editmodal').modal('show');
                $('#editmodal').focus(); */
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
              /* "searchable": false,
              "orderable": false, */
              "targets": 0
          } ],
          "order": [[ 0, 'desc' ]]
                                         
        } );         
             
        tble.on( 'order.dt search.dt', function () {
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

      /* Display Table - END */



/* Display Table History A*/
        
function DisplayTableHA(Table_Name,Tablesp,tbltitle) {
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
                  title: 'Add Request',
                  id: 'addButton'
              },  
              name: 'add',
              className: 'btn btn-export6 btn-xs py-1 addbt',
              extend: 'add0'               
            },
            { 
            extend: 'selected', // Bind to Selected row
            text: '<i class="fas fa-edit"></i>',
            attr:  {
                title: 'Edit Request',
                id: 'editButton'
            },
            name: 'edit',        // do not change name
            className: 'btn btn-export6 btn-xs py-1 editbt',
              action: function ( e, dt, node, config ) {
                alert('test Edit button');
                var data = dt.row( '.selected' ).data();                                    
                alert( data[0] +" is the ID. " );                       
                /* $('#editmodal').modal('show');
                $('#editmodal').focus(); */
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
              /* "searchable": false,
              "orderable": false, */
              "targets": 0
          } ],
          "order": [[ 0, 'desc' ]]
                                         
        } );         
             
        tble.on( 'order.dt search.dt', function () {
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

      /* Display Table - END */