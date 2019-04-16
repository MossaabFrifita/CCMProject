<?php
if ($_SERVER['PATH_INFO'] == '/') {
    include './src/index.php';
} elseif ($_SERVER['PATH_INFO'] == '/callback') {
    include './src/callback.php';
}elseif ($_SERVER['PATH_INFO'] == '/home') {
    include './src/home.php';
}elseif ($_SERVER['PATH_INFO'] == '/logout') {
    include './src/logout.php';
}elseif ($_SERVER['PATH_INFO'] == '/photos') {
    include './src/photos.php';
}
 else {
    include './src/index.php';
}

