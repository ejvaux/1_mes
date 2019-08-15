<!DOCTYPE html>
<html>
    <head>
        <title>Test Loading</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <body>  
        <div id="header">
            This is header
        </div>
        <div id="navigation">
            This is navigation
        </div>


        <div id="content">
            <form action=""  id="info">
                <table>
                    <tr>
                        <td>First Name</td>
                        <td>:</td>
                        <td><input type="text" name="first_name"></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>:</td>
                        <td><input type="text" name="last_name"></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td>:</td>
                        <td><input type="text" name="age"></td>
                    </tr>
                    <tr>
                        <td>Hobby</td>
                        <td>:</td>
                        <td><input type="text" name="hobby"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                         <td></td>

                    </tr>
                </table>

            </form>
        </div>

        
       <button id="submit">Submit</button>
        <div id="footer">
            This is footer
        </div>
    </body>
</html>

<script type="text/javascript">
  var postData = "text";
  $('#submit').on('click',function(){
      $.ajax({
            type: "post",
            url: "test2.php",
            data:  $("#info").serialize(),
            contentType: "application/x-www-form-urlencoded",
             success: function(response) { // on success..
            $('#content').html(response); // update the DIV
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        })
    });

</script>