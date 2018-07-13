function checknotif(){
    
    /* alert('Boom!'); */
    
    $.ajax({
        type: 'POST',
        url: '/1_mes/_includes/notif/checknotif.php',
        global:false,
        success: function (data) {
            var val = JSON.parse(data);

            if(localStorage.getItem("notif_message") === null){
              localStorage.setItem("notif_message",val['notif_message']);
            }
            else{
              if(localStorage.getItem("notif_message") != val['notif_message']){                

                iziToast.show({
                    title: 'ANNOUNCEMENT:',
                    message: val['notif_message'],
                    image: '/1_mes/_icons/favicon.ico',
                    titleSize: '20px',
                    messageSize: '18px',
                    transitionIn: 'fadeInLeft',
                    timeout: false
                });

                localStorage.setItem("notif_message",val['notif_message']);
              }
            }

        }     
                    
        
      });

    setTimeout(checknotif,5*1000);

  }

  checknotif();