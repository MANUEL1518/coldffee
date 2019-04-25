<?php
session_start();
ini_set('display_errors', '0');
	include("med/datos_serv.php");
if (isset($_POST['email']) && isset($_POST['pass'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$conexion = mysqli_connect($host, $user, $pass, $db);
	if ($conexion) {
		$query = mysqli_query($conexion, "SELECT * FROM users WHERE email = '".$email."';");
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				if (password_verify($password, $row['password'])){

					//############################################
					//Advertencia!!!
					//	Recuerda que uno de los pasos para iniciar el home
					//	es recogiendo "username", "email", "fecha_ini" y ya
					// no hace fata que conozca la contraseña. gogogo...
					//############################################
					echo "Bienvenido";
					session_destroy(); //cierro todas las sessions activas
					session_start(); //creamos una nueva session limpia
					$query = mysqli_query($conexion, "SELECT * FROM users WHERE email = '".$email."';");
					while($row = mysqli_fetch_array($query)){
						$username = $row['username'];
						$id = $row['id'];
						$date_user = $row['start_date'];
					}

					//recuperamos variables a enviar
					$_SESSION['email'] = $email;
					$_SESSION['username'] = $username;
					$_SESSION['id_user'] = $id;
					$_SESSION['date_user'] = $date_user;
					//mano a home
					header("location: home.php");
				}else{
					$_SESSION['password_incorrecto'] = "true";
					$_SESSION['correo_value'] = $email;
					header("location: index.php");
				}
			}
		}else{
			$_SESSION['email_o_password_incorrecto'] = "true";
			header("location: index.php");
		}
	}else{
		echo "Problema al realizar conexion";
	}
}
?>