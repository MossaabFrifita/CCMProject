<?php
/**
 * Created by PhpStorm.
 * User: Mossa
 * Date: 20/04/2019
 * Time: 16:26
 */


include "database.php";
require "albumLocation.php";
$AlbumLocation = new \insset\AlbumLocation($pdo);

$id =$_GET['id'];

$AlbumLocation->deleteAlbum($id);

header('Location: https://insatgramposter.appspot.com/home');