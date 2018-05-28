<html>

    <body>
        <h1>
        <?php
            $salt = "ejvaux";
            $dfp = "abc123";
            $qw = "$salt . $dfp";
            echo $qw;
            echo "<br>";
            echo $np = md5("$salt . $dfp");

        ?>

        
        </h1>
        <h1>
        <?php
            $salt = "ejvaux";
            $dfp = "abc123";
            $dfp = stripslashes($dfp);
            $rr = md5($salt.$dfp);
            echo $rr;
            echo "<br>";
            $nn = $salt . $dfp;
            echo $nn;
            echo "<br>";
            echo $np = md5($dfp);
            echo "<br>";
            echo $np = md5($nn);
            echo "<br>";
            echo random_bytes(64);
        ?>        
        </h1>

    <script>

        function checksession(){
    
            alert('Boom!');
            /* if(session==null){
                alert('You are logged out. Please Login again.');
                window.location.href = '/1_MES/';
            }

            else{
                alert('Login');
            } */

            setTimeout(checksession,10*1000);

        }   
        checksession();
    </script>
    </body>

</html>