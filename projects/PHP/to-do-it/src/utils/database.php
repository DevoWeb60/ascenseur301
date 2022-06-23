<?php
define('DB_HOST', 'localhost:3306');
define('DB_USER', 'devoweb');
define('DB_PASS', 'root');
define('DB_NAME', 'todo');

// database connection
$db = new PDO("mysql:host=" . DB_HOST . " ;dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
