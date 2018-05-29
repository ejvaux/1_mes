



/* ____________ Table Init ________________ */

function checkuserauth(){
  if(val=="A"){
    DisplayTble('mold_repair_table','mold_repairsp','Mold Repair');
  }
  
  else if(val=="DC"){
    DisplayTbleC('mold_repair_table2','mold_repairsp2','Mold Repair');
  }
  
  else if(val=="DG"){
    DisplayTbleG('mold_repair_table3','mold_repairsp3','Mold Repair');
  }

  else if(val=="DA"){
    DisplayTbleA('mold_repair_table2','mold_repairsp2','Mold Repair');
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

/* Display Table USER A*/
        
function DisplayTble(Table_Name,Tablesp,tbltitle) {
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
                    
                    $('.sel').select2({ width: '100%' });
                    $('#editmoldrepair').modal('show');
                  }
                }); 
                
                /* $("#epmcontrol").attr("value",data[2]);                
                document.getElementById("emcl").value = data[3];    
                elistchange();
                $("#emoldshot").attr("value",data[9]);
                document.getElementById("emachinecode").value = data[9];
                $("#edaterequired").attr("value",data[10]);
                $("#etimerequired").attr("value",data[11]);
                document.getElementById("edefectname").value = data[12];
                document.getElementById("erepairremarks").value = data[13];
                document.getElementById("emoldstatus").value = data[17]; */
                              
                /* $('#editmoldrepair').modal('show'); */                
                
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
                /* if (confirm('Are you sure you want to delete this?')) {
                               
                var data = dt.row( '.selected' ).data();
                $.ajax(
                  {
                  method:'post',
                  url:'/1_mes/_query/mold_repair/delete_mold_repair.php',
                  data:
                  {
                      'id': data[2],
                      'ajax': true
                  },
                  success: function(data) {
                    alert(data);
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
          /* fixedHeader: {
            header: true,
            headerOffset: 122            
            }, */
            select: 'single',
              "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            },
            {
              "data": null,
              render: function ( data, type, row ) {                
                  return "<div class='text-center'><button class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";                                                                
              },              
              "targets": 0,
            },
            {
              "data": null,
              render: function ( data, type, row ) {

                if(row[2]!=null){
                  var second = Date.parse(new Date()) - Date.parse(new Date(row[2]));
                    var seconds = parseInt(second,10)/1000;
                    var ts = seconds;
                    var days = Math.floor(seconds / (3600*24));
                    seconds  -= days*3600*24;
                    var hrs   = Math.floor(seconds / 3600);
                    seconds  -= hrs*3600;
                    var mnts = Math.floor(seconds / 60);
                    seconds  -= mnts*60;
                    var time = days+" day, "+hrs+" hr, "+mnts+" min, "+seconds+" sec";
                    
                    if(row[3]!='FINISHED'){

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
                      var a = Date.parse(new Date(row[19])) - Date.parse(new Date(row[2]));
                      /* return Date.parse(new Date(row[19])); */                      
                      var at = parseInt(a,10)/1000;
                      var tdays = Math.floor(at / (3600*24));
                      at  -= tdays*3600*24;
                      var thrs   = Math.floor(at / 3600);
                      at  -= thrs*3600;
                      var tmnts = Math.floor(at / 60);
                      at  -= tmnts*60;
                      var time = tdays+" day, "+thrs+" hr, "+tmnts+" min, "+at+" sec";
                      return "<span style='color: blue; font-weight: bold;'>( "+time+" )</span>";
                    }
                }
                else{
                  return "<span style='color:blue; font-weight: bold;'>NO DATE</span>";
                }                                   
              },              
              "targets": 2,
            },
           ],
            
            "order": [[ 5, 'desc' ],[ 6, 'desc' ]],
            "createdRow": function ( row, data, index ) {
              if ( data[3] == 'PENDING' ) {
                $('td', row).eq(3).addClass('pending');
              }
              else if(data[3] == 'ON-GOING'){
                $('td', row).eq(3).addClass('ongoing');
              }
              else if(data[3] == 'FINISHED'){
                $('td', row).eq(3).addClass('finished');
              }
             /*  $('td', row).eq(3).addClass('finished'); */
            },
            /* responsive: true */
                                 
        } );
        
        /* $("div.toolbar").html('<h5 style="float: left;">'+ tbltitle +'</h5>'); */
       /*  $("div.dpicker").html('<div style="white-space: nowrap;">Sort date <input type="date" id="min" name="from"> to <input type="date" id="max" name="to"></div>'); */
        
        
        /* ____________________ FUNCTIONS ___________________ */

        tble.on( 'order.dt search.dt', function () {
            tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        $('#Dtable tbody').on( 'click', 'button', function () {
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
  
              $('.sel').select2({ width: '100%' });
              $('#chcklist').modal('show');
            }
          });              
          
      } );
        /* ____________________________ FUNCTIONS _________________________ */
      }
      
    };
    xhttp.open("POST", "/1_mes/_tables/"+Table_Name+".php", true);
    xhttp.send();   
    
  } 
  
  $.fn.dataTable.ext.buttons.add1 = {
    action: 
    function () {
      /* var t = new Date(); */
      /* alert(t.getHours()+":"+t.getMinutes()); */ 
      /* $("#timerequired").attr("value",t.getHours()+":"+t.getMinutes()); */
      listchange();
      getctrlnumber();    
      $("#addmoldrepairA").modal('show');        
      
    }
  };  

      /* Display Table - END */

/* --------------------------- user G ------------------------------------------- */

function DisplayTbleG(Table_Name,Tablesp,tbltitle) {
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
        iDisplayLength: 100,
        scrollCollapse: true,
        fixedColumns: {
            heightMatch: 'semiauto'
        },
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
                render: function ( data, type, row ) {                
                    return "<div class='text-center'><button class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";                                                                
                },              
                "targets": 0,
              },            
              {
                "data": null,
                render: function ( data, type, row ) {

                  if(row[2]!=null){
                    var second = Date.parse(new Date()) - Date.parse(new Date(row[2]));
                    var seconds = parseInt(second,10)/1000;
                    var ts = seconds;
                    var days = Math.floor(seconds / (3600*24));
                    seconds  -= days*3600*24;
                    var hrs   = Math.floor(seconds / 3600);
                    seconds  -= hrs*3600;
                    var mnts = Math.floor(seconds / 60);
                    seconds  -= mnts*60;
                    var time = days+" day, "+hrs+" hr, "+mnts+" min, "+seconds+" sec";
                    
                    if(row[3]!='FINISHED'){

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
                      var a = Date.parse(new Date(row[19])) - Date.parse(new Date(row[2]));
                      /* return Date.parse(new Date(row[19])); */
                      var at = parseInt(a,10)/1000;
                      var tdays = Math.floor(at / (3600*24));
                      at  -= tdays*3600*24;
                      var thrs   = Math.floor(at / 3600);
                      at  -= thrs*3600;
                      var tmnts = Math.floor(at / 60);
                      at  -= tmnts*60;
                      var time = tdays+" day, "+thrs+" hr, "+tmnts+" min, "+at+" sec";
                      return "<span style='color: blue; font-weight: bold;'>( "+time+" )</span>";
                    }                    
                  }
                  else{
                    return "<span style='color:blue; font-weight: bold;'>NO DATE</span>";
                  }                                   
                },              
                "targets": 2,
              },
              
            ],
            "order": [[ 4, 'desc' ],[ 5, 'desc' ]],
            "createdRow": function ( row, data, index ) {
              if ( data[3] == 'PENDING' ) {
                $('td', row).eq(3).addClass('pending');
              }
              else if(data[3] == 'ON-GOING'){
                $('td', row).eq(3).addClass('ongoing');
              }
              else if(data[3] == 'FINISHED'){
                $('td', row).eq(3).addClass('finished');
              }
             /*  $('td', row).eq(3).addClass('finished'); */
          }
          /* responsive: true */
                               
      } );                
      
      /* ____________________ FUNCTIONS ___________________ */
      tble.on( 'order.dt search.dt', function () {
          tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();
      
      $('#Dtable tbody').on( 'click', 'button', function () {
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
        
      } );

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

function DisplayTbleC(Table_Name,Tablesp,tbltitle) {
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
        scrollCollapse: true,
        fixedColumns: {
            heightMatch: 'semiauto'
        },
        /* "ajax": "/1_mes/_includes/"+Tablesp+".php", */
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
          select: 'single',
          "columnDefs": [
              {
                "searchable": false,
                "orderable": false,
                "targets": 1
              },
              {
                "data": null,
                render: function ( data, type, row ) {  
                  
                  if(row[3]=='FINISHED'){
                    return "<div class='text-center'><button class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";
                  }
                  else{

                  }
                    return "<div class='text-center'><button class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Inspect</span></button></div>";                                                           
                },              
                "targets": 0,
              },
              {
                "data": null,
                render: function ( data, type, row ) {

                  if(row[2]!=null){
                    var second = Date.parse(new Date()) - Date.parse(new Date(row[2]));
                    var seconds = parseInt(second,10)/1000;
                    var ts = seconds;
                    var days = Math.floor(seconds / (3600*24));
                    seconds  -= days*3600*24;
                    var hrs   = Math.floor(seconds / 3600);
                    seconds  -= hrs*3600;
                    var mnts = Math.floor(seconds / 60);
                    seconds  -= mnts*60;
                    var time = days+" day, "+hrs+" hr, "+mnts+" min, "+seconds+" sec";
                    
                    if(row[3]!='FINISHED'){

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
                      var a = Date.parse(new Date(row[19])) - Date.parse(new Date(row[2]));
                      /* return Date.parse(new Date(row[19])); */                      
                      var at = parseInt(a,10)/1000;
                      var tdays = Math.floor(at / (3600*24));
                      at  -= tdays*3600*24;
                      var thrs   = Math.floor(at / 3600);
                      at  -= thrs*3600;
                      var tmnts = Math.floor(at / 60);
                      at  -= tmnts*60;
                      var time = tdays+" day, "+thrs+" hr, "+tmnts+" min, "+at+" sec";
                      return "<span style='color: blue; font-weight: bold;'>( "+time+" )</span>";
                    }
                  }
                  else{
                    return "<span style='color:blue; font-weight: bold;'>NO DATE</span>";
                  }                                   
                },              
                "targets": 2,
              },
            ],
            "order": [[ 4, 'desc' ],[ 5, 'desc' ]],
            "createdRow": function ( row, data, index ) {
              if ( data[3] == 'PENDING' ) {
                $('td', row).eq(3).addClass('pending');
              }
              else if(data[3] == 'ON-GOING'){
                $('td', row).eq(3).addClass('ongoing');
              }
              else if(data[3] == 'FINISHED'){
                $('td', row).eq(3).addClass('finished');
              }
             /*  $('td', row).eq(3).addClass('finished'); */
            },           
          /* fixedColumns:   true */
                               
      } );
      
      /* ____________________ FUNCTIONS ___________________ */
      tble.on( 'order.dt search.dt', function () {
          tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

      $('#Dtable tbody').on( 'click', 'button', function () {
        var data = tble.row( $(this).parents('tr') ).data();
        /* var tt =JSON.stringify(data); */
        /* alert(data[5]); */
        /* document.getElementById("chkrepaircontrol").value = data[5]; */

        if(data[3]=='FINISHED'){

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

            $('.sel').select2({ width: '100%' });
            $('#chcklist').modal('show');
          }
        });              
      }
    } ); 
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

function DisplayTbleA(Table_Name,Tablesp,tbltitle) {
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
        scrollCollapse: true,
        fixedColumns: {
            heightMatch: 'semiauto'
        },
        /* "ajax": "/1_mes/_includes/"+Tablesp+".php", */
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
          select: 'single',
          "columnDefs": [
              {
                "searchable": false,
                "orderable": false,
                "targets": 1
              },
              /* {
                "data": null,
                "defaultContent": "<div class='text-center'><button class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:smaller;'>Approve</span></button></div>",
                "targets": 0
              }, */
              {
                "data": null,
                render: function ( data, type, row ) {

                  if ( data[3] == 'PENDING' ) {
                    return "<div class='text-center'><button class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Inspect</span></button></div>";
                  }
                  else if(data[3] == 'ON-GOING'){
                    return "<div class='text-center'><button class='btn btn-export5 py-0 px-1 m-0'><span style='font-size:.8em;'>Approve</span></button></div>";
                  }
                  else {
                    return "<div class='text-center'><button class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";
                  }
                                                    
                },              
                "targets": 0,
              },
              {
                "data": null,
                render: function ( data, type, row ) {

                  if(row[2]!=null){
                    var second = Date.parse(new Date()) - Date.parse(new Date(row[2]));
                    var seconds = parseInt(second,10)/1000;
                    var ts = seconds;
                    var days = Math.floor(seconds / (3600*24));
                    seconds  -= days*3600*24;
                    var hrs   = Math.floor(seconds / 3600);
                    seconds  -= hrs*3600;
                    var mnts = Math.floor(seconds / 60);
                    seconds  -= mnts*60;
                    var time = days+" day, "+hrs+" hr, "+mnts+" min, "+seconds+" sec";
                    
                    if(row[3]!='FINISHED'){

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
                      var a = Date.parse(new Date(row[19])) - Date.parse(new Date(row[2]));
                      /* return Date.parse(new Date(row[19])); */
                      var at = parseInt(a,10)/1000;
                      var tdays = Math.floor(at / (3600*24));
                      at  -= tdays*3600*24;
                      var thrs   = Math.floor(at / 3600);
                      at  -= thrs*3600;
                      var tmnts = Math.floor(at / 60);
                      at  -= tmnts*60;
                      var time = tdays+" day, "+thrs+" hr, "+tmnts+" min, "+at+" sec";
                      return "<span style='color: blue; font-weight: bold;'>( "+time+" )</span>";
                    } 
                  }
                  else{
                    return "<span style='color:blue; font-weight: bold;'>NO DATE</span>";
                  }                                   
                },              
                "targets": 2,
              },
            ],
            "order": [[ 4, 'desc' ],[ 5, 'desc' ]],
            "createdRow": function ( row, data, index ) {
              if ( data[3] == 'PENDING' ) {
                $('td', row).eq(3).addClass('pending');
              }
              else if(data[3] == 'ON-GOING'){
                $('td', row).eq(3).addClass('ongoing');
              }
              else if(data[3] == 'FINISHED'){
                $('td', row).eq(3).addClass('finished');
              }
             /*  $('td', row).eq(3).addClass('finished'); */
            },           
          /* fixedColumns:   true */
                               
      } );
      
      /* ____________________ FUNCTIONS ___________________ */
      tble.on( 'order.dt search.dt', function () {
          tble.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

      $('#Dtable tbody').on( 'click', 'button', function () {
          var data = tble.row( $(this).parents('tr') ).data();
          /* alert(data[5]); */

          if(data[3]=='FINISHED'){

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
  
              $('.sel').select2({ width: '100%' });
              $('#chcklist').modal('show');
            }
          });              
        }
          
      } );
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
        "dom": '<"row"<"col-4"B><"col"><"col-sm-3 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
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
                    'id': data[3],
                    'ajax': true
                },
                success: function(data1) {
                  var val = JSON.parse(data1);                  

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
                        'id': data[2],
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
          /* select: 'single', */
            "columnDefs": [ {
              "searchable": false,
              "orderable": false,
              "targets": 0
          } ],
          "order": [[ 2, 'desc' ],[ 3, 'desc' ]],
          "createdRow": function ( row, data, index ) {
            if ( data[1] == 'PENDING' ) {
              $('td', row).eq(1).addClass('pending');
            }
            else if(data[1] == 'ON-GOING'){
              $('td', row).eq(1).addClass('ongoing');
            }
            else if(data[1] == 'FINISHED'){
              $('td', row).eq(1).addClass('finished');
            }
           /*  $('td', row).eq(3).addClass('finished'); */
          },

                               
      } );
      
      
      
      /* ____________________ FUNCTIONS ___________________ */

      tble.on( 'order.dt search.dt', function () {
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
              "orderable": false,
              "targets": 0
          } ],
          "order": [[ 2, 'desc' ],[ 3, 'desc' ]],                                  
      } );
            
      
      /* ____________________ FUNCTIONS ___________________ */

      tble.on( 'order.dt search.dt', function () {
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