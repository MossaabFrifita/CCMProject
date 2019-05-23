<?php
/**
 * Created by PhpStorm.
 * User: Mossa
 * Date: 20/04/2019
 * Time: 16:26
 */
session_start();
include "database.php";
require "albumLocation.php";
$albumLocation = new \insset\AlbumLocation($pdo);


$listAlbumLocation = $albumLocation->getAll($_SESSION['id']);
