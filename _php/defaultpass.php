<html>
<script src="/1_mes/node_modules/moment/min/moment.min.js"></script>
    <body>
    <h1 id="dte"></h1>
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
            /* echo random_bytes(64); */
            echo "<br>";
            echo "date today is:" . Date('Y-m-d H:i:s') ;           
        ?>        
        </h1>
        <?php
            $date1 = strtotime(Date("2018-06-04 14:52:15"));
            $date2 = strtotime(Date('Y-m-d H:i:s'));

            $date3 = $date2 - $date1;
            /* echo $date1->format('Y-m-d H:i:s') + "<br>"; */            
            echo date('Y-m-d H:i:s',$date2) . "<br>";
            echo date('Y-m-d H:i:s',$date3) . "<br>";
            
            function secondsToTime($seconds) {
                $dtF = new \DateTime('@0');
                $dtT = new \DateTime("@$seconds");
                return $dtF->diff($dtT)->format('%a day, %h hr, %i min');
            }

            echo secondsToTime($date3);
            
            echo "date today is:" ;

        ?>

    <script>

        /* function checksession(){
    
            alert('Boom!');           

            setTimeout(checksession,10*1000);

        }   
        checksession(); */

        /* function isDate (date) {
        return!!(function(d){return(d!=='Invalid Date'&&!isNaN(d))})(new Date(date)); */

        /* var isDate = function(date) {
            return (new Date(date) !== "Invalid Date" && !isNaN(new Date(date)) ) ? true : false;
        } */

        if(moment("1312312441241", "YYYY-MM-DD hh:mm:ss", true).isValid()){
            alert('Date');
            $('#dte').text('Date');
        }
        else{
            alert('Not Date');
            $('#dte').text('Not Date');
        }      
      

    </script>
    
    
    </body>

</html>