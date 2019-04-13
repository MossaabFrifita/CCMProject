<?php
   
   session_start();
   if (isset($_GET['error'])){
       header('Location: https://insatgramposter.appspot.com/');
    }

 
    require "./src/instagramAPI.php";
    $data = $instagram->getAccessTokenAndUserDetails($_GET['code']);
    $_SESSION['loggedIn'] = 1;
    $_SESSION['accessToken'] = $data['access_token'];
    $_SESSION['id'] = $data['user']['id'];
    $_SESSION['username'] = $data['user']['username'];
    $_SESSION['bio'] = $data['user']['bio'];
    $_SESSION['fullname'] = $data['user']['full_name'];
    $_SESSION['profilePicture'] = $data['user']['profile_picture'];

    header('Location: https://insatgramposter.appspot.com/home');
   

    
