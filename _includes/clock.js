function showclock(){

    var date = new Date();
    /* var st = srvTime();
    var date = new Date(st); */

    //  Date
    var mm = date.getMonth();
    var dd = date.getDate();
    var yy = date.getFullYear();
    var d = date.getDay();

    //  Time
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();

    //  Formatting
    var monthNames = [
      "January", "February", "March",
      "April", "May", "June", "July",
      "August", "September", "October",
      "November", "December"
    ];

    var day = [
      "Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"
    ];

    var month = monthNames[mm];
    var ddate = dd >= 10 ? dd : "0"+ dd;
    var dy = day[d];
    var hr = h > 12 ?  h - 12 : h;
    var hour = hr < 10 ? "0" + hr : hr;
    var min = m < 10 ? "0"+m : m;
    var sec = s < 10 ? "0"+s : s;
    var mer = h > 12 ? "PM" : "AM";     

    // Clock
    var date = month + " " + ddate + ", " + yy + ". " + dy;
    var time = hour + ":" + min + ":" + sec + " " + mer;

    document.getElementById("clockdate").innerText = date;
    document.getElementById("clockdate").textContent = date;
    document.getElementById("clocktime").innerText = time;
    document.getElementById("clocktime").textContent = time;

    setTimeout(showclock,1000);

  }