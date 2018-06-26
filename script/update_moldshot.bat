@echo off
TITLE MOLD SHOT UPDATE
SET t=16:40
echo %t%
echo %time:~0,5%

:timer
ping localhost -n 61 > nul
IF %time:~0,5%==%t% (
    echo %time:~0,5%
    GOTO fin
) ELSE (
    echo %time:~0,5%
    GOTO timer
)

:fin
C:\xampp\php\php.exe C:\xampp\htdocs\1_mes\script\moldpm.php
goto timer