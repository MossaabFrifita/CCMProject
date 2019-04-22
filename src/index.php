<?php

require "instagramAPI.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Instagram Poster</title>
 <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
	
	<!-- css files -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link  href="https://insatgramposter.appspot.com/stylesheets/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //css files -->
	
	<!-- google fonts -->
	
	<!-- //google fonts -->
	
</head>
<body>

<div class="signupform">
	<div class="container">
		<!-- main content -->
		<div class="agile_info">
			<div class="w3l_form">
				<div class="left_grid_info">
					<h1>Manage Your Instagram Poster</h1>
					
					<p>Create catalogs from photos posted on Instagram.</p><br>
					<img src="https://insatgramposter.appspot.com/images/image.jpg" alt="" />
				</div>
			</div>
			<div class="w3_info">
				<h2>Login to your Account</h2>
				<p>Enter your details to login.</p>
				<form action="#" method="post">
					<label>Email Address</label>
					<div class="input-group">
						<span class="fa fa-envelope" aria-hidden="true"></span>
						<input type="email" placeholder="Enter Your Email" >
					</div>
					<label>Password</label>
					<div class="input-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<input type="Password" placeholder="Enter Password" >
					</div> 
					<div class="login-check">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Remember me</label>
					</div>						
						<button onclick="login()" class="btn btn-danger btn-block" type="submit">Login</button >
						<a onclick="javascript:window.location='<?php echo $instagram->getLoginURL() ?>'" class="btn btn-danger btn-block" >With Instagram</a >
				</form>
                <p class="account">Instagram account <a href="#">Login : infokingfr@gmail.com Password : azerty123321.</a></p>
				<p class="account1">Dont have an account? <a onclick="login()" href="#">Register here</a></p>
			</div>
		</div>
		<!-- //main content -->
	</div>
	<!-- footer -->
	<div class="footer">
		<p>&copy; 2019 Instagram Poster. All Rights Reserved | by <a href="#" target="blank">Infoking</a></p>
	</div>
	<!-- footer -->
</div>
<script>
    function login() {
      alert('This function is not available at the moment you must authenticate with your instagram account. You can use This account for test UserName: infokingfr@gmail.com Password : azerty123321');

    }
</script>

    </body>
</html>