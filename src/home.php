<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

}
?>
<!DOCTYPE html>
<html>
<title>Instagram Poster</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        color: #333;
    }

    table {
        text-align: left;
        line-height: 40px;
        border-collapse: separate;
        border-spacing: 0;
        border: 2px solid black;
        width: 1000px;
        margin: 20px auto;
        border-radius: .25rem;
    }

    thead tr:first-child {
        background: black;
        color: #fff;
        border: none;
    }

    th:first-child{
        padding: 0 0px 0 10px;
    }
    td:first-child {
        padding: 0 0px 0 5px;
    }

    th {
        font-weight: 500;
    }

    thead tr:last-child th {
        border-bottom: 3px solid #ddd;
    }

    tbody tr:hover {
        background-color: #f2f2f2;
        cursor: default;
    }

    tbody tr:last-child td {
        border: none;
    }

    tbody td {
        border-bottom: 1px solid #ddd;

    }

    td:last-child {
        text-align: right;
        padding-right: 10px;
    }

    .button {
        color: #aaa;
        cursor: pointer;
        vertical-align: middle;
        margin-top: -4px;
    }

    .edit:hover {
        color: #0a79df;
    }

    .delete:hover {
        color: #dc2a2a;
    }
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body  class="w3-light-grey w3-content" style="max-width:1600px">
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="<?php echo $_SESSION['profilePicture'] ?>" style="width:45%;" class="w3-round"><br><br>
    <h4><b><?php echo $_SESSION['fullname']; ?></b></h4>
    <p class="w3-text-grey"><?php echo $_SESSION['bio']; ?></p>
  </div>
  <div class="w3-bar-block">
    <a href="#"  class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Catalogs</a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main " style="margin-left:300px">
  <!-- Header -->
  <header >
    <div class="w3-container">
    <h2><b>Welcome to your Instagram Poster</b></h2>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 

      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Albums</button>
        <button class="w3-button w3-black fa fa-plus"> Add</button>
        <button style="margin-left: 650px" class="w3-button w3-white w3-hide-small"><i  class="fa fa-sign-out w3-margin-right"></i>Log Out</button>
    </div>
    </div>
  </header>
<!-- End page content -->

    <table>
        <thead>
        <tr>
            <th colspan="3">List of your albums</th>
        </tr>

        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Description of album </td>
            <td>
                <i class="material-icons button edit">show</i>
                <i class="material-icons button delete">delete</i>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Description of album </td>
            <td>
                <i class="material-icons button edit">show</i>
                <i class="material-icons button delete">delete</i>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Description of album </td>
            <td>
                <i class="material-icons button edit">show</i>
                <i class="material-icons button delete">delete</i>
            </td>
        </tr>

        </tbody>
    </table>

</div>
</body>
</html>

<?php
//session_destroy();
?>