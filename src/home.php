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



      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */

      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }
	  .pac-container {
		z-index: 100000;
	 }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
	  .modal-dialog {
	  width: 800px;
	  
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

<?php foreach ($listAlbumLocation as $row) { ?>
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://insatgramposter.appspot.com/fetch?location=<?php echo $row["locationAdresse"]; ?>&limit=<?php echo $row["photoNumber"]; ?>">
      <img src="https://insatgramposter.appspot.com/images/album.jpg" alt="Cinque Terre" width="600" height="400">
    </a>
    <div class="desc"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo " "; echo $row["locationAdresse"]; echo " "; echo $row["photoNumber"]; ?> photo(s)</br>
    <i class="material-icons button delete"><a href ="https://insatgramposter.appspot.com/deleteAlbumLocation?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')">delete</a></i></div>
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
<form method="POST" name="formAddLocationAlbum" action="AddAlbumLocation" onsubmit="return validateFormLocation()"> 
<input type="hidden" name ="hlocation" id="hlocationID">
<div class="modal fade" id="mapsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new album</h5>


                </button>
            </div>
            <div class="modal-body">
				<div class="form-group">
					<label  >Number of photos</label>
					<input type="text" name="nbPhotosLocation" class="form-control"  placeholder="Enter the number">
					<small id="emailHelp" class="form-text text-muted">Number of photos to load.</small>
				</div>
<div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Autocomplete search
        </div>
        <div id="type-selector" class="pac-controls">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">All</label>

          <input type="radio" name="type" id="changetype-establishment">
          <label for="changetype-establishment">Establishments</label>

          <input type="radio" name="type" id="changetype-address">
          <label for="changetype-address">Addresses</label>

          <input type="radio" name="type" id="changetype-geocode">
          <label for="changetype-geocode">Geocodes</label>
        </div>
        <div id="strict-bounds-selector" class="pac-controls">
          <input type="checkbox" id="use-strict-bounds" value="">
          <label for="use-strict-bounds">Strict Bounds</label>
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text" name="location"
            placeholder="Enter a location">
      </div>
    </div>
	
	
	
    <div id="map" style="height: 500px;width: 770px"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="w3-button w3-red fa fa-times" data-dismiss="modal">Close</button>
                <button type="submit" class="w3-button w3-green fa fa-plus">Add</button>
            </div>
        </div>
    </div>
</div>
</form>
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
	  String.prototype.sansAccent = function(){
    var accent = [
        /[\300-\306]/g, /[\340-\346]/g, // A, a
        /[\310-\313]/g, /[\350-\353]/g, // E, e
        /[\314-\317]/g, /[\354-\357]/g, // I, i
        /[\322-\330]/g, /[\362-\370]/g, // O, o
        /[\331-\334]/g, /[\371-\374]/g, // U, u
        /[\321]/g, /[\361]/g, // N, n
        /[\307]/g, /[\347]/g, // C, c
    ];
    var noaccent = ['A','a','E','e','I','i','O','o','U','u','N','n','C','c'];
     
    var str = this;
    for(var i = 0; i < accent.length; i++){
        str = str.replace(accent[i], noaccent[i]);
    }
     
    return str;
}
function validateFormLocation() {
 var y = document.forms["formAddLocationAlbum"]["nbPhotosLocation"].value;
 var z = document.getElementById("pac-input").value;
	  if(y == ""){
      alert("Numbre of photos must be filled out");
      return false;
  } else

    if(isNaN(y) != false){
        alert("Numbre of photos error : INVALIDE FORMAT ");
        return false;
    }else
	
	
	if(z == ""){
		alert("location must be filled out ");
        return false;
		
	}else{

		  var s = z.replace(/\s/g,'');
			s= s.replace(/-/g,'');
		document.getElementById("hlocationID").value =s.substring(0, s.indexOf(',')).sansAccent();
		
		console.log(document.getElementById("hlocationID").value);
		return true;
	}
		
	
	
}


</script>

    <script>

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
			var item_Lat =place.geometry.location.lat()

      }
	  function save(){
		  
		  alert(document.getElementById("pac-input").value);
		  
	  }
	  
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbrGiQsqyiE5OCxeN4rEzHZEgG7e3oXCU&libraries=places&callback=initMap"
        async defer></script>
</html>

