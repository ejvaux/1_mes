@echo off
:loop
C:\xampp\php\php.exe C:\xampp\htdocs\1_mes\script\test.php
ping localhost -n 6 > nul
goto loop