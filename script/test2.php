<?php

$servername = "localhost";
$username = "root";     
$password = "";
$dbname = "masterdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL update_mold_status('PMXF0012ZA-B','100')";
if ($conn->query($sql) === TRUE) {
        
    echo "success";
} else {
    
    echo "Error updating record: " . $sql . "<br>" . $conn->error;        
}

$conn->close();

?>

/* 

@echo off
SET t=14:20:00
echo %t%
echo %time:~0,5%
SET /A th=%t:~0,2%*60*60
SET /A tm=%t:~3,2%*60
SET /A ts=%t:~6,2%
SET /A tsec=%th%+%tm%+%ts%
echo %tsec%

:timer
ping localhost -n 2 > nul
IF %time:~0,8%==%t% (
    SET /A nth=%time:~0,2%*60*60
    SET /A ntm=%time:~3,2%*60
    SET /A nts=%time:~6,2%
    SET /A ntsec=%nth%+%ntm%+%nts%
    SET /A ttsec=%tsec%-%ntsec%
    echo & echo.%tsec%
    echo %ntsec%
    echo %ttsec%
    GOTO fin
) ELSE (
    SET /A nth=%time:~0,2%*60*60
    SET /A ntm=%time:~3,2%*60
    SET /A nts=%time:~6,2%
    SET /A ntsec=%nth%+%ntm%+%nts%
    SET /A ttsec=%tsec%-%ntsec%
    echo & echo.%tsec%
    echo %ntsec%
    echo %ttsec%
    GOTO timer
)

:fin
echo & echo.Finished!
pause

 */