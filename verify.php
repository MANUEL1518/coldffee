<?php
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
				echo "Tu usuario a sido verificado excitosamente<br><a href='index.php'>Volver</a>";
			}

		}else{
			echo "Este usuario ya se verifico";
		}
	}
?>