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

$tag =$_GET['tag'];
$nbPhotos = $_GET['nbPhotos'];
$userid = $_SESSION['id'];


if (null == $album->getAlbumbyTagAndSize($tag,$nbPhotos)) {
    $album->addAlbum($tag,$nbPhotos,$userid);
    header('Location: https://insatgramposter.appspot.com/home?status=success');
}else{
header('Location: https://insatgramposter.appspot.com/home?status=echec');}