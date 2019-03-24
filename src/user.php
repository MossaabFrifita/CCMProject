<?php
/**
 * Created by PhpStorm.
 * User: Mossa
 * Date: 24/03/2019
 * Time: 22:46
 */

namespace insset;



class User {
    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $pdo) {
        $this->conn = $pdo;
    }

    /* List all users */
    public function get_users() {
        return $this->conn->query("SELECT * FROM user")->fetchAll();
    }
}

