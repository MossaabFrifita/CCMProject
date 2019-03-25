<?php

use PHPUnit\Framework\TestCase;
class userTest extends TestCase {

    public function test_list_users(){

        $ini = parse_ini_file('./src/settings.ini', true);

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

        $this->assertNotNull(\insset\app::getUsers($pdo));

    }
	
	
}