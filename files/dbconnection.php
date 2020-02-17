<?php

define('DB_HOST', 'server');
define('DB_USER', 'user');
define('DB_PASS', 'pass');
define('DB_NAME', 'db');

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
$pdo = new PDO($dsn,DB_USER,DB_PASS);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

