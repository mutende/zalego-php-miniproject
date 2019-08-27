<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'mutende');
define('DB_PASS', 'm0910');
define('DB_NAME', 'interview');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Connection Error => '.mysqli_connect_error());
