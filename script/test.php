<?php
        
    $servername = "localhost";
    $username = "root";     
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $d = "test 2";

    $sql = "INSERT INTO script
    (           

        input

    )
        VALUES (?)";
            
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(

            's',
            $d

        );

        if ($stmt->execute() === TRUE) {            
            echo "Success\n";
        } else {            
            echo "Error: " . $conn->error;
        }                
        $stmt->close();
        $conn->close();
?>
