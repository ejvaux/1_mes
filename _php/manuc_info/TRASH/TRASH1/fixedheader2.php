<!DOCTYPE html>
<html>
<head>
  <title> </title>

 <link rel ="stylesheet" href="http://reggie-pc/1_MES/css/manuc_info.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/1_mes/_css/page.css">

  <style type="text/css">
      .scrolltable { border-spacing:0;} 
        .scrolltable tr:first-child td { background-color:grey; border: 1px solid black;text-align:left }   
        .scrolltable tbody td { background-color:#E5E4E2; border: 1px solid black; }    
        .scrolltable tr:first-child { position:absolute;margin-top:-20px; } 
        .table { margin-top:30px; height:200px;overflow-y:scroll; width:800px  } 
  </style>

  <script type="text/javascript" language="javascript"> 
        $(document).ready(function () { 
            var headerColumnstr = $('.scrolltable tr:first-child'); 
            var contentColumnstr = $('.scrolltable tr:nth-child(2)'); 
            var headerColumns = $('.scrolltable tr:first-child td'); 
            var contentColumns = $('.scrolltable tr:nth-child(2) td'); 
            $(headerColumnstr).css('width', $(contentColumnstr).outerWidth() + 400); 
            for (i = 0; i <= contentColumns.length; i++) { 
                if (i == contentColumns.length - 1) { 
                    cellwidth = $(contentColumns[i]).innerWidth() + 17; 
                } 
                else { 
                    cellwidth = $(contentColumns[i]).innerWidth(); 
                } 
                $(headerColumns[i]).css('width', cellwidth) 
            } 
 
            $('.table').scroll(function () { 
                var headerColumnstr = $('table tr:first-child'); 
                var contentColumnstr = $('table tr:nth-child(2)'); 
                $(headerColumnstr).css({ left: $(contentColumnstr).offset().left - 10 }); 
            }); 
        });   
    </script>
</head>
<body>

   <div>      
        <table> 
            <tr> 
                <td style="overflow-y:hidden;position:relative;"> 
                    <div class="table">   
                         <table class="scrolltable"> 
                            <tr> 
                                <td>CTRL</td>
                                <td>NO</td>
                                <td>JO DATE</td>
                                <td>J.O</td>
                                <td>CUSTOMER CODE</td>
                                <td>CUSTOMER NAME</td>
                                <td>ITEM CODE</td>
                                <td>ITEM NAME</td>
                                <td>TOOL NUMBER</td>
                                <td>PLAN QTY</td>
                                <td>CURRENT PROD RESULT</td>
                                <td>ACHIEVE RATE</td>
                                <td>DEFECT RATE</td>
                            </tr> 
                            <tr> 
                             
                             
                              
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>

                           



                            </tr> 
                        </table> 
                    </div> 
                </td> 
            </tr> 
        </table> 
    </div>


</body>
</html>