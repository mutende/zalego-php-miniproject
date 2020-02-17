<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'mutende');
define('DB_PASS', 'm2825');
define('DB_NAME', 'interview');

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
$pdo = new PDO($dsn,DB_USER,DB_PASS);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

