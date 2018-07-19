function hide(val){    
    if(val=="A"){
        
    }

    else if(val=="B"){
        $('#2').addClass("disabled");
        $('#3').addClass("disabled");
        $('#4').addClass("disabled");
        $('#5').addClass("disabled");
        $('#6').addClass("disabled");
    }

    else if(val=="DA"|| val=="DC" || val=="DG"){

        /* alert('GOOOOOOD!'); */
        $('#1').addClass("disabled");
        $('#2').addClass("disabled");
        $('#3').addClass("disabled");
        /* $('#4').addClass("disabled"); */
        $('#5').addClass("disabled");
        $('#6').addClass("disabled");

    }
    
    else if(val=="G"){
        
        $('#1').addClass("disabled");
        /* $('#2').addClass("disabled");
        $('#3').addClass("disabled"); */
        /* $('#4').addClass("disabled"); */
        /* $('#5').addClass("disabled");
        $('#6').addClass("disabled"); */

    }

    else if(val=="C"){
        
        $('#1').addClass("disabled");
        /* $('#2').addClass("disabled");
        $('#3').addClass("disabled");
        $('#4').addClass("disabled"); */
        /* $('#5').addClass("disabled");
        $('#6').addClass("disabled"); */

    }
    else{        
        $('#1').addClass("disabled");
        $('#2').addClass("disabled");
        $('#3').addClass("disabled");
        $('#4').addClass("disabled");
        $('#5').addClass("disabled");
        $('#6').addClass("disabled");
    }    

}