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
require "albumLocation.php";
$album = new \insset\Album($pdo);
$albumLocation = new \insset\AlbumLocation($pdo);

$list = $album->getAll($_SESSION['id']);




$listAlbumLocation = $albumLocation->getAll($_SESSION['id']);