@echo off
echo ========================================
echo   INSTALL LIVEWIRE DAN DEPENDENCIES
echo ========================================
echo.

echo [1/4] Installing Composer dependencies...
composer install
if %errorlevel% neq 0 (
    echo.
    echo ERROR: Composer install gagal!
    echo Pastikan Composer sudah terinstall dan ada di PATH
    pause
    exit /b 1
)

echo.
echo [2/4] Clearing Laravel cache...
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo.
echo [3/4] Installing NPM dependencies...
call npm install
if %errorlevel% neq 0 (
    echo.
    echo ERROR: NPM install gagal!
    pause
    exit /b 1
)

echo.
echo [4/4] Building assets...
call npm run build
if %errorlevel% neq 0 (
    echo.
    echo WARNING: Build mungkin gagal, tapi bisa lanjut
)

echo.
echo ========================================
echo   INSTALASI SELESAI!
echo ========================================
echo.
echo Langkah berikutnya:
echo 1. Pastikan database 'klinik' sudah dibuat
echo 2. Jalankan: php artisan migrate
echo 3. Jalankan: php artisan db:seed
echo 4. Jalankan: php artisan serve
echo 5. Buka: http://localhost:8000/dashboard
echo.
pause

