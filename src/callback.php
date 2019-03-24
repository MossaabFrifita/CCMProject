<?php

    if (isset($_GET['error'])){
        header('Location :index.php');
        exit();
    }

    require "instagramAPI.php";

    $data = $instagram->getAccessTokenAndUserDetails($_GET['code']);

    echo "<pre>";
    var_dump($data);