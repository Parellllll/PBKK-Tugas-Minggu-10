@echo off
echo Menjalankan Tugas 10 CodeIgniter 4 (ShopEase Fresh) pada http://localhost:8080 ...
C:\xampp\php\php.exe -d extension=intl -d extension=gd -d extension=sqlite3 -S localhost:8080 -t public vendor\codeigniter4\framework\system\rewrite.php

