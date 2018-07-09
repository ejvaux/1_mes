$(document).ready(function(){
/* --------------------------------------- */

/* Login / Logout */

$(document).bind('keyup', 'alt+ctrl+l', function(){
    /* alert('weeeeeeeeee'); */
    if($('#lgin').length){
        if(document.getElementById('lgin').style.display=='block'){
            /* alert('1'); */
            document.getElementById('id01').style.display='block';
          }
        else{
            /* alert('2'); */
        $('#lgout').click();
        }
    }
    else
    {
        $('#lgout').click();
    }

});

$(document).bind('keyup', 'alt+ctrl+r', function(){
    /* alert('weeeeeeeeee'); */
    if($('#reg').length){
        $('#reg').trigger('click');
      }

});

/* Portal */

$(document).bind('keyup', 'alt+ctrl+p', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('prtl').style.display == 'block' || document.getElementById('prtl').style.display == ''){
        document.getElementById('prtl').click();
        /* $('#prtl a').click(); */
        /* alert('eiwwwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+ctrl+h', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('hme').style.display == 'block' || document.getElementById('hme').style.display == '' ){
        document.getElementById('hme').click();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+ctrl+a', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('acct_btn').style.display == 'block' || document.getElementById('acct_btn').style.display == '' ){
        document.getElementById('acct_btn').click();
        /* alert('eiwwwwwwww'); */
    }

});

/* Portal Page / Tab Icons */

$(document).bind('keyup', 'alt+ctrl+m', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('1').style.display == 'block' || document.getElementById('1').style.display == '' ){
        if(!$('#1').hasClass("disabled")){
            document.getElementById('1').click();
        }        
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+ctrl+k', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('2').style.display == 'block' || document.getElementById('2').style.display == '' ){
        
        if(!$('#2').hasClass("disabled")){
            document.getElementById('2').click();
        }    
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+ctrl+u', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('3').style.display == 'block' || document.getElementById('3').style.display == '' ){
        
        if(!$('#3').hasClass("disabled")){
            document.getElementById('3').click();
        } 
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+ctrl+o', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('4').style.display == 'block' || document.getElementById('4').style.display == '' ){
        
        if(!$('#4').hasClass("disabled")){
            document.getElementById('4').click();
        } 
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+ctrl+i', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('5').style.display == 'block' || document.getElementById('5').style.display == '' ){
        
        if(!$('#5').hasClass("disabled")){
            document.getElementById('5').click();
        } 
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+ctrl+n', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('6').style.display == 'block' || document.getElementById('6').style.display == '' ){
        
        if(!$('#6').hasClass("disabled")){
            document.getElementById('6').click();
        } 
        /* alert('eiwwwwwwww'); */
    }

});

                /* Tabs */

$(document).bind('keyup', 'alt+1', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('tb1').style.display == 'block' || document.getElementById('tb1').style.display == '' ){
        document.getElementById('tb1').click();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+2', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('tb2').style.display == 'block' || document.getElementById('tb2').style.display == '' ){
        document.getElementById('tb2').click();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+3', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('tb3').style.display == 'block' || document.getElementById('tb3').style.display == '' ){
        document.getElementById('tb3').click();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+4', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('tb4').style.display == 'block' || document.getElementById('tb4').style.display == '' ){
        document.getElementById('tb4').click();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+5', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('tb5').style.display == 'block' || document.getElementById('tb5').style.display == '' ){
        document.getElementById('tb5').click();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+6', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('tb6').style.display == 'block' || document.getElementById('tb6').style.display == '' ){
        document.getElementById('tb6').click();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+7', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('tb7').style.display == 'block' || document.getElementById('tb7').style.display == '' ){
        document.getElementById('tb7').click();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+8', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('tb8').style.display == 'block' || document.getElementById('tb8').style.display == '' ){
        document.getElementById('tb8').click();
        /* alert('eiwwwwwwww'); */
    }

});

        /* Tables */

$(document).bind('keyup', 'alt+s', function(){
    /* alert('weeeeeeeeee'); */
    if ( document.getElementById('srch').style.display == 'block' || document.getElementById('srch').style.display == '' ){
        document.getElementById('srch').focus();
        /* alert('eiwwwwwwww'); */
    }

});

$(document).bind('keyup', 'alt+a', function(){
    /* alert('weeeeeeeeee'); */
    if($('#addButton').length){
        
        if(!$('#addButton').hasClass("disabled")){
            document.getElementById('addButton').click();
        }         
    }  
});

$(document).bind('keyup', 'alt+q', function(){
    /* alert('weeeeeeeeee'); */
    if($('#editButton').length){        
        if(!$('#editButton').hasClass("disabled")){
            document.getElementById('editButton').click();
        }  
    }
    

});

$(document).bind('keyup', 'alt+w', function(){
    
    if($('#deleteButton').length){        
        if(!$('#deleteButton').hasClass("disabled")){
            document.getElementById('deleteButton').click();
        }  
    }

});

$(document).bind('keyup', 'alt+x', function(){    
    
    if($('#exportButton').length){        
        if(!$('#exportButton').hasClass("disabled")){
            document.getElementById('exportButton').click();
        }  
    }

});

$(document).bind('keyup', 'alt+c', function(){
        
    if($('#copyButton').length){        
        if(!$('#copyButton').hasClass("disabled")){
            document.getElementById('copyButton').click();
        }  
    }

});

/* ---------------------------------------- */
    
});