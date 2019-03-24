<?php
$ini = parse_ini_file('settings.ini', true);

$driver = $ini['database']['driver'];
$host = $ini['database']['host'];
$db = $ini['database']['db'];
$user = $ini['database']['user'];
$pass = $ini['database']['password'];
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new \PDO($dsn, $user, $pass, $opt);