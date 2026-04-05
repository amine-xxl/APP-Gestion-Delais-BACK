@echo off
title SETAS - Demarrage
echo ============================================
echo     SETAS - Lancement de l'application
echo ============================================
echo.

:: ⚠️ Update paths to match your local setup
:: C:\path\to\xampp
:: C:\path\to\your\project

:: Start XAMPP MySQL
echo [1/3] Démarrage de MySQL...
"C:\path\to\xampp\mysql\bin\mysqld.exe" --defaults-file="C:\path\to\xampp\mysql\bin\my.ini" --standalone
start "" "C:\path\to\xampp\mysql_start.bat"

:: Wait 3 seconds
timeout /t 3 /nobreak > nul

:: Start Laravel
echo [2/3] Démarrage du serveur Laravel...
start "" cmd /c "cd /d C:\path\to\your\project\BackEnd && php artisan serve --port=8000"

:: Wait 3 seconds
timeout /t 3 /nobreak > nul

:: Open browser
echo [3/3] Ouverture du navigateur...
start "" "http://localhost:8000"

echo.
echo ============================================
echo     SETAS est prêt ! Bonne journée
echo ============================================
pause