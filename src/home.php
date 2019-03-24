<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>

<p>Hello, your profile !</p>
<div>
    <img src="<?php echo $_SESSION['profilePicture'] ?>" />
</div>
<div>
    ID: <?php echo $_SESSION['id']; ?> <br>
    Name: <?php echo $_SESSION['fullname']; ?> <br>

    bio: <?php echo $_SESSION['bio']; ?> <br>

</div>


</body>

</html>
<?php
session_destroy();
?>