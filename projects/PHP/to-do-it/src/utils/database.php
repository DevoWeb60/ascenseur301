<?php
// define('DB_HOST', 'localhost:3306');
// define('DB_USER', 'devoweb');
// define('DB_PASS', 'root');
// define('DB_NAME', 'todo');

define('DB_HOST', 'localhost:3306');
define('DB_USER', 'thibaultberthelin');
define('DB_PASS', 'NOpWqDs2');
define('DB_NAME', 'thibaultberthelin_todos');

// database connection
try {
    $db = new PDO("mysql:host=" . DB_HOST . " ;dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
