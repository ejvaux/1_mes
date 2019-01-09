
/* announcement link*/

$(document).on('click', '#anncmnt', function(){
    /* alert('test'); */
    $.ajax({
        type:'POST',
        url:'../mis_admin/view/announcement.php',
        success:function(data){
            $('#table_display').html(data);                                                       
        }   
        });
    
});

$(document).on('keyup','#notif_message', function(){
    $('#c_length').html(300 - $('#notif_message').val().length + ' character/s left.');
  });

$(document).on('submit', '#notifform', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    /* alert('test'); */
    var formdata =  $('#notifform').serializeArray();
    formdata.push({name: 'action', value: 'update'});

    /* $.ajax({
    type: 'POST',
    url: '/1_mes/database/table_handler/admin/notifHandler.php',
    data: $.param(formdata),
    success: function (data) {      
        if(data==true){
        
        $('#notifform').trigger('reset');        
        
        iziToast.show({
            title: 'NOTICE:',
            message: 'Announcement has been published',
            position: 'topCenter',
            titleSize: '20px',
            messageSize: '18px',
            transitionIn: 'fadeInDown',
            transitionOut:	'fadeOutUp',
            timeout: 5000,
            pauseOnHover: false
        });
        }
        else{
        alert(data);          
        }
    }
    }); */

    $.ajax({
        type: 'POST',
        url: '/1_mes/database/table_handler/admin/notifHandler.php',
        data: $.param(formdata),
        success: function (data) {      
            if(data==true){
            
                $.ajax({
                    type: 'POST',
                    url: '/1_mes/mis_admin/notifpush.php',
                    data: $.param(formdata),
                    success: function (data) {
                        if(data=="true"){
                        
                        $('#notifform').trigger('reset');        
                        
                        iziToast.show({
                            title: 'NOTICE:',
                            message: 'Announcement has been published',
                            position: 'topCenter',
                            titleSize: '20px',
                            messageSize: '18px',
                            transitionIn: 'fadeInDown',
                            transitionOut:	'fadeOutUp',
                            timeout: 5000,
                            pauseOnHover: false
                        });
                        }
                        else{
                        alert(data);          
                        }
                    }
                });
            }
            else{
            alert(data);          
            }
        }
        });
});

/* announcement link*/

