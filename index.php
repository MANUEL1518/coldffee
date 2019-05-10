<?php
session_cache_limiter(FALSE);
session_start();
ini_set('display_errors', '0');
//si ya hay una sesion valida iniciada
if (strlen($_SESSION['username']) == 0) {
	$_SESSION["error_name"] = "none";
	$_SESSION["error_email"] = "none";
	$_SESSION["error_plen"] = "none";
	$_SESSION["error_p"] = "none";
	$_SESSION["error"] = "none";
	$_SESSION['username'] = "";
	$_SESSION['id_user'] = "";
	$_SESSION['email'] = "";
	$_SESSION['pass'] = "";
	$_SESSION['pass_1'] = "";

function pop_up(){
	if ($_SESSION['email_o_password_incorrecto'] == "true") {
		print '
			<script>
				window.onload = function(){
					var audio = new Audio("med/pop_close.mp3");
					audio.play();
				}
			</script>
			<div id="div_pop_up">
				<p id="btn_pop_down_up" onClick = "cerrar_pop_up();">✖</p>
				<p>Email o contraseña incorrecto</p>
			</div>
		';
	}
	if ($_SESSION['password_incorrecto'] == "true") {
		print '
			<script>
				window.onload = function(){
					var audio = new Audio("med/pop_close.mp3");
					audio.play();
				}
			</script>
			<div id="div_pop_up">
				<p id="btn_pop_down_up" onClick = "cerrar_pop_up();">✖</p>
				<p>Contraseña incorrecta</p>
			</div>
		';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Coldffee Drive - Login</title>
	<link rel="stylesheet" type="text/css" href="med/style.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
	<script type="text/javascript">
		function cerrar_pop_up(){
			document.getElementById('div_pop_up').style.transition = "0.5s";
			document.getElementById('div_pop_up').style.transform = "scale(0)";
			var audio1 = new Audio("med/pop.mp3");
			audio1.play();
		}
	</script>
</head>
<body>
<?php pop_up(); ?>
	<div id="cont" style="height: 100%; display: block; padding: 3% 0px; box-sizing: border-box;">
		<div id="title">
			<center><h1><img id="coffee" width="90px" src="med/coffee1.png"> Coldffee Drive <img id="coffee" width="90px" src="med/coffee1.png"></h1></center>
		</div><br><br>
		<section id="main">
			<h1>Login</h1>
			<form action="validar.php" method="post">
				<p>
					<label for="user">
						<p id="label_p">Email : </p>
						<input id="user" type="text" name="email" autofocus autocomplete="off" required title="Email">
					</label>
				</p>
				<p>
					<label for="pass" >
						<p id="label_p">Password : </p>
						<input id="pass" type="password" name="pass" required title="Password">
					</label>
				</p><br>
				<p>
					<input type="submit" value="Enter">
				</p><br>
				<p id="register">
					<center style="font-size: 14px;">
						or you can <a href="register.php">register</a> or 
						<a href="recover.php">forgotten password?</a>
					</center>
			</form>
		</section>
	</div>
</body>
</html>
<?php
$_SESSION['email_o_password_incorrecto'] = "";
$_SESSION['password_incorrecto'] = "";
}else{
	header("location: home.php");
}
?>