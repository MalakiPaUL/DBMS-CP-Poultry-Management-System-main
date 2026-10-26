@echo off
setlocal

set "XAMPP_DIR=C:\xampp"
set "PHP_EXE=%XAMPP_DIR%\php\php.exe"
set "APP_DIR=%~dp0Poultry farm management system\Poultry farm management system\farm"

if not exist "%PHP_EXE%" (
    echo PHP was not found at "%PHP_EXE%".
    echo Update XAMPP_DIR in run-local.bat to your XAMPP installation folder.
    pause
    exit /b 1
)

if not exist "%APP_DIR%\index.php" (
    echo The application was not found at "%APP_DIR%".
    pause
    exit /b 1
)

start "" "%XAMPP_DIR%\xampp-control.exe"
echo In XAMPP Control Panel, start MySQL.
echo If needed, create the poultry database in phpMyAdmin and import:
echo %~dp0Poultry farm management system\Poultry farm management system\SQL File\poultry.sql
echo Return here and press any key after the database is ready.
pause >nul

start "PFMS PHP Server" "%PHP_EXE%" -S 127.0.0.1:8000 -t "%APP_DIR%"
timeout /t 2 /nobreak >nul
start "" "http://127.0.0.1:8000/"

endlocal
