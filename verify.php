<?php
ini_set('display_errors', '0');
	///////////////////////////////////////
	// Soy usado para verificar correo e //
    ///////////////////////////////////////
	//                                   //
	// Sirvo verificar que el email aya  //
	// sido correcto. capturando la id   //
	// enviada al corro electronico      //
	// tambien borro y grabo registros   //
	// segun si son nuevos o viejos      //
	//                                   //
	///////////////////////////////////////
	if (isset($_GET['id_alfa'])) {
		//incluyo datos del servidor
		include("med/datos_serv.php");
		//recibo id de verificacion
		$usuario = $_GET['id_alfa'];
		$conexion = mysqli_connect($host, $user, $pass, $db);
		//busqueda de usuarios en base de datos
		$query = mysqli_query($conexion, "SELECT * FROM  no_verify WHERE id_alfanum ='".$usuario."';");

			?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Coldffee Drive - Verify</title>
	<link rel="stylesheet" type="text/css" href="med/style.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
</head>
<body>
	<?php
		if (mysqli_num_rows($query) > 0) {
			//Recupero datos de usuario
			while ($arr = mysqli_fetch_array($query)) {
				$codigo   =  $arr['id_alfanum'];
				$username =  $arr['username'];
				$email    =  $arr['email'];
				$password =  $arr['password'];
				$fecha_ini=  $arr['fecha_ini'];
			}
			//inserto datos en tabla nueva
			$insertar_nuevo_usuario = mysqli_query($conexion, "INSERT INTO users(id, username, email, password, start_date) VALUES('".$codigo."','".$username."','".$email."','".$password."','".$fecha_ini."');");
			//borrar datos de tabla anterior (los que sean iguales en id y email)
			$borrar1 = mysqli_query($conexion, "DELETE FROM no_verify WHERE id_alfanum ='".$usuario."';");
			$borrar2 = mysqli_query($conexion, "DELETE FROM no_verify WHERE email='".$email."';");
		if ($insertar_nuevo_usuario && $borrar1 || $borrar2) {
	?>
<script type="text/javascript">
	setTimeout(function(){ window.location = "index.php"; }, 5000);
</script>
<div id="cont" style="height: 100%;">
<section id="main_verify" style="width: 700px;">
	<center>
		<div id="recon">✔</div><br>
		<h1 id="negritas">Your account has been successfully verified!!!</h1>
	</center>
</section>
</div>

<?php
}else{
	echo "Ocurrio un error favor de contactar al administrador. <br><h1>x(</h1>";
}
		}else{
			?>
<script type="text/javascript">
	setTimeout(function(){ window.location = "index.php"; }, 7000);
</script>
<div id="cont" style="height: 100%;">
<section id="main_verify" style="width: 700px;">
	<center>
		<div id="recon">✖</div><br>
		<h1 id="negritas">No users were found to verify or has already been verified or removed by the system</h1>
	</center>
</section>
</div>
			<?php
		}
	}
?>
</body>
</html>