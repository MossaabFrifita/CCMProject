<?php

session_start();
if(!isset($_SESSION['loggedIn'])){
    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

}
if( $_GET['status'] == 'success') {
    echo "<script type='text/javascript'>alert('Added successfully');</script>";
}
else if( $_GET['status'] == 'echec'){
    echo "<script type='text/javascript'>alert('ERROR : The album is already in your list');</script>";
}
include "getAlbums.php";

?>
<!DOCTYPE html>
<html>
<title>Instagram Poster</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
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

        <button class="w3-button fa-picture-o"><i class="fa fa-photo w3-margin-right"></i>Albums</button>
        <button class="w3-button w3-green fa fa-plus" data-toggle="modal" data-target="#tagsModal"> Add one with Tags</button>
        <button class="w3-button w3-green fa fa-plus" data-toggle="modal" data-target="#mapsModal"> Add one with Position</button>
        <button onclick="logout()" style="margin-left: 350px" class="w3-button w3-white"><i  class="fa fa-sign-out w3-margin-right"></i>Log Out</button>
    </div>
    </div>
  </header>
<!-- End page content -->

<?php foreach ($list as $row) { ?>
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://insatgramposter.appspot.com/photos?tag=<?php echo $row["tag"]; ?>&limit=<?php echo $row["nb_tag"]; ?>">
      <img src="https://insatgramposter.appspot.com/images/album.jpg" alt="Cinque Terre" width="600" height="400">
    </a>
    <div class="desc">#<?php echo $row["tag"]; echo " "; echo $row["nb_tag"]; ?> photo(s)</br>
    <i class="material-icons button delete"><a href ="https://insatgramposter.appspot.com/deleteAlbum?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')">delete</a></i></div>
  </div>
</div>
<?php } ?>
</div>
<form name="formAddTagAlbum" action="0bdf0dbfd352fea6439ef063ca91233b" onsubmit="return validateForm()" method="GET">
<!-- Modal -->
<div class="modal fade" id="tagsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new album</h5>


                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label >Tag</label>
                        <input type="text" name="tag" class="form-control"  placeholder="#tag">
                        <small id="emailHelp" class="form-text text-muted">Add tag without space.</small>
                    </div>
                    <div class="form-group">
                        <label  >Number of photos</label>
                        <input type="text" name="nbPhotos" class="form-control"  placeholder="Enter the number">
                        <small id="emailHelp" class="form-text text-muted">Number of photos to load.</small>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="w3-button w3-red fa fa-times" data-dismiss="modal"> Close</button>
                <button type="submit" class="w3-button w3-green fa fa-plus"> Add</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="mapsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new album</h5>


                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">

                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="w3-button w3-red fa fa-times" data-dismiss="modal">Close</button>
                <button type="button" class="w3-button w3-green fa fa-plus">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
</body>
<script>
    function logout() {
        location.href = '/logout';

    }
	
	function validateForm() {
  var x = document.forms["formAddTagAlbum"]["tag"].value;
  var y = document.forms["formAddTagAlbum"]["nbPhotos"].value;

  if (x == "") {
    alert("Tag must be filled out");
    return false;
  }

  if(y == ""){
      alert("Numbre of photos must be filled out");
      return false;
  }

    if(isNaN(y) != false){
        alert("Numbre of photos error : INVALIDE FORMAT ");
        return false;
    }

}



</script>
</html>

