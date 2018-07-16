function checknotif(){
    
    /* alert('Boom!'); */
    
    $.ajax({
        type: 'POST',
        url: '/1_mes/database/table_handler/admin/notifHandler.php',
        global:false,
        data:{
          action: 'select'
        },
        success: function (data) {
            var val = JSON.parse(data);
            if(localStorage.getItem("notif_message") === null){
              localStorage.setItem("notif_message",val['notif_message']);
            }
            else{
              if(localStorage.getItem("notif_message") != val['notif_message']){                

                iziToast.show({
                  class: 'notifi',
                  title: 'Notice:',
                  message: val['notif_message'],
                  image: '/1_mes/_icons/favicon.ico',
                  transitionIn: 'fadeInLeft',
                  transitionOut:	'fadeOutRight',
                  timeout: 20000
                });

                localStorage.setItem("notif_message",val['notif_message']);
              }
            }

        }     
                    
        
      });

    setTimeout(checknotif,5*1000);

  }

  checknotif();