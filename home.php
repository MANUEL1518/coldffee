<?php
session_start();
//ver si las variables de sesion estan vacias
if ($_SESSION['id_user'] != "" && $_SESSION['username'] != "" && $_SESSION['email'] != ""){
	include("med/include_home.php");
	$id_user = $_SESSION['id_user'];
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	$date_user = $_SESSION['date_user'];
	$date_new = substr($date_user, 0, 10);
	list($anio, $mes, $dia) = explode("-", $date_new);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Drive of <?php echo $username; ?> </title>
	<link rel="stylesheet" type="text/css" href="med/style_home.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
	<script type="text/javascript">
		function setings() {
			var setings = document.getElementById('setings');
			setings.style.display = "block";
		}
		function close_settings(){
			var setings = document.getElementById('setings');
			setings.style.display = "none";
		}
	</script>
</head>
<body>
	<div id="setings">
		<div onClick="close_settings();" id="btn_pop_down_up">✖</div>
		<h1>Setings</h1>
		<p><a href="account.php">Cuenta</a></p>
		<p><a href="session_close.php">Cerrar sesion</a></p>
	</div>
	<header>
		<span><h2>Coldffee Drive</h2></span>
		<span><a onClick="setings();"> <?php echo $username; ?> </a></span>
	</header>
	<div id="main">
		<div id="info">
			<img src="med/user_icon.png">
		</div>
		<div id="con">
			<span>
				<p>Archivos Subidos</p><br>
				<p>0</p>
			</span>
			<span>
				<p>Peso Total</p><br>
				<p>0</p>
			</span>
			<span>
				<p>Favoritos</p><br>
				<p>0</p>
			</span>
			<span>
				<p>Ocultos</p><br>
				<p>0</p>
			</span>
		</div>
		<div id="con_blue">
		</div>
	</div>
</body>
</html>
<?php	
}else{
	header("location: index.php");
}
?>