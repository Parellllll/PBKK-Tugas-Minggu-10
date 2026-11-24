<?php
// Router script untuk PHP built-in web server (php -S localhost:8090 router.php)
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if ($uri !== '/' && file_exists(__DIR__ . $uri) && !is_dir(__DIR__ . $uri)) {
    return false;
}
$_SERVER['SCRIPT_NAME'] = '/index.php';
require_once __DIR__ . '/index.php';

