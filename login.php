<?php 
  session_start();
  if (isset($_SESSION['SESSION_ID'])) {
	header('Location: index.php');
	
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="plantilla/plugins/sweetalert2/sweetalert2.min.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
					<span id="txt_ip">
					</span>
				</div>

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" id="txt_email" value="admin@admin.com">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password" id="txt_password" value="admin00">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" id="btn_login">
							Login
						</button>
						
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<!--===============================================================================================-->
	<script src="plantilla/plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="plantilla/plugins/sweetalert2/sweetalert2.min.js"></script>

	<!--===============================================================================================-->

	
	<script src="js/login.js"></script>

</body>

</html>