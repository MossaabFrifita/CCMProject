<?php
/**
 * Created by PhpStorm.
 * User: Mossa
 * Date: 20/04/2019
 * Time: 16:26
 */
session_start();
include "database.php";
require "album.php";
$album = new \insset\Album($pdo);


$list = $album->getAll($_SESSION['id']);
