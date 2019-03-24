<?php
namespace insset;
include "user.php";
include 'database.php';
class app{

    public static function  getUsers($pdo){
        $user = new \insset\User($pdo);
        $list = $user->get_users();
        return $list;


    }

    public static function fn($a){
        return $a*2;
    }

}




