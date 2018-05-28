function checksession(){
    
    /* alert('Boom!'); */
    
    $.ajax({
        type: 'POST',
        url: '/1_mes/_query/checktoken.php',
        global:false,
        success: function (data) {
          if(data=="success"){
            /* alert("Token correct"); */
            return;
          }
          else if(data=="nothing"){
              /* alert('No Session token'); */
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
              window.location.href='/1_mes/';
          }        
        }
      });

    setTimeout(checksession,10*1000);

  }

  checksession();