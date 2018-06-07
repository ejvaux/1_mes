function DisplayTble(Table_Name, Tablesp, tbltitle) {
    var xhttp;
    if (Table_Name.length == 0) {
        document.getElementById("table_display").innerHTML = "<h1>No table to display.</h1>";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table_display").innerHTML = this.responseText;
            var tble = $('#Dtable').DataTable({
                deferRender: true,
                scrollY: '61vh',
                "sScrollX": "100%",
                /* scrollerX:      true, */
                "processing": true,
                "serverSide": true,
                "iDisplayLength": 100,
                fixedColumns: {
                    heightMatch: 'semiauto'
                },
                "ajax": {
                    url: "/1_mes/_includes/" + Tablesp + ".php",
                    type: 'POST'
                },
                "dom": '<"row"<"col-sm-3"B><"col"><"col-sm-2"<"dd">><"col-sm-2 pl-0 ml-0"f>>t<"row"<"col"i><"col"p>>',
                'buttons': [
                    {
                        text: '<i class="fas fa-plus"></i>',
                        attr: {
                            title: 'Add Request',
                            id: 'addButton'
                        },
                        name: 'add',
                        className: 'btn btn-export6 btn-xs py-1 addbt',
                        extend: 'add1'
                    },
                    {
                        extend: 'selected', // Bind to Selected row
                        text: '<i class="fas fa-edit"></i>',
                        attr: {
                            title: 'Edit Request',
                            id: 'editButton'
                        },
                        name: 'edit',        // do not change name
                        className: 'btn btn-export6 btn-xs py-1 editbt',
                        action: function (e, dt, node, config) {
                            /* alert('test Edit button'); */
                            var data = dt.row('.selected').data();
                            /* alert( data[0] +" is the ID. " ); */
                            /* alert("||"+data[3]+"||"); */
                            /* document.getElementById("emcl").value = data[3]; */
                            $.ajax(
                                {
                                    method: 'post',
                                    url: '/1_mes/_query/mold_repair/getrow.php',
                                    data:
                                        {
                                            'id': data[5],
                                            'ajax': true
                                        },
                                    success: function (data1) {
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
                                        if ($("#edefectname").val() == null) {
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
                        attr: {
                            title: 'Delete Request',
                            id: 'deleteButton'
                        },
                        name: 'delete',      // do not change name
                        className: 'btn btn-export6 btn-xs py-1 delbt',

                        action: function (e, dt, node, config) {

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

                                    var data = dt.row('.selected').data();
                                    $.ajax(
                                        {
                                            method: 'post',
                                            url: '/1_mes/_query/mold_repair/delete_mold_repair.php',
                                            data:
                                                {
                                                    'id': data[5],
                                                    'ajax': true
                                                },
                                            success: function (data) {
                                                checkuserauth();

                                                $.notify({
                                                    icon: 'fas fa-info-circle',
                                                    title: 'System Notification: ',
                                                    message: data,
                                                }, {
                                                        type: 'success',
                                                        placement: {
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
                    {
                        extend: 'copy', text: '<i class="far fa-copy"></i>',
                        attr: {
                            title: 'Copy to Clipboard',
                            id: 'copyButton'
                        },
                        className: 'btn btn-export6 btn-xs py-1'
                    },
                    {
                        extend: 'excel', text: '<i class="fas fa-table"></i>',
                        attr: {
                            title: 'Export to Excel',
                            id: 'exportButton'
                        },
                        filename: tbltitle, className: 'btn btn-export6 btn-xs py-1'
                    }
                ],
                select: 'single',
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 1
                },
                {
                    "data": null,
                    "searchable": false,
                    "orderable": false,
                    render: function (data, type, row) {
                        return "<div class='text-center'><button class='btn btn-export6 py-0 px-1 m-0'><span style='font-size:.8em;'>Checklist</span></button></div>";
                    },
                    "targets": 0,
                },
                {
                    "data": null,
                    render: function (data, type, row) {

                        return ltime(row[2], row[3], row[21]);
                    },
                    "targets": 2,
                },
                ],

                "order": [[5, 'desc'], [6, 'desc']],
                "createdRow": function (row, data, index) {
                    $('td', row).eq(3).addClass(statdisplay(data[3]));
                },
                /* responsive: true */

            });

            /* ____________________ FUNCTIONS ___________________ */

            tble.on('order.dt search.dt processing.dt page.dt processing.dt page.dt', function () {
                tble.column(1, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            $('#Dtable tbody').on('click', 'button', function () {
                var data = tble.row($(this).parents('tr')).data();
                /* var tt =JSON.stringify(data); */
                /* alert(data[5]); */
                /* document.getElementById("chkrepaircontrol").value = data[5]; */

                $.ajax(
                    {
                        method: 'post',
                        url: '/1_mes/_query/mold_repair/getrow.php',
                        data:
                            {
                                'id': data[5],
                                'ajax': true
                            },
                        success: function (data1) {
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

                            if (val.MRI009 == 'YES') { document.getElementById("MRI009").checked = true; };
                            if (val.MRI010 == 'YES') { document.getElementById("MRI010").checked = true; };
                            if (val.MRI011 == 'YES') { document.getElementById("MRI011").checked = true; };
                            if (val.MRI012 == 'YES') { document.getElementById("MRI012").checked = true; };
                            if (val.MRI013 == 'YES') { document.getElementById("MRI013").checked = true; };

                            if (val.MRI014 == 'YES') { document.getElementById("MRI014").checked = true; };
                            if (val.MRI015 == 'YES') { document.getElementById("MRI015").checked = true; };
                            if (val.MRI016 == 'YES') { document.getElementById("MRI016").checked = true; };
                            if (val.MRI017 == 'YES') { document.getElementById("MRI017").checked = true; };
                            if (val.MRI018 == 'YES') { document.getElementById("MRI018").checked = true; };
                            if (val.MRI019 == 'YES') { document.getElementById("MRI019").checked = true; };
                            if (val.MRI020 == 'YES') { document.getElementById("MRI020").checked = true; };

                            $("#actiontaken").val(val.ACTION_TAKEN);
                            $("#achecklistsubmit").hide();

                            $('.sel').select2({ width: '100%' });
                            $('#chcklist').modal('show');
                        }
                    });

            });

            $("div.dd").html('<div class="input-group"><div class="input-group-prepend"><div class="input-group-text m-0" style="height: 31px;">Status</div></div><select class="form-control p-1" id="sortstatus" style="height: 31px;"><option>ALL</option><option>WAITING</option><option>ON-GOING</option><option>FOR MOLD TRIAL</option><option>QC APPROVED</option></select></div>');

            $('#sortstatus').on('change', function () {
                /* alert('test'); */
                var selectedValue = $(this).val();
                /* alert(selectedValue); */
                if (selectedValue != "ALL") {
                    tble
                        .columns(3)
                        .search(selectedValue)
                        .draw();
                }
                else {
                    tble
                        .columns(3)
                        .search('')
                        .draw();
                }

            });

            /* ____________________________ FUNCTIONS _________________________ */
        }

    };
    xhttp.open("POST", "/1_mes/_tables/" + Table_Name + ".php", true);
    xhttp.send();

} 