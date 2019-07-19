<?php
	session_start();
	$id_user = $_SESSION['id_user'];
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	$fecha_ini = $_SESSION['date_user'];
	if ($email != "" && $username != "") {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account <?php echo $username; ?> </title>
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="med/style_account.css">
	<script type="text/javascript">
		function imagen() {
			var btn = document.getElementById('btn_imagen');
			btn.style.background = "rgba(255,255,255,0.5)";
			btn.style.backgroundImage = "url(med/camara.png)";
			btn.style.backgroundBlend = "soft-light";
			btn.style.backgroundRepeat = "no-repeat";
			btn.style.backgroundPosition = "center";
			btn.style.backgroundSize = "20% 20%";
		}
		function imagen_fuera(){
			var btn = document.getElementById('btn_imagen');
			btn.style.background = "url(med/user_icon.png)";
		}
	</script>
</head>
<body>
	<div id="main">
		<center>
		<div id="foto">
			<div id="btn_imagen" title="Cambiar Foto de perfil" onmouseover="imagen();" onmouseout="imagen_fuera();"></div>
		</div>
		</center><br>
		<h2>Personal</h2><br>
		<h4><b>Nombre de usuario:</b> <?php echo $username; ?></h4>
		<h4><b>Email:</b> <?php echo $email ?></h4>
		<h4><b>Fecha Inicio:</b> <?php echo $fecha_ini; ?></h4>
		<h4><b>Archivos en Drive:</b> 0</h4>
		<h2>Seguridad</h2><br>
		<h4><b>Cambiar contraseña</b></h4>
		<br>
		<a href="home.php"><button>Home</button></a>
	</div>
</body>
</html>
<?php
	}else{
		header("location: index.php");
	}
?>