<?php
/**
 * Created by PhpStorm.
 * User: Mossa
 * Date: 20/04/2019
 * Time: 16:26
 */


include "database.php";
require "album.php";
$album = new \insset\Album($pdo);

$id =$_GET['id'];

$album->deleteAlbum($id);

header('Location: https://insatgramposter.appspot.com/home');