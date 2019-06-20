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
}elseif ($_SERVER['PATH_INFO'] == '/0bdf0dbfd352fea6439ef063ca91233b') {
    include './src/AddAlbum.php';
}elseif ($_SERVER['PATH_INFO'] == '/test') {
    include './src/test.php';
}elseif ($_SERVER['PATH_INFO'] == '/deleteAlbum') {
    include './src/DeleteAlbum.php';
}elseif ($_SERVER['PATH_INFO'] == '/location') {
    include './src/location.php';
}
elseif ($_SERVER['PATH_INFO'] == '/deleteAlbumLocation') {
    include './src/DeleteAlbumLocation.php';
}elseif ($_SERVER['PATH_INFO'] == '/AddAlbumLocation') {
    include './src/AddLocationAlbum.php';
}elseif ($_SERVER['PATH_INFO'] == '/fetch') {
    include './src/fetch.php';
}elseif ($_SERVER['PATH_INFO'] == '/showLocAndTag') {
    include './src/showLocAndTag.php';
}

 else {
    include './src/index.php';
}

