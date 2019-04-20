<?
	function ver($div){
		session_start();
		$error_name  = $_SESSION["error_name"];
		$error_email = $_SESSION["error_email"];
		$error_plen  = $_SESSION["error_plen"];
		$error_p     = $_SESSION["error_p"];

		//si el nombre es muy corto
		if ($div == 1 && $error_name == "error") {
			print '
				<div class="error">
					Nombre muy corto
				</div>
			';
		}
		//si el email no tiene la escritura correcta
		if ($div == 2 && $error_email == "error") {
			print '
				<div class="error">
					Email invalido
				</div>
			';
		}
		//si la contraseña es muy corta
		if ($div == 3 && $error_plen == "error") {
			print '
				<div class="error">
					La contraseña es muy corta
				</div>
			';
		}
		//si las 2 contraseñas no coinciden
		if ($div == 4 && $error_p == "error") {
			print '
				<div class="error">
					Contraseña no coincide 
				</div>
			';
		}
	}
	function value_e($num){
		if ($num == 1) {
			print $_SESSION['username'];
		}
		if ($num == 2) {
			print $_SESSION['email'];
		}
		if ($num == 3) {
			print $_SESSION['pass'];
		}
		if ($num == 4) {
			print $_SESSION['pass_1'];
		}
	}

	function error(){
		if ($_SESSION["error"] == "true") {
			print '
				<div class="error">
					Este correo ya se esta usando
				</div>
			';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Coldffee Drive - Register</title>
	<link rel="stylesheet" type="text/css" href="med/style.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
</head>
<body>
	<div id="cont" style="height: 100%; display: block; padding: 3% 0px 54% 0px; box-sizing: border-box;">
		<div id="title">
			<center><h1><img id="coffee" width="90px" src="med/coffee1.png"> Coldffee Drive <img id="coffee" width="90px" src="med/coffee1.png"></h1></center>
		</div><br><br>
		<section id="main">
			<h1>Register</h1>
			<form action="register_confirm.php" method="post" id="form">
				<p>
					<label for="user">
						<p id="label_p">Full Name : </p>
						<?php ver(1);?>
						<input id="user" value="<?php value_e(1);?>" type="text" name="username" autofocus autocomplete="off" required title="Username">
					</label>
				</p>
				<p>
					<label for="email">
						<p id="label_p">Email : </p>
						<?php error(); ?>
						<?php ver(2);?>
						<input id="email" value="<?php value_e(2);?>" type="text" name="email" autocomplete="off" required title="Email">
					</label>
				</p>
				<p>
					<label for="pass">
						<p id="label_p">Password : </p>
						<?php ver(3);?>
						<input id="pass" value="<?php value_e(3);?>" type="password" name="pass" required title="Password">
					</label>
				</p>
				<p>
					<label for="pass_1">
						<p id="label_p">Confirm Password : </p>
						<?php ver(4);?>
						<input id="pass_1" value="<?php value_e(4);?>" type="password" name="pass_1" required title="Password">
					</label>
				</p><br>
				<p>
					<input type="submit" value="Register">
				</p><br>
				<p id="register">
					<center>Do have account? <a href="index.php">Login</a></center>
				</p>
			</form>
		</section><br><br>
	</div>
</body>
</html>