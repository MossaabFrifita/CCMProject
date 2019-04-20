<?php
$dsn = getenv('MYSQL_DSN');
$userr = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$pdo = new PDO($dsn, $userr, $password);