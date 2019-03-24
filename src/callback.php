<?php
    session_start();
   if (isset($_GET['error'])){
       echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
    }
    require "instagramAPI.php";
    $data = $instagram->getAccessTokenAndUserDetails($_GET['code']);
    $_SESSION['loggedIn'] = 1;
    $_SESSION['accessToken'] = $data['access_token'];
    $_SESSION['id'] = $data['user']['id'];
    $_SESSION['username'] = $data['user']['username'];
    $_SESSION['bio'] = $data['user']['bio'];
    $_SESSION['fullname'] = $data['user']['full_name'];
    $_SESSION['profilePicture'] = $data['user']['profile_picture'];
    echo "<script type='text/javascript'>document.location.replace('home.php');</script>";

?>