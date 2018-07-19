function DisplayTable_brep(Table_Name,Tablesp,tbltitle,startdate,enddate) {
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
          scrollY:        '52vh',
          "sScrollX": "100%",          
          "processing": true,
          "serverSide": true,
          "iDisplayLength": 1000,                
          "ajax": {
            url: "/1_mes/_includes/"+Tablesp+".php",
            type: 'POST',
            data: {
              "sday": startdate,
              "eday": enddate
            }
          },            
          "dom": 't<"row"<"col"i><"col"p>>',
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
            /* select: 'single', */
            "columnDefs": [ {
              /* sortable: false,
              "class": "index",
              "searchable": false,
              "orderable": false, */
              "targets": 0
            },
            {
              "data": null,
              "searchable": false,
              "orderable": false,
              render: function ( data, type, row ) {                
                
                return  "<div class='text-center'><button id='showmsg' class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Show Message</span></button></div>";                                                           
              },              
              "targets": 1,
            }
            ],
            "order": [[ 0, 'desc' ]]
                                         
        } );         
             
        tble.on( 'order.dt search.dt processing.dt page.dt', function () {
          tble.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

      $('#Dtable tbody').on( 'click', '#showmsg', function () {
        var data = tble.row( $(this).parents('tr') ).data();
        
        $.ajax(
          {
          method:'post',
          url:'/1_mes/database/table_handler/admin/bugreportsHandler.php',
          data:
          {
            'action': 'select',
            'id': data[0],
            'ajax': true
          },
          success: function(data1) {
            var val = JSON.parse(data1);
            
            $('#reportmsg').html(val['r_message']);
            
            $('#reportmsgmod').modal('show');
          }
        });              
        
      } );
      var edt = enddate.substring(0,10);
      if(startdate==edt){
        edt = '';
      }

      $('#min').val(startdate);
      $('#max').val(edt);

      $('#min, #max').on('change',function(){
        var sdate = $('#min').val();
        var edate = $('#max').val();

        if(moment(sdate,'YYYY-MM-DD').isValid() && moment(edate,'YYYY-MM-DD').isValid()){
          
          if(sdate == edate){
            edate = edate +" 23:59:59";             
          }
          else{            
            edate = edate +" 23:59:59";
          }                    
        }
        else if(moment(sdate,'YYYY-MM-DD').isValid() && edate==''){

          edate = sdate +" 23:59:59";            
        }
        DisplayTable_brep('bugreport_table','bugreportsp','Bug Reports',sdate,edate);
        /* alert('test'); */        
      });

      $('#refresh').on('click',function(){
        var dtdt =moment(Date()).format('YYYY-MM-DD');
        var dtdt2 = dtdt +" 23:59:59";
        DisplayTable_brep('bugreport_table','bugreportsp','Bug Reports',dtdt,dtdt2);
      });

      var dt = new Date();
      dt.setMonth(dt.getMonth() - 1);
      dt.setDate(1);
      var dta = moment(dt).format('YYYY-MM-DD');
      $('#min, #max').attr('min',dta);

      /* ____________ functions ___________________ */
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