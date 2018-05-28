

function loadmodal(Modal_Name) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("mod").innerHTML = this.responseText;
       $('.sel').select2({ width: '100%' });
      }
    };
    xhttp.open("POST", "/1_mes/_modals/"+Modal_Name+".php", true);
    xhttp.send();
  }