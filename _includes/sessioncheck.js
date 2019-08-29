function checksession(){
    
    /* alert('Boom!'); */
    
    $.ajax({
        type: 'POST',
        url: '/1_mes/_query/checktoken.php',
        global:false,
        success: function (data) {
          if(data=="success"){
            /* alert("Token correct"); */
            if(localStorage.getItem("disconnect_message") == 1){                
  
              iziToast.info({
                title: 'NOTICE:',
                message: 'Reconnected to Database Server',
                titleSize: '20px',
                messageSize: '18px',
                transitionIn: 'fadeInLeft',
                transitionOut:	'fadeOutRight',
                timeout: 10000
            });

              localStorage.setItem("disconnect_message",0);
            }
            localStorage.setItem("disconnect_message",0);
            $('#con').css('color', 'green');
            return;
          }
          else if(data=="nothing"){
              /* alert('No Session token'); */

              if(localStorage.getItem("disconnect_message") == 1){                
  
                iziToast.info({
                  title: 'NOTICE:',
                  message: 'Reconnected to Database Server',
                  titleSize: '20px',
                  messageSize: '18px',
                  transitionIn: 'fadeInLeft',
                  transitionOut:	'fadeOutRight',
                  timeout: 10000
              });

                localStorage.setItem("disconnect_message",0);
              }

              $('#con').css('color', 'green');
              return;
          }
          else if(data=="failed"){
            /* alert(data); */
            /* alert("||"+data+"||"); */
            alert('A device logged in using your account. If you find this unusual please contact the system administrator immediately. ');            
            window.location.href='/1_mes/';            
                       
          }
          else{
              /* alert(data); */
              /* window.location.href='/1_mes/'; */

              if(localStorage.getItem("disconnect_message") === null){
                localStorage.setItem("disconnect_message",0);
              }
              else{
                if(localStorage.getItem("disconnect_message") == 0){                
  
                  iziToast.error({
                    title: 'WARNING:',
                    message: 'Disconnected from Database Server',
                    titleSize: '20px',
                    messageSize: '18px',
                    transitionIn: 'fadeInLeft',
                    transitionOut:	'fadeOutRight',
                    timeout: 10000
                });
  
                  localStorage.setItem("disconnect_message",1);
                }
              }              
              $('#con').css('color', 'red');
              
          }        
        }
      });
    /* setTimeout(checksession,10*1000); */

  }

  /* checksession(); */

  // Enable pusher logging - don't include this in production
  // Pusher.logToConsole = true;

  /* var pusher = new Pusher(app_key, {
    cluster: app_cluster,
    forceTLS: true
  });

  var channel = pusher.subscribe('token-check');
  channel.bind('my-event', function(data) {
    checksession();
  }); */