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
$AlbumLocation = new \insset\AlbumLocation($pdo);

$location =$_POST['hlocation'];
$nbPhotos = $_POST['nbPhotosLocation'];
$userid = $_SESSION['id'];


if (null == $AlbumLocation ->getAlbumbyLocationAndSize($location,$nbPhotos,$userid)) {
    $AlbumLocation ->addAlbum($location,$nbPhotos,$userid);
    header('Location: https://insatgramposter.appspot.com/home?status=success');
}else{
header('Location: https://insatgramposter.appspot.com/home?status=echec');}