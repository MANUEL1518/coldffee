<?php 
	include("med/datos_serv.php");
	$email = $_POST['email'];
	$password = $_POST['pass'];

	$conexion = mysqli_connect($host, $user, $pass, $db);
	if ($conexion) {
		$query = mysqli_query($conexion, "SELECT * FROM users WHERE email = '".$email."';");
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				if (password_verify($password, $row['password'])){
					echo "Bienvenido";
				}else{
					echo "Contraseña invalida :P";
				}
			}
		}else{
			echo "Correo o contraeña incorrecto";
		}
	}else{
		echo "problema al realizar conexion";
	}
?>