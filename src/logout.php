<?php
session_start();
session_destroy();
header('Location: https://insatgramposter.appspot.com/');
exit;