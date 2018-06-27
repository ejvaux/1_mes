@echo off
TITLE MOLD SHOT UPDATE SCRIPT
echo SCRIPT START
SET t=11:55

:timer
ping localhost -n 61 > nul
IF %time:~0,5%==%t% (
    GOTO fin
) ELSE (
    GOTO timer
)

:fin
php moldpm.php
echo ----WAITING----
goto timer