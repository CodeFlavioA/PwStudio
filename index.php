<?php 
session_start(); 
if(isset($_SESSION["usuario"])){	header("location: PartyHard/") ;}
include 'backend/databasecon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="PreParty/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="PreParty/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="PreParty/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="PreParty/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="PreParty/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="PreParty/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="PreParty/css/util.css">
	<link rel="stylesheet" type="text/css" href="PreParty/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
	if(isset($_REQUEST["ok"])){
		if(isset($_POST["email"])){
			if(isset($_POST["pass"])){
				$PASS = $_POST["pass"];
				$EMAIL = $_POST["email"];
				$opciones = [
                    'cost' => 11,
				];
				
				if(true){
					$Query = "SELECT * FROM usuarios WHERE Email = '$EMAIL'"; 
					if($reg = mysqli_query($Cx,$Query)){
						while($r = mysqli_fetch_array($reg)){
							if(password_verify($PASS,$r[2])){
								session_start(); 
								$_SESSION["usuario"] = $EMAIL;
								header("location: PartyHard/");
							}else{
								echo "<script>alert(\"Datos incorrectos\")</script>";
							}
						}
					}
				}
			}
		}
	}
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="PreParty/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
						<img src = "PreParty/BlueLabs.png" class="logo" style = "
						width: 300px; 
						height: 65px; 
						margin: 0 auto; 
						position: relative; 
						margin-top: -120px;"
					>
					<span class="login100-form-title" style = "color: grey;">
						Pass-Studio
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name = "ok">
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span> 
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="PreParty/">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="PreParty/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="PreParty/vendor/bootstrap/js/popper.js"></script>
	<script src="PreParty/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="PreParty/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="PreParty/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="PreParty/js/main.js"></script>

</body>
</html>