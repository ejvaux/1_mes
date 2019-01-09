function checknotif(){
        
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
                  timeout: false
                });

                localStorage.setItem("notif_message",val['notif_message']);
              }
            }

        }     
                    
        
      });

    /* setTimeout(checknotif,5*1000); */

  }

  checknotif();

  /* Pusher.logToConsole = true; */

  var pusher = new Pusher(app_key, {
    cluster: app_cluster,
    forceTLS: true
  });

  var channel = pusher.subscribe('notif');
  channel.bind('my-event', function(data) {
    /* alert(data.message); */
    /* iziToast.show({
      class: 'notifi',
      title: 'Notice:',
      message: data.message,
      image: '/1_mes/_icons/favicon.ico',
      transitionIn: 'fadeInLeft',
      transitionOut:	'fadeOutRight',
      timeout: false
    }); */
    checknotif();
  });